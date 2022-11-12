<div class="container">
    <div class="grid wide">
        <div class="row user__block">
            <div class="col c-3">
                <div class="user__card">
                    <img src="<?php echo $this -> image('default_avatar.png')?>" class="user__card-image" />
                    <p class="user__card-name"><?php echo $me -> getUsername() ?></p>
                    <div class="divider"></div>
                    <div class="user__card-detail-block">
                        <div class="user__card-detail">
                            <span class="user__card-detail-heading">Đã đạt</span>
                            <span>3</span>
                        </div>
                        <div class="user__card-detail">
                            <span class="user__card-detail-heading">Lần nộp</span>
                            <span>1024</span>
                        </div>
                        <div class="user__card-detail">
                            <span class="user__card-detail-heading">Điểm</span>
                            <span>3333</span>
                        </div>
                    </div>
                </div>
                <div class="user__info-action">
                    <button class="btn btn-primary col c-12">Lưu</button>
                </div>
            </div>
            <div class="col user__info">
                <div class="user__info-block">
                    <label class="user__info-label">Họ tên</label>
                    <input class="user__info-detail" type="text" value="<?php echo $me -> getUsername()?>" />
                    <span class="validation-error">Họ tên không hợp lệ</span>
                </div>
                <div class="user__info-block">
                    <label class="user__info-label">Địa chỉ</label>
                    <input class="user__info-detail" type="text" value="<?php echo $me -> getEmail()?>" />
                    <span class="validation-error">Họ tên không hợp lệ</span>
                </div>
                <div class="user__info-block">
                    <label class="user__info-label">Giới tính</label>
                    <input class="user__info-detail" type="text" value="<?php echo $me -> getStrGender()?>" />
                </div>
                <div class="user__info-block">
                    <label class="user__info-label">Ngày sinh</label>
                    <input class="user__info-detail" type="date" value="<?php echo $me -> getCreatedAt()?>" />
                </div>
                <div class="user__info-block">
                    <label class="user__info-label">Gmail</label>
                    <input class="user__info-detail" type="text" value="<?php echo $me -> getEmail()?>" />
                </div>
                <div class="user__info-block">
                    <label class="user__info-label">Số điện thoại</label>
                    <input class="user__info-detail" type="text" value="0905857760" />
                </div>
                <div class="user__info-block">
                    <label class="user__info-label">Trạng thái</label>
                    <input class="user__info-detail" type="text" value="ronle9519@gmail.com" />
                </div>
                <div class="user__info-block">
                    <label class="user__info-label">Trường học</label>
                    <input class="user__info-detail" type="text" value="Trường Đại học Bách Khoa - Đại học Đà Nẵng" />
                </div>
                <div class="user__info-block">
                    <label class="user__info-label">Cập nhật lần cuối</label>
                    <input class="user__info-detail" type="date" value="ronle9519@gmail.com" />
                </div>
            </div>
        </div>
        <div class="row user__statistic">
            <h3 class="col col-3 user__title">
                <i class="fa-solid fa-circle-check"></i>
                Danh sách bài đã vượt qua
            </h3>
        </div>
        <div class="row user__statistic-block">
            <div class="col col-12 user__statistic-list-problem">
                <?php
                    foreach ($undoneProblems as $problem) {
                        echo '
                            <div class="user__statistic-problem">
                                <a href="">'.$problem -> getName().'</a>
                            </div>
                        ';
                    }
                ?>

            </div>
        </div>
    </div>
</div>