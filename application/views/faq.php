<section>
    <div class="container-fluid">
        <div class="row" style=" margin: 0 10px 0 10px; ">
            <div class="col-12 ">
                <div class="main-heading ">
                    <h1 ><?= $pageTitle ?></h1>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- faq start -->
<?php //print_r($rows) ?>
<section >
    <div class="container-fluid">
        <div class="row" style=" margin: 0 10px 0 10px; ">
            <div class="col">
                <div class="cd-faq">
                    <ul class="cd-faq-categories">
						<?php
						if($rows != false)
						foreach($rows as $row){
						?>
                        <li><a  class="selected" href="#section_<?= $row->fc_uid ?>"><?= $row->fc_name ?></a></li>
						<?php } ?>
					</ul>
                    <div class="cd-faq-items">
						
						<?php
						if($rows != false)
						foreach($rows as $row){
						?>
						
                        <ul id="section_<?= $row->fc_uid ?>" class="cd-faq-group">
                            <li class="cd-faq-title">
                                <h2><?= $row->fc_name ?></h2>
                            </li>
							<?php
							if($row->faqs != false)
							foreach($row->faqs as $faq){
							?>
                            <li> <a class="cd-faq-trigger" href="#0"><?= $faq->faq_question ?></a>
                                <div class="cd-faq-content">
                                    <p><?= $faq->faq_answer ?></p>
                                </div>
                            </li>
							<?php } ?>
							
                        </ul>
                        
						<?php } ?>
                        
						
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a href="#0" class="cd-close-panel">غلق</a> </section>
