<?php include __DIR__.'/parts-php/config.php';?>
<?php
$title="登山記事";
$pageName="note";

$perPage = 4; //每一頁有幾筆
$page = isset($_GET['page']) ? intval($_GET['page']) : 0; //用戶要看第幾頁的商品

$t_sql = "SELECT COUNT(1) FROM note";
$totalRows = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0];
$totalPages = ceil($totalRows / $perPage);

if ($page < 1) $page = 1;
if ($page > $totalPages) $page = $totalPages;

$p_sql = sprintf("SELECT note.*, members.`profile_image`, members.`nickname` FROM note  LEFT JOIN members ON note.member_id=members.id ORDER BY note.`sid` DESC LIMIT %s, %s ", ($page - 1) * $perPage, $perPage);
$rows = $pdo->query($p_sql)->fetchAll();



$where = 'WHERE 1';

if (!empty($_SESSION['user'])) {
    $nid = intval($_SESSION['user']['id']);
    $where .= " AND f.`type`=3 AND f.`member_id`= $nid ";
    //f代表favorites的縮寫

    $f_sql = sprintf("SELECT f.target_id FROM note
    LEFT JOIN favorites f ON f.target_id= note.sid
    $where");
    $favorites = $pdo->query($f_sql)->fetchAll();
}





echo json_encode([
    'perPage' => $perPage,
    'page' => $page,
    'totalRows' => $totalRows,
    'totalPages' => $totalPages,
    'rows' => $rows,
    'favorites' => $favorites ?? '',
], JSON_UNESCAPED_UNICODE);