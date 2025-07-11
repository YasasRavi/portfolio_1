<?php
/* ===============
Recent Post-1
Recent Post-2
Recent Post-3
Theme Gallery
Services Menu
Testimonials
Call Us
Our Brochures
About Us Social 
About Us Btn
About Us Sunscribe
Contact Us
Subscribe
About Us With Social Icon
Call to Action
Contact Us-2
================*/

/*===============Theme Gallery=============*/

class eronment_Gallery extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'eronment_Gallery', /* Name */esc_html__('Theme Gallery','eronment'), array( 'description' => esc_html__('Show the Gallery images', 'eronment' )) );
	}
 

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget); ?>
		
		<div class="gallery-widget">
            <?php echo wp_kses_post($before_title.$title.$after_title); ?>
            
			<?php 
				$args = array('post_type' => 'bunch-gallery', 'showposts'=>$instance['number']);
				if( $instance['cat'] ) $args['tax_query'] = array(array('taxonomy' => 'gallerys_category','field' => 'id','terms' => (array)$instance['cat']));
				$this->posts($args);
				?>
            
        </div>
        
        <?php echo wp_kses_post($after_widget);
	}
 
 
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = $new_instance['number'];
		$instance['cat'] = $new_instance['cat'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ( $instance ) ? esc_attr($instance['title']) : esc_html__('Gallery Widget', 'eronment');
		$number = ( $instance ) ? esc_attr($instance['number']) : 8;
		$cat = ( $instance ) ? esc_attr($instance['cat']) : '';?>
			
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title: ', 'eronment'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('No. of Posts:', 'eronment'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" />
        </p>
       
    	<p>
            <label for="<?php echo esc_attr($this->get_field_id('cat')); ?>"><?php esc_html_e('Category', 'eronment'); ?></label>
            <?php wp_dropdown_categories( array('show_option_all'=>esc_html__('All Categories', 'eronment'), 'selected'=>$cat, 'taxonomy' => 'gallerys_category', 'class'=>'widefat', 'name'=>$this->get_field_name('cat')) ); ?>
        </p>
            
		<?php 
	}
	
	function posts($args)
	{
	?>	
		<div class="widget-content">
                <div class="images-outer clearfix">
		<?php	$query = new WP_Query($args);
		if( $query->have_posts() ):
		while( $query->have_posts() ): $query->the_post();
		global $post;
		$gallery_meta = _WSH()->get_meta(); 
		$post_thumbnail_id = get_post_thumbnail_id($post->ID);
		$post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );
		?>
				
                    <figure class="image-box gallery_widget"><a href="<?php echo esc_url($post_thumbnail_url);?>" class="lightbox-image" title="<?php esc_attr_e('Title', 'eronment');?>" data-fancybox-group="footer-gallery">
					<?php the_post_thumbnail();?></a></figure>
                <?php endwhile; endif;
		wp_reset_postdata(); ?>
		
                </div> 
			</div>
        <?php 
    }
}


