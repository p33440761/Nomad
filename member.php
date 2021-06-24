<?php include __DIR__.'/parts-php/config.php'?>

<?php if(isset($_SESSION['user'])) :?>
<?php
    if(empty($_SESSION['user']['profile_image'])){
        $img = 'default-placeholder.png';
    } else {
        $img = $_SESSION['user']['profile_image'];
    }

    $m_id = intval($_SESSION['user']['id']);
    //行程
    $sql_schedule = "SELECT s.* FROM `favorites` f
    JOIN `schedule` s ON f.target_id=s.sid
    WHERE f.`type`=1 AND f.`member_id`=$m_id ";

    $schedules = $pdo->query($sql_schedule)->fetchAll();

    //商品
    $sql_product = "SELECT p.* FROM `favorites` f
    JOIN `products` p ON f.target_id=p.sid
    WHERE f.`type`=2 AND f.`member_id`=$m_id ";

    $products = $pdo->query($sql_product)->fetchAll();

    //登山記事
    $sql_note = "SELECT * FROM `favorites` JOIN `note` ON favorites.target_id = note.sid AND type = 3 JOIN `members` ON members.id = note.member_id AND favorites.member_id = $m_id ";

    $notes = $pdo->query($sql_note)->fetchAll();



$pur_sql = "SELECT * FROM `orders` JOIN `order_details` ON orders.member_sid = $m_id AND orders.sid = order_details.order_sid JOIN `schedule` ON order_details.schedule_sid = schedule.sid ORDER BY orders.order_date DESC"; 

$purchase = $pdo->query($pur_sql)->fetchAll();


$pro_sql = "SELECT * FROM `orders` JOIN `order_details` ON orders.member_sid = $m_id AND orders.sid = order_details.order_sid JOIN `products` ON order_details.product_sid = products.sid ORDER BY orders.order_date DESC"; 

$pro = $pdo->query($pro_sql)->fetchAll();

$c_sql = "SELECT * FROM `stars` WHERE member_id = $m_id";
$c_stmt = $pdo->query($c_sql);
$c_rows = $c_stmt->fetchAll();
$c_dict = [];

foreach($c_rows as $c){
    $c_dict[$c['schedule_id']] = $c;
}

$sid = isset($_GET['sid']) ? intval($_GET['sid']) : 0;

$sql = "SELECT s.* FROM `order_details` o
JOIN `schedule` s ON o.schedule_sid=s.sid
WHERE o.`member_sid`=$m_id ";

    $stmt = $pdo->query($sql);
    $rows = $stmt->fetchAll();

$count_sql = "SELECT COUNT(*) FROM `order_details` WHERE member_sid = $m_id and schedule_sid >= 1";
$count_stmt = $pdo->query($count_sql);
$count = $count_stmt->fetchColumn();

$pur_last_sql = "SELECT * FROM `orders` JOIN `order_details` ON orders.member_sid = $m_id AND orders.sid = order_details.order_sid JOIN `schedule` ON order_details.schedule_sid = schedule.sid ORDER BY orders.order_date DESC LIMIT 0 , 1"; 

$purchase_last = $pdo->query($pur_last_sql)->fetch();

$pur_last02_sql = "SELECT * FROM `orders` JOIN `order_details` ON orders.member_sid = $m_id AND orders.sid = order_details.order_sid JOIN `schedule` ON order_details.schedule_sid = schedule.sid ORDER BY orders.order_date DESC LIMIT 1 , 2"; 

$purchase_last02 = $pdo->query($pur_last02_sql)->fetch();
$achievement = 6 * $count;

?>
<?php include __DIR__.'/parts-php/member-header.php' ?>

<style>
.error {
    color: #cd071e;
}

.module-navbar {
    position: relative;
    z-index: 1001;
}

div.side-navbar img {
    vertical-align: middle;
}
</style>
<div class="side-navbar none">
    <div class="outer-box">
        <div class="icon-arrow-up hide">
            <svg class="icon-arrow-up svg">
                <use xlink:href="./icomoon/symbol-defs.svg#icon-arrow-up"></use>
            </svg>
        </div>
        <div class="side-navbar-flex flex">
            <div class="homepage-container">
                <div class="side-navbar-item">
                    <a href="level_new.php">
                        <div class="navbar-item">
                            <img src="./images/navbar-icon/level_white.svg" alt="" />
                            <p class="text ff-noto">難度分級</p>
                        </div>
                    </a>
                    <a href="notebook.php">
                        <div class="navbar-item">
                            <img src="./images/navbar-icon/blog.svg" alt="" />
                            <p class="text ff-noto">登山記事</p>
                        </div>
                    </a>
                    <a href="rule.php">
                        <div class="navbar-item">
                            <img src="./images/navbar-icon/notice.svg" alt="" />
                            <p class="text ff-noto">登山須知</p>
                        </div>
                    </a>
                    <a href="weather.php">
                        <div class="navbar-item">
                            <img src="./images/navbar-icon/weather.svg" alt="" />
                            <p class="text ff-noto">天氣</p>
                        </div>
                    </a>
                    <a href="product.php">
                        <div class="navbar-item">
                            <img src="./images/navbar-icon/product.svg" alt="" />
                            <p class="text ff-noto">商品</p>
                        </div>
                    </a>

                    <a href="achievement.php">
                        <div class="navbar-item">
                            <img src="./images/navbar-icon/achivement.svg" alt="" />
                            <p class="text ff-noto">成就紀錄</p>
                        </div>
                    </a>
                    <a href="activity-list.php">
                        <div class="navbar-item">
                            <img src="./images/navbar-icon/schedule.svg" alt="" />
                            <p class="text ff-noto">行程</p>
                        </div>
                    </a>
                    <a href="info.php">
                        <div class="navbar-item">
                            <img src="./images/navbar-icon/about_us.svg" alt="" />
                            <p class="text ff-noto">官方資訊</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="icon-arrow-down">
            <svg class="icon-arrow-down svg">
                <use xlink:href="./icomoon/symbol-defs.svg#icon-arrow-down"></use>
            </svg>
        </div>
    </div>
