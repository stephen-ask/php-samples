<style>#sub_cat{
    border-radius:10%;
  background-color:white;
  width:250px;
       
}</style>

<?php 
include "db.php" ;
include "function.php";
$cat=$_GET['maincat'];
$result=result("SELECT `sub_category` as cat FROM `category` WHERE `main_category`='$cat'");
echo "Sub category<select id='sub_cat' name='sub_cat'>" ;
if($result)
{
    while($row=mysqli_fetch_array($result))
{
echo "<option>".$row['cat']."</option>";
}
}else
{
    "<option>Select</option>";
}
echo "</select>" ;
?>