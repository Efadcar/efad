<section class="mt-8">
    <div class="container">
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
    <div class="container">
        <div class="row" style=" margin: 0 10px 0 10px; ">
            <div class="col">
                <div class="cd-faq">
                    <div class="cd-faq-items">
						
						<?php
						$i = 1;
						if($rows != false)
						foreach($rows as $row){
							
						?>
						
                        <ul id="section_<?= $row->fc_uid ?>" class="cd-faq-group">
                            <li class="cd-faq-title">
                                <h2><span style="border-bottom: 3px solid #000;"><?= $row->fc_name ?></span></h2>
                            </li>
							<?php
							if($row->faqs != false)
							foreach($row->faqs as $faq){
							?>
							
                            <li class="cd-faq-question question<?= $i ?>"> <a class="cd-faq-trigger trigger<?= $i ?>" href="#0"><?= $faq->faq_question ?></a>
                                <div class="cd-faq-content">
                                    <p><?= $faq->faq_answer ?></p>
                                </div>
                            </li>
							<script>
								$('.trigger<?= $i ?>').on('click', function(){
									if($('.question<?= $i ?>').hasClass('focused')) {
										$('.question<?= $i ?>').removeClass('focused')
									} else {
										$('.question<?= $i ?>').addClass('focused')
									}
								});
							</script>
							<?php $i++;} ?>
							
                        </ul>
                        
						<?php } ?>
                        
						
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
