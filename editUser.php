<?php
session_start();
try {

    include 'includes/DatabaseConnection.php';
    include 'includes/DatabaseFunction.php';

    if(isset($_POST['user'])){
        $user = $_POST['user'];
        $user['id'] = $_SESSION['user'];


        //update function
        update($pdo, 'users', 'id', $user);
        // Refetch user data
        $userUpdate = findById($pdo,'users', 'id', $_SESSION['user']);

        // Save back to session
        $_SESSION['name'] = $userUpdate['nickname'];  
        header('location: quesDisplay.php?page=account');



    }else {
        if ((isset($_SESSION['user']))){
        $user = findById($pdo,'users', 'id', $_SESSION['user']);
        
        }
        }
    ob_start();
    include 'templates/edit_account.html.php';
    $output = ob_get_clean();
        
}catch(PDOException $e) {
    echo 'An error has occurred';
    echo 'Database error: ' . $e->getMessage() . 
    ' in ' . $e->getFile() . ':' . $e->getLine();

}
include 'templates/layout.html.php';