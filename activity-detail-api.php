<?php include __DIR__. '/parts-php/config.php'; ?>
<?php
$title = '行程細節';
$pageName = 'activity-detail';

$sid = isset($_GET['sid']) ? intval($_GET['sid']) : '';

$sql = "SELECT * FROM `schedule` WHERE schedule.sid = $sid";
$stmt = $pdo->query($sql);
$row = $stmt->fetch();

echo json_encode($row, JSON_UNESCAPED_UNICODE);