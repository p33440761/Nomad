
<section id="fixed-section" class="fixed-section">
    <div id="homepage-container" class="homepage-container flex">
        <div class="fixed-functions">
            <p class="text ff-noto"><span class="num ff-airbnb">$<?= $row['price'] ?></span> / 人 </p>
        </div>


        <div id="buyNowBtn" class="fixed-functions">
            <p class="text btn ff-noto">立即報名</p>
        </div>


            <a href="./shopping-cart-1.php">
                <div class="fixed-functions">
                    <p class="text btn ff-noto">加入購物車</p>
                </div>
            </a>
    </div>


    <section id="buy-now-section" class="buy-now-section">
        <div class="container">
            <div class="backward">
                <svg id="icon-cross" class="icon-cross svg">
                    <use xlink:href="./icomoon/symbol-defs.svg#icon-cross"></use>
                </svg>
            </div>
            <div class="activity-info flex">
                <div class="leftBox"></div>
                <div class="rightBox">
                    <p class="title ff-noto">嘉明湖</p>
                    <p class="text ff-noto">TWD <span class="num ff-airbnb">6,300</span> / 人</p>
                    <svg class="icon-heart svg none">
                        <use xlink:href="./icomoon/symbol-defs.svg#icon-heart"></use>
                    </svg>
                </div>
            </div>
            <div class="boxes">
                <div class="select-box flex">
                    <p class="text ff-noto">日期</p>
                    <select name="date" id="date" class="ff-airbnb">
                        <option value="1">7/3(六)-7/4(四)</option>
                        <option value="2">7/13(二)-7/14(三)</option>
                        <option value="3">7/17(日)-7/18(一)</option>
                        <option value="4">7/20(二)-7/21(三)</option>
                    </select>
                </div>
                <div class="select-box flex">
                    <p class="text ff-noto">人數</p>
                    <select name="num" id="num" class="ff-airbnb" style="padding-right:4rem;">
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
                <span class="text ff-noto none">瀏覽</span>
            </div>

            <div class="notes">

                <div class="box none">
                    <svg class="icon-warning svg">
                        <use xlink:href="./icomoon/symbol-defs.svg#icon-warning"></use>
                    </svg>
                    <span class="text ff-noto">報名前，請務必詳閱<u>報名規則</u></span>
                </div>

                <div class="box none">
                    <svg class="icon-warning svg">
                        <use xlink:href="./icomoon/symbol-defs.svg#icon-warning"></use>
                    </svg>
                    <span class="text ff-noto">費用已包含<u>保險</u></span>
                </div>
            </div>

            <div class="price none">
                <p class="text ff-airbnb">NTD <span class="num ff-airbnb">6,300</span> / 人</p>
            </div>

            <div class="buy-btns flex">
                <a href=""></a>
                    <div class="sign-up-cta ff-noto">立即報名</div>
                </a>
                <a href="./shopping-cart-1.php">
                    <div class="sign-up-cta ff-noto none">加入購物車</div>
                </a>
            </div>

        </div>
    </section>
</section>