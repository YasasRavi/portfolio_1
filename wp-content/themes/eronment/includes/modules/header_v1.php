<?php $options = _WSH()->option();
$meta = _WSH()->get_meta('_bunch_header_settings');
eronment_bunch_global_variable(); ?>
<header class="main-header header-style-one">
    	
        <!--Header-Upper-->
        <div class="header-upper">
        	
			<div class="clearfix">
                <div class="auto-container">	
                <div class="pull-left logo-outer">
                    <div class="logo"><?php if(eronment_set($options, 'logo')): ?>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url(eronment_set($options, 'logo')); ?>" alt="<?php esc_attr_e('Image', 'eronment');?>" title="<?php esc_attr_e('Image', 'eronment');?>"></a>
                        <?php else: ?>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url(get_template_directory_uri().'/images/logo.png'); ?>" alt="<?php esc_attr_e('Image', 'eronment');?>"></a>
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
							<?php endif; ?>
							<?php if(eronment_set($options, 'quote_show')):?>
                            <div class="btn-box"><a href="<?php echo esc_url(eronment_set($options, 'quote_link')); ?>" class="theme-btn btn-style-one"><?php echo wp_kses_post(eronment_set($options, 'quote'));?></a></div>
							<?php endif; ?>
                        </div>
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
			<div class="auto-container">
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
                                <button class="search-box-btn dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fa fa-search"></span></button>
                                <ul class="dropdown-menu pull-right search-panel" aria-labelledby="dropdownMenu2">
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
						<?php if(eronment_set($options, 'quote_show')):?>
                        <div class="btn-box"><a href="<?php echo esc_url(eronment_set($options, 'quote_link')); ?>" class="theme-btn btn-style-one"><?php echo wp_kses_post(eronment_set($options, 'quote'));?></a></div>
						<?php endif; ?>
                    </div>
                    
                </div>
               </div> 
            </div>
        </div>
        <!--End Sticky Header-->
    
    </header>