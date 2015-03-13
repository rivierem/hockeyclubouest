<?php
/**
*	Template Name: Partenaires
*/
 ?>
<?php get_header(); ?>

	<div class="gdlr-content">
		<div class="section-container container">
			<div class="twelve columns">
				<!-- <h2><?php the_title(); ?></h2> -->
				<?php if (have_posts()) {
					the_post();
					the_content();
				} ?>
				<?php
				//Custom query for partenaires
				$args = array (
					'post_type'              => 'partenaire',
					'order'					 => 'ASC'
				);
				$p_query = new WP_Query( $args );

				if($p_query->have_posts()) : while($p_query->have_posts()) : $p_query->the_post(); ?>
					<div class="parternaire_wrapper">
						<?php

						if(has_post_thumbnail()){
							the_post_thumbnail( 'thumbnail',  array( 'class' => 'alignleft'));
						} else {
							echo '<img class="alignleft" src="http://localhost/websites/hockeyclubouest/wp-content/uploads/user_profile_pic-150x150.png" height="42" width="42" alt="">';
						}

						?>
						<h3><?php the_title(); ?></h3>
						<div class="desc">
							<?php the_content(); ?>
						</div>
						<?php
						$url_site = get_field('site_web');
						if($url_site){
							echo '<a class="gdlr-button medium with-border" href="'.$url_site.'" title="'.$url_site.'">Voir le site</a>';
						}
						?>
						<div class="clear"></div>
					</div>

				<?php endwhile; else : echo 'Nothing'; endif; ?>
			</div>

		</div>
	</div><!-- gdlr-content -->
<?php get_footer(); ?>