<?php include 'include_header.php'; ?>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-2">
			<?php include 'include_ads_left.php'; ?>
        </div>
        <div class="col-md-8">
          <h2>Newest Photos</h2>
          <?php
			if(isset($_SESSION["message"])){
			echo $_SESSION["message"];
			unset($_SESSION["message"]);
			}
			?>
			<?php

                $query = $db->getQuery(true);

                $query->select("p.*, CONCAT(p.photo_id, '_', p.photo_name) real_photo_name");
                $query->select("p.*, photo_caption");
                $query->from('#__photos p');
                $query->order('p.photo_id DESC');
                $query->order('p.photo_caption');


                $db->setQuery($query);

                try{
                    $photos = $db->loadObjectList();
                } catch (Exception $e) {
                    die();
                }

                $query = $db->getQuery(true);

                $query->select("p.*, user_username");
                $query->from('#__users p');
                $query->order('p.user_username');

                $db->setQuery($query);

                try{
                    $users = $db->loadObjectList();
                } catch (Exception $e) {
                    die();
                }

            ?>
            <?php if (!empty($photos)) : ?>
			    <?php foreach ($photos as $photo) : ?>
                    <div class="well" style="width: 700px">
                        <h3><a href="<?php echo $photo->photo_path . $photo->real_photo_name; ?>" target="_blank" style="text-decoration: none; color: #000000;"><strong><?php echo $photo->photo_caption ?></strong></a></h3>
				    <img id="photo_<?php echo $photo->photo_id;?>" class="img-thumbnail" src="<?php echo $photo->photo_path . $photo->real_photo_name; ?>" style="width: 500px; box-shadow: 8px 8px 5px #888888;"/>
                    <div>
                        <h4>
                            <a href="likes.php?photo_id=<?php echo $photo->photo_id; ?>&amp;like_type=1" type="button" style="box-shadow: 4px 4px 5px #888888;" class="btn btn-xs btn-primary demogram_like">Like</a>
                            <a href="likes.php?photo_id=<?php echo $photo->photo_id; ?>&amp;like_type=-1" type="button" style="box-shadow: 4px 4px 5px #888888;" class="btn btn-xs btn-danger demogram_dislike">Dislike</a>
                            <a href="#comment_modal" data-toggle="modal" type="button" style="box-shadow: 4px 4px 5px #888888;" class="btn btn-xs btn-success">Comment</a>

                        </h4>
                    </div>
                    <?php foreach ($users as $user) : ?>
                        <label> Uploaded By: <?php echo $user->user_id; ?></label>
                        <?php endforeach; ?>
                    </div>
			    <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <div class="col-md-2">
			<?php include 'include_ads_right.php'; ?>
        </div>
      </div>

<?php include 'include_footer.php'; ?>