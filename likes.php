<?php
session_start();

if(isset($_SESSION['logged_in_status']) == 0){

    echo '<strong>Sorry!</strong> You must be logged in to like or dislike photos.';

}
if(isset($_SESSION['logged_in_status']) == 1){

    if(isset($_GET['photo_id'], $_GET['like_type'])){
        require "code/vendor/autoload.php";
        require "code/includes/database.php";

        $query = $db->getQuery(true);

        $query->select('*');
        $query->from('#__likes');
        $query->where('user_id = ' . $db->quote($_SESSION['user']->user_id));
        $query->where('photo_id = ' . $db->quote($_GET['photo_id']));


        $db->setQuery($query);
        try{
            $result = $db->loadResult();
            if($result){
                //updates the existing record
                $query = $db->getQuery(true);

        $query->update('#__likes');
        $query->where('user_id = ' . $db->quote($_SESSION['user']->user_id));
        $query->where('photo_id = ' . $db->quote($_GET['photo_id']));
        if($_GET['like_type'] == 1){
            $query->set('like_type = ' . $db->quote(1));
            $outputstring = '<strong>Success!</strong> You have liked this photo.';
        }else{
            $query->set('like_type = ' . $db->quote(-1));
            $outputstring = '<strong>Success!</strong> You have disliked this photo.';
        }
        $query->set('like_date = NOW()');

        $db->setQuery($query);

        try{
            $result = $db->execute();
            echo $outputstring;


        }
        catch(RuntimeException $e){
            echo '<strong>Sorry!</strong> Your rating was not recorded.';


        }
            }else{
                //otherwise we are going to create a new record
                $query = $db->getQuery(true);

                $query->insert('#__likes');
                $query->set('user_id = ' . $db->quote($_SESSION['user']->user_id));
                $query->set('photo_id = ' . $db->quote($_GET['photo_id']));
                if($_GET['like_type'] == 1){
                    $query->set('like_type = ' . $db->quote(1));
                    $outputstring = '<strong>Success!</strong> You have liked this photo.';

                }else{
                    $query->set('like_type = ' . $db->quote(-1));
                    $outputstring = '<strong>Success!</strong> You have disliked this photo.';
                }
                $query->set('like_date = NOW()');

                $db->setQuery($query);

                try{
                    $result = $db->execute();

                    echo $outputstring;


                }
                catch(RuntimeException $e){

                    echo '<strong>Sorry!</strong> Your like was not recorded.';


                }
            }
        }
        catch(RuntimeException $e){

            echo '<strong>Sorry!</strong> Your like was not recorded.';


        }

        //

    }


}
?>
