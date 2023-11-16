<?php
	session_start();

include("../includes/DatabaseConnection.php");
include("../includes/DatabaseFunction.php");

try {
    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $user = signIn($pdo, $username, $password);
        if ($user) {
            $_SESSION['name'] = $user['userName'];
            $_SESSION['user'] = $user['id'];
            header("location: ../quesDisplay.php");
        } else {
            echo "
				<script>alert('Invalid username or password')</script>
				<script>window.location = '../templates/sign_in.html.php'</script>
				";
        }

    }else {
        echo "
				<script>alert('Please complete the required field!')</script>
				<script>window.location = '../templates/sign_in.html.php'</script>
			";
    }

    

} catch (PDOException $e) { 
    $title = 'An error has occurred';
    echo 'Database error: ' . $e->getMessage() . 
    ' in ' . $e->getFile() . ':' . $e->getLine();

}