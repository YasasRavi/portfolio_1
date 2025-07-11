<?php 
	$meta = _WSH()->get_meta('_bunch_header_settings');
	$bg = eronment_set($meta, 'header_img');
	$title = eronment_set($meta, 'header_title');
	?>


<?php if(!eronment_set($meta, 'breadcrumb')):?>

<?php if($bg):?>
<section class="page-title" style="background-image:url(<?php echo esc_attr($bg)?>)">
 <?php else :?>
<section class="page-title" style="background-image:url(<?php echo esc_url(get_template_directory_uri().'/images/background/10.jpg');?>)">
<?php endif;?>
    	<div class="auto-container">
            <div class="clearfix">
                <div class="pull-left">
                    <h2><?php if($title) echo wp_kses_post($title); else wp_title(''); ?></h2>
                </div>
                <div class="pull-right">
                    <?php echo wp_kses_post(eronment_get_the_breadcrumb()); ?>
                </div>
            </div>
        </div>
    </section>
<?php endif;?>	
