<?php
session_start();
include('db/db.php');
?>
<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="icon" href="image/favicon.png" type="image/png">
<title>Hypnos</title>
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="vendors/linericon/style.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
<link rel="stylesheet" href="vendors/bootstrap-datepicker/bootstrap-datetimepicker.min.css">
<link rel="stylesheet" href="vendors/nice-select/css/nice-select.css">
<link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
<!-- main css -->
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/responsive.css">
</head>
<body>
        <!--================Header Area =================-->
       <?php include('common/header.php')?>
        <!--================Header Area =================-->

        <!--================Banner Area =================-->
        <section class="banner_area">
            <div class="booking_table d_flex align-items-center">
            	<div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
				<div class="container">
					<div class="banner_content text-center">
						<h6>Book your dream trip</h6>
						<h2>Relax Your Mind</h2>
                        <?php if(isset($_SESSION['userId']))
                           {
                            if($_SESSION['userId']!=null && $_SESSION['userId']!=null )
                            {?>
                                <a href="booking.php" class="btn theme_btn button_hover">reservi</a>
                            <?php
                            }else
                            {
                                ?>
                                <a href="login.php" class="btn theme_btn button_hover">yalla</a>

                           <?php }

                        }else
                        {?>
                             <a href="login.php" class="btn theme_btn button_hover">yalla

                             </a>

                       <?php }
                        ?>
					</div>
				</div>
            </div>
        </section>
        <!--================Banner Area =================-->
        
        <!--================ Accomodation Area  =================-->
        <section class="accomodation_area section_gap">
            <div class="container">
                <div class="section_title text-center">
                    <h2 class="title_color">Book A Suit</h2>
                </div>
                <div class="row mb_30">
                        <?php
                        $qryToGetSuite = "SELECT * FROM suite WHERE is_deleted=0";
                        $resOfGetSuite = mysqli_query($con,$qryToGetSuite);
                        if($resOfGetSuite)
                        {
                            if(mysqli_num_rows($resOfGetSuite)>0)
                            {
                                while($row = mysqli_fetch_array($resOfGetSuite))
                                {?>
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="accomodation_item text-center">
                                            <div class="hotel_img">
                                                <img src="image/upload/<?php echo $row['title_image']; ?>" alt="">
                                                <a href="smartBooking.php?id=<?php echo $row['id']; ?>" 
                                                class="btn theme_btn button_hover">Book Now</a>
                                            </div>
                                            <a href="#"><h4 class="sec_h4"><?php echo $row['title']; ?></h4></a>
                                            <h5>€<?php echo $row['price']; ?><small>/night</small></h5>
                                        </div>
                                    </div>
                                <?php
                                }
                            }
                        } ?>   
                </div>
            </div>
        </section>
        <!--================ Accomodation Area  =================-->
        
        <!--================ Facilities Area  =================-->
        <section class="facilities_area section_gap">
            <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background="">  
            </div>
            <div class="container">
                <div class="section_title text-center">
                    <h2 class="title_w">Hypnos Facilities</h2>
                </div>
                <div class="row mb_30">
                    <div class="col-lg-4 col-md-6">
                        <div class="facilities_item">
                            <h4 class="sec_h4"><i class="lnr lnr-dinner"></i>Restaurant</h4>
                            <p>Every hotel have a beautiful restaurant with french luxury food</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="facilities_item">
                            <h4 class="sec_h4"><i class="lnr lnr-bicycle"></i>Sports CLub</h4>
                            <p>Stay in shape with the sport coach.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="facilities_item">
                            <h4 class="sec_h4"><i class="lnr lnr-shirt"></i>Swimming Pool and Spa</h4>
                            <p>At disposal.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="facilities_item">
                            <h4 class="sec_h4"><i class="lnr lnr-car"></i>Rent a Car</h4>
                            <p>In the reception desk, it's possible to rent a beatiful car.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="facilities_item">
                            <h4 class="sec_h4"><i class="lnr lnr-construction"></i>Gymnesium</h4>
                            <p>Every hotel have a training room.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="facilities_item">
                            <h4 class="sec_h4"><i class="lnr lnr-coffee-cup"></i>Bar</h4>
                            <p>Luxury Bar for drink cocktail with your partner.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================ Facilities Area  =================-->
        
        <!--================ Latest Blog Area  =================-->
        <section class="latest_blog_area section_gap">
            <div class="container">
                <div class="section_title text-center">
                    <h2 class="title_color">Our Hotels</h2>
                    <p>The French Revolution constituted for the conscience of the dominant aristocratic class a fall from : </p>
                </div>
                <div class="row mb_30">
                    <div class="col-lg-4 col-md-6">
                        <div class="single-recent-blog-post">
                            <div class="thumb">
                                <img class="img-fluid" src="image/hypnose/althoff/107677301.jpeg" alt="post">
                            </div>
                            <div class="details">
                                <a href="#"><h4 class="sec_h4">Althoff Hotel Villa Belrose</h4></a>
                            </div>	
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="single-recent-blog-post">
                            <div class="thumb">
                                <img class="img-fluid" src="image/hypnose/hotelbarriere/308389565.jpeg" alt="post">
                            </div>
                            <div class="details">
                                <a href="#"><h4 class="sec_h4">Hôtel Barrière Le Majestic</h4></a>
                            </div>	
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="single-recent-blog-post">
                            <div class="thumb">
                                <img class="img-fluid" src="image/hypnose/lacour/311719911.jpeg" alt="post">
                            </div>
                            <div class="details">
                                <a href="#"><h4 class="sec_h4">La Cour des Consuls Hôtel and Spa</h4></a>
                            </div>	
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="single-recent-blog-post">
                            <div class="thumb">
                                <img class="img-fluid" src="image/hypnose/mhotel/153074732.jpeg" alt="post">
                            </div>
                            <div class="details">
                                <a href="#"><h4 class="sec_h4">M Social Hotel Paris Opera</h4></a>
                            </div>	
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="single-recent-blog-post">
                            <div class="thumb">
                                <img class="img-fluid" src="image/hypnose/palaisgallien/320222622.jpeg" alt="post">
                            </div>
                            <div class="details">
                                <a href="#"><h4 class="sec_h4">Le Palais Gallien Hôtel & Spa)</h4></a>
                            </div>	
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="single-recent-blog-post">
                            <div class="thumb">
                                <img class="img-fluid" src="image/hypnose/reservebeaulieu/245833070.jpeg" alt="post">
                            </div>
                            <div class="details">
                                <a href="#"><h4 class="sec_h4">La Réserve de Beaulieu</h4></a>
                            </div>	
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="single-recent-blog-post">
                            <div class="thumb">
                                <img class="img-fluid" src="image/hypnose/174360688.jpeg" alt="post">
                            </div>
                            <div class="details">
                                <a href="#"><h4 class="sec_h4">Royal Madeleine Hôtel & Spa</h4></a>
                            </div>	
                        </div>
                    </div>
                   
                </div>
            </div>
        </section>
        <!--================ Recent Area  =================-->
        
        <!--================ start footer Area  =================-->	
       <?php include('common/footer.php')?>
		<!--================ End footer Area  =================-->
        
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="vendors/owl-carousel/owl.carousel.min.js"></script>
<script src="js/jquery.ajaxchimp.min.js"></script>
<script src="js/mail-script.js"></script>
<script src="vendors/bootstrap-datepicker/bootstrap-datetimepicker.min.js"></script>
<script src="vendors/nice-select/js/jquery.nice-select.js"></script>
<script src="js/mail-script.js"></script>
<script src="js/stellar.js"></script>
<script src="vendors/lightbox/simpleLightbox.min.js"></script>
<script src="js/custom.js"></script>
    </body>
</html>