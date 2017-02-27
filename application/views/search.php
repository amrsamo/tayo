<?php include('header.php'); ?>

<style type="text/css">
.navbar{
    margin-bottom: 0px;
}

.list-group a:hover{
    background-color: #eb6864;
    color:white;
}

.list-group a.active{
    background-color: #eb6864;
    color:white;
}

.content{
    padding:2%;
}
body{
    font-family: "News Cycle","Arial Narrow Bold",sans-serif;
    background-color: #ecf0f1;
}

.thumbnail{
    padding: 5%;
}
#map{ height: 300px; }
</style>
<!-- Page Content -->
    <div class="container content" style="background-color: white">

        <div class="row">

            <div class="col-md-2">
                <div class="list-group">
                    
                    <?php foreach ($hashtags as $x): ?>
                        <?php $class = ( (isset($active) && $active == $x->hashtag)? 'active' : '');
                     ?>
                       <a href="<?= $current_url_querystring; ?>&category=<?= $x->hashtag; ?>" class="list-group-item <?= $class ?>">
                       <?= cleanHashtag($x->hashtag); ?>
                           
                       </a> 
                    <?php endforeach ?>
                </div>
            </div>

            <div class="col-md-10">

                <div class="row carousel-holder">

                    <div class="col-md-12" style="text-align: center;">
                       <h1 style="margin-top:0px;">Results For : <?= $q; ?></h1>
                    </div>

                </div>

                <div class="row">

                <div class="users_content">
                    <?php include('userlist.php'); ?>
                </div>
                
                
                

                    

                </div>

            </div>

        </div>

    </div>
    <!-- /.container -->

<?php include('footer.php'); ?>
<script type="text/javascript" src="<?= base_url(); ?>public/js/search.js"></script>
<script type="text/javascript">
    
    var navbar_height = $(".navbar").height();
    var content_offset = $(".content").offset().top;

    var top_value = navbar_height-content_offset;
    $(".content").css('margin-top',top_value+'px');


    
</script>