/* ===============Recent Post-1========= */
class eronment_RecentNews1 extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'eronment_RecentNews1', /* Name */esc_html__('Theme News-1','eronment'), array( 'description' => esc_html__('Show the recent news sidebar', 'eronment' )) );
	}
	
	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget); ?>
		
        <!-- Popular Posts -->
        <div class="popular-posts">
            <?php echo wp_kses_post($before_title.$title.$after_title); ?>
            
            <?php $query_string = 'posts_per_page='.$instance['number'];
			if( $instance['cat'] ) $query_string .= '&cat='.$instance['cat'];
			 
			$this->posts($query_string);  
			?>
        </div>
        
		<?php echo wp_kses_post($after_widget);
	}
 
 
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = $new_instance['number'];
		$instance['cat'] = $new_instance['cat'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ( $instance ) ? esc_attr($instance['title']) : esc_html__('Recent News', 'eronment');
		$number = ( $instance ) ? esc_attr($instance['number']) : 3;
		$cat = ( $instance ) ? esc_attr($instance['cat']) : ''; ?>
			
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title: ', 'eronment'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('No. of Posts:', 'eronment'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" />
        </p>
       
    	<p>
            <label for="<?php echo esc_attr($this->get_field_id('cat')); ?>"><?php esc_html_e('Category', 'eronment'); ?></label>
            <?php wp_dropdown_categories( array('show_option_all'=>esc_html__('All Categories', 'eronment'), 'selected'=>$cat, 'class'=>'widefat', 'name'=>$this->get_field_name('cat')) ); ?>
        </p>
            
		<?php 
	}
	
	function posts($query_string)
	{
		$query = new WP_Query($query_string);
		if( $query->have_posts() ):?>
            <!-- Title -->
            <?php while( $query->have_posts() ): $query->the_post(); ?>
            <article class="post">
                <figure class="post-thumb"><a href="<?php echo esc_url(get_permalink(get_the_id())); ?>"><?php the_post_thumbnail('eronment_81x75'); ?></a></figure>
                <div class="text"><a href="<?php echo esc_url(get_permalink(get_the_id())); ?>"><?php the_title(); ?></a></div>
                <div class="post-info"><?php echo get_the_date('d M, Y'); ?></div>
            </article>
            <?php endwhile;
		endif;
		wp_reset_postdata();
    }
}
/* ===============Recent Post-2========= */
class eronment_RecentNews2 extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'eronment_RecentNews2', /* Name */esc_html__('Theme News-2','eronment'), array( 'description' => esc_html__('Show the recent news sidebar', 'eronment' )) );
	}
	
	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget); ?>
		
        <!-- Popular Posts -->
        <div class="popular-posts">
            <?php echo wp_kses_post($before_title.$title.$after_title); ?>
            
            <?php $query_string = 'posts_per_page='.$instance['number'];
			if( $instance['cat'] ) $query_string .= '&cat='.$instance['cat'];
			 
			$this->posts($query_string);  
			?>
        </div>
        
		<?php echo wp_kses_post($after_widget);
	}
 
 
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = $new_instance['number'];
		$instance['cat'] = $new_instance['cat'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ( $instance ) ? esc_attr($instance['title']) : esc_html__('Recent News', 'eronment');
		$number = ( $instance ) ? esc_attr($instance['number']) : 3;
		$cat = ( $instance ) ? esc_attr($instance['cat']) : ''; ?>
			
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title: ', 'eronment'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('No. of Posts:', 'eronment'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" />
        </p>
       
    	<p>
            <label for="<?php echo esc_attr($this->get_field_id('cat')); ?>"><?php esc_html_e('Category', 'eronment'); ?></label>
            <?php wp_dropdown_categories( array('show_option_all'=>esc_html__('All Categories', 'eronment'), 'selected'=>$cat, 'class'=>'widefat', 'name'=>$this->get_field_name('cat')) ); ?>
        </p>
            
		<?php 
	}
	
	function posts($query_string)
	{
		$query = new WP_Query($query_string);
		if( $query->have_posts() ):?>
            <!-- Title -->
            <?php while( $query->have_posts() ): $query->the_post(); ?>
            <article class="post_two post">
                <div class="text"><a href="<?php echo esc_url(get_permalink(get_the_id())); ?>"><?php the_title(); ?></a></div>
                <div class="post-info"><?php echo get_the_date('d M, Y'); ?></div>
            </article>
            <?php endwhile;
		endif;
		wp_reset_postdata();
    }
}
/* ===============Recent Post-3========= */

class eronment_RecentNews3 extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'eronment_RecentNews3', /* Name */esc_html__('Theme News-3','eronment'), array( 'description' => esc_html__('Show the recent news sidebar', 'eronment' )) );
	}
	
	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget); ?>
		
        <!-- Popular Posts -->
        <div class="popular-posts">
            <?php echo wp_kses_post($before_title.$title.$after_title); ?>
            
            <?php $query_string = 'posts_per_page='.$instance['number'];
			if( $instance['cat'] ) $query_string .= '&cat='.$instance['cat'];
			 
			$this->posts($query_string);  
			?>
        </div>
        
		<?php echo wp_kses_post($after_widget);
	}
 
 
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = $new_instance['number'];
		$instance['cat'] = $new_instance['cat'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ( $instance ) ? esc_attr($instance['title']) : esc_html__('Recent News', 'eronment');
		$number = ( $instance ) ? esc_attr($instance['number']) : 3;
		$cat = ( $instance ) ? esc_attr($instance['cat']) : ''; ?>
			
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title: ', 'eronment'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('No. of Posts:', 'eronment'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" />
        </p>
       
    	<p>
            <label for="<?php echo esc_attr($this->get_field_id('cat')); ?>"><?php esc_html_e('Category', 'eronment'); ?></label>
            <?php wp_dropdown_categories( array('show_option_all'=>esc_html__('All Categories', 'eronment'), 'selected'=>$cat, 'class'=>'widefat', 'name'=>$this->get_field_name('cat')) ); ?>
        </p>
            
		<?php 
	}
	
	function posts($query_string)
	{
		$query = new WP_Query($query_string);
		if( $query->have_posts() ):?>
            <!-- Title -->
            <?php while( $query->have_posts() ): $query->the_post(); ?>
            <article class="post">
                <figure class="post-thumb"><a href="<?php echo esc_url(get_permalink(get_the_id())); ?>"><?php the_post_thumbnail(); ?></a></figure>
                <div class="text"><a href="<?php echo esc_url(get_permalink(get_the_id())); ?>"><?php the_title(); ?></a></div>
                <div class="post-info"><?php esc_html_e('By: ', 'eronment');?><?php the_author();?></div>
            </article>
            <?php endwhile;
		endif;
		wp_reset_postdata();
    }
}



