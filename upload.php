<?php
$output = [
    'success' => false,
    'filename' => '',
    'error' => '沒有上傳檔案',
];
$exts = [
    'image/png' => '.png',
    'image/jpeg' => '.jpg',
];
if(isset($_FILES['profileImage'])){

    if(empty($exts[$_FILES['profileImage']['type']])){
        $output['error'] = '只接受 png, jpg';
    }else{
        $ext = $exts[$_FILES['profileImage']['type']];
        $output['file'] = $_FILES['profileImage'];
        $dir =  __DIR__ . '/images/';
        $fname= uniqid(). rand(100, 999). $ext;
        $output['filename']= $fname;
        if(move_uploaded_file($_FILES['profileImage']['tmp_name'], $dir.$fname)){
            $output['success'] = true;
            $output['error'] = '';
        }  
    }
}
header('Content-Type: application/json');
echo json_encode($output);
?>