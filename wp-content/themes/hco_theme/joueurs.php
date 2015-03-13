<?php
/**
*	Template Name: Équipe
*/
 ?>
<?php get_header(); ?>

	<div class="gdlr-content">
		<div class="section-container container">
			<div class="twelve columns">
				<?php
				$args = array (
					'post_type'              => 'joueurs',
					'order'					 => 'ASC',
					'posts_per_pages'		=> -1
				);
				$j_query = new WP_Query( $args );

				if($j_query->have_posts()) : 
						$terms = get_terms("cat_joueur");
						$count = count($terms);
						if ($count > 0 ){
					     echo '<ul id="filter-list">';
					     echo '<li class="filter" data-filter="all">All</li>';
					     foreach ( $terms as $term ) {
					         echo '<li class="filter" data-filter="' . $term->slug . '">' . $term->name . '</li>';
					     }
					     echo "</ul>";
					 } ?>
					 <div class="mixit">
					<?php
					while($j_query->have_posts()) : $j_query->the_post(); ?>
					<?php
					$id = get_the_ID();
					$categories = wp_get_post_terms( $id, 'cat_joueur');
					$filter = '';
					foreach ($categories as $categorie) {
						$filter .= $categorie->slug.' ';
					}
					?>
					<div class="mix player_wrapper four columns <?php echo $filter; ?>">
						<a href="<?php the_permalink(); ?>">
						<?php
						if(has_post_thumbnail()){
							the_post_thumbnail( 'thumbnail', array( 'class' => 'aligncenter circular-img' ) );
						} else {
							echo '<img class="aligncenter circular-img" src="http://localhost/websites/hockeyclubouest/wp-content/uploads/user_profile_pic-150x150.png" alt="">';
						}
						?>

						<h3 class="center"><?php the_title(); ?></h3>
						</a>
						<div class="infos">
							<?php
							$poste = get_field('poste');
							if($poste){
								echo '<h4 class="center">'.$poste.'</h4>';
							}
							?>
						</div>
						<div class="clear"></div>
					</div>

				<?php endwhile; ?>
				</div>
				<?php else : echo 'Nothing'; endif; ?>

			</div>

		</div>
	</div><!-- gdlr-content -->
<?php get_footer(); ?>