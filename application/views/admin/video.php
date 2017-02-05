<?php include('header.php') ?>
<script src='<?php echo base_url(); ?>public/js/HkcEANI0EeO+diIACrqE1A.js'></script>
<script>jwplayer.key="XGdqDrPpGaekuPVmdKIYnI/guGliLkihtQm6Dw==";</script>

        <div id="page-wrapper">
            
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?= $video->title; ?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
            <div class="row">
                <div class="col-lg-6">
                    <!-- VIDEO PLAYBACK -->
                    <div class='video-playback'>
                        <div class='video-container'>
                            <div id='video-<?= $video->video_id; ?>'>
                            </div>
                        </div>
                    </div>
                    <!-- END VIDEO PLAYBACK -->
                </div>
                <div class="col-lg-6">
                    
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <?php if ($video->featured != 1): ?>
                        <button type="button" id="setFeaturedBtn" class="btn btn-primary">Set as FeaturedVideo</button>
                    <?php else: ?>
                        <button type="button" id="removeFeaturedBtn" class="btn btn-warning">Remove as FeaturedVideo</button>
                    <?php endif ?>
                    <!-- <button type="button" class="btn btn-warning">Edit Video</button> -->
                    <button type="button" id="deleteBtn" class="btn btn-danger">Delete Video</button>
                </div>
            </div>
        </div>
        <!-- /#page-wrapper -->



<?php include('footer.php') ?>

<script type="text/javascript">

$("#setFeaturedBtn").click(function(){
    var confirmBTN = confirm("Are You Sure?");
    if (confirmBTN == true) {
        $.ajax({
            url: "<?php echo base_url(); ?>setFeatured/<?= $video->video_id; ?>",
            type: "POST",
            success: function(result){
             if(result == 'success')
             {
                location.reload();
             }
        }});
    }
});


$("#removeFeaturedBtn").click(function(){
    var confirmBTN = confirm("Are You Sure?");
    if (confirmBTN == true) {
        $.ajax({
            url: "<?php echo base_url(); ?>removeFeatured/<?= $video->video_id; ?>",
            type: "POST",
            success: function(result){
             if(result == 'success')
             {
                location.reload();
             }
        }});
    }
});

$("#deleteBtn").click(function(){
    var confirmBTN = confirm("Are You Sure?");
    if (confirmBTN == true) {
        $.ajax({
            url: "<?php echo base_url(); ?>delete/<?= $video->video_id; ?>",
            type: "POST",
            success: function(result){
                window.location.href = "<?php echo base_url(); ?>videos";
        }});
    }
});


<?php 
    // printme($video_files);
    // exit();
 ?>
var file  = "<?= $video_files['mp4']['url'];  ?>";
var file_lifeIsBig  = "<?= $video_files['mp4_2']['url'];  ?>";
var image = "<?= $video_images['image'];  ?>";

jwplayer('video-<?= $video->video_id; ?>').setup(
{
    playlist:
    [{
    image: image,
    sources: [{ 
            file: file
        },{
            file: file_lifeIsBig
        }]
    }],
  primary: 'flash',
  width: "100%",
  height:"100%",
  aspectratio: "16:9",
  ga: {},
  events:
  {
      onReady: function(e)
      {
        opt_event('vload');
        },
        onBeforePlay: function(e)
        {
            opt_event('adrequest');
        },
        onAdImpression: function(e)
        {
            opt_event('adstart');
        },
        onAdClick: function(e)
        {
            opt_event('adclick');
        },
        onAdComplete: function(e)
        {
            opt_event('adcomplete');        
        }
  }
});
</script>
    
