<?php $options = _WSH()->option();
$meta = _WSH()->get_meta('_bunch_header_settings');
eronment_bunch_global_variable(); ?>

<header class="main-header header-style-four">
    	
    	<!--Header-Upper-->
        <?php if(!(eronment_set($options, 'top_header_show'))):?>
		<div class="header-upper">
        	<div class="auto-container clearfix">
            	
                <div class="pull-left logo-outer">
                    <?php if(eronment_set($options, 'logo')): ?>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url(eronment_set($options, 'logo')); ?>" alt="<?php esc_attr_e('Image', 'eronment');?>" title="<?php esc_attr_e('Image', 'eronment');?>"></a>
                        <?php else: ?>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url(get_template_directory_uri().'/images/logo.png'); ?>" alt="<?php esc_attr_e('Image', 'eronment');?>"></a>
                        <?php endif; ?>
                </div>
                    
                <div class="pull-right upper-right clearfix">
                    
                    <!--Info Box-->
                    <?php if(eronment_set($options, 'add')||eronment_set($options, 'addnd')):?>
					<div class="upper-column info-box">
                        <div class="icon-box"><span class="flaticon-location-pin"></span></div>
                        <ul>
                            <li><?php echo wp_kses_post(eronment_set($options, 'add'));?><br><?php echo wp_kses_post(eronment_set($options, 'addnd'));?></li>
                        </ul>
                    </div>
					<?php endif; ?>
                    
                    <!--Info Box-->
					<?php if(eronment_set($options, 'phone2')):?>
                    <div class="upper-column info-box">
                        <div class="icon-box"><span class="flaticon-technology-1"></span></div>
                        <ul>
                            <li><?php echo wp_kses_post(eronment_set($options, 'phone2'));?> <br><?php echo wp_kses_post(eronment_set($options, 'phone_title2'));?></li>
                        </ul>
                    </div>
					<?php endif; ?>
                    
                    <!--Info Box-->
                    <?php if(eronment_set($options, 'time')):?>
					<div class="upper-column info-box">
                        <div class="icon-box"><span class="flaticon-timer"></span></div>
                        <ul>
                            <li><?php echo wp_kses_post(eronment_set($options, 'time'));?><br><?php echo wp_kses_post(eronment_set($options, 'time_close'));?></li>
                        </ul>
                    </div>
					<?php endif; ?>
                    
                </div>
                
            </div>
        </div>
		<?php endif; ?>
        <!--End Header Upper-->
        
        <!--Header Lower-->
        <div class="header-lower clearfix">
        	<div class="auto-container">
            	<div class="nav-outer clearfix">
                    <!-- Main Menu -->
                    <nav class="main-menu">
                        <div class="navbar-header">
                            <!-- Toggle Button -->    	
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            </button>
                        </div>
                        
                        <div class="navbar-collapse collapse clearfix">
                            <?php 
	  $header = eronment_set($meta, 'meta_menu_style'); 
	 
	  $header = (eronment_set($_GET, 'meta_menu_style')) ? eronment_set($_GET, 'meta_menu_style') : $header;
	  switch($header){
	  	case "2":
			get_template_part('includes/modules/bread/menu2');
			break;
		case "3":
			get_template_part('includes/modules/bread/menu3');
			break;	
		case "4":
			get_template_part('includes/modules/bread/menu4');
			break;
		default:
			get_template_part('includes/modules/bread/menu1');
		}
?>
                        </div>
                    </nav>
                    
                    <!--Search Box-->
                    <?php if(eronment_set($options, 'header_search_show')):?>
					<div class="search-box-outer">
                        <div class="dropdown">
                            <button class="search-box-btn dropdown-toggle" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fa fa-search"></span></button>
                            <ul class="dropdown-menu pull-right search-panel" aria-labelledby="dropdownMenu3">
                                <li class="panel-outer">
                                    <div class="form-container">
                                        <form action="<?php echo esc_url(home_url('/')); ?>" method="get" class="search-form">
                                            <div class="form-group">
                                               <input type="text" name="s" value="" placeholder="<?php echo esc_attr(eronment_set($options, 'search_textx')); ?>">
											   
                                                <button type="submit" class="search-btn"><span class="fa fa-search"></span></button>
                                            </div>
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <?php endif; ?>
					
					
                    <!-- Main Menu End-->
                    <?php if(eronment_set($options, 'quote_show')):?>
					<div class="outer-box">
                    	<a href="<?php echo esc_url(eronment_set($options, 'quote_link')); ?>" class="theme-btn donate-btn"><?php echo wp_kses_post(eronment_set($options, 'quote'));?></a>
                    </div>
					<?php endif; ?>
                </div>
            </div>
        </div>
        <!--End Header Lower-->
        
    </header>
    <!--End Main Header -->
    
    <!--Mobile Menu-->
    <div class="mobile-menu">
        <div class="auto-container">
            <div class="nav-header clearfix">
                <div class="text"><?php esc_attr_e('Menu', 'eronment');?></div>
                <div class="menu-btn"><span class="fa fa-bars"></span></div>
            </div>
            <div class="links-outer">
                <div class="links-box">
                    <ul class="navigation">
                        <!--Keep This Empty / Menu will come through Javascript-->
                    </ul>
                </div>
            </div>
        </div>
    </div>