<section>
    <div class="container">
        <div class="row">
            <div class="col-12 ">
                <div class="main-heading ">
                    <h1 ><?= $row->page_title ?></h1>
                </div>
            </div>
        </div>
    </div>
</section>
<section >
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="article-body article">
                    <?= stripslashes( $row->page_text) ?>
                </div>
            </div>
        </div>
    </div>
</section>