<?php
$title = 'Quản lý tài khoản';
include("views/includes/header_admin.php");
?>
<main class="container mt-5 mb-5">
    <div class="row">
        <div class="col-sm">
            <a href="index.php?controller=user&act=add" class="btn btn-success">Thêm mới</a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tên người dùng</th>
                        <th scope="col">Mật khẩu</th>
                        <th scope="col">Quyền hạn</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($userList as $user) {
                    ?>
                        <tr>
                            <th scope="row"><?= $user->getId() ?></th>
                            <td><?= $user->getUserName() ?></td>
                            <td><?= $user->getPassWord() ?></td>
                            <td><?= $user->getRole() ?></td>
                            <td>
                                <a href="index.php?controller=user&id=<?= $user->getId() ?>&act=edit"><i class="fa-solid fa-pen-to-square"></i></a>
                            </td>
                            <td>
                                <a href="index.php?controller=user&action=deleteUser&id=<?= $user->getId() ?>"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</main>
<?php
include("views/includes/footer_admin.php");
?>