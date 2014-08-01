<?php include 'include_header.php'; ?>
<?php
$query = $db->getQuery(true);

                $query->select("p.*, CONCAT(p.photo_id, '_', p.photo_name) real_photo_name");
                $query->select("sum(l.like_type) like_sum ");
                $query->from('#__photos p');
                $query->innerJoin("#__likes l on l.photo_id = p.photo_id");
                $query->where("YEARWEEK(l.like_date) = YEARWEEK(CURDATE())");
                $query->group("l.photo_id");
                $query->order('like_sum DESC');

                $db->setQuery($query);

                try{
                    $photos = $db->loadObjectList();
                } catch (Exception $e) {
                    die();
                }
                ?>





    <div class="container">

      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-2">
			<?php include 'include_ads_left.php'; ?>
        </div>
        <div class="col-md-8">
          <h2>Trending Photos</h2>
          <?php
			if(isset($_SESSION["message"])){
			echo $_SESSION["message"];
			unset($_SESSION["message"]);
			}
			?>
            <?php if (!empty($photos)) : ?>
                <?php foreach ($photos as $photo) : ?>
                    <div class="well" style="width: 700px">
                    <img id="photo_<?php echo $photo->photo_id;?>" class="img-thumbnail" src="<?php echo $photo->photo_path . $photo->real_photo_name; ?>" style="width: 500px; box-shadow: 8px 8px 5px #888888;"/>
                    <div>
                        <h4>
                            <a href="likes.php?photo_id=<?php echo $photo->photo_id; ?>&amp;like_type=1" type="button" class="btn btn-sm btn-primary demogram_like">Like</a>
                            <a href="likes.php?photo_id=<?php echo $photo->photo_id; ?>&amp;like_type=-1" type="button" class="btn btn-sm btn-danger demogram_dislike">Dislike</a>
                        </h4>
                    </div>
                        </div>
                <?php endforeach; ?>
            <?php endif; ?>
		</div>
        <div class="col-md-2">
			<?php include 'include_ads_right.php'; ?>
        </div>
      </div>

<?php include 'include_footer.php'; ?>