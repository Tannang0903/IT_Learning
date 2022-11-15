<div class="container">
    <div class="grid wide">
        <?php
        if (isset($user)) {
            echo '
                        <section class="wrap-block-user home-section">
                                <div class="container_header">
                                    <div class="wrap-main-user-profile row">
                                        <div class="col-xs-12 col-md-4">
                                            <div class="main-user-info">
                                                <div class="header-main-user-info">
                                                    <div class="user-avatar">
                                                        <!-- <img alt="Cấp độ 6" class="level-avatar"
                                                                src="/a.jpg"> -->
                                                        <img class="img-user" src="' . $this->image('default_avatar.png') . '">
                                                    </div>
                                                    <div class="content-main-user-info">
                                                        <h3 class="user-name">' . $user['Username'] . '</h3>
                                                        <p class="main-user-des">
                                                            '.$user['School'].'
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="user-progress-block">
                                                    <span class="user-exp">917.00 EXP</span>
                                                    <span class="user-next-level">
                                                    </span>
                                                    <div class="user-progress-bar">
                                                        <span class="current-progress" style="width: '.($problem_solved * 100) / $problem_count.'%;"></span>
                                                    </div>
                                                    <div class="level-progress">
                                                        <span class="current-level">Cấp độ 6</span>
                                                        <span class="current-progress-level">116/400</span>
                                                        <span class="next-level">Cấp độ 7</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-md-8">
                                            <div class="wrap-detail-user-progress">
                                                <div class="row">
                                                    <div class="col-xs-12 col-sm-4 detail-progress-item">
                                                        <h4>Luyện tập</h4>
                                                        <div class="detail-progress-content">
                                                            <span class="result">'.$problem_solved.'/'.$problem_count.'</span>
                                                        </div>
                                                        <div class="item-progress-bar">
                                                            <span class="current-progress" style="width: '.($problem_solved * 100) / $problem_count.'%;"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-4 detail-progress-item">
                                                        <h4>Thứ hạng tốt nhất</h4>
                                                        <div class="detail-progress-content">
                                                            <span class="result">0/0<span class="result-des">cuộc thi</span></span>
                                                        </div>
                                                        <div class="item-progress-bar">
                                                            <span class="current-progress" style="width:0%;"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="reward-block">
                                                    <h4 class="title-reward-block"><a href="/user-badges/4770603" style="color:black;text-decoration:none">Thành tích của bạn<i class="cl-icon-angle-right"></i></a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        ';
        }
        ?>

        <div class="home_main">
            <div class="container__problem-search">
                <div class="container__problem-search-action">
                    <div class="container__problem-level">
                        <span class="container__problem-level-text">Độ khó</span>
                        <i class="fa-solid fa-angle-down"></i>
                        <ul class="container__problem-subLevel">
                            <li class="container__problem-subLevel-item">Tất cả</li>
                            <li class="container__problem-subLevel-item">Dễ</li>
                            <li class="container__problem-subLevel-item">Trung bình</li>
                            <li class="container__problem-subLevel-item">Khó</li>
                        </ul>
                    </div>
                    <form action="" class="container__problem-form-search">
                        <input type="text" class="container__problem-form-input" placeholder="Tìm kiếm">
                        <i class="container__problem-form-icon fa-solid fa-magnifying-glass"></i>
                    </form>
                </div>
            </div>
            <div class="container__problem-body">
                <div class="row">
                    <?php
                    foreach ($problems as $problem) {
                        echo '
                                <div class="col c-3">
                                    <div class="container__user-item">
                                        <div class="container__user-item-task">
                                            <a href="'.$this -> url('problem', 'index', $problem -> getId()).'" class="container__user-item-nameEx">' . $problem->getName() . '</a>
                                            <span class="container__user-item-level-easy">' . $problem->getStrLevel() . '</span>
                                        </div>
                                        <div class="containerr__user-item-avatar">
                                            <img src="' . $problem -> getAuthor() -> getAvatar() . '" alt="" class="containerr__user-item-avatar-rim">
                                        </div>
                                        <a href="" class="containerr__user-item-owner">' . $problem->getAuthor()->getUsername() . '</a>
            
                                        <div class="container__user-item-info">
                                            <div class="container__user-item-content">
                                                <i class="container__user-item-icon fa-solid fa-user-group"></i>
                                                <span class="containe__user-item-text">' . $problem->getSuccessSubmit() . '/' . $problem->getTotalSubmit() . '</span>
                                            </div>
                                            <div class="container__user-item-content">
                                                <i class="container__user-item-icon fa-regular fa-comment-dots"></i>
                                                <span class="container__user-item-text">80</span>
                                            </div>
                                            <div class="container__user-item-content">
                                                <i class="container__user-item-icon fa-regular fa-heart"></i>
                                                <span class="container__user-item-text">100</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>                            
                            ';
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="home_footer">
            <div class="container_footer">
                <div class="container__container__footer">
                    <div class="title_rank color_title_rank">
                        <h2 class="title_detail">
                            Bảng xếp hạng
                        </h2>
                        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                        <lottie-player src="https://assets1.lottiefiles.com/packages/lf20_d6ZJ8R.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop autoplay></lottie-player>
                        <div class="font-size--16 mb--50">
                            Bảng xếp hạng học viên theo top Luyencode
                        </div>
                    </div>
                    <div class="ant-row" style="margin-left: -16px; row-gap: 32px;">
                        <div style="padding-left: 16px; padding-right: 16px;" class="ant-col ant-col-24 ant-col-order-1 ant-col-md-6 ant-col-md-order-2">
                            <div class="detial_user">
                                <div class="detail_user_component">
                                    <div class="component" style="height:auto;overflow:auto;-webkit-overflow-scrolling:touch">
                                        <?php
                                            $count = 1;
                                            foreach ($rank as $userInfo) {
                                                echo '
                                                    <div class="detail_user_info">
                                                        <div class="w--40 font-size--20 text-align--right mr--14">'.$count.'</div>
                                                        <div class="display--flex justify-content--spaceBetween w--full align-items--center">
                                                            <div style="flex: 2 1 0%;">
                                                                <span class="ant-avatar ant-avatar-circle ant-avatar-image ml--12 mr--16" style="width: 32px; height: 32px; line-height: 32px; font-size: 18px;">
                                                                    <img src="'.$this->image('default_avatar.png').'" alt="" style="object-fit: cover; width: 100%; height: 100%">
                                                                </span>
                                                                <span class="font-size--14">'.$userInfo -> getUsername().'</span>
                                                            </div>
                                                            <div class="font-size--14" style="flex: 1.5 1 0%">'.$userInfo -> getEmail().'</div>
                                                            <div class="font-size--18 text-align--right color--functional-success-500" style="flex: 1 1 0%;">'.$userInfo -> getScore().'</div>
                                                        </div>
                                                    </div>
                                                ';
                                                $count++;
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>