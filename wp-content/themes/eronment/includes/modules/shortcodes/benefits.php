<!--Benefits Section-->
<section class="<?php echo esc_attr(wp_kses_post($class));?> benefits-section">
	<div class="auto-container">
		<div class="row clearfix">

			<!--Content Column-->
			<div class="content-column col-md-8 col-sm-12 col-xs-12">
				<div class="inner-column">
					<div class="sec-title">
						<h2><?php echo wp_kses_post($title);?></h2>
					</div>
					<div class="styled-text"><?php echo wp_kses_post($subtitle);?></div>
					<div class="text">
						<?php echo wp_kses_post($text);?>
					</div>
					<a href="<?php echo esc_url($link);?>" class="theme-btn btn-style-two"><?php echo wp_kses_post($btn);?></a>
				</div>
			</div>

			<!--Download Column-->
			<div class="download-column col-md-4 col-sm-12 col-xs-12">
				<div class="inner-column">
					<div class="upper-box">
						<div class="icon-box">
							<span class="icon <?php echo str_replace("icon ", "", esc_attr($icon));?>"></span>
						</div>
						<h3><?php echo wp_kses_post($title1);?></h3>
						<div class="styled-text"><?php echo wp_kses_post($subtitle1);?></div>
						<a href="<?php echo esc_url($link1);?>" class="theme-btn btn-style-one"><?php echo wp_kses_post($btn1);?></a>
					</div>
					<div class="lower-box">
						<ul>
							<li><a href="#"><?php echo wp_kses_post($text1);?></a></li>
							<li><a href="#"><?php echo wp_kses_post($text2);?></a></li>
						</ul>
					</div>
				</div>
			</div>

		</div>
	</div>
</section>
<!--End Benefits Section-->