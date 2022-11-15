<div class="container">
    <div class="grid wide">
        <div class="row">
            <div class="col c-12 list__info">
                <div class="container__problem-search">
                    <div class="container__problem-search-nonAction">
                        <span class="container__problem-search-list">Danh sách bài tập</span>
                        <div class="btn action_product">
                            Thêm bài tập
                        </div>
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
                <div class="table-exercise">
                    <table id="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên Bài tập</th>
                                <th>Level</th>
                                <th>Số lượng đã vượt qua</th>
                                <th>Điểm</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>btcode01</td>
                                <td>Tính tổng 2 số nguyên</td>
                                <td><span class="label success">easy</span></td>
                                <td>Count</td>
                                <td>Point</td>
                                <td>
                                    <div class="d-flex action_btn">
                                        <a href="#" class="btn bg-success rounded ms-2" title="Xem chi tiết sản phẩm" >
                                            <i class="fa-solid fa-eye" style="color: white"></i>
                                        </a>
                                        <a href="#" class="btn bg-primary rounded ms-2" title="Chỉnh sửa sản phẩm">
                                            <i class="fa-solid fa-pen" style="color: white"></i>
                                        </a>
                                        <button type="button" class="btn bg-dark rounded ms-2" title="Nhập hàng" data-bs-toggle="modal" data-bs-target="#importProductModal" data-index="@i" data-id="@products[i].ID" data-name="@products[i].Name" onclick="transferData(this)">
                                            <i class="fa-solid fa-plus" style="color: white"></i>
                                        </button>
                                        <button type="submit" class="btn bg-danger rounded ms-2 btnDelete" title="Xóa sản phẩm" data-index="@i" data-id="@products[i].ID" onclick="deleteProduct(this)">
                                            <i class="fa-solid fa-trash-can" style="color: white"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>btcode02</td>
                                <td>Tìm Min</td>
                                <td><span class="label warning">medium</span></td>
                                <td>Count</td>
                                <td>Point</td>
                                <td>
                                    <div class="d-flex action_btn">
                                        <a href="#" class="btn bg-success rounded ms-2" title="Xem chi tiết sản phẩm" >
                                            <i class="fa-solid fa-eye" style="color: white"></i>
                                        </a>
                                        <a href="#" class="btn bg-primary rounded ms-2" title="Chỉnh sửa sản phẩm">
                                            <i class="fa-solid fa-pen" style="color: white"></i>
                                        </a>
                                        <button type="button" class="btn bg-dark rounded ms-2" title="Nhập hàng" data-bs-toggle="modal" data-bs-target="#importProductModal" data-index="@i" data-id="@products[i].ID" data-name="@products[i].Name" onclick="transferData(this)">
                                            <i class="fa-solid fa-plus" style="color: white"></i>
                                        </button>
                                        <button type="submit" class="btn bg-danger rounded ms-2 btnDelete" title="Xóa sản phẩm" data-index="@i" data-id="@products[i].ID" onclick="deleteProduct(this)">
                                            <i class="fa-solid fa-trash-can" style="color: white"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>