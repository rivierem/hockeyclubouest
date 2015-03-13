<?php
/**
*	Template Name: Agenda
*/
 ?>
<?php get_header(); ?>

	<div class="gdlr-content">
		<div class="section-container container">
			<div class="twelve columns">
				<h1>Découvrez les évènements à venir !</h1>
				<?php echo do_shortcode('[gdlr_divider type="double-dotted" ]'); ?>

				<?php
				//Custom query for documents
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$today = time();
				$d = date("Y-m-d");
				$args = array (
					'post_type'              => 'evenement',
					'paged' => $paged,
					'posts_per_page'	=> 10,
					'meta_key' => 'date_de_debut',
		            'orderby' => 'meta_value_num',
		            'order' => 'ASC'
				);

				$agenda = new WP_Query( $args );

				?>
				<div class="pagination_link">
				<?php
					$big = 999999999; // need an unlikely integer

					echo paginate_links( array(
						'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
						'format' => '?paged=%#%',
						'current' => max( 1, get_query_var('paged') ),
						'total' => $agenda->max_num_pages
					) );
					?>
					</div>
					<div class="clear"></div>
				<?php

				if($agenda->have_posts()) : while($agenda->have_posts()) : $agenda->the_post();
					$date_de_debut = strtotime( get_field('date_de_debut'));
					$date_de_fin = strtotime(get_field('date_de_fin'));
					$heure = get_field('heure');
					$lieu = get_field('lieu');
					$tarif = get_field('tarif');


					if($today > $date_de_debut){
						//Nothing
					} else {
					?>
					<div class="event_wrapper <?php echo $class; ?>">

						<?php
						if(has_post_thumbnail()){

							$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'thumbnail' );

							// the_post_thumbnail('thumbnail', array('class' => 'alignleft'));
						} ?>
						<div style="background: url(<?php echo $large_image_url[0]; ?>);" class="square_date alignleft">
					<?php
						if($date_de_debut || $date_de_fin){
							if($date_de_debut && $date_de_fin){
								echo '<p class="debut_fin">'.date( 'j/m', $date_de_debut ).'<br /><span>au</span><br />'.date( 'j/m', $date_de_fin ).'</p>';
							} elseif($date_de_debut) {
								echo '<p class="debut">'.date( 'j/m', $date_de_debut );
							}
						}
						?>
						</div>
						<h3 class="titre_agenda"><?php the_title(); ?></h3>
						<div class="infos_agenda">
						<?php
						if($heure){
							echo '<span class="heure">'.$heure.'</span>';
						}
						if($lieu){
							echo '<span class="lieu">'.$lieu.'</span>';
						}
						if($tarif){
							echo '<span class="tarif">TARIF : '.$tarif.' &euro;</span>';
						}
						?>
						</div>
						<div class="desc"><?php echo my_excerpt(25); ?></div>
						<a href="<?php the_permalink(); ?>" class="gdlr-button medium with-border alignright">Plus de détails</a>
						<div class="clear"></div>
					</div>
					<?php } ?>

				<?php endwhile; else : echo 'Aucun évènement de prévu pour le moment. Repassez nous voir bientôt.'; endif; ?>
				<div class="clear"></div>
				<div class="pagination_link">
			<?php
				echo paginate_links( array(
					'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
					'format' => '?paged=%#%',
					'current' => max( 1, get_query_var('paged') ),
					'total' => $agenda->max_num_pages
				) );
			?>
			<div class="clear"></div>
			</div>
			</div>

		</div>
	</div><!-- gdlr-content -->
<?php get_footer(); ?>
