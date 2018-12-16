<?php
$file_path= $_POST['file']; 
$out_file_path=$_POST['out_file'];
$fp = fopen($file_path, 'r');
$fo = fopen($out_file_path, 'r+');
if ($fp) 
{
    $cnt = (int)0;
    $num = (int)0;
    while(!feof($fp))
    {
        $token = fgetc($fp);
        if (ord($token) < 48 or ord($token) > 57) {
            if($cnt != 0) {
                if($num % 2 != 0)
                    fwrite($fo, strval($num));
            }
            $cnt = (int)0;
            $num = (int)0;
            fwrite($fo, strval($token));
        }
        else{
            $num = $num*(int)10 + ord($token) - 48;
            $cnt++;
        }
    }
    if($num % 2 != 0)
        fwrite($fo, strval($num));
}
fclose($fp);
fclose($fo);
echo "файл записан!"
?>