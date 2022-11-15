<!-- Container -->
<div class="container">
    <!-- Container Problem -->
    <div class="container__problem">
        <div class="grid wide">
            <div class="container__problem-header">
                <div class="row">
                    <div class="col c-9">
                        <div class="container__statistic">
                            <img src=<?php echo $this -> image('training.jpg') ?> alt="" class="container__statistic-image">
                            <div class="container__statistic-data">
                                <img src=<?php echo ROOT."/public/images/ChallengesIcon.svg" ?> alt="" class="container__statistic-rank-img">
                                <div class="container__statistic-data-info">
                                    <span class="container__statistic-data-level">Dễ</span>
                                    <span class="container__statistic-data-number-easy">0/905</span>
                                </div>
                                <div class="container__statistic-data-info">
                                    <span class="container__statistic-data-level">Trung bình</span>
                                    <span class="container__statistic-data-number-medium">0/720</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col c-3">
                        <div class="container__card">
                            <div class="container__card-content">
                                <div class="container__card-task">
                                    <a href="" class="container__card-nameEx">isSortedArray</a>
                                    <span class="container__card-level-easy">Easy</span>
                                </div>
                                <div class="container__card-avatar">
                                    <img src="./assets/img/User-10.svg" alt="" class="container__card-avatar-rim">
                                </div>
                                <a href="" class="container__card-owner">tan_nang_0903</a>
                                <span class="container__card-challenge">HOT CHALLENGE</span>
                            </div>
                            <div class="container__card-info">
                                <div class="container__card-info-content">
                                    <i class="container__card-info-icon fa-solid fa-user-group"></i>
                                    <span class="container__card-info-text">5759/5820</span>
                                </div>
                                <div class="container__card-info-content">
                                    <i class="container__card-info-icon fa-regular fa-comment-dots"></i>
                                    <span class="container__card-info-text">80</span>
                                </div>
                                <div class="container__card-info-content">
                                    <i class="container__card-info-icon fa-regular fa-heart"></i>
                                    <span class="container__card-info-text">100</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container__problem-search">
                <div class="container__problem-search-nonAction">
                    <span class="container__problem-search-list">Danh sách bài tập</span>
                </div>

                <div class="container__problem-search-action">
                    <div class="nice-select right" tabindex="0">
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
    </div>
</div>