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
    if (!isset($_GET['delid']) || $_GET['delid'] == NULL) {
        header("Location:postlist.php");
    } else {
        $postid = $_GET['delid'];
        $query = "SELECT * FROM tbl_post WHERE id = '$postid'";
        $getalldata = $db->select($query);
        if ($getalldata) {
        	while ($delimg = $getalldata->fetch_assoc()) {
        		$delimglink = $delimg['image'];
        		unlink($delimglink); 
        	}
        }
        $delquery = "DELETE FROM tbl_post WHERE id = '$postid'";
        $delpostdata = $db->delete($delquery);
        if ($delpostdata) {
        	echo "<script>alert('Data deleted successfully.')</script>";
        	header("Location:postlist.php");
        } else {
        	echo "<script>alert('Data not deleted.')</script>";
        	header("Location:postlist.php");
        }
    }
?> 