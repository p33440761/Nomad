<?php include __DIR__.'/parts-php/config.php';?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/note.css">
    <link rel="stylesheet" href="./css/nomadHomePage.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>登山須知</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" />
    <style>

    </style>
</head>

<body>
    <?php include __DIR__ . '/parts-php/html-navbar.php'; ?>

    <a href="javascript:" id="return-to-top" class="return-to-top"><svg
            style="position: absolute; width: 35px; height: 35px; fill: #ffffff42;margin: 7px; "
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

    <div class="blank"></div>


    <div class="mask">
        <div class="text-center">
            <h1 class="title">登山須知</h1>
            <div class="button-group col-12" id="tab">
                <button type="button" class="btn btn-outline-light ">必備裝備</button>
                <button type="button" class="btn btn-outline-light ">體能訓練</button>
                <button type="button" class="btn btn-outline-light ">關於高山症</button>
            </div>
            <div id="content">
                <div class="rule">
                    <h2 class="title-2">必備裝備</h2>
                    <div class="text-box text1">
                        <table>
                            <tr>
                                <th>品項</th>
                                <th>說明</th>
                                <th>數量</th>
                            </tr>
                            <tr>
                                <td>行進服裝</td>
                                <td>長袖排汗衣、運動長褲（快乾布料）、禁穿牛仔褲</td>
                                <td>1套</td>
                            </tr>

                            <tr>
                                <td>備用衣物</td>
                                <td>需帶長袖、長褲</td>
                                <td>1套</td>
                            </tr>
                            <tr>
                                <td>防風雨外套</td>
                                <td>建議防水透氣材質</td>
                                <td>1件</td>
                            </tr>
                            <tr>
                                <td>防風雨長褲</td>
                                <td>value</td>
                                <td>1件</td>
                            </tr>
                            <tr>
                                <td>中層保暖或防風衣</td>
                                <td>寒冷環境行進穿、建議快乾布料</td>
                                <td>1件</td>
                            </tr>
                            <tr>
                                <td>保暖外套</td>
                                <td>寒冷環境休息保暖、建議羽絨或類似保暖度材質</td>
                                <td>1件</td>
                            </tr>
                            <tr>
                                <td>保暖手套</td>
                                <td>夏季薄式、冬季厚式</td>
                                <td>1雙</td>
                            </tr>
                            <tr>
                                <td>保暖毛帽</td>
                                <td>羊毛或化纖材質</td>
                                <td>1頂</td>
                            </tr>
                            <tr>
                                <td>登山鞋</td>
                                <td>硬底、顆粒鞋底紋</td>
                                <td>1雙</td>
                            </tr>
                            <tr>
                                <td>登山毛襪</td>
                                <td>羊毛材質佳、筒長需高過鞋口</td>
                                <td>2雙</td>
                            </tr>
                            <tr>
                                <td>頭巾</td>
                                <td>當頭巾或脖圍</td>
                                <td>1件</td>
                            </tr>
                        </table>
                        <br>
                        <h6>
                            1 所有易濕裝備：衣物、睡袋在打包時一定要用防水袋或塑膠袋裝填以防潮溼。<br>
                            2 台灣高山入夜之後溫度在攝氏10度以下，請妥善作好保暖工作。<br>
                            3 山上水資源缺乏請珍惜用水，個人垃圾包含衛生紙與廚餘皆請帶下山。
                        </h6><br>
                        <hr>

                        <h4>配備</h4>
                        <table>
                            <tr>
                                <th>品項</th>
                                <th>說明</th>
                                <th>數量</th>
                            </tr>
                            <tr>
                                <td>中或大背包（含背包套）</td>
                                <td>依個人背長挑選背負系統，45升以上</td>
                                <td>1個</td>
                            </tr>
                            <tr>
                                <td>睡袋</td>
                                <td>0-10度保暖</td>
                                <td>1個</td>
                            </tr>
                            <tr>
                                <td>睡墊</td>
                                <td>泡棉或充氣式</td>
                                <td>1個</td>
                            </tr>
                            <tr>
                                <td>頭燈及備用電池</td>
                                <td>value</td>
                                <td>1附</td>
                            </tr>
                            <tr>
                                <td>水壺</td>
                                <td>耐熱塑膠壺、保溫水壺等共需1~2公升</td>
                                <td>1～2個</td>
                            </tr>
                            <tr>
                                <td>個人食器</td>
                                <td>碗、筷、叉匙</td>
                                <td>1附</td>
                            </tr>
                            <tr>
                                <td>登山杖</td>
                                <td>個人選擇攜帶</td>
                                <td>1~2支</td>
                            </tr>
                            <tr>
                                <td>個人醫藥</td>
                                <td>使用時需吿知嚮導</td>
                                <td>value</td>
                            </tr>
                            <tr>
                                <td>個人衛生用品</td>
                                <td>牙刷、手帕、衛生紙、防曬乳、護唇膏</td>
                                <td>適量</td>
                            </tr>
                            <tr>
                                <td>即食行動糧</td>
                                <td>一日150克~300克</td>
                                <td>適量</td>
                            </tr>
                            <tr>
                                <td>綁腿</td>
                                <td>雨天與雪期必備</td>
                                <td>1雙</td>
                            </tr>
                            <tr>
                                <td>地圖/指北針/電子定位設備</td>
                                <td>個人選擇攜帶</td>
                                <td> - </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="rule rule1">
                    <h2 class="title-2">體能訓練</h2>
                    <div class="text-box text2">
                        <p>
                            1. 正常作息，避免感冒或外傷。<br>
                            2. 登山最需要的是心肺功能運動與基本負重健行的肌力，登山前隊員透過規律的運動或戶外活動讓自己具備基本體能。<br>
                            <hr>
                        <h5>基本體能判斷參考,能完成以下活動強度</h5>

                        1. 持續跑步30分鐘以上或一次跑完3000公尺<br>

                        2. 能完成4小時、10公里以上單日郊山健行活動<br>

                        3. 可一次騎單車達20公里、全程60公里以上的騎程<br>

                        4. 運動心肺能維持心跳110下，達20分鐘以上<br>
                        </p>
                    </div>
                </div>

                <div class="rule rule2">
                    <h2 class="title-2">關於高山症</h2>
                    <div class="text-box  text3">
                        <h5>
                            你不能不知道的高山症 </h5>
                        <p>
                            台灣有上百座三千多公尺的高山，很多的山屋和營地也位於兩千四百公尺以上，其都是容易發生高山症的海拔高度。關於高山症，
                            第一次到高山過夜的人多少都會發生，它可能沒什麼要緊，只要身體適應高度，高山症狀就會改善，但它也有可能發展到威脅生命
                            的嚴重程度，過去有不少高山症致命的案例，都是因為活動間未提早察覺到高山症狀惡化，才拖延到非常嚴重。因此，每一位上高
                            山的朋友皆要去知道它，並在高山活動期間不要隱藏自己身體不適的情況，才能做到有效的防治。
                        </p><br>
                        <h5>
                            什麼是高山症
                        </h5>
                        <p>
                            當我們前往海拔高度超過2400公尺以上的地區(大氣壓力約只有在海平面70%)活動，因空氣變稀薄、溫度下降等等環境因素，身
                            體還沒完全或無法適應環境時，體內的血液和組織中的氧氣減少因而導致的水腫現象。基本上是在身體血氧飽和度於90%的時候。
                        </p><br>
                        <h5>
                            台灣常見的高山症主要有:</h5>
                        <p>
                            * 急性高山病(AMS，acute mountain sickness)<br>
                            * 高山腦水腫(HACE,high altitude cerebral edema)<br>
                            * 高山肺水腫(HAPE，high altitude pulmonary edema)
                        </p>
                        <hr>
                        <h5>
                            上山前可做的預防與處置
                        </h5>
                        <p>
                            1. 登山前睡眠充足，不要熬夜。<br>
                            2. 體能訓練，增加登山體能。<br>
                            3. 登山行程前三個月內，若到過高海拔地區有助於身體適應。<br>
                            4. 保持健康,不要感冒以及帶病上山。<br>
                            5. 上高海拔山區前一晚，若可在一、兩千公尺的地區住宿有助於高度適應。<br>
                        </p><br>
                        <h5>
                            登山時可做的預防與處置 </h5>
                        <p>
                            1. 在高海拔的任何症狀，請都先假定是高山病，直到證明是別的疾病為止。<br>
                            2. 當抵達高海拔區的4至48小時間，若出現身體不適就要監測是否出現高山症狀以及症狀的改變。<br>
                            3. 尤其在夜晚或是惡劣天候時，也常會使原來輕微的症狀轉壞。<br>
                            4. 向隊友與嚮導誠實告知身體狀況。<br>
                            5. 注意保溫，不要失溫。<br>
                            6. 多喝水，多攝取低脂高醣、高碳水化合物的食物。<br>
                            7. 不喝酒及不服用鎮定劑。<br>
                            8. 絕對不要讓有急性高山症與肺水腫徵兆的人單獨行動或留在營地，必需有人照顧與監測症狀。</p><br>

                        <h5>
                            Nomad的高山安全計畫</h5>
                        <p>
                            1. 將高度適應納入高山行程計畫中，不熬夜坐車上山，第一天行程不趕，讓隊員適應。<br>
                            2. 為第一次登高山隊員辦登山行前會，隊員登山前就能認識嚮導、了解行程，盡早準備。<br>
                            3. 基地營的隊伍皆由受過野外急救訓練的嚮導帶領。山上隊員狀況密切掌握。<br>
                            4. 我們不主張吃藥，也不鼓勵預防性投藥，身體自身的調整是最佳的高度適應。<br>
                            5. 將自己的體能準備好，深入且安全的高山活動由基地營為你準備。<br>
                        </p><br>
                        <h5>
                            高山醫學資料參考:</h5>
                        <p>
                            Wilderness and Rescue by Medicine Jeffrey E. Isaac,PA-C and David E.Johson,MD 米亞桑翻譯
                            高山病 APEX亞陞國際戶外發行
                            ​山野地區緊急救護 黃士豪
                        </p>

                    </div>
                </div>

            </div>

        </div>

    </div>


    <?php include __DIR__. '/parts-php/html-fixedBar.php'; ?>
    <?php include __DIR__. '/parts-php/html-scripts.php'; ?>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
        integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
    </script>

    <script>
    $('#tab button').click(function(e) {
        var index = $(this).index();
        $('#content  .rule.active').removeClass('active').fadeOut(function() {
            $('#content  .rule').eq(index).fadeIn().addClass('active');
        });
    });

    $('#content .rule').hide().first().show().addClass('active');
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
            scrollTop: 900
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
    <?php include __DIR__. '/parts-php/html-endingTag.php'; ?>