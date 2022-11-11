<div class="main">
    <form action="" method="POST" class="form" id="form_add-problem">
        <h1 class="heading">Thêm bài tập</h1>
        <div class="spacer"></div>
        <div class="form-group">
            <label for="name" class="form-label">Tên bài tập</label>
            <input id="name" name="name" type="text" placeholder="Nhập tên bài tập" class="form-control">
            <span class="form-message"></span>
        </div>

        <div class="form-group">
            <label for="description" class="form-label">Mô tả</label>
            <textarea name="description" id="editor1" cols="" rows="3" class="form-control-text"></textarea>
            <span class="form-message"></span>
        </div>



        <div class="form-group">
            <label for="level" class="form-label">Mức độ</label>
            <select id="level" name="level" class="form-control">
                <option value="">-- Chọn mức độ --</option>
                <option value="easy">Easy</option>
                <option value="medium">Medium</option>
                <option value="hard">Hard</option>
            </select>
            <span class="form-message"></span>
        </div>

        <div class="form-group" id="form-data">

        </div>

        <div class="form-btn">
            <input type="button" value="Thêm Testcase" class="form-add-testcase" id="add_testcase">
            <button class="form-submit">Thêm bài toán</button>
        </div>
    </form>
</div>
