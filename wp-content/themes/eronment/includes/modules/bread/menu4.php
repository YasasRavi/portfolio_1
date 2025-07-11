<ul class="navigation clearfix">
						<?php wp_nav_menu( array( 'theme_location' => 'portfolio_menu', 'container_id' => 'navbar-collapse-1',
								'container_class'=>'navbar-collapse collapse navbar-right',
								'menu_class'=>'nav navbar-nav',
								'fallback_cb'=>false, 
								'items_wrap' => '%3$s', 
								'container'=>false,
								'walker'=> new Bunch_Bootstrap_walker()  
							) ); ?>	
						</ul> 