/*==============Services Menu=============*/

class eronment_ServicesMenu extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'eronment_ServicesMenu', /* Name */esc_html__('Theme Services Menu','eronment'), array( 'description' => esc_html__('Show services menu in sidebar.', 'eronment' )) );
	}
	
	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		echo wp_kses_post($before_widget); ?>
        
        <!-- Sidebar Category -->
        <div class="sidebar-widget sidebar-category">
            <ul class="list">
                <?php $args = array('post_type' => 'bunch_services', 'showposts'=>$instance['number']);
				if( $instance['cat'] ) $args['tax_query'] = array(array('taxonomy' => 'services_category','field' => 'id','terms' => (array)$instance['cat']));
				 
				$this->posts($args);
				?>
            </ul>
        </div>
        
        <?php echo wp_kses_post($after_widget);
	}
 
 
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['number'] = $new_instance['number'];
		$instance['cat'] = $new_instance['cat'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$number = ( $instance ) ? esc_attr($instance['number']) : 6;
		$cat = ( $instance ) ? esc_attr($instance['cat']) : ''; ?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('No. of Posts:', 'eronment'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" />
        </p>
       
    	<p>
            <label for="<?php echo esc_attr($this->get_field_id('cat')); ?>"><?php esc_html_e('Category', 'eronment'); ?></label>
            <?php wp_dropdown_categories( array('show_option_all'=>esc_html__('All Categories', 'eronment'), 'selected'=>$cat, 'taxonomy' => 'services_category', 'class'=>'widefat', 'name'=>$this->get_field_name('cat')) ); ?>
        </p>
            
		<?php 
	}
	
	function posts($args)
	{
		$query = new WP_Query($args);
		if( $query->have_posts() ):
		while( $query->have_posts() ): $query->the_post();
		$services_meta = _WSH()->get_meta(); ?>
        <li><a href="<?php echo esc_url(eronment_set($services_meta, 'ext_url')); ?>"><?php the_title(); ?></a></li>
        <?php endwhile; endif;
		wp_reset_postdata();
    }
}
/*==============Testimonials=============*/
class eronment_Testimonials extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'eronment_Testimonials', /* Name */esc_html__('Theme Testimonials','eronment'), array( 'description' => esc_html__('Show the testimonials sidebar', 'eronment' )) );
	}
	
	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget); ?>
        
        <!-- Sidebar Testimonial -->
        <div class="sidebar-widget sidebar-testimonial">
            <div class="single-item-carousel owl-carousel owl-theme">
                <?php $args = array('post_type' => 'bunch_testimonials', 'showposts'=>$instance['number']);
				if( $instance['cat'] ) $args['tax_query'] = array(array('taxonomy' => 'testimonials_category','field' => 'id','terms' => (array)$instance['cat']));
				 
				$this->posts($args);
				?>
            </div>
        </div>
        
		<?php echo wp_kses_post($after_widget);
	}
 
 
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['number'] = $new_instance['number'];
		$instance['cat'] = $new_instance['cat'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$number = ( $instance ) ? esc_attr($instance['number']) : 3;
		$cat = ( $instance ) ? esc_attr($instance['cat']) : ''; ?>
		
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('No. of Posts:', 'eronment'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" />
        </p>
       
    	<p>
            <label for="<?php echo esc_attr($this->get_field_id('cat')); ?>"><?php esc_html_e('Category', 'eronment'); ?></label>
            <?php wp_dropdown_categories( array('show_option_all'=>esc_html__('All Categories', 'eronment'), 'selected'=>$cat, 'taxonomy' => 'testimonials_category', 'class'=>'widefat', 'name'=>$this->get_field_name('cat')) ); ?>
        </p>
            
		<?php 
	}
	
	function posts($args)
	{
		
		$query = new WP_Query($args); 
		if( $query->have_posts() ):?>
            <!-- Title -->
            <?php while( $query->have_posts() ): $query->the_post();
			global $post;
			$testimonials_meta = _WSH()->get_meta(); ?>
            <!--Testimonial Slide-->
            <div class="testimonial-slide">
                <div class="inner">
                    <div class="author-info">
                        <div class="image">
                            <?php the_post_thumbnail('eronment_55x55'); ?>
                        </div>
                        <h3><?php the_title(); ?></h3>
                        <div class="designation"><?php echo wp_kses_post(eronment_set($testimonials_meta, 'designation')); ?></div>
                    </div>
                    <div class="text"><?php echo get_the_content(); ?></div>
                </div>
            </div>
            <?php endwhile;
		endif;
		wp_reset_postdata();
    }
}
/*==============Call Us=============*/

