<?php
session_start();
include('db/db.php');
if(!isset($_SESSION['userId']) || $_SESSION['userId']==null)
{
    echo "<script>window.location='login.php'</script>";
}
if(isset($_POST['btnCreate']))
{
    $today          = date('y-m-d h:i:s');
    $dt             = strtotime($today);
    $name           = $_FILES['imageFile']['name'];
    $target_dir     = "image/upload/";
    $newName        = $dt.'_'.basename($_FILES["imageFile"]["name"]);
    $target_file    = $target_dir .$newName;
    $imageFileType  = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $extensions_arr = array("jpg","jpeg","png","gif","svg");
    move_uploaded_file($_FILES['imageFile']['tmp_name'],$target_dir. $newName);
    $title          = $_POST['txtname'];
    $price          = $_POST['txtprice'];
    $discription    = $_POST['txtdiscription'];
    $qry="INSERT INTO suite (`title`, `title_image`, `price`, `description`, `created_on`, `updated_on`, `is_deleted`) 
    VALUES ('$title','$newName','$price','$discription',unix_timestamp()*1000,0,0)";
    $res =mysqli_query($con,$qry);
    if($res)
    {
        echo "<script> alert('Suite has been created!');window.location='managerProfile.php';</script>";
    }
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
        <div class="container">
                    <div class="row">
                        <div class="col-md-4" ></div>
                        <div class="col-md-4" style="text-align: center;">
                        <div class="card">
                            <div class="card-body" style="margin-top:70px;">
                                    <img class="author_img rounded-circle" height="100px" src="image/user.png" alt="">
                                    <h4><?php echo $_SESSION['userName']?></h4>
                                    <p><?php echo $_SESSION['type']?></p>
                                </div>
                            </div>      
                        </div>
                    </div>
                    <h3 class="title_color" style="margin-top: 20px;text-align: center;">Create Suite</h3>
       	              <div class="col-md-12" style="margin-top: 50px; margin-left: 30px">
                        <form action="#" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="name" name="txtname" placeholder="Title">
                                </div>
                                <div class="form-group">
                                    <input type="file" class="form-control" id="email" name="imageFile" accept="image/*">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="subject" name="txtprice" placeholder="Price">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea class="form-control" name="txtdiscription" id="message" rows="5" placeholder="Description"></textarea>
                                </div>
                            </div>

                            <div class="col-md-6 text-right">
                                <button type="submit" name="btnCreate" value="submit" class="btn theme_btn button_hover">Create Suite</button>
                            </div>
                           
                            </div>
                        </form>
                    </div>
        </div>
       	<div class="section-top-border" style="margin-left: 50px;">
						<h3 class="mb-30 title_color">Suites</h3>
                        <table id="example1" class="table table-bordered table-striped " style="width:95%;">
                            <thead>
                            <tr align="center">
                                <th>Sr No.</th>
                                <th>Detail</th>
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
                                    {?>
                                        <tr style="width: 100%" align="center">
                                            <td><?Php echo  $Sr++; ?></td>
                                            <td style="text-align:left;">
                                              <a href="suiteGallery.php?id=<?php echo $row['id']; ?>"> 
                                                <img src="image/upload/<?php echo  $row['title_image']; ?>" height="100px" >
                                                <?php echo  $row['title'];?> <span class="bagde badge-warning rounded"> 
                                                <?php echo  $row['price']; ?>€ / Night</span>
                                               </a>
                                            </td>
                                            <td><?php echo  $row['description']; ?></td>
                                            <td>
                                                <a href="suiteGallery.php?id=<?php echo $row['id']; ?>"> Add More Images </a>
                                            </td>
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