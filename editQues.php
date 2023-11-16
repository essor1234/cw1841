<?php
include 'includes/DatabaseConnection.php';
include 'includes/DatabaseFunction.php';

try {
    if (isset($_POST['questions'])) {
        $question = $_POST['questions'];
        $question['quesDate'] = new DateTime;
        $question['userid'] = 5;
        $question['moduleid'] = 1;

        save($pdo, 'questions','id', $question);
        header('location: quesDisplay.php');

    }else {
        if (isset($_GET['id'])) {
            $question = findById($pdo, 'questions', 'id', $_GET['id']);
            }
    
       
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