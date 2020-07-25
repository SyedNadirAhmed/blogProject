<?php
	if (isset($_GET['pageid'])) {
		$pagetitleid = $_GET['pageid'];
		$query = "SELECT * FROM tbl_page WHERE id = '$pagetitleid'";
		$pages = $db->select($query);
            if ($pages) {
                while ($result = $pages->fetch_assoc()) { ?>
    <title><?php echo $result['name'];?>-<?php echo TITLE;?></title>	
<?php } } } elseif(isset($_GET['id'])) {
		$posttitleid = $_GET['id'];
		$query = "SELECT * FROM tbl_post WHERE id = '$posttitleid'";
		$poststitle = $db->select($query);
            if ($poststitle) {
                while ($result = $poststitle->fetch_assoc()) { ?>
            <title><?php echo $result['title'];?>-<?php echo TITLE;?></title>	
		<?php } } } 
else {?>	
	 <title><?php echo $fm->title();?>-<?php echo TITLE;?></title>	
<?php } ?>
<meta name="language" content="English">
<meta name="description" content="It is a website about education">
<meta name="keywords" content="blog,cms blog">
<meta name="author" content="">