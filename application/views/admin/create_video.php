<?php include('header.php') ?>
        <div id="page-wrapper">
            
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Video/New</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <hr>
            <div class="row">
                <?php if (!isset($success)): ?>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="name" class="h4">Title</label>
                            <input type="text" name="title" class="form-control" id="name" placeholder="Enter title" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="name" class="h4">Description</label>
                            <textarea name="description" class="form-control" placeholder="Enter description" rows="5" id="comment" required></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="name" class="h4">Source File</label>
                            <input type="file" class="form-control" name="fileToUpload" id="fileToUpload" required>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="name" class="h4">Screenshot Image</label>
                            <input type="file" class="form-control" name="fileToUpload_image" id="fileToUpload" required>
                        </div>
                    </div>
                    <button type="submit" name="submit" id="form-submit" class="btn btn-success btn-lg">Submit</button>
                </form>
                <?php endif ?>
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
            
            
            
        </div>
        <!-- /#page-wrapper -->



<?php include('footer.php') ?>

    
