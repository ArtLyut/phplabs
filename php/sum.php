<?php
$arr = str_split(htmlspecialchars($_POST['string'])); // разбивает строку на массив символов
$result = 0;
foreach ($arr as $value) { // проходимся по массиву
    $result += is_numeric($value) ? intval($value) : 0;
}
echo $result; // выводим результат
?>