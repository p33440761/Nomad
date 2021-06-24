<?php include __DIR__ . '/parts-php/config.php'; ?>
<?php
$title = '商品細節';
$pageName = 'product-detial';

//單一品項抓取資料
$sid = $_GET['sid'] ?? 1;
$p_sql = "SELECT * FROM products WHERE sid=$sid";
$row = $pdo->query($p_sql)->fetch();


// print_r($row);
// exit;

//品項分類
$c_sql = "SELECT * FROM categories WHERE parent_sid =0 ";
$cate_rows = $pdo->query($c_sql)->fetchAll();

$cate = isset($_GET['cate']) ? intval($_GET['cate']) : 0;
$qs = [];

$where = 'WHERE 1';
if (!empty($cate)) {
    $where .= " AND category_sid=$cate ";
    // $qs['cate'] = $cate;
}

//愛心收藏的邏輯
$heart_sql = "SELECT * FROM `favorites`";
$h_stmt = $pdo->query($heart_sql);
$h_rows = $h_stmt->fetchAll();

//愛心收藏
if (!empty($_SESSION['user'])) {
    $mid = intval($_SESSION['user']['id']);
    $where .= " AND f.`type`=2 AND f.`member_id`=$mid";
    //f代表favorites的縮寫

    $f_sql = sprintf("SELECT f.target_id FROM products p 
    LEFT JOIN favorites f ON f.target_id=p.sid
    $where");
    $favorites = $pdo->query($f_sql)->fetchAll();
}

//隨機抓取3件產品
$a_sql = "SELECT * FROM products ORDER BY RAND() LIMIT 3";
$a_stmt = $pdo->query($a_sql);
$a_rows = $a_stmt->fetchAll();



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品細節頁</title>
    <link rel="stylesheet" href="./css/product-detail.css">
    <link rel="stylesheet" href="./css/nomadHomePage.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
</head>

<body>

    <?php include __DIR__ . '/parts-php/html-navbar.php'; ?>

    <div class="product_background hero-section">
        <div class="logo"></div>
    </div>

    <!-- 已成功加入收藏的光箱 -->
    <!-- <div class="modalLike">
        <div class="modalLike-container">
            <div class="modalLike-inner">
                <div class="success-icon-like">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="64" height="65" viewBox="0 0 64 65">
                        <defs>
                            <clipPath id="clip-path">
                                <rect width="45" height="46" fill="none" />
                            </clipPath>
                        </defs>
                        <g id="Group_1224" data-name="Group 1224" transform="translate(-156 -145)">
                            <ellipse id="Ellipse_249" data-name="Ellipse 249" cx="32" cy="32.5" rx="32" ry="32.5" transform="translate(156 145)" fill="#f0a500" />
                            <g class="Yes" transform="translate(170 164)" clip-path="url(#clip-path)">
                                <rect id="Rectangle_460" data-name="Rectangle 460" width="46" height="46" fill="none" />
                                <path class="Checkbox" d="M16.314,28.371,0,12.058l3.31-3.31,13,12.767L37.829,0l3.31,3.31Z" transform="translate(0 0.797)" fill="#fff" />
                            </g>
                        </g>
                    </svg>
                </div>
                <p>已成功加入收藏</p>

                <button class="modalLike-close" type="button">確認</button>

            </div>
        </div>
    </div> -->

    <!-- 已成功加入購物車的光箱 -->
    <div class="modalCart">
        <div class="modalCart-container">
            <div class="modalCart-inner">
                <div class="success-icon-cart">
                    <!-- <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="64" height="65" viewBox="0 0 64 65">
                        <defs>
                            <clipPath id="clip-path1">
                                <rect width="45" height="46" fill="none" />
                            </clipPath>
                        </defs>
                        <g id="Group_12241" data-name="Group 1224" transform="translate(-156 -145)">
                            <ellipse id="Ellipse_2491" data-name="Ellipse 249" cx="32" cy="32.5" rx="32" ry="32.5" transform="translate(156 145)" fill="#f0a500" />
                            <g id="Yes1" transform="translate(170 164)" clip-path="url(#clip-path)">
                                <rect id="Rectangle_4601" data-name="Rectangle 460" width="46" height="46" fill="none" />
                                <path id="Checkbox1" d="M16.314,28.371,0,12.058l3.31-3.31,13,12.767L37.829,0l3.31,3.31Z" transform="translate(0 0.797)" fill="#fff" />
                            </g>
                        </g>
                    </svg> -->
                    <svg class="icon-done svg">
                        <use xlink:href="./icomoon/symbol-defs.svg#icon-done"></use>
                    </svg>

                </div>
                <p>已成功加入購物車</p>

                <button class="modalCart-close" type="button">確認</button>

            </div>
        </div>
    </div>


    <!-- PC版篩選 -->
    <section class="product_detail">
        <div class="product1">
            <div class="product_solid">
                <a class="filter_product" href="product.php">
                    <p class="ff-noto">全部</p>
                </a>
                <?php foreach ($cate_rows as $c) : ?>
                <a class="filter_product" href="product.php?cate=<?= $c['sid'] ?>">
                    <p class="ff-noto"><?= $c['name'] ?></p>
                </a>
                <?php endforeach; ?>
            </div>



            <!-- 產品大圖 -->

            <div class="product_picture">
                <img src="<?= WEB_ROOT ?>/mountain-bag/<?= $row['product_id'] ?>.jpg" alt="">
            </div>

            <div class="small_product_picture">
                <div class="small_picture">
                    <div class="small_photo">
                        <img src="<?= WEB_ROOT ?>/mountain-bag/small/<?= $row['product_id'] ?>.jpg" alt="">
                        <div class="small_photo_circle"></div>
                    </div>
                    <?php if (file_exists("C:\\xampp\\htdocs\\Nomad\\mountain-bag\\small\\small2\\" . $row['product_id'] . ".jpg")) : ?>
                    <div class="small_photo">
                        <img src="<?= WEB_ROOT ?>/mountain-bag/small/small2/<?= $row['product_id'] ?>.jpg" alt="">
                        <div class="small_photo_circle"></div>
                    </div>
                    <?php endif; ?>
                    <?php if (file_exists("C:\\xampp\\htdocs\\Nomad\\mountain-bag\\small\\small3\\" . $row['product_id'] . ".jpg")) : ?>
                    <div class="small_photo">
                        <img src="<?= WEB_ROOT ?>/mountain-bag/small/small3/<?= $row['product_id'] ?>.jpg" alt="">
                        <div class="small_photo_circle"></div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- 手機版介面 -->
        <div class="product_title">
            <div class="group" data-sid="<?= $row['sid'] ?>">
                <h3 class="ff-noto"><?= $row['product_name'] ?>
                </h3>
                <div class="love love-id-<?= $row['sid'] ?>" onclick="onLove2Click(event)">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 17.826 16.043">
                        <g id="Path_3235" data-name="Path 3235">
                            <path
                                d="M8.913,16.043C4.12,12.84,1.607,9.926.576,7.487-2.185.951,5.7-2.175,8.913,1.683c3.211-3.858,11.1-.733,8.337,5.8C16.219,9.926,13.705,12.84,8.913,16.043Z"
                                stroke="none" />
                            <path
                                d="M 8.912861824035645 13.6129732131958 C 13.11207485198975 10.61418914794922 14.76550579071045 8.226569175720215 15.40713310241699 6.708418846130371 C 15.79754257202148 5.784328460693359 16.1123218536377 4.455648422241211 15.3947925567627 3.373558759689331 C 14.84150314331055 2.539158582687378 13.75980281829834 1.999998688697815 12.6390323638916 1.999998688697815 C 12.12072277069092 1.999998688697815 11.14714241027832 2.125058650970459 10.45024299621582 2.962588548660278 L 8.912872314453125 4.810168743133545 L 7.375492572784424 2.962588548660278 C 6.678572654724121 2.125058650970459 5.704992771148682 1.999998688697815 5.18668270111084 1.999998688697815 C 4.066082954406738 1.999998688697815 2.984452724456787 2.539208650588989 2.431102752685547 3.373698711395264 C 1.713512778282166 4.455868721008301 2.028222799301147 5.784448623657227 2.418502807617188 6.708188533782959 C 3.060213088989258 8.226551055908203 4.713642120361328 10.61418724060059 8.912861824035645 13.6129732131958 M 8.912862777709961 16.04314804077148 C 4.12047290802002 12.83985900878906 1.607052803039551 9.925718307495117 0.5762727856636047 7.486778736114502 C -1.359121561050415 2.905857801437378 1.936605215072632 -1.269226117983635e-06 5.186685562133789 -1.269226117983635e-06 C 6.573835372924805 -1.269226117983635e-06 7.95247745513916 0.5291657447814941 8.912862777709961 1.683338642120361 C 9.873048782348633 0.5294012427330017 11.25217247009277 -1.269226117983635e-06 12.63903617858887 -1.269226117983635e-06 C 15.88939094543457 -1.269226117983635e-06 19.18501472473145 2.905458927154541 17.24945259094238 7.486778736114502 C 16.21866226196289 9.925718307495117 13.70524311065674 12.83985900878906 8.912862777709961 16.04314804077148 Z"
                                stroke="none" fill="#a75353" />
                        </g>
                    </svg>
                </div>
            </div>
            <div class="product_price">
                <h3 class="ff-noto">$ <?= number_format($row['product_price']) ?> TWD</h3>
            </div>
            <div class="product_size ff-noto"><?= $row['product_spec'] ?></div>
        </div>

        <div class="product_intro">
            <div class="product_content ff-noto" data-sid="<?= $row['sid'] ?>">
                <?= $row['product_info'] ?>

            </div>
            <!-- <div class="more_button">
                <div class="more">顯示更多</div>
            </div> -->
        </div>

    </section>
    <!-- PC版的其他相關產品 -->
    <div class="other_message">
        <div class="border"></div>
        <div class="other_people ff-noto">其他人也看了...</div>
    </div>

    <section class="product_detail">
        <div class="product2">
            <div class="other">
                <div class="other_message1">
                    <div class="border"></div>
                    <div class="other_people ff-noto">其他人也看了...</div>
                </div>

                <?php foreach ($a_rows as $a) : ?>
                <div class="other_product_info">
                    <div class="product_name1">
                        <img src="<?= WEB_ROOT ?>/mountain-bag/small/<?= $a['product_id'] ?>.jpg" alt="">
                    </div>
                    <div class="pro">
                        <p class="ff-noto"><?= $a['product_name'] ?><br>$ <?= number_format($a['product_price']) ?> TWD
                        </p>
                    </div>
                </div>
                <?php endforeach; ?>


                <!-- <div class="product_name1">
                    <img src="./images/montane-alpine-mission-goretex.svg" alt="">
                    <p>拔熱式透氣背包<br>NT1,200</p>
                </div>
                <div class="product_name1">
                    <img src="./images/montane-alpine-mission-goretex.svg" alt="">
                    <p>拔熱式透氣背包<br>NT1,200</p>
                </div> -->
            </div>

            <div class="product_content_message">

                <div class="product_intro_PC ff-noto" data-sid="<?= $row['sid'] ?>">
                    <?= $row['product_info'] ?>

                </div>

            </div>


            <!-- PC的商品數量 -->
            <div class="product_main_name" data-sid="<?= $row['sid'] ?>">
                <h1 class="card-title ff-noto"><?= $row['product_name'] ?></h1>
                <div class="product_size ff-noto"><?= $row['product_spec'] ?></div>
                <div class="product_price_order ff-noto">$ <?= number_format($row['product_price']) ?> TWD</div>

                <div class="product_count">
                    <div class="order">
                        <div class="number ff-noto">數量</div>
                        <div class="count">
                            <input class="min" name="" type="button" style="font-size:50px" value="-">
                            <input class="num" name="num" type="text" value="1" readonly="true">
                            <input class="add" name="" style="font-size:50px" type="button" value="+">

                            <!-- <div class="obj">-</div>
                            <div class="obj">2</div>
                            <div class="obj">+</div> -->
                        </div>
                    </div>
                </div>
                <div class="product_button " data-sid="<?= $row['sid'] ?>">
                    <div class="cart_button_PC js-openCart modalCart-open">
                        <div class="cart_img add-to-cart-desktop"></div>
                    </div>
                    <div class="collect_button js-open modalLIke-open love-id-<?= $row['sid'] ?>"
                        onclick="onLove1Click(event)">
                        <div class="collect_img">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 17.826 16.043">
                                <g id="Path_3235" data-name="Path 3235">
                                    <path
                                        d="M8.913,16.043C4.12,12.84,1.607,9.926.576,7.487-2.185.951,5.7-2.175,8.913,1.683c3.211-3.858,11.1-.733,8.337,5.8C16.219,9.926,13.705,12.84,8.913,16.043Z"
                                        stroke="none" />
                                    <path
                                        d="M 8.912861824035645 13.6129732131958 C 13.11207485198975 10.61418914794922 14.76550579071045 8.226569175720215 15.40713310241699 6.708418846130371 C 15.79754257202148 5.784328460693359 16.1123218536377 4.455648422241211 15.3947925567627 3.373558759689331 C 14.84150314331055 2.539158582687378 13.75980281829834 1.999998688697815 12.6390323638916 1.999998688697815 C 12.12072277069092 1.999998688697815 11.14714241027832 2.125058650970459 10.45024299621582 2.962588548660278 L 8.912872314453125 4.810168743133545 L 7.375492572784424 2.962588548660278 C 6.678572654724121 2.125058650970459 5.704992771148682 1.999998688697815 5.18668270111084 1.999998688697815 C 4.066082954406738 1.999998688697815 2.984452724456787 2.539208650588989 2.431102752685547 3.373698711395264 C 1.713512778282166 4.455868721008301 2.028222799301147 5.784448623657227 2.418502807617188 6.708188533782959 C 3.060213088989258 8.226551055908203 4.713642120361328 10.61418724060059 8.912861824035645 13.6129732131958 M 8.912862777709961 16.04314804077148 C 4.12047290802002 12.83985900878906 1.607052803039551 9.925718307495117 0.5762727856636047 7.486778736114502 C -1.359121561050415 2.905857801437378 1.936605215072632 -1.269226117983635e-06 5.186685562133789 -1.269226117983635e-06 C 6.573835372924805 -1.269226117983635e-06 7.95247745513916 0.5291657447814941 8.912862777709961 1.683338642120361 C 9.873048782348633 0.5294012427330017 11.25217247009277 -1.269226117983635e-06 12.63903617858887 -1.269226117983635e-06 C 15.88939094543457 -1.269226117983635e-06 19.18501472473145 2.905458927154541 17.24945259094238 7.486778736114502 C 16.21866226196289 9.925718307495117 13.70524311065674 12.83985900878906 8.912862777709961 16.04314804077148 Z"
                                        stroke="none" fill="#a75353" />
                                </g>
                            </svg>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </section>

    <!-- 手機版的其他相關商品 -->
    <div class="carousel" data-flickity='{ "wrapAround": true }'>
        <?php foreach ($a_rows as $a) : ?>
        <div class="carousel-cell">
            <div class="product_name ff-noto">
                <img src="<?= WEB_ROOT ?>/mountain-bag/small/<?= $a['product_id'] ?>.jpg" alt="">
            </div>
            <p class="ff-noto"><?= $a['product_name'] ?></p>
            <div class="about_product_price ff-noto">$ <?= number_format($a['product_price']) ?> TWD</div>
        </div>
        <?php endforeach; ?>

    </div>



    <!-- 手機版cart -->
    <div class="cart_button" data-sid="<?= $row['sid'] ?>">
        <div class="cart add-to-cart-mobile js-openCart modalCart-open">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24.095 23.09">
                <g id="Icon_feather-shopping-cart" data-name="Icon feather-shopping-cart"
                    transform="translate(-0.5 -0.5)">
                    <path id="Path_3080" data-name="Path 3080" d="M14.009,31a1,1,0,1,1-1-1A1,1,0,0,1,14.009,31Z"
                        transform="translate(-3.47 -9.418)" fill="none" stroke="#ffffff" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" />
                    <path id="Path_3081" data-name="Path 3081" d="M30.509,31a1,1,0,1,1-1-1A1,1,0,0,1,30.509,31Z"
                        transform="translate(-8.922 -9.418)" fill="none" stroke="#ffffff" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" />
                    <path id="Path_3082" data-name="Path 3082"
                        d="M1.5,1.5H5.517L8.209,14.948a2.009,2.009,0,0,0,2.009,1.617h9.762a2.009,2.009,0,0,0,2.009-1.617l1.607-8.426H6.522"
                        transform="translate(0 0)" fill="none" stroke="#ffffff" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" />
                </g>
            </svg>
            <p>加入購物車</p>

        </div>
        <p class="vertical-line"></p>
        <div class="buy ff-noto">直接購買</div>
    </div>
    <!-- 手機版直接購買裡面的card -->
    <div class="purchase">
        <div class="purchase_size">
            <div class="cancel"></div>
        </div>
        <div class="purchase_info">
            <div class="purchase_picture">
                <img src="<?= WEB_ROOT ?>/mountain-bag/<?= $row['product_id'] ?>.jpg" alt="">
            </div>
            <div class="purchase_content">
                <div class="purchase_price">
                    <h3 class="ff-noto">$ <?= number_format($row['product_price'])  ?> TWD</h3>
                    <!-- <div class="product_number">
                        <p>商品數量:</p>
                        <select name="num" id="num">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div> -->
                </div>
            </div>
        </div>

        <!-- 手機版直接購買 -->
        <div class="purchase_product" data-sid="<?= $row['sid'] ?>">
            <h4 class="ff-noto"><?= $row['product_name'] ?></h4>
            <!-- <p>數量</p> -->

            <div class="purchase_count">
                <div class="purchase_cal">

                    <div class="product_count">
                        <div class="order">
                            <div class="number ff-noto">數量</div>
                            <div class="count">
                                <input class="min" name="" type="button" value="-">
                                <input class="num" name="num" type="text" value="1" readonly="true">
                                <input class="add" name="" type="button" value="+">

                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <a href="./shopping-cart-1.php" class="purchus_button add-to-cart-mobile-buy ff-noto">
                直接購買
            </a>
        </div>

    </div>


    <?php include __DIR__ . '/parts-php/html-footer.php'; ?>
    <?php include __DIR__ . '/parts-php/html-scripts.php'; ?>
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>

    <script>
    $('.small_photo').click(function() {
        let imgSrc = $(this).find('img').attr('src');
        $('.product_picture img').attr('src', imgSrc);
        console.log(imgSrc);
    })

    $('.small_photo').click(function() {
        $(this).find('.small_photo_circle').css('border', '3px solid #F0A500').closest('.small_photo')
            .siblings().find('.small_photo_circle').css('border', 'transparent').css('transition', '0.3s');
    })

    //篩選品項字體點擊變粗
    $('.filter_product').on('click', function() {
        $('.filter_product').removeClass('font-weight');
        $(this).addClass('font-weight');
    })


    // 按鈕數量的改變
    $(function() {
        let t = $('.num');
        $('.add').click(function() {
            t.val(parseInt(t.val()) + 1);
        })
        $('.min').click(function() {
            if (t.val() <= 1) {
                t.val(1);
            } else {
                t.val(parseInt(t.val()) - 1);

            }
        })

    });

    const dollarCommas = function(n) {
        return n.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
    };






    //PC版購物車按鈕的傳送資料
    const addToCartPBtn = $('.add-to-cart-desktop');
    addToCartPBtn.click(function() {
        // console.log('hi')
        const card = $(this).closest('.product_main_name');
        const pid = card.attr('data-sid');
        const pqty = card.find('.num').val();

        $.get('cart-api-2.php', {
            action: 'add',
            pid,
            pqty
        }, function(data) {
            console.log(data);
            showCartCount(data); // 更新選單上數量的提示
        }, 'json');

    });


    //已成功加入購物車的光箱
    $(function() {
        const modal = $(".modalCart");
        const openBtn = $(".js-openCart");
        const closeBtn = $(".modalCart-close");

        openBtn.on("click", () => {
            console.log('hi');
            modal.addClass("show");
        });

        closeBtn.on("click", () => {
            modal.removeClass("show");
        });
    });
    </script>
    <script>
    const mData = <?= isset($_SESSION['user']) ? json_encode($_SESSION['user']) : 'false' ?>;
    //PC版點擊愛心收藏產品
    const onLove1Click = function(e) {
        //如果沒有登入，就會顯示要先登入才能進行收藏

        if (!mData) {
            alert('請先登入會員')
            return;
        }
        const love1 = $(e.currentTarget);
        const card = love1.closest('.product_button');
        const pid = card.attr('data-sid');
        console.log('pid:', pid);
        const type = 2;

        const modal = $(".modalLike");
        const openBtn = $(".js-open");

        $.get('favorites-api.php', {
            action: 'add',
            pid,
            type
        }, function(data) {
            if (data.addOrDel === 'add') {
                console.log('hi');
                love1.addClass('fill');
                modal.addClass("show");
            } else {
                love1.removeClass('fill');
            }


        }, 'json');

    };
    const modalClose = $(".modalLike");
    const closeBtn = $(".modalLike-close");
    closeBtn.on("click", () => {
        modalClose.removeClass("show");
    });

    //手機版加入愛心收藏
    const onLove2Click = function(e) {
        //如果沒有登入，就會顯示要先登入才能進行收藏
        if (!mData) {
            alert('請先登入會員')
            return;
        }
        const love = $(e.currentTarget);
        const card = love.closest('.group');
        const pid = card.attr('data-sid');
        console.log('pid:', pid);
        const type = 2;

        // const modal = $(".modalLike");
        // const openBtn = $(".js-open");

        $.get('favorites-api.php', {
            action: 'add',
            pid,
            type
        }, function(data) {
            if (data.addOrDel === 'add') {
                love.addClass('fill');
                // modal.addClass("show");
            } else {
                love.removeClass('fill');
            }

        }, 'json');

    };

    // const modalClose = $(".modalLike");
    // const closeBtn = $(".modalLike-close");
    // closeBtn.on("click", () => {
    //     modalClose.removeClass("show");
    // });
    function getHearts() {
        $.get('product-api.php', function(data) {
            pData = data;
            //登入會員時，會偵測到有愛心已收藏的資料庫
            if (pData.favorites && pData.favorites.length) {
                pData.favorites.forEach(o => {
                    $('.love-id-' + o.target_id).addClass('fill')
                });

            }
        }, 'json');
    }
    getHearts();
    </script>
    <script>
    //手機版加入購物車

    const addToCartMoBtn = $('.add-to-cart-mobile');
    addToCartMoBtn.click(function() {
        const card = $(this).closest('.cart_button');
        const pid = card.attr('data-sid');
        const pqty = 1;

        $.get('cart-api-2.php', {
            action: 'add',
            pid,
            pqty
        }, function(data) {
            console.log(data);
            showCartCount(data); // 更新選單上數量的提示
        }, 'json');

    })
    </script>
    <script>
    //手機版直接購買

    const addToCartBtn = $('.add-to-cart-mobile-buy');
    addToCartBtn.click(function() {
        const card = $(this).closest('.purchase_product');
        const pid = card.attr('data-sid');
        const pqty = card.find('.num').val();

        $.get('cart-api-2.php', {
            action: 'add',
            pid,
            pqty
        }, function(data) {
            console.log(data);
            showCartCount(data); // 更新選單上數量的提示
        }, 'json');

    })
    </script>


    <script>
    const purchaseBtn = document.querySelector(".buy");
    const purchaseProduct = document.querySelector(".purchase")
    const exit = document.querySelector(".cancel")

    purchaseBtn.addEventListener("click", () => {
        console.log("hi");
        modal.classList.add("open");
        purchaseProduct.classList.add("purchase-btn");
    });

    exit.addEventListener("click", () => {
        modal.classList.remove("open");
        purchaseProduct.classList.remove("purchase-btn");

    });
    </script>


    <?php include __DIR__ . '/parts-php/html-endingTag.php'; ?>