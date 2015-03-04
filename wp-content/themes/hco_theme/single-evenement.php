<?php
/**
*	Template Name: Agenda
*/
 ?>
<?php get_header(); ?>

	<div class="gdlr-content">
		<div class="section-container container">
			<div class="twelve columns">
				<?php

				if(have_posts()) : while(have_posts()) : the_post(); ?>
				<?php
					$date_de_debut = strtotime( get_field('date_de_debut') );
					$date_de_fin = get_field('date_de_fin');
					$heure = get_field('heure');
					$lieu = get_field('lieu');
					$adresse = get_field('adresse');
					$contact = get_field('contact');
					$tarif = get_field('tarif');
				?>
				<div class="event_single">
					<h1 class="event_title"><?php the_title(); ?></h1>
					<h3 class="event_infos">
						<?php
					if($lieu ){
						echo '<p><span class="lieu">'.$lieu.'</span>';
					}
					if($date_de_debut || $date_de_fin){
						$date_de_debut = date( 'j/m/Y', $date_de_debut);

						if($date_de_debut && $date_de_fin){
							echo '<span class="date">Le '.$date_de_debut.' à '.$date_de_fin.'</span>&nbsp;';
						} elseif($date_de_debut) {
							echo '<span class="date">Le '.$date_de_debut.'</span>&nbsp;';
						}
					}

					if($heure){
						echo '<span class="heure">à '.$heure.'</span>&nbsp;';
					}

					if($tarif){
						echo '<span class="tarif">Tarif : '.$tarif.' &euro;</span></p>';
					}
					?>
					</h3>

					<?php if(has_post_thumbnail()){
						the_post_thumbnail('blog', array('class' => 'event_thumbnail'));
					} ?>

					<div class="desc"><?php the_content(); ?></div>


				<?php

					if($adresse){
						echo '<div class="six columns">';
						echo '<h3>Adresse</h3>';
						echo '<p class="adresse">'.$adresse.'</p>';
						echo '</div>';
					}
					if($contact){
						echo '<div class="six columns">';
						echo '<h3>Pour plus d\'informations</h3>';
						echo '<p>Vous pouvez contacter</p>';
						echo '<p class="contact">'.$contact.'</p>';
						echo '</div>';
					}
				?>
				</div>

				<?php endwhile; else : echo 'Aucun évènement de prévu pour le moment. Repassez nous voir bientôt.'; endif; ?>
			</div>

		</div>
	</div><!-- gdlr-content -->
<?php get_footer(); ?>