<div class="space-100 ">&nbsp;</div>

<main class="container mt-4">
        <div class="card">
            <div class="card-body">
                <!-- question title -->
                <h1 class="card-title"><?=htmlspecialchars($question['quesTitle'], ENT_QUOTES, 'UTF-8') ?></h1>
                <!-- question date -->
                <h4 class="card-subtitle mb-2 text-muted"><?php $date = new DateTime($question['quesDate']); 
                                                                                echo $date->format('jS F Y')?></h4>
                <!-- question owner name -->
                <h5 class="card-text"><a class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" 
                        href="mailto:<?=htmlspecialchars($question['email'], ENT_QUOTES, 'UTF-8') ?>">
                <span class="question__author"><?=htmlspecialchars($question['nickname'], ENT_QUOTES, 'UTF-8') ?></span></a></h5>
                <!-- question Text is here-->
                <p><?=htmlspecialchars($question['quesText'], ENT_QUOTES, 'UTF-8') ?></p>
                <!-- question image is here-->
                <?php if(isset($question['image'])): ?>
                <img height="200px" src="uploads\<?=htmlspecialchars($question['image'], ENT_QUOTES); ?>" alt="question image" class="img-thumbnail"/>
                <?php endif; ?>
                <div class="space-50 ">&nbsp;</div>

                <!-- question tag -->
                <div>
                    <button type="button" class="btn btn-outline-secondary">
                        <?=htmlspecialchars($question['moduleName'], ENT_QUOTES, 'UTF-8') ?></button>
                </div>
            </div>
        </div>

    </main>
    <div class="space-100 ">&nbsp;</div>
