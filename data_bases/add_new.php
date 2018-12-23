<?php
$dbhost = "127.0.0.1";
$dbuser = "Artem";
$dbpass = "";
$dbname = "db_pass";

$fio= $_POST['fio']; 
$auto_number=$_POST['number'];
$info=$_POST['info'];
$connection  = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

$query_owners = "INSERT INTO Owners (fio) VALUES ('". $fio ."')";
$res1 = mysqli_query($connection, $query_owners);
if(!$res1){
    die("Database query failed.1" . mysqli_connect_error() );
}

$owner_id = mysqli_fetch_row(mysqli_query($connection,
    "SELECT id FROM Owners WHERE fio='" . $fio."'"
));
$query_auto = "INSERT INTO Auto (owner,". "number) VALUES (". $owner_id[0].",'". $auto_number ."')";
$res2 = mysqli_query($connection, $query_auto);
if(!$res2){
    die("Database query failed.2");
}
$auto_id = mysqli_fetch_row(mysqli_query($connection,
    "SELECT id FROM Auto WHERE owner=".$owner_id[0]
));
$query_pass= "INSERT INTO Pass (auto, auto_info) VALUES (". $auto_id[0].",'". $info ."')";

$res3 = mysqli_query($connection, $query_pass);
if(!$res3){
    die("Database query failed.3");
}

if(mysqli_connect_errno()) {
    die("Databases connection failed: " . 
    mysqli_connect_error() );
}

mysqli_close($connection);
?>