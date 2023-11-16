
    <!-- for the space-->
    <div class="space-100 ">&nbsp;</div>
    <main>
        <div class="p-5 bg-light">
            <div class="container">
                <h1 class="display-4">Welcome <i><?=$userName?></i> to My Website</h1>
                <p class="lead">The Biggest Forum Over The Multiverse</p>
            </div>
        </div>
            <!-- for the space-->
        <div class="space-100 ">&nbsp;</div>
  
                <!-- QuestionComponent.html -->
    <div style="display: flex; justify-content: center;" class="container ">
    <!-- table start here-->
        <table class="table table-hover text-break " >

        
                <?php if (isset($error)): ?>
            <p>
                <?= $error; ?>
            </p>
            <?php else: ?>
                
                <!-- Start here-->          
                <?php foreach($questions as $question): ?>
            <tbody>
            <tr class="table-striped h-50">
                <td>
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
                <p class="text-muted text-end">Asked on <span class="text-primary"><?php $date = $date = new DateTime($question['quesDate']); 
                                                                                            echo $date->format('jS F Y')?></span> 
                by <a class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" 
                        href="mailto:<?=htmlspecialchars($question['email'], ENT_QUOTES, 'UTF-8') ?>">
                <span class="question__author"><?=htmlspecialchars($question['userName'], ENT_QUOTES, 'UTF-8') ?></span></a></p>
                </td>
            </tr>
            </tbody>
            <?php endforeach; ?>
            <?php endif; ?>

            
            
        </table>
    </div>


    </main>
    