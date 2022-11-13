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
                    <div class="container__problem-level">
                        <span class="container__problem-level-text">Độ khó</span>
                        <i class="fa-solid fa-angle-down"></i>
                        <ul class="container__problem-subLevel">
                            <li class="container__problem-subLevel-item">All</li>
                            <li class="container__problem-subLevel-item">Easy</li>
                            <li class="container__problem-subLevel-item">Medium</li>
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
                                            <a href="" class="container__user-item-nameEx">'.$problem -> getName().'</a>
                                        </div>
                                        <div class="container__user-item-tag">
                                            <p class="container__user-item-level-easy">'.$problem -> getStrLevel().'</p>
                                        </div>
                                        <div class="containerr__user-item-avatar">
                                            <img src="'.$this -> image('default_avatar.png').'" alt="" class="containerr__user-item-avatar-rim">
                                        </div>
                                        <a href="" class="containerr__user-item-owner">'.$problem -> getAuthor() -> getUsername().'</a>
            
                                        <div class="container__user-item-info">
                                            <div class="container__user-item-content">
                                                <i class="container__user-item-icon fa-solid fa-user-group"></i>
                                                <span class="containe__user-item-text">'.$problem -> getSuccessSubmit().'/'.$problem -> getTotalSubmit().'</span>
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
    </div>
</div>