<?php include __DIR__. '/parts-php/config.php'; 

$output = [
    'success' => false,
    'code' => 0,
    'error' => '輸入資料不完全'
];

if(isset($_POST['name3'])){
    //TODO：欄位資料檢查

    //檢查手機格式
    $mobile_re = "/^09\d{2}-?\d{3}-?\d{3}$/";
    $email_re = "/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i";
    $personalId_re = "/^[A-Z]\d{9}$/";

    if(empty(preg_grep($email_re, [$_POST['email3']]))){
        $output['error'] = 'Email格式不符合';
        echo json_encode($output, JSON_UNESCAPED_UNICODE);
        exit; 
    } elseif (empty(preg_grep($mobile_re, [$_POST['mobile3']]))){
        $output['error'] = '手機號碼格式不符合';
        echo json_encode($output, JSON_UNESCAPED_UNICODE);
        exit;
    } else if (empty(preg_grep($personalId_re, [$_POST['personalId']]))){
        $output['error'] = '身分證格式不符合';
        echo json_encode($output, JSON_UNESCAPED_UNICODE);
        exit;
    }

    $output['success'] = true;
    $output['error'] = '';

    $_SESSION['name3'] = $_POST['name3'];
    $_SESSION['mobile3'] = $_POST['mobile3'];
    $_SESSION['email3'] = $_POST['email3'];
    
}

echo json_encode($output, JSON_UNESCAPED_UNICODE);