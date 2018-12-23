<?php
$dbhost = "127.0.0.1";
$dbuser = "Artem";
$dbpass = "";
$dbname = "db_pass";

$auto_number=$_POST['number'];

$connection  = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
$query = "SELECT id, owner FROM Auto WHERE number='".$auto_number."'";
$res = mysqli_fetch_row(mysqli_query($connection,
$query
));
if(!$res){
    die("Database query failed.0" . mysqli_connect_error() );
}
$auto_id = $res[0];
$owner_id= $res[1];

$query_pass = "DELETE FROM Pass WHERE auto=".$auto_id;
$res1 = mysqli_query($connection, $query_pass);
if(!$res1){
    die("Database query failed.1" . mysqli_connect_error() );
}

$query_auto = "DELETE FROM Auto WHERE id=".$auto_id;
$res2 = mysqli_query($connection, $query_auto);
if(!$res2){
    die("Database query failed.2" . mysqli_connect_error() );
}

$query_owner = "DELETE FROM Owners WHERE id=".$owner_id;
$res3 = mysqli_query($connection, $query_owner);
if(!$res3){
    die("Database query failed.3" . mysqli_connect_error() );
}


if(mysqli_connect_errno()) {
    die("Databases connection failed: " . 
    mysqli_connect_error() );
}

mysqli_close($connection);
?>