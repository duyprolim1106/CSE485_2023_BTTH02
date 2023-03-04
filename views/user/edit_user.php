<?php
$title = 'Sửa thông tin tài khoản';
include("views/includes/header_admin.php");
?>
<main class="container mt-5 mb-5">
    <div class="row">
        <div class="col-sm">
            <h3 class="text-center text-uppercase fw-bold">Sửa thông tin tài khoản người dùng</h3>
            <form action="index.php?controller=user&action=updateUser" method="post">
                <input type="text" class="form-control" name="id_ngdung" readonly hidden value="<?= $user->getId() ?>">
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblCatId">Tài khoản người dùng</span>
                    <input type="text" class="form-control" name="tai_khoan" readonly value="<?= $user->getUserName() ?>">
                </div>

                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblCatName">Mật khẩu</span>
                    <input type="text" class="form-control" name="mat_khau" value="<?= $user->getPassWord() ?>">
                </div>

                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblCatName">Quyền hạn</span>
                    <input type="text" class="form-control" name="quyen_han" value="<?= $user->getRole() ?>">
                </div>

                <div class="form-group  float-end ">
                    <input type="submit" value="Lưu lại" class="btn btn-success">
                    <a href="category.php" class="btn btn-warning ">Quay lại</a>
                </div>
            </form>
        </div>
    </div>
</main>
<?php
include("views/includes/footer_admin.php");
?>