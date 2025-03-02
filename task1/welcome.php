<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - PurrfectMatch</title>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.1/css/all.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
      html, body {
    background-image: url('pexels-darinacico-103567.jpg');  /* ضع هنا اسم الصورة مع الامتداد */
    background-size: cover;
    background-repeat: no-repeat;
    height: 100%;
    font-family: 'Raleway', sans-serif;
}

        .container {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .card {
            width: 400px;
            background-color: rgba(0,0,0,0.7) !important;
            border-radius: 20px;
            padding: 20px;
            text-align: center;
            color: white;
        }
        .btn-primary {
            background-color: #CAA73A;
            border: none;
        }
        .btn-primary:hover {
            background-color: white;
            color: black;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <h2>Welcome to Purrfect Match!</h2>
            <p>You have successfully logged in.</p>
            <a href="index.php" class="btn btn-primary" id="logout">Log out</a>
        </div>
    </div>
    <script>
        document.getElementById("logout").addEventListener("click", function() {
            localStorage.removeItem("loggedIn");
        });
    </script>
</body>
</html>
