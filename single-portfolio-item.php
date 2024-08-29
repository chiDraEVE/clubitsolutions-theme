<?php
	/**
	 * The template for displaying single posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
	 *
	 * @package WordPress
	 * @subpackage Twenty_Twenty
	 * @since Twenty Twenty 1.0
	 */

	get_header();
?>

<main id="site-content" role="main">

	<?php

		if ( have_posts() ) {

			while ( have_posts() ) {
				the_post();
	?>
				<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

					<?php

						get_template_part( 'template-parts/entry-header' );

						if ( ! is_search() ) {
							echo '<a href="' . get_field('demo-site')['url']. '">';
							get_template_part( 'template-parts/featured-image' );
							echo '</a>';
						}

					?>

					<div class="post-inner <?php echo is_page_template( 'templates/template-full-width.php' ) ? '' : 'thin'; ?> ">

						<div class="entry-content">

							<?php
								if ( is_search() || ! is_singular() && 'summary' === get_theme_mod( 'blog_content', 'full' ) ) {
									the_excerpt();
								} else {
									the_content( __( 'Continue reading', 'twentytwenty' ) );
								}
							?>

							<div class="clubitsolutions__portfolio__links clubitsolutions__portfolio__links--singular">
								<?php $tutor = get_field('tutor')[0]; ?>
								<div class="clubitsolutions__portfolio__demo-site">
									<?php
										createIcon('icon-sphere', 'clubitsolutions__portfolio__icon');
										createLink(get_field('demo-site'), 'Demo');
									?>
								</div>
								<div class="clubitsolutions__portfolio__tutor">
									<?php createIcon('icon-graduation-cap', 'clubitsolutions__portfolio__icon'); ?>
									<a href="<?php the_permalink($tutor->ID) ?>"><?php echo $tutor->post_title ?></a>
								</div>
								<div class="clubitsolutions__portfolio__github--personal">
									<?php
										createIcon('icon-github', "clubitsolutions__portfolio__icon");
										createLink(get_field('github'), 'Meine GitHub-Repo');
									?>
								</div>
								<div class="clubitsolutions__portfolio__github--official">
									<?php
										createIcon('icon-github', "clubitsolutions__portfolio__icon");
										createLink(get_field('github-official'), 'GitHub-Repo des Authors');
									?>
								</div>
								<div class="clubitsolutions__portfolio__official-src">
									<?php
										createIcon('icon-udemy', 'clubitsolutions__portfolio__icon');
										createLink(get_field('official-src'), 'Offizielle Quelle');?>
								</div>
							</div>

						</div><!-- .entry-content -->

					</div><!-- .post-inner -->

					<div class="section-inner">
						<?php
							wp_link_pages(
								array(
									'before'      => '<nav class="post-nav-links bg-light-background" aria-label="' . esc_attr__( 'Page', 'twentytwenty' ) . '"><span class="label">' . __( 'Pages:', 'twentytwenty' ) . '</span>',
									'after'       => '</nav>',
									'link_before' => '<span class="page-number">',
									'link_after'  => '</span>',
								)
							);

							edit_post_link();

							// Single bottom post meta.
							twentytwenty_the_post_meta( get_the_ID(), 'single-bottom' );

							if ( post_type_supports( get_post_type( get_the_ID() ), 'author' ) && is_single() ) {

								get_template_part( 'template-parts/entry-author-bio' );

							}
						?>

					</div><!-- .section-inner -->

					<?php

						if ( is_single() ) {

							get_template_part( 'template-parts/navigation' );

						}

						/**
						 *  Output comments wrapper if it's a post, or if comments are open,
						 * or if there's a comment number – and check for password.
						 * */
						if ( ( is_single() || is_page() ) && ( comments_open() || get_comments_number() ) && ! post_password_required() ) {
							?>

							<div class="comments-wrapper section-inner">

								<?php comments_template(); ?>

							</div><!-- .comments-wrapper -->

							<?php
						}
					?>

				</article>
	<?php
			}
		}

	?>

</main><!-- #site-content -->

<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php get_footer(); ?>
