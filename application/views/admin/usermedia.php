<?php include('header.php') ?>
        <div id="page-wrapper">
            
            <div class="row">
                <div class="col-sm-12">
                    <div class="col-sm-8">
                      <h1 class="page-header">
                        <i class="fa fa-user-o" aria-hidden="true"></i> <?= $user->username ?>
                      </h1>
                    </div>
                    <div class="col-sm-4">
                      <a class="pull-right" href="<?= base_url() ?>admin/user/<?= $user->username; ?>">
                      <button data-id="" class="top-buffer btn btn-default btn-sm"> BACK</button>
                    </a>
                    </div>
                                        
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <div class="panel panel-default">
              <div class="panel-heading">Media</div>
              <div class="panel-body">
                <div class="col-sm-12">
                  <?php if (isset($user_media)): ?>
                      <?php foreach ($user_media as $x): ?>
                      <div class="top-buffer row" id="row_<?= $x->id;  ?>">
                        <div class="col-sm-4">
                          <img id="userprofilepicture" src="<?= base_url().$x->source_url ?>" class="img-responsive img-thumbnail" alt="<?= $x->title; ?>" 
                                  width="304" height="236">
                        </div>
                        <div class="col-sm-4">
                          <input type="text" name="" class="form-control" id="<?= $x->id ?>_title"  maxlength="64" minlength="4" placeholder="Title" value="<?= $x->title; ?>">
                          <textarea rows="4" cols="50" name="bio" class="top-buffer form-control" id="<?= $x->id ?>_description" placeholder="Description"><?= $x->description; ?></textarea>
                          <a href="javascript:void(0);">
                            <button data-id="<?= $x->id; ?>" class="updateMedia_btn top-buffer btn btn-success btn-sm"> Update</button>
                          </a>
                          <a href="javascript:void(0);">
                            <button data-id="<?= $x->id; ?>" class="deleteMedia_btn top-buffer btn btn-danger btn-sm"> Delete</button>
                          </a>
                        </div>
                      </div>
                      
                    <?php endforeach ?>
                  <?php endif ?>
                </div>
                 <div class=" row">
                   <div class="col-sm-6">
                      <div class="row">
                          <?php include('uploadform_media.php');  ?>
                      </div>            
                    </div>
                 </div>                
              </div>
            </div>

        </div>
        <!-- /#page-wrapper -->


<?php include('footer.php') ?>
<script src="https://unpkg.com/masonry-layout@4.1/dist/masonry.pkgd.js"></script>
<!-- or -->
<script src="https://unpkg.com/masonry-layout@4.1/dist/masonry.pkgd.min.js"></script>

<script>
  
  $('.grid').masonry({
  // options...
  itemSelector: '.grid-item',
  columnWidth: 250
});

</script>

    
