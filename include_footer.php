
      <hr>

      <footer>
        <p>&copy; Demogram 2014</p>
          <p class="pull-right"><a href="#">Back to top</a></p>
      </footer>
      <div class="modal fade" id="comment_modal" role="dialog">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h4>Comments</h4>
                  </div>
                   <div class="modal-body">
                       <p>
                           <?php
                           if(isset($_POST['comment'])){

                               $query = $db->getQuery(true);

                               $query->insert('#__comments');
                               $query->set('comment = ' . $db->quote($_POST['comment']));
                               $query->set('comment_writer = ' . $db->quote($_SESSION['user']->user_username));

                               $db->setQuery($query);

                               try{
                                   $result = $db->execute();

                                   if($result){
                                       echo $_POST['comment'];
                                   }
                               } catch(RuntimeException $e){
                                   $e->getCode() . ' ' . $e->getMessage();
                               }
                           }
                           ?>


                       </p>
                   </div>
                  <div class="modal-footer">
                      <form method = "post" role="form">
                          <input type="text" name="comment" class="form-control" placeholder="Type a comment..." required autofocus>
                          <input type="submit" name="submit" value="Submit" class="btn btn-xs btn-default">
                      </form>
                  </div>
              </div>
          </div>
      </div>
    </div> <!-- /container -->        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.0.min.js"><\/script>')</script>

        <script src="js/vendor/bootstrap.min.js"></script>
        <script src="js/jquery.bootstrap-growl.js"></script>
        <script src="js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X');ga('send','pageview');
        </script>
    </body>
</html>
