<?php include('header.php') ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Users</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <div class="row">
                <table id="users_DataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th style="width:14%">User ID</th>
                            <th style="width:14%">Username</th>
                            <th style="width:14%">Email</th>
                            <th style="width:14%">Type</th>
                            <th style="width:14%">Creation Date</th>
                            <th style="width:14%">Valid</th>
                        </tr>
                    </thead>
             
                    <tfoot>
                        <tr>
                            <th style="width:14%">User ID</th>
                            <th style="width:14%">Username</th>
                            <th style="width:14%">Email</th>
                            <th style="width:14%">Type</th>
                            <th style="width:14%">Creation Date</th>
                            <th style="width:14%">Valid</th>
                        </tr>
                    </tfoot>
             
                    <tbody>
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td><?= $user->id ?></td>
                                <td>
                                    <a href="<?= base_url(); ?>admin/user/<?= $user->username ?>">
                                        <?= $user->username ?>
                                    </a>
                                </td>
                                <td><?= $user->email ?></td>
                                <td>
                                    <?php foreach ($user_type as $type): ?>
                                        <?php if ($type->id == $user->type): ?>
                                            <?= $type->type_name ?>
                                        <?php endif ?>
                                    <?php endforeach ?>
                                </td>
                                <td><?= $user->creation_date ?></td>
                                <td><?= $user->is_valid ?></td>
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
        $('#users_DataTable').DataTable({
            "length" : 100
        });
    });
</script>
    
