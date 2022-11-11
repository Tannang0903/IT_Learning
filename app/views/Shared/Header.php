<header id="header">
    <div class="grid wide">
        <div class="row">
            <div class="header__content">
                <ul class="header__list">
                    <li class="header__img">
                        <a href="" class="header__item-link">
                            <img src="<?php
                                echo ROOT."/public/images/logo.png";
                            ?>" alt="" class="header__logo">
                        </a>
                    </li>
                    <li class="header__item">
                        <a href="" class="header__item-link">
                            <i class="header__item-icon fa-solid fa-book"></i>
                            <p class="header__item-title">Bài tập</p>
                        </a>
                    </li>
                    <li class="header__item">
                        <a href="" class="header__item-link">
                            <i class="header__item-icon fa-solid fa-trophy"></i>
                            <p class="header__item-title">Kỳ thi</p>
                        </a>
                    </li>
                    <li class="header__item">
                        <a href="" class="header__item-link">
                            <i class="header__item-icon fa-solid fa-cloud-arrow-up"></i>
                            <p class="header__item-title">Bài nộp</p>
                        </a>
                    </li>
                    <li class="header__item">
                        <a href="" class="header__item-link">
                            <i class="header__item-icon fa-solid fa-ranking-star"></i>
                            <p class="header__item-title">Xếp hạng</p>
                            <i class="header__item-icon fa-solid fa-angle-down"></i>
                        </a>
                        <!-- Header sublist -->
                        <ul class="header__subList">
                            <li class="header__subItem">
                                <a href="" class="header__subItem-link">ACM Rank</a>
                            </li>
                            <li class="header__subItem">
                                <a href="" class="header__subItem-link">OI Rank</a>
                            </li>
                            <li class="header__subItem">
                                <a href="" class="header__subItem-link">Experience Rank</a>
                            </li>
                        </ul>
                    </li>
                    <li class="header__item">
                        <a href="" class="header__item-link">
                            <i class="header__item-icon fa-solid fa-bolt-lightning"></i>
                            <p class="header__item-title">Live IDE</p>
                        </a>
                    </li>
                </ul>
                <?php
                    if (isset($user)) {
                        echo '
                            <div class="header__user">
                                <span class="header__user-name">'.$user['Username'].'
                                    <i class="header__item-icon fa-solid fa-angle-down"></i>
                                </span>
                                <ul class="header__user-info">
                                    <li class="header__user-info-item">
                                        <a href="" class="header__user-link">Hồ sơ</a>
                                    </li>
                                    <li class="header__user-info-item">
                                        <a href="" class="header__user-link">Bài nộp</a>
                                    </li>
                                    <li class="header__user-info-item">
                                        <a href="" class="header__user-link">Cài đặt</a>
                                    </li>
                                    <li class="header__user-info-item">
                                        <a href="" class="header__user-link">Đăng xuất</a>
                                    </li>
                                </ul>
                            </div>
                        ';
                    }else{
                        echo '
                        <ul class="header__menu">
                            <li class="header__menu-item" id="login">Đăng nhập</li>
                            <li class="header__menu-item" id="register">Đăng ký</li>
                        </ul>
                        ';
                    }
                ?>

                <!-- Header User -->
            </div>
        </div>
    </div>
</header>