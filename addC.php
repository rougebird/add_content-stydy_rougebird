<?php

error_reporting(E_ALL & ~E_NOTICE);error_reporting(E_ALL & ~E_NOTICE);

$servername = "localhost:3306";
$username = "root";
$password = "01100125";

//Connecting to DB
$conn = mysqli_connect($servername,$username,$password,"study_content");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//Getting content ID
$sql0="SELECT * FROM content_store";

$result=mysqli_query($conn, $sql0);
if(mysqli_num_rows($result)>0)
{
	$cid=mysqli_num_rows($result)+1;
}

//echo $cid;

//Inserting new content record into DB
$title=$_POST[c_title];
$desc=$_POST[c_desc];
$link=$_POST[c_downLink];
$type=$_POST[c_type];
$cat=$_POST[c_cat];

$sql="INSERT INTO `content_store` (`content_id`, `uname`, `content_up_date`, `content_title`, `content_desc`, `content_down_link`, `content_type`, `content_cat`) VALUES ('".$cid."', 'ajay', '".date("Y-m-d")."','".$title."', '".$desc."', '".$link."', '".$type."', '".$cat."')";

//echo $cat;
//echo $sql;

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

?>