class eronment_CallUs extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'eronment_CallUs', /* Name */esc_html__('Theme Call Us','eronment'), array( 'description' => esc_html__('Show the information about company', 'eronment' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		$options = _WSH()->option();
		echo wp_kses_post($before_widget); ?>
        
        	<!-- Sidebar Question Box -->
            <div class="sidebar-widget sidebar-question">
                <div class="info-widget">
                    <div class="inner">
                        <h3><?php echo wp_kses_post($instance['content']); ?></h3>
                        <h2><?php echo wp_kses_post($instance['phone']); ?></h2>
                        <a href="<?php echo esc_url($instance['url']); ?>" class="more-detail"><?php esc_html_e('More Details', 'eronment'); ?></a>
                    </div>
                </div>
            </div>
            
		<?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['content'] = $new_instance['content'];
		$instance['phone'] = $new_instance['phone'];
		$instance['url'] = $new_instance['url'];

		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$content = ( $instance ) ? esc_attr($instance['content']) : 'Have Any Question <br> Call Us Now';
		$phone = ( $instance ) ? esc_attr($instance['phone']) : '+880 456 334 345';
		$url = ( $instance ) ? esc_attr($instance['url']) : '#';
		?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('content')); ?>"><?php esc_html_e('Content:', 'eronment'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('content')); ?>" name="<?php echo esc_attr($this->get_field_name('content')); ?>" ><?php echo wp_kses_post($content); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('phone')); ?>"><?php esc_html_e('Phone:', 'eronment'); ?></label>
            <input placeholder="<?php esc_attr(esc_html_e('Phone', 'eronment')); ?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('phone')); ?>" name="<?php echo esc_attr($this->get_field_name('phone')); ?>" type="text" value="<?php echo esc_attr($phone); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('url')); ?>"><?php esc_html_e('Link here:', 'eronment'); ?></label>
            <input placeholder="<?php esc_attr(esc_html_e('Link here', 'eronment')); ?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('url')); ?>" name="<?php echo esc_attr($this->get_field_name('url')); ?>" type="text" value="<?php echo esc_attr($url); ?>" />
        </p>
            
		<?php 
	}
	
}
/*==============Our Brochures=============*/

class eronment_Brochures extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'eronment_Brochures', /* Name */esc_html__('Theme Brochures','eronment'), array( 'description' => esc_html__('Show the info Our Brochures', 'eronment' )) );
	}
	
	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget); ?>
        	
            <!-- Sidebar brochure-->
            <div class="sidebar-widget sidebar-brochure">
                <a class="brochure" href="<?php echo esc_url($instance['pdf']); ?>"><span class="icon flaticon-pdf"></span> <?php esc_html_e('DetailsBrochure.pdf', 'eronment'); ?></a>
            </div>
            
		<?php
		
		echo wp_kses_post($after_widget);
	}
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['pdf'] = $new_instance['pdf'];

		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$pdf = ( $instance ) ? esc_attr($instance['pdf']) : '#';
		?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('pdf')); ?>"><?php esc_html_e('PDF Link:', 'eronment'); ?></label>
            <input placeholder="<?php esc_attr(esc_html_e('PDF link here', 'eronment')); ?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('pdf')); ?>" name="<?php echo esc_attr($this->get_field_name('pdf')); ?>" type="text" value="<?php echo esc_attr($pdf); ?>" />
        </p>
        
		<?php 
	}
	
}
/*==============About Us=============*/

