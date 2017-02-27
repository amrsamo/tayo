<?php foreach ($users as $user): ?>
    <div class="col-sm-4 col-lg-4 col-md-4">
        <div class="thumbnail" style="height:400px;">
            <img class="img-circle" style="height:150px;width:150px;" src="<?= $user->profilePicUrl ?>" alt="">
            <div class="caption">
                <h4><a target="_blank" href="<?= $user->url; ?>"><?= $user->username ?></a>
                <h4 style="font-size: 100%;">
                    
                    <?php 
                    if (strpos($user->email, '@') !== false) {
                            echo $user->email;
                    }
                    elseif($user->externalUrl != "")
                    {
                     echo '<a href="'.$user->externalUrl.'" target="_blank">'.$user->externalUrl.'</a>';
                    }
                    else
                    {
                        echo $user->biography;
                    }
                    ?>

                </h4>
                <h4 style="font-size: 80%;margin-top: 15%;">
                    <span style="padding:5%;background-color: #ecf0f1">
                        <?= cleanHashtag($user->hashtag); ?>
                    </span>
                </h4>
                </h4>
                <p>
                    <!-- <?= htmlspecialchars_decode(utf8_decode($user->biography)) ?> -->
                </p>
            </div>
            <div class="ratings" style="margin-top: 10%;">
                <p><?= $user->followers ?> followers
                 , 
                <span>
                    <?= $user->location; ?>
                </span>
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