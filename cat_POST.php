
<?php 
include "db.php" ;

include "function.php";

$cat=$_GET['maincat'];

$result=result("SELECT `sub_category` as cat FROM `category` WHERE `main_category`='$cat'");

if($result)
    {
        while($row=mysqli_fetch_array($result))
    {
    echo "<option value='".$row['cat']."'>".$row['cat']."</option>";
    }
    }
else
    {
        "<option>Select</option>";
    }

?>