class eronment_AboutUs extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'eronment_AboutUs', /* Name */esc_html__('Theme About & Subscribe','eronment'), array( 'description' => esc_html__('Show the information about company', 'eronment' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$options = _WSH()->option();
		$title = apply_filters( 'widget_title', $instance['title'] );
		echo wp_kses_post($before_widget); ?>
      		<div class="subscribe-widget footer-widget">
					<?php echo wp_kses_post($before_title.$title.$after_title); ?>
					<div class="text">
						<p><?php echo wp_kses_post($instance['content']); ?></p>
					</div>
					<div class="subscribe-form">
						<form action="http://feedburner.google.com/fb/a/mailverify">
							<input type="hidden" id="uri2" name="uri" value="<?php echo esc_url($instance['id']); ?>">
                                <input type="email" name="email" placeholder="<?php esc_attr(esc_html_e('Enter Your Email', 'eronment')); ?>">
							<div class="button"><a href="#" class="btn-one"><?php wp_kses_post(esc_html_e('Subscribe', 'eronment')); ?></a></div>
						</form>
					</div>
				</div>
            

            
		<?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['logo_image'] = $new_instance['logo_image'];
		$instance['content'] = $new_instance['content'];
		$instance['id'] = $new_instance['id'];
		$instance['show'] = $new_instance['show'];
        $instance['title'] = strip_tags($new_instance['title']);
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$logo_image = ( $instance ) ? esc_attr($instance['logo_image']) : get_template_directory_uri().'/images/logo-footer.png';
		$content = ($instance) ? esc_attr($instance['content']) : '';
		$id = ($instance) ? esc_attr($instance['id']) : '#';
		$show = ($instance) ? esc_attr($instance['show']) : '';
		$title = ( $instance ) ? esc_attr($instance['title']) : esc_html__('Recent News', 'eronment');
		?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title: ', 'eronment'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('content')); ?>"><?php esc_html_e('Content:', 'eronment'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('content')); ?>" name="<?php echo esc_attr($this->get_field_name('content')); ?>" ><?php echo wp_kses_post($content); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('id')); ?>"><?php esc_html_e('Newsletter ID:', 'eronment'); ?></label>
            <input placeholder="<?php esc_attr(esc_html_e('newsletter id here', 'eronment')); ?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('id')); ?>" name="<?php echo esc_attr($this->get_field_name('id')); ?>" type="text" value="<?php echo esc_attr($id); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('show')); ?>"><?php esc_html_e('Newsletter ID Show/Hide:', 'eronment'); ?></label>
   			<?php $selected = ( $show ) ? ' checked="checked"' : ''; ?>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('show')); ?>"<?php echo esc_attr($selected); ?> name="<?php echo esc_attr($this->get_field_name('show')); ?>" type="checkbox" value="true" />
        </p>
                
		<?php 
	}
	
}

/*==============Contact Us=============*/

class eronment_ContactUs extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'eronment_ContactUs', /* Name */esc_html__('Theme Contact Us','eronment'), array( 'description' => esc_html__('Show the information about company', 'eronment' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		$options = _WSH()->option();
		echo wp_kses_post($before_widget); ?>
        
        	<div class="info-widget">
                <?php echo wp_kses_post($before_title.$title.$after_title); ?>
                
                <div class="widget-content">
                    <ul class="list-style-one widcontact">
                        <li><span class="icon fa fa-map-marker"></span><?php echo wp_kses_post($instance['address']); ?></li>
                        <li><span class="icon fa fa-phone"></span><?php echo wp_kses_post($instance['phone']); ?></li>
                        <li><span class="icon fa fa-envelope"></span><?php echo sanitize_email($instance['email']); ?></li>
                    </ul>
                    
                    <?php if( $instance['show'] ):
					if(eronment_set($options, 'head_social')):
					if(eronment_set( $options, 'social_media' ) && is_array( eronment_set( $options, 'social_media' ) )): ?>
                    <ul class="social-icon-one">
                    	<?php $social_icons = eronment_set( $options, 'social_media' );
						foreach( eronment_set( $social_icons, 'social_media' ) as $social_icon ):
						if( isset( $social_icon['tocopy' ] ) ) continue; ?>
						<li><a href="<?php echo esc_url(eronment_set( $social_icon, 'social_link')); ?>" target="_blank"><span class="fa <?php echo esc_attr(eronment_set( $social_icon, 'social_icon')); ?>"></span></a></li>
						<?php endforeach; ?>
                    </ul>
                    <?php endif; endif; endif; ?>
                </div>
            </div>
            
		<?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = $new_instance['title'];
		$instance['address'] = $new_instance['address'];
		$instance['phone'] = $new_instance['phone'];
		$instance['email'] = $new_instance['email'];
		$instance['show'] = $new_instance['show'];

		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ( $instance ) ? esc_attr($instance['title']) : 'Our Address';
		$address = ( $instance ) ? esc_attr($instance['address']) : '60 Grant Ave. Central New Road 0708, UK';
		$phone = ( $instance ) ? esc_attr($instance['phone']) : '+880 1723 801 729';
		$email = ( $instance ) ? esc_attr($instance['email']) : 'eronmentco346@email.com';
		$show = ($instance) ? esc_attr($instance['show']) : '';
		?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'eronment'); ?></label>
            <input placeholder="<?php esc_attr(esc_html_e('Title', 'eronment')); ?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('address')); ?>"><?php esc_html_e('Address:', 'eronment'); ?></label>
            <input placeholder="<?php esc_attr(esc_html_e('Address', 'eronment')); ?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('address')); ?>" name="<?php echo esc_attr($this->get_field_name('address')); ?>" type="text" value="<?php echo esc_attr($address); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('phone')); ?>"><?php esc_html_e('Phone:', 'eronment'); ?></label>
            <input placeholder="<?php esc_attr(esc_html_e('Phone', 'eronment')); ?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('phone')); ?>" name="<?php echo esc_attr($this->get_field_name('phone')); ?>" type="text" value="<?php echo esc_attr($phone); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('email')); ?>"><?php esc_html_e('Email:', 'eronment'); ?></label>
            <input placeholder="<?php esc_attr(esc_html_e('Email', 'eronment')); ?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('email')); ?>" name="<?php echo esc_attr($this->get_field_name('email')); ?>" type="text" value="<?php echo esc_attr($email); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('show')); ?>"><?php esc_html_e('Social Icons Show/Hide:', 'eronment'); ?></label>
   			<?php $selected = ( $show ) ? ' checked="checked"' : ''; ?>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('show')); ?>"<?php echo esc_attr($selected); ?> name="<?php echo esc_attr($this->get_field_name('show')); ?>" type="checkbox" value="true" />
        </p>
                
		<?php 
	}
	
}

