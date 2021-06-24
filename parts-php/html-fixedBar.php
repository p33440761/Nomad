<section class="fixed-section">
    <div class="homepage-container flex">
        <a href="./nomadHomePage.php">
            <div class="fixed-functions">
                <svg class="icon-homepage svg">
                    <use xlink:href="./icomoon/symbol-defs.svg#icon-homepage"></use>
                </svg>
            </div>
        </a>

        <?php if(isset($_SESSION['user'])): ?>
        <a href="./member.php#sec_02">
            <div class="fixed-functions">
                <svg class="icon-heart svg">
                    <use xlink:href="./icomoon/symbol-defs.svg#icon-heart-border"></use>
                </svg>
            </div>
        </a>
        <?php else: ?>
        <a href="./signUp.php">
            <div class="fixed-functions">
                <svg class="icon-heart svg">
                    <use xlink:href="./icomoon/symbol-defs.svg#icon-heart-border"></use>
                </svg>
            </div>
        </a>
        <?php endif; ?>

        <a href="./shopping-cart-1.php">
            <div class="fixed-functions">
                <svg class="icon-cart svg">
                    <use xlink:href="./icomoon/symbol-defs.svg#icon-cart"></use>
                </svg>
                <span class="nav-badge ff-airbnb">0</span>
            </div>
        </a>

        <?php if(isset($_SESSION['user'])): ?>
        <a href="./member.php">
            <div class="fixed-functions">
                <svg class="icon-user svg">
                    <use xlink:href="./icomoon/symbol-defs.svg#icon-user"></use>
                </svg>
            </div>
        </a>
        <?php else: ?>
        <a href="./signUp.php">
            <div class="fixed-functions">
                <svg class="icon-user svg">
                    <use xlink:href="./icomoon/symbol-defs.svg#icon-user"></use>
                </svg>
            </div>
        </a>
        <?php endif; ?>

    </div>
</section>