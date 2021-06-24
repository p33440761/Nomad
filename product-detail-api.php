<?php include __DIR__ . '/parts-php/config.php'; ?>
<?php

if (!isset($_SESSION['p_cart'])) {
    $_SESSION['p_cart'] = [];
}


// 1.列表, 2.加入, 3.變更數量, 4.移除項目
// 1.list, 2.add, 3.update, 4.delete

$action = isset($_GET['action']) ? $_GET['action'] : 'list'; // 操作的動作
$pid = isset($_GET['pid']) ? intval($_GET['pid']) : 0; // 商品 id
$qty = isset($_GET['qty']) ? intval($_GET['qty']) : 0;  // 數量

switch ($action) {
    case 'update':
    case 'add':
        if (!empty($pid)) {
            if ($qty > 0) {

                //購物車內已經有這個商品資料
                if (!empty($_SESSION['p_cart']['$pid'])) {
                    $_SESSION['p_cart'][$pid]['quantity'] = $qty;
                } else {

                    //如果是新加入的商品
                    $sql = "SELECT * FROM products WHERE sid=$pid";
                    $row = $pdo->query($sql)->fetch();

                    if (!empty($row)) {
                        $row['quantity'] = $qty; //把數量加入
                        $_SESSION['p_cart'][$row['sid']] = $row; //放到購物車裡

                    }
                }
            } else {
                unset($_SESSION['p_cart'][$pid]); //移除該項商品
            }
        }
        break;
    case 'delete':
        if (!empty($pid)) {
            unset($_SESSION['p_cart'][$pid]); //移除該項商品
        }
        break;
    default:
    case 'list';
}

// header('Content-Type: application/json');
echo json_encode($_SESSION['p_cart'], JSON_UNESCAPED_UNICODE);