/*==============Subscribe=============*/

class eronment_Subscribeus extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'eronment_Subscribeus', /* Name */esc_html__('Theme Subscribe Us','eronment'), array( 'description' => esc_html__('Show the information Subscribe company', 'eronment' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget);?>
			
			<div class="newsletter-widget footer-colmun">
			<?php echo wp_kses_post($before_title.$title.$after_title); ?>
			<div class="text">
				<p><?php echo wp_kses_post($instance['content']); ?></p>
			</div>                            
			<div class="emailed-form">
				<form target="popupwindow" method="post" role="form" action="http://feedburner.google.com/fb/a/mailverify" accept-charset="utf-8" id="subscribe2" name="mc-embedded-subscribe-form" novalidate>
					<div class="form-group">
						<input type="text" name="email" id="newsletter_input2" placeholder="<?php esc_attr(esc_html_e('Enter Email', 'eronment'));?>">
						<input type="hidden" id="uri2" name="uri" value="<?php echo wp_kses_post($id); ?>">
						<button type="submit" class="theme-btn"><span class="fa fa-angle-right"></span></button>
					</div>
				</form>
			</div>
			<div class="socials-link-one">
			<?php if( $instance['show'] ): ?>		
				<ul>
					<?php echo wp_kses_post(eronment_bunch_get_social_icons()); ?>
				</ul>
			<?php endif; ?>		
			</div>
		</div>
			

		<?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);
		$instance['content'] = $new_instance['content'];
		$instance['show'] = $new_instance['show'];

		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ($instance) ? esc_attr($instance['title']) : 'Subscribe';
		$content = ($instance) ? esc_attr($instance['content']) : '';
		$show = ( $instance ) ? esc_attr($instance['show']) : '';?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'eronment'); ?></label>
            <input placeholder="<?php esc_attr(esc_html_e('About Us', 'eronment'));?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('content')); ?>"><?php esc_html_e('Content:', 'eronment'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('content')); ?>" name="<?php echo esc_attr($this->get_field_name('content')); ?>" ><?php echo wp_kses_post($content); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('show')); ?>"><?php esc_html_e('Show Social Icons:', 'eronment'); ?></label>
			<?php $selected = ( $show ) ? ' checked="checked"' : ''; ?>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('show')); ?>"<?php echo esc_attr($selected); ?> name="<?php echo esc_attr($this->get_field_name('show')); ?>" type="checkbox" value="true" />
        </p>        
                
		<?php 
	}
	
}


/*=========About Us With Map ======*/
class eronment_Aboutus2 extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'eronment_Aboutus2', /* Name */esc_html__('Theme About & Map','eronment'), array( 'description' => esc_html__('Show the information about company', 'eronment' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget);?>
      		
			 <div class="footer-about footer-colmun">
				<div class="footer-logo">
					<figure>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url($instance['link']); ?>" alt="<?php esc_attr_e('Image', 'eronment');?>"></a>
					</figure>
				</div>
				<div class="text">
					<p><?php echo wp_kses_post($instance['content']); ?></p>
				</div>
				<figure>
					<img src="<?php echo esc_url($instance['link1']); ?>" alt="<?php esc_attr_e('Image', 'eronment');?>">
				</figure>
			</div>
		<?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);
		$instance['content'] = $new_instance['content'];
		$instance['link'] = $new_instance['link'];
		$instance['link1'] = $new_instance['link1'];

		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ($instance) ? esc_attr($instance['title']) : 'About Us';
		$content = ($instance) ? esc_attr($instance['content']) : '';
		$link = ($instance) ? esc_attr($instance['link']) : '';
		$show = ( $instance ) ? esc_attr($instance['show']) : '';?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'eronment'); ?></label>
            <input placeholder="<?php esc_attr(esc_html_e('About Us', 'eronment'));?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
		<p>
            <label for="<?php echo esc_attr($this->get_field_id('link')); ?>"><?php esc_html_e('Image Link:', 'eronment'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('link')); ?>" name="<?php echo esc_attr($this->get_field_name('link')); ?>" ><?php echo wp_kses_post($link); ?></textarea>
        </p>
		<p>
            <label for="<?php echo esc_attr($this->get_field_id('link1')); ?>"><?php esc_html_e('Map Image:', 'eronment'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('link1')); ?>" name="<?php echo esc_attr($this->get_field_name('link1')); ?>" ><?php echo wp_kses_post($link1); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('content')); ?>"><?php esc_html_e('Content:', 'eronment'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('content')); ?>" name="<?php echo esc_attr($this->get_field_name('content')); ?>" ><?php echo wp_kses_post($content); ?></textarea>
        </p>
              
		<?php 
	}
	
}

