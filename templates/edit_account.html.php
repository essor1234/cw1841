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
    <main class="container mt-5">
        <div class="card p-4">
            <!-- TODO: make it display the current one, then update it-->
            <form>
            <div class="form-group mt-4">
                <label for="title" class="h2">User Name</label>
                <input type="text" class="form-control" id="title" placeholder="Type a title">
            </div>

            <div class="form-group mt-4">
                <label for="title" class="h2">Email</label>
                <input type="text" class="form-control" id="title" placeholder="Type a title">
            </div>
            
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="submit" class="btn btn-primary btn-lg btn-block mt-4 float-right  ">Save</button>

            </div>
            </form>
        </div>
    </main>
    <div class="space-100 mt-5 mb-5">&nbsp;</div>
    <footer>
        <?php include("footer.html.php"); ?>
    </footer>
</body>

</html>