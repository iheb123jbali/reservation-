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
        
        <!--================ Accomodation Area  =================-->
        <section class="accomodation_area section_gap">
            <div class="container">
                <div class="section_title text-center">
                    <h2 class="title_color">Book A Suit</h2>
                    <p>We all live in an age that belongs to the young at heart. Life that is becoming extremely fast, </p>
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
                        {
                ?>
                            <div class="col-lg-3 col-sm-6">
                                <div class="accomodation_item text-center">
                                    <div class="hotel_img">
                                        <img src="image/upload/<?php echo $row['title_image']; ?>" alt="">
                                        <a href="smartBooking.php?id=<?php echo $row['id']; ?>" 
                                        class="btn theme_btn button_hover">Book Now</a>
                                    </div>
                                    <a href="#"><h4 class="sec_h4"><?php echo $row['title']; ?></h4></a>
                                    <h5>$<?php echo $row['price']; ?><small>/night</small></h5>
                                </div>
                            </div>


                <?php
                        }
                    }
                }
                
                ?>
                </div>
            </div>
        </section>
<!--================ start footer Area  =================-->	
<?php include('common/footer.php')?>
<!--================ End footer Area  =================-->
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