<?php include __DIR__ . '/parts-php/config.php'; ?>
<?php
$title = '難度';
$pageName = 'level';

$level = isset($_GET['level']) ? intval($_GET['level']) : 0;
$area = isset($_GET['area']) ? intval($_GET['area']) : 0;
// $sid = isset($_GET['sid']) ? intval($_GET['sid']) : 5;

$selectmountain = isset($_GET['selectmountain']) ? $_GET['selectmountain'] : '玉山';
$ml_sql = "SELECT * FROM mountain_level WHERE main_mountain ='$selectmountain'";
$sl_sql = "SELECT * FROM mountain_level";

$totalRows = $pdo->query($ml_sql)->fetch(PDO::FETCH_NUM)[0];
$totalRows2 = $pdo->query($sl_sql)->fetch(PDO::FETCH_NUM)[0];


$rows = $pdo->query($ml_sql)->fetchAll();
$rows2 = $pdo->query($sl_sql)->fetchAll();

$eqImg = isset($_GET['eqImg']) ? $_GET['eqImg'] : 'PA001';
$photo_sql = "SELECT * FROM products ORDER BY RAND() LIMIT 4";
$p_stmt = $pdo->query($photo_sql);
$p_rows = $p_stmt->fetchAll();






echo json_encode([
    'totalRows' => $totalRows,
    'rows' => $rows,
    'p_rows' => $p_rows,
], JSON_UNESCAPED_UNICODE)

?>