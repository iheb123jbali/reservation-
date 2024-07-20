<?php
session_start();
include('db/db.php');

if (isset($_POST['btnSubmit']) )  
{
    $topic = $_POST['ddTopic'];
    $surName  = $_POST['txtSurName'];
    $firstName       = $_POST['txtFirstName'];
    $subject    = $_POST['txtSubject'];
    $email         = $_POST['txtEmail']; 
    $msg        = $_POST['txtMessage'];  
    $updatquery = "INSERT INTO `customer_reviews`(`sur_name`, `first_name`, `topic`, `email`, `subject`, `message`,
     `created_on`, `is_deleted`) VALUES ('$surName','$firstName','$topic','$email','$subject','$msg',unix_timestamp()*1000,0)";
    $updatres =mysqli_query($con,$updatquery);
    if ($updatres) 
      {
        echo "<script>alert('Your message has been sent to admin, Thanks');window.location='customerProfile.php'</script>";
      }
}
?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="image/favicon.png" type="image/png">
        <title>Hypnos Contact</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="vendors/linericon/style.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
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
        
        <!--================Breadcrumb Area =================-->
        <section class="breadcrumb_area">
            <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="page-cover text-center">
                    <h2 class="page-cover-tittle">Contact Us</h2>
                    <ol class="breadcrumb">
                        <li><a href="index.html">Home</a></li>
                        <li class="active">Contact Us</li>
                    </ol>
                </div>
            </div>
        </section>
        <!--================Breadcrumb Area =================-->
        
        <!--================Contact Area =================-->
        <section class="contact_area section_gap">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="contact_info">
                            <div class="info_item">
                                <i class="lnr lnr-home"></i>
                                <h6>Marozza Bastien 199 route sous la ville</h6>
                                <p>74330 Sillingy/France</p>
                            </div>
                            <div class="info_item">
                                <i class="lnr lnr-phone-handset"></i>
                                <h6><a href="#">06 43 31 16 85</a></h6>
                            </div>
                            <div class="info_item">
                                <i class="lnr lnr-envelope"></i>
                                <h6><a href="#"> basti74600@hotmail.fr</a></h6>
                                <p>Send us your query anytime!</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <form class="row contact_form" action="#" method="POST">
                             
                            <div class="col-md-6">
                                 <div class="form-group" >
                                    <select class="mb-2 w-100" name="ddTopic" >
                                        <option value="0" >Select Topic</option>
                                        <option value="I want to make a complaint" >I want to make a complaint</option>
                                        <option value="I want to order an additional service"> I want to order an additional service</option>
                                        <option value=" I want to know more about a suite" >I want to know more about a suite</option>
                                    </select>
                                </div>
                               <div class="form-group">
                                    <input type="text" class="form-control" id="name" name="txtSurName" placeholder="Enter your surname" required>
                                </div> 
                                <div class="form-group">
                                    <input type="text" class="form-control" id="name" name="txtFirstName" placeholder="Enter your first name" required>
                                </div>
                                
                                <div class="form-group">
                                    <input type="text" class="form-control" id="subject" name="txtSubject" placeholder="Enter Subject" required>
                                </div>
                              
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea class="form-control" name="txtMessage" id="message" rows="5" placeholder="Enter Message" required></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" id="email" name="txtEmail" placeholder="Enter email address">
                                </div>
                            </div>
                            <div class="col-md-12 text-right">
                                <button type="submit" value="submit" name="btnSubmit" class="btn theme_btn button_hover">Send Message</button>
                            </div>
                        </form>
                    </div>
                    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                    <form action="" method="POST" style="width: 50%; margin-left: 450px;">
                       <div class="g-recaptcha" data-sitekey="6LfCCLYgAAAAACnNpH3skB92lRDQ0KqfGfCBcuP3"></div><br><br>
                    </form>

        <?php
          if(isset($_POST['submit']) && $_POST['btnSubmit'] == 'submit'){
          if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])){
                $secret = '6LfCCLYgAAAAAGpkGW4dO9wQgeAFefW3iB1WR7H_';
                $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
                $responseData = json_decode($verifyResponse);
                if($responseData->success)
                { ?>
        <div style="color: limegreen;"><b>Verification Success.</b></div>
                <?php }
                else
                {?>
                   <div style="color: red;"><b>Robot verification failed, please try again.</b></div>
                <?php }
                }else{?>
                   <div style="color: red;"><b>Please do the robot verification.</b></div>
                <?php }
            }
        ?>

                   
                </div>
            </div>
        </section>
        <!--================Contact Area =================-->
        
        <!--================ start footer Area  =================-->	
        <?php include('common/footer.php')?>
        
        
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
        <script src="js/jquery.ajaxchimp.min.js"></script>
        <script src="vendors/bootstrap-datepicker/bootstrap-datetimepicker.min.js"></script>
        <script src="vendors/nice-select/js/jquery.nice-select.js"></script>
        <script src="js/mail-script.js"></script>
        <script src="js/stellar.js"></script>
        <script src="vendors/imagesloaded/imagesloaded.pkgd.min.js"></script>
        <script src="vendors/isotope/isotope-min.js"></script>
        <script src="js/stellar.js"></script>
        <script src="vendors/lightbox/simpleLightbox.min.js"></script>
        <!--gmaps Js-->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
        <script src="js/gmaps.min.js"></script>
        <!-- contact js -->
        <script src="js/jquery.form.js"></script>
        <script src="js/jquery.validate.min.js"></script>
        <script src="js/contact.js"></script>
        <script src="js/custom.js"></script>
    </body>
</html>
