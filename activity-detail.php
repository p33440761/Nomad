<?php include __DIR__. '/parts-php/config.php'; ?>
<?php 
$title = '行程細節';
$pageName = 'activity-detail';

$sid = isset($_GET['sid']) ? intval($_GET['sid']) : 0;

// 撈出該項行程資料
$sql = "SELECT * FROM schedule WHERE sid = $sid";
    $stmt = $pdo->query($sql);
    $row = $stmt->fetch();

    //從行程資料表隨機撈出9筆資料作為Carousel
$a_sql = "SELECT * FROM schedule ORDER BY RAND() LIMIT 9";
    $a_stmt = $pdo->query($a_sql);
    $a_rows = $a_stmt->fetchAll();

    //從評論資料表撈出對該行程的評論
    $s_sql = "SELECT * FROM `stars` JOIN `members` ON stars.member_id = members.id AND stars.schedule_id = $sid ORDER BY stars.date";
    $s_stmt = $pdo->query($s_sql);
    $s_rows = $s_stmt->fetchAll();

    $where = ' WHERE 1 ';

    //從我的最愛資料表撈出
    if (!empty($_SESSION['user'])) {
        $mid = intval($_SESSION['user']['id']);
        $where .= " AND f.`type`=1 AND f.`member_id`=$mid";
        //f代表favorites的縮寫
    
        $f_sql = sprintf("SELECT f.target_id FROM schedule s 
        LEFT JOIN favorites f ON f.target_id=s.sid
        $where");
        $favorites = $pdo->query($f_sql)->fetchAll();
    }

    

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/activity-detail.css" />
    <title>行程細節頁</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <style>
    section.activity-detail-section div.activity-detail-section-image {
        background-image: url(<?= WEB_ROOT ?>/images/<?= $row['schedule_id']. "/". $row['schedule_id'] ?>_1.jpeg);
    }

    section.activity-intro-section div.activity-intro-image {
        background-image: url(<?= WEB_ROOT ?>/images/<?= $row['schedule_id']. "/". $row['schedule_id'] ?>_5.jpeg);
    }
    </style>
</head>

<body>
    <?php include __DIR__ . '/parts-php/html-navbar.php'; ?>

    <section class="hero-section">
        <div class="container">
            <div class="hero-section-background-image">
                <p class="title ff-noto none"><?= $row['schedule_title'] ?></p>
                <div class="hero-section-image-desktop">
                    <img src="<?= WEB_ROOT ?>/images/<?= $row['schedule_id'] ?>/<?= $row['schedule_id'] ?>.jpeg" alt="">
                </div>
            </div>
        </div>
    </section>

    <section class="activity-detail-section">

        <div class="flexBox0">
            <div class="activity-detail-section-image">
                <p class="text-image ff-noto">查看照片</p>
                <p class="text-price ff-airbnb">$ <?= number_format($row['price']) ?> TWD</p>
            </div>


            <section id="fixed-section" class="fixed-section">
                <div id="homepage-container" class="homepage-container flex">
                    <div class="fixed-functions">
                        <p class="text ff-noto"><span class="num ff-airbnb">$<?= number_format($row['price']) ?></span>
                            / 人 </p>
                    </div>

                    <div id="buyNowBtn" class="fixed-functions">
                        <p class="text btn ff-noto">立即報名</p>
                    </div>

                    <div class="fixed-functions add-to-cart-mobile">
                        <p class="text btn ff-noto">加入購物車</p>
                    </div>

                </div>


                <section id="buy-now-section" class="buy-now-section" data-sid="<?= $row['sid'] ?>">
                    <div class="container">
                        <div class="backward">
                            <svg id="icon-cross" class="icon-cross svg">
                                <use xlink:href="./icomoon/symbol-defs.svg#icon-cross"></use>
                            </svg>
                        </div>
                        <div class="activity-info flex">
                            <div class="leftBox">
                                <img src="<?= WEB_ROOT ?>/images/<?= $row['schedule_id'] ?>/<?= $row['schedule_id'] ?>.jpeg"
                                    alt="">
                            </div>
                            <div class="rightBox">
                                <p class="title ff-noto"><?= $row['schedule_title'] ?></p>
                                <p class="text ff-noto">$ <span
                                        class="num ff-airbnb"><?= number_format($row['price']) ?> TWD</span> / 人
                                </p>

                                <svg class="icon-heart icon-heart-id-<?= $row['sid'] ?> svg none"
                                    onclick="onLoveClick(event)">
                                    <use xlink:href="./icomoon/symbol-defs.svg#icon-heart"></use>
                                </svg>

                            </div>
                        </div>
                        <div class="boxes">
                            <div class="select-box flex">
                                <p class="text ff-noto">日期</p>
                                <select name="date" id="date" class="ff-noto">
                                    <option value="1"><?= $row['departure_date'] ?></option>
                                </select>
                            </div>
                            <div class="select-box flex">
                                <p class="text ff-noto">人數</p>
                                <select name="num" id="num" class="ff-noto" style="padding-right:4rem;">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                            </div>

                            <div class="select-box flex">
                                <p class="text ff-noto">嚮導</p>
                                <select name="guides" id="guides" class="ff-noto" style="padding-right: 3.5rem">
                                    <option value="1">紫潔</option>
                                    <option value="2">韋丞</option>
                                </select>
                            </div>
                        </div>

                        <div class="notes">

                            <div class="box none">
                                <svg class="icon-warning svg">
                                    <use xlink:href="./icomoon/symbol-defs.svg#icon-warning"></use>
                                </svg>
                                <span class="text ff-noto">報名前，請務必詳閱<a href="rule.php"><u> 報名規則</u></a></span>
                            </div>

                            <div class="box none">
                                <svg class="icon-warning svg">
                                    <use xlink:href="./icomoon/symbol-defs.svg#icon-warning"></use>
                                </svg>
                                <span class="text ff-noto">費用已包含<a href="#"><u>保險</u></a></span>
                            </div>
                        </div>

                        <div class="price none">
                            <p class="text ff-airbnb">TWD <span
                                    class="num ff-airbnb"><?= number_format($row['price']) ?></span> / 人
                            </p>
                        </div>

                        <div class="buy-btns flex">
                            <a href="./shopping-cart-1.php">
                                <div class="sign-up-cta btn ff-noto">立即報名</div>
                            </a>

                            <div class="put-in-cart btn ff-noto none">加入購物車</div>

                        </div>

                    </div>
                </section>
            </section>

        </div>
        <div class="container" data-sid="<?= $row['sid'] ?>">
            <div class="flexBox1">
                <div class="floor-1 flex">
                    <p class="text ff-noto"><?= $row['schedule_title'] ?></p>
                    <svg class="icon-heart icon-heart-id-<?= $row['sid'] ?> svg" onclick="onLove1Click(event)">
                        <use xlink:href="./icomoon/symbol-defs.svg#icon-heart"></use>
                    </svg>
                </div>
                <div class="floor-2">
                    <div class="floor-2-1 flex">
                        <span>
                            <svg class="icon-star svg">
                                <use xlink:href="./icomoon/symbol-defs.svg#icon-star"></use>
                            </svg>
                        </span>
                        <span class="ff-airbnb"><?= $row['rating'] ?></span>
                    </div>
                    <div class="floors flex">
                        <div class="floor-2-2">
                            <span>
                                <svg class="icon-place svg">
                                    <use xlink:href="./icomoon/symbol-defs.svg#icon-place"></use>
                                </svg>
                            </span>
                            <span class="ff-noto"><?= $row['location'] ?></span>
                        </div>

                        <div class="floor-2-3-1">
                            <span>
                                <svg class="icon-difficulty svg">
                                    <use xlink:href="./icomoon/symbol-defs.svg#icon-difficulty"></use>
                                </svg>
                            </span>
                            <span class="ff-noto">行程難度: <?= $row['level'] ?></span>
                        </div>
                        <div class="floor-2-3-2">
                            <span>
                                <svg class="icon-time svg">
                                    <use xlink:href="./icomoon/symbol-defs.svg#icon-time"></use>
                                </svg>
                            </span>
                            <span class="ff-noto">天數: <?= $row['days'] ?>天</span>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </section>

    <section class="mountain-intro-section">
        <div class="container">
            <h2 class="title ff-noto"><?= $row['info_title'] ?></h2>
            <div class="mountain-intro-container">
                <ul class="mountain-intro flex">
                    <li class="text">
                        <p class="title ff-noto">
                            <svg class="icon-play svg none">
                                <use xlink:href="./icomoon/symbol-defs.svg#icon-play"></use>
                            </svg>
                            <?= $row['info1-title'] ?>
                        </p>
                        <p class="text ff-noto">
                            <?= $row['info1'] ?>
                        </p>
                    </li>

                    <li class="picture none">
                        <img src="<?= WEB_ROOT ?>/images/<?= $row['schedule_id'] ?>/<?= $row['schedule_id'] ?>_2.jpeg"
                            alt="">
                    </li>
                    <li class="picture none">
                        <img src="<?= WEB_ROOT ?>/images/<?= $row['schedule_id'] ?>/<?= $row['schedule_id'] ?>_3.jpeg"
                            alt="">
                    </li>
                    <li class="text">
                        <p class="title ff-noto">
                            <svg class="icon-play svg none">
                                <use xlink:href="./icomoon/symbol-defs.svg#icon-play"></use>
                            </svg>
                            <?= $row['info2-title'] ?>
                        </p>
                        <p class="text ff-noto">
                            <?= $row['info2'] ?>
                        </p>
                    </li>
                    <li class="text">
                        <p class="title ff-noto">
                            <svg class="icon-play svg none">
                                <use xlink:href="./icomoon/symbol-defs.svg#icon-play"></use>
                            </svg>
                            <?= $row['info3-title'] ?>
                        </p>
                        <p class="text ff-noto">
                            <?= $row['info3'] ?>
                        </p>
                    </li>
                    <li class="picture none">
                        <img src="<?= WEB_ROOT ?>/images/<?= $row['schedule_id'] ?>/<?= $row['schedule_id'] ?>_4.jpeg"
                            alt="">
                    </li>
                </ul>
                <div class="mountain-intro-cta btn ff-noto">顯示更多</div>
                <div class="mountain-intro-close btn ff-noto none">收起</div>
            </div>
        </div>
    </section>

    <section class="activity-intro-section">
        <div class="container">
            <h2 class="title ff-noto"><span class="none"><?= $row['short_info_title'] ?></h2>
            <div class="activity-intro-image"></div>
            <div class="activity-daily-intro flex">
                <div class="left">
                    <p class="text ff-noto">

                    </p>
                </div>
                <div class="right">
                    <div class="right-top ff-noto none">
                        <?= $row['short_info'] ?>
                    </div>
                    <div class="right-bottom flex" data-sid="<?= $row['sid'] ?>">
                        <p class="text ff-noto" data-days="1">第一天</p>
                        <p class="text ff-noto" data-days="2">第二天</p>
                        <p class="text ff-noto" data-days="3">第三天</p>
                        <p class="text ff-noto" data-days="4">第四天</p>
                        <p class="text ff-noto" data-days="5">第五天</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="guide-intro-section">
        <div class="container">
            <h2 class="title ff-noto">嚮導</h2>
            <div class="guides flex">
                <p class="text ff-noto active">紫潔</p>
                <p class="text ff-noto">韋丞</p>
            </div>
            <div class="guide-intro-cards flex">
                <div class="card">
                    <div class="guide-intro-image"></div>
                    <div class="guide-intro-description">
                        <p class="title ff-noto none">紫潔</p>
                        <p class="text ff-noto">
                            - 具海外高山攀登經驗<br>
                            - 具野地救援能力<br>
                            - 具背負25KG以上能力<br>
                            - 具高山嚮導同等級以上能力<br>
                            - 具野地緊急過夜能力<br>
                            - 具戶外風險管理能力<br>
                        </p>
                    </div>
                </div>

                <div class="card none">
                    <div class="guide-intro-image2"></div>
                    <div class="guide-intro-description">
                        <p class="title ff-noto none">韋丞</p>
                        <p class="text ff-noto">
                            - 具海外高山攀登經驗<br>
                            - 具野地救援能力<br>
                            - 具背負25KG以上能力<br>
                            - 具高山嚮導同等級以上能力<br>
                            - 具野地緊急過夜能力<br>
                            - 具戶外風險管理能力<br>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="other-activity-section">
        <div class="container">
            <div class="flexBox flex">
                <h2 class="title ff-noto">相關熱門行程</h2>
                <div class="carousel-button flex none">
                    <div class="pagination ff-airbnb"><span class="page">1</span>/ 3</div>
                    <div id="prev" class="arrow-button">
                        <svg class="icon-arrow-back svg">
                            <use xlink:href="./icomoon/symbol-defs.svg#icon-arrow_back_ios"></use>
                        </svg>
                    </div>
                    <div id="next" class="arrow-button">
                        <svg class="icon-arrow-forward svg">
                            <use xlink:href="./icomoon/symbol-defs.svg#icon-arrow_forward_ios"></use>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="carousel">
                <ul class="wrap-img">
                    <?php foreach($a_rows as $a): ?>

                    <li class="carousel-cell" data-sid="<?= $a['sid'] ?>">
                        <svg class="icon-heart icon-heart-id-<?= $a['sid'] ?> svg" onclick="onLove2Click(event)">
                            <use xlink:href="./icomoon/symbol-defs.svg#icon-heart"></use>
                        </svg>
                        <a href="activity-detail.php?sid=<?= $a['sid'] ?>">
                            <div class="carousel-image">
                                <img src="<?= WEB_ROOT ?>/images/<?= $a['schedule_id'] ?>/<?= $a['schedule_id'] ?>.jpeg"
                                    alt="">
                            </div>
                            <p class="title ff-noto"><?= $a['schedule_title'] ?></p>
                            <svg class="icon-star svg">
                                <use xlink:href="./icomoon/symbol-defs.svg#icon-star"></use>
                            </svg>
                            <span class="num ff-airbnb">(<?= $a['rating'] ?>)</span>

                            <p class="date ff-airbnb"><?= $a['departure_date'] ?></p>
                            <span class="price ff-airbnb">$ <?= number_format($a['price']) ?> TWD / 人</span>
                        </a>
                    </li>

                    <?php endforeach; ?>
                </ul>

            </div>
        </div>
    </section>

    <section class="comment-section">
        <div class="container">
            <h2 class="title ff-noto">評論</h2>
            <div class="comment-flexBox">
                <?php foreach($s_rows as $s): ?>
                <div class="comment-card">
                    <div class="topBox flex">
                        <div class="user-icon">
                            <img src="<?= WEB_ROOT ?>/images/<?= $s['profile_image'] ?>" alt="">
                        </div>
                        <div class="rank">
                            <p class="text ff-noto"><?= $s['nickname'] ?></p>
                            <svg class="icon-star svg">
                                <use xlink:href="./icomoon/symbol-defs.svg#icon-star"></use>
                            </svg>
                            <span class="num ff-airbnb">(<?= $s['ratedIndex'] ?>)</span>
                            <span class="date ff-airbnb"><?= date("Y/m/d", strtotime($s['date'])) ?></span>
                        </div>
                    </div>
                    <div class="bottomBox">
                        <p class="text ff-noto">
                            <?= $s['rateMsg'] ?>
                        </p>
                    </div>
                    <div class="text ff-airbnb none">View more</div>
                </div>
                <?php endforeach; ?>

                <div class=" comment-card">
                    <div class="topBox flex">
                        <div class="user-icon">
                            <img src="./images/User-icon/Ellipse -1.png" alt="">
                        </div>
                        <div class="rank">
                            <p class="text ff-airbnb">Christine Cheney</p>
                            <svg class="icon-star svg">
                                <use xlink:href="./icomoon/symbol-defs.svg#icon-star"></use>
                            </svg>
                            <span class="num ff-airbnb">(5)</span>
                            <span class="date ff-airbnb">2020/06</span>
                        </div>
                    </div>
                    <div class="bottomBox">
                        <p class="text ff-airbnb">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Enim
                            ea
                            quasi et
                            id, animi numquam laudantium consequuntur nemo voluptas dolorum voluptatibus maiores
                            libero,
                            tempore quia facilis amet rem culpa tenetur.
                        </p>
                    </div>
                    <div class="text ff-airbnb none">View more</div>
                </div>
            </div>
            <div class="comment-section-cta btn ff-noto">顯示更多</div>
            <div class="comment-section-close btn ff-noto none">收起</div>

        </div>
    </section>

    <section class="warning-section">
        <div class="container">
            <svg class="icon-warning svg">
                <use xlink:href="./icomoon/symbol-defs.svg#icon-warning"></use>
            </svg>
            <span class="text ff-noto">報名前，請務必詳閱報名規則，報名後即視為同意所述規範</span>
            <svg class="icon-warning svg">
                <use xlink:href="./icomoon/symbol-defs.svg#icon-warning"></use>
            </svg>

            <div class="links">
                <div id="insurance-link" class="link flex">
                    <p class="text ff-noto">保險說明</p>

                    <svg class="icon-arrow_forward_ios svg">
                        <use xlink:href="./icomoon/symbol-defs.svg#icon-arrow_forward_ios"></use>
                    </svg>
                </div>

                <a href="rule.php">
                    <div class="link flex">
                        <p class="text ff-noto">報名規則</p>

                        <svg class="icon-arrow_forward_ios svg">
                            <use xlink:href="./icomoon/symbol-defs.svg#icon-arrow_forward_ios"></use>
                        </svg>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <div class="carousel-modal">
        <div class="carousel-box">
            <ul class="main-carousel" data-flickity='{ "wrapAround": true }'>
                <li class="carousel-cell">
                    <img src="<?= WEB_ROOT ?>/images/<?= $row['schedule_id'] ?>/<?= $row['schedule_id'] ?>.jpeg" alt="">
                </li>
                <li class="carousel-cell">
                    <img src="<?= WEB_ROOT ?>/images/<?= $row['schedule_id'] ?>/<?= $row['schedule_id'] ?>_2.jpeg"
                        alt="">
                </li>
                <li class="carousel-cell">
                    <img src="<?= WEB_ROOT ?>/images/<?= $row['schedule_id'] ?>/<?= $row['schedule_id'] ?>_3.jpeg"
                        alt="">
                </li>
                <li class="carousel-cell">
                    <img src="<?= WEB_ROOT ?>/images/<?= $row['schedule_id'] ?>/<?= $row['schedule_id'] ?>_4.jpeg"
                        alt="">
                </li>
                <li class="carousel-cell">
                    <img src="<?= WEB_ROOT ?>/images/<?= $row['schedule_id'] ?>/<?= $row['schedule_id'] ?>_5.jpeg"
                        alt="">
                </li>
            </ul>
        </div>
    </div>

    <section id="insurance" class="insurance-detail-section">
        <div class="arrow-bar">
            <svg id="icon-arrow-back" class="icon-arrow_back_ios svg">
                <use xlink:href="./icomoon/symbol-defs.svg#icon-arrow_back_ios"></use>
            </svg>
        </div>
        <div class="container">
            <h2 class="title ff-noto">保險說明</h2>
            <div class="insurance-detail">
                <h3 class="title ff-noto">國泰產險-登山險</h3>
                <p class="text ff-noto">
                    因參加登山活動遭受登山事故，致其失能或死亡，或其身體須經醫院或診所診療者，此保險給付之保險金可補償損失。內容包含：身故保險金或喪葬費用保險金、失能保險金、實支實付傷害醫療保險金、緊急救援費用(如搜尋費用、救護費用、遺體移送費用等)。<br>
                    <br>
                    登山綜合保險提供在中華民國境內的登山活動所面臨的風險保障，民眾可購買登山保險保障登山期間所發生的危險，內容包含因登山事故（如落石、失足、失溫等）所導致之死亡、失能及醫療費用給付，以及因發生事故所需進行搜尋、醫療轉送及遺體運送所衍生之費用。
                </p>
            </div>
            <div class="backward-cta ff-noto none">回到上頁</div>
        </div>
    </section>

    <div class="spaceForFixed-mobile"></div>

    <?php include __DIR__ . '/parts-php/html-footer.php'; ?>
    <?php include __DIR__ . '/parts-php/html-scripts.php'; ?>
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>

    <script>
    const mData = <?= isset($_SESSION['user']) ? json_encode($_SESSION['user']) : 'false' ?>;

    //桌機愛心收藏產品
    const onLoveClick = function(e) {
        //如果沒有登入，就會顯示要先登入才能進行收藏
        if (!mData) {
            alert('請先登入會員')
            return;
        }
        const me = $(e.currentTarget);
        const card = me.closest('section');
        const pid = card.attr('data-sid');
        console.log('pid:', pid);
        const type = 1;
        $.get('favorites-api.php', {
            action: 'add',
            pid,
            type
        }, function(data) {
            // console.log(data);
            if (data.addOrDel === 'add') {
                me.addClass('open');
            } else {
                me.removeClass('open');
            }

        }, 'json');

    };

    //手機愛心收藏產品
    const onLove1Click = function(e) {
        //如果沒有登入，就會顯示要先登入才能進行收藏
        if (!mData) {
            alert('請先登入會員')
            return;
        }
        const me = $(e.currentTarget);
        const card = me.closest('.container');
        const pid = card.attr('data-sid');
        console.log('pid:', pid);
        const type = 1;
        $.get('favorites-api.php', {
            action: 'add',
            pid,
            type
        }, function(data) {
            // console.log(data);
            if (data.addOrDel === 'add') {
                me.addClass('open');
            } else {
                me.removeClass('open');
            }

        }, 'json');

    };

    // Carousel點擊愛心加入收藏
    const onLove2Click = function(e) {
        //如果沒有登入，就會顯示要先登入才能進行收藏
        if (!mData) {
            alert('請先登入會員')
            return;
        }
        const me1 = $(e.currentTarget);
        const card1 = me1.closest('.carousel-cell');
        const pid = card1.attr('data-sid');
        console.log('pid:', pid);
        const type = 1;
        $.get('favorites-api.php', {
            action: 'add',
            pid,
            type
        }, function(data) {
            console.log(data);
            if (data.addOrDel === 'add') {
                me1.addClass('open');
            } else {
                me1.removeClass('open');
            }
        }, 'json');
    };

    function getHearts() {
        $.get('activity-list-api.php', function(data) {
            aData = data;
            //登入會員時，會偵測到有愛心已收藏的資料庫
            if (aData.favorites && aData.favorites.length) {
                aData.favorites.forEach(o => {
                    $('.icon-heart-id-' + o.target_id).addClass('open');
                });
            }
        }, 'json');
    }
    getHearts();


    // 使用Ajax方法直接購買 desktop & mobile
    const buyNowBtn = $('.sign-up-cta');

    buyNowBtn.click(function() {
        const card = $(this).closest('section');
        const sid = card.attr('data-sid');
        const qty = card.find('select#num').val();

        $.get('cart-api-2.php', {
            action: 'add',
            sid,
            qty
        }, function(data) {
            showCartCount(data); //更新選單上數量的提示
        }, 'json');
    })

    // 使用Ajax方法加入購物車 desktop
    const addToCartBtn = $('.put-in-cart');

    addToCartBtn.click(function() {
        const card = $(this).closest('section');
        const sid = card.attr('data-sid');
        const qty = card.find('select#num').val();

        $.get('cart-api-2.php', {
            action: 'add',
            sid,
            qty
        }, function(data) {
            showCartCount(data); //更新選單上數量的提示
        }, 'json');
    })

    // 使用Ajax方法加入購物車 mobile 
    const addToCartBtnMobile = $('.add-to-cart-mobile');

    addToCartBtnMobile.click(function() {
        const card = $(this).closest('.homepage-container').next('.buy-now-section');
        const sid = card.attr('data-sid');
        const qty = 1;

        $.get('cart-api-2.php', {
            action: 'add',
            sid,
            qty
        }, function(data) {
            showCartCount(data);
        }, 'json');
    })



    // 讓金額數字添加千位數逗點
    const dollarCommas = function(n) {
        return n.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
    };

    // 查看照片modal顯示carousel
    const checkPicture = document.querySelector('.text-image');
    const carouselModal = document.querySelector('.carousel-modal');

    checkPicture.addEventListener('click', () => {
        carouselModal.classList.add('open');
    });

    carouselModal.addEventListener('click', (e) => {
        if (e.target.classList.contains('carousel-modal')) {
            carouselModal.classList.remove('open');
        }
    });

    // 保險說明頁面滑進滑出
    const insuranceLink = document.querySelector('#insurance-link');
    const backward = document.querySelector('#icon-arrow-back');
    const insuranceDetail = document.querySelector('#insurance');

    insuranceLink.addEventListener('click', () => {
        insuranceDetail.classList.add('open');
        modal.classList.add('open');
    })

    backward.addEventListener('click', () => {
        insuranceDetail.classList.remove('open');
        modal.classList.remove('open');
    })

    // 立即報名頁面滑進滑出
    const exitBuyNowPage = document.querySelector('#icon-cross');
    const slideUpPage = document.querySelector('#buy-now-section');
    const ButNowBtnMobile = document.querySelector('#buyNowBtn');


    ButNowBtnMobile.addEventListener('click', () => {
        console.log('hi');
        slideUpPage.classList.add('open');
    })

    exitBuyNowPage.addEventListener('click', () => {
        slideUpPage.classList.remove('open');
    })

    //點擊愛心後變紅
    // const hearts = document.querySelectorAll('.icon-heart');

    // hearts.forEach(heart => {
    //     heart.addEventListener('click', () => {
    //         heart.classList.toggle('open');
    //     });
    // });

    //carousel 推薦行程 箭頭+1 -1
    const prev = document.querySelector('#prev');
    const next = document.querySelector('#next');
    let pageSpan = document.querySelector('.page');
    const board = document.querySelector('.wrap-img');


    next.addEventListener('click', function() {
        let page = pageSpan.innerText * 1;
        if (page < 3) {
            board.style.left = `${-1103 * page}px`;
            page++;
        }
        pageSpan.innerText = page;
    });

    prev.addEventListener('click', function() {
        let page = pageSpan.innerText * 1;
        page--;
        if (page > 1) {
            board.style.left = `${(-1103 * page) + (1103 * (page - 1))}px`;
        } else if (page = 1) {
            board.style.left = '0px';
        }
        pageSpan.innerText = page;
    })


    //手刻mobile carousel
    var slider = {

        el: {
            slider: $(".carousel"),
            holder: $(".wrap-img"),
            imgSlide: $(".carousel-cell")
        },

        slideWidth: $('.carousel').width() - 81,
        touchstartX: undefined,
        touchmoveX: undefined,
        moveX: undefined,
        index: 0,
        longTouch: undefined,

        init: function() {
            this.bindUIEvents();
        },

        bindUIEvents: function() {

            this.el.holder.on("touchstart", function(event) {
                slider.start(event);
            });

            this.el.holder.on("touchmove", function(event) {
                slider.move(event);
            });

            this.el.holder.on("touchend", function(event) {
                slider.end(event);
            });
        },

        start: function(event) {
            // Test for flick.
            // this.longTouch = false;
            // setTimeout(function() {
            //     window.slider.longTouch = true;
            // }, 1000);

            // Get the original touch position.
            this.touchstartX = event.originalEvent.touches[0].pageX;

            // The movement gets all janky if there's a transition on the elements.
            $('.animate').removeClass('animate');
        },

        move: function(event) {
            // Continuously return touch position.
            this.touchmoveX = event.originalEvent.touches[0].pageX;
            // Calculate distance to translate holder.
            this.moveX = this.index * this.slideWidth + (this.touchstartX - this.touchmoveX);
            // Defines the speed the images should move at.
            // var panX = 100 - this.moveX / 6;
            if (this.moveX < 2420) { // Makes the holder stop moving when there is no more content.
                this.el.holder.css('transform', 'translate3d(-' + this.moveX + 'px,0,0)');
            }
        },

        end: function(event) {
            // Calculate the distance swiped.
            let absMove = Math.abs(this.index * this.slideWidth - this.moveX);
            // Calculate the index. All other calculations are based on the index.
            if (absMove > this.slideWidth / 2 || this.longTouch === false) {
                if (this.moveX > this.index * this.slideWidth && this.index < 8) {
                    this.index++;
                } else if (this.moveX < this.index * this.slideWidth && this.index > 0) {
                    this.index--;
                }
            }

            // Move and animate the elements.
            this.el.holder.addClass('animate').css('transform', 'translate3d(-' + this.index * this
                .slideWidth + 'px,0,0)');
        }
    };

    slider.init();

    //點擊更多展開行程介紹
    const mountainIntro = document.querySelector('.mountain-intro');
    const comment = document.querySelector('.comment-flexBox');
    const mountainIntroBtns = document.querySelectorAll('.mountain-intro-container .btn');
    const commentBtns = document.querySelectorAll('.comment-section .btn');

    mountainIntroBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            mountainIntro.classList.toggle('open');
            mountainIntroBtns[0].classList.toggle('none');
            mountainIntroBtns[1].classList.toggle('none');
        })
    })

    commentBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            comment.classList.toggle('open');
            commentBtns[0].classList.toggle('none');
            commentBtns[1].classList.toggle('none');
        })
    })

    //點擊不同天數顯示當天行程內容
    const card = document.querySelector('.right-bottom');
    const daysNum = <?= $row['days'] ?>;
    let text = '';

    //for迴圈產生行程天數
    for (let d = 1; d <= daysNum; d++) {
        text += `<p class="text ff-noto" data-days="${d}">第${d}天</p>`
    }

    card.innerHTML = text;

    const days = document.querySelectorAll('.activity-intro-section .right-bottom .text');
    const dailyIntro = document.querySelector('.activity-daily-intro div.left p.text');
    const sid = card.getAttribute('data-sid');
    let aRow = {};
    days[0].classList.add('active');


    days.forEach(day => {
        day.addEventListener('click', (e) => {
            for (let i = 0; i < days.length; i++) {
                days[i].classList.remove('active');
            };
            e.currentTarget.classList.add('active');

            const daysIndex = parseInt(e.currentTarget.getAttribute('data-days'));
            const tplD = `day${daysIndex}`;
            dailyIntro.innerHTML = '';

            if (daysIndex === 1) {
                dailyIntro.innerHTML = aRow.day1;
            } else if (daysIndex === 2) {
                dailyIntro.innerHTML = aRow.day2;
            } else if (daysIndex === 3) {
                dailyIntro.innerHTML = aRow.day3;
            } else if (daysIndex === 4) {
                dailyIntro.innerHTML = aRow.day4;
            } else {
                dailyIntro.innerHTML = aRow.day5;
            }
        })
    })

    $.get("activity-detail-api.php", {
        sid
    }, function(data) {
        aRow = data;
        dailyIntro.innerHTML = aRow.day1;
    }, 'json');


    $('.guides p.text').click(function() {
        $('.guide-intro-cards .card').toggleClass('none');
        $('.guides p.text').toggleClass('active');
    })
    </script>

    <?php include __DIR__ . '/parts-php/html-endingTag.php'; ?>