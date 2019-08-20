<section class="mt-10">
    <div class="container-fluid">
        <div class="row" style=" margin: 0 10px 0 10px; ">
            <div class="col-12 ">
                <div class="main-heading ">
                    <h1 ><?= $row->page_title ?></h1>
                </div>
            </div>
        </div>
    </div>
</section>
<section >
    <div class="container-fluid">
        <div class="row" style=" margin: 0 10px 0 10px; ">
            <div class="col-sm-12">
                <div class="article-body article">
                    <?= stripslashes( $row->page_text) ?>
                </div>
            </div>
        </div>
    </div>
</section>