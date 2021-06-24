<?php include __DIR__ . '/parts-php/config.php'; ?>
<?php
$title = '難度';
$pageName = 'level';

$level = isset($_GET['level']) ? $_GET['level'] : 'All';
// $level = '';
$area = isset($_GET['area']) ? $_GET['area'] : 'All';

// $sl_sql = "SELECT * FROM mountain_level WHERE m_area ='" .$area . "' AND m_level ='" . $level .  "'";
if (empty($level) || $level == '全難度') {
    // $ml_sql = "SELECT * FROM mountain_level WHERE m_level ='" . $level ;
    $ml_sql = "SELECT * FROM mountain_level WHERE m_area ='" . $area . "'";
};
if (empty($area) || $area == '全地區') {
    // $ml_sql = "SELECT * FROM mountain_level WHERE m_area ='" . $area ;
    $ml_sql = "SELECT * FROM mountain_level WHERE m_level ='" . $level . "'";
};
if (!empty($area && $level) && $area != '全地區' && $level != '全難度') {
    $ml_sql = "SELECT * FROM mountain_level WHERE m_level ='" . $level . "' AND m_area ='" . $area . "'";
};




if ((empty($area) && empty($level)) || ($area == '全地區' && $level == '全難度')) {
    $ml_sql = "SELECT * FROM mountain_level";
}



$rows = $pdo->query($ml_sql)->fetchAll();



echo json_encode([
    // 'totalRows' => $totalRows,
    'rows' => $rows,
    // 'rows2'=> $rows2,
], JSON_UNESCAPED_UNICODE)

// $rows2 = $pdo->query($sl_sql)->fetchAll();


//$select_level ="SELECT * FROM level_select";
//$a_sql ="SELECT * FROM area" ;


// $level_totalRows = $pdo->query($select_level)->fetch(PDO::FETCH_NUM)[0];
// $a_totalRows = $pdo->query($a_sql)->fetch(PDO::FETCH_NUM)[0];

// $selectmountain = isset($_GET['selectmountain']) ? $_GET['selectmountain'] : '玉山';


// $ml_sql = "SELECT * FROM mountain_level WHERE m_level='C'AND m_area='東' ";
// $sl_sql = "SELECT * FROM mountain_level";

// $totalRows2 = $pdo->query($sl_sql)->fetch(PDO::FETCH_NUM)[0];

// $level_rows =$pdo->query($select_level)->fetchAll();
// $a_rows =$pdo->query($a_sql)->fetchAll();


// $rows2 = $pdo->query($sl_sql)->fetchAll();

?>