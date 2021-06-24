<?php 
require __DIR__.'/parts-php/config.php';

header('Content-Type: application/json');


$output = [
    'success' => false,
    'filename' => '',
    'error' => '沒有上傳檔案',
    'file' => '',
];


$exts = [
    'image/jpeg' => '.jpg',
];


if(!isset($_SESSION['user'])){
    $output['error'] = 'login first';
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}

if(isset($_FILES['info_image'])){
    if( empty($exts[$_FILES['info_image']['type']])){
        $output['error'] = '只接受 jpg';
    } else {
        $ext = $exts[$_FILES['info_image']['type']];  // 取得副檔名1
        $output['file'] = $_FILES['info_image'];
        $dir = __DIR__. '/notebook-image/';  // 存放的路徑
        $fname =  uniqid(). rand(100, 999). $ext;  // 儲存的檔名
        $output['filename'] = $fname;
        if( move_uploaded_file($_FILES['info_image']['tmp_name'], $dir. $fname) ){
            $output['success'] = true;
            $output['error'] = '';
        }
    }
} else {
    $fname = '';
}


if(isset($_POST['diarytitle'])){
    $a_sql = "INSERT INTO `note`(`member_id`, `date`, `diarytitle`, `text_infor`, `info_image`) VALUES (?, NOW(), ?, ?, ?)";

    $a_stmt = $pdo->prepare($a_sql);
    $a_stmt->execute([
        $_SESSION['user']['id'],
        $_POST['diarytitle'],
        $_POST['text_infor'],
        $fname,
    ]);

    if($a_stmt->rowCount()){
        $output['success'] = true;
        $output['error'] = '';
    } else {
        $output['error'] = '新增資料發生錯誤';
    }
}

echo json_encode($output, JSON_UNESCAPED_UNICODE);

    