<?php
include('db/db.php');
$delete  = null;
$id      = $_GET['data'];
$gtqry   = "update hotel set is_deleted=1 WHERE id='$id'";
$getrslt = mysqli_query($con,$gtqry);
if($getrslt)
{
    echo "<script>alert('record has been deleted successfully');window.location='hotel.php'</script>";
}    
?>
