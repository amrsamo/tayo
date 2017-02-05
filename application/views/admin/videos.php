<?php include('header.php') ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Videos</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <div class="row">
                <table id="videos_DataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th style="width:30%">Title</th>
                            <th style="width:14%">Duration</th>
                            <th style="width:14%">User ID</th>
                            <th style="width:14%">Video ID</th>
                            <th style="width:14%">Create date</th>
                            <th style="width:14%">Views</th>
                        </tr>
                    </thead>
             
                    <tfoot>
                        <tr>
                            <th>Title</th>
                            <th>Duration</th>
                            <th>User ID</th>
                            <th>Video ID</th>
                            <th>Create date</th>
                            <th>Views</th>
                        </tr>
                    </tfoot>
             
                    <tbody>
                        <?php foreach ($videos as $video): ?>
                            <tr>
                                <td><a href="<?php echo base_url(); ?>video/<?= $video->video_id; ?>"><?= $video->title ?></a></td>
                                <td><?= $video->duration ?></td>
                                <td><?= $video->user_id ?></td>
                                <td><?= $video->video_id ?></td>
                                <td><?= $video->create_date ?></td>
                                <td><?= $video->views ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /#page-wrapper -->



<?php include('footer.php') ?>

<script>
    $(document).ready(function() {
        $('#videos_DataTable').DataTable({
            "length" : 100
        });
    });
</script>
    
