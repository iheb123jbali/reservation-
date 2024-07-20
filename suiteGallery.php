<?php
session_start();
include('db/db.php');

$imageList = array();

if(isset($_POST['btnUpload']))
{
    $today          = date('y-m-d h:i:s');
    $dt             = strtotime($today);
    $name           = $_FILES['imageFile']['name'];
    $target_dir     = "image/upload/";
    $newName        = $dt.'_'.basename($_FILES["imageFile"]["name"]);
    $target_file    = $target_dir .$newName;
    $imageFileType  = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $extensions_arr = array("jpg","jpeg","png","gif","svg");
    $id             =  $_SESSION['suiteId'];
    $name           = $_SESSION['suiteTitle'];
    move_uploaded_file($_FILES['imageFile']['tmp_name'],$target_dir. $newName);
    $qryToSaveIamge = "INSERT INTO `suite_gallery`( `suite_id`, `suite_name`, `img`, `created_on`, `is_deleted`) VALUES 
    ('$id','$name','$newName',unix_timestamp()*1000,0);";
    $res = mysqli_query($con,$qryToSaveIamge);
    if($res)
        {
            echo "<script> alert('Image has been uploaded!');</script>";
        }    
}



if(isset($_GET['id']))
{
    $id = $_GET['id'];
    $getSuiteDetail = "SELECT * FROM suite WHERE id=$id AND is_deleted=0";
    $resOfGetSuite   =  mysqli_query($con,$getSuiteDetail);

    if($resOfGetSuite)
    {
        if(mysqli_num_rows($resOfGetSuite)>0)
        {
            $row = mysqli_fetch_array($resOfGetSuite);
            $_SESSION['suiteId']= $row['id'];
            $_SESSION['suiteTitle'] = $row['title'];
            $_SESSION['suiteImg'] = $row['title_image'];
            $_SESSION['suitePrice'] = $row['price'];
            $_SESSION['suiteDesc'] = $row['description'];
        }
    }
}
else
{
    echo "<script>window.location='suite.php'</script>";
}

if(isset($_SESSION['suiteId']))
{
    $id = $_SESSION['suiteId'];
    $qryToGetImage = "SELECT * FROM  suite_gallery WHERE suite_id=$id AND is_deleted=0";
    $res = mysqli_query($con,$qryToGetImage);
    if($res)
    {
        if(mysqli_num_rows($res))
        {
            while($row = mysqli_fetch_array($res))
            {
                array_push($imageList,$row);
            }
        }
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
        <title>Hypnos</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="vendors/linericon/style.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="vendors/bootstrap-datepicker/bootstrap-datetimepicker.min.css">
        <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css">
        <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
        <link rel="stylesheet" href="vendors/lightbox/simpleLightbox.css">
        <!-- main css -->
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/responsive.css">
    </head>
    <body>
        <!--================Header Area =================-->
          <?php include('common/header.php'); ?>
        <!--================Header Area =================-->
        
        <!--================Breadcrumb Area =================-->
        <section class="breadcrumb_area">
            <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="page-cover text-center">
                    <h2 class="page-cover-tittle">Suite Detail</h2>
                    <ol class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li class="active">Suite Detail</li>
                    </ol>
                </div>
            </div>
        </section>
        <!--================Breadcrumb Area =================-->
        
        <!--================Breadcrumb Area =================-->
        <section class="gallery_area section_gap">
            <div class="container">
               
                <div class="section_title text-center">

                <div class="card">
                    <div class="card-body">
                        <img src="image/upload/<?php echo $_SESSION['suiteImg'];?>" height="150px" />
                    <h3 class="title_color"><?php echo $_SESSION['suiteTitle']; ?>
                    <span class="bg-warning rounded"><?php echo '€'.$_SESSION['suitePrice']; ?></span></h3>
                    <p><?php echo $_SESSION['suiteDesc']; ?></p>
                    <form action="#" method="POST" enctype="multipart/form-data" >
                        <input type="file" name="imageFile"   accept="image/*"/>
                        <button type="submit" name="btnUpload" class="btn btn-warning" > <span class="fa fa-upload"></span> Upload Image</button>

                    </form>
                        
                    </div>
                </div>
                   
                </div>
            </div>
        </section>
        <!--================Breadcrumb Area =================-->
        
        <!--================ start footer Area  =================-->	
      <?php include('common/footer.php'); ?>
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
        <script src="vendors/imagesloaded/imagesloaded.pkgd.min.js"></script>
        <script src="vendors/isotope/isotope-min.js"></script>
        <script src="js/stellar.js"></script>
        <script src="vendors/lightbox/simpleLightbox.min.js"></script>
        <script src="js/custom.js"></script>
    </body>
</html>