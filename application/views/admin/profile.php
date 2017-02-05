<?php include('header.php') ?>
        <div id="page-wrapper">
            
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">User / <?= ucfirst($user->username); ?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
            <div class="row">
                <div class="col-lg-12">
                    <strong>
                        <?= printme($user); ?>
                    </strong>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <hr>
            <div class="row">
                
            </div>
            
            
            
        </div>
        <!-- /#page-wrapper -->



<?php include('footer.php') ?>

    
