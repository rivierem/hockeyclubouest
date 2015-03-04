<?php get_header(); ?>

	<div class="gdlr-content">
		<div class="section-container container">
			<div class="twelve columns">

				<?php

				if(have_posts()) : while(have_posts()) : the_post(); ?>
					<div class="joueur_wrapper">
						<div class="entete five columns">
								<?php
								if(has_post_thumbnail()){
									the_post_thumbnail( 'thumbnail', array( 'class' => 'alignleft circular-img' ) );
								}
								?>
								<h3><?php the_title(); ?></h3>
								<?php
								$poste = get_field('poste');
								if($poste){
									echo '<h4 class="poste_joueur">'.$poste.'</h4>';
								}
								?>
				
							<?php
								$sexe = get_field('sexe');
								$date_de_naissance = get_field('date_de_naissance');

								if($sexe){
									echo 'Sexe : '.$sexe;
								}
								echo '<br />';
								if($date_de_naissance){
									echo 'Date de naissance : '.$date_de_naissance;
								}
							?>
						
						</div>
						<div class="seven columns">
							<h4>Biographie</h4>
							<div class="desc">
								<?php the_content(); ?>
							</div>
						</div>
						<div class="clear"></div>

				

						<h4>Mot du joueur : </h4>
						<div class="mot_joueur">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque, animi tempore blanditiis illum! Facilis dolor, id temporibus quod soluta omnis, ipsum illo eos praesentium iure vitae eius? Pariatur deserunt, exercitationem!
						</div>
						<div class="clear"></div>
					</div>

				<?php endwhile; else : echo 'Nothing'; endif; ?>
			</div>

		</div>
	</div><!-- gdlr-content -->
<?php get_footer(); ?>