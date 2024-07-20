<?php
session_start();
include('db/db.php');

if (isset($_POST['btnupdate']) )  
  {

      $first_name = $_POST['ppname'];
      $last_name  = $_POST['ppLastName'];
      $city       = $_POST['ppEmail'];
      $address    = $_POST['ppPassword'];
      $id         = $_POST['txtManagerId'];
      $updatquery ="UPDATE user SET first_name='$first_name',last_name='$last_name',email='$city',password='$address'
      WHERE id='$id'";
      $updatres =mysqli_query($con,$updatquery);
      if ($updatres) 
        {

          echo "<script>alert('Record has been successfully updated');window.location='manager.php'</script>";
        }
  }



if (isset($_POST['btnsubmit']))
 {

      $first_name = $_POST['first_name'];
      $last_name  = $_POST['last_name'];
      $email      = $_POST['email'];
      $password   = $_POST['password'];
      $qry = "INSERT INTO `user`(`group_id`, `mh`, `first_name`, `last_name`, `type`, `email`, `password`, `contact`,
      `is_deleted`, `is_updated`, `created_on`, `updated_on`) VALUES 
      (1,1,'$first_name','$last_name','CUSTOMER','$email','$password','','0','0',Unix_timestamp()*1000,Unix_timestamp()*1000)";
      if(mysqli_query($con,$qry))
      {
        echo "<script>alert('Manager has been registered successfully!')</script>";
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
        <title>Users</title>
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
                    <button name="btnupdate" class="btn btn-primary btn-sm" ><strong>Update</strong>
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
               <h5>Add User</h5>
              </div>
               <div class="card-body"style="background-color: #f7f7f7;">
                 <form id="quickForm" action="" method="POST">
                  <div class="row">
                  <div class="col-lg-3">
                      <div class="default-select" id="default-select">
                          <select >
                            <option value="0">Select Hotel</option>
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
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group ">
                           <input type="text" name="first_name" placeholder="First Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'First Name'" required class="single-input">
                        </div>
                     </div>
                     <div class="col-lg-3">
                        <div class="form-group ">
                           <input type="text" name="last_name" placeholder="Last Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Last Name'" required class="single-input">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group ">
                          <input type="text" name="email" placeholder="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'email'" required class="single-input">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group ">
                          <input type="text" name="password" placeholder="password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'password'" required class="single-input">
                        </div>
                    </div>
                     <div class="col-lg-6">
                         <div class="form-group">
                              <input type="submit"  name="btnsubmit"    value="Add" class="btn btn-success radius">
                          </div>
                  </div>
                <!-- /.card-body -->
                    </form>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
    <!-- Main content --> 
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
               <div class="card" style="margin-top:20px;">
              <div class="">
               <div>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr align="center">
                    <th>Sr No.</th>
                    <th>Name</th>
                    <th>Last-Name</th>
                    <th>E-mail</th>
                    <th>Password</th>
                    <th>Option</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                              $data =array();
                              $sql="Select * FROM user WHERE type='CUSTOMER' AND is_deleted=0";
                              $result = mysqli_query($con, $sql);
                              if ($result)
                              {
                                if (mysqli_num_rows($result)>0) 
                                    { $Sr=1;
                                    While($row=mysqli_fetch_array($result))
                                    {?>
                                    <tr style="width: 100%" align="center">
                                      <td><?php echo  $Sr++; ?></td>
                                      <td><?php echo  $row['first_name'];?></td>
                                      <td><?php echo  $row['last_name']; ?></td>
                                      <td><?php echo  $row['email']; ?></td>
                                      <td><?php echo  $row['password']; ?></td>
                                      <td>
                                          <div class="button-group-area mt-10">
                                              <button type="button" class="btn btn-default">Action</button>
                                              <button type="button" class="btn btn-default dropdown-toggle dropdown-hover dropdown-icon" data-toggle="dropdown">
                                                <span class="sr-only">Toggle Dropdown</span>
                                              </button>
                                              <div class="dropdown-menu" role="menu">
                                                <button class="dropdown-item"  onclick="showpopup(<?php echo $row['id']; ?>)"> Update</button>
                                                <a class="dropdown-item" onclick="showpopup(<?php echo $row['id']; ?>)" >Delete</a>
                                              </div>
                                          </div>     
                                     </td>                     
                                </tr>
                              <?php
                              }
                            }
                          }?>
                        </div>
                 </tbody>
                </table>
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
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<!-- /.content-wrapper -->
<!-- Link of footer -->
 <?php include('common/footer.php');?>
<!-- /.Link of footer -->
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