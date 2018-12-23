<?php
$dbhost = "127.0.0.1";
$dbuser = "Artem";
$dbpass = "";
$dbname = "db_pass";
$connection  = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
$query = "SELECT fio, number FROM Owners INNER JOIN Auto ON Owners.id=Auto.owner";

$export = mysqli_query ($connection,$query ) or die ( "Sql error : " . mysql_error( ) );

/*
$fields = mysqli_num_fields ( $export );

for ( $i = 0; $i < $fields; $i++ )
{
    $header .= mysqli_field_name( $export , $i ) . "\t";
}*/

$fields = mysqli_fetch_fields($export); 
       
foreach($fields as $fi => $f)  
{ 
  $header.=$f->name."\t"; 
} 

while( $row = mysqli_fetch_row( $export ) )
{
    $line = '';
    foreach( $row as $value )
    {                                            
        if ( ( !isset( $value ) ) || ( $value == "" ) )
        {
            $value = "\t";
        }
        else
        {
            $value = str_replace( '"' , '""' , $value );
            $value = '"' . $value . '"' . "\t";
        }
        $line .= $value;
    }
    $data .= trim( $line ) . "\n";
}
$data = str_replace( "\r" , "" , $data );

if ( $data == "" )
{
    $data = "\n(0) Records Found!\n";                        
}

header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=your_desired_name.xls");
header("Pragma: no-cache");
header("Expires: 0");
print "$header\n$data";
?>