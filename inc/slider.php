<div class="slidersection templete clear">
        <div id="slider">
<?php
	$query = "SELECT * FROM tbl_slider ORDER BY id LIMIT 5";
			 $sliderlist = $db->select($query);
			 if ($sliderlist) {
			  	while ($result = $sliderlist->fetch_assoc()) {
			
?>        	
            <a href="#"><img src="admin/<?php echo $result['image']; ?>" alt="<?php echo $result['title'];?>" title="<?php echo $result['title'];?>" /></a>
<?php } } ?>         
        </div>
</div>