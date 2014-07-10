<?php include 'include_header.php'; ?>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-2">
			<?php include 'include_ads_left.php'; ?>
        </div>
        <div class="col-md-8">
          <h2>Upload Photos</h2>
          <?php			
			//if they DID upload a file...
			if($_FILES['photo']['name'])
			{
				//if no errors...
				if(!$_FILES['photo']['error'])
				{
					$valid_file = true;
					//now is the time to modify the future file name and validate the file
					$new_file_name = strtolower($_FILES['photo']['name']); //rename file
					if($_FILES['photo']['size'] > (1024000)) //can't be larger than 1 MB
					{
						$valid_file = false;
						$_SESSION['message'] = '';
						$_SESSION['message'] .= '<div class="alert alert-warning" role="alert">';
							$_SESSION['message'] .= '<strong>Oops!</strong> Your file\'s size is to large.';
						$_SESSION['message'] .= '</div>';
					}
					
					//if the file has passed the test
					if($valid_file)
					{
						//move it to where we want it to be
						move_uploaded_file($_FILES['photo']['tmp_name'], 'uploads/'.$new_file_name);
						$_SESSION['message'] = '';
						$_SESSION['message'] .= '<div class="alert alert-success" role="alert">';
							$_SESSION['message'] .= '<strong>Congratulations!</strong> Your file was accepted.';
						$_SESSION['message'] .= '</div>';
					}
				}
				//if there is an error...
				else
				{
					//set that to be the returned message
					$_SESSION['message'] = '';
					$_SESSION['message'] .= '<div class="alert alert-danger" role="alert">';
						$_SESSION['message'] .= '<strong>Oops!</strong> Your upload triggered the following error:  '.$_FILES['photo']['error'];
					$_SESSION['message'] .= '</div>';
					
				}
			}
			
			if(isset($_SESSION["message"]))
			{
				echo $_SESSION["message"];
				unset($_SESSION["message"]);
			}
?>
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
				Your Photo: <input type="file" name="photo" size="25" />
				<input type="submit" name="submit" value="Submit" />
			</form>
		</div>
        <div class="col-md-2">
			<?php include 'include_ads_right.php'; ?>
        </div>
      </div>

<?php include 'include_footer.php'; ?>