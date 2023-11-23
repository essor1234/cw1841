<?php
session_start();
include 'includes/DatabaseConnection.php';
include 'includes/DatabaseFunction.php';

try {
  if(isset($_POST['feedback'])){
    $message = $_POST['message'];
    if(empty($message)) {
      echo "
    <script>
        alert('Please complete the required field!');
        window.location.href = document.referrer;
    </script>
";
    } else {
      $feedback = array();
      $feedback['message']= $message;
      $feedback['userid']= $_SESSION['user'];
      $feedback['feedDate'] = new DateTime();

      // check if insert into data success or not 
      try {
        insert($pdo, 'feedback', $feedback);
        echo "
    <script>
        alert('The form has been submitted successfully. Thanks for your feedback!!!');
        window.location.href = document.referrer;
    </script>1
";
      } catch(Exception $e) {
        echo "
    <script>
        alert('Cannot submit your feedback');
        window.location.href = document.referrer;
    </script>
";
      }
    }
  }

}catch(PDOException $e) {
    echo 'An error has occurred';
    echo 'Database error: ' . $e->getMessage() . 
    ' in ' . $e->getFile() . ':' . $e->getLine();

}