<?php
include('db/db.php');
if(isset($_POST['btnSubmit']))
{
    $title = $_POST['txtname'];
    $img = $_POST['txtimg'];
    $price = $_POST['txtprice'];
    $discription = $_POST['txtdiscription'];
    $qry="INSERT INTO suite (title,img,price,discription)VALUES ('$title','$img','$price','$discription')";
    mysqli_query($con,$qry);
}



?>
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
        <section class="breadcrumb_area blog_banner_two">
            <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="page-cover text-center">
                    <h2 class="page-cover-tittle f_48">Suite</h2>
                    <ol class="breadcrumb">
                        <li><a href="index.html">Home</a></li>
                        <li class="active">Suite</li>
                    </ol>
                </div>
            </div>
        </section>
	
                    <div class="container">
                    	<h3 class="title_color" style="margin-top: 20px;text-align: center;">Create Suite</h3>
       	              <div class="col-md-12" style="margin-top: 50px; margin-left: 30px">
                        <form class="row contact_form" action="#" method="POST" id="contactForm" novalidate="novalidate">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="name" name="txtname" placeholder="Title">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="email" name="txtimg" placeholder="Image">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="subject" name="txtprice" placeholder="Price">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea class="form-control" name="txtdiscription" id="message" rows="1" placeholder="Discription"></textarea>
                                </div>
                            </div>

                            <div class="col-md-7 text-right">
                                <button type="submit" name="btnSubmit" value="submit" class="btn theme_btn button_hover">Create Suite</button>
                            </div>
                        </form>
                    </div>

       </div>

       	<div class="section-top-border" style="margin-left: 50px;">
						<h3 class="mb-30 title_color">Suite</h3>
                        <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr align="center">
                    <th>Sr No.</th>
                    <th>Title</th>
                    <th>Iamge</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Option</th>
                  </tr>
                  </thead>
                        <tbody>
                                <?php
                                $data=array();
                                $sql="SELECT * FROM suite";
                                $result = mysqli_query($con, $sql);
                                if ($result)
                                {
                                    if (mysqli_num_rows($result)>0) 
                                    { $Sr=0;
                                    While($row=mysqli_fetch_array($result))
                                    {
                
                                    ?>
                                    <tr style="width: 100%" align="center">
                                        <td ><?php echo  $Sr++; ?></td>
                                        <td><?php echo  $row['title'];?></td>
                                        <td><img src="image/upload/?php echo  $row['title_image']; ?> height="100px"/ > </td>
                                        <td><?php echo  $row['price']; ?></td>
                                        <td><?php echo  $row['description']; ?></td>
                                        <td><a href="suiteGallery.php?id=<?php echo $row['id']; ?>"> Add More Images </a></td>
                                    </tr>
                                    <?php
                                    }
                                    }
                                }?>
                        </tbody>
                    </table>   
                </div>
            </div>
        </div>
<?php include('common/footer.php')?>
<!--================ End footer Area  =================-->     
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
<script src="vendors/lightbox/simpleLightbox.min.js"></script>
<script src="js/custom.js"></script>
</body>
</html>