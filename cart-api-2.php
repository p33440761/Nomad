<?php include __DIR__. '/parts-php/config.php'; 

if(! isset($_SESSION['cart'])){
    $_SESSION['cart'] = [];
}

if(! isset($_SESSION['p_cart'])){
    $_SESSION['p_cart'] = [];
}


// 1. 列表 2.加入 3.變更數量 4.移除項目
// 1. list 2.add 3.update 4.delete

$action = isset($_GET['action']) ? $_GET['action'] : 'list'; //操作的動作
$pid = isset($_GET['pid']) ? intval($_GET['pid']) : 0;//商品id
$sid = isset($_GET['sid']) ? intval($_GET['sid']) : 0;//行程
$qty = isset($_GET['qty']) ? intval($_GET['qty']) : 0;//數量
$pqty = isset($_GET['pqty']) ? intval($_GET['pqty']) : 0;

switch($action){
    case 'update':
    case 'add':
        if(! empty($sid)){
            if($qty > 0){

                // 購物車內已經有這個商品資料
                if(! empty($_SESSION['cart'][$sid])){
                    $_SESSION['cart'][$sid]['quantity'] = $qty;
                    
                } else {

                    // 如果是新加入的商品
                    $sql = "SELECT * FROM schedule WHERE sid=$sid"; //查詢資料表
                    $row = $pdo->query($sql)->fetch(); //撈出一筆資料

                    if(! empty($row)){
                        $row['quantity'] = $qty; //把數量加入
                        $_SESSION['cart'][$row['sid']] = $row; // 放到購物車裡
                        
                    } 
                }
            } else {
                unset($_SESSION['cart'][$sid]); //移除該項商品
            }
        } else if(! empty($pid)){
            if($pqty > 0){

                // 購物車內已經有這個商品資料
                if(! empty($_SESSION['p_cart'][$pid])){
                    $_SESSION['p_cart'][$pid]['quantity'] = $pqty;
                    
                } else {

                    // 如果是新加入的商品
                    $p_sql = "SELECT * FROM products WHERE sid=$pid"; //查詢資料表
                    $p_row = $pdo->query($p_sql)->fetch(); //撈出一筆資料

                    if(! empty($p_row)){
                        $p_row['quantity'] = $pqty; //把數量加入
                        $_SESSION['p_cart'][$p_row['sid']] = $p_row; // 放到購物車裡
                        
                    } 
                }
            }
        }
        break;
    case 'delete':
        if(! empty($sid)){
            unset($_SESSION['cart'][$sid]); //移除該項商品  
        } else if(! empty($pid)){
            unset($_SESSION['p_cart'][$pid]);
        }
        break;
    
    default:
    case 'list':
}

echo json_encode([$_SESSION['cart'], $_SESSION['p_cart'],], JSON_UNESCAPED_UNICODE);
?>