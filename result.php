<?php
/**
 * WP Post Template: Result/Blog
 *
 */

get_header(); ?>

	<div id="primary" class="content-area col-md-8 col-sm-12 col-xs-12 <?php echo esc_attr( blue_planet_layout_setup_class() ); ?>">
		<main id="main" class="site-main" role="main">

		

		<div id="page" class="single">
	<div class="content">
		<!-- Start Article -->
	    <?php if($publishable_lite_single_breadcrumb_section == '1') { ?>
							<div class="breadcrumb" xmlns:v="http://rdf.data-vocabulary.org/#"><?php publishable_lite_the_breadcrumb(); ?></div>
						<?php } ?>
		<article class="article">		
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<div id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
					<div class="single_post">
				

						</header>
						<!-- Start Content -->

				

				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				
                
				<br>
				
				
						<div id="content" class="post-single-content box mark-links">
							<?php the_content(); ?>

							<?php wp_link_pages(array('before' => '<div class="pagination">', 'after' => '</div>', 'link_before'  => '<span class="current"><span class="currenttext">', 'link_after' => '</span></span>', 'next_or_number' => 'next_and_number', 'nextpagelink' => __('Next', 'publishable-mag' ), 'previouspagelink' => __('Previous', 'publishable-mag' ), 'pagelink' => '%','echo' => 1 )); ?>




							<?php if($publishable_lite_single_tags_section == '1') { ?>
							
								<!-- Start Tags --> 
								<div class="tags"><?php the_tags('<span class="tagtext">'.__('Tags','publishable-mag').':</span>',', ') ?></div>
								<!-- End Tags -->
							<?php } ?>
						</div><!-- End Content -->
						<?php if($publishable_lite_relatedposts_section == '1') { ?>	
						    <!-- Start Related Posts -->
							<?php $categories = get_the_category($post->ID); 
							if ($categories) { $category_ids = array(); 
								foreach($categories as $individual_category) 
									$category_ids[] = $individual_category->term_id; 
								    $args=array( 'category__in' => $category_ids, 
								    'post__not_in' => array($post->ID), 
								    'ignore_sticky_posts' => 1, 
								    'showposts'=> 3,
								    'orderby' => 'rand' );
									$my_query = new wp_query( $args ); if( $my_query->have_posts() ) {
								echo '<div class="related-posts"><div class="postauthor-top"><h3>'.__('Related Posts', 'publishable-mag').'</h3></div>';
								$pexcerpt=1; $j = 0; $counter = 0; 
								while( $my_query->have_posts() ) { 
								$my_query->the_post();?>
								<article class="post excerpt  <?php echo (++$j % 3== 0) ? 'last' : ''; ?>">
									<?php if ( has_post_thumbnail() ) { ?>
										<a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>" id="featured-thumbnail">
											<div class="featured-thumbnail">
												<?php the_post_thumbnail('publishable-mag-related',array('title' => '')); ?>
												<?php if (function_exists('wp_review_show_total')) wp_review_show_total(true, 'latestPost-review-wrapper'); ?>
											</div>
											<header>
												<h4 class="title front-view-title"><?php the_title(); ?></h4>
												
												
											</header>
										</a>
									<?php } else { ?>
										<a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>" id="featured-thumbnail">
										
											<header>
												<h4 class="title front-view-title"><?php the_title(); ?></h4>
												
												
											</header>
										</a>
									<?php } ?>
								</article><!--.post.excerpt-->
								<?php $pexcerpt++;?>
								<?php } echo '</div>'; }} wp_reset_postdata(); ?>
							<!-- End Related Posts -->
						<?php }?>  
						<?php if($publishable_lite_authorbox_section == '1') { ?>
							
						<?php }?>  
					
				</div>
				</div>
			<?php endwhile; ?>
		</main><!-- #main -->

<hr>
<div class="sbar">
		        <strong>You May Try this Jobs Also</strong></div> 
		<center>

		</center>  <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<ins class="adsbygoogle"
     style="display:block"
     data-ad-format="autorelaxed"
     data-ad-client="ca-pub-1772388177538391"
     data-ad-slot="2869332661"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script></center>


	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
