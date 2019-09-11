<?php include "db.php";
    include "function.php"; ?>
<!doctype html>
<html>
<style>
#content1
{
    background-color:white;
    color:black; 
}
#button
{
    background-color:#4CAF50;height:30px;width:150px;color:white;
}
#div
{
    border:1px solid transparent;
    
    padding:5%;
    width:500px;
    background-color:grey;
    color:white;
    height:100%;
}
input 
{
    border-radius:10%;
    background-color:white;
    width:150px;
    align:center;
}
#main_cat
{
    border-radius:10%;
    background-color:white;
    width:250px;
    text-align:center;
}
#sub_cat
{
    border-radius:10%;
    background-color:white;
    width:250px;
       
}
#label
{
    float:left;
}

</style>

<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
<script>  
   
function test(id)
{
    var dots = document.getElementById("dots"+id);
    var moreText = document.getElementById("more"+id);
    var btnText = document.getElementById("myBtn"+id);

    if (dots.style.display === "none") 
    {
        dots.style.display = "inline";
        btnText.innerHTML = "Read more"; 
        moreText.style.display = "none";

    }
        else 
    {
        dots.style.display = "none";
        btnText.innerHTML = "Read less"; 
        moreText.style.display = "inline";
        
    }

}

$(document).ready(function(){
        $("#main_cat").change(function()
        {
            var txt =$("#main_cat").val();
            $.ajax(
            {
                url: "cat_POST.php",
                method: "GET",
                dataType: "text", 
                data:{maincat:txt},
                success:function(data)
                {
                    $("#content1").empty();
                    $("#content1").css("padding","0px");
                   $("#sub_cat").empty();
                   $("#sub_cat").append("<option value=''>Select</option>"+data);
                }
            });
            
        });
        
        $("#sub_cat").change(function()
        {
            var txt =$("#sub_cat").val();
            $.ajax(
            {
                url: "display_POST.php",
                method: "GET",
                dataType: "text", 
                data:{subcat:txt},
        
                success:function(data)
                {
                    console.log(data);
                    $("#content1").empty();
                    $("#content1").css("padding","20px");
                    $("#content1").append(data);
                   
                }
            });
            
        });
    });
</script>
<center>
&nbsp;
<div id="div">
    
    <label id="label" >Main category:</label>

    <select id="main_cat" name="main_cat" >

    <option value=''>select</option>
        
        <?php
        
        $result=mysqli_query($db,"SELECT `cat` as cat FROM `main_cat`");

    if($result)
    {
        while($row=mysqli_fetch_array($result))
        {
            $r=$row['cat'];
            echo "<option value=$r>$r</option>";
        }       
    }
    else
    {
        echo "<option>Select</option>";
    }
    ?>
        </select><br>

    

    <label id="label">Sub category:&nbsp;&nbsp;</label>
    
    <select id="sub_cat" style="width:250px;">

    <option value=''>Select</option>

    </select>

    
    <div id="content1"></div>


</div>

</center>

</html>