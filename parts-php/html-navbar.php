<?php if(empty($_SESSION['user']['profile_image'])){
        $img = 'default-placeholder.png';
    } else {
        $img = $_SESSION['user']['profile_image'];
    }

?>


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
                    <a href="./level_new.php">
                        <div class="navbar-item">
                            <img src="./images/navbar-icon/level_white.svg" alt="" />
                            <p class="text ff-noto">難度分級</p>
                        </div>
                    </a>
                    <a href="./notebook.php">
                        <div class="navbar-item">
                            <img src="./images/navbar-icon/blog.svg" alt="" />
                            <p class="text ff-noto">登山記事</p>
                        </div>
                    </a>
                    <a href="./note.php">
                        <div class="navbar-item">
                            <img src="./images/navbar-icon/notice.svg" alt="" />
                            <p class="text ff-noto">登山須知</p>
                        </div>
                    </a>
                    <a href="./weather.php">
                        <div class="navbar-item">
                            <img src="./images/navbar-icon/weather.svg" alt="" />
                            <p class="text ff-noto">天氣</p>
                        </div>
                    </a>
                    <a href="./product.php">
                        <div class="navbar-item">
                            <img src="./images/navbar-icon/product.svg" alt="" />
                            <p class="text ff-noto">商品</p>
                        </div>
                    </a>

                    <a href="./achievement.php">
                        <div class="navbar-item">
                            <img src="./images/navbar-icon/achivement.svg" alt="" />
                            <p class="text ff-noto">成就紀錄</p>
                        </div>
                    </a>
                    <a href="./activity-list.php">
                        <div class="navbar-item">
                            <img src="./images/navbar-icon/schedule.svg" alt="" />
                            <p class="text ff-noto">行程</p>
                        </div>
                    </a>
                    <a href="./info.php">
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
            <a href="./nomadHomePage.php">
                <img src="./icomoon/svg/icon-nomad-logo-white.svg" alt="">
            </a>
        </div>
        <div class="navbar-right flex">
            <a href="./shopping-cart-1.php">
                <div class="cart none">
                    <svg class="icon-cart svg">
                        <use xlink:href="./icomoon/symbol-defs.svg#icon-cart"></use>
                    </svg>
                    <span class="nav-badge ff-airbnb">0</span>
                </div>
            </a>
            <div class="user-icon flex none">
                <div class="left-box">

                    <?php if(isset($_SESSION['user'])) :?>
                    <?php if(! empty($_SESSION['user']['profile_image'])): ?>
                    <div class="user-account">
                        <img src="./images/<?= $img ?>">
                    </div>
                    <?php else: ?>
                    <a href="#">
                        <svg class="icon-account-user svg">
                            <use xlink:href="./icomoon/symbol-defs.svg#icon-account-user"></use>
                        </svg>
                    </a>
                    <?php endif; ?>
                    <!-- 新增dropdown選單 -->
                    <div class="dropDown-box">
                        <ul>
                            <a href="./member.php">
                                <li>
                                    <svg class="icon-profile svg">
                                        <use xlink:href="./icomoon/symbol-defs.svg#icon-profile"></use>
                                    </svg>
                                    <span class="text ff-noto">帳號資訊</span>
                                </li>
                            </a>
                            <a href="./member.php#sec_02">
                                <li>
                                    <svg class="icon-heart svg">
                                        <use xlink:href="./icomoon/symbol-defs.svg#icon-heart"></use>
                                    </svg>
                                    <span class="text ff-noto">我的最愛</span>
                                </li>
                            </a>
                            <a href="./achievement.php">
                                <li>
                                    <svg class="icon-trophy svg">
                                        <use xlink:href="./icomoon/symbol-defs.svg#icon-trophy"></use>
                                    </svg>
                                    <span class="text ff-noto">成就紀錄</span>
                                </li>
                            </a>
                            <a href="./member.php#sec_04">
                                <li>
                                    <svg class="icon-history svg">
                                        <use xlink:href="./icomoon/symbol-defs.svg#icon-history"></use>
                                    </svg>
                                    <span class="text ff-noto">購買紀錄</span>
                                </li>
                            </a>
                            <a href="logout.php">
                                <li class="logout">
                                    <p class="text ff-noto">登出</p>
                                </li>
                            </a>
                        </ul>
                    </div>
                    <?php else: ?>
                    <a href="./signUp.php">
                        <svg class="icon-account-user svg">
                            <use xlink:href="./icomoon/symbol-defs.svg#icon-account-user"></use>
                        </svg>
                    </a>
                    <?php endif; ?>
                </div>
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
                    <a href="./info.php">
                        <li class="nav-item flex">
                            <p class="ff-noto">官方資訊</p>
                            <svg class="icon-arrow-forward svg">
                                <use xlink:href="./icomoon/symbol-defs.svg#icon-arrow_forward_ios"></use>
                            </svg>
                        </li>
                    </a>
                    <a href="./activity-list.php">
                        <li class="nav-item flex">
                            <p class="ff-noto">行程</p>
                            <svg class="icon-arrow-forward svg">
                                <use xlink:href="./icomoon/symbol-defs.svg#icon-arrow_forward_ios"></use>
                            </svg>
                        </li>
                    </a>
                    <a href="./product.php">
                        <li class="nav-item flex">
                            <p class="ff-noto">商品</p>
                            <svg class="icon-arrow-forward svg">
                                <use xlink:href="./icomoon/symbol-defs.svg#icon-arrow_forward_ios"></use>
                            </svg>
                        </li>
                    </a>
                    <a href="./achievement.php">
                        <li class="nav-item flex">
                            <p class="ff-noto">成就紀錄</p>
                            <svg class="icon-arrow-forward svg">
                                <use xlink:href="./icomoon/symbol-defs.svg#icon-arrow_forward_ios"></use>
                            </svg>
                        </li>
                    </a>
                    <a href="./notebook.php">
                        <li class="nav-item flex">
                            <p class="ff-noto">登山記事</p>
                            <svg class="icon-arrow-forward svg">
                                <use xlink:href="./icomoon/symbol-defs.svg#icon-arrow_forward_ios"></use>
                            </svg>
                        </li>
                    </a>
                    <a href="./level_new.php">
                        <li class="nav-item flex">
                            <p class="ff-noto">難度分級</p>
                            <svg class="icon-arrow-forward svg">
                                <use xlink:href="./icomoon/symbol-defs.svg#icon-arrow_forward_ios"></use>
                            </svg>
                        </li>
                    </a>
                    <a href="./weather.php">
                        <li class="nav-item flex">
                            <p class="ff-noto">天氣</p>
                            <svg class="icon-arrow-forward svg">
                                <use xlink:href="./icomoon/symbol-defs.svg#icon-arrow_forward_ios"></use>
                            </svg>
                        </li>
                    </a>
                    <a href="./note.php">
                        <li class="nav-item flex">
                            <p class="ff-noto">登山須知</p>
                            <svg class="icon-arrow-forward svg">
                                <use xlink:href="./icomoon/symbol-defs.svg#icon-arrow_forward_ios"></use>
                            </svg>
                        </li>
                    </a>
                    <?php if(isset($_SESSION['user'])) :?>
                    <a href="./member.php">
                        <div class="user-account">
                            <img src="./images/<?= $img ?>">
                        </div>
                    </a>
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