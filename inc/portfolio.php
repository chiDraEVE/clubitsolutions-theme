<?php
	/**
	 * getting Array of team-members
	 *
	 * @return WP_Query     query to get custom posts of type 'team-member'
	 */
	function getPortfolioItems() {
		// Restore original Post Data
		wp_reset_postdata();

		return new WP_Query(array(
			'post_type' => 'portfolio-item',
			'posts_per_page' => -1
		));
	}

	function portfolio() { ?>

		<div  class="clubitsolutions__portfolio">
			<h2 id="portfolio" class="clubitsolutions__portfolio__title ">Portfolio</h2>

			<?php
				$portfolioItems = getPortfolioItems();
				while ($portfolioItems->have_posts()) {
					$portfolioItems->the_post();
					$tutor = get_field('tutor')[0];


			?>
			<div class="clubitsolutions__portfolio__item">
			<?php
				echo '<a href="' . get_permalink() . '">';
				the_title('<h4 class="clubitsolutions__portfolio__title">', '</h4>');
				echo '</a>';
			?>
				<div class="clubitsolutions__portfolio__keywords">
					<ul class="clubitsolutions__portfolio__keywords__list">
						<?php
							$keywords = get_field('keywords');
							foreach ( $keywords as $keyword ) {
								echo '<li class="clubitsolutions__portfolio__keywords__item">' . $keyword . '</li>';
							}
						?>
					</ul>
				</div>
			<?php
				echo '<h6 class="clubitsolutions__portfolio__category">' . get_field('kategorie') . '</h6>';

				echo '<a href="' . get_permalink() . '">';
				echo get_the_post_thumbnail(get_the_ID(), 'medium-large');
				echo '</a>';
			?>
				<div class="clubitsolutions__portfolio__excerpt">
					<?php the_excerpt(); ?>
				</div>
				<div class="clubitsolutions__portfolio__links">
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
			</div>
			<?php
				}
				wp_reset_postdata();
			?>
			<h5>Weitere Projekte folgen...</h5>
		</div>
	<?php }
