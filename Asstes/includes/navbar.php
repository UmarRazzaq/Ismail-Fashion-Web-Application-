<nav>
    <div class="container nav-wrapper">
        <div class="menu-search">
            <div class="menu">
                <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="menuBar()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                    </svg>
                </a>
            </div>
            <div class="searches">
                <div class="search-icon">
                    <a href="#" onclick="openSearch()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                    </a>
                </div>
                <div class="search-box overlay" id="search">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeSearch()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="46" height="46" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                        </svg>
                    </a>
                    <form method="post" action="search.php">
                        <div class="overlay-content">
                            <div class="center">
                                <svg style="display: none;" id="search_icon" xmlns="http://www.w3.org/2000/svg" width="25px" height="25px" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                </svg>
                                <input type="text" id="search-box" name="keyword" placeholder="Type here to search..">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="brand">
            <a href="index.php">
                <!-- <img src="images/logo1.png"> -->
                 NR Fashion's
            </a>
        </div>
        <div class="acc-cart">
            <div class="account">
                <?php if (isset($_SESSION['userID'])):?>
                    <a href="account.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-user" viewBox="0 0 16 16">
                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                        </svg>
                    </a>
                <?php else: ?>
                    <a href="login.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-user" viewBox="0 0 16 16">
                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                        </svg>
                    </a>
                <?php endif; ?>
            </div>
            <div class="cart">
                <a href="item_view.php">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
                    </svg>
                    <?php
                        if (isset($_SESSION['cart'])){
                            $count = count($_SESSION['cart']);
                            echo "<span id='cart_count'>$count</span>";
                        }else{
                            echo "<span id='cart_count'>0</span>";
                        }
                    ?>
                </a>
            </div>
        </div>
    </div>
</nav>
<div class="topnav" id="myTopnav">
    <a href="index.php"><span>Home</span></a>
<!--    <a href="eid.php"><span>Eid Collection'21</span></a>-->
    <div class="dropdown">
        <button class="dropbtn" onclick="window.location.href='ladies.php';"><span>Ladies Unstitched</span></button>
        <div class="dropdown-content">
            <a href="lawn.php"><span>Lawn</span></a>
            <a href="swiss.php"><span>Swiss</span></a>
            <a href="print.php"><span>Print</span></a>
            <a href="formal.php"><span>Formal</span></a>
            <a href="bridal.php"><span>Bridal</span></a>
            <a href="party_wear.php"><span>Party Wear</span></a>
            <a href="ladies.php" class="active1"><span>View all</span></a>
        </div>
    </div>
    <div class="dropdown">
        <button class="dropbtn" onclick="window.location.href='gents.php';"><span>Gents Unstitched</span></button>
        <div class="dropdown-content">
            <a href="cotton.php"><span>Cotton</span></a>
            <a href="wash_&_wear.php"><span>Wash & Wear</span></a>
            <a href="embroidery.php"><span>Embroidery</span></a>
            <a href="kurta.php"><span>Kurta</span></a>
            <a href="gents.php" class="active1"><span>View all</span></a>
        </div>
    </div>
    <a href="about.php"><span>FAQs</span></a>
    <a href="about.php"><span>Contact</span></a>
</div>