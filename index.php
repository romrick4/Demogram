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
                $query->from('#__photos p');
                $query->order('p.photo_id DESC');

                $db->setQuery($query);

                try{
                    $photos = $db->loadObjectList();
                } catch (Exception $e) {
                    die();
                }

            ?>
            <?php if (!empty($photos)) : ?>
			    <?php foreach ($photos as $photo) : ?>
				    <img class="img-thumbnail" src="<?php echo $photo->photo_path . $photo->real_photo_name; ?>" style="width: 500px"/>
			    <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <div class="col-md-2">
			<?php include 'include_ads_right.php'; ?>
        </div>
      </div>

<?php include 'include_footer.php'; ?>