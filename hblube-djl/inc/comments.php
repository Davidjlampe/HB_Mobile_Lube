<?php
	if ( 'post' == get_post_type() )
	if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) :
?>
<?php wp_list_comments(); 
paginate_comments_links(); 
?>
<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'djl' ), __( '1 Comment', 'djl' ), __( '% Comments', 'djl' ) ); ?></span>
<?php comment_form(); ?>
<?php if ( is_singular() ) wp_enqueue_script( "comment-reply" ); ?>
<?php
	endif;
?>

