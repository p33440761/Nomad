<?php
require __DIR__ . '/parts-php/config.php';



$output = [
    'success' => false,
    'code' => 0,
    'error' => '資料沒有修改'
];

if (isset($_SESSION['user'])) {
    // if(isset($_POST['profileImage'])){

        $email=$_SESSION['user']['email'];


        $nickname = $_POST['nickname'];
        $profile_image = isset($_POST['profile_image']) ? $_POST['profile_image'] : '';
        $mobile = isset($_POST['mobile']) ? $_POST['mobile'] : '';
        $birthday = isset($_POST['birthday']) ? $_POST['birthday'] : '';
        $gender= isset($_POST['gender']) ? $_POST['gender'] : '';
        

        $sql = "UPDATE `members` SET `profile_image`=?,`nickname`=?,`gender`=?,`mobile`=?,`birthday`=? WHERE `email`=?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            $profile_image,
            $nickname,
            $gender,
            $mobile,
            $birthday,
            $email
        ]);

        if ($stmt->rowcount()) {
            $output['success'] = true;
            $output['error'] = '';



            $a_sql = "SELECT * FROM `members` WHERE `email`=?";
            $a_stmt = $pdo->prepare($a_sql);
            $a_stmt->execute([$email]);
            $row = $a_stmt->fetch();

            unset($row['password']);
            unset($row['hash']);
            $_SESSION['user'] = $row;

            $output['post'] = $row;


        } else {
            $output['error'] = '修改發生錯誤';
        }
    // }
    
}
echo json_encode($output, JSON_UNESCAPED_UNICODE);
?>