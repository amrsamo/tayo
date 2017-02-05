<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Login</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>public/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
  
    </style>
</head>

<body style="font-family:Lucida Grande, Verdana, Geneva, Sans-serif;">

     <div class="container">
      
      <hr style="margin-top:10%">
      <div class="row">
        <div class="col-md-3 col-md-offset-4">
          <img class="img-responsive" src="<?= base_url(); ?>public/images/logo circle green.png" alt="Chania">
        </div>
      </div>
      <div class="row">
          <div class="col-md-3 col-md-offset-4">
            <form class="form-horizontal" method="post" action="#">
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Username</label>
                <div class="col-sm-12">
                  <input type="text" name="username" class="form-control" id="inputEmail3" placeholder="Email">
                </div>
              </div>
              <div class="form-group">
                <label for="inputPassword" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-12">
                  <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox"> Remember me
                    </label>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-default">Sign in</button>
                </div>
              </div>
            </form>
            <?php if (isset($error)): ?>
                    <hr>
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <div class="alert alert-danger">
                              <strong>Error!</strong> <?= $error; ?>
                            </div>
                        </div>
                    </div>
          <?php endif ?>
          </div>
      </div>
      <hr>
    </div> <!-- /container -->

   
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>public/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>public/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

</body>

</html>
