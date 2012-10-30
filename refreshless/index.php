<?php get_header(); ?>
	<section class="first-screen">
		<ul class="article-list clearfix">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<?php $category = get_the_category(); ?>			
	
			<li class="<?php echo $category[0]->cat_name; ?>">
				<a href="<?php the_permalink() ?>">
					<div>	<!-- date	-->
						<span class="date"><?php echo get_the_date('M d, Y'); ?></span>
					</div>

					<div>
						<h3><?php the_title(); ?></h3>
							
						<ul class="metadata">
							<li class="comments"><?php comments_number( "Add a Comment", "Reply to 1 Comment", "% Comments" ); ?></li>
							<li class="reads"><?php if(function_exists('the_views')) { increment_views(); the_views(); } ?></li>
							<?php if (function_exists('emo_vote_display')) emo_vote_display('No votes', '1 vote', '% votes'); ?>
						</ul>
					</div>
				</a>
			</li>	
		<?php endwhile; ?>
		</ul>
		

	<?php else : ?>

		<h3>Oops! No posts exists it seems :|</h3>

	<?php endif; ?>
	</section>	<!-- first screen ends	-->


	<section class="article-overlay" style="display:none;">
	</section>

	<?php get_footer(); ?>