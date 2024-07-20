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
VALUES('1','1','$first_name','','$description','$city','$address','0','0',Unix_timestamp()*1000,Unix_timestamp()*1000)
";




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

<section>
 
<div class="row" style="color:black;"  >

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
                 <label>Name</label>
                 <input type="text" name="ppname" value="" class="form-control" id="ppname" placeholder="" value="<?Php echo  $hotel['first_name']; ?>">
             </div>
           </div>
          
         
           <div class="col-md-6">
              <div class="form-group ">
                 <label>City</label>
                 <input type="text" name="ppcity" class="form-control" value="" id="ppcity" placeholder=""value="<?Php echo  $hotel['city']; ?>">
             </div>
           </div>
      
           <div class="col-md-12">
              <div class="form-group ">
                 <label>Address</label>
                 <input type="text" name="ppaddress" class="form-control" value="" id="ppaddress" placeholder=""value="<?Php echo  $hotel['address']; ?>">
             </div>
           </div>
        
           <div class="col-lg-12" style="width:100%; ">
              <div class="form-group">
                 <label>Description</label>
                 <input type="text" name="ppdescription" class="form-control" value="" id="ppdescription" placeholder="">
             </div>
           </div>

           <div class="col-lg-12" style="width:100%; ">
              <div class="form-group">
                 <input type="hidden" name="txtHotelId" class="form-control"  id="txtHotelId" >
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

</div>
<?php


if (isset($_POST['btnupdate']) )  
  {

$first_name=$_POST['ppname'];
$last_name='';
$city=$_POST['ppcity'];
$address=$_POST['ppaddress'];
$description=$_POST['ppdescription'];
$id=$_POST['txtHotelId'];

  
$updatquery ="UPDATE hotel SET first_name='$first_name',last_name='$last_name',city='$city',address='$address',description='$description'
WHERE id='$id'";

$updatres =mysqli_query($con,$updatquery);
if ($updatres) 
  {

    echo "<script>alert('record has been successfully updated');window.location='hotel.php'</script>";
  }


  }

?>



      
 <!-- /.container-fluid -->
    </section>
    <!-- /.content -->





<!-- Main content --> 
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

        

               <div class="card" style="margin-top:90px;width: 100%;border-radius: 15px;">
              <div class="card-header">
                <h4>Add Hotel...</h4> 
              </div>
              <div class="card-body"style="background-color: #f7f7f7;border-radius: 20px;">


                 <form id="quickForm" action="" method="POST">
         
                  <div class="row">

                    <div class="col-lg-3">
                        <div class="form-group ">
                           <input type="text" name="first_name" placeholder="First Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'First Name'" required class="single-input" style="border-color: black;">
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="form-group ">
                          <input type="text" name="city" placeholder="city" onfocus="this.placeholder = ''" onblur="this.placeholder = 'City'" required class="single-input">
                        </div>
                    </div>


                    <div class="col-lg-6">
                        <div class="form-group ">
                          <input type="text" name="address" placeholder="Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Address'" required class="single-input">
                        </div>
                    </div>

                    <div class="col-lg-10">
                        <div class="form-group ">
                          <input type="text" name="description" placeholder="Description" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Description'" required class="single-input">
                        </div>
                    </div>
                    <div class="col-lg-2">
                    <div class="form-group">
                              <input type="submit"  name="btnsubmit"    value="Added" class="btn btn-success  radius" >
                          </div>
                    </div>   


                  
                  


                <!-- /.card-body -->
              </form>

           
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
                    <th>City</th>
                    <th>Address</th>
                    <th>Discription</th>
                    <th>Option</th>
                  </tr>
                  </thead>
                  <tbody>


<?Php

$data =array();

$sql="Select * FROM hotel WHERE is_deleted=0";
$result = mysqli_query($con, $sql);

if ($result)
 {
 
   if (mysqli_num_rows($result)>0) 
      { $Sr=1;
      While($row=mysqli_fetch_array($result))
{ 
 ?>

<tr style="width: 100%" align="center">
   <td >
   <?Php echo  $Sr++; ?>
   </td>

   <td>
   <?Php echo  $row['first_name'];?>
   </td>

   <td>
   <?Php echo  $row['city']; ?>
   </td>

   <td>
   <?Php echo  $row['address']; ?>
   </td>

   <td>
   <?Php echo  $row['description']; ?>
   </td>

   
    <td>


 <div class="button-group-area mt-10">
                    <button type="button" class="btn btn-default" >Action</button>
                    <button type="button" class="btn btn-default dropdown-toggle dropdown-hover dropdown-icon" data-toggle="dropdown">
                      <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu" role="menu">
                      <button class="dropdown-item"  onclick="showpopup(<?php echo $row['id']; ?>)"> 
                      Update</button>
                      <a class="dropdown-item"onclick="showSwal('warning-message-and-cancel')" href="delete_hotel.php?data=<?php echo $row['id']; ?>">Delete</a>
        
                    </div>
                  </div>
                
      </td>
                            
   </tr>




<?Php

}
   
   }
 }
   
 ?>

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