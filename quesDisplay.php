<?php
    session_start();
try{
    include("includes/DatabaseConnection.php");
    include("includes/DatabaseFunction.php");
    // limit question displayed per page 
    $num_page = 5;
    $records = total($pdo, 'questions');
    $total_pages = ceil($records/$num_page);

    if(isset($_GET["page"])){
        $page = intval($_GET["page"]);
    }else{
        $page = 1;
    }

    $start_from = max(0, ($page-1)*$num_page);
        
    $result = findLimit($pdo, 'questions', $start_from, $num_page, 'quesDate');
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
                'image' =>$question['image']
            ];
        }
    }

    $userId = $_SESSION['user'];
    $userName = $_SESSION['name'];
    $createdDate = $_SESSION['date'];

    

   
    

   // display question from owner only
    if(isset($_GET['account'])) {

        $allUserQuest = getCurQuest($pdo, $userId);
        // $userQuestions = [];
        // foreach($questions as $question) {
        //     if($question['userid'] == $userId) {
        //         $userQuestions[] = $question;
        //     }
        // }

        // Update total records and pages for user's questions
        $records = count($allUserQuest);
        $total_pages = ceil($records/$num_page);

        // Apply pagination logic to user's questions
        $userQuestions = array_slice($allUserQuest, $start_from, $num_page);
        // foreach($userQuestions as $quest) {
        //     $question = $quest;
        // }

        // Start buffer
        ob_start();
        include 'templates/account.html.php';
        $output = ob_get_clean();

    // display more information in for the question
    }elseif ((isset($_GET['id']))) {
        $questions = getQuestionById($pdo, $_GET['id']);
        foreach ($questions as $quest){
            $question = $quest;

        }
        // Start buffer
        ob_start();
        include 'templates\question_info.html.php';
        $output = ob_get_clean();
            
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