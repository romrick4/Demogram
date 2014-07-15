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
			if(isset($_FILES['photo']['name']))
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
                        // Base File Path for All Uploads:
                        $base_path = 'uploads/';

                        // Extract Useful pieces of the filename:
                        $photo_parts = pathinfo($new_file_name);

                        // Create variables for Insert Query:
                        $photo_name = $photo_parts['basename'];
                        $photo_filetype = $photo_parts['extension'];
                        $photo_filename = $photo_parts['filename'];
                        $photo_path = $base_path . $photo_filename[0] . '/';

                        // Create Insert Query
                        $query = $db->getQuery(true);

                        $query->insert('#__photos');
                        $query->set('photo_name = ' . $db->quote($photo_name));
                        $query->set('photo_path = ' . $db->quote($photo_path));
                        $query->set('photo_filename = ' . $db->quote($photo_filename));
                        $query->set('photo_filetype = ' . $db->quote($photo_filetype));
                        $query->set('photo_added_on_date = NOW()');

                        $db->setQuery($query);

                        try{
                            $result = $db->execute();

                            if($result){
                                $photo_id = $db->insertid();
                                    if(!file_exists($photo_path)){
                                        mkdir($photo_path);
                                    }
                                //move it to where we want it to be
                                move_uploaded_file($_FILES['photo']['tmp_name'], $photo_path . $photo_id . '_' . $new_file_name);
                                $_SESSION['message'] = '';
                                $_SESSION['message'] .= '<div class="alert alert-success" role="alert">';
                                    $_SESSION['message'] .= '<strong>Congratulations!</strong> Your file was accepted.';
                                $_SESSION['message'] .= '</div>';
                            }
                        } catch (Exception $e) {
                            $_SESSION['message'] = '';
                            $_SESSION['message'] .= '<div class="alert alert-danger" role="alert">';
                                $_SESSION['message'] .= '<strong>Oops!</strong> A Database Error Occurred';
                            $_SESSION['message'] .= '</div>';

                        }

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
        <?php if(isset($_SESSION['logged_in_status']) == 0) : ?>
            <div class="alert alert-warning" role="alert">
                You must be logged in to upload photos!
            </div>
        <?php else : ?>
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
				Your Photo: <input type="file" name="photo" size="25" />
				<input type="submit" name="submit" value="Submit" />
			</form>
        <?php endif; ?>
		</div>
        <div class="col-md-2">
			<?php include 'include_ads_right.php'; ?>
        </div>
      </div>

<?php include 'include_footer.php'; ?>