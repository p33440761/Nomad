<?php include __DIR__. '/parts-php/config.php'; ?>
<?php 
$title = '感謝購買';
$pageName = 'shopping-cart-confirm';

if(! isset($_SESSION['user']) or (empty($_SESSION['cart']) && empty($_SESSION['p_cart']))){
    header('Location: activity-list.php');
    exit;
}

$p_total = 0;
foreach($_SESSION['p_cart'] as $p){
    $p_total += $p['product_price'] * $p['quantity'];
}

$s_total = 0;
foreach($_SESSION['cart'] as $v){
    $s_total += $v['price'] * $v['quantity'];
}

$total = $p_total + $s_total;

$o_sql = "INSERT INTO `orders`
                (`sid`, `member_sid`, `amount`, `order_date`) 
                VALUES 
                (NULL, ?, ?, NOW())";
$o_stmt = $pdo->prepare($o_sql);
$o_stmt->execute([
    $_SESSION['user']['id'],
    $total,
]);

$order_sid = $pdo->lastInsertId();


$d_sql = "INSERT INTO `order_details`
                (`member_sid`, `order_sid`, `product_sid`, `schedule_sid`, `price`, `quantity`,
                `orderer`, `orderer_mobile`, `orderer_email`, `recipient`,
                `recipient_mobile`, `recipient_email`)
                VALUES 
                (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$d_stmt = $pdo->prepare($d_sql);


if(! empty($_SESSION['p_cart']) && ! empty($_SESSION['cart'])){
    foreach($_SESSION['p_cart'] as $p){
        $d_stmt->execute([
            $_SESSION['user']['id'],
            $order_sid,
            $p['sid'],
            0,
            $p['product_price'],
            $p['quantity'],
            $_SESSION['name'],
            $_SESSION['mobile'],
            $_SESSION['email'],
            $_SESSION['name2'],
            $_SESSION['mobile2'],
            $_SESSION['email2'],
        ]);
    }

    foreach($_SESSION['cart'] as $v){
        $d_stmt->execute([
            $_SESSION['user']['id'],
            $order_sid,
            0,
            $v['sid'],
            $v['price'],
            $v['quantity'],
            $_SESSION['name3'],
            $_SESSION['mobile3'],
            $_SESSION['email3'],
            $_SESSION['name3'],
            $_SESSION['mobile3'],
            $_SESSION['email3'],
        ]);
    }
} else if(! empty($_SESSION['p_cart'])){
    foreach($_SESSION['p_cart'] as $p){
        $d_stmt->execute([
            $_SESSION['user']['id'],
            $order_sid,
            $p['sid'],
            0,
            $p['product_price'],
            $p['quantity'],
            $_SESSION['name'],
            $_SESSION['mobile'],
            $_SESSION['email'],
            $_SESSION['name2'],
            $_SESSION['mobile2'],
            $_SESSION['email2'],
        ]);
    }
} else if(! empty($_SESSION['cart'])){
    foreach($_SESSION['cart'] as $v){
        $d_stmt->execute([
            $_SESSION['user']['id'],
            $order_sid,
            0,
            $v['sid'],
            $v['price'],
            $v['quantity'],
            $_SESSION['name3'],
            $_SESSION['mobile3'],
            $_SESSION['email3'],
            $_SESSION['name3'],
            $_SESSION['mobile3'],
            $_SESSION['email3'],
        ]);
    }
}


$sql = "SELECT * FROM `order_details` LEFT JOIN `orders` ON order_details.order_sid = orders.sid WHERE `order_sid`=$order_sid";
$row = $pdo->query($sql)->fetch();



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/shopping-cart-5.css" />
    <title>購物車頁</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" />
</head>

<body>
    <?php include __DIR__ . '/parts-php/html-navbar.php'; ?>

    <section class="progress-bar-section hero-section">
        <div class="container">
            <ul class="progress-bar flex">
                <li class="dots">
                    <p class="title ff-noto">
                        確認購買清單
                        <svg class="icon-play svg">
                            <use xlink:href="./icomoon/symbol-defs.svg#icon-play"></use>
                        </svg>
                    </p>
                    <div class="outer-circle">
                        <div class="inner-circle">
                            <div class="line"></div>
                        </div>
                    </div>
                </li>
                <li class="dots">
                    <p class="title ff-noto">
                        選額計算及配送方式
                        <svg class="icon-play svg">
                            <use xlink:href="./icomoon/symbol-defs.svg#icon-play"></use>
                        </svg>
                    </p>
                    <div class="outer-circle">
                        <div class="inner-circle">
                            <div class="line"></div>
                        </div>
                    </div>
                </li>
                <li class="dots">
                    <p class="title ff-noto">
                        填寫訂購人資訊及收貨人資訊
                        <svg class="icon-play svg">
                            <use xlink:href="./icomoon/symbol-defs.svg#icon-play"></use>
                        </svg>
                    </p>
                    <div class="outer-circle">
                        <div class="inner-circle">
                            <div class="line"></div>
                        </div>
                    </div>
                </li>
                <li class="dots">
                    <p class="title ff-noto">
                        填寫信用卡資料
                        <svg class="icon-play svg">
                            <use xlink:href="./icomoon/symbol-defs.svg#icon-play"></use>
                        </svg>
                    </p>
                    <div class="outer-circle">
                        <div class="inner-circle">
                            <div class="line"></div>
                        </div>
                    </div>
                </li>
                <li class="dots">
                    <p class="title ff-noto">
                        完成訂購
                        <svg class="icon-play svg">
                            <use xlink:href="./icomoon/symbol-defs.svg#icon-play"></use>
                        </svg>
                    </p>
                    <div class="outer-circle">
                        <div class="inner-circle"></div>
                    </div>
                </li>
            </ul>
        </div>
    </section>

    <section class="order-complete-section">
        <div class="container">
            <div class="circle">
                <svg class="icon-done svg">
                    <use xlink:href="./icomoon/symbol-defs.svg#icon-done"></use>
                </svg>
            </div>
            <h2 class="title ff-noto">恭喜! 訂單已完成</h2>
        </div>
    </section>

    <section class="shopping-cart-section">
        <div class="container">
            <div class="shopping-cart">
                <div class="order-date">
                    <p class="text ff-noto">於<?= $row['order_date'] ?>購買清單</p>
                </div>
                <?php foreach($_SESSION['p_cart'] as $p): ?>
                <div class="itemBox flex" data-sid="<?= $p['sid'] ?>">
                    <div class="left flex">
                        <div class="left-1 flex">
                            <div class="left-1-1 product-image">
                                <img src="<?= WEB_ROOT ?>/mountain-bag/<?= $p['product_id'] ?>.jpg" alt="">
                            </div>
                            <div class="left-1-2  w300">
                                <p class="title ff-noto product-name">
                                    <?= $p['product_name'] ?>
                                </p>
                                <p class="text ff-noto">
                                    <?= $p['product_id'] ?>
                                </p>
                            </div>
                        </div>
                        <div class="left-2">
                            <p class="num ff-noto quantity" data-qty="<?= $p['quantity'] ?>">
                                <?= $p['quantity'] ?>&nbsp&nbsp&nbsp件
                            </p>
                        </div>
                        <div class="left-3">
                            <span class="num ff-airbnb price" data-price="<?= $p['product_price'] ?>">
                                $ <?= number_format($p['product_price'] * $p['quantity']) ?> TWD
                            </span>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>

                <?php foreach($_SESSION['cart'] as $v): ?>
                <div class="itemBox flex" data-sid="<?= $v['sid'] ?>">
                    <div class="left flex">
                        <div class="left-1 flex">
                            <div class="left-1-1 schedule-image">

                                <img src="<?= WEB_ROOT ?>/images/<?= $v['schedule_id'] ?>/<?= $v['schedule_id'] ?>.jpeg"
                                    class="card-img-top" alt="">

                            </div>
                            <div class="left-1-2 w150">
                                <p class="title ff-airbnb date">
                                    <?= $v['departure_date'] ?>
                                </p>
                                <p class="text ff-airbnb">
                                    <?= $v['schedule_title'] ?>
                                </p>
                            </div>
                        </div>
                        <div class="left-2 ml-6">
                            <p class="num ff-noto quantity" data-qty="<?= $v['quantity'] ?>">
                                <?= $v['quantity'] ?>&nbsp&nbsp&nbsp人
                            </p>
                        </div>

                        <div class="left-3">
                            <span class="num ff-airbnb price" data-price="<?= $v['price'] ?>">
                                $ <?= number_format($v['price'] * $v['quantity']) ?> TWD
                            </span>
                        </div>

                    </div>
                </div>
                <?php endforeach; ?>
                <div class="total">
                    <p class="text ff-noto">總計金額</p>
                    <p class="text ff-airbnb totalPrice">$ <?= number_format($row['amount']) ?> TWD</p>
                </div>
            </div>
    </section>

    <section class="order-detail-section">
        <div class="container">
            <div class="info-box">
                <h4 class="title ff-noto">訂單詳細資訊</h4>
                <div class="flex">
                    <p class="text ff-noto">訂單編號</p>
                    <p class="text ff-noto">45612357<?= $row['order_sid'] ?></p>
                </div>
            </div>

            <div class="info-box">
                <h4 class="title ff-noto">運送</h4>
                <div class="flex">
                    <p class="text ff-noto">運送方式</p>
                    <p class="text ff-noto">宅配</p>
                </div>
            </div>

            <div class="info-box">
                <h4 class="title ff-noto">訂購人資訊</h4>
                <div class="flex">
                    <p class="text ff-noto">姓名</p>
                    <p class="text ff-noto"><?= $row['orderer'] ?></p>
                </div>
                <div class="flex">
                    <p class="text ff-noto">連絡電話</p>
                    <p class="text ff-noto"><?= $row['orderer_mobile'] ?></p>
                </div>
                <div class="flex">
                    <p class="text ff-noto">E-mail</p>
                    <p class="text ff-noto"><?= $row['orderer_email'] ?></p>
                </div>
            </div>

            <?php if(! empty($_SESSION['p_cart'])): ?>
            <div class="info-box">
                <h4 class="title ff-noto">收貨人資訊</h4>
                <div class="flex">
                    <p class="text ff-noto">姓名</p>
                    <p class="text ff-noto"><?= $row['recipient'] ?></p>
                </div>
                <div class="flex">
                    <p class="text ff-noto">連絡電話</p>
                    <p class="text ff-noto"><?= $row['recipient_mobile'] ?></p>
                </div>
                <div class="flex">
                    <p class="text ff-noto">E-mail</p>
                    <p class="text ff-noto"><?= $row['recipient_email'] ?></p>
                </div>
            </div>
            <?php else: ?>
            <?php endif; ?>
            <a href="./activity-list.php">
                <div class="homePage-btn ff-noto">返回行程列表</div>
            </a>
        </div>

    </section>





    <?php include __DIR__ . '/parts-php/html-footer.php'; ?>
    <?php include __DIR__ . '/parts-php/html-fixedBar.php'; ?>
    <div class="spaceForFixed-mobile"></div>
    <?php include __DIR__ . '/parts-php/html-scripts.php'; ?>
    <script>
    const quantity = $('.quantity');
    const dollarCommas = function(n) {
        return n.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
    };
    </script>



    <?php include __DIR__ . '/parts-php/html-endingTag.php'; ?>

    <?php unset($_SESSION['p_cart']); ?>
    <?php unset($_SESSION['cart']); ?>
    <?php unset($_SESSION['name']); ?>
    <?php unset($_SESSION['mobile']); ?>
    <?php unset($_SESSION['email']); ?>
    <?php unset($_SESSION['name2']); ?>
    <?php unset($_SESSION['mobile2']); ?>
    <?php unset($_SESSION['email2']); ?>
    <?php unset($_SESSION['name3']); ?>
    <?php unset($_SESSION['mobile3']); ?>
    <?php unset($_SESSION['email3']); ?>