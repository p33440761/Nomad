<?php include __DIR__.'/parts-php/config.php';?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./css/info.css">
    <link rel="stylesheet" href="./css/nomadHomePage.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>官方資訊</title>
</head>

<body>
    <?php include __DIR__ . '/parts-php/html-navbar.php'; ?>
    <!-- ------假山捲動視差----- -->
    <section class="zoom">
        <div class="subject">
            <h1 class="word1">No matter what</h1>
        </div>
        <div class="subject2">
            <h1 class="word2">we do</h1>
        </div>

        <img src="./img/m5.png" alt="" class="layer1">

        <img src="./img/m5.png" alt="" class="layer2">
    </section>

    <div class="mask hero-section">
        <a href="javascript:" id="return-to-top" class="return-to-top"><svg
                style="position: absolute; width: 40px; height: 40px; fill: #ffffff42;margin: 5px;"
                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                <path
                    d="M177 159.7l136 136c9.4 9.4 9.4 24.6 0 33.9l-22.6 22.6c-9.4 9.4-24.6 9.4-33.9 0L160 255.9l-96.4 96.4c-9.4 9.4-24.6 9.4-33.9 0L7 329.7c-9.4-9.4-9.4-24.6 0-33.9l136-136c9.4-9.5 24.6-9.5 34-.1z" />
            </svg></a>
        <a href="javascript:" id="return-to-top1" class="return-to-top1"><svg
                style="position: absolute; width: 35px; height: 35px; fill: #ffffff42;margin: 7px; "
                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                <path
                    d="M177 159.7l136 136c9.4 9.4 9.4 24.6 0 33.9l-22.6 22.6c-9.4 9.4-24.6 9.4-33.9 0L160 255.9l-96.4 96.4c-9.4 9.4-24.6 9.4-33.9 0L7 329.7c-9.4-9.4-9.4-24.6 0-33.9l136-136c9.4-9.5 24.6-9.5 34-.1z" />
            </svg></a>
        <div class="container text-center">
            <h1 class="title">官方資訊</h1>
            <div class="button-group col-12" id="tab">
                <button type="button" class="btn btn-outline-light ">最新消息</button>
                <button type="button" class="btn btn-outline-light ">關於我們</button>
                <button type="button" class="btn btn-outline-light ">嚮導介紹</button>
            </div>

            <div id="content">
                <div class="rule ">
                    <div class="card1 card1-1">
                        <h2 class="title-2 title-2-1 ff-noto">最新消息</h2>



                        <div class="text1 ">
                            <div class="container1">
                                <div class="box2 ">
                                    <img src="./img/c1.jpeg" alt="" width="100%" height="auto
                                        ">

                                    <div class=" boxinfo">
                                        <h5>加里山-柳衫林</h5>
                                        <p>六月份行程表已出爐，歡迎踴躍報名！</p>
                                        <span>2012/06/15</span>
                                    </div>

                                </div>

                                <div class="box2">
                                    <img src="./img/c2.jpg" alt="" width="100%" height="auto
                                        ">
                                    <div class=" boxinfo">
                                        <h5>奇萊峰</h5>
                                        <p>七月份行程表已出爐，歡迎踴躍報名！</p>
                                        <span>2012/06/15</span>
                                    </div>

                                </div>

                                <div class="box2">
                                    <img src="./img/c3.jpg" alt="" width="100%" height="auto">
                                    <div class=" boxinfo">
                                        <h5>玉山東峰</h5>
                                        <p>八月份行程表已出爐，歡迎踴躍報名！</p>
                                        <span>2012/06/15</span>
                                    </div>

                                </div>

                                <div class="box2">
                                    <img src="./img/c4.jpeg" alt="" width="100%" height="auto">
                                    <div class=" boxinfo">
                                        <h5>雪山冬季</h5>
                                        <p>九月份行程表已出爐，歡迎踴躍報名！</p>
                                        <span>2012/06/15</span>
                                    </div>

                                </div>
                                <div class="box2">
                                    <img src="./img/c5.jpeg" alt="" width="100%" height="auto">
                                    <div class=" boxinfo">
                                        <h5>玉山山脈</h5>
                                        <p>十月份行程表已出爐，歡迎踴躍報名！</p>
                                        <span>2012/06/15</span>
                                    </div>

                                </div>
                                <div class="box2">
                                    <img src="./img/c6.jpeg" alt="" width="100%" height="auto">
                                    <div class=" boxinfo">
                                        <h5>天使的眼淚-嘉明湖</h5>
                                        <p>十一月份行程表已出爐，歡迎踴躍報名！</p>
                                        <span>2012/06/15</span>
                                    </div>
                                </div>
                                <div class="box2">
                                    <img src="./img/c7.jpeg" alt="" width="100%" height="auto">
                                    <div class=" boxinfo">
                                        <h5>雪山日出行</h5>
                                        <p>十一月份行程表已出爐，歡迎踴躍報名！</p>
                                        <span>2012/06/15</span>
                                    </div>
                                </div>
                                <div class="box2">
                                    <img src="./img/c8.jpg" alt="" width="100%" height="auto">
                                    <div class=" boxinfo">
                                        <h5>合歡山</h5>
                                        <p>十一月份行程表已出爐，歡迎踴躍報名！</p>
                                        <span>2012/06/15</span>
                                    </div>
                                </div>
                                <div class="box2">
                                    <img src="./img/c9.jpeg" alt="" width="100%" height="auto">
                                    <div class=" boxinfo">
                                        <h5>武陵四秀</h5>
                                        <p>十一月份行程表已出爐，歡迎踴躍報名！</p>
                                        <span>2012/06/15</span>
                                    </div>
                                </div>

                            </div>
                            <!-- ---------------------------------------- -->

                        </div>
                    </div>

                </div>

                <div class="rule">
                    <div class="card1 card2">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="./img/about2.jpeg" class="d-block " alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="./img/about3.jpeg" class="d-block " alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="./img/about01.png" class="d-block " alt="...">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                                data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                                data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                        <div class="aboutus">
                            <h5 class="aboutus-title">關於我們</h5>
                            <p>
                                Nomad提供了完善的登山體驗及服務，每項服務及產品都是團隊傾心設計。 我們把參加的隊員視為家人、朋友，把全體的安全放在第一。<br>
                                野外活動不是競技比賽也不是觀光遊覽，要掌握野外活動的安全，就須做好完善的準備，準備好再上山，也是對山林的一種尊重。<br>
                                我們善待任何生命，自我縮小，如此才有永續的野外世界。
                                每一滴落下的汗水、每一斤壓在肩上的負荷、甚或是差點要放棄時閃過的那絲念頭，都讓你我更加認識自己的渺小與不足，卻也更堅定那份親近山林的心。我們堅信，爬快不一定贏，走慢不一定輸，一步步踏出的足跡，不僅是勇敢堅毅的印記，更是自己給自己最大的肯定。<br>
                                現在就來去爬山吧，趁陽光正好、趁微風不噪，趁我們還擁有一顆不滅的爬山夢。

                            </p>

                        </div>
                        <!-- --------------web-------------- -->
                        <h2 class="title-2">關於我們</h2>
                        <div class="text-box text2">
                            <div class="box3 ">
                                <div class="logo">
                                    <img src="./img/logowhite.svg" alt="">
                                </div>
                                <div class=" boxinfo2">
                                    <p>Nomad提供了完善的登山體驗及服務，每項服務及產品都是團隊傾心設計。 我們把參加的隊員視為家人、朋友，把全體的安全放在第一。
                                        野外活動不是競技比賽也不是觀光遊覽，要掌握野外活動的安全，就須做好完善的準備，準備好再上山，也是對山林的一種尊重。
                                        我們善待任何生命，自我縮小，如此才有永續的野外世界。
                                    </p>
                                </div>
                            </div>
                            <div class="box3 ">

                                <div class=" boxinfo2">
                                    <p>每一滴落下的汗水、每一斤壓在肩上的負荷、甚或是差點要放棄時閃過的那絲念頭，都讓你我更加認識自己的渺小與不足，卻也更堅定那份親近山林的心。我們堅信，爬快不一定贏，走慢不一定輸，一步步踏出的足跡，不僅是勇敢堅毅的印記，更是自己給自己最大的肯定。

                                    </p>
                                </div>
                                <div class="about2">
                                    <img src="./img/about2.jpeg" alt="">
                                </div>
                            </div>

                            <div class="box3 ">
                                <div class="about3">
                                    <img src="./img/about3.jpeg" alt="">
                                </div>
                                <div class=" boxinfo2">
                                    <p>現在就來去爬山吧，趁陽光正好、趁微風不噪，趁我們還擁有一顆不滅的爬山夢。
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="rule">
                    <div class="card1 card3">
                        <h5 class="phone_title">體驗達人，啟動你的美好旅程</h5>
                        <h2 class="title-2">嚮導介紹</h2>

                        <div class="text-box text3">

                            <div id="content2">

                                <div class="imgboxleft ">
                                    <img src="./img/play1.jpg" alt="" width="100%" height="auto">
                                    <div class="guideinfo">
                                        <h5>嚮導：潔西卡</h5>
                                        <p>參與訓練：<br>
                                            教育部體育署 大專登山領隊訓練課程
                                            高雄星野登山社初嚮、中嚮訓練
                                            山林秘境高山嚮導訓練</p>
                                        <p>百岳:<br>
                                            玉山後四峰、武陵四秀、奇萊主北、大霸北稜、嘉明湖
                                            雪山翠池、奇萊南華......等高山百岳</p>
                                    </div>

                                </div>

                                <div class="imgboxleft">
                                    <img src="./img/play2.jpg" alt="" width="100%" height="auto">
                                    <div class="guideinfo">
                                        <h5>嚮導：莫莉</h5>
                                        <p>參與訓練：<br>
                                            中華山協高山嚮導訓練
                                            土城山協高山嚮導訓練
                                            紅十字會急救員
                                        </p>
                                        <p>百岳:<br>
                                            中央山脈北一段長程縱走 (七天)
                                            中央山脈南二段長程縱走(九天)
                                            奇萊主北+南湖群峰......等高山百岳
                                        </p>
                                    </div>
                                </div>
                                <div class="imgboxleft">
                                    <img src="./img/play3.jpg" alt="" width="100%" height="auto">
                                    <div class="guideinfo">
                                        <h5>嚮導：桑尼</h5>
                                        <p>參與訓練：<br>
                                            紅十字會急救員
                                            尼泊爾-喜馬拉雅山脈23天【Island Peak 海拔6,189公尺】冰攀訓練-成功登頂</p>
                                        <p>百岳:<br>
                                            玉山後四峰、
                                            大水窟山、奇萊主北、大霸北稜、
                                            中央尖山
                                            雪山翠池、奇萊南華......等高山百岳</p>
                                    </div>

                                </div>
                                <div class="imgboxleft">
                                    <img src="./img/play4.jpg" alt="" width="100%" height="auto">
                                    <div class="guideinfo">
                                        <h5>嚮導：ＪＪ</h5>
                                        <p>參與訓練：<br>
                                            教育部體育署 大專登山領隊訓練課程
                                            高雄星野登山社初嚮、中嚮訓練
                                            山林秘境高山嚮導訓練
                                        </p>
                                        <p>百岳:<br>
                                            馬利加南山、
                                            品田山、奇萊主北、大霸北稜、嘉明湖
                                            玉山後四峰、武陵四秀
                                            雪山翠池、奇萊南華......等高山百岳</p>
                                    </div>

                                </div>

                            </div>

                            <div class="imgboxright">
                                <div class="guideph">
                                    <img src="./img/play1.jpg" alt="" width="100%" height="auto">
                                    <img src="./img/play2.jpg" alt="" width="100%" height="auto">
                                    <img src="./img/play3.jpg" alt="" width="100%" height="auto">
                                    <img src="./img/play4.jpg" alt="" width="100%" height="auto">
                                </div>

                                <figure class="guideph2">
                                    <img src="./img/play1.jpg" alt="">
                                </figure>
                                <figure class="guideph2">
                                    <img src="./img/play2.jpg" alt="">
                                </figure>
                                <figure class="guideph2">
                                    <img src="./img/play3.jpg" alt="">
                                </figure>
                                <figure class="guideph2">
                                    <img src="./img/play4.jpg" alt="">
                                </figure>
                            </div>

                        </div>
                    </div>

                </div>

            </div>
        </div>
        <?php include __DIR__ . '/parts-php/html-fixedBar.php'; ?>
        <?php include __DIR__ . '/parts-php/html-footer.php'; ?>
        <div class="spaceForFixed-mobile"></div>
    </div>


    <?php include __DIR__ . '/parts-php/html-scripts.php'; ?>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
        integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
    </script>


    <script>
    $('#tab button').click(function(e) {
        let index = $(this).index();
        $('#content .rule.active').removeClass('active').fadeOut(function() {
            $('#content  .rule').eq(index).fadeIn().addClass('active');


        });
    });

    $('#content .rule').hide().first().show().addClass('active');



    $(window).scroll(function() {
        // console.log('scrollTop', $(this).scrollTop());
        let windowScrollTop = $(this).scrollTop();


        if (windowScrollTop > 0) {
            $('.about2').css('animation-name', 'about2')
            $('.about2').css('opacity', '.8');
        } else {
            $('.about2').css('animation-name', 'none');
        }

        if (windowScrollTop > 500) {
            $('.about3').css('animation-name', 'about3')
            $('.about3').css('opacity', '.8');
        } else {
            $('.about3').css('animation-name', 'none');
        }
    });
    </script>

    <script>
    $('.guideph2').click(function(e) {
        console.log('Yes');

        let index2 = $(this).index();
        console.log('index2', index2);

        $('.imgboxleft').removeClass('active').hide().eq(index2 - 1).show().addClass('active');
    });

    $('#content2 .imgboxleft').hide().first().show().addClass('active');
    console.log('no');



    $('.guideph img').click(function(e) {
        console.log('Yes');

        let index2 = $(this).index();
        console.log('index2', index2);

        $('.imgboxleft').removeClass('active').hide().eq(index2).show().addClass('active');
    });

    $('#content2 .imgboxleft').hide().first().show().addClass('active');
    </script>

    <script>
    $(window).scroll(function() {
        let scroll1 = $(window).scrollTop();
        // console.log('scrollTop', $(this).scrollTop());

        if (scroll1 > 200) {
            $('.layer1').css('transform', 'translateX(-30%)');

        } else {
            $('.layer1').css('transform', 'none');
        }

        if (scroll1 > 200) {
            $('.layer2').css('transform', 'translateX(40%)');

        } else {
            $('.layer2').css('transform', 'none');
        }
        if (scroll1 > 250) {
            $('.subject').animate({
                bottom: '28%'
            }, 100);
            $('.subject').css('animation-name', 'w1');
            $('.subject').css('opacity', '1');
        } else {
            $('.subject').animate({
                bottom: '-10%'
            }, 100);
        }
        if (scroll1 > 250) {
            $('.subject2').animate({
                bottom: '15%'
            }, 100);
            $('.subject2').css('animation-name', 'w2');
            $('.subject2').css('opacity', '1');
            $('.subject2').css('color', 'black');

        } else {
            $('.subject2').animate({
                bottom: '-10%'
            }, 200);
        }
    })
    </script>

    <!-- 控制桌機的return-to-top按鈕 -->
    <script>
    $(window).scroll(function() {
        if ($(this).scrollTop() >= 1000) {
            $('#return-to-top').fadeIn(200);
        } else {
            $('#return-to-top').fadeOut(200);
        }
    });
    $('#return-to-top').click(function() {
        $('body,html').animate({
            scrollTop: 800
        }, 500);
    });
    </script>

    <!-- 控制手機的return-to-top按鈕 -->
    <script>
    $(window).scroll(function() {
        if ($(this).scrollTop() >= 500) {
            $('#return-to-top1').fadeIn(500);
        } else {
            $('#return-to-top1').fadeOut(500);
        }
    });
    $('#return-to-top1').click(function() {
        $('body,html').animate({
            scrollTop: 0
        }, 500);
    });
    </script>

    <script src="./js/nomad.js"></script>
</body>

</html>