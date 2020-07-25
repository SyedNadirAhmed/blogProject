<?php
    include '../lib/Session.php';
    Session::checkSession();
?>
<?php include '../config/config.php';?>
<?php include '../lib/Database.php';?>
<?php 
    $db = new Database();
?>  
<?php 
    if (!isset($_GET['delpageid']) || $_GET['delpageid'] == NULL) {
        header("Location:index.php");
    } else {
        $pageid = $_GET['delpageid'];
  
        $delquery = "DELETE FROM tbl_page WHERE id = '$pageid'";
        $delpagedata = $db->delete($delquery);
        if ($delpagedata) {
        	echo "<script>alert('Data deleted successfully.');</script>";
        	header("Location:index.php");
        } else {
        	echo "<script>alert('Data not deleted.');</script>";
        	header("Location:index.php");
        }
    }
?> 