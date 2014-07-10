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
			
			<?php foreach (glob("uploads/*.jpg") as $filename) : ?>
				<img class="img-thumbnail" src="<?php echo $filename; ?>" style="width: 200px"/>
			<?php endforeach; ?>
        </div>
        <div class="col-md-2">
			<?php include 'include_ads_right.php'; ?>
        </div>
      </div>

<?php include 'include_footer.php'; ?>