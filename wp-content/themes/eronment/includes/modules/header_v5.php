<?php $options = _WSH()->option();
$meta = _WSH()->get_meta('_bunch_header_settings');
eronment_bunch_global_variable(); ?>

<header class="main-header header-style-five">
    	
        <!-- Header Top -->
		<?php if(!(eronment_set($options, 'top_header_show'))):?>
    	<div class="header-top style-two">
        	<div class="auto-container">
            	<div class="clearfix">
                    
                    <!--Top Left-->
                    <div class="top-left">
                    	<ul class="links clearfix">
                        	
							<?php if(eronment_set($options, 'phone')):?>
							<li><?php echo wp_kses_post(eronment_set($options, 'phone_title'));?> <?php echo wp_kses_post(eronment_set($options, 'phone'));?></li>
							<?php endif; ?>
							
							<?php if(eronment_set($options, 'email')):?>
                            <li><a href="<?php echo esc_url(sanitize_email(eronment_set($options, 'email'))); ?>"><?php echo wp_kses_post(eronment_set($options, 'email_title'));?> <?php echo sanitize_email(eronment_set($options, 'email')); ?></a></li>
							<?php endif; ?>
                        </ul>
                    </div>
                    
                    <!--Top Right-->
                    <div class="top-right clearfix">
                    	<?php if(eronment_set($options, 'quote_show')):?>
                        <div class="login-register">
                        	<a href="<?php echo esc_url(eronment_set($options, 'quote_link3')); ?>"><?php echo wp_kses_post(eronment_set($options, 'quote3'));?></a>
                        </div>
						<?php endif; ?>
                        
                        <!--Language-->
                        <?php if(eronment_set($options, 'header_language_show')):?>
						<div class="language dropdown"><a class="btn btn-default dropdown-toggle" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" href="#"><?php echo wp_kses_post(eronment_set($options, 'language_title')); ?> &nbsp;<span class="icon fa fa-angle-down"></span></a>
                        	<ul class="dropdown-menu style-one" aria-labelledby="dropdownMenu2">
                                
								<?php if(eronment_set( $options, 'social_language' ) && is_array( eronment_set( $options, 'social_language' ) )): ?>
	<?php $social_icons = eronment_set( $options, 'social_language' ); foreach( eronment_set( $social_icons, 'social_language' ) as $social_icon ): if( isset( $social_icon['tocopy' ] ) ) continue; ?>
								
								<li><a href="<?php echo esc_url(eronment_set( $social_icon, 'social_link')); ?>"><?php echo wp_kses_post(eronment_set( $social_icon, 'social_title')); ?></a></li>
                                
								<?php endforeach; ?> 
							<?php endif;?>
                            </ul>
                        </div>
                        <?php endif;?>
                    </div>
                    
                </div>
                
            </div>
        </div>
		<?php endif; ?>
        <!-- Header Top End -->
        
        <!--Header-Upper-->
        <div class="header-upper">
        	<div class="auto-container clearfix">
                	
                <div class="pull-left logo-outer">
                    <div class="logo"><?php if(eronment_set($options, 'logo2')): ?>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url(eronment_set($options, 'logo2')); ?>" alt="<?php esc_attr_e('Image', 'eronment');?>" title="<?php esc_attr_e('Image', 'eronment');?>"></a>
                        <?php else: ?>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url(get_template_directory_uri().'/images/logo-2.png'); ?>" alt="<?php esc_attr_e('Image', 'eronment');?>"></a>
                        <?php endif; ?></div>
                </div>
                
                <div class="pull-right upper-right clearfix">
                    
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
                        
                        <!-- Main Menu End-->
                        <div class="outer-box">
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
							<?php endif ; ?>
							
							
                            <?php if(eronment_set($options, 'quote_show')):?>
							<div class="btn-box"><a href="<?php echo esc_url(eronment_set($options, 'quote_link')); ?>" class="theme-btn btn-style-one"><?php echo wp_kses_post(eronment_set($options, 'quote'));?></a></div>
							<?php endif;?>
                        </div>
            		</div>
                    
                </div>
                    
            </div>
        </div>
        <!--End Header Upper-->
        
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
        
        <!--Sticky Header-->
        <div class="sticky-header">
        	<div class="sticky-inner-container clearfix">
            	<!--Logo-->
            	<div class="logo pull-left">
                	<?php if(eronment_set($options, 'logosmall')):?>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="img-responsive"><img src="<?php echo esc_url(eronment_set($options, 'logosmall')); ?>" alt="<?php esc_attr_e('Image', 'eronment');?>" title="<?php esc_attr_e('Logo', 'eronment');?>"></a>
            	<?php else:?>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="img-responsive"><img src="<?php echo esc_url(get_template_directory_uri().'/images/logo-small.png'); ?>" alt="<?php esc_attr_e('Image', 'eronment');?>"></a>
            	<?php endif; ?>
                </div>
                
                <!--Right Col-->
                <div class="right-col pull-right">
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
                    <!-- Main Menu End-->
                    
                    <!-- Main Menu End-->
                    <div class="outer-box">
                        <!--Search Box-->
                        <?php if(eronment_set($options, 'header_search_show')):?>
						<div class="search-box-outer">
                            <div class="dropdown">
                                <button class="search-box-btn dropdown-toggle" type="button" id="dropdownMenu4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fa fa-search"></span></button>
                                <ul class="dropdown-menu pull-right search-panel" aria-labelledby="dropdownMenu4">
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
						<?php endif ; ?>
                        
						<?php if(eronment_set($options, 'quote_show')):?>
						<div class="btn-box"><a href="<?php echo esc_url(eronment_set($options, 'quote_link')); ?>" class="theme-btn btn-style-one"><?php echo wp_kses_post(eronment_set($options, 'quote'));?></a></div>
						<?php endif;?>
                    </div>
                    
                </div>
                
            </div>
        </div>
        <!--End Sticky Header-->
    
    </header>