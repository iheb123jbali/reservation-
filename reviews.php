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
        <title>Customer Review</title>
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
        <button name="btnupdate" class="btn btn-primary btn-sm" ><strong>Update</strong> <i class="fa fa-check-square"></i></button>
        <button type="button"class="btn btn-danger btn-sm" data-dismiss=modal>Cancel</button>
      </div>

    </form>

  </div>
</div>

</div>

<!-- Main content --> 
 
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 



    <!-- Main content --> 
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
               <div class="card" style="margin-top:120px;">
               <div class="row p-1">
                 <div class="col-md-3">
                   <h4>Customer Reviews</h4>
                 </div>
                
               </div>
              
              
              <div class="">


            <div >
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr align="center">
                    <th>Sr No.</th>
                    <th>Sur Name</th>
                    <th>First Name</th>
                    <th>Topic</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Date</th>
                  </tr>
                  </thead>
                  <tbody>

                                          <?Php
                                          $userId = $_SESSION['userId'];
                                          $data =array();

                                          $sql="Select * FROM customer_reviews ";
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
                                            <td><?Php echo  $row['sur_name']; ?></td>
                                            <td><?php echo  $row['first_name']; ?></td>
                                            <td><?php echo  $row['topic']; ?></td>
                                            <td><?php echo  $row['subject']; ?></td>
                                            <td><?php echo  $row['message']; ?></td> 
                                            <td><?php echo  date('d M,Y'); ?></td>                       
                                            </tr>
                                          <?php
                                          }}}
                                          ?>


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
     
    var con = confirm('Are you sure you want to cancell this booking?');
    if(con)
    {
    $.ajax({
                type:"GET",
                url:"db/cancellBooking.php?id="+id,
                contentType:"application/json; charset=utf-8",
                dataType:"json",
                success: function(data)
                {
                    if(data==786)
                    {
                      alert('Your booking has been cancelled successfully!');
                      location.reload(true);
                    }
                    else if(data==33)
                    {
                      alert('Booking can not be cancelled before less than 3 days!');
                    }
                    else
                    {

                    }
                }

            });
    }  
   }

</script>