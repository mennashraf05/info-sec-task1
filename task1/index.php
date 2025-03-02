<?php

$dictionary_file = 'yahoo-voices.txt';

// Check if the dictionary file exists
if (file_exists($dictionary_file)) {
    $dictionary = file($dictionary_file, FILE_IGNORE_NEW_LINES);
} else {
    $dictionary = [];
    echo "The dictionary file does not exist!";
}

// Hardcoded correct password for testing purposes (you can change it)
$correct_password = "secret123";

// Function for Dictionary Attack
function dictionary_attack($password) {
    global $dictionary;
    return in_array($password, $dictionary);
}

// Function for Brute Force Attack (modified to avoid memory exhaustion)
function brute_force_attack($password) {
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; // A-Z + a-z
    $length = 5;
    return brute_force_recursive($characters, $length, '', $password);
}

// Recursive function to generate combinations and check the password
function brute_force_recursive($characters, $length, $current, $password) {
    // If the current string length is equal to the required length, check it
    if (strlen($current) === $length) {
        if ($current === $password) {
            return true; // Found the password
        }
        return false;
    }

    // Loop through characters and generate the next combinations
    for ($i = 0; $i < strlen($characters); $i++) {
        $new_combination = $current . $characters[$i];
        if (brute_force_recursive($characters, $length, $new_combination, $password)) {
            return true; // Found the password
        }
    }

    return false; // Not found
}

// Result variable
$result = null;

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // First, try Dictionary Attack
    if (dictionary_attack($password)) {
        header("Location: welcome.php"); // Redirect to welcome page if password is found
        exit;
    }
    // If dictionary attack fails, try Brute Force Attack
    elseif (brute_force_attack($password)) {
        header("Location: welcome.php"); // Redirect to welcome page if password is found
        exit;
    }
    // If both fail
    else {
        // Show a simple failure message immediately
        $result = "Password not found.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Cracking</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login-form-container">
        <form method="POST">
            <h2>Login</h2>
            <div class="input-container">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" placeholder="Enter your username" required>
            </div>

            <div class="input-container">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" placeholder="Enter your password" required>
            </div>

            <button type="submit">Login</button>
        </form>
    </div>

    <!-- Show simple failure message if the result is set -->
    <?php if ($result): ?>
        <div class="result" style="color: red; font-weight: bold; text-align: center;">
            <h3><?php echo $result; ?></h3>
        </div>
    <?php endif; ?>
</body>
</html>
