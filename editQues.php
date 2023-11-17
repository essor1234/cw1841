<?php
session_start();
include 'includes/DatabaseConnection.php';
include 'includes/DatabaseFunction.php';

try {
    if (isset($_POST['questions'])) {
        $question = $_POST['questions'];
        $question['quesDate'] = new DateTime();
        $question['userid'] = $_SESSION['user'];
        $question['moduleid'] = $_POST['tags'];
        
        
        // function gonna check to update or add in
        save($pdo, 'questions','id', $question);
        header('location: quesDisplay.php');

    }else {
        if (isset($_GET['id'])) {
            $question = findById($pdo, 'questions', 'id', $_GET['id']);
            }
        $modules = findAll($pdo, 'modules');

       
        ob_start();
        include 'templates\edit_add_quest.html.php';
        $output = ob_get_clean();
} 
}catch(PDOException $e) {
    echo 'An error has occurred';
    echo 'Database error: ' . $e->getMessage() . 
    ' in ' . $e->getFile() . ':' . $e->getLine();

}
include 'templates/layout.html.php';