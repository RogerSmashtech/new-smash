<?php /* Template Name: Careers */ get_header(); ?>
<?php get_header(); ?>
<main class="careers">
	
		
				<!-- section -->

			<?php if (have_posts()): while (have_posts()) : the_post(); $hero = get_field('hero');	
					if ($hero): ?>
						<div class="container-fluid">
							<div class="row">
								<div class="col no-pad">
									<div class="hero" style="background: url('<?= $hero[image][url] ?>') no-repeat top center; background-size: cover;">
										<h1><?= $hero[title_label] ?></h1>
										<p><?= $hero[paragraph_content] ?></p>
										<i class="fa fa-chevron-down"></i>
									</div>

								</div><!-- .col -->
							</div><!-- .row -->
						</div>
					<? endif; ?>

					<? include get_template_directory() . '/inc/page_builder.php'; ?>



				<div class="list-open-careers">
					<div class="container">
						<div class="row">
							<div class="col">
								<h2 class="text-center">FIND YOUR OPPORTUNITY</h2>
							</div><!-- .col -->
						</div>

						<?php
/*
						 * Loop through Categories and Display Posts within
						 */
						$post_type = 'careers';
						 
						// Get all the taxonomies for this post type
						$taxonomies = get_object_taxonomies( array( 'post_type' => $post_type ) );
						 
						foreach( $taxonomies as $taxonomy ) :			 
					    // Gets every "category" (term) in this taxonomy to get the respective posts
					    $terms = get_terms( $taxonomy );
					    foreach( $terms as $term ) : ?>
					 		<h5><?= $term->name ?></h5>    
				        	<?php
						        $args = array(
			                'post_type' => $post_type,
			                'posts_per_page' => -1,  //show all posts
			                'tax_query' => array(
		                    array(
	                        'taxonomy' => $taxonomy,
	                        'field' => 'slug',
	                        'terms' => $term->slug,
		                    )
			                )
				            );
						        $posts = new WP_Query($args);
						        if( $posts->have_posts() ): while( $posts->have_posts() ) : $posts->the_post(); ?>
											<a href="<?php echo get_permalink(); ?>" title="Read more about <?php echo get_the_title(); ?>">
												<?php  echo get_the_title(); ?>
											</a>
						        <?php endwhile; endif; ?>
						    <?php endforeach;
						endforeach; ?>
					</div><!-- .container -->
				</div><!-- .list-open-careers -->


				<?php endwhile; ?>

				<?php else: ?>

					<!-- article -->
					<article>

						<h2><?php _e( 'Sorry, nothing to display.', 'wpbootstrapsass' ); ?></h2>

					</article>
					<!-- /article -->

				<?php endif; ?>


			
	</div><!-- /.container -->
</main>
<?php get_footer(); ?>

