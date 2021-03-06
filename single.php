<?php
get_header();
?>
	<!-- Page Content -->
	<div class="container">

		<h1 class="my-4 text-center text-lg-left">作品</h1>

		<?php
		if ( have_posts() ):
			?>
			<div class="row text-center text-lg-left mb-5">
				<?php
				while ( have_posts() ):
					the_post();

					get_template_part( 'template-parts/content', get_post_type() );

				endwhile;
				?>
			</div>
		<?php
		endif;
		?>

	</div>
	<!-- /.container -->

<?php
get_footer();
