
    <main class="container mt-5">
        <div class="card p-4">
            <!-- TODO: make it display the current one, then update it-->
            <form action="" method="post">
            <input type="hidden" name="user[id]" value="<?=$user['id'] ?? '' ?>" >

            <div class="form-group mt-4">
                <label for="title" class="h2">Nickname</label>
                <input type="text" name="user[nickname]" class="form-control" id="nickname" 
                    placeholder="Choose your nickname" value="<?=$user['nickname']; ?>">
            </div>

            <div class="form-group mt-4">
                <label for="title" class="h2">Email</label>
                <input type="text" name="user[email]" class="form-control" id="email" 
                    placeholder="choose an email" value="<?=$user['email'];?>">
            </div>
            
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="submit" class="btn btn-primary btn-lg btn-block mt-4 float-right  ">Save</button>

            </div>
            </form>
        </div>
    </main>
    <div class="space-100 mt-5 mb-5">&nbsp;</div>
    