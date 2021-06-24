<?php include __DIR__. '/parts-php/config.php'; 

$output = [
    'success' => false,
    'code' => 0,
    'error' => '未登入'
];


if(isset($_SESSION['user'])) {
    $output['success'] = true;
    $output['error'] = '已登入';
} 

echo json_encode($output, JSON_UNESCAPED_UNICODE);

?>