<?php include 'include_header.php'; ?>




    <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="item active">
                <img src="http://i.imgur.com/2YDvzYW.jpg" class="img-responsive" style="width:100%; height:500px">
                <div class="container">
                    <div class="carousel-caption">
                        <h1><?php echo $_SESSION['user']->user_username; ?></h1>
                        <pthis is="" an="" example="" layout="" with="" carousel="" that="" uses="" the="" bootstrap="" 3="" styles.<="" small=""><p></p>
                        <p>
                        </p></pthis></div>
                </div>
            </div>
            <div class="item">
                <img src="http://www.disclosurenewsonline.com/wp-content/uploads/2013/09/712129main_8247975848_88635d38a1_o.jpg" class="img-responsive" style="width:100%; height:500px">
                <div class="container">
                    <div class="carousel-caption">
                        <h1>Changes to the Grid</h1>
                        <p></p>
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="http://i.imgur.com/B47fisQ.jpg" class="img-responsive" style="width:100%; height:500px">
                <div class="container">
                    <div class="carousel-caption">
                        <h1>Percentage-based sizing</h1>
                    </div>
                </div>
            </div>
        </div>
        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>
    </div>
    <!-- /.carousel -->


    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->
<div class="container">
    <div class="container marketing">

        <!-- Three columns of text below the carousel -->
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="well well-sm">
                        <div class="row">
                            <div class="col-sm-6 col-md-4">
                                <img src="http://placehold.it/380x500" alt="" class="img-rounded img-responsive" />
                            </div>
                            <div class="col-sm-6 col-md-8">
                                <h4>
                                    <?php echo $_SESSION['user']->user_first_name; ?> <?php echo $_SESSION['user']->user_last_name; ?></h4>
                                <small><cite title="San Francisco, USA">San Francisco, USA <i class="glyphicon glyphicon-map-marker">
                                        </i></cite></small>
                                <p>
                                    <i class="glyphicon glyphicon-envelope"></i><?php echo $_SESSION['user']->user_email; ?>
                                    <br />
                                    <i class="glyphicon glyphicon-globe"></i><a href="http://www.jquery2dotnet.com">www.jquery2dotnet.com</a><a class="editForm"  href="#" rel="async-post"> Edit</a>
                                    <br />
                                    <i class="glyphicon glyphicon-gift"></i>June 02, 1988</p>
                                <!-- Split button -->
                                <!--<div class="btn-group">
                                    <button type="button" class="btn btn-primary">
                                        Social</button>
                                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                        <span class="caret"></span><span class="sr-only">Social</span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Twitter</a></li>
                                        <li><a href="https://plus.google.com/+Jquery2dotnet/posts">Google +</a></li>
                                        <li><a href="https://www.facebook.com/jquery2dotnet">Facebook</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Github</a></li>
                                    </ul>
                                </div>-->
                                <a href="signin.php" class="btn btn-success">Follow</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!-- START THE FEATURETTES -->

        <hr class="featurette-divider">

        <div class="featurette">
            <img class="featurette-image img-circle pull-right" src="http://placehold.it/512">
            <h2 class="featurette-heading">Responsive Design. <span class="text-muted">It'll blow your mind.</span></h2>
            <p class="lead">In simple terms, a responsive web design figures out what resolution of device it's being served on. Flexible grids then size correctly to fit the screen.</p>
        </div>

        <hr class="featurette-divider">

        <div class="featurette">
            <img class="featurette-image img-circle pull-left" src="http://placehold.it/512">
            <h2 class="featurette-heading">Smaller Footprint. <span class="text-muted">Lightweight.</span></h2>
            <p class="lead">The new Bootstrap 3 promises to be a smaller build. The separate Bootstrap base and responsive.css files have now been merged into one. There is no more fixed grid, only fluid.</p>
        </div>

        <hr class="featurette-divider">

        <div class="featurette">
            <img class="featurette-image img-circle pull-right" src="http://placehold.it/512">
            <h2 class="featurette-heading">And lastly, this one. <span class="text-muted">Flatness.</span></h2>
            <p class="lead">A big design trend for 2013 is "flat" design. Gone are the days of excessive gradients and shadows. Designers are producing cleaner flat designs, and Bootstrap 3 takes advantage of this minimalist trend.</p>
        </div>

        <hr class="featurette-divider">

        <!-- /END THE FEATURETTES -->




    </div><!-- /.container -->
    </div>

    <?php include 'include_footer.php'; ?>