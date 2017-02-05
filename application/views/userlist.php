<?php foreach ($users as $user): ?>
    <div class="col-sm-4 col-lg-4 col-md-4">
        <div class="thumbnail" style="height:320px;">
            <img class="img-circle" style="height:150px;width:150px;" src="<?= $user->profilePicUrl ?>" alt="">
            <div class="caption">
                <h4><a target="_blank" href="<?= $user->url; ?>"><?= $user->username ?></a>
                <h4 class=""><?= $user->hashtag ?></h4>
                </h4>
                <p>
                    <!-- <?= htmlspecialchars_decode(utf8_decode($user->biography)) ?> -->
                </p>
            </div>
            <div class="ratings">
                <p class="pull-right"><?= $user->followers ?> followers</p>
                <p>
                    <?= $user->location; ?>
                </p>
            </div>
        </div>
    </div>
<?php endforeach ?>
<div class="col-sm-12" id="loadmore_div" style="text-align: center;">
    <input type="hidden" id="max_user_id" value="<?= $max_user_id; ?>">
    <input type="hidden" id="q_value" value="<?= $q; ?>">
    <button  class=" btn btn-primary" onclick="loadmore_search();" type="">
    Load More</button>
</div>