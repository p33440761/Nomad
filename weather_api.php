<?php include __DIR__ . '/parts-php/config.php'; ?>
<?php
$title = '天氣';
$pageName = 'weather';


// $searchmountain ='玉山';
// $m_click = document.querySelector'li'= 
$searchmountain = isset($_GET['searchmountain']) ? $_GET['searchmountain'] : '玉山';
//api黨都沒有報錯時就來看這邊有無出錯，發現searchmountain如果沒有預先給值的話，就無法呈現，因為network中有抓到點擊的山名，因此預設如果有值就抓值，如果沒有抓到值就給玉山





$t_sql = "SELECT * FROM mountain_weather WHERE mountain_name ='$searchmountain'";
$m_sql = "SELECT * FROM mountain_weather ";

// $a_sql = "SELECT * FROM area ";

$totalRows = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0];
$totalRows2 = $pdo->query($m_sql)->fetch(PDO::FETCH_NUM)[0];

$rows = $pdo->query($t_sql)->fetchAll();
$rows2 = $pdo->query($m_sql)->fetchAll();



// if(isset($_GET['mountain_weather'])){
//     $m_sql = "SELECT * FROM mountain_weather WHERE rain ="
// }
// if($_GET['rain'] >'40' or $_GET['3am_icon']>'40'){
//     $city=$_POST['city'];
//     $sex=$_POST['sex'];
//     $data=mysql_query("select * from member where memCity like '%$city%' and memSex like '$sex'"); 
//    }else{
//     $data=mysql_query("select * from member");
//    }


echo json_encode([
    'totalRows' => $totalRows,
    'rows' => $rows,
], JSON_UNESCAPED_UNICODE)

?>