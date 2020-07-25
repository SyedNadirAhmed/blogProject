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
    if (!isset($_GET['sliderid']) || $_GET['sliderid'] == NULL) {
        header("Location:sliderlist.php");
    } else {
        $sliderid = $_GET['sliderid'];
        $query = "SELECT * FROM tbl_slider WHERE id = '$sliderid'";
        $getalldata = $db->select($query);
        if ($getalldata) {
        	while ($delsliderimg = $getalldata->fetch_assoc()) {
        		$delimglink = $delsliderimg['image'];
        		unlink($delimglink); 
        	}
        }
        $delquery = "DELETE FROM tbl_slider WHERE id = '$sliderid'";
        $delsliderdata = $db->delete($delquery);
        if ($delsliderdata) {
        	echo "<script>alert('Slider deleted successfully.')</script>";
        	header("Location:sliderlist.php");
        } else {
        	echo "<script>alert('Slider not deleted.')</script>";
        	header("Location:sliderlist.php");
        }
    }
?> 