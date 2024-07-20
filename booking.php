<?php
session_start();
include('db/db.php');
if(!isset($_SESSION['userId']) || $_SESSION['userId']==null)
{
    echo "<script>window.location='login.php'</script>";
}

if(isset($_POST['btnBook']))
{
    $customerId    = $_SESSION['userId'];
    $customerName  = $_SESSION['userName'];
    $customerEmail = $_SESSION['email'];
    $suite         = explode(',',$_POST['ddSuite']);
    $suiteId       = $suite[0];
    $suiteName     = $suite[1];
    $suitePrice    = $suite[2];
    $suiteImage    = $suite[3];
    $hotel         = explode(',',$_POST['ddHotel']);
    $hotelId       = $hotel[0];
    $hotelName     = $hotel[1];
    $startDate      = substr($_POST['date1'],0,10);
    $startDateNum   = strtotime($startDate)*1000;
    $endDate       = substr($_POST['date2'],0,10);
    $endDateNum   = strtotime($endDate)*1000;
    $datediff = $endDateNum - $startDateNum;

    $nights          = round($datediff / (60 * 60 * 24))/1000;
    if($nights>0)
    {
    $totalAmount   = round($suitePrice*$nights);

    $qryToCheckSuiteAvailable = "SELECT COUNT(*) AS TOTAL FROM booking WHERE suite_id='$suiteId' AND status='RESERVED' AND end_date_num>=$startDateNum";
    $resOfCheckSuite = mysqli_query($con,$qryToCheckSuiteAvailable);
    if($resOfCheckSuite)
    {
        if(mysqli_num_rows($resOfCheckSuite)>0)
        {
            $row  = mysqli_fetch_array($resOfCheckSuite);
            if($row['TOTAL']==0)
            {
                $qry = "INSERT INTO `booking`(`customer_id`, `customer_name`, `customer_cell_no`, `hotel_id`, `hotel_name`,
                `suite_id`, `suite_name`, `suite_price`, `suite_image`, `start_date`, `start_date_num`, `end_date`, `end_date_num`,
                 `nights`, `total`, `status`, `created_on`, `update_on`) 
                VALUES ('$customerId','$customerName','$customerEmail','$hotelId','$hotelName','$suiteId','$suiteName','$suitePrice',
                '$suiteImage','$startDate','$startDateNum','$endDate','$endDateNum','$nights','$totalAmount','RESERVED',unix_timestamp()*1000,0)";
                $res = mysqli_query($con,$qry);
                if($res)
                {
                    echo "<script>alert('Congratulation! Booking has been confirmed.')
                    window.location='customerBooking.php';</script>";
                }

            }
            else
            {
                echo "<script>alert('This suite not available');</script>";
                return;
            }
        }  
        else
            {
                echo "<script>alert('This suite not available');</script>";
                return;
            }
    }
}
else
{
    echo "<script>alert('Selected Dates are invalid')</script>";
  
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
        <title>Booking</title>
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




          <!-- Link of header -->
 <?php include('common/header.php');?>
  <!-- /.Link of header -->

  <div id="mymodal" class="modal fade" style="border-radius: 20px" role="dialog" >
    <div class="modal-dialog">
      <div class="modal-content">

      <div class="modal-header" style="background-color:goldenrod; ">
        <h5>Update</h5>
      </div>
    
    <form action="#" method="POST">
    <div class="modal-body" class="table table-bordered table-striped">
      <div class="row">
           <div class="col-md-6">
              <div class="form-group ">
                 <label>First Name</label>
                 <input type="text" name="ppname" value="" class="form-control" id="ppname" placeholder="" value="<?Php echo  $hotel['first_name']; ?>">
             </div>
           </div>
          
         
           <div class="col-md-6">
              <div class="form-group ">
                 <label>Last Name</label>
                 <input type="text" name="ppLastName" class="form-control" value="" id="ppLastName" placeholder=""value="<?Php echo  $hotel['city']; ?>">
             </div>
           </div>
      
           <div class="col-md-6">
              <div class="form-group ">
                 <label>Email</label>
                 <input type="text" name="ppEmail" class="form-control" value="" id="ppEmail" placeholder=""value="<?Php echo  $hotel['address']; ?>">
             </div>
           </div>
        
           <div class="col-lg-6" style="width:100%; ">
              <div class="form-group">
                 <label>Password</label>
                 <input type="text" name="ppPassword" class="form-control" value="" id="ppPassword" placeholder="">
             </div>
           </div>

           <div class="col-lg-2" style="width:100%; ">
              <div class="form-group">
                 <input type="hidden" name="txtManagerId" class="form-control"  id="txtManagerId" >
             </div>
           </div>
      </div>   
       
      
    </div>

    <div class="modal-footer" style="background-color: #ffcc33;">
      <button name="btnupdate" class="btn btn-primary btn-sm" >
                          <strong>Update</strong> 
                          <i class="fa fa-check-square"></i>
        </button>
      <button type="button"class="btn btn-danger btn-sm" data-dismiss=modal>Cancel</button>
      
    </div>

    </form>

  </div>
</div>

</div>

<!-- Main content --> 
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          <div class="card" style="margin-top:90px;width: 100%;border-radius: 15px;">
                   <div class="card-header">
                     <h5>Book Your Suite</h5>
                   </div>
               <div class="card-body"style="background-color: #f7f7f7;">

            <div class="container">
                    <div class="hotel_booking_table">
                        <div class="col-md-3">
                            <h2>Book<br> Your Room</h2>
                        </div>
                        <div class="col-md-9">
                        <form  action="#" method="POST"  >
                            <div class="boking_table">
                                <div class="row">

                                <div class="col-md-4">
                                        <div class="book_tabel_item">
                                            <div class="input-group">
                                            <select  class="form-control" name="ddHotel">
                                                            <option   value="0">Select Hotel</option>
                                                            <?php
                                                            $data =array();
                                                            $sqlToGetHotel="Select * FROM hotel WHERE is_deleted=0";
                                                            $result1 = mysqli_query($con, $sqlToGetHotel);

                                                            if ($result1)
                                                            {
                                                            
                                                                if (mysqli_num_rows($result1)>0) 
                                                                    {     
                                                                        $Sr=1;
                                                                        While($row=mysqli_fetch_array($result1))
                                                                        { 
                                                                            ?>
                                                                            <option value="<?php echo $row['id'].','.$row['first_name']?>" > <?php echo $row['first_name']?> </option>
                                                                        <?php
                                                                        }
                                                                    }
                                                            }?>
                                            </select>
                                            </div>
                                            <div class="input-group">
                                            <select class="form-control" name="ddSuite">
                                                        <option   value="0">Select Suite</option>
                                                        <?php
                                                        $data =array();
                                                        $sqlToGetHotel="Select * FROM suite WHERE is_deleted=0";
                                                        $result1 = mysqli_query($con, $sqlToGetHotel);

                                                        if ($result1)
                                                        {
                                                            if (mysqli_num_rows($result1)>0) 
                                                                {     
                                                                    $Sr=1;
                                                                    While($row=mysqli_fetch_array($result1))
                                                                    { 
                                                                        ?>
                                                                        <option value="<?php echo $row['id'].','.$row['title'].','.$row['price'].','.$row['title_image']?>" > <?php echo $row['title'].' | '.$row['price']; ?> </option>
                                                                    <?php
                                                                    }
                                                                }
                                                        }?>
                                             </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="book_tabel_item">
                                            <div class="form-group">
                                                <div class='input-group date' id='datetimepicker11'>
                                                    <input type='text' class="form-control" name="date1" placeholder="Start Date"/>
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class='input-group date' id='datetimepicker1'>
                                                    <input type='text' class="form-control" name="date2" placeholder="End Date"/>
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="book_tabel_item">
                                            <div class="input-group">
                                            </div>
                                            <button type="submit" value="submit" name="btnBook" class="book_now_btn button_hover" >Book Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form> 
                        </div>
                    </div>
                </div>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 


  <!-- /.content-wrapper -->
 

      <!-- Link of footer -->
 <?php include('common/footer.php');?>
  <!-- /.Link of footer -->
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
<script type="text/javascript">
    
    function showpopup(id) 
   {
     
    $.ajax({
                type:"GET",
                url:"db/getManagerDEtailById.php?id="+id,
                contentType:"application/json; charset=utf-8",
                dataType:"json",
                success: function(data)
                {
                    if(data.length>0)
                    {
                      $('#ppname').val(data[0]['first_name']);
                      $('#ppLastName').val(data[0]['last_name']);
                      $('#ppEmail').val(data[0]['email']);
                      $('#ppPassword').val(data[0]['password']);
                      $('#txtManagerId').val(data[0]['id']);
                      $('#mymodal').modal('show');
                    }
                }

            });  
   }

</script>