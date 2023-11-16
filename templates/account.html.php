<body>
    <div class="space-100 ">&nbsp;</div>

    <main>
    <div class="user-profile mt-5 ms-2 d-flex justify-content-between">

        <div>
        <h2 class="username">John Doe</h2>
        </div>

        <div>
        <button class="btn btn-outline-danger" id="signOut">Sign Out</button>
        </div>

    </div>

    <button class="btn btn-outline-dark" id="infoEdit">Edit Info</button>

  <div class="user-questions mt-5 ms-1">

    <h3>Questions You Have Contributed</h3>
    <div style="display: flex; justify-content: center;" class="container ">
    <!-- table start here-->
    <table class="table table-hover text-break " >

            <!-- Start here-->          
            <?php if (count($userQuest) > 0): ?>
                <?php foreach($userQuest as $question): ?>
                <tbody>

                <tr class="table-striped h-50">
                    <td> 
                        <!-- Delete Btn-->
                    <div class="d-flex justify-content-end">
                    <button class="btn btn-outline-danger btn-sm h2"> X </button> 
                </div>

                </div>
                    <!-- Quest Title-->
                    <h2 class="h2"><?=htmlspecialchars($question['quesTitle'], ENT_QUOTES, 'UTF-8') ?></h2>
                    <!-- Quest Text-->
                    <p><?=htmlspecialchars($question['quesText'], ENT_QUOTES, 'UTF-8') ?></p>
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
                    <span class="question__author"><?=htmlspecialchars($question['userName'], ENT_QUOTES, 'UTF-8') ?></span></a></p>
                    
                    <!-- Edit Btn-->
                    <div class="d-flex justify-content-end"> 
                        <button class="btn btn-primary btn-sm">
                        <i class="fas fa-edit"></i> Edit
                        </button>
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

    </main>
    <script>
        // Edit
        document.getElementById("infoEdit").onclick = function() {
    window.location.href = "edit_account.html.php";
    };
        // Sign out
        document.getElementById("signOut").onclick = function() {
        window.location.href = "../login/signOut.php";
        };
    </script>
</body>








