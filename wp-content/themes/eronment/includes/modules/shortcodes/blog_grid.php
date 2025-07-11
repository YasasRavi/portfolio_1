<?php  
   global $post ;
   $count = 0;
   $paged = get_query_var('paged');
   $query_args = array('post_type' => 'post' , 'showposts' => $num , 'order_by' => $sort , 'order' => $order, 'paged'=>$paged);
   if( $cat ) $query_args['category_name'] = $cat;
   $query = new WP_Query($query_args) ; 
   ?>
<?php if($query->have_posts()):  ?>   
    <section class="blog-page-section">
    	<div class="auto-container">
        	<div class="inner-container">
                <div class="row clearfix">
                    
                     <?php while($query->have_posts()): $query->the_post();
        global $post ; 
        $post_meta = _WSH()->get_meta();
    ?>
					
                    <div class="news-block-two col-md-<?php echo esc_attr(wp_kses_post($column));?> col-sm-12 col-xs-12">
                        <div class="inner-box">
                            <div class="image">
                                <a href="<?php echo esc_url(get_permalink(get_the_id()));?>"><?php the_post_thumbnail();?></a>
                            </div>
                            <div class="lower-content">
                                <?php if(!$blog_postmeta == true): ?>
								<div class="upper-box clearfix">
                                    <?php if(!$blog_date == true): ?>
									<div class="posted-date"><?php echo get_the_date()?></div>
									<?php endif ; ?>
									
									
                                    <ul class="post-meta">
                                        
										<?php if(!$blog_author == true): ?>	
										<li><?php if (wp_kses_post($blog_authorby)) : ?>
										<?php echo wp_kses_post($blog_authorby);?>
										<?php else : ?>
										<?php esc_html_e('By: ', 'eronment');?>
										<?php endif ; ?>
										<?php the_author();?>
										<?php if (wp_kses_post($blog_symbol)) : ?>
										<?php echo wp_kses_post($blog_symbol);?>
										<?php else : ?>
										<?php esc_html_e(' ', 'eronment');?>
										<?php endif ; ?></li>
										<?php endif ; ?>
										
										<?php if($blog_tag == true): ?>
                                        <li><?php the_tags(); ?>
										<?php if (wp_kses_post($blog_symbol)) : ?>
										<?php echo wp_kses_post($blog_symbol);?>
										<?php else : ?>
										<?php esc_html_e(' ', 'eronment');?>
										<?php endif ; ?></li>
										<?php endif ; ?>
										
										<?php if(!$blog_comments == true): ?>
                                        <li><?php comments_number(); ?><?php if (wp_kses_post($blog_symbol)) : ?>
										<?php echo wp_kses_post($blog_symbol);?>
										<?php else : ?>
										<?php esc_html_e(' ', 'eronment');?>
										<?php endif ; ?></li>
										<?php endif ; ?>
										
                                    </ul>
                                </div><?php endif ; ?>
                                <div class="lower-box">
                                    <h3><a href="<?php echo esc_url(get_permalink(get_the_id()));?>"><?php the_title();?></a></h3>
                                    <div class="text"><?php echo wp_kses_post(eronment_trim(get_the_content(), $text_limit)); ?></div>
                                    
									<?php if(!$blog_readmore == true): ?>
									<?php if (wp_kses_post($read_titel)) : ?>
									<a href="<?php echo esc_url(get_permalink(get_the_id()));?>" class="theme-btn btn-style-one read-more"><?php echo wp_kses_post($read_titel);?></a>
									<?php else : ?>
									<a href="<?php echo esc_url(get_permalink(get_the_id()));?>" class="theme-btn btn-style-one read-more"><?php esc_html_e(' Read More ', 'eronment');?></a>
									<?php endif ; ?>
									<?php endif ; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    
					<?php endwhile;?>
                </div>
            </div>
        </div>
    </section>

<?php endif; wp_reset_postdata(); ?>

