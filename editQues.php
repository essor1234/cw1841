<?php
session_start();
include 'includes/DatabaseConnection.php';
include 'includes/DatabaseFunction.php';



try {
    if (isset($_POST['questions'])) {
        $question = $_POST['questions'];
        $question['quesDate'] = (new DateTime())->format('Y-m-d H:i:s');
        $question['userid'] = $_SESSION['user'];
        $question['moduleid'] = $_POST['tags'];
        $question['image'] = $_FILES['fileToUpload']['name'];

        
        
        // function gonna check to update or add in
        try {
        save($pdo, 'questions','id', $question);
        if(!empty($question['image'])){
            include 'includes/updateFile.php';
        }
        
        if ($question['id'] == '') {
            header('location: quesDisplay.php');

        } else {
            header('location: quesDisplay.php?account=acc');

        }
    }catch(Exception){
        echo "
                <script>
                    alert('Please fill in all blank!');
                    window.location.href = document.referrer;
                    
                </script>
                ";
    }

    }else {

        if (isset($_GET['id'])) {
            $question = findById($pdo, 'questions', 'id', $_GET['id']);
            $existingTagId = $question['moduleid'];

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