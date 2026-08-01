<?php if(isset($_SESSION['success'])):
                    $message=$_SESSION['success'];?>
                    <div class="alert alert-success"><?=  $message ?></div>
                    <?php unset($_SESSION['success']);
                 endif; ?>