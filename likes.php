<?php
session_start();

if(isset($_SESSION['logged_in_status']) == 0){
    header("location: " . $_SERVER['HTTP_REFERER']);

    $_SESSION['message'] = '';
    $_SESSION['message'] .= '<div class="alert alert-danger" role="alert">';
    $_SESSION['message'] .= '<strong>Sorry!</strong> You must be logged in to like or dislike photos.';
    $_SESSION['message'] .= '</div>';

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
        }else{
            $query->set('like_type = ' . $db->quote(-1));
        }
        $query->set('like_date = NOW()');

        $db->setQuery($query);

        try{
            $result = $db->execute();
            header("location: " . $_SERVER['HTTP_REFERER']);
            $_SESSION['message'] = '';
            $_SESSION['message'] .= '<div class="alert alert-success" role="alert">';
            $_SESSION['message'] .= '<strong>Success!</strong> Your rating has been updated.';
            $_SESSION['message'] .= '</div>';

        }
        catch(RuntimeException $e){
            header("location: " . $_SERVER['HTTP_REFERER']);
            $_SESSION['message'] = '';
            $_SESSION['message'] .= '<div class="alert alert-danger" role="alert">';
            $_SESSION['message'] .= '<strong>Sorry!</strong> Your rating was not recorded.';
            $_SESSION['message'] .= '</div>';

        }
            }else{
                //otherwise we are going to create a new record
                $query = $db->getQuery(true);

                $query->insert('#__likes');
                $query->set('user_id = ' . $db->quote($_SESSION['user']->user_id));
                $query->set('photo_id = ' . $db->quote($_GET['photo_id']));
                if($_GET['like_type'] == 1){
                    $query->set('like_type = ' . $db->quote(1));
                }else{
                    $query->set('like_type = ' . $db->quote(-1));
                }
                $query->set('like_date = NOW()');

                $db->setQuery($query);

                try{
                    $result = $db->execute();
                    header("location: " . $_SERVER['HTTP_REFERER']);
                    $_SESSION['message'] = '';
                    $_SESSION['message'] .= '<div class="alert alert-success" role="alert">';
                    $_SESSION['message'] .= '<strong>Success!</strong> Your rating has been recorded.';
                    $_SESSION['message'] .= '</div>';

                }
                catch(RuntimeException $e){
                    header("location: " . $_SERVER['HTTP_REFERER']);
                    $_SESSION['message'] = '';
                    $_SESSION['message'] .= '<div class="alert alert-danger" role="alert">';
                    $_SESSION['message'] .= '<strong>Sorry!</strong> Your like was not recorded.';
                    $_SESSION['message'] .= '</div>';

                }
            }
        }
        catch(RuntimeException $e){
            header("location: " . $_SERVER['HTTP_REFERER']);
            $_SESSION['message'] = '';
            $_SESSION['message'] .= '<div class="alert alert-danger" role="alert">';
            $_SESSION['message'] .= '<strong>Sorry!</strong> Your like was not recorded.';
            $_SESSION['message'] .= '</div>';

        }

        //

    }


}
?>
