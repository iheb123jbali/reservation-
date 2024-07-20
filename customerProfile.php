<?php
session_start();
include('db/db.php');
if(!isset($_SESSION['userId']) || $_SESSION['userId']==null)
{
    echo "<script>window.location='login.php'</script>";
}
if (isset($_POST['btnupdate']) )  
{

    $first_name=$_POST['ppname'];
    $last_name=$_POST['ppLastName'];
    $city=$_POST['ppEmail'];
    $address=$_POST['ppPassword'];
    $id=$_POST['txtManagerId'];  
    $updatquery ="UPDATE user SET first_name='$first_name',last_name='$last_name',email='$city',password='$address'
    WHERE id='$id'";
    $updatres =mysqli_query($con,$updatquery);
    if ($updatres) 
      {
        echo "<script>alert('Record has been successfully updated');window.location='customerProfile.php'</script>";
      }
}
?>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="image/favicon.png" type="image/png">
        <title>Customer Profile</title>
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
                    <button type="button" onclick="showpopup(<?php echo $_SESSION['userId']?>)" 
                    class="btn btn-warning btn-sm"><span class="fa fa-edit"></span> Edit Info </button>
                  </div>
              </div>
            </div>        
          </div>
      </div>
      <!-- Main content --> 
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
                      <button name="btnupdate" class="btn btn-primary btn-sm" ><strong>Update</strong> 
                            <i class="fa fa-check-square"></i>
                      </button>
                      <button type="button"class="btn btn-danger btn-sm" data-dismiss=modal>
                        Cancel
                      </button>
                </div>
              </form>
            </div>
        </div>
</div> 			    
       			    
       			    
       			    
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
               <div class="card" style="margin-top:120px;">
               <div class="row p-1">
                 <div class="col-md-3">
                   <h4>Your Bookings</h4>
                 </div>
                 <div class="col-md-9" style="text-align: right;">
                 <a class="btn btn-warning" style="width:20%;" href="booking.php">+ Create New Booking </a>
                 </div>
               </div>

              <div class="row">
                <div class="col-md-12">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                            <tr align="center">
                              <th>Sr No.</th>
                              <th>Suite Detail</th>
                              <th>Start Date</th>
                              <th>End Date</th>
                              <th>Night(s)</th>
                              <th>Total</th>
                              <th>Status</th>
                              <th>Option</th>
                            </tr>
                          </thead>
                          <tbody>

                            <?php
                            $userId = $_SESSION['userId'];
                            $data =array();
                            $sql="Select * FROM booking WHERE customer_id='$userId' ";
                            $result = mysqli_query($con, $sql);
                            if ($result)
                            {
                              if (mysqli_num_rows($result)>0) 
                                  {  
                                     $Sr=1;
                                     While($row=mysqli_fetch_array($result))
                                      { ?>
                                      <tr style="width: 100%" align="center">
                                          <td ><?php echo  $Sr++; ?></td>
                                          <td>
                                            <img src="image/upload/<?php echo  $row['suite_image'];?>" height="120px">
                                            <h4><?php echo  $row['suite_name'];?> <span class="badge badge-pills badge-warning">$<?php echo  $row['suite_price'];?>/Night</span></h4>
                                            <lable>Hotel : <?Php echo  $row['hotel_name'];?></lable>    
                                          </td>
                                          <td><?php echo  $row['start_date']; ?></td>
                                          <td><?php echo  $row['end_date']; ?></td>
                                          <td><?php echo  $row['nights']; ?></td>
                                          <td><?php echo  $row['total']; ?></td>
                                          <td>
                                            <?php 
                                            $class="success";
                                            if($row['status']=='CANCELLED')
                                            {
                                              $class = "danger";
                                            }
                                            ?>
                                            <span class="badge badge-<?php echo $class?>" ><?php echo  $row['status']; ?></span>
                                          </td>
                                          <td>
                                            <?php if($row['status']!='CANCELLED'){?>
                                              <button class="btn btn-warning btn-sm"  onclick="showpopup(<?php echo $row['id']; ?>)">
                                               Cancell Reservation</button>
                                               <?php }?>         
                                          </td>
                                        </tr>
                                        <?php
                                        }}}?>
                                      </tbody>
                                    </table>
                                  </div>
                                </div><!-- /.card-body -->
                              </div><!-- /.card -->
                            </div><!-- /.col -->
                          </div><!-- /.row -->
                        </div><!-- /.container-fluid -->
    </section>

<?php include('common/footer.php')?>
		<!--================ End footer Area  =================-->        
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

