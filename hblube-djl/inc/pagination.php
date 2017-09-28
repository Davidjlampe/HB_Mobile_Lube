<?php
?>
<nav id="post-nav">
	<ul class="pager">
	  <?php if (get_previous_posts_link()) : ?>
	    <li class="previous"><?php previous_posts_link(__('&larr; Prev', 'djl')); ?></li>
	  <?php else: ?>
	    <li class="previous disabled"><a><?php _e('&larr; Prev', 'djl'); ?></a></li>
	  <?php endif; ?>
	  <?php if (get_next_posts_link()) : ?>
	    <li class="next"><?php next_posts_link(__('Next &rarr;', 'djl')); ?></li>
	  <?php else: ?>
	    <li class="next disabled"><a><?php _e('Next &rarr;', 'djl'); ?></a></li>
	  <?php endif; ?>
	</ul>
</nav>