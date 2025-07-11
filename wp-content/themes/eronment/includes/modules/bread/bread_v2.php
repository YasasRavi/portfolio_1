<?php 
	$meta = _WSH()->get_meta('_bunch_header_settings');
	$bg = eronment_set($meta, 'header_img');
	$title = eronment_set($meta, 'header_title');
	?>


<?php if(!eronment_set($meta, 'breadcrumb')):?>
<?php if($bg):?>
 <section class="page-title style-two" style="background-image:url('<?php echo esc_attr($bg)?>');" >
 <?php else :?>
 <section class="page-title style-two" style="background-image:url(<?php echo esc_url(get_template_directory_uri().'/images/background/10.jpg');?>)">
<?php endif;?>	
    	<div class="auto-container">
        	<h1 class="alternate"><?php if($title) echo wp_kses_post($title); else wp_title(''); ?></h1>
        </div>
    </section>
    <!--End Page Title-->

<?php endif;?>	
