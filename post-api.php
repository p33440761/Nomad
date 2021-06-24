<?php 

require __DIR__.'/parts-php/config.php';

$output = [
    'success' => false,
    'code' => 0,
    'error' => '未登入'
];

if(isset($_SESSION['user'])) {
    $output['success'] = true;
    $output['error'] = '已登入';
}

// if(! isset($_SESSION)) session_start();

// $sql = "SELECT `id`, `profile_image`, `nickname`, `email`, `gender`, `mobile`, `birthday` FROM `members` WHERE id=$user_id";

// $row = $pdo->query($sql)->fetch();
// $_SESSION['user'] = $row;

// header('Content-Type: application/json');


echo json_encode($output, JSON_UNESCAPED_UNICODE);

?>
 