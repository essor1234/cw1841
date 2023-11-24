<body>
    <div class="space-100 ">&nbsp;</div>

    <main>
    <div class="user-profile mt-5 ms-2 d-flex justify-content-between ms-3 text-uppercase">
        <!-- nickname display -->
        <div>
        <h2 class="nickname"><?=$userName?></h2>
        </div>
        <!-- date create -->
        
        <!-- sign out btn  -->
        <div>
        <button class="btn btn-outline-danger me-3" id="signOut">Sign Out</button>
        </div>
    
    </div>
    <div class="ms-3">
        Participate on 
        <mark><i>
        <?php
        $createdDate = new DateTime($createdDate);
        echo $createdDate->format('jS F Y'); 
        ?></i></mark>
    </div>
    <button class="btn btn-outline-dark ms-3" id="infoEdit">Edit Info</button>

  <div class="user-questions mt-5 ms-1">

    <h3>Questions You Have Contributed</h3>
    <div style="display: flex; justify-content: center;" class="container ">
    <!-- table start here-->
    <table class="table table-hover text-break " >

            <!-- Start here--> 
                    
            <?php if (isset($userQuestions) && count($userQuestions) > 0): ?>
                <?php foreach($userQuestions as $question): ?>
                <tbody>

                <tr class="table-striped h-50">
                    <td> 
                        <!-- Delete Btn-->
                    <form action="deleteQues.php" method="post">
                        <div class="d-flex justify-content-end">
                            <input type="hidden" name="id" value="<?=$question['id']; ?>">
                            <input type="submit" value="X" class="btn btn-outline-danger btn-sm h2">
                        </div>
                    </form>
                </div>
                    <!-- Quest Title-->
                    <a href="quesDisplay.php?id=<?=$question['id']?>" 
                class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover link-dark link-opacity-75-hover" >
                <h2 class="h2"><?=htmlspecialchars($question['quesTitle'], ENT_QUOTES, 'UTF-8') ?></h2></a>

                    <!-- Quest Text-->
                    <p><?php $questionText = $question['quesText'];
                        $limitedText = implode(" ", array_slice(explode(" ", $questionText), 0, 45)); 
                    echo htmlspecialchars($limitedText, ENT_QUOTES, 'UTF-8') ?></p>
                    <!-- Quest Tag-->
                    <div class="question__tags">
                        <button type="button" class="btn btn-outline-secondary"><?=htmlspecialchars($question['moduleName'], ENT_QUOTES, 'UTF-8') ?></button>
                    </div>
                    <!-- Quet ACt Not Yet-->
                    <div class="question__actions">
                        <!-- Action buttons (like upvote, downvote, comment) go here -->
                    </div>
                    <!-- date and username-->
                    <p class="text-muted text-end">Asked on <span class="text-primary"><?php $date = new DateTime($question['quesDate']); 
                                                                                                echo $date->format('jS F Y')?></span> 
                    by <a class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" 
                            href="mailto:<?=htmlspecialchars($question['email'], ENT_QUOTES, 'UTF-8') ?>">
                    <span class="question__author"><?=htmlspecialchars($question['nickname'], ENT_QUOTES, 'UTF-8') ?></span></a></p>
                    
                    <!-- Edit Btn-->
                    <div class="d-flex justify-content-end">
                    <a href="editQues.php?id=<?=$question['id']?>">
                        <button class="btn btn-primary btn-sm">
                        Edit
                        </button></a>
                    </div>
                    </td>
                </tr>
                </tbody>
                <?php endforeach; ?>

                <?php else: ?>

                    <p>No questions found for this user.</p>

                <?php endif; ?>

            
        </table>
    </div>

  </div>
   <!-- for pagination  -->
   <?php 
            echo '<nav aria-label="Page navigation example">';
            echo '<ul class="pagination justify-content-center">';
            
            for($i=1;$i<=$total_pages;$i++) {
                echo '<li class="page-item"><a class="page-link" href="quesDisplay.php?account=acc&page='.$i.'">'.$i.'</a></li>';
            }
            
            echo '</ul>';
            echo '</nav>'; ?>
        </div>

    </main>
    <script>
        // Edit
        document.getElementById("infoEdit").onclick = function() {
    window.location.href = "edit_account.html.php";
    };
        // Sign out
        document.getElementById("signOut").onclick = function() {
        window.location.href = "login/signOut.php";
        };
        // edit info
        document.getElementById("infoEdit").onclick = function() {
        window.location.href = "editUser.php?id=<?=$question['id']?>";
        };
    </script>
</body>