/*=========About Us With Social Icon ======*/

class eronment_Aboutus3 extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'eronment_Aboutus3', /* Name */esc_html__('Theme About & Social','eronment'), array( 'description' => esc_html__('Show the information about company', 'eronment' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget);?>
      		
			<!--Footer Column-->
            <div class="footer-widget logo-widget">
						<div class="logo">
							<a href="#"><img src="<?php echo esc_url($instance['link']); ?>" alt="<?php esc_attr_e('Image', 'eronment');?>"></a>
						</div>
                                    <div class="text"><?php echo wp_kses_post($instance['content']); ?></div>
					<?php if( $instance['show'] ): ?>
					<ul class="social-icon-two">
						<?php echo wp_kses_post(eronment_bunch_get_social_icons()); ?>
					</ul>
					<?php endif; ?>	
                </div>
			
			

		<?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);
		$instance['content'] = $new_instance['content'];
		$instance['show1'] = $new_instance['show1'];
		$instance['link'] = $new_instance['link'];
		$instance['show'] = $new_instance['show'];

		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ($instance) ? esc_attr($instance['title']) : 'About Us';
		$content = ($instance) ? esc_attr($instance['content']) : '';
		$show1 = ( $instance ) ? esc_attr($instance['show1']) : '';
		$link = ($instance) ? esc_attr($instance['link']) : '';
		$show = ( $instance ) ? esc_attr($instance['show']) : '';?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'eronment'); ?></label>
            <input placeholder="<?php esc_attr(esc_html_e('About Us', 'eronment'));?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
		 <p>
            <label for="<?php echo esc_attr($this->get_field_id('show1')); ?>"><?php esc_html_e('Show Image :', 'eronment'); ?></label>
			<?php $selected = ( $show1 ) ? ' checked="checked"' : ''; ?>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('show1')); ?>"<?php echo esc_attr($selected); ?> name="<?php echo esc_attr($this->get_field_name('show1')); ?>" type="checkbox" value="true" />
        </p> 
		<p>
            <label for="<?php echo esc_attr($this->get_field_id('link')); ?>"><?php esc_html_e('Image Link:', 'eronment'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('link')); ?>" name="<?php echo esc_attr($this->get_field_name('link')); ?>" ><?php echo wp_kses_post($link); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('content')); ?>"><?php esc_html_e('Content:', 'eronment'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('content')); ?>" name="<?php echo esc_attr($this->get_field_name('content')); ?>" ><?php echo wp_kses_post($content); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('show')); ?>"><?php esc_html_e('Show Social Icons:', 'eronment'); ?></label>
			<?php $selected = ( $show ) ? ' checked="checked"' : ''; ?>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('show')); ?>"<?php echo esc_attr($selected); ?> name="<?php echo esc_attr($this->get_field_name('show')); ?>" type="checkbox" value="true" />
        </p>        
                
		<?php 
	}
	
}

