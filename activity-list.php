<?php include __DIR__. '/parts-php/config.php'; ?>
<?php
$title = '行程列表';
$pageName = 'activity-list';








?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/activity-list.css" />
    <title>行程列表頁</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" />
</head>

<body>

    <?php include __DIR__ . '/parts-php/html-navbar.php'; ?>
    <section class="hero-section">
        <div class="container">
            <div class="hero-section-image">
                <h3 class="title ff-noto">千里之行始於足下</h3>
                <hr>
                <a href="#">
                    <svg class="icon-arrow-down svg">
                        <use xlink:href="./icomoon/symbol-defs.svg#icon-arrow-down"></use>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <section class="activity-section">
        <div class="container">
            <div class="filter-section flex">
                <div class="filterBox">
                    <div onclick="changeKind(0)">
                        <svg class="icon-star svg">
                            <use xlink:href="./icomoon/symbol-defs.svg#icon-star"></use>
                        </svg>
                        <p class="title ff-noto">評分</p>
                    </div>
                    <div class="rank box">
                        <ul>
                            <li class="ff-noto all" data-sid="0" onclick="changeRating(0)">
                                <p class="text ff-noto">全部</p>
                            </li>
                            <li class="ff-airbnb" onclick="changeRating(5)">5</li>
                            <li class="ff-airbnb" onclick="changeRating(4)">4</li>
                            <li class="ff-airbnb" onclick="changeRating(3)">3</li>
                            <li class="ff-airbnb" onclick="changeRating(2)">2</li>
                            <li class="ff-airbnb" onclick="changeRating(1)">1</li>
                        </ul>
                    </div>
                </div>
                <div class="filterBox">
                    <div onclick="changeKind(1)">
                        <svg class="icon-place svg">
                            <use xlink:href="./icomoon/symbol-defs.svg#icon-place"></use>
                        </svg>
                        <p class="title ff-noto">位置</p>
                    </div>
                    <div class="place box">
                        <ul>
                            <li class="ff-noto all" data-sid="0" onclick="changePlace('')">
                                <p class="text ff-noto">全部</p>
                            </li>
                            <li class="ff-noto" onclick="changePlace('北')">北</li>
                            <li class="ff-noto" onclick="changePlace('中')">中</li>
                            <li class="ff-noto" onclick="changePlace('南')">南</li>
                            <li class="ff-noto" onclick="changePlace('東')">東</li>
                        </ul>
                    </div>
                </div>
                <div class="filterBox">
                    <div onclick="changeKind(2)">
                        <svg class="icon-difficulty svg">
                            <use xlink:href="./icomoon/symbol-defs.svg#icon-difficulty"></use>
                        </svg>
                        <p class="title ff-noto">難度</p>
                    </div>
                    <!-- 在每個不同篩選器class中加入changeKind()function，讓系統辨認目前選到的是哪個filter -->
                    <div class="level box">
                        <ul>
                            <li class="ff-noto all" data-sid="0" onclick="changeLevel(0)">
                                <p class="text ff-noto">全部</p>
                            </li>
                            <li class="ff-airbnb" onclick="changeLevel('A')">A</li>
                            <li class="ff-airbnb" onclick="changeLevel('B')">B</li>
                            <li class="ff-airbnb" onclick="changeLevel('C')">C</li>
                        </ul>
                    </div>
                </div>
                <div class="filterBox">
                    <div onclick="changeKind(3)">
                        <svg class="icon-time svg">
                            <use xlink:href="./icomoon/symbol-defs.svg#icon-time"></use>
                        </svg>
                        <p class="title ff-noto">時間</p>
                    </div>
                    <div class="days box">
                        <ul>
                            <li class="ff-noto all" data-sid="0" onclick="changeDays(0)">
                                <p class="text ff-noto">全部</p>
                            </li>
                            <li class="ff-noto" onclick="changeDays(1)">1天</li>
                            <li class="ff-noto" onclick="changeDays(2)">2天</li>
                            <li class="ff-noto" onclick="changeDays(3)">3天</li>
                            <li class="ff-noto" onclick="changeDays(4)">4天</li>
                            <li class="ff-noto" onclick="changeDays(5)">5天</li>
                        </ul>
                    </div>
                </div>
                <div class="filterBox">
                    <div onclick="changeKind(4)">
                        <svg class="icon-price svg">
                            <use xlink:href="./icomoon/symbol-defs.svg#icon-price"></use>
                        </svg>
                        <p class="title ff-noto">價格</p>
                    </div>
                    <div class="price box">
                        <ul>
                            <li class="ff-noto all" data-sid="0" onclick="changePrice(0, 18000)">
                                <p class="text ff-noto">全部</p>
                            </li>
                            <li class="ff-airbnb" onclick="changePrice(1000, 5000)">$5,000 以下</li>
                            <li class="ff-airbnb" onclick="changePrice(5001, 10000)">$5,000 - $10,000</li>
                            <li class="ff-airbnb" onclick="changePrice(10001, 18000)">$10,000 以上</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="a-list">



            </div>
        </div>

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


    <?php include __DIR__ . '/parts-php/html-fixedBar.php'; ?>
    <?php include __DIR__ . '/parts-php/html-footer.php'; ?>

    <div class="spaceForFixed-mobile"></div>

    <?php include __DIR__ . '/parts-php/html-scripts.php'; ?>
    <script>
    const mData = <?= isset($_SESSION['user']) ? json_encode($_SESSION['user']) : 'false' ?>;
    //點擊愛心收藏產品
    const onLove1Click = function(e) {
        //如果沒有登入，就會顯示要先登入才能進行收藏
        if (!mData) {
            alert('請先登入會員')
            return;
        }

        const me = $(e.currentTarget);
        const card = me.closest('.activity-card');
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
    </script>

    <script>
    let cate = 0;
    let rating = 0;
    let place = 0;
    let page = 1;
    let days = 0;
    let level = 0;
    let priceLow = 0;
    let priceHigh = 18000;
    let aData = {}; //商品資料
    let placeFilter = $('.place .all');
    let kind = 1;
    const a_list = $('.a-list');
    const pagination = $('.pagination');
    const dollarCommas = function(n) {
        return n.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
    };

    if (location.hash) {
        let p = 1 * location.hash.slice(1);
        if (!isNaN(p)) {
            page = p;
            console.log('p:', p);
            console.log('page:', page);
        }
    }

    const activityTpl = o => {

        return `<div class="activity-card" data-sid="${o.sid}">
                    <div class="activity-card-image">
                        <img src="./images/${o.schedule_id}/${o.schedule_id}.jpeg" class="card-img-top" alt="">
                    </div>
                    <div class="activity-description">
                        <div class="floor-1 flex">
                            <p class="text ff-noto">${o.schedule_title}</p>
                            <svg class="icon-heart icon-heart-id-${o.sid} svg" onclick="onLove1Click(event)">
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
                                <span class="num ff-airbnb">${o.rating}</span>
                            </div>
                            <div class="floors flex">
                                <div class="floor-2-2">
                                    <span>
                                        <svg class="icon-place svg">
                                            <use xlink:href="./icomoon/symbol-defs.svg#icon-place"></use>
                                        </svg>
                                    </span>
                                    <span class="ff-noto">${o.location}</span>
                                </div>
                                <div class="floor-2-3 flex">
                                    <div class="floor-2-3-1">
                                        <span>
                                            <svg class="icon-difficulty svg">
                                                <use xlink:href="./icomoon/symbol-defs.svg#icon-difficulty"></use>
                                            </svg>
                                        </span>
                                        <span class="ff-noto">行程難度: ${o.level}</span>
                                    </div>
                                    <div class="floor-2-3-2">
                                        <span>
                                            <svg class="icon-time svg">
                                                <use xlink:href="./icomoon/symbol-defs.svg#icon-time"></use>
                                            </svg>
                                        </span>
                                        <span class="ff-noto">行程時間: ${o.days}天</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="floor-3">
                            <p class="text ff-noto">
                                ${o.short_info}
                            </p>
                        </div>

                        <div class="floor-4">
                            <div class="top-section flex">
                                <div class="leftBox">
                                    <p class="text ff-noto">剩餘名額：${o.left_number}</p>
                                </div>
                                <div class="rightBox">
                                    <p class="text ff-airbnb">TWD ${dollarCommas(o.price)}</p>
                                </div>
                            </div>
                            <div class="bottom-section flex">
                                <div class="leftBox">
                                    <p class="text ff-noto">出發日期： ${o.departure_date}</p>
                                </div>
                                <a href="./activity-detail.php?sid=${o.sid}">
                                    <div class="activity-section-cta ff-noto">
                                        查看行程
                                    </div>
                                </a>
                            </div>

                        </div>

                    </div>
                </div>`;
    }

    const pageBtnTpl = n => {
        return `<a href="#${n}" onclick="changePage(${n})">
                    <li class="ff-airbnb text-first ${ n===page ? 'active' : ''}">
                        <p class="num ff-airbnb">${n}</p>
                    </li>
                </a>`;
    }

    // getActivitys();

    // 輸出資料新增加kind，可以作為changeKind()的資料來源
    function getActivitys() {
        console.log({
            cate,
            page,
            kind,
            rating,
            place,
            days,
            level,
            priceLow,
            priceHigh
        });
        $.get('activity-list-api.php', {
            cate,
            page,
            kind,
            rating,
            place,
            days,
            level,
            priceLow,
            priceHigh
        }, function(data) {
            aData = data;
            renderActivitys();
            renderPagination();
            if (aData.favorites && aData.favorites.length) {
                aData.favorites.forEach(o => {
                    $('.icon-heart-id-' + o.target_id).addClass('open');
                });
            }
        }, 'json');
    }

    placeFilter.eq(0).click();


    function changeCate(c) {
        cate = c;
        page = 1;
        getActivitys();
    }

    function changeRating(r) {
        rating = r;
        page = 1;
        getActivitys();
    }

    function changePlace(p) {
        place = p;
        page = 1;
        getActivitys();
    }

    function changeDays(d) {
        days = d;
        page = 1;
        getActivitys();
    }

    function changeLevel(l) {
        level = l;
        page = 1;
        getActivitys();
    }

    function changePrice(low, high) {
        page = 1;
        priceLow = low;
        priceHigh = high;
        getActivitys();
    }

    // 換頁時產生平滑移動效果回到篩選處
    function ScrollBack() {
        window.scrollTo({
            top: 783,
            left: 0,
            behavior: 'smooth'
        });
    }

    function changePage(p) {
        page = p;
        getActivitys();
        ScrollBack()
    }

    // 新增種類(放在每個篩選器class裡，點擊時觸發不同篩選項目)
    function changeKind(k) {
        kind = k;
        page = 1;
    }

    function backwardPage() {
        page = page - 1;
        if (!(page < 1)) {
            getActivitys();
            ScrollBack()
        }
    }

    function forwardPage() {
        if (!(page >= aData.totalPages)) {
            page++;
            getActivitys();
            ScrollBack()
        }
    }

    // 產生商品畫面的區塊
    function renderActivitys() {
        a_list.html('');
        if (aData.rows && aData.rows.forEach) {
            aData.rows.forEach(el => {
                a_list.append(activityTpl(el))
            });
        }
    }

    //產生頁碼
    function renderPagination() {
        pagination.html('');
        for (let i = page - 2; i <= page + 2; i++) {
            if (i >= 1 && i <= aData.totalPages) {
                pagination.append(pageBtnTpl(i));
            }
        }
    }
    </script>

    <script>
    // 點擊開啟條件篩選


    $('.filterBox').click(function() {

        $(this).find('p')

        $(this).find('div').toggleClass('open');
        $(this).siblings().find('div').removeClass('open');

        $(this).find('svg').toggleClass('open');
        $(this).siblings().find('svg').removeClass('open');

        $(this).find('p').toggleClass('open');
        $(this).siblings().find('p').removeClass('open');

        if ($(this).find('li:not(li.all)').hasClass('stay')) {
            $(this).find('p').toggleClass('permanent');
            $(this).find('svg').toggleClass('permanent');
        }
    })

    const boxItem = document.querySelectorAll('.filterBox li');


    $('.filterBox li').click(function() {
        $(this).toggleClass('stay');
        $(this).siblings().removeClass('stay');

        const text = $(this).text()

    })


    // 點擊愛心變紅，使用jq on('click')抓取動態生成元素
    // let heart = $('.a-list svg')

    // $('.a-list').on('click', 'svg', function() {
    //     $(this).toggleClass('open');
    // })
    </script>



    <?php include __DIR__ . '/parts-php/html-endingTag.php'; ?>