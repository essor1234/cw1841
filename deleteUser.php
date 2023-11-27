<?php

try{
    include 'includes\DatabaseConnection.php';
    include 'includes\DatabaseFunction.php';

    if (isset($_POST['id'])){
        // $_POST['id'] get from name!!!!
        delete1($pdo, 'users', 'id', $_POST['id']);
    }else {
        echo "
            <script>
                alert('Cannot delete account!');
                
                    window.location.href = document.referrer;
                ;
            </script>
            ";
    }
    

    header('location: index.php');

}catch (PDOException $e) {
    $title='An error has occured';

    $output=' Database error: ' . $e->getMessage() . ' in ' . 
            $e->getFile() . ':' . $e->getLine();
}

