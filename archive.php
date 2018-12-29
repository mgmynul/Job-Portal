<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Blue_Planet
 */

get_header(); ?>

	<section id="primary" class="content-area col-md-8 col-sm-12 col-xs-12 <?php echo esc_attr( blue_planet_layout_setup_class() ); ?>">
		<main id="main" class="site-main" role="main">




		<?php if ( have_posts() ) : ?>

			<header class="page-header">
            <?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="taxonomy-description">', '</div>' );
			?>
			</header><!-- .page-header -->

			<?php while ( have_posts() ) : the_post(); ?>

				<div class="new_job">
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

				<div class="salary">
				<div class="jobthumb">
                              <?php if ( has_post_thumbnail() ) : ?>
    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
        <?php the_post_thumbnail(); ?>

    </a>
<?php endif; ?>

				</div>
				
<br><strong>Published-on:</strong> <?php echo(types_render_field( "published-on", array( 'raw => true') )); ?><br>
				<br>
				<?php echo(types_render_field( "job-discription", array( 'raw => true') )); ?><br>
				 <div class="readmore">
				 <a href="<?php the_permalink(); ?>">View More</a>
				 </div>
				 
				</div>
				
				<br><br>
				</div>

			<?php endwhile; ?>
			<?php
			the_posts_pagination( array(
				'prev_text' => _x( '&larr; Previous', 'posts navigation', 'blue-planet' ),
				'next_text' => _x( 'Next &rarr;',     'posts navigation', 'blue-planet' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'blue-planet' ) . ' </span>',
			) );
			?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>