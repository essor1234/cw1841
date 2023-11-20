<?php
    session_start();
try{
    include("includes/DatabaseConnection.php");
    include("includes/DatabaseFunction.php");
    
    $result = findAll($pdo, 'questions');
    $questions = [];
    foreach($result as $question){
        $user = findById($pdo, 'users', 'id', $question['userid']);
        $module = findById($pdo,'modules', 'id', $question['moduleid']);

        if (is_array($user)) {
            $questions[] = [
                'id'=>$question['id'],
                'userid'=>$question['userid'],
                'quesTitle'=>$question['quesTitle'],
                'quesText'=>$question['quesText'],
                'quesDate'=>$question['quesDate'],
                'nickname'=>$user['nickname'],
                'email'=>$user['email'],
                'moduleName'=>$module['moduleName'],
            ];
        }
    }

    $userId = $_SESSION['user'];
    $userName = $_SESSION['name'];


    // display question from owner only
    if(isset($_GET['page'])) {
        foreach($questions as $question) {
            if($question['userid'] == $userId) {
            $userQuest[] = $question;
         }
        }
        // Start buffer
        ob_start();
        include 'templates/account.html.php';
        $output = ob_get_clean();
        
    // display more information in for the question
    }elseif ((isset($_GET['id']))) {
        foreach($questions as $question){
            if($question['id'] == $_GET['id']){
                // Start buffer
                ob_start();
                include 'templates\question_info.html.php';
                $output = ob_get_clean();
            }
        }
        

    }
    // display all question
    else{
        $totalQuest = total($pdo, 'questions');
        // Start buffer
        ob_start();
        include 'templates/home.html.php';
        $output = ob_get_clean();
    }

}catch(PDOException $e){
    echo 'An error has occurred';
    echo 'Database error: ' . $e->getMessage() . ' in ' . 
        $e->getFile() . ':' . $e->getLine();
}
include('templates/layout.html.php');