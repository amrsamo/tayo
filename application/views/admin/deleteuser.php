<?php include('header.php') ?>
        <div id="page-wrapper">
            
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Delete User / <?= ucfirst($user->username); ?></h1>
                    <a href="<?= base_url(); ?>admin/confirmuserdelete/<?= $user->username; ?>">
                        <button class="btn btn-danger btn-lg"> YES</button>
                    </a>
                    <a href="<?= base_url(); ?>admin/user/<?= $user->username; ?>">
                        <button class="btn btn-default btn-lg"> No</button>
                    </a>
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

    
