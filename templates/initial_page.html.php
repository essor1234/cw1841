<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
    <header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">StuForum</a>

    <div class="collapse navbar-collapse" id="navbarText">
      <span class="navbar-text">
        A forum for everyone
      </span>
    </div>
  </div>
</nav>
    </header>
    <main class="container mt-5">
    <h1 class="text-center">Sign In or Sign Up</h1>
    
    <div class="row">
        <div class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-body">
           

            
            <button class="btn btn-primary w-100 mb-3" id="signIn" >
                Sign In
            </button>
            
            <button class="btn btn-secondary w-100" id="signUp" >
                Sign Up  
            </button>
            
            </div>
        </div>
        </div>
    </div>

    </main>
    <div class="space-100 mt-5 mb-5">&nbsp;</div>

    <footer>
        <?php include("footer.html.php"); ?>
    </footer>
</body>
<script>
    // Sign in
    document.getElementById("signIn").onclick = function() {
  window.location.href = "templates/sign_in.html.php";
};
    // sign up
    document.getElementById("signUp").onclick = function() {
  window.location.href = "templates/sign_up.html.php";
};
</script>
</html>