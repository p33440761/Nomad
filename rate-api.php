<?php
require __DIR__ . '/parts-php/config.php';

$output = [
    'success' => false,
    'code' => 0,
    'error' => '評論沒有上傳'
];



if (isset($_POST['ratedIndex'])) {
    $sid = isset($_POST['sid']) ? intval($_POST['sid']) : 0;
    $ratedIndex = $_POST['ratedIndex'];
    $ratedIndex++;
    $user_id = $_SESSION['user']['id'];
    $rateMsg= isset($_POST['comment']) ? $_POST['comment'] : '';

    $sql = "INSERT INTO `stars`(`member_id`, `schedule_id`, `ratedIndex`, `rateMsg`, `date`) VALUES (?, ?, ?, ?, NOW())";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        $user_id,
        $sid,
        $ratedIndex,
        $rateMsg
    ]);
    // $row = $stmt->fetch();

    if ($stmt->rowcount()) {
        $output['success'] = true;
        $output['error'] = '';

    } else {
        $output['error'] = '上傳發生錯誤';
    }

}
echo json_encode($output, JSON_UNESCAPED_UNICODE);