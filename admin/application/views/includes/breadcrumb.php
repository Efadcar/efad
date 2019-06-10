    <ul class="page-breadcrumb">
        <?php $i =0; foreach($breadcrumbs as $key => $value){ ?>
        <li>
        	<?php if($i >= 1){ ?>
            <i class="fa fa-circle"></i>
			<?php } ?>
            <a href="<?php echo $value ?>"><?php echo $key ?></a>
        </li>
        <?php $i++; } ?>
    </ul>
