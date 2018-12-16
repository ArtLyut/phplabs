<?php
$n = (int)$_POST['dim']; // разбивает строку на массив символов
$result = 0;
for ($i = 0; $i < $n; $i++) {
    for($j = 0; $j < $n; $j++) {
        $d = (int)$_POST['arr' . strval($i) . strval($j)];
        if($d < 0) {
            $result += 0 - $d;
        }
    }
}
echo $result; // выводим результат
?>