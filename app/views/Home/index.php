<div class="container">
    <div class="grid wide">
        <?php
        if (isset($user)) {
            echo '
                        <section class="wrap-block-user home-section">
                                <div class="container_header">
                                    <div class="wrap-main-user-profile row">
                                        <div class="col c-8">
                                            <div class="main-user-info">
                                                <div class="header-main-user-info">
                                                    <div class="user-avatar">
                                                        <img class="img-user" src="' . $this->image('default_avatar.png') . '">
                                                    </div>
                                                    <div class="content-main-user-info">
                                                        <h3 class="user-name">' . $user['Username'] . '</h3>
                                                        <p class="main-user-des">
                                                            '.$user['School'].'
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col c-4">
                                            <div class="wrap-detail-user-progress">
                                                <h4 class="textExercise">Luyện tập</h4>
                                                <div class="detail-progress-content">
                                                    <span class="result">'.$problem_solved.'/'.$problem_count.'</span>
                                                </div>
                                                <div class="item-progress-bar">
                                                    <span class="current-progress" style="width: '.($problem_solved * 100) / $problem_count.'%;"></span>
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
                    <div class="nice-select left" tabindex="0">
                        <span class="current">Độ khó</span>
                        <ul class="list">
                            <li data-value="Nothing" data-display="Tất cả" class="option">Tất cả</li>
                            <li data-value="easy" class="option">Dễ</li>
                            <li data-value="medium" class="option">Trung bình</li>
                            <li data-value="hard" class="option">Khó</li>
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
                                <div class="col c-6">
                                    <div class="problem__card">
                                        <div class="col c-9 problem__info">
                                            <div class="col c-4 problem__user">
                                                <img class="problem__user_image" src="' . $problem -> getAuthor() -> getAvatar() . '" />
                                                <strong class="problem__user_name">' . $problem->getAuthor()->getUsername() . '</strong>
                                            </div>
                                            <div class="col c-8 problem__detail">
                                                <a href="'.$this -> url('problem', 'index', $problem -> getId()).'" class="problem__detail_heading">' . $problem->getName() . '</a>
                                                <p class="problem__detail_level">Độ khó: ' . $problem->getStrLevel() . '</p>
                                                <p class="problem__detail_description">' . $problem-> getDescription(). '</p>
                                            </div>
                                        </div>
                                        <div class="col c-3 problem__statistic">
                                            <div class="single-chart">
                                                <svg viewBox="0 0 36 36" class="circular-chart green">
                                                    <path class="circle-bg" d="M18 2.0845a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                                                    <path class="circle" stroke-dasharray="90, 100" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                                                    <text x="19.7" y="21.5" class="percentage">90%</text>
                                                </svg>
                                            </div>
                                            <a class="problem__do" href="">Làm ngay</a>
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