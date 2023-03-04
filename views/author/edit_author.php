<?php
include ("views/includes/header.php");
?>

<main class="container mt-5 mb-5">
   
    <div class="row">
        <div class="col-sm">
            <h3 class="text-center text-uppercase fw-bold">Sửa thông tin tác giả</h3>
            <form action="./index.php?controller=author&action=update" method="post">
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblCatId">Mã tác giả</span>
                    <input type="text" class="form-control" name="txt_matgia" readonly value=" <?php echo $edit_author[0]->getMaTgia() ?>">
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblCatName">Tên tác giả</span>
                    <input type="text" class="form-control" name="txt_tentgia" value=" <?php echo $edit_author[0]->getTenTGia() ?>">
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
include("views/includes/footer.php");
?>