</div>

<div class="module-navbar">
    <div class="homepage-container flex">
        <div class="navbar-left">
            <a href="nomadHomePage.php">
                <img src="./icomoon/svg/icon-nomad-logo-white.svg" alt="">
            </a>
        </div>
        <div class="navbar-right flex">
            <a href="./shopping-cart-1.php">
                <div class="cart mr-1 none">
                    <svg class="icon-cart svg">
                        <use xlink:href="./icomoon/symbol-defs.svg#icon-cart"></use>
                    </svg>
                    <span class="nav-badge ff-airbnb">0</span>
                </div>
            </a>
            <div class="user-icon flex none">
                <a class="btn btn-nomad" href="logout.php"> 登出</a>
            </div>
            <div class="hamburger" id="mobile-cta">
                <input type="checkbox" name="" id="check" />
                <div class="hamburger-menu-container">
                    <div class="hamburger-menu">
                        <div></div>
                    </div>
                </div>
            </div>
            <nav>
                <ul>
                    <!-- 可能使用javascript append生成 -->
                    <a href="info.php">
                        <li class="nav-item flex">
                            <p class="ff-noto">官方資訊</p>
                            <svg class="icon-arrow-forward svg">
                                <use xlink:href="./icomoon/symbol-defs.svg#icon-arrow_forward_ios"></use>
                            </svg>
                        </li>
                    </a>
                    <a href="activity-list.php">
                        <li class="nav-item flex">
                            <p class="ff-noto">行程</p>
                            <svg class="icon-arrow-forward svg">
                                <use xlink:href="./icomoon/symbol-defs.svg#icon-arrow_forward_ios"></use>
                            </svg>
                        </li>
                    </a>
                    <a href="product.php">
                        <li class="nav-item flex">
                            <p class="ff-noto">商品</p>
                            <svg class="icon-arrow-forward svg">
                                <use xlink:href="./icomoon/symbol-defs.svg#icon-arrow_forward_ios"></use>
                            </svg>
                        </li>
                    </a>
                    <a href="achievement.php">
                        <li class="nav-item flex">
                            <p class="ff-noto">成就紀錄</p>
                            <svg class="icon-arrow-forward svg">
                                <use xlink:href="./icomoon/symbol-defs.svg#icon-arrow_forward_ios"></use>
                            </svg>
                        </li>
                    </a>
                    <a href="notebook.php">
                        <li class="nav-item flex">
                            <p class="ff-noto">登山記事</p>
                            <svg class="icon-arrow-forward svg">
                                <use xlink:href="./icomoon/symbol-defs.svg#icon-arrow_forward_ios"></use>
                            </svg>
                        </li>
                    </a>
                    <a href="level_new.php">
                        <li class="nav-item flex">
                            <p class="ff-noto">難度分級</p>
                            <svg class="icon-arrow-forward svg">
                                <use xlink:href="./icomoon/symbol-defs.svg#icon-arrow_forward_ios"></use>
                            </svg>
                        </li>
                    </a>
                    <a href="weather.php">
                        <li class="nav-item flex">
                            <p class="ff-noto">天氣</p>
                            <svg class="icon-arrow-forward svg">
                                <use xlink:href="./icomoon/symbol-defs.svg#icon-arrow_forward_ios"></use>
                            </svg>
                        </li>
                    </a>
                    <a href="rule.php">
                        <li class="nav-item flex">
                            <p class="ff-noto">登山須知</p>
                            <svg class="icon-arrow-forward svg">
                                <use xlink:href="./icomoon/symbol-defs.svg#icon-arrow_forward_ios"></use>
                            </svg>
                        </li>
                    </a>

                    <?php if(isset($_SESSION['user'])) :?>


                    <div class="user-account">
                        <img src="./images/<?= $img ?>">
                    </div>

                    <p class="userName ff-noto"><?= htmlentities($_SESSION['user']['nickname']) ?>, &nbsp&nbsp您好</p>

                    <a href="logout.php">
                        <p class="logout ff-noto">登出</p>
                    </a>
                    <?php else: ?>
                    <li class="nav-logo">
                        <svg class="icon-nomad-logo-dark navbar-logo-svg">
                            <use xlink:href="./icomoon/symbol-defs.svg#icon-nomad-logo-dark"></use>
                        </svg>
                    </li>
                    <p class="text ff-noto">成為Nomad會員<br />開始你的專屬旅程</p>
                    <div class="btns flex">
                        <a href="signUp.php">
                            <div class="signup-btn ff-noto">加入</div>
                        </a>
                        <a href="signUp.php#form2">
                            <div class="login-btn ff-noto">登入</div>
                        </a>
                    </div>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </div>
</div>

<div class="module-modal"></div>

<div class="body_wrap">
    <section class="member_banner">
        <div class="member_wrap">
            <div class="member_card">
                <div class="member_card_title">
                    <div class="member_card_title_left">
                        <a href="#" class="member_card_img"><img src="./images/<?= $img ?>"></a>
                        <div class="member_card_username"><?= htmlentities($_SESSION['user']['nickname']) ?></div>
                    </div>
                    <div class="member_card_share_wrap">
                        <a href="notebook.php" class="member_card_share">
                            <i class="fas fa-comment fa-2x active"></i>
                        </a>
                        <a href="notebook.php">
                            <div class="member_card_share_text">分享登山記事</div>
                        </a>
                    </div>
                </div>
                <div class="member_card_line"></div>
                <div class="member_card_detail">
                    <div class="member_card_first member_card_bg">
                        <div class="member_card_participate_num card_num"><?= $count ?></div>
                        <div class="member_card_participate">參與行程</div>
                    </div>
                    <div class="member_card_second member_card_bg">
                        <div class="member_card_achivement_num card_num"><?= $achievement ?></div>
                        <div class="member_card_achivement">已解鎖成就</div>
                    </div>
                    <div class="member_card_third member_card_bg">
                        <div class="member_card_level_num card_num"><?php if ($achievement < 10){
                            echo 'Silver';
                        }else if($achievement < 20 ){
                        echo 'Gold';
                        }else {
                            echo 'Platinum';
                        } ?></div>
                        <div class="member_card_level">個人等級</div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <section class="member_container">
        <div class="member_content">
            <div data-scroll-target="1" class="member_content_bigbox member_content_bigbox_rotate section" id="sec_01">
                <div class="member_content_box member_content_box_rotate " id="cover">
                    <div class="member_content_title">
                        <div class="member_content_tabs"><i class="fas fa-address-card"></i><span>帳號管理</span></div>
                    </div>
                    <div class="member_content_wrap">
                        <div class="member_content_info">
                            <div class="member_content_user">
                                <img class="member_content_userimg" src="./images/<?= $img ?>">
                                <div class="member_content_username"><?= htmlentities($_SESSION['user']['nickname']) ?>
                                </div>

                            </div>
                            <div class="member_content_account">
                                <div class="left col-3 col-lg-6">
                                    <ul>
                                        <li>帳號</li>
                                        <li>性別</li>
                                        <li>電話</li>
                                        <li>生日</li>
                                    </ul>
                                </div>
                                <div class="right col-9 col-lg-6">
                                    <ul>
                                        <li class="email"><?= htmlentities($_SESSION['user']['email']) ?></li>
                                        <li class="gender"><?= htmlentities($_SESSION['user']['gender']) ?></li>
                                        <li class="mobile"><?= htmlentities($_SESSION['user']['mobile']) ?></li>
                                        <li class="birthday"><?= htmlentities($_SESSION['user']['birthday']) ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="member_content_btn" id="modify_info"><button class="btn btn-nomad2">修改資料</button></div>
                </div>
                <form class="member_content_box member_content_box_rotate" id="back" method="POST" name="form3"
                    novalidate onsubmit="update(); return false">
                    <div class="member_content_title">
                        <div class="member_content_tabs"><i class="fas fa-address-card"></i><span>帳號管理</span></div>
                    </div>
                    <div class="member_content_wrap">

                        <div class="member_content_info">
                            <div class="member_content_user">
                                <img class="member_content_userimg" onclick="triggerClick()" src="./images/<?= $img ?>"
                                    id="profileDisplay">
                                <input type="file" name="profileImage" id="profileImage" onchange="displayImage(this);">
                                <input name="profile_image" type="hidden" id="profile_image"
                                    value="<?= empty($_SESSION['user']['profile_image']) ? '' : $_SESSION['user']['profile_image'] ?>">
                                <div class="member_content_username">
                                    <input name="nickname" type="text" id="nickname"
                                        value="<?= htmlentities($_SESSION['user']['nickname']) ?>">
                                </div>
                            </div>
                            <div class="member_content_account">
                                <div class="left col-3 col-lg-6">
                                    <ul>
                                        <li>帳號</li>
                                        <li>性別</li>
                                        <li>電話</li>
                                        <li>生日</li>
                                    </ul>
                                </div>
                                <div class="right col-9 col-lg-6 user_input">
                                    <ul>
                                        <li><?= htmlentities($_SESSION['user']['email']) ?></li>
                                        <li><input type="text" name="gender"
                                                value="<?= htmlentities($_SESSION['user']['gender']) ?>"></li>
                                        <li><input type="text" name="mobile" id="mobile"
                                                value="<?= htmlentities($_SESSION['user']['mobile']) ?>"></li>
                                        <li><input type="text" name="birthday" id="member_birth"
                                                placeholder="yyyy-mm-dd"
                                                value="<?= htmlentities($_SESSION['user']['birthday']) ?>" /></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="member_content_btn member_content_btn_delete"><i class="fas fa-times"></i></div>
                    <div class="member_content_btn" id="modify_info_submit"><button type="submit"
                            class="btn btn-nomad">送出</button></div>
                </form>

            </div>
            <div data-scroll-target="2" class="member_content_bigbox section" id="sec_02">
                <div class="member_content_box member_content_box_favorite">
                    <div class="member_content_title">
                        <div class="member_content_tabs"><i class="fas fa-heart"></i><span>我的最愛</span></div>
                    </div>
                    <div class="member_content_wrap">
                        <div class="member_content_info">
                            <div class="member_tabs">
                                <div class="member_tab_header">
                                    <div class="member_active" id="favorite_schedule"><span>行程</span></div>
                                    <div id="favorite_product"><span>商品</span></div>
                                    <div id="favorite_blog"><span>登山記事</span></div>
                                </div>
                                <div class="member_tab_indicator"></div>
                                <div class="member_tab_body_wrap">
                                    <div class="member_tab_body" id="favorite">
                                        <div class="member_favorite_card_wrap_box" id="first">
                                            <?php foreach($schedules as $s): ?>

                                            <div class="member_tab_active_schedule member_favorite_card_wrap"
                                                data-sid="<?= $s['sid'] ?> ">
                                                <a href="activity-detail.php?sid=<?= $s['sid'] ?>">
                                                    <div class="member_favorite_card">
                                                        <div class="member_favorite_img">
                                                            <img src="./images/<?= $s['schedule_id'] ?>/<?= $s['schedule_id'] ?>.jpeg"
                                                                alt="">
                                                        </div>
                                                        <div class="member_favorite_title">
                                                            <div class="member_favorite_time">
                                                                <?= $s['departure_date'] ?>
                                                            </div>
                                                            <div class="member_favorite_productname">
                                                                <?= $s['schedule_title'] ?></div>
                                                        </div>
                                                        <div class="member_favorite_price">
                                                            $ <?= number_format($s['price']) ?>
                                                            TWD</div>
                                                    </div>
                                                </a>
                                                <div class="member_delete" onclick="deleteItem(event)"><i
                                                        class="fas fa-times"></i>
                                                </div>
                                            </div>

                                            <?php endforeach; ?>
                                        </div>

                                        <div class="member_favorite_card_wrap_box" id="second">
                                            <?php foreach($products as $p): ?>

                                            <div class="member_favorite_card_wrap" data-sid="<?= $p['sid'] ?> ">
                                                <div class="member_favorite_card ">
                                                    <a href="product-detail.php?sid=<?= $p['sid'] ?>">
                                                        <div class="flex">
                                                            <div class="member_favorite_img product">
                                                                <img src="<?= WEB_ROOT ?>/mountain-bag/<?= $p['product_id'] ?>.jpg"
                                                                    alt="">
                                                            </div>
                                                            <div
                                                                class="member_favorite_title member_favorite_title_product">
                                                                <div class="member_favorite_productname">
                                                                    <?= $p['product_name'] ?></div>
                                                            </div>
                                                            <div class="member_favorite_price">
                                                                $ <?= number_format($p['product_price']) ?> TWD
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="member_delete" onclick="deleteItem2(event)">
                                                    <i class="fas fa-times"></i>
                                                </div>
                                            </div>
                                            <?php endforeach; ?>
                                        </div>

                                        <div class="member_favorite_card_wrap_box" id="third">
                                            <?php foreach($notes as $n): ?>
                                            <div class="member_favorite_card_wrap member_favorite_card_wrap_blog"
                                                data-sid="<?= $n['sid'] ?> ">
                                                <a href="open_notebook.php?sid=<?= $n['sid'] ?>">
                                                    <div class="member_favorite_card blog">
                                                        <div class="member_favorite_blog_wrap">
                                                            <div class="member_favorite_blog_title">
                                                                <?= $n['diarytitle'] ?>
                                                            </div>
                                                            <div class="member_favorite_blog_content">
                                                                <div class="member_favorite_blog_wrap_img ">
                                                                    <img src="./notebook-image/<?= $n['info_image'] ?>"
                                                                        alt="">
                                                                </div>
                                                                <div class="member_favorite_blog_detail">
                                                                    <div class="member_favorite_blog_text">
                                                                        <?= $n['text_infor'] ?></div>
                                                                    <div class="member_favorite_blog_writer">
                                                                        <div class="member_blogger_img">
                                                                            <img src="./images/<?= $n['profile_image'] ?>"
                                                                                alt="">
                                                                        </div>
                                                                        <div class="member_blogger_name">
                                                                            <?= $n['nickname'] ?>
                                                                        </div>
                                                                        <div class="member_blogger_time">
                                                                            <?= $n['date'] ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                                <div class="member_delete" onclick="deleteItem3(event)"><i
                                                        class="fas fa-times "></i></div>
                                            </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div data-scroll-target="3" class="member_content_bigbox section" id="sec_03">
                <div class="member_content_box">
                    <div class="member_content_title">
                        <div class="member_content_tabs"><i class="fas fa-trophy"></i><span>成就紀錄</span></div>
                    </div>
                    <div class="member_content_wrap">
                        <div class="member_content_info">
                            <?php if($count == 1 ) : ?>
                            <div class="member_achivement_card_wrap">
                                <div class="member_achivement_card">
                                    <div class="member_achivetment_wrap_img">
                                        <img src="<?= WEB_ROOT ?>/images/<?= $purchase_last['schedule_id'] ?>/<?=$purchase_last['schedule_id'] ?>.jpeg"
                                            alt="">
                                    </div>
                                    <div class="member_achivetment_content">
                                        <div class="member_achivetment_title">
                                            <h5><?=$purchase_last['schedule_title']?></h5>
                                        </div>
                                        <div class="member_achivetment_bar">
                                            <div class="member_achivetment_bar_num">
                                                <h5>100%</h5>
                                            </div>
                                            <div class="member_achivetment_bar_line">
                                                <div class="member_achivetment_bar_bg">
                                                    <div class="member_achivetment_bar_progress bar_01"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="member_achivetment_tpophy">
                                            <div class="member_achivetment_tpophy_wrap">
                                                <div class="wrap_trophy">
                                                    <div class="member_achivetment_tpophy_wrap_img">
                                                        <img src="./images/achievement/ps5-platinum-trophy.png" alt="">
                                                    </div>
                                                    <div class="member_achivetment_tpophy_wrap_num">1</div>
                                                </div>
                                                <div class="wrap_trophy">
                                                    <div class="member_achivetment_tpophy_wrap_img">
                                                        <img src="./images/achievement/ps5-gold-trophy.png" alt="">
                                                    </div>
                                                    <div class="member_achivetment_tpophy_wrap_num">1</div>
                                                </div>
                                                <div class="wrap_trophy">
                                                    <div class="member_achivetment_tpophy_wrap_img">
                                                        <img src="./images/achievement/ps5-silver-trophy.png" alt="">
                                                    </div>
                                                    <div class="member_achivetment_tpophy_wrap_num">2</div>
                                                </div>
                                                <div class="wrap_trophy">
                                                    <div class="member_achivetment_tpophy_wrap_img">
                                                        <img src="./images/achievement/ps5-bronze-trophy.png" alt="">
                                                    </div>
                                                    <div class="member_achivetment_tpophy_wrap_num">2</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php elseif($count>1) : ?>
                            <div class="member_achivement_card_wrap">
                                <div class="member_achivement_card">
                                    <div class="member_achivetment_wrap_img">
                                        <img src="<?= WEB_ROOT ?>/images/<?= $purchase_last['schedule_id'] ?>/<?=$purchase_last['schedule_id'] ?>.jpeg"
                                            alt="">
                                    </div>
                                    <div class="member_achivetment_content">
                                        <div class="member_achivetment_title">
                                            <h5><?=$purchase_last['schedule_title']?></h5>
                                        </div>
                                        <div class="member_achivetment_bar">
                                            <div class="member_achivetment_bar_num">
                                                <h5>100%</h5>
                                            </div>
                                            <div class="member_achivetment_bar_line">
                                                <div class="member_achivetment_bar_bg">
                                                    <div class="member_achivetment_bar_progress bar_01"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="member_achivetment_tpophy">
                                            <div class="member_achivetment_tpophy_wrap">
                                                <div class="wrap_trophy">
                                                    <div class="member_achivetment_tpophy_wrap_img">
                                                        <img src="./images/achievement/ps5-platinum-trophy.png" alt="">
                                                    </div>
                                                    <div class="member_achivetment_tpophy_wrap_num">1</div>
                                                </div>
                                                <div class="wrap_trophy">
                                                    <div class="member_achivetment_tpophy_wrap_img">
                                                        <img src="./images/achievement/ps5-gold-trophy.png" alt="">
                                                    </div>
                                                    <div class="member_achivetment_tpophy_wrap_num">1</div>
                                                </div>
                                                <div class="wrap_trophy">
                                                    <div class="member_achivetment_tpophy_wrap_img">
                                                        <img src="./images/achievement/ps5-silver-trophy.png" alt="">
                                                    </div>
                                                    <div class="member_achivetment_tpophy_wrap_num">2</div>
                                                </div>
                                                <div class="wrap_trophy">
                                                    <div class="member_achivetment_tpophy_wrap_img">
                                                        <img src="./images/achievement/ps5-bronze-trophy.png" alt="">
                                                    </div>
                                                    <div class="member_achivetment_tpophy_wrap_num">2</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="member_achivement_card_wrap">
                                <div class="member_achivement_card">
                                    <div class="member_achivetment_wrap_img">
                                        <img src="<?= WEB_ROOT ?>/images/<?= $purchase_last02['schedule_id'] ?>/<?=$purchase_last02['schedule_id'] ?>.jpeg"
                                            alt="">
                                    </div>
                                    <div class="member_achivetment_content">
                                        <div class="member_achivetment_title">
                                            <h5><?=$purchase_last02['schedule_title']?></h5>
                                        </div>
                                        <div class="member_achivetment_bar">
                                            <div class="member_achivetment_bar_num">
                                                <h5>100%</h5>
                                            </div>
                                            <div class="member_achivetment_bar_line">
                                                <div class="member_achivetment_bar_bg">
                                                    <div class="member_achivetment_bar_progress bar_02"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="member_achivetment_tpophy">
                                            <div class="member_achivetment_tpophy_wrap">
                                                <div class="wrap_trophy">
                                                    <div class="member_achivetment_tpophy_wrap_img">
                                                        <img src="./images/achievement/ps5-platinum-trophy.png" alt="">
                                                    </div>
                                                    <div class="member_achivetment_tpophy_wrap_num">1</div>
                                                </div>
                                                <div class="wrap_trophy">
                                                    <div class="member_achivetment_tpophy_wrap_img">
                                                        <img src="./images/achievement/ps5-gold-trophy.png" alt="">
                                                    </div>
                                                    <div class="member_achivetment_tpophy_wrap_num">1</div>
                                                </div>
                                                <div class="wrap_trophy">
                                                    <div class="member_achivetment_tpophy_wrap_img">
                                                        <img src="./images/achievement/ps5-silver-trophy.png" alt="">
                                                    </div>
                                                    <div class="member_achivetment_tpophy_wrap_num">2</div>
                                                </div>
                                                <div class="wrap_trophy">
                                                    <div class="member_achivetment_tpophy_wrap_img">
                                                        <img src="./images/achievement/ps5-bronze-trophy.png" alt="">
                                                    </div>
                                                    <div class="member_achivetment_tpophy_wrap_num">2</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php else: ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php if($count >= 1 ) : ?>
                    <a href="achievement.php">
                        <div class="member_content_btn"><button class="btn btn-nomad2">我的成就</button></div>
                    </a>
                    <?php else: ?>
                    <?php endif; ?>
                </div>

            </div>
            <div data-scroll-target="4" class="member_content_bigbox section" id="sec_04">
                <div class="member_content_box">
                    <div class="member_content_title">
                        <div class="member_content_tabs"><i class="fas fa-history"></i><span>購買紀錄</span></div>
                    </div>
                    <div class="member_content_wrap">
                        <div class="member_content_info">
                            <div class="member_tabs">
                                <div class="member_tab_header member_purchase_tab_header">
                                    <div class="member_active" id="purchase_schedule"><span>行程</span></div>
                                    <div id="purchase_product"><span>商品</span></div>
                                </div>
                                <div class="member_tab_indicator member_purchase_tab_indicator"></div>
                                <div class="member_tab_body_wrap">
                                    <div class="member_tab_body" id="purchase">
                                        <div class="member_favorite_card_wrap_box">
                                            <?php foreach($purchase as $h): ?>
                                            <div class="member_purchase_wrap_box member_purchase_wrap_box_product"
                                                data-sid="<?= $h['schedule_sid'] ?>">
                                                <div class="member_purchase_time_wrap">
                                                    <div class="member_purchase_time">
                                                        <?= date("Y/m/d", strtotime($h['order_date'])) ?></div>
                                                    <div class="member_purchase_productnum">
                                                        商品編號:<span>45612357<?= $h['order_sid'] ?>
                                                            </sapn>
                                                    </div>
                                                </div>
                                                <div
                                                    class="member_active member_favorite_card_wrap member_favorite_card_wrap_purchase">
                                                    <div class="member_favorite_card">
                                                        <div class="member_favorite_img">
                                                            <img src="./images/<?= $h['schedule_id'] ?>/<?= $h['schedule_id'] ?>.jpeg"
                                                                alt="">
                                                        </div>
                                                        <div
                                                            class="member_favorite_title member_favorite_purchase_title">
                                                            <div class="member_favorite_time">
                                                                <?= $h['departure_date'] ?></div>
                                                            <div class="member_favorite_productname">
                                                                <?= $h['schedule_title'] ?></div>
                                                            <div class="member_purchase_num">x<?= $h['quantity'] ?>
                                                            </div>
                                                        </div>
                                                        <div class="member_favorite_price">$
                                                            <?= number_format($h['price']) ?> TWD</div>
                                                    </div>
                                                </div>
                                                <?php if(empty($c_dict[$h['schedule_sid']])): ?>
                                                <div class="member_commnet_btn_wrap">
                                                    <div class="member_comment">
                                                        <button class="btn btn-nomad comment">評論</button>
                                                    </div>
                                                </div>
                                                <?php endif; ?>
                                            </div>
                                            <?php endforeach; ?>
                                        </div>
                                        <div class="member_favorite_card_wrap_box">
                                            <?php foreach($pro as $b): ?>
                                            <div class="member_purchase_wrap_box">
                                                <div class="member_purchase_time_wrap">
                                                    <div class="member_purchase_time">
                                                        <?= date("Y/m/d", strtotime($b['order_date'])) ?></div>
                                                    <div class="member_purchase_productnum">
                                                        商品編號:<span>45612357<?= $b['order_sid'] ?></sapn>
                                                    </div>
                                                </div>
                                                <div
                                                    class="member_active member_favorite_card_wrap member_favorite_card_wrap_purchase">
                                                    <div class="member_favorite_card">
                                                        <div class="member_favorite_img member_favorite_img_puchase">
                                                            <img src="<?= WEB_ROOT ?>/mountain-bag/<?= $b['product_id'] ?>.jpg"
                                                                alt="">
                                                        </div>
                                                        <div
                                                            class="member_favorite_title member_favorite_purchase_title">
                                                            <div class="member_favorite_productname">
                                                                <?= $b['product_name'] ?>
                                                            </div>
                                                            <div class="member_purchase_num">x<?= $b['quantity'] ?>
                                                            </div>
                                                        </div>
                                                        <div class="member_favorite_price">$
                                                            <?= number_format($b['product_price']) ?>
                                                            TWD
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="member_wrap_scroll">
            <div id="yc-navbar" class="nav_side sticky-top">
                <ul class="member_navbar_nav">
                    <li class="member_nav_item ">
                        <a data-scroll-trigger="1" class="member_nav_link text_active" href="#sec_01"><i
                                class="fas fa-address-card"></i><span class="progress_active"
                                id="sec_icon_01">帳號管理</span></a>
                    </li>
                    <li class="member_nav_item">
                        <a data-scroll-trigger="2" class="member_nav_link" href="#sec_02"><i
                                class="fas fa-heart"></i><span class="">我的最愛</span></a>
                    </li>
                    <li class="member_nav_item">
                        <a data-scroll-trigger="3" class="member_nav_link" href="#sec_03"><i
                                class="fas fa-trophy"></i><span>成就紀錄</span></a>
                    </li>
                    <li class="member_nav_item">
                        <a data-scroll-trigger="4" class="member_nav_link" href="#sec_04"><i
                                class="fas fa-history"></i><span>購買紀錄</span></a>
                    </li>
                </ul>
            </div>

        </div>
    </section>
</div>


<div class="yc_modal" id="modal_comment">
    <div class="yc_modal_white_wrap">
        <form class="yc_modal_white_wrap_box" name="rate" method="POST" onsubmit="sendComment(); return false">
            <div class="yc_modal_delete">
                <i class="fas fa-times"></i>
            </div>
            <div class="yc_modal_title">
                <div class="yc_modal_title_img">
                    <img id="yc_modal_img" src="" alt="">
                </div>
                <div class="yc_modal_title_star">
                    <div class="yc_modal_title_star_bg">
                        <div class="yc_modal_title_star_fill">
                            <i class="fas fa-star" data-index="0"></i>
                            <i class="fas fa-star" data-index="1"></i>
                            <i class="fas fa-star" data-index="2"></i>
                            <i class="fas fa-star" data-index="3"></i>
                            <i class="fas fa-star" data-index="4"></i>
                            <input name="ratedIndex" type="hidden" id="ratedIndex" value="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="yc_modal_content">
                <textarea name="rateMsg" id="" cols="30" rows="8" style="padding:1rem;"></textarea>
            </div>
            <div class="yc_modal_btn">
                <button class="btn btn-nomad submit" id="comment_submit">送出</button>
            </div>
        </form>
    </div>
</div>



<section class="fixed-section">
    <div class="homepage-container flex">
        <div class="fixed-functions">
            <a href="#sec_01"><i class="fas fa-address-card fa-2x svg"></i></a>
        </div>

        <div class="fixed-functions">
            <a href="#sec_02"> <i class="far fa-heart  fa-2x svg"></i></a>
        </div>

        <div class="fixed-functions">
            <a href="#sec_03"><i class="fas fa-trophy fa-2x svg"></i></a>
        </div>

        <div class="fixed-functions">
            <a href="#sec_04"><i class="fas fa-history  fa-2x svg"></i></a>
        </div>
    </div>
</section>


<?php include __DIR__.'/parts-php/alert.php' ?>
<?php include __DIR__.'/parts-php/member-scripts.php' ?>

<script>
const mobile_re = /^09\d{2}-?\d{3}-?\d{3}$/;
const $mobile = $('#mobile');

function update() {

    let isPass = true;
    // if(! mobile_re.test($mobile.val())){
    //     isPass = false;
    //     $mobile.css('border', '2px solid red');

    // }
    if (isPass) {
        $.post(
            'update-api.php',
            $(document.form3).serialize(),
            function(data) {
                console.log(data);
                if (data.success) {
                    // location.href = 'member.php';  
                    $('.member_content_username').each(function() {
                        if ($(this).find('input').length) {
                            $(this).find('input').val(data.post.nickname);
                        } else {
                            $(this).text(data.post.nickname);
                        }

                    });
                    $('.gender').each(function() {
                        if ($(this).find('input').length) {
                            $(this).find('input').val(data.post.gender);
                        } else {
                            $(this).text(data.post.gender);
                        }

                    });
                    $('.mobile').each(function() {
                        if ($(this).find('input').length) {
                            $(this).find('input').val(data.post.mobile);
                        } else {
                            $(this).text(data.post.mobile);
                        }

                    });
                    $('.birthday').each(function() {
                        if ($(this).find('input').length) {
                            $(this).find('input').val(data.post.birthday);
                        } else {
                            $(this).text(data.post.birthday);
                        }

                    });
                    $('.member_card_username').each(function() {
                        if ($(this).find('input').length) {
                            $(this).find('input').val(data.post.nickname);
                        } else {
                            $(this).text(data.post.nickname);
                        }

                    });

                    $('.alert_body').css('top', '0%');
                    $('.alert_success').addClass('alert_show');
                    $('.alert_title').text('修改成功');
                    $('.alert_btn').click(function() {
                        $('.alert_body').css('top', '-100%');
                        $('.alert_success').removeClass('alert_show');
                        window.location.reload();
                    });


                } else {
                    alert(data.error);
                }
            },
            'json'
        );
    }
}


function triggerClick() {
    document.querySelector('#profileImage').click();
}

function displayImage(e) {

    const fd = new FormData(document.form3);

    fetch('upload.php', {
            method: 'POST',
            body: fd
        })
        .then(r => r.json())
        .then(obj => {
            console.log(obj);
            if (obj.success) {
                console.log('images/' + obj.filename);
                document.querySelector('#profileDisplay').src = 'images/' + obj.filename;
                document.form3.profile_image.value = obj.filename;
            }
        })
}
const avatar = document.querySelector('#profileImage');




function sendComment(event) {
    let ratedIndex = parseInt(localStorage.getItem('ratedIndex'));
    let comment = document.rate.rateMsg.value;
    let sid = sid2;
    console.log(ratedIndex);

    $.post(
        'rate-api.php', {
            ratedIndex,
            comment,
            sid
        },
        function(data) {
            console.log(data);
            if (data.success) {
                // location.href = 'member.php';
                $('.alert_body').css('top', '0%');
                $('.alert_success').addClass('alert_show');
                $('.alert_title').text('評論已送出!');
                $('.alert_btn').click(function() {
                    $('.alert_body').css('top', '-100%');
                    $('.alert_success').removeClass('alert_show');

                    // $('.member_commnet_btn_wrap').remove();

                    if (window.clickedCommentBtn) {
                        window.clickedCommentBtn.closest('.member_commnet_btn_wrap').remove();
                    }
                    // $(this).find(".subclass").css("visibility","visible");
                    // window.location.reload();
                });

            } else {
                $('.alert_body').css('top', '0%');
                $('.alert_error_login').addClass('alert_show');
                $('.alert_title').text('評論未送出!');
                $('.alert_btn').click(function() {
                    $('.alert_body').css('top', '-100%');
                    $('.alert_error_login').removeClass('alert_show');
                })
                // alert(data.error);
            }
        },
        'json'
    );

}


function deleteItem(event) {
    let me = $(event.currentTarget);
    let pid = me.closest('.member_favorite_card_wrap').attr('data-sid');
    const type = 1;
    $.get('favorites-api.php', {
        action: 'add',
        pid,
        type
    }, function(data) {
        // console.log(data);

        if (data.addOrDel === 'del') {
            me.closest('div').remove();
        }

    }, 'json');
};

function deleteItem2(event) {
    let me = $(event.currentTarget);
    let pid = me.closest('.member_favorite_card_wrap').attr('data-sid');
    const type = 2;
    $.get('favorites-api.php', {
        action: 'add',
        pid,
        type
    }, function(data) {
        // console.log(data);

        if (data.addOrDel === 'del') {
            me.closest('div').remove();
        }

    }, 'json');
};

function deleteItem3(event) {
    let me = $(event.currentTarget);
    let pid = me.closest('.member_favorite_card_wrap').attr('data-sid');
    const type = 3;
    $.get('favorites-api.php', {
        action: 'add',
        pid,
        type
    }, function(data) {
        // console.log(data);

        if (data.addOrDel === 'del') {
            me.closest('div').remove();
        }

    }, 'json');
};
</script>

<?php include __DIR__.'/parts-php/member-footer.php' ?>
<?php else :?>
<?php header('Location: nomadHomePage.php'); ?>
<?php endif;?>