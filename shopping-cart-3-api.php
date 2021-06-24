<?php include __DIR__. '/parts-php/config.php'; 

$output = [
    'success' => false,
    'code' => 0,
    'error' => '購物車沒有行程'
];

if(isset($_POST['name'])){
    //TODO：欄位資料檢查

    //檢查手機格式
    $mobile_re = "/^09\d{2}-?\d{3}-?\d{3}$/";
    $email_re = "/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i";

    if(empty(preg_grep($email_re, [$_POST['email']]))){
        $output['error'] = 'Email格式不符合';
        echo json_encode($output, JSON_UNESCAPED_UNICODE);
        exit; 
    } elseif (empty(preg_grep($mobile_re, [$_POST['mobile']]))){
        $output['error'] = '手機號碼格式不符合';
        echo json_encode($output, JSON_UNESCAPED_UNICODE);
        exit;
    }

    if(empty($_SESSION['cart'])){
        $output['success'] = false;
    } else {
        $output['success'] = true;
    }

    $_SESSION['name'] = $_POST['name'];
    $_SESSION['mobile'] = $_POST['mobile'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['name2'] = $_POST['name2'];
    $_SESSION['mobile2'] = $_POST['mobile2'];
    $_SESSION['email2'] = $_POST['email2'];

    

     // $sql = "INSERT INTO `order_details`(
    //                         `orderer`, `orderer_mobile`, `orderer_email`, 
    //                         `recipient`, `recipient_mobile`, `recipient_email`
    //                         ) VALUES (
    //                             ?, ?, ?, 
    //                             ?, ?, ?
    //                         )";

    // if($stmt->rowCount()){
    //     $output['success'] = true;
    //     $output['error'] = '';
    // } else {
    //     $output['error'] = '新增資料發生錯誤';
    // }
    
}

echo json_encode($output, JSON_UNESCAPED_UNICODE);