<div class="container">
    <div class="grid">
        <div class="container_problem">
            <div class="row">
                <div class="col c-9">
                    <div class="problem__main">
                        <div class="problem__main-description">
                            <h1 class="problem__main-heading">
                                <?php
                                    echo $problem -> getName();
                                ?>
                            </h1>
                            <div class="problem__main-description-item">
                                <h2 class="problem__main-title">Đề bài</h2>
                                <p class="problem__main-content">
                                <?php
                                    echo $problem -> getDescription();
                                ?>
                                </p>
                            </div>
                        </div>

                        <form id="form" class="problem__main-action" method="POST" action="<?php echo $this -> url('problem', 'submit', $problem -> getId())?>">
                            <div class="problem__main-selector">
                                <div class="problem__main-selector-language">
                                    <span class="problem__main-text">Ngôn ngữ: </span>
                                    <select class="problem__main-language-list" id="language_Selector" name="lang">
                                        <option value="">Language</option>
                                        <option value="c">C</option>
                                        <option value="cpp">C++</option>
                                        <option value="java">Java</option>
                                    </select>
                                    <button class="problem__main-btn-reset" id="btn-reset">
                                        <i class="fa-solid fa-arrow-rotate-left"></i>
                                    </button>
                                </div>

                                <div class="problem__main-selector-UI" id="ui_Selector">
                                    <span class="problem__main-text">Giao diện: </span>
                                    <select class="problem__main-UI-list">
                                        <option value="vs">Light</option>
                                        <option value="vs-dark">Dark</option>
                                    </select>
                                </div>
                            </div>
                            <div class="problem__main-codeBlcok">
                                <div id="codeBlock"></div>
                            </div>

                            <div class="problem__main-submit">
                                <button type="submit" class="problem__main-submit-btn">
                                    <i class="fa-solid fa-cloud-arrow-up"></i>
                                    <span>Nôp bài</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col c-3">
                    <div class="problem__sub">
                        <div class="problem__sub-header">
                            <a href="" class="problem__sub-submit">
                                <i class="problem__sub-header-icon fa-solid fa-cloud-arrow-up"></i>
                                <span class="problem__sub-header-text">Nôp bài</span>
                            </a>
                            <a href="" class="problem__sub-listSubmit">
                                <i class="problem__sub-header-icon fa-solid fa-bars"></i>
                                <span class="problem__sub-header-text">Danh sách bài nộp</span>
                            </a>
                        </div>

                        <div class="problem__sub-infoProblem">
                            <div class="problem__sub-infoProblem-title">
                                <i class="problem__sub-header-icon fa-solid fa-circle-info"></i>
                                <span class="problem__sub-header-text">Thông tin bài tập</span>
                            </div>
                            <div class="problem__sub-infoProblem-item">
                                <span class="problem__sub-infoProblem-key">ID</span>
                                <span class="problem__sub-infoProblem-value">
                                    <?php
                                        echo $problem -> getId();
                                    ?>
                                </span>
                            </div>
                            <div class="problem__sub-infoProblem-item">
                                <span class="problem__sub-infoProblem-key">Độ khó</span>
                                <span class="problem__sub-infoProblem-value">
                                    <?php
                                        echo $problem -> getStrLevel();
                                    ?>
                                </span>
                            </div>
                            <div class="problem__sub-infoProblem-item">
                                <span class="problem__sub-infoProblem-key">Giới hạn thời gian</span>
                                <span class="problem__sub-infoProblem-value">
                                    <?php
                                        echo ($problem -> getTimeLimit() * 1000).' Ms';
                                    ?>
                                </span>
                            </div>
                            <div class="problem__sub-infoProblem-item">
                                <span class="problem__sub-infoProblem-key">Điểm</span>
                                <span class="problem__sub-infoProblem-value">
                                    <?php
                                        echo $problem -> getScore();
                                    ?>
                                </span>
                            </div>
                            <div class="problem__sub-infoProblem-item">
                                <span class="problem__sub-infoProblem-key">Tác giả</span>
                                <span class="problem__sub-infoProblem-value">
                                    <?php
                                        echo $problem -> getAuthor() -> getUsername();
                                    ?>
                                </span>
                            </div>
                            <div class="problem__sub-infoProblem-item">
                                <span class="problem__sub-infoProblem-key">Ngày tạo</span>
                                <span class="problem__sub-infoProblem-value">
                                    <?php
                                        echo $problem -> getCreatedAt();
                                    ?>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo ROOT.'/public/js/node_modules/jquery/dist/jquery.min.js'?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/CodeFlask.js/1.4.1/codeflask.min.js" integrity="sha512-Bf/Qkbt7wQQq5+DSLtN5E/IoNnxmdCw5D8TibX466Vcr9JZVw45dENcw5Xcty1NZByDJ1nm7kWJq05ujIC5DHA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/9000.0.1/prism.min.js" integrity="sha512-UOoJElONeUNzQbbKQbjldDf9MwOHqxNz49NNJJ1d90yp+X9edsHyJoAs6O4K19CZGaIdjI5ohK+O2y5lBTW6uQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/9000.0.1/components/prism-c.min.js" integrity="sha512-EWIJI7uQnA8ClViH2dvhYsNA7PHGSwSg03FAfulqpsFiTPHfhdQIvhkg/l3YpuXOXRF2Dk0NYKIl5zemrl1fmA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/9000.0.1/components/prism-cpp.min.js" integrity="sha512-/kakiUcgosfrW14dYIe0cMjXoK6PN67r96Dz2zft/Rlm6TcgdCJjb6ZD/jpobHzduAs8NdSeMQHda8iJGkjdow==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/9000.0.1/components/prism-java.min.js" integrity="sha512-BEknrL2CnuVpqnSTwO4a9y9uW5bQ/nabkJeahZ5seRXvmzAMq59Ja9OxZe3lVGrnKEcVlamL4nUBl03wzPM/nA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>