/*=========Call to Action =============*/
class eronment_CalltoAction extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'eronment_CalltoAction', /* Name */esc_html__('Theme Call to Action','eronment'), array( 'description' => esc_html__('Show Call to Action', 'eronment' )) );
	}
	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget);?>
      
		 <div class="any-questions text-center" style="background: url(<?php echo esc_url($instance['image']); ?>);">
			<div class="title-text">
				<p><?php echo wp_kses_post($instance['content']); ?> <br><?php echo wp_kses_post($instance['content1']); ?></p>
			</div>
			<h6><i class="fa fa-phone" aria-hidden="true"></i> <?php echo wp_kses_post($instance['content2']); ?></h6>
			<div class="link-btn">
				<a href="<?php echo esc_url($instance['link']); ?>" class="theme-btn btn-style-six"><?php echo wp_kses_post($instance['button']); ?></a>
			</div>                           
		</div>
		
		<?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);
		$instance['image'] = $new_instance['image'];
		$instance['content'] = $new_instance['content'];
	    $instance['content1'] = $new_instance['content1'];
		$instance['content2'] = $new_instance['content2'];
		$instance['button'] = $new_instance['button'];
		$instance['link'] = $new_instance['link'];
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ($instance) ? esc_attr($instance['title']) : '';
		$image = ($instance) ? esc_attr($instance['image']) : '';
		$content = ($instance) ? esc_attr($instance['content']) : '';
		$content1 = ($instance) ? esc_attr($instance['content1']) : '';
		$content2 = ($instance) ? esc_attr($instance['content2']) : '';
		$button = ($instance) ? esc_attr($instance['button']) : '';
		$link = ($instance) ? esc_attr($instance['link']) : '';

		?>
       <p>
            <label for="<?php echo esc_attr($this->get_field_id('image')); ?>"><?php esc_html_e('Image Link:', 'eronment'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('image')); ?>" name="<?php echo esc_attr($this->get_field_name('image')); ?>" ><?php echo wp_kses_post($image); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('content')); ?>"><?php esc_html_e('Content:', 'eronment'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('content')); ?>" name="<?php echo esc_attr($this->get_field_name('content')); ?>" ><?php echo wp_kses_post($content); ?></textarea>
        </p>
		<p>
            <label for="<?php echo esc_attr($this->get_field_id('content1')); ?>"><?php esc_html_e('Content Two:', 'eronment'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('content1')); ?>" name="<?php echo esc_attr($this->get_field_name('content1')); ?>" ><?php echo wp_kses_post($content1); ?></textarea>
        </p>
		<p>
            <label for="<?php echo esc_attr($this->get_field_id('content2')); ?>"><?php esc_html_e('Content Three:', 'eronment'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('content2')); ?>" name="<?php echo esc_attr($this->get_field_name('content2')); ?>" ><?php echo wp_kses_post($content2); ?></textarea>
        </p>
		<p>
            <label for="<?php echo esc_attr($this->get_field_id('button')); ?>"><?php esc_html_e('Button:', 'eronment'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('button')); ?>" name="<?php echo esc_attr($this->get_field_name('button')); ?>" ><?php echo wp_kses_post($button); ?></textarea>
        </p>
		<p>
            <label for="<?php echo esc_attr($this->get_field_id('link')); ?>"><?php esc_html_e('Button Link:', 'eronment'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('link')); ?>" name="<?php echo esc_attr($this->get_field_name('link')); ?>" ><?php echo wp_kses_post($link); ?></textarea>
        </p>
		
		
		<?php 
	}
	
}
/*===============Contact Us-2================*/
class eronment_ContactUs2 extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'eronment_ContactUs2', /* Name */esc_html__('Theme Contact Us-2','eronment'), array( 'description' => esc_html__('Show the Contact company', 'eronment' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget);?>
      	
		<!--Contact Info Widget-->
		<div class="sidebar-widget contact-info-widget-two">
			<div class="inner-content">
				<div class="icon-box">
					<span class="icon flaticon-telephone"></span>
				</div>
				<div class="text"><?php echo wp_kses_post($instance['content']); ?></div>
				<div class="number"><?php echo wp_kses_post($instance['content1']); ?></div>
				<div class="email"><?php echo wp_kses_post($instance['content2']); ?></div>
			</div>
		</div>
		<?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);
		$instance['content'] = $new_instance['content'];
	    $instance['content1'] = $new_instance['content1'];
		$instance['content2'] = $new_instance['content2'];
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ($instance) ? esc_attr($instance['title']) : '';
		$content = ($instance) ? esc_attr($instance['content']) : '';
		$content1 = ($instance) ? esc_attr($instance['content1']) : '';
		$content2 = ($instance) ? esc_attr($instance['content2']) : '';

		?>
       
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('content')); ?>"><?php esc_html_e('Content:', 'eronment'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('content')); ?>" name="<?php echo esc_attr($this->get_field_name('content')); ?>" ><?php echo wp_kses_post($content); ?></textarea>
        </p>
		<p>
            <label for="<?php echo esc_attr($this->get_field_id('content1')); ?>"><?php esc_html_e('Content Two:', 'eronment'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('content1')); ?>" name="<?php echo esc_attr($this->get_field_name('content1')); ?>" ><?php echo wp_kses_post($content1); ?></textarea>
        </p>
		<p>
            <label for="<?php echo esc_attr($this->get_field_id('content2')); ?>"><?php esc_html_e('Content Three:', 'eronment'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('content2')); ?>" name="<?php echo esc_attr($this->get_field_name('content2')); ?>" ><?php echo wp_kses_post($content2); ?></textarea>
        </p>
		<?php 
	}
	
}

?>