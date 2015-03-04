<?php
/**
*	Template Name: Agenda
*/
 ?>
<?php get_header(); ?>

	<div class="gdlr-content">
		<div class="section-container container">
			<div class="twelve columns">
				<!-- <h2><?php the_title(); ?></h2> -->
				<?php
				//Custom query for documents
				$today = time();
				$d = date("Y-m-d");
				$args = array (
					'post_type'              => 'evenement',
					'orderby'				 => 'meta_value',
					'order'					 => 'ASC'
				);

				$agenda = new WP_Query( $args );

				if($agenda->have_posts()) : while($agenda->have_posts()) : $agenda->the_post();
					$date_de_debut = strtotime( get_field('date_de_debut') );
					$date_de_fin = get_field('date_de_fin');
					$heure = get_field('heure');
					$lieu = get_field('lieu');
					$tarif = get_field('tarif');


					if($today > $date_de_debut){
						//Nothing
					} else {
					?>
					<div class="event_wrapper <?php echo $class; ?>">

						<?php if(has_post_thumbnail()){
							the_post_thumbnail('thumbnail', array('class' => 'alignleft'));
						} ?>
						<h3><?php the_title(); ?></h3>
						<div class="desc"><?php echo the_excerpt(); ?></div>

					<?php

						if($date_de_debut || $date_de_fin){
							if($date_de_debut && $date_de_fin){
								echo '<p>Date : '.$date_de_debut.' à '.$date_de_fin.'</p>';
							} elseif($date_de_debut) {
								echo '<p>Date : '.date( 'j/m/Y', $date_de_debut );
							}
						}
						if($heure){
							echo ' de '.$heure;
						}
						if($lieu){
							echo ' à '.$lieu.'<br />';
						}
						if($tarif){
							echo 'Tarif : '.$tarif.' &euro;</p>';
						}
						// }
						
					?>
						<a href="<?php the_permalink(); ?>" class="gdlr-button medium with-border">Plus de détails</a>
						<div class="clear"></div>
					</div>
					<?php } ?>

				<?php endwhile; else : echo 'Aucun évènement de prévu pour le moment. Repassez nous voir bientôt.'; endif; ?>
			</div>

		</div>
	</div><!-- gdlr-content -->
<?php get_footer(); ?>
