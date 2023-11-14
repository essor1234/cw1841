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
            <form>
            <div class="form-group mt-4">
                <label for="title" class="h2">Title</label>
                <input type="text" class="form-control" id="title" placeholder="Type a title">
            </div>

            <div class="form-group mt-4">
                <label for="detail" class="h2">Details</label>
                <textarea class="form-control" id="detail" rows="10" placeholder="Give more details for the question"></textarea>
            </div>
            
            <div class="form-group mt-4">
                <label for="image" class="h2">Upload Image</label> </br>
                <input type="file" class="form-control-file" id="image">
            </div>
            
            <div class="form-group mt-4">
                <label for="tags" class="h2">Choose tags</label>
                <select class="form-control" id="tags">
                    <option value="">Choose a Tag For your Question</option>
                    <option value="">Business</option>
                    <option value="">Engineering</option>
                    <option value="">Computer Science</option>
                    <option value="">Finance</option>
                    <option value="">Management</option>
                    <option value="">Medicine</option>
                </select>
            </div>
            
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="submit" class="btn btn-primary btn-lg btn-block mt-4 float-right  ">Submit</button>
            </div>
            </form>
        </div>
    </main>
    <div class="space-100 mt-5 mb-5">&nbsp;</div>
    <footer>
        <?php include("footer.html.php"); ?>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
