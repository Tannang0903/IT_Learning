<div class="container">
    <div class="grid">
        <div class="container_problem">
            <div class="row">
                <div class="col c-9">
                    <div class="problem__main">
                        <div class="problem__main-description"></div>

                        <div class="problem__main-action">
                            <div class="problem__main-selector">
                                <div class="problem__main-selector-language">
                                    <span class="problem__main-text">Ngôn ngữ: </span>
                                    <select class="problem__main-language-list" id="language_Selector">
                                        <option value="">language</option>
                                        <option value="c">c</option>
                                        <option value="cpp">c++</option>
                                        <option value="java">java</option>
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
                                <span class="problem__sub-infoProblem-value">CB01</span>
                            </div>
                            <div class="problem__sub-infoProblem-item">
                                <span class="problem__sub-infoProblem-key">Điểm</span>
                                <span class="problem__sub-infoProblem-value">100</span>
                            </div>
                        </div>

                        <div class="problem__sub-sameProblem">
                            <div class="problem__sub-sameProblem-title">
                                <i class="fa-solid fa-file"></i>
                                <span>Bài tập tương tự</span>
                            </div>
                            <a href="" class="problem__sub-sameProblem-item">DIVMOD - Thương và dư</a>
                            <a href="" class="problem__sub-sameProblem-item">LC3A - Đánh máy nhanh</a>
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