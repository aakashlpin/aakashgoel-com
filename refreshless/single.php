<?php get_header(); ?>
	<section class="article-overlay">
		<div id="inside">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				
				<h2><?php the_title(); ?></h2>
				<div class="post-date">
					<ul>
						<li><?php echo get_the_time('M'); ?></li>
						<li><?php echo get_the_time('d'); ?></li>
						<li><?php echo get_the_time('Y'); ?></li>
					</ul>
				</div>
					<article>
					
						<?php the_content(); ?>
					
					</article>

					<?php if (function_exists('emo_vote_display')) emo_vote_display('No votes', '1 vote', '% votes'); ?>

					<div class="social-icons">
						<ul class="inline-block">
							<li><?php if (function_exists('tweet_button')) tweet_button(get_permalink()); ?></li>
							<li><a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&t=<?php the_title(); ?>" title="Share on Facebook" target="blank" rel="nofollow" class="facebook sb text">Facebook Share</a></li>
						</ul>
					</div>	

		<?php comments_template(); ?>				

		</div>

		

		<?php endwhile; endif; ?>
		</div>
	</section>
<?php get_footer(); ?>