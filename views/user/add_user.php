<?php
$title = 'Thêm tài khoản';
include("views/includes/header_admin.php");
?>
<main class="container mt-5 mb-5">
    <div class="row">
        <div class="col-sm">
            <h3 class="text-center text-uppercase fw-bold">Thêm mới người dùng</h3>
            <form action="index.php?controller=user&action=addUser" method="post">
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblCatName">Tài khoản</span>
                    <input type="text" class="form-control" name="tai_khoan">
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblCatName">Mật khẩu</span>
                    <input type="text" class="form-control" name="mat_khau">
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblCatName">Quyền hạn</span>
                    <input type="text" class="form-control" name="quyen_han">
                </div>

                <div class="form-group  float-end ">
                    <input type="submit" value="Thêm" class="btn btn-success">
                    <a href="category.php" class="btn btn-warning ">Quay lại</a>
                </div>
            </form>
        </div>
    </div>
</main>
<?php
include("views/includes/footer_admin.php");
?>