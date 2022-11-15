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
                <option value="1">Easy</option>
                <option value="2">Medium</option>
                <option value="3">Hard</option>
            </select>
            <span class="form-message"></span>
        </div>

        <div class="form-group">
            <label for="score" class="form-label">Điểm</label>
            <input id="score" name="score" type="number" placeholder="Nhập điểm bài tập" class="form-control">
            <span class="form-message"></span>
        </div>

        <div class="form-group">
            <label for="time" class="form-label">Giới hạn thời gian</label>
            <input id="time" name="time" type="number" placeholder="Nhập giới hạn thời gian" class="form-control">
            <span class="form-message"></span>
        </div>

        <div class="form-group" id="form-data">

        </div>

        <div class="form-btn">
            <input type="button" value="Thêm Testcase" class="form-add-testcase" id="add_testcase">
            <button class="form-submit" type="submit">Thêm bài toán</button>
        </div>
    </form>
</div>
