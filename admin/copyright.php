<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php'?>
<div class="grid_10">

    <div class="box round first grid">
        <h2>Update Copyright Text</h2>
<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $note      = $fm->validation($_POST['note']);
        $note      = mysqli_real_escape_string($db->link, $note);
      
        if ($note == "") {
            echo "<span class='error'>Field must not be empty.</span>";
        } else {

        $query = "UPDATE tbl_footer
            SET 
            note        = '$note'  
            WHERE id = '1'";

            $updatecopyright = $db->update($query);
            if ($updatecopyright) {
                 echo "<span class='success'>Updated successfully</span>";
            } else{
                 echo "<span class='error'>Not updated.</span>";
            }
        }    
    }
?>        
        <div class="block copyblock">         
        <form action="" method="post">
<?php
    $query = "SELECT * FROM tbl_footer WHERE id='1'";
    $copyright = $db->select($query);
    if ($copyright) {
        while ($result = $copyright->fetch_assoc()) {
?>             
            <table class="form">					
                <tr>
                    <td>
                        <input type="text" value="<?php echo $result['note'];?>" name="note" class="large" />
                    </td>
                </tr>
				
				 <tr> 
                    <td>
                        <input type="submit" name="submit" Value="Update" />
                    </td>
                </tr>
            </table>
<?php } } ?>            
            </form>
        </div>
    </div>
</div>
<?php include 'inc/footer.php'?> 
