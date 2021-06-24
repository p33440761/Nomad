<?php include __DIR__ . '/parts-php/config.php'; ?>
<?php
$title = '難度';
$pageName = 'level';


$eqImg = isset($_GET['eqImg']) ? $_GET['eqImg'] : 'PA001';
$photo_sql = "SELECT * FROM products ORDER BY RAND() LIMIT 4 ";
$p_stmt = $pdo->query($photo_sql);
$p_rows = $p_stmt->fetchAll();


echo json_encode([
    'p_rows' => $p_rows,
], JSON_UNESCAPED_UNICODE)

?>