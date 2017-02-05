<?php include('header.php') ?>
        <div id="page-wrapper">
            
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="page-header">
                        <i class="fa fa-user-o" aria-hidden="true"></i> <?= $user->username ?>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>



            <div class="panel panel-default">
              <div class="panel-heading">Notifications</div>
              <div class="panel-body">
                  <div class="row">
                    <?php if ($user->is_valid == 1): ?>
                        <div class="col-sm-6">
                            <div class="alert alert-success">
                                  <strong></strong> This user has been validated.
                            </div>  
                        </div>
                    <?php else: ?>
                        <div class="col-sm-6">
                            <div class="alert alert-warning">
                                  <strong>Warning!</strong> This user has not been validated yet
                                  <a href="<?= base_url(); ?>admin/validate/<?= $user->username; ?>">
                                      <button class="pull-right btn btn-info btn-sm"> Validate</button>
                                  </a>
                            </div>  
                        </div>
                    <?php endif ?>    
                </div>


                <div class="row">
                    <?php if ($user->is_loggedin == 1): ?>
                        <div class="col-sm-6">
                            <div class="alert alert-info">
                                  <strong></strong> This user is currently logged in.
                            </div>  
                        </div>
                    <?php endif ?>    
                </div>
              </div>
            </div>

            
            <div class="panel panel-default">
              <div class="panel-heading">
                User Information
                <a href="<?= base_url(); ?>admin/deleteuser/<?= $user->username; ?>">
                    <button style="margin-top:-.3%;" class="pull-right btn btn-danger btn-sm"> Delete User</button>
                </a>
              </div>
              <div class="panel-body">
                  <div class="row">
                    <form action="" method="post">
                        <div class="form-group col-sm-4">
                            <label for="username" class="h4">Username</label>
                            <input type="text" name="username" class="form-control" id="name"  maxlength="64" minlength="4" value="<?= isset($_POST['username']) ? $_POST['username'] : $user->username?> " required>
                        </div>
                        <div class="form-group col-sm-4 col-sm-offset-1">
                            <label for="email" class="h4">Email</label>
                            <input type="email" value="<?= isset($_POST['email']) ? $_POST['email'] : $user->email?>" name="email" class="form-control" id="email" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label for="first_name" class="h4">First Name</label>
                            <input type="text" name="first_name" class="form-control" id="first_name" maxlength="128" minlength="2" value="<?= isset($_POST['first_name']) ? $_POST['first_name'] : $user->first_name?>" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label for="last_name" class="h4">Last Name</label>
                            <input type="text" name="last_name" class="form-control" id="last_name" maxlength="128" minlength="2" value="<?= isset($_POST['last_name']) ? $_POST['last_name'] : $user->last_name?>" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label for="bio" class="h4">Bio</label>
                            <textarea rows="4" cols="50" name="bio" maxlength="350" class="form-control" id="bio" required><?= isset($_POST['bio']) ? $_POST['bio'] : $user->bio?>
                            </textarea>
                        </div>
                        <div class="form-group col-sm-4 col-sm-offset-1">
                            <label for="country" class="h4">Country</label>
                            <select name="country" class="form-control" id="country" required>
                                <?php foreach ($country as $x): ?>
                                    <?php if ($x->id == $user->country): ?>
                                        <option selected="selected" value="<?= $x->id ?>"> <?= $x->country_name ?> </option>
                                    <?php else: ?>
                                        <option value="<?= $x->id ?>"> <?= $x->country_name ?> </option>
                                    <?php endif ?>
                                    
                                <?php endforeach ?>
                            </select>

                            <label for="city" class="h4">City</label>
                            <select rows="4" cols="50" name="city" class="form-control" id="city" required>
                                <?php foreach ($city as $x): ?>
                                    <?php if ($x->id ==  $user->city): ?>
                                        <option selected="selected" value="<?= $x->id ?>"> <?= $x->city_name ?> </option>
                                    <?php else: ?>
                                        <option value="<?= $x->id ?>"> <?= $x->city_name ?> </option>
                                    <?php endif ?>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label for="type" class="h4">Type</label>
                            <select  name="type" class="form-control" id="type" required>
                                <?php foreach ($user_type as $x): ?>
                                    <?php if ($x->id ==  $user->type): ?>
                                        <option selected="selected" value="<?= $x->id ?>"> <?= $x->type_name ?> </option>
                                    <?php else: ?>
                                        <option value="<?= $x->id ?>"> <?= $x->type_name ?> </option>
                                    <?php endif ?>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <button type="submit" id="form-submit" class="btn btn-success btn-lg">Edit Values</button>
                    <div id="msgSubmit" class="h3 text-center hidden">Message Submitted!</div>
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
              </div>
            </div>



            <div class="panel panel-default">
              <div class="panel-heading">Profile Picture</div>
              <div class="panel-body">
                <div class="row">
                         <div class="form-group col-sm-3">
                            <span class="preview">
                                <a id="userprofilepicture_href" href="<?= $user->profile_picture ?>" title="" download="" data-gallery>
                                    <img id="userprofilepicture" src="<?= $user->profile_picture ?>" class="img-responsive img-thumbnail" alt="<?= $user->username; ?>" width="304" height="236">
                                </a>
                            </span>
                        </div>
                </div>
                <div class="row">
                    <?php include('uploadform.php');  ?>
                </div>
              </div>
            </div>



            <div class="panel panel-default">
              <div class="panel-heading">Social Networks</div>
              <div class="panel-body">
                <div class="col-sm-6">

                    <form id="form_social" action="javascript:void();" method="post">
                    <?php foreach ($social_network as $x): ?>
                        <div class="top-buffer input-group">
                          <span class="input-group-addon" id="basic-addon1">
                              <i class="fa fa-<?= $x->name ?>" aria-hidden="true"></i>
                          </span>
                          <input type="url" class="form-control" maxlength="250" name="<?= $x->id ?>" placeholder="<?= $x->name; ?>" value="<?= isset($user_social[$x->id]) ? $user_social[$x->id] : '' ?>">
                        </div>
                    <?php endforeach ?>

                    <button type="submit" id="form-submit" class="top-buffer btn btn-success btn-md">Save</button>
                     <div id="socialform_success" class="hide alert alert-success top-buffer"></div> 
                     <div id="socialform_fail" class="hide alert alert-warning top-buffer"></div> 
                    </form>
                </div>
              </div>
            </div>

           

            <div class="panel panel-default">
              <div class="panel-heading">Contact Info</div>
              <div class="panel-body">
                <div class="col-sm-12">
                    <form action="" method="post">
                    </form>
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label for="number" class="h4">Numbers</label>
                            <select class="form-control" id="number_add_type">
                                <option value="0"></option>
                                <?php foreach ($contact_numbers_type as $x): ?>
                                    <option value="<?= $x->id; ?>"><?= $x->name; ?></option>
                                <?php endforeach ?>
                            </select>
                            <input type="number" value="" name="number" class="form-control top-buffer" id="number_add_value">
                            <button type="" id="number_add_btn" class="top-buffer btn btn-default btn-md">ADD</button>
                        </div>
                        <div class="form-group col-sm-4 col-sm-offset-1">
                            <div class="row">
                                <table class="table">
                                <thead>
                                  <tr>
                                    <th>Type</th>
                                    <th>Number</th>
                                  </tr>
                                </thead>
                                <tbody>
                                <?php if (isset($user_contacts)): ?>
                                    <?php if (is_array($user_contacts)): ?>
                                        <?php foreach ($user_contacts as $x): ?>
                                          <tr>
                                            <td><?= $x->name ?></td>
                                            <td><?= $x->value ?></td>
                                          </tr>   
                                        <?php endforeach ?>
                                    <?php endif ?>
                                <?php endif ?>
                                </tbody>
                              </table>
                            </div>
                            <div class="row">
                                <table class="table" id="numbers_list">
                                <tbody>
                                </tbody>
                              </table>
                            </div>
                            
                        </div>
                    </div>
                    <div class="row">
                        <form id="form_contact" action="javascript:void(0);" method="post">
                        <div class="form-group col-sm-4">
                            <label for="address" class="h4">Address</label>
                            <input type="text" name="address" class="form-control" id="name"  maxlength="250" minlength="2" value="<?= isset($user->address) ? $user->address : '' ?>" required>
                        </div>
                        <div class="form-group col-sm-4 col-sm-offset-1">
                            <label for="website" class="h4">Website</label>
                            <input type="url" maxlength="250" minlength="2" value="<?= isset($user->website) ? $user->website : '' ?>" name="website" class="form-control" id="email" required="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-8">
                            <button type="submit" id="" class="top-buffer btn btn-success btn-md">Save</button>
                            <div id="contactform_success" class="hide alert alert-success top-buffer"></div>
                        </div>
                    </div>
                    </form>
                </div>
              </div>
            </div>



            <div class="panel panel-default">
              <div class="panel-heading">Media</div>
              <div class="panel-body">
                 <div class="row">
                 <?php if (isset($user_media)): ?>
                    <div class="alert alert-success">
                      This user has total of <?= count($user_media); ?> image/s 
                      <a href="<?= base_url(); ?>admin/user/media/<?= $user->username; ?>">
                          <button class="pull-right btn btn-info btn-sm"> Go To Media</button>
                      </a>
                    </div>
                 <?php else: ?>
                    <div class="alert alert-success">
                      This user has no media.
                      <a href="<?= base_url(); ?>admin/user/media/<?= $user->username; ?>">
                          <button class=" btn btn-info btn-sm"> Upload</button>
                      </a>
                    </div>
                 <?php endif ?>
                
              </div>
            </div>

        </div>
        <!-- /#page-wrapper -->


<?php include('footer.php') ?>

    
