<?php
session_start();
include('db/db.php');
if (isset($_POST['btnsubmit']))
{
  $first_name=$_POST['first_name'];
  $city=$_POST['city'];
  $address=$_POST['address'];
  $description=$_POST['description'];
  $qry="INSERT INTO hotel (Group_id,mh,first_name,last_name,description,city,address,is_deleted,is_updated,updated_on,Created_on) 
  VALUES('1','1','$first_name','','$description','$city','$address','0','0',Unix_timestamp()*1000,Unix_timestamp()*1000)";
  mysqli_query($con,$qry);
}
?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="image/favicon.png" type="image/png">
        <title>Hypnos Hotels</title>
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
    <body style="background-color: #e4e4e4;">




          <!-- Link of header -->
 <?php include('common/header.php');?>
  <!-- /.Link of header -->
<?php
if(isset($_POST['btnupdate']) )  
  {
    $first_name=$_POST['ppname'];
    $last_name='';
    $city=$_POST['ppcity'];
    $address=$_POST['ppaddress'];
    $description=$_POST['ppdescription'];
    $id=$_POST['txtHotelId'];
    $updatquery ="UPDATE hotel SET first_name='$first_name',last_name='$last_name',city='$city',address='$address',
    description='$description' WHERE id='$id'";
    $updatres =mysqli_query($con,$updatquery);
    if ($updatres) 
    {
      echo "<script>alert('record has been successfully updated');window.location='hotel.php'</script>";
    }
  }
?>

<!-- Main content --> 
    <section class="content" style="margin-top: 120px;">
          <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                  <h3>View Hotels</h3>
                </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
    </section>

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
                    <th>City</th>
                    <th>Address</th>
                    <th>Discription</th> 
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $data =array();
                    $sql="Select * FROM hotel WHERE is_deleted=0";
                    $result = mysqli_query($con, $sql);

                    if ($result)
                    { 
                      if (mysqli_num_rows($result)>0) 
                          { $Sr=1;
                          While($row=mysqli_fetch_array($result))
                        { ?>
                            <tr style="width: 100%" align="center">
                                <td><?php echo  $Sr++; ?></td>
                                <td style="text-align:left;"><?Php echo  $row['first_name'];?></td>
                                <td><?php echo  $row['city']; ?></td>
                                <td><?php echo  $row['address']; ?></td>
                                <td><?php echo  $row['description']; ?></td>                      
                            </tr>
                        <?php
                        }
                        }
                      }?>
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
                url:"db/getHotelDetailById.php?id="+id,
                contentType:"application/json; charset=utf-8",
                dataType:"json",
                success: function(data)
                {
                    if(data.length>0)
                    {
                      $('#ppname').val(data[0]['first_name']);
                      $('#ppcity').val(data[0]['city']);
                      $('#ppaddress').val(data[0]['address']);
                      $('#ppdescription').val(data[0]['description']);
                      $('#txtHotelId').val(data[0]['id']);
                      $('#mymodal').modal('show');
                    }
                }

            });  
   }

</script>