<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-light bg-light">
  <a class="navbar-brand ms-3 navbar-expand-lg" href="#">StuForum</a> 
</nav>

    <form class="mx-auto mt-5" style="max-width: 400px;" action="../login/signIn.php" method="POST">

    <h4 class="text-center mb-4">Sign In</h4>

    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="username" name="username" placeholder="Username">
        <label for="username">Username</label>
    </div>

    <div class="form-floating mb-3">
        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        <label for="password">Password</label>
    </div>

    <button class="btn btn-primary w-100 mb-3" name="login">Login</button>

    <div class="text-center">
        <a href="sign_up.html.php">Sign Up</a>
    </div>

    </form>
</body>
</html>

