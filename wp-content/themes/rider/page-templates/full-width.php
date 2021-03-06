<?php 
/*
 * Template Name: Full Width
 */
get_header(); ?>
<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php while ( have_posts() ) : the_post(); ?>
	<!--breadcrumb start-->
	<div class="royals-container container">
		<div class="site-breadcumb">
			<h1><?php echo get_the_title(); ?></h1>
			<ol class="breadcrumb breadcrumb-menubar">
				<?php if (function_exists('rider_custom_breadcrumbs')) rider_custom_breadcrumbs(); ?>                    
			</ol>
		</div>  
	</div>
	<!--breadcrumb end-->          

	<!--blog start-->
	<div class="royals-container container">
		<div class="row">
			<div class="col-md-12 col-sm-12 blog-box">
				<div class="blog-wrap">
					<div class="blog-content">
					<?php if ( has_post_thumbnail() ) : ?>
						<?php the_post_thumbnail( 'rider-full-width', array( 'alt' => get_the_title(), 'class' => 'img-responsive') ); ?>
					<?php endif; ?>
						<?php the_content();
						wp_link_pages( array(
										'before'      => '<div class="col-md-6 col-xs-6">' . __( 'Pages', 'rider' ) . ':',
										'after'       => '</div>',
										'link_before' => '<span>',
										'link_after'  => '</span>',
										) );
						 ?>                               
					</div>
					<?php edit_post_link( __( 'Edit', 'rider' ), '' ); ?>
					<div class="comments-area">  
						<?php comments_template( '', true ); ?>                             
					</div>
				</div>   
			</div>
			<?php endwhile; ?>
		</div>
	</div>
	<!--blog end-->


</section>
<?php get_footer(); ?>
