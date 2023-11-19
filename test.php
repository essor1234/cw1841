<?php if(isset($_POST['tags'])): ?>
    <?php if ($module['id'] != $seleted_tag): ?>
                            <option value="<?= htmlspecialchars($module['id'], ENT_QUOTES) ?>">
                                <?= htmlspecialchars($module['userName'], ENT_QUOTES)?></option>
                        <?php endif;?>
                    <?php else: ?>
                        <option value="<?= htmlspecialchars($module['id'], ENT_QUOTES) ?>">
                            <?= htmlspecialchars($module['moduleName'], ENT_QUOTES)?></option>
