<?php get_header(); ?>

	<div class="gdlr-content">
		<div class="section-container container">
			<div class="eight columns">
				<h2>Réglement simplifié</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero quisquam, blanditiis voluptates sapiente tenetur eveniet voluptas et dolor recusandae, quibusdam autem! Iure soluta, excepturi autem! Distinctio, sequi! Officia, eveniet consequatur!</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis fugiat dolor aspernatur sapiente ut, et voluptate quidem pariatur ex, sequi rerum consequuntur itaque, officia. Dignissimos omnis libero praesentium ab voluptas.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur possimus dolorum doloremque magnam labore adipisci ex ab sunt quia, necessitatibus doloribus molestias animi expedita inventore quisquam aliquam, deserunt amet itaque.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla optio debitis, itaque. Minima asperiores architecto molestias, iste dicta tenetur eaque ullam dolorum sint beatae temporibus deleniti rerum quibusdam, dolorem nulla!</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus id atque eligendi magnam, molestias velit, sequi! Reiciendis minus fuga dolor numquam explicabo, non maiores, nostrum magni atque tempore, nemo eligendi.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod, unde? Et pariatur quia quis incidunt, at eligendi fuga libero quam. Enim quia sapiente magnam minima, quas harum eveniet. Aut, quaerat!</p>
			</div>
			<div class="four columns">
				<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
					<h2>Téléchargement</h2>
					<?php
						$pdf_file = get_field('upload_du_reglement');

						echo '<p><a href="'.$pdf_file['url'].'" title="'.$pdf_file['title'].'">Télécharger le réglement</a> au format pdf.</p>';
					?>
				<?php endwhile; endif; ?>
			</div>

		</div>
	</div><!-- gdlr-content -->
<?php get_footer(); ?>