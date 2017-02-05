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
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>
<!-- Page Content -->
    <div class="container content" style="background-color: white">

        <div class="row">

            <div class="col-md-2">
                <div class="list-group">
                    
                    <?php foreach ($hashtags as $x): ?>
                        <?php $class = ( (isset($active) && $active == $x->hashtag)? 'active' : '');
                     ?>
                       <a href="<?= base_url(); ?>category/<?= $x->hashtag; ?>" class="list-group-item <?= $class ?>">
                       <?= $x->hashtag; ?>
                           
                       </a> 
                    <?php endforeach ?>
                </div>
            </div>

            <div class="col-md-10">

                <div class="row carousel-holder">

                    <div class="col-md-12" style="text-align: center;">
                       <h1 style="margin-top:0px;">Search for talent by location!</h1>
                        <p>Click on a location on the map to select it. Drag the marker to change location.</p>
                        <button class="btn btn-success" onclick="getLocation();">Show Talents Near Me</button>
                        <!--map div-->
                        <div style="margin-top:1%;" id="map"></div>
                        
                        <!--our form-->
                        <!-- <h2>Chosen Location</h2>
                        <form method="post">
                            <input type="text" id="lat" readonly="yes"><br>
                            <input type="text" id="lng" readonly="yes">
                        </form> -->
                        <!-- <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img class="slide-image" src="http://placehold.it/800x300" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="http://placehold.it/800x300" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="http://placehold.it/800x300" alt="">
                                </div>
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div> -->
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

<script type="text/javascript" src="<?= base_url(); ?>public/js/map.js"></script>
<script type="text/javascript">
    
    var navbar_height = $(".navbar").height();
    var content_offset = $(".content").offset().top;

    var top_value = navbar_height-content_offset;
    $(".content").css('margin-top',top_value+'px');


    
    function loadmore_search()
{
    var max_user_id = $("#max_user_id").val();
    var q = $("#q_value").val();
    
    $("#loadmore_div").remove();
    var base_url = $("#base_url").val();
    var targetURL = base_url+'getmore_home';
    $.ajax({
        url: targetURL,
        method: "POST",
        data: { q: q, max_user_id : max_user_id }, 
        success: function(result)
        {
            // var result = jQuery.parseJSON(result);
            // alert(result[1]);
            // alert(result[0]);
            // $(".users_content").fadeOut('slow');
            $(".users_content").append(result);
            // $(".users_content").fadeIn('slow');
        }
      });
}


</script>






