<?php
session_start();
try {

    include 'includes/DatabaseConnection.php';
    include 'includes/DatabaseFunction.php';

    if (isset($_POST['password'])) {

        // Password form submitted
        $user = findById($pdo, 'users', 'id', $_SESSION['user']);
        
      }else if(isset($_POST['user'])) {

        // User edit form submitted
        $user = $_POST['user'];  
        $user['id'] = $_SESSION['user'];
        // Refetch user data
       
      } else {
        // Initial page load
    if (isset($_SESSION['user'])) {
        $user = findById($pdo, 'users', 'id', $_SESSION['user']);
      }
  


    }
    if (isset($_POST['user'])) {

        // Update user  
        update($pdo, 'users', 'id', $user);

        $userUpdate = findById($pdo,'users', 'id', $_SESSION['user']);
        
        // Save back to session
        $_SESSION['name'] = $userUpdate['nickname'];  
         
    
        echo "
        <script>
            alert('Update successfully');
            window.location.href = document.referrer;
            
        </script>
        ";    
      } elseif (isset($_POST['password'])) {
        $users  = findById($pdo,'users', 'id', $_SESSION['user']);
        
        
        if (password_verify($_POST['password'], $users['password'])) {
            // If the current password is correct and a new password has been provided
            if (!empty($_POST['newPassword'])) {
                $user = array(); // Create a new array to hold the user data
                $user['id'] = $_SESSION['user'];
                // Hash the new password
                $user['password'] = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);
                update($pdo, 'users', 'id', $user);
                // Refetch user data
                $user = findById($pdo, 'users', 'id', $_SESSION['user']);

                echo "
                <script>
                    alert('Password updated successfully!');
                </script>
                ";
            } else {
                // If no new password has been provided, keep the old password
                echo "
                <script>
                    alert('Please enter a new password.');
                    setTimeout(function(){
                        window.location.href = document.referrer;
                    }, 1000);
                </script>
                ";
            }
        } else {
            // If the current password is incorrect, keep the old password
            echo "
            <script>
                alert('Wrong password!');
                
                    window.location.href = document.referrer;
                ;
            </script>
            ";
        }
    
      } 
    









    // if(isset($_POST['user'])){
    //     $user = $_POST['user'];
    //     $user['id'] = $_SESSION['user'];

    //     //update function
    //     update($pdo, 'users', 'id', $user);
    //     // Refetch user data
    //     $userUpdate = findById($pdo,'users', 'id', $_SESSION['user']);
        
    //     // Save back to session
    //     $_SESSION['name'] = $userUpdate['nickname'];  
        
    //     // header('location: quesDisplay.php?page=account');
    //     echo "
    //                 <script>
    //                     alert('Update successfully');
    //                     window.location.href = document.referrer;
                        
    //                 </script>
    //                 ";




    // // Check if the update form for password was submitted
    // }elseif (isset($_POST['password'])) {
    //     echo 'here';
    //     $users  = findById($pdo,'users', 'id', $_SESSION['user']);

    //     // Verify the current password
    //     if (password_verify($_POST['password'], $users['password'])) {
    //         // If the current password is correct and a new password has been provided
    //         if (!empty($_POST['newPassword'])) {
    //             $user = array(); // Create a new array to hold the user data
    //             $user['id'] = $_SESSION['user'];
    //             // Hash the new password
    //             $user['password'] = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);
    //             update($pdo, 'users', 'id', $user);
    //             echo "
    //             <script>
    //                 alert('Password updated successfully!');
    //             </script>
    //             ";
    //         } else {
    //             // If no new password has been provided, keep the old password
    //             echo "
    //             <script>
    //                 alert('Please enter a new password.');
    //                 setTimeout(function(){
    //                     window.location.href = document.referrer;
    //                 }, 1000);
    //             </script>
    //             ";
    //         }
    //     } else {
    //         // If the current password is incorrect, keep the old password
    //         echo "
    //         <script>
    //             alert('Wrong password!');
                
    //                 window.location.href = document.referrer;
    //             ;
    //         </script>
    //         ";
    //     }
  
    // }else {
    //     if ((isset($_SESSION['user']))){
    //     $user = findById($pdo,'users', 'id', $_SESSION['user']);
        
    //     }
    //     }
    ob_start();
    include 'templates/edit_account.html.php';
    $output = ob_get_clean();
        
}catch(PDOException $e) {
    echo 'An error has occurred';
    echo 'Database error: ' . $e->getMessage() . 
    ' in ' . $e->getFile() . ':' . $e->getLine();

}
include 'templates/layout.html.php';