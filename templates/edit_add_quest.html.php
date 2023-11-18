
<body>
   
    <main class="container mt-5">
        <div class="card p-4">
            <form action="" method="post">
            <input type="hidden" name="questions[id]" value="<?=$question['id'] ?? '' ?>" >
            <div class="form-group mt-4">
                <label for="title" class="h2">Title</label>
                <input type="text" class="form-control" id="title" name="questions[quesTitle]" placeholder="Type a title" value="<?=$question['quesTitle'] ?? ''?>">
            </div>

            <div class="form-group mt-4">
                <label for="detail" class="h2">Details</label>
                <textarea class="form-control"  name="questions[quesText]" 
                id="detail" rows="10" placeholder="Give more details for the question"><?=$question['quesText'] ?? ''; ?></textarea>
            </div>
            
            <div class="form-group mt-4">
                <label for="image" class="h2">Upload Image</label> </br>
                <input type="file" class="form-control-file" id="image">
            </div>
            
            <div class="form-group mt-4">
            <!-- Check if editing existing question -->
                <?php
                $selectedModule = null;
                if (isset($existingTagId)){
                foreach ($modules as $module) {
                if ($module['id'] == $existingTagId) {
                    $selectedModule = $module;
                    break; 
                }
                }
                    }
                ?>


                <label for="tags" class="h2">Choose tags</label>
                
                <select class="form-control" id="tags" name="tags">

                <!-- Show default option only if new question -->
                <?php 
                if (!isset($existingTagId)) {
                    echo '<option value="">Choose a Tag For your Question</option>';
                  }
                ?>

                <!-- Output selected tag option first if editing -->
                <?php if ($selectedModule): ?>

                <option value="<?=$selectedModule['id']?>" selected>
                <?=$selectedModule['moduleName']?>
                </option>
                <?php endif;?>

                 <!-- Output rest of options -->
                <?php foreach ($modules as $module): ?>
                    <!-- incase of have tag-->
                    <?php if ($selectedModule && $module != $selectedModule): ?>
                        <option value="<?=$module['id']?>">
                        <?=$module['moduleName']?>
                        </option>
                    <!-- in case of not have tag-->
                    <?php else: ?>
                        <option value="<?=$module['id']?>">
                        <?=$module['moduleName']?>
                        </option>                 
                     <?php endif; ?>
                    
                    <?php endforeach;?>


                        
                </select>
            </div>
            
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="submit" class="btn btn-primary btn-lg btn-block mt-4 float-right  ">Submit</button>
            </div>
            </form>
        </div>
    </main>
    <div class="space-100 mt-5 mb-5">&nbsp;</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
