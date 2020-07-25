<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php'?>
<div class="grid_10">

<div class="box round first grid">
    <h2>Update Social Media</h2>  
<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $facebook      = $fm->validation($_POST['facebook']);
        $twitter     = $fm->validation($_POST['twitter']);
        $linkedin     = $fm->validation($_POST['linkedin']);
        $googleplus     = $fm->validation($_POST['googleplus']);

        $facebook      = mysqli_real_escape_string($db->link, $facebook);
        $twitter     = mysqli_real_escape_string($db->link, $twitter);
        $linkedin     = mysqli_real_escape_string($db->link, $linkedin);
        $googleplus     = mysqli_real_escape_string($db->link, $googleplus);


        if ($facebook == "" || $twitter == "" || $linkedin == "" || $googleplus == "") {
            echo "<span class='error'>Field must not be empty.</span>";
        } else {

        $query = "UPDATE tbl_social
            SET 
            facebook        = '$facebook', 
            twitter         = '$twitter',
            linkedin        = '$linkedin',       
            googleplus      = '$googleplus'       
            WHERE id = '1'";

            $updatedtsocial = $db->update($query);
            if ($updatedtsocial) {
                 echo "<span class='success'>Updated successfully</span>";
            } else{
                 echo "<span class='error'>Not updated.</span>";
            }
        }    
    }
?>
    <div class="block">       
<?php
    $query = "SELECT * FROM tbl_social WHERE id='1'";
    $social_ex = $db->select($query);
    if ($social_ex) {
        while ($result = $social_ex->fetch_assoc()) {
?>                
        <form action="" method="post" enctype="multipart/form-data">
            <table class="form">					
                <tr>
                    <td>
                        <label>Facebook</label>
                    </td>
                    <td>
                        <input type="text" name="facebook" value="<?php echo $result['facebook'];?>" class="medium" />
                    </td>
                </tr>
				 <tr>
                    <td>
                        <label>Twitter</label>
                    </td>
                    <td>
                        <input type="text" name="twitter" value="<?php echo $result['twitter'];?>" class="medium" />
                    </td>
                </tr>
				
				 <tr>
                    <td>
                        <label>LinkedIn</label>
                    </td>
                    <td>
                        <input type="text" name="linkedin" value="<?php echo $result['linkedin'];?>" class="medium" />
                    </td>
                </tr>
				
				 <tr>
                    <td>
                        <label>Google Plus</label>
                    </td>
                    <td>
                        <input type="text" name="googleplus" value="<?php echo $result['googleplus'];?>" class="medium" />
                    </td>
                </tr>
				
				 <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Update" />
                    </td>
                </tr>
            </table>
            </form>
        <?php } } ?>    
        </div>
    </div>
</div>
<?php include 'inc/footer.php'?> 
