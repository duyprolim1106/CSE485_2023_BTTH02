<?php
include("views/includes/header.php");
?>
<main class="container mt-5">
    <div class="row mb-5">
        <div class="col-sm-4">
            <img src="
            <?= $detailArticle[0]->getHinhanh() ?>
            " class="img-fluid" alt="...">
        </div>
        <div class="col-sm-8">
            <h5 class="card-title mb-2">
                <a href="" class="text-decoration-none">
                    <?= $detailArticle[0]->getTieude() ?>
                </a>
            </h5>
            <p class="card-text"><span class=" fw-bold">Bài hát: </span>
            <?= $detailArticle[0]->getTenBhat() ?>
        </p>
            <p class="card-text"><span class=" fw-bold">Thể loại: </span>
            <?= $detailArticle[0]->getTenTloai() ?>
        </p>
            <p class="card-text"><span class=" fw-bold">Tóm tắt: </span>
            <?= $detailArticle[0]->getTomtat() ?>
        </p>
            <p class="card-text"><span class=" fw-bold">Nội dung: </span>
            <?= $detailArticle[0]->getNoidung() ?>
        </p>
            <p class="card-text"><span class=" fw-bold">Tác giả: </span>
            <?= $detailArticle[0]->getTenTgia() ?>
        </p>

        </div>
    </div>
</main>
<?php
include("views/includes/footer.php");
?>

