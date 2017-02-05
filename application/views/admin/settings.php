<?php include('header.php') ?>
        <div id="page-wrapper">
            
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">User / <?= ucfirst($user->username); ?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
            <div class="row">
                <form action="" method="post">
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="name" class="h4">Change Password</label>
                            <input type="password" pattern=".{8,}" title="8 characters minimum"  name="password" class="form-control" id="name" placeholder="Enter Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <input type="password" pattern=".{8,}" title="8 characters minimum"  name="verify" class="form-control" placeholder="Verify Password" id="email" required>
                        </div>
                    </div>
                    <button type="submit" id="form-submit" class="btn btn-success btn-lg">Submit</button>
                    <button type="button" id="deletUserBtn" class="btn btn-danger btn-lg pull-right">Delete User</button>
                </form>
                <?php if (isset($error)): ?>
                    <hr>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <div class="alert alert-danger">
                              <strong>Error!</strong> <?= $error; ?>
                            </div>
                        </div>
                    </div>
                <?php endif ?>
                <?php if (isset($success)): ?>
                    <hr>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <div class="alert alert-success">
                              <strong>Done!</strong> <?= $success; ?>
                            </div>
                        </div>
                    </div>
                <?php endif ?>
            </div>

            <hr>
            <div class="row">
                
            </div>
            
            
            
        </div>
        <!-- /#page-wrapper -->



<?php include('footer.php') ?>

<script>
    $("#deletUserBtn").click(function(){

        var confirmBTN = confirm("Are You Sure? You will be logged-out");
        if (confirmBTN == true) {
        $.ajax({
            url: "<?php echo base_url(); ?>user/delete",
            type: "POST",
            success: function(result){
                location.reload();
        }});
    }
    });
</script>
    
