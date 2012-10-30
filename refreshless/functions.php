<?php
	include("custom-tweet-button.php");
	// Add RSS links to <head> section
	automatic_feed_links();
	
	// Load jQuery
	if ( !is_admin() ) {
	   wp_deregister_script('jquery');
	   wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"), false);
	   wp_enqueue_script('jquery');
	}
	
	// Clean up the <head>
	function removeHeadLinks() {
    	remove_action('wp_head', 'rsd_link');
    	remove_action('wp_head', 'wlwmanifest_link');
    }
    add_action('init', 'removeHeadLinks');
    remove_action('wp_head', 'wp_generator');
    
    if (function_exists('register_sidebar')) {
    	register_sidebar(array(
    		'name' => 'Sidebar Widgets',
    		'id'   => 'sidebar-widgets',
    		'description'   => 'These are widgets for the sidebar.',
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2>',
    		'after_title'   => '</h2>'
    	));
    }

function mytheme_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
     <div id="comment-<?php comment_ID(); ?>" class="clearfix">
      <div class="comment-group clearfix">
            <div class="comment-author vcard" class="clearfix">
              <div class="author-avatar">
                 <?php echo get_avatar( $comment->comment_author_email, 48 ); ?>
              </div>
              <div class="comment-details">
                <ul>  
                  <?php printf(__('<li><cite class="fn">%s</cite></li><li><span>on</span></li>'), get_comment_author_link()) ?>
                  <li><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s'), get_comment_date()) ?></a></li>
                </ul>
              </div>
            </div>

            <?php if ($comment->comment_approved == '0') : ?>
               <em><?php _e('Your comment is awaiting moderation.') ?></em>
               <br />
            <?php endif; ?>

            <div class="actual-comment">
               <?php comment_text() ?>
               <div class="reply">
                 <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
               </div>      
            </div>
      </div>
  <?php
        }