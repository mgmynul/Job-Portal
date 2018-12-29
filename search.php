<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package Blue_Planet
 */

get_header(); ?>

	<section id="primary" class="content-area col-md-8 col-sm-12 col-xs-12 <?php echo esc_attr( blue_planet_layout_setup_class() ); ?>">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
            <center>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- bdjobs -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-1772388177538391"
     data-ad-slot="6861774440"
     data-ad-format="link"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>

<br>
<div class="salary">
<center><strong>-- Search Here --</strong></center>
<?php echo do_shortcode( '[searchandfilter taxonomies="category,search"]' ); ?>
</div>
            </center>
			</header><!-- .page-header -->

			<?php while ( have_posts() ) : the_post(); ?>

				<div class="new_job">
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?> </a> </h2>

				<div class="salary">
				<div class="jobthumb">
                              <?php if ( has_post_thumbnail() ) : ?>
    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
        <?php the_post_thumbnail(); ?>

    </a>
<?php endif; ?>

				</div>
				<br>
				<strong>Published-on:</strong> <?php echo(types_render_field( "published-on", array( 'raw => true') )); ?><br>
				

				<br>
				 <?php echo(types_render_field( "job-discription", array( 'raw => true') )); ?>
				 <br>

				 <div class="readmore">
				 <a href="<?php the_permalink(); ?>">View More</a>
				 </div>
				 
				</div>
				
				<br><br>
				</div>

			<?php endwhile; ?>
<center>
			<?php
			the_posts_pagination( array(
				'prev_text' => _x( '&larr; Previous', 'posts navigation', 'blue-planet' ),
				'next_text' => _x( 'Next &rarr;',     'posts navigation', 'blue-planet' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'blue-planet' ) . ' </span>',
			) );
			?>
</center>
		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
