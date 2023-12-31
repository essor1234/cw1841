<?php
	session_start();

    include("../includes/DatabaseConnection.php");
    include("../includes/DatabaseFunction.php");
    try {
        if(isset($_POST['signUp'])){
            if($_POST['email'] != "" && $_POST['username'] != "" && $_POST['password'] != "" && $_POST['nickname'] != ""){
                
            // Sanitize input
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $username = htmlspecialchars($_POST['username'], ENT_QUOTES);
            $nickname = htmlspecialchars($_POST['nickname'], ENT_QUOTES);

            // Hash password
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);


            // Format date
            $createDate = new DateTime();

            // Define array
            $signUp = [
                'id' => '',
                'email' => $email,
                'username' => $username,
                'password' => $password,
                'nickname' => $nickname,
                'createDate' => $createDate
            ];

            try {
                insert($pdo, 'users', $signUp);
                echo "
                <script>
                    alert('Account created successfully!');
                    setTimeout(function(){
                        window.location.href = '../templates/sign_in.html.php';
                    }, 500);
                </script>
                ";
                // header('location: ../templates/sign_in.html.php');


            }catch(PDOException){
                echo "
                <script>
                    alert('This email or username has been used!');
                    window.location.href = document.referrer;
                    
                </script>
                ";
            }

			

            }
        }

    } catch (PDOException $e) { 
        echo 'An error has occurred';
        echo 'Database error: ' . $e->getMessage() . 
        ' in ' . $e->getFile() . ':' . $e->getLine();

    }