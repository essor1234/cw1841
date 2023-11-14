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
        <?php include("header.html.php"); ?>
    </header>
    <main>
    

    <div class="user-profile mt-5 ms-2 d-flex justify-content-between">

<div>
  <h2 class="username">John Doe</h2>
</div>

<div>
  <button class="btn btn-outline-danger" id="signOut">Sign Out</button>
</div>

</div>

<button class="btn btn-outline-dark" id="infoEdit">Edit Info</button>

  <div class="user-questions mt-5 ms-1">

    <h3>Questions You Have Contributed</h3>
    <div style="display: flex; justify-content: center;">
        <table class="table table-hover text-break" style="width: auto;">
            <tbody>

            <tr class="table-striped">

            

                <td> 
                    <!-- Delete Btn-->
                <div class="d-flex justify-content-end">
    <button class="btn btn-outline-danger btn-sm h2"> X </button> 
  </div>

            </div>
                <h2 class="h2">Question Title</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
                    Neque, cupiditate a sit natus dicta modi dolorum unde! Quisquam repellendus sit nulla rem explicabo quas odio,
                    facilis ratione nihil maxime nisi.</p>
                <div class="question__tags">
                    <button type="button" class="btn btn-outline-secondary">Tag Name</button>
                    <!-- Question tags go here -->
                </div>
                <div class="question__actions">
                    <!-- Action buttons (like upvote, downvote, comment) go here -->
                </div>
                <!-- date and username-->
                <p class="text-muted text-end">Asked on <span class="question__date">09/11/2023</span> by <span class="question__author">User Name</span></p>
                   
                <!-- Edit Btn-->
                <div class="d-flex justify-content-end"> 
                    <button class="btn btn-primary btn-sm">
                    <i class="fas fa-edit"></i> Edit
                    </button>
                </div>
                </td>

                

            </tr>
            </tbody>
            
        </table>
    </div>

  </div>

</main>
    <footer>
        <?php include("footer.html.php"); ?>
</footer>
</body>
<script>
    // Edit
    document.getElementById("infoEdit").onclick = function() {
  window.location.href = "edit_account.html.php";
};
    // Sign out
    document.getElementById("signOut").onclick = function() {
    window.location.href = "../login/signOut.php";
    };
</script>
</html>
