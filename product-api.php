<?php include __DIR__ . '/parts-php/config.php'; ?>
<?php
$title = '商品列表';
$pageName = 'product';

//品項分類
$c_sql = "SELECT * FROM categories WHERE parent_sid =0 ";
$cate_rows = $pdo->query($c_sql)->fetchAll();

$cate = isset($_GET['cate']) ? intval($_GET['cate']) : 0;
$qs = [];

$where = ' WHERE 1 ';
if (!empty($cate)) {
    $where .= " AND p.category_sid=$cate ";
    $qs['cate'] = $cate;
}

//價格分類：設定pricrLow的價格為整數，如沒有抓到預設為0
$priceLow = isset($_GET['priceLow']) ? intval($_GET['priceLow']) : 0;

//價格分類：設定pricrHigh的價格為整數，如沒有抓到預設為0
$priceHigh = isset($_GET['priceHigh']) ? intval($_GET['priceHigh']) : 18000;
$where .= " AND p.product_price >= $priceLow AND p.product_price <= $priceHigh ";


//取得總筆數，總頁數，該頁的商品資料

$perPage = 12; //每一頁有幾筆
$page = isset($_GET['page']) ? intval($_GET['page']) : 1; //用戶要看第幾頁的商品

$t_sql = "SELECT COUNT(1) FROM products p $where ";

$totalRows = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0];
$totalPages = ceil($totalRows / $perPage);

if ($page < 1) $page = 1;
if ($page > $totalPages) $page = $totalPages;


//以上程式碼代表點擊收藏之後，在會員登入的情況下，如果跳轉頁面時愛心收藏會一直存在
$p_sql = sprintf("SELECT * FROM products p $where LIMIT %s, %s ", ($page - 1) * $perPage, $perPage);


$rows = $pdo->query($p_sql)->fetchAll();

if (!empty($_SESSION['user'])) {
    $mid = intval($_SESSION['user']['id']);
    $where .= " AND f.`type`=2 AND f.`member_id`=$mid";
    //f代表favorites的縮寫

    $f_sql = sprintf("SELECT f.target_id FROM products p 
    LEFT JOIN favorites f ON f.target_id=p.sid
    $where");
    $favorites = $pdo->query($f_sql)->fetchAll();
}


echo json_encode([
    'perPage' => $perPage,
    'cate' => $cate,
    'page' => $page,
    'totalRows' => $totalRows,
    'totalPages' => $totalPages,
    'rows' => $rows,
    'favorites' => $favorites ?? '',

], JSON_UNESCAPED_UNICODE);


?>