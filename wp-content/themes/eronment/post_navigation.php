<?php 
$options = _WSH()->option();
$meta = _WSH()->get_meta('_bunch_header_settings');
eronment_bunch_global_variable();
 ?>
        
<div class="posts-nav">
			<div class="clearfix">
				<div class="pull-left">
					<?php previous_post_link('%link','<div class="prev-post"><span class="fa fa-long-arrow-left"></span> &nbsp;&nbsp;&nbsp;'.esc_html__('Prev Post ', 'eronment').'</div>'); ?>
				</div>
				<div class="pull-right">
					<?php next_post_link('%link','<div class="next-post">'.esc_html__('Next Post ', 'eronment').'  &nbsp;&nbsp;&nbsp; <span class="fa fa-long-arrow-right"></span> </div>'); ?>
				</div>                                
			</div>
		</div>