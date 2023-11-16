<?php

try{
    include 'includes\DatabaseConnection.php';
    include 'includes\DatabaseFunction.php';
    // $_POST['id'] get from name!!!!
    delete1($pdo, 'questions', 'id', $_POST['id']);

    header('location: quesDisplay.php?page=account');

}catch (PDOException $e) {
    $title='An error has occured';

    $output=' Database error: ' . $e->getMessage() . ' in ' . 
            $e->getFile() . ':' . $e->getLine();
}

include 'templates/layout.html.php';