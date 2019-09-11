<?php

function result($string)
    {$conn=mysqli_connect("localhost","root","","test1") or die("failed to connect database");
        $result=mysqli_query($conn,$string)or die(mysqli_error($conn));
        return $result;      
    }
    ?>