
    <main class="container mt-5">
        <div class="card p-4">
            <!-- TODO: make it display the current one, then update it-->
            <form action="editUser.php" method="post">
                <input type="hidden" name="user[id]" value="<?=$user['id'] ?? '' ?>" >

                <div class="form-group mt-4">
                    <label for="nickname" class="h2">Nickname</label>
                    <input type="text" name="user[nickname]" class="form-control" id="nickname" 
                        placeholder="Choose your nickname" value="<?=$user['nickname']; ?>">
                </div>

                <div class="form-group mt-4">
                    <label for="email" class="h2">Email</label>
                    <input type="text" name="user[email]" class="form-control" id="email" 
                        placeholder="choose an email" value="<?=$user['email'];?>">
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="submit" class="btn btn-primary btn-lg btn-block mt-4 float-right  ">Save</button>

            </div>
            
            </form>
        </div>

        <div class="space-50 mt-5 mb-5">&nbsp;</div>
        <h2>Change Your Password</h2>

        <div class="card p-4">

            <!-- TODO: make it display the current one, then update it-->
            <form action="editUser.php" method="post">
                <div class="form-group mt-4">
                    <label for="password" class="h2">Your current password</label>
                    <input type="text" name="password" class="form-control" id="password" 
                        placeholder="Type in your current password" value="">
                </div>


                <div class="form-group mt-4">
                    <label for="newPassword" class="h2">Your new password</label>
                    <input type="text" name="newPassword" class="form-control" id="newPassword" 
                        placeholder="Type your new password" value="">
                </div>
                
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="submit" class="btn btn-primary btn-lg btn-block mt-4 float-right  ">Save</button>

                </div>
            </form>
        </div>

        <div class="space-50 mt-5 mb-5">&nbsp;</div>

        <div class="container">
            <form action="deleteUser.php" method="post">
                <div class="d-flex justify-content-end ">
                    <input type="hidden" name="id" value="<?=$user['id']; ?>">
                    <input type="submit" value="Delete account" class="btn btn-outline-danger btn-lg h2">

                </div>
            </form>
        </div>
        
    </main>
    <div class="space-100 mt-5 mb-5">&nbsp;</div>
    