<?php include __DIR__. '/parts-php/config.php'; ?>
<?php
if(! isset($_SESSION['user'])){
    header('Location: signUp.php');
    exit;
}
$m_id = intval($_SESSION['user']['id']);
$sid = isset($_GET['sid']) ? intval($_GET['sid']) : 0;

$sql = "SELECT * FROM schedule WHERE sid = $sid";
    $stmt = $pdo->query($sql);
    $row = $stmt->fetch();

$count_sql = "SELECT COUNT(*) FROM `order_details` WHERE member_sid = $m_id and schedule_sid > 1";
$count_stmt = $pdo->query($count_sql);
$count = $count_stmt->fetchColumn();
$achievement = 6 * $count;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/nomadHomePage.css">
    <link rel="stylesheet" href="./css/achievement_detail1.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>成就細節頁</title>
    <style>
    .animation {
        position: absolute;
        z-index: -10;
        top: -180px;
        left: 0;
        bottom: 0;
        right: 0;
        animation: pulse 3.5s;
    }

    @keyframes pulse {

        0% {
            background: url(./img/w6.png)no-repeat;

        }

        25% {
            background: url(./img/w7.png)no-repeat;
        }

        50% {
            background: url(./img/w8.png)no-repeat;
        }

        75% {
            background: url(./img/w9.png)no-repeat;
        }

        100% {
            background: url(./img/w10.png)no-repeat;
        }
    }
    </style>
</head>

<body>
    <?php include __DIR__ . '/parts-php/html-navbar.php'; ?>

    <div class="animation"></div>

    <div class="navbartop hero-section">
        <div class="navbartop-image">
            <div class="navbox">
                <?php if(isset($_SESSION['user'])) :?>
                <?php if(! empty($_SESSION['user']['profile_image'])): ?>
                <div class="member">
                    <img src="./images/<?= $img ?>">
                </div>
                <?php else: ?>
                <a href="#">
                    <svg class="icon-account-user svg">
                        <use xlink:href="./icomoon/symbol-defs.svg#icon-account-user"></use>
                    </svg>
                </a>
                <?php endif; ?>
                <?php else: ?>
                <a href="./signUp.php">
                    <svg class="icon-account-user svg">
                        <use xlink:href="./icomoon/symbol-defs.svg#icon-account-user"></use>
                    </svg>
                </a>
                <?php endif; ?>
                <div class="textbox">
                    <h1 class="title ff-noto"><?= htmlentities($_SESSION['user']['nickname']) ?></h1>
                    <span class="rank ff-raleway"><?php if ($achievement < 10){
    echo 'Silver';
}else if($achievement < 20 ){
   echo 'Gold';
}else {
    echo 'Platinum';
} ?></span>
                    <div class="trophy">
                        <img src="./img/p2-gold-trophy.png">
                    </div>
                    <span1 class="ff-noto">於2018年5月加入Nomad</span1>
                </div>
            </div>
        </div>
    </div>



    <div class="box">
        <h1 class="title ff-noto none">獎盃</h1>

        <div class="cardinfobox flex">
            <div class="imgbox">
                <img src="<?= WEB_ROOT ?>/images/<?= $row['schedule_id'] ?>/<?= $row['schedule_id'] ?>.jpeg" alt="">
            </div>
            <div class="boxinfo">
                <h4 class="title ff-noto"><?= $row['schedule_title'] ?></h4>
                <svg class="icon-star svg">
                    <use xlink:href="./icomoon/symbol-defs.svg#icon-star"></use>
                </svg>
                <span class="num ff-raleway">5</span>
                <!-- <span class="text ff-noto">(20則評價)</span> -->
                <p class="text ff-noto"><?= $row['level'] ?>級</p>
                <p class="departure_date ff-noto"><?= $row['departure_date'] ?></p>
                <p id="value1" class="percentage ff-raleway">100%</p>
                <div class="bars">
                    <div class="progressBar-up"></div>
                    <div class="progressBar-down"></div>
                </div>
                <ul class="trophy-box flex">
                    <li>
                        <div class="img">
                            <img src="./img/p1-platinum-trophy.png" alt="">
                        </div>
                        <span class="num ff-raleway">1</span>
                    </li>
                    <li>
                        <div class="img">
                            <img src="./img/p2-gold-trophy.png" alt="">
                        </div>
                        <span class="num ff-raleway">1</span>
                    </li>
                    <li>
                        <div class="img">
                            <img src="./img/p3-silver-trophy.png" alt="">
                        </div>
                        <span class="num ff-raleway">2</span>
                    </li>
                    <li>
                        <div class="img">
                            <img src="./img/p4-bronze-trophy.png" alt="">
                        </div>
                        <span class="num ff-raleway">2</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="parentBox flex">
        <div class="successbox col-12 col-md-12 col-lg-4 col-xl-4">
            <div class="success-img-box">
                <img src="./img/金色奇萊山.jpeg" alt="">
            </div>
            <div class="success-description">
                <div class="success-flex flex">
                    <div class="success-image">
                        <img src="./img/p1-platinum-trophy.png" alt="">
                    </div>
                    <div>
                        <span class="text ff-noto">金色山脈</span>
                        <p class="text ff-noto">極為珍貴 8%</p>
                    </div>
                </div>
                <p class="title ff-noto">取得所有獎盃</p>
            </div>
        </div>

        <div class="successbox col-12 col-md-12 col-lg-4 col-xl-4 ">
            <div class="success-img-box">
                <img src="./img/黑色奇萊山.jpeg" alt="">
            </div>
            <div class="success-description">
                <div class="success-flex flex">
                    <div class="success-image">
                        <img src="./img/p2-gold-trophy.png" alt="">
                    </div>
                    <div>
                        <span class="text ff-noto">黑色奇萊</span>
                        <p class="text ff-noto">非常珍貴 18%</p>
                    </div>
                </div>
                <p class="title ff-noto">登頂<?= substr($row['info2-title'],0,-3) ?></p>
                <p class="text ff-noto">攀登海拔 3,607公尺</p>
            </div>
        </div>

        <div class="successbox col-12 col-md-12 col-lg-4 col-xl-4 ">
            <div class="success-img-box">
                <img src="./img/奇萊稜線.jpeg" alt="">
            </div>
            <div class="success-description">
                <div class="success-flex flex">
                    <div class="success-image">
                        <img src="./img/p3-silver-trophy.png" alt="">
                    </div>
                    <div>
                        <span class="text ff-noto">稜線之美</span>
                        <p class="text ff-noto">珍貴 28%</p>
                    </div>
                </div>
                <p class="title ff-noto">抵達<?= substr($row['info1-title'],0,-3) ?></p>
                <p class="text ff-noto">攀登海拔 3,300公尺</p>
            </div>
        </div>

        <div class="successbox col-12 col-md-12 col-lg-4 col-xl-4 ">
            <div class="success-img-box">
                <img src="./img/奇萊水鹿.jpeg" alt="">
            </div>
            <div class="success-description">
                <div class="success-flex flex">
                    <div class="success-image">
                        <img src="./img/p3-silver-trophy.png" alt="">
                    </div>
                    <div>
                        <span class="text ff-noto">登山望遠</span>
                        <p class="text ff-noto">珍貴 33%</p>
                    </div>
                </div>
                <p class="title ff-noto">抵達<?= substr($row['info3-title'],0,-3) ?></p>
                <p class="text ff-noto">攀登海拔 3,000公尺</p>
            </div>
        </div>

        <div class="successbox col-12 col-md-12 col-lg-4 col-xl-4 ">
            <div class="success-img-box">
                <img src="./img/奇萊山屋.jpeg" alt="">
            </div>
            <div class="success-description">
                <div class="success-flex flex">
                    <div class="success-image">
                        <img src="./img/p4-bronze-trophy.png" alt="">
                    </div>
                    <div>
                        <span class="text ff-noto">豪華山莊</span>
                        <p class="text ff-noto">珍貴 37%</p>
                    </div>
                </div>
                <p class="title ff-noto">抵達成功山屋</p>
                <p class="text ff-noto">攀登海拔 2,879公尺</p>
            </div>
        </div>

        <div class="successbox col-12 col-md-12 col-lg-4 col-xl-4 ">
            <div class="success-img-box">
                <img src="./img/奇萊登山口.jpeg" alt="">
            </div>
            <div class="success-description">
                <div class="success-flex flex">
                    <div class="success-image">
                        <img src="./img/p4-bronze-trophy.png" alt="">
                    </div>
                    <div>
                        <span class="text ff-noto">初次見面</span>
                        <p class="text ff-noto">一般 56%</p>
                    </div>
                </div>
                <p class="title ff-noto">抵達山口</p>
                <p class="text ff-noto">攀登海拔 1,150公尺</p>
            </div>
        </div>
    </div>


    <?php include __DIR__. '/parts-php/html-fixedBar.php'; ?>
    <?php include __DIR__. '/parts-php/html-footer.php'; ?>
    <?php include __DIR__. '/parts-php/html-scripts.php'; ?>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
        integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
    </script>

    <script>
    function increase() {
        // 更改變量以修改數字的速度，從0增加到（ms）
        let SPEED = 20;
        // 百分比值
        let limit = parseInt(document.getElementById("value1").innerHTML, 10);

        for (let i = 0; i <= limit; i++) {
            setTimeout(function() {
                document.getElementById("value1").innerHTML = i + "%";
            }, SPEED * i);
        }
    }

    increase();
    </script>
    <?php include __DIR__. '/parts-php/html-endingTag.php'; ?>