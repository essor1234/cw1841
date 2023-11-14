$sql = "INSERT INTO `user`(`username`, `email`, `password`, `createDate`)
                    VALUES( '$username', '$email', '$password', '$createDate')";

                    $email = $_POST['email'];
        $username = $_POST['username'];
        // md5 encrypted
        $password = md5($_POST['password']);
        $createDate = new DateTime();
        $createDate->format('Y-m-d'); 
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);