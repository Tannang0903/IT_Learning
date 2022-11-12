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

                        <div class="problem__main-action">
                            <div class="problem__main-selector">
                                <div class="problem__main-selector-language">
                                    <span class="problem__main-text">Ngôn ngữ: </span>
                                    <select class="problem__main-language-list" id="language_Selector">
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
                                <pre id="codeBlock">
                                </pre>
                            </div>

                            <div class="problem__main-submit">
                                <button type="submit" class="problem__main-submit-btn">
                                    <i class="fa-solid fa-cloud-arrow-up"></i>
                                    <span>Nôp bài</span>
                                </button>
                            </div>
                        </div>
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
                                <i class="fa-solid fa-circle-info"></i>
                                <span>Thông tin bài tập</span>
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

<script>
    <?php
        echo  "var require = { paths: { 'vs': '".ROOT."/public/js/node_modules/monaco-editor/min/vs' } }";
    ?>
</script>