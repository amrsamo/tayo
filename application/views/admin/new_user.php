<?php include('header.php') ?>
        <div id="page-wrapper">
            
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">User/New</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <div class="row">
                <?php if (!isset($success)): ?>
                <form action="" method="post">
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label for="username" class="h4">Username</label>
                            <input type="text" name="username" class="form-control" id="name"  maxlength="64" minlength="4" required>
                        </div>
                        <div class="form-group col-sm-4 col-sm-offset-1">
                            <label for="password" class="h4">Password</label>
                            <input type="password" name="password" class="form-control" id="password" maxlength="128" minlength="4" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label for="email" class="h4">Email</label>
                            <input type="email" name="email" class="form-control" id="email" required>
                        </div>
                        <div class="form-group col-sm-4 col-sm-offset-1">
                            <label for="verify" class="h4">Verify Password</label>
                            <input type="password" name="verify" class="form-control" id="verify" maxlength="128" minlength="4" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label for="first_name" class="h4">First Name</label>
                            <input type="text" name="first_name" class="form-control" id="first_name" maxlength="128" minlength="2" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label for="last_name" class="h4">Last Name</label>
                            <input type="text" name="last_name" class="form-control" id="last_name" maxlength="128" minlength="2" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label for="bio" class="h4">Bio</label>
                            <textarea rows="4" cols="50" name="bio" class="form-control" id="bio" required></textarea>
                        </div>
                        <div class="form-group col-sm-4 col-sm-offset-1">
                            <label for="country" class="h4">Country</label>
                            <select name="country" class="form-control" id="country" required>
                                <?php foreach ($country as $x): ?>
                                    <?php if ($x->country_name == 'Egypt'): ?>
                                        <option selected="selected" value="<?= $x->id ?>"> <?= $x->country_name ?> </option>
                                    <?php else: ?>
                                        <option value="<?= $x->id ?>"> <?= $x->country_name ?> </option>
                                    <?php endif ?>
                                    
                                <?php endforeach ?>
                            </select>

                            <label for="city" class="h4">City</label>
                            <select rows="4" cols="50" name="city" class="form-control" id="city" required>
                                <?php foreach ($city as $x): ?>
                                    <option value="<?= $x->id ?>"> <?= $x->city_name ?> </option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label for="type" class="h4">Type</label>
                            <select  name="type" class="form-control" id="type" required>
                                <?php foreach ($user_type as $x): ?>
                                        <option value="<?= $x->id ?>"> <?= $x->type_name ?> </option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <button type="submit" id="form-submit" class="btn btn-success btn-lg">Submit</button>
                    <div id="msgSubmit" class="h3 text-center hidden">Message Submitted!</div>
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
                              <a href="<?= base_url(); ?>admin/user/<?= $username ?>">
                                  <?= $username ?>
                              </a>
                            </div>
                        </div>
                    </div>
                <?php endif ?>
            </div>
            
            
            
        </div>
        <!-- /#page-wrapper -->


<?php include('footer.php') ?>

    
