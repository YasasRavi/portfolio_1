<?php $options = _WSH()->option();
$meta = _WSH()->get_meta('_bunch_header_settings');
eronment_bunch_global_variable(); ?>
<header class="main-header header-style-two">
    	
    	<!--Header-Upper-->
		<?php if(!(eronment_set($options, 'top_header_show'))):?>
        <div class="header-upper">
        	<div class="auto-container clearfix">
            	
                <div class="pull-left logo-outer">
                    <div class="logo"><?php if(eronment_set($options, 'logo2')): ?>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url(eronment_set($options, 'logo2')); ?>" alt="<?php esc_attr_e('Logo', 'eronment');?>" title="<?php esc_attr_e('Title', 'eronment');?>"></a>
                        <?php else: ?>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url(get_template_directory_uri().'/images/logo-2.png'); ?>" alt="<?php esc_attr_e('Logo', 'eronment');?>"></a>
                        <?php endif; ?></div>
                </div>
                    
                <div class="pull-right upper-right clearfix">
                    
                    <!--Info Box-->
                    <?php if(eronment_set($options, 'email')):?>
					<div class="upper-column info-box">
                        <div class="icon-box"><span class="fa fa-envelope-o"></span></div>
                        <ul>
                            <li><?php echo sanitize_email(eronment_set($options, 'email')); ?></li>
                        </ul>
                    </div>
					<?php endif;?>
                    
                    <!--Info Box-->
					<?php if(eronment_set($options, 'phone')):?>
                    <div class="upper-column info-box">
                        <div class="icon-box"><span class="fa fa-phone"></span></div>
                        <ul>
                            <li class="phone"><?php echo wp_kses_post(eronment_set($options, 'phone'));?></li>
                        </ul>
                    </div>
					<?php endif;?>
                    
                    <!--Info Box-->
					<?php if(eronment_set($options, 'quote_show')):?>
                    <div class="upper-column info-box">
                        <a href="<?php echo esc_url(eronment_set($options, 'quote_link2')); ?>" class="theme-btn btn-style-three"><?php echo wp_kses_post(eronment_set($options, 'quote2'));?></a>
                    </div>
					<?php endif;?>
                    
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
                    <?php endif ; ?>
					
                    <!-- Main Menu End-->
                    <div class="outer-box">
					
					<?php if(eronment_set($options, 'header_social_show')):?>	
					<?php if(eronment_set( $options, 'social_media' ) && is_array( eronment_set( $options, 'social_media' ) )): ?>
					
                    	<ul class="social-icon-three">
                            
							<?php $social_icons = eronment_set( $options, 'social_media' ); foreach( eronment_set( $social_icons, 'social_media' ) as $social_icon ): if( isset( $social_icon['tocopy' ] ) ) continue; ?>
							
							<li><a href="<?php echo esc_url(eronment_set( $social_icon, 'social_link')); ?>"><span class="fa <?php echo esc_attr(eronment_set( $social_icon, 'social_icon')); ?>"></span></a></li>
                            
							<?php endforeach; ?>
                        </ul>
						<?php endif;?>
				<?php endif;?>
                    </div>
                </div>
            </div>
        </div>
        <!--End Header Lower-->
        
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
        
    </header>