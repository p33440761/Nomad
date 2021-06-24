<?php include __DIR__ . '/parts-php/config.php'; ?>
<?php
$m_sql = "SELECT * FROM mountain_level ORDER BY RAND() LIMIT 3";
$m_stmt = $pdo->query($m_sql);
$m_rows = $m_stmt->fetchAll();



$c_sql = "SELECT * FROM `members` JOIN `stars` ON stars.member_id = members.id ORDER BY RAND() LIMIT 8";
$c_stmt = $pdo->query($c_sql);
$c_rows = $c_stmt->fetchAll();



?>
<?php include __DIR__ . '/parts-php/html-header.php'; ?>
<?php include __DIR__ . '/parts-php/html-navbar.php'; ?>

<section class="hero-section">
    <div class="container">
        <div class="hero-image">
            <p class="slogan ff-raleway">
                No matter what,
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<br />
                We do.
            </p>
        </div>
    </div>
</section>

<section class="news-section">
    <div class="container">
        <h2 class="title ff-raleway">最新消息</h2>
        <ul class="flex">
            <!-- PHP包住從資料庫抓取資料 -->
            <li class="newsbox mb-1">
                <div class="newsbox-img">
                    <img src="./images/北大武山-4.jpeg" alt="" />
                </div>
                <h3 class="title ff-noto">北大武山</h3>
                <div class="date ff-raleway">2020/08/06</div>
                <p class="newsbox-text ff-noto">
                    前往北大武山享受登山樂趣，以落日、雲海、鐵杉、
                    檜木聞名，是極受山友喜愛的名山，山勢為百岳五嶽之一，名列台灣百岳No.92，前往北大武山享受登山樂趣，以落日、雲海、鐵杉、
                    檜木聞名，是極受山友喜愛的名山，山勢為百岳五嶽之一，名列台灣百岳No.9，
                </p>
            </li>
            <!-- PHP包住從資料庫抓取資料 -->

            <!-- PHP包住從資料庫抓取資料 -->
            <li class="newsbox mb-1 none">
                <div class="newsbox-img">
                    <img src="./images/玉山地景.jpg" alt="" />
                </div>
                <h3 class="title ff-noto">玉山</h3>
                <div class="date ff-raleway">2020/08/06</div>
                <p class="newsbox-text ff-noto">
                    前往玉山享受登山樂趣，以落日、雲海、鐵杉、
                    檜木聞名，是極受山友喜愛的名山，山勢為百岳五嶽之一，名列台灣百岳No.1
                    前往玉山享受登山樂趣，以落日、雲海、鐵杉、
                    檜木聞名，是極受山友喜愛的名山，山勢為百岳五嶽之一，名列台灣百岳No.1
                </p>
            </li>
            <!-- PHP包住從資料庫抓取資料 -->

            <!-- PHP包住從資料庫抓取資料 -->
            <li class="newsbox mb-1 none">
                <div class="newsbox-img">
                    <img src="./images/雪山大圖2-banner.jpeg" alt="" />
                </div>
                <h3 class="title ff-noto">雪山</h3>
                <div class="date ff-raleway">2020/08/06</div>
                <p class="newsbox-text ff-noto">
                    前往雪山享受登山樂趣，以落日、雲海、鐵杉、
                    檜木聞名，是極受山友喜愛的名山，山勢為百岳五嶽之一，名列台灣百岳No.3前往雪山享受登山樂趣，以落日、雲海、鐵杉、
                    檜木聞名，是極受山友喜愛的名山，山勢為百岳五嶽之一，名列台灣百岳No.3
                </p>
            </li>
            <!-- PHP包住從資料庫抓取資料 -->
        </ul>
        <a href="info.php">
            <div class="readmore-cta ff-noto">觀看更多</div>
        </a>
    </div>
</section>

<section class="explore-section">
    <div class="explore-banner-image none"></div>
    <div class="container">
        <h2 class="title ff-raleway">讓探索變得更容易</h2>
        <!-- Carousel php帶入-->
        <div class="main-carousel flex">
            <?php foreach ($m_rows as $m):?>
            <div class="carousel-cell-d">
                <img src="./images/<?= $m['img1_mountain'] ?>/<?= $m['img1_mountain'] ?>.jpeg">
                <div class="cover">
                    <p class="title ff-noto"><?= $m['main_mountain'] ?></p>
                    <br>
                    <p class="mountain-info">
                        <?= $m['info1'] ?>
                    </p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="carousel-none">
            <div class="carousel" data-flickity='{ "wrapAround": true }'>
                <?php foreach ($m_rows as $m):?>
                <div class="carousel-cell">
                    <img src="./images/<?= $m['img1_mountain'] ?>/<?= $m['img1_mountain'] ?>.jpeg">
                    <div class="cover">
                        <p class="title ff-noto"><?= $m['main_mountain'] ?></p>
                        <br>
                        <p class="mountain-info">
                            <?= $m['info1'] ?>
                        </p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <h3 class="title ff-noto">找到一條你最愛的步道</h3>
        <p class="text ff-noto">
            不管你在家中、還是正在路上找到一條完美的單車道、登山小徑、健行步道，藉由難度、評價篩選，讓他更貼近你與你的家人
        </p>

        <!-- Carousel php帶入-->
        <a href="activity-list.php">
            <div class="explore-section-cta ff-noto">立刻出發</div>
        </a>
    </div>
</section>

<section class="detail-section">
    <div class="detail-banner-image"></div>
    <div class="container">
        <h1 class="title ff-raleway none">
            消除計畫中的不確定性
        </h1>

        <h2 class="title ff-raleway">出發前<br />了解所有細節</h2>
        <p class="title-text ff-noto">
            透過每位熱心的探險家、登山山友、健行遠足的人們提供的評論與建議，讓你更了解這趟行程
        </p>

        <div class="detail-card flex">
            <div class="weather flex mb-2">
                <div class="weather-img none"></div>
                <div class="left-section">
                    <h4 class="title ff-noto">查看天氣狀況</h4>
                    <p class="text ff-noto">
                        千萬別在錯的時間發出<br />只要一個點擊，完整呈現山路資訊
                    </p>
                </div>
                <div class="right-section">
                    <svg class="icon-globe svg">
                        <use xlink:href="./icomoon/symbol-defs.svg#icon-globe"></use>
                    </svg>
                </div>
            </div>
            <div class="favor-list flex mb-2">
                <div class="favor-list-img none"></div>
                <div class="left-section">
                    <h4 class="title ff-noto">加進你的最愛</h4>
                    <p class="text ff-noto">
                        擁有一個等待著你去探索的清單<br />讓這些靈感激發你，前往下一次冒險
                    </p>
                </div>
                <div class="right-section">
                    <svg class="icon-heart svg">
                        <use xlink:href="./icomoon/symbol-defs.svg#icon-heart-border"></use>
                    </svg>
                </div>
            </div>
        </div>
        <a href="level_new.php">
            <div class="detail-section-cta ff-noto">難度分級</div>
        </a>
    </div>
</section>

<section class="achievement-section">
    <div class="achievement-banner-image"></div>
    <div class="container">
        <h1 class="title ff-raleway none">與朋友分享你的成就</h1>
        <h2 class="title ff-raleway">將你的成就，分享出去</h2>
        <div class="achievement-card">
            <div class="topBox flex">
                <div class="topBox-left">
                    <p class="number ff-raleway">15</p>
                    <p class="text ff-noto">已獲得</p>
                </div>
                <div class="topBox-middle">
                    <p class="percentage ff-raleway">62%</p>
                </div>
                <div class="topBox-right">
                    <p class="number ff-raleway">20</p>
                    <p class="text ff-noto">可獲得</p>
                </div>
            </div>
            <div class="bottomBox flex">
                <div class="img img1">
                    <img src="./images/ps5-platinum-trophy.png" alt="" />
                </div>
                <div class="img img2">
                    <img src="./images/ps5-gold-trophy.png" alt="" />
                </div>
                <div class="img img3">
                    <img src="./images/ps5-silver-trophy.png" alt="" />
                </div>
                <div class="img img4">
                    <img src="./images/ps5-bronze-trophy.png" alt="" />
                </div>
            </div>
            <div class="number flex">
                <p class="number ff-raleway">2</p>
                <p class="number ff-raleway">5</p>
                <p class="number ff-raleway ">10</p>
                <p class="number ff-raleway number15" style="margin-right: -13px;">15</p>
            </div>
        </div>
        <p class="title-text ff-noto">
            將每一條走過的路記錄下來、分享出去，並且跟你周圍的朋友分享，讓熱情持續在路上照耀著下一位探險者
        </p>
        <a href="achievement.php">
            <div class="achievement-section-cta ff-noto">創建成就</div>
        </a>
    </div>
</section>

<section class="comment-section">
    <div class="comment-banner-image"></div>
    <div class="container">
        <h2 class="title ff-raleway">加入超過100,000名<br />探險者的戶外社群</h2>
        <a href="notebook.php">
            <h3 class="title ff-noto none">瀏覽登山記事</h3>
        </a>
        <div class="comments">
            <div class="carousel" data-flickity='{ "wrapAround": true }'>
                <?php foreach($c_rows as $c): ?>
                <div class="comment-card carousel-cell">
                    <svg class="icon-message svg">
                        <use xlink:href="./icomoon/symbol-defs.svg#icon-message"></use>
                    </svg>
                    <p class="title-text ff-noto">
                        <?= $c['rateMsg'] ?>
                    </p>
                    <div class="user-info-box flex">
                        <div class="left-box">
                            <img src="<?= WEB_ROOT?>/images/<?=$c['profile_image']?>" alt="">
                        </div>
                        <div class="right-box">
                            <p class="text-name ff-noto"><?= $c['nickname'] ?></p>
                            <p class="text-city ff-raleway"><?= date("Y/m/d", strtotime($c['date'])) ?></p>
                            <p class="rank">
                                <svg class="icon-star svg">
                                    <use xlink:href="./icomoon/symbol-defs.svg#icon-star "></use>
                                </svg>
                                <span class="num ff-raleway"
                                    style="vertical-align: middle;"><?= $c['ratedIndex'] ?></span>
                            </p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <a href="notebook.php">
            <div class="comment-section-cta ff-noto">瀏覽登山記事</div>
        </a>
    </div>
</section>

<?php include __DIR__ . '/parts-php/html-footer.php'; ?>
<?php include __DIR__ . '/parts-php/html-fixedBar.php'; ?>
<?php include __DIR__ . '/parts-php/html-scripts.php'; ?>
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
<?php include __DIR__ . '/parts-php/html-endingTag.php'; ?>