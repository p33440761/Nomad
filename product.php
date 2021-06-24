<?php include __DIR__ . '/parts-php/config.php'; ?>
<?php
$title = '商品列表';
$pageName = 'product';

//品項分類
$c_sql = "SELECT * FROM categories WHERE parent_sid =0 ";
$cate_rows = $pdo->query($c_sql)->fetchAll();

$cate = isset($_GET['cate']) ? intval($_GET['cate']) : 0;
$qs = [];

$where = 'WHERE 1';
if (!empty($cate)) {
    $where .= " AND category_sid=$cate ";
    $qs['cate'] = $cate;
}

//點擊瀏覽各別商品資訊
$sid = isset($_GET['sid']) ? intval($_GET['sid']) : 0;

$sql = "SELECT * FROM products WHERE sid = $sid";
$stmt = $pdo->query($sql);
$row = $stmt->fetch();



?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/nomadHomePage.css" />
    <title>Nomad-home-page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" />
    <link rel="stylesheet" href="./css/product.css">


</head>

<body>
    <?php include __DIR__ . '/parts-php/html-navbar.php'; ?>

    <div class="main_picture hero-section">
        <div class="picture">
            <div class="logo"></div>
            <h3>商品列表頁</h3>
            <svg class="down" xmlns="http://www.w3.org/2000/svg" height="50px" viewBox="0 0 24 24" width="50px"
                fill="#ffffff">
                <path d="M0 0h24v24H0V0z" fill="none" />
                <path d="M7.41 8.59L12 13.17l4.59-4.58L18 10l-6 6-6-6 1.41-1.41z" />
            </svg>
        </div>
    </div>
    <!-- 成功加入購物車光箱 -->
    <div class="lightbox-target">
        <div class="lightbox-container">
            <div class="content">
                <div class="success-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="64"
                        height="65" viewBox="0 0 64 65">
                        <defs>
                            <clipPath id="clip-path">
                                <rect width="45" height="46" fill="none" />
                            </clipPath>
                        </defs>
                        <g id="Group_1224" data-name="Group 1224" transform="translate(-156 -145)">
                            <ellipse id="Ellipse_249" data-name="Ellipse 249" cx="32" cy="32.5" rx="32" ry="32.5"
                                transform="translate(156 145)" fill="#f0a500" />
                            <g id="Yes" transform="translate(170 164)" clip-path="url(#clip-path)">
                                <rect id="Rectangle_460" data-name="Rectangle 460" width="46" height="46" fill="none" />
                                <path id="Checkbox" d="M16.314,28.371,0,12.058l3.31-3.31,13,12.767L37.829,0l3.31,3.31Z"
                                    transform="translate(0 0.797)" fill="#fff" />
                            </g>
                        </g>
                    </svg>
                </div>
                <p>已成功加入購物車</p>

            </div>
        </div>
        <a href="#" class="lightbox-close">
            <p>確認</p>
        </a>
    </div>

    <!-- 已成功加入收藏的光箱 -->
    <!-- <div id="js-modal" class="modal">
        <div class="modal-container">
            <div class="modal-inner">
                <div class="success-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="64" height="65" viewBox="0 0 64 65">
                        <defs>
                            <clipPath id="clip-path">
                                <rect width="45" height="46" fill="none" />
                            </clipPath>
                        </defs>
                        <g id="Group_1224" data-name="Group 1224" transform="translate(-156 -145)">
                            <ellipse id="Ellipse_249" data-name="Ellipse 249" cx="32" cy="32.5" rx="32" ry="32.5" transform="translate(156 145)" fill="#f0a500" />
                            <g id="Yes" transform="translate(170 164)" clip-path="url(#clip-path)">
                                <rect id="Rectangle_460" data-name="Rectangle 460" width="46" height="46" fill="none" />
                                <path id="Checkbox" d="M16.314,28.371,0,12.058l3.31-3.31,13,12.767L37.829,0l3.31,3.31Z" transform="translate(0 0.797)" fill="#fff" />
                            </g>
                        </g>
                    </svg>
                </div>
                <p>已成功加入收藏</p>

                <button id="js-close" class="modal-close" type="button">確認</button> -->

    </div>
    </div>
    </div>









    <!-- 商品標題 -->
    <h1>
        全部
    </h1>


    <div class="product_all">
        <div class="filter_kind">
            <div class="product_solid categories">
                <a class="filter_product" data-sid="0" href="javascript:changeCate('全部',0)"
                    onclick="/* changeCate(0) */">
                    <p>全部</p>
                </a>
                <?php foreach ($cate_rows as $c) : ?>
                <a class="filter_product" data-sid="<?= $c['sid'] ?>"
                    href="javascript:changeCate('<?= $c['name'] ?>', <?= $c['sid'] ?>)">
                    <p><?= $c['name'] ?></p>
                </a>
                <?php endforeach; ?>
            </div>
            <div class="solid_black"></div>


            <div class="filter_price">
                <br>
                <p>Price</p>
                <?php /*
            <?php foreach ($price_rows as $p) : ?>
                <input class="inp" type="checkbox" name="price"><a data-sid="<?= $p['sid'] ?>"
                    href="javascript:changeCate('<?= $p['name'] ?>', <?= $p['sid'] ?>)"><?= $p['name'] ?></a><br>
                <?php endforeach; ?>
                */ ?>


                <input class="priceItem" type="radio" name="price" onclick="changePrice(0,18000)"><span>All</span><br>
                <input class="priceItem" type="radio" name="price" onclick="changePrice(15000,18000)"><span> $ 15,000 ~
                    $ 18,000</span><br>
                <input class="priceItem" type="radio" name="price" onclick="changePrice(12000,15000)"><span> $ 12,000 ~
                    $ 15,000</span><br>
                <input class="priceItem" type="radio" name="price" onclick="changePrice(9000,12000)"><span> $ 9,000 ~ $
                    12,000 </span><br>
                <input class="priceItem" type="radio" name="price" onclick="changePrice(6000,9000)"><span> $ 6,000 ~ $
                    9,000 </span><br>
                <input class="priceItem" type="radio" name="price" onclick="changePrice(3000,6000)"><span> $ 3,000 $ ~ $
                    6,000 </span><br>
                <input class="priceItem" type="radio" name="price" onclick="changePrice(1000,3000)"><span> $ 1,000 ~ $
                    3,000 </span>


            </div>
        </div>


        <!-- 手機篩選商品 -->
        <div class="filter">
            <select class="width" onchange="mobileChangeCate(event)">
                <option value="none" selected="selected">全部</option>
                <?php foreach ($cate_rows as $c) : ?>
                <option value="<?= $c['sid'] ?>" data-sid="<?= $c['name'] ?>"><?= $c['name'] ?></option>
                <!-- <option value="">登山杖</option>
            <option value="">水壺</option>
            <option value="">登山帽/頭巾</option>
            <option value="">頭燈</option>
            <option value="">睡袋/睡墊</option>
            <option value="">專業儀器</option> -->
                <?php endforeach; ?>
            </select>
            <select class="width" onchange="mobileChangePrice(event)">
                <option value="none" disabled="disabled" selected="selected" hidden="hidden">價格篩選</option>
                <option value="18000,21000">$18,000 ~ $21,000</option>
                <option value="15000,18000">$15,000 ~ $18,000</option>
                <option value="12000,15000">$12,000 ~ $15,000</option>
                <option value="9000,12000">$9,000 ~ $12,000</option>
                <option value="6000,9000">$6,000 ~ $9,000</option>
                <option value="3000,6000">$3,000 ~ $6,000</option>
                <option value="1000,3000">$1,000 ~ $3,000</option>
            </select>
        </div>




        <section class="product_list">
            <div class="box">
            </div>
        </section>



        <div class="top"></div>

        <!-- 手機版的頁面選項 -->
        <!-- <section class="simple-pagination">
        <ul class="pagination">

        </ul>


        
    </section> -->
        <!-- <a href="#">1</a>
        <a href="#">2</a>
        <a href="#">3</a>
        <a href="#">4</a>
        <a href="#">5</a>
        <a href="#">»</a> -->

    </div>

    <!-- 以下為桌機版的頁面選項 -->
    <!-- <div class="pagination">
        <div class="pagination_PC">
            <a href="javascript: backwardPage()">
                <li class="arrow">
                    <svg class="icon-arrow_back_ios svg">
                        <use xlink:href="./icomoon/symbol-defs.svg#icon-arrow_back_ios"></use>
                    </svg>
                </li>
            </a>
            <div class="simple-pagination_PC">
            </div>
            <a href="javascript: forwardPage()">
                <li class="arrow">
                    <svg class="icon-arrow_forward_ios svg">
                        <use xlink:href="./icomoon/symbol-defs.svg#icon-arrow_forward_ios"></use>
                    </svg>
                </li>
            </a>
        </div>
    </div> -->

    <section class="pagination-section">
        <div class="container flex">
            <a href="javascript: backwardPage()">
                <li class="arrow">
                    <svg class="icon-arrow_back_ios svg">
                        <use xlink:href="./icomoon/symbol-defs.svg#icon-arrow_back_ios"></use>
                    </svg>
                </li>
            </a>
            <ul class="pagination flex">

                <!-- Ajax append動態生成頁碼 -->

            </ul>
            <a href="javascript: forwardPage()">
                <li class="arrow">
                    <svg class="icon-arrow_forward_ios svg">
                        <use xlink:href="./icomoon/symbol-defs.svg#icon-arrow_forward_ios"></use>
                    </svg>
                </li>
            </a>
        </div>
    </section>
    </section>



    <div class="footer"></div>




    <?php include __DIR__ . '/parts-php/html-footer.php'; ?>
    <?php include __DIR__ . '/parts-php/html-fixedBar.php'; ?>
    <?php include __DIR__ . '/parts-php/html-scripts.php'; ?>
    <script>
    $(window).scroll(function() {
        if ($(window).scrollTop() > 500) {
            $('.top').addClass('show');
        } else {
            $('.top').removeClass('show');
        };
    });
    $('.top').click(function() {
        console.log('top click');
        $('html, body').animate({
            scrollTop: 0
        }, '300')
    });

    //如果有找到會員就可以進行以下愛心收藏的操作，沒有登入就會顯示false
    const mData = <?= isset($_SESSION['user']) ? json_encode($_SESSION['user']) : 'false' ?>;

    let cate = 0; //代表所有商品
    let page = 1; //預設值為第一頁
    let pData = {}; //商品資料,api生成的資訊
    let priceLow = 0;
    let priceHigh = 18000;
    let categories = $('.categories button');
    let priceItems = $('.priceItem radio');
    const box = $('.box');
    const pagination = $('.pagination');



    //Tpl叫做單項商品
    const productTpl = o => {
        return `        
                <div class="product" >
                    <div class="product_main">
                        <a href="product-detail.php?sid=${o.sid}">
                        <img src="<?= WEB_ROOT ?>/mountain-bag/small/${o.product_id}.jpg" alt="">
                        </a>
                    </div>
                    <div class="group" data-sid="${o.sid}">
                        <div class="love"></div>
                        <div class="love1 love1-id-${o.sid}" onclick="onLove2Click(event)">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 17.826 16.043">
                        <g id="Path_3235" data-name="Path 3235">
                        <path d="M8.913,16.043C4.12,12.84,1.607,9.926.576,7.487-2.185.951,5.7-2.175,8.913,1.683c3.211-3.858,11.1-.733,8.337,5.8C16.219,9.926,13.705,12.84,8.913,16.043Z" stroke="none"/>
                        <path d="M 8.912861824035645 13.6129732131958 C 13.11207485198975 10.61418914794922 14.76550579071045 8.226569175720215 15.40713310241699 6.708418846130371 C 15.79754257202148 5.784328460693359 16.1123218536377 4.455648422241211 15.3947925567627 3.373558759689331 C 14.84150314331055 2.539158582687378 13.75980281829834 1.999998688697815 12.6390323638916 1.999998688697815 C 12.12072277069092 1.999998688697815 11.14714241027832 2.125058650970459 10.45024299621582 2.962588548660278 L 8.912872314453125 4.810168743133545 L 7.375492572784424 2.962588548660278 C 6.678572654724121 2.125058650970459 5.704992771148682 1.999998688697815 5.18668270111084 1.999998688697815 C 4.066082954406738 1.999998688697815 2.984452724456787 2.539208650588989 2.431102752685547 3.373698711395264 C 1.713512778282166 4.455868721008301 2.028222799301147 5.784448623657227 2.418502807617188 6.708188533782959 C 3.060213088989258 8.226551055908203 4.713642120361328 10.61418724060059 8.912861824035645 13.6129732131958 M 8.912862777709961 16.04314804077148 C 4.12047290802002 12.83985900878906 1.607052803039551 9.925718307495117 0.5762727856636047 7.486778736114502 C -1.359121561050415 2.905857801437378 1.936605215072632 -1.269226117983635e-06 5.186685562133789 -1.269226117983635e-06 C 6.573835372924805 -1.269226117983635e-06 7.95247745513916 0.5291657447814941 8.912862777709961 1.683338642120361 C 9.873048782348633 0.5294012427330017 11.25217247009277 -1.269226117983635e-06 12.63903617858887 -1.269226117983635e-06 C 15.88939094543457 -1.269226117983635e-06 19.18501472473145 2.905458927154541 17.24945259094238 7.486778736114502 C 16.21866226196289 9.925718307495117 13.70524311065674 12.83985900878906 8.912862777709961 16.04314804077148 Z" stroke="none" fill="#a75353"/>
                        </g>
                        </svg>
                       
                </div>
                </div>
                    <div class="product_content" data-sid="${o.sid}">
                        <p class="product_features">
                            ${o.product_name}
                        </p>
                        <div class="product_cart">
                            <p class="product_price">
                                $ ${dollarCommas(o.product_price)} TWD
                            </p>
                            <div class="group1">
                            
                                <a href="#" class="cart add-to-cart">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24.095 23.09">
                                <g id="Icon_feather-shopping-cart" data-name="Icon feather-shopping-cart" transform="translate(-0.5 -0.5)">
                                    <path id="Path_3080" data-name="Path 3080" d="M14.009,31a1,1,0,1,1-1-1A1,1,0,0,1,14.009,31Z" transform="translate(-3.47 -9.418)" fill="none" stroke="#707070" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                                    <path id="Path_3081" data-name="Path 3081" d="M30.509,31a1,1,0,1,1-1-1A1,1,0,0,1,30.509,31Z" transform="translate(-8.922 -9.418)" fill="none" stroke="#707070" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                                    <path id="Path_3082" data-name="Path 3082" d="M1.5,1.5H5.517L8.209,14.948a2.009,2.009,0,0,0,2.009,1.617h9.762a2.009,2.009,0,0,0,2.009-1.617l1.607-8.426H6.522" transform="translate(0 0)"  stroke="#707070" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                                </g>
                                </svg>
                                </a>
                                
                                <div id="js-open" class="love1 modal-open love1-id-${o.sid}" onclick="onLove1Click(event)"> 
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 17.826 16.043">
                                    <g id="Path_3235" data-name="Path 3235">
                                        <path d="M8.913,16.043C4.12,12.84,1.607,9.926.576,7.487-2.185.951,5.7-2.175,8.913,1.683c3.211-3.858,11.1-.733,8.337,5.8C16.219,9.926,13.705,12.84,8.913,16.043Z" stroke="none"/>
                                        <path d="M 8.912861824035645 13.6129732131958 C 13.11207485198975 10.61418914794922 14.76550579071045 8.226569175720215 15.40713310241699 6.708418846130371 C 15.79754257202148 5.784328460693359 16.1123218536377 4.455648422241211 15.3947925567627 3.373558759689331 C 14.84150314331055 2.539158582687378 13.75980281829834 1.999998688697815 12.6390323638916 1.999998688697815 C 12.12072277069092 1.999998688697815 11.14714241027832 2.125058650970459 10.45024299621582 2.962588548660278 L 8.912872314453125 4.810168743133545 L 7.375492572784424 2.962588548660278 C 6.678572654724121 2.125058650970459 5.704992771148682 1.999998688697815 5.18668270111084 1.999998688697815 C 4.066082954406738 1.999998688697815 2.984452724456787 2.539208650588989 2.431102752685547 3.373698711395264 C 1.713512778282166 4.455868721008301 2.028222799301147 5.784448623657227 2.418502807617188 6.708188533782959 C 3.060213088989258 8.226551055908203 4.713642120361328 10.61418724060059 8.912861824035645 13.6129732131958 M 8.912862777709961 16.04314804077148 C 4.12047290802002 12.83985900878906 1.607052803039551 9.925718307495117 0.5762727856636047 7.486778736114502 C -1.359121561050415 2.905857801437378 1.936605215072632 -1.269226117983635e-06 5.186685562133789 -1.269226117983635e-06 C 6.573835372924805 -1.269226117983635e-06 7.95247745513916 0.5291657447814941 8.912862777709961 1.683338642120361 C 9.873048782348633 0.5294012427330017 11.25217247009277 -1.269226117983635e-06 12.63903617858887 -1.269226117983635e-06 C 15.88939094543457 -1.269226117983635e-06 19.18501472473145 2.905458927154541 17.24945259094238 7.486778736114502 C 16.21866226196289 9.925718307495117 13.70524311065674 12.83985900878906 8.912862777709961 16.04314804077148 Z" stroke="none" fill="#a75353"/>
                                    </g>
                                </svg>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            `;
    }

    // const pageBtnTpl = n => {
    //     return `<a href="javascript: changePage(${n})">${n}</a>`;
    // }

    const pageBtnTpl = n => {
        return `<a href="#${n}" onclick="changePage(${n})">
                    <li class="ff-airbnb text-first ${ n===page ? 'active' : ''}">
                        <p class="num ff-airbnb">${n}</p>
                    </li>
                </a>`;
    }


    const dollarCommas = function(n) {
        return n.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
    };


    // categories.click(function() {
    //     categories.remove('active');
    //     $(this).addClass('active');

    // });

    //取得商品資料
    function getProducts() {
        $.get('product-api.php', {
            //發資訊給api時才需要將變數放進此欄位。
            cate,
            page,
            priceLow,
            priceHigh,
        }, function(data) {
            pData = data;
            //data為區域變數變成pdata為全域變數
            renderProducts();
            renderPagination();

            //登入會員時，會偵測到有愛心已收藏的資料庫
            if (pData.favorites && pData.favorites.length) {
                pData.favorites.forEach(o => {
                    $('.love1-id-' + o.target_id).addClass('fill')
                });

            }

        }, 'json');
        //資料進來之後就變成json
        //定義一個function來進行發ajax
        //切換分類跟分頁


    }
    // categories.eq(0).click();
    <?php if (empty($cate)) : ?>
    changeCate('全部', 0);
    <?php else : ?>

    $('.product_solid.categories>a').each(function() {

        if ($(this).attr('data-sid') == <?= $cate ?>) {
            changeCate($(this).text(), $(this).attr('data-sid'));
        }
    });
    <?php endif; ?>

    function changeCate(t, c) {
        // console.log(event.target.innerHTML);

        document.querySelector('h1').innerHTML = t;
        console.log(t);
        cate = c; //把c的值設為全域變數
        page = 1; //變更分類的時候還是停留在第一頁
        getProducts(); //再來呼叫getProducts

        //用以上function來帶動product.api.php

    }

    function changePage(p) {
        page = p;
        getProducts(); //讀取資料
        window.scrollTo({
            top: 0,
            left: 0,
            behavior: 'smooth'
        })


    }

    //價格分類
    function changePrice(low, high) {
        page = 1;
        priceLow = low;
        priceHigh = high;
        getProducts();
    }

    function backwardPage() {
        page = page - 1;
        if (!(page < 1)) {
            getProducts();
        }
    }

    function forwardPage() {
        if (!(page >= pData.totalPages)) {
            page++;
            getProducts();
        }
    }

    //產生商品化面區塊
    function renderProducts() {
        box.html('');
        if (pData.rows && pData.rows.forEach) {
            pData.rows.forEach(el => {
                box.append(productTpl(el));

            });
        }
    }

    // function renderPagination() {
    //     pagination.html('');
    //     for (let i = 1; i <= pData.totalPages; i++) {
    //         pagination.append(pageBtnTpl(i));
    //     }
    // }
    function renderPagination() {
        pagination.html('');
        for (let i = page - 2; i <= page + 2; i++) {
            if (i >= 1 && i <= pData.totalPages) {
                pagination.append(pageBtnTpl(i));
            }
        }
    }



    //手機版品項與價格篩選
    var cate_rows = <?= json_encode($cate_rows, JSON_UNESCAPED_UNICODE) ?>;

    function mobileChangeCate(event) {
        console.log(event.target.value);
        changeCate('全部', event.target.value);
    }

    function mobileChangePrice(event) {
        console.log(event.target.value);
        const prices = event.target.value.split(',');
        changePrice(prices[0], prices[1]);
    }



    //點擊愛心收藏產品
    const onLove1Click = function(e) {
        //如果沒有登入，就會顯示要先登入才能進行收藏
        if (!mData) {
            alert('請先登入會員')
            return;
        }
        const love1 = $(e.currentTarget);
        const card = love1.closest('.product_content');
        const pid = card.attr('data-sid');
        console.log('pid:', pid);
        const type = 2;
        $.get('favorites-api.php', {
            action: 'add',
            pid,
            type
        }, function(data) {
            // console.log(data);
            if (data.addOrDel === 'add') {
                love1.addClass('fill');
            } else {
                love1.removeClass('fill');
            }

        }, 'json');
    };

    //手機版愛心收藏
    const onLove2Click = function(e) {
        //如果沒有登入，就會顯示要先登入才能進行收藏
        if (!mData) {
            alert('請先登入會員')
            return;
        }
        const love1 = $(e.currentTarget);
        const card = love1.closest('.group');
        const pid = card.attr('data-sid');
        console.log('pid:', pid);
        const type = 2;
        $('.lightbox-target-like').addClass('active');
        $.get('favorites-api.php', {
            action: 'add',
            pid,
            type
        }, function(data) {
            // console.log(data);
            if (data.addOrDel === 'add') {
                love1.addClass('fill');
            } else {
                love1.removeClass('fill');
            }

        }, 'json');
    };

    //列表加入購物車
    $('.box').on('click', '.cart', function(e) {
        e.preventDefault();
        $(this).toggleClass('fill1');
        const card = $(this).closest('.product_content');
        const pid = card.attr('data-sid');
        const pqty = 1;
        $('.lightbox-target').addClass('active');
        $.get('cart-api-2.php', {
            action: 'add',
            pid,
            pqty
        }, function(data) {
            console.log(data);
            showCartCount(data);
        }, 'json');
    });
    </script>

    <script>
    //篩選品項字體點擊變粗
    $('.filter_product').on('click', function() {
        $('.filter_product').removeClass('font-weight');
        $(this).addClass('font-weight');
    })

    //已成功加入購物車的光箱
    $('.lightbox-close').click(function(e) {
        e.preventDefault();
        $('.lightbox-target').removeClass('active');
    })

    //已成功加入收藏的光箱
    $(function() {
        const modal = $("#js-modal");
        const openBtn = $("#js-open");
        const closeBtn = $("#js-close");

        openBtn.on("click", () => {
            console.log('hi');
            modal.addClass("show");
        });

        closeBtn.on("click", () => {
            modal.removeClass("show");
        });
    });
    </script>
    <?php include __DIR__ . '/parts-php/html-endingTag.php'; ?>