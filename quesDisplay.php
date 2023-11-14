<?php
try{
    include("includes/DatabaseConnection.php");
    include("includes/DatabaseFunction.php");
    
    $result = findAll($pdo, 'questions');
    $shit = 'shit';
    $questions = [];
    foreach($result as $question){
        $user = findById($pdo, 'users', 'id', $question['userid']);
        $module = findById($pdo,'modules', 'id', $question['moduleid']);

        if (is_array($user)) {
            $questions[] = [
                'id'=>$question['id'],
                'quesTitle'=>$question['quesTitle'],
                'quesText'=>$question['quesText'],
                'quesDate'=>$question['quesDate'],
                'userName'=>$user['userName'],
                'email'=>$user['email'],
                'moduleName'=>$module['moduleName'],
            ];
        }
    }
       


        $totalQuest = total($pdo, 'questions');

         // Start buffer
        ob_start();
        include 'templates/home.html.php';
        $output = ob_get_clean();

}catch(PDOException $e){
    echo 'An error has occurred';
    echo 'Database error: ' . $e->getMessage() . ' in ' . 
        $e->getFile() . ':' . $e->getLine();
}
include('templates/layout.html.php');