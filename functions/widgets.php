<?php
/**
 * Register widgets areas for the Theme
 */

if ( function_exists( 'register_sidebar' ) ) {

	register_sidebar( array(
		'name' => 'Blog Sidebar - Archives',
		'id'   => 'corenominal-blog-sidebar-archives-widget',
		'description'   => 'The sidebar which appears when viewing blog archive templates.',
		'before_widget' => '<div id="%1$s" class="aside widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>'
	) );

	register_sidebar( array(
		'name' => 'Blog Sidebar - Single',
		'id'   => 'corenominal-blog-sidebar-single-widget',
		'description'   => 'The sidebar which appears when viewing a single blog post.',
		'before_widget' => '<div id="%1$s" class="aside widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>'
	) );

	register_sidebar( array(
		'name' => 'Links Sidebar - Archives',
		'id'   => 'corenominal-link-sidebar-archives-widget',
		'description'   => 'The sidebar which appears when viewing link archive templates.',
		'before_widget' => '<div id="%1$s" class="aside widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>'
	) );

	register_sidebar( array(
		'name' => 'Link Sidebar - Single',
		'id'   => 'corenominal-link-sidebar-single-widget',
		'description'   => 'The sidebar which appears when viewing a single link post.',
		'before_widget' => '<div id="%1$s" class="aside widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>'
	) );

	register_sidebar( array(
		'name' => 'Snippet Sidebar - Archives',
		'id'   => 'corenominal-snippet-sidebar-archives-widget',
		'description'   => 'The sidebar which appears when viewing snippet archive templates.',
		'before_widget' => '<div id="%1$s" class="aside widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>'
	) );

	register_sidebar( array(
		'name' => 'Snippet Sidebar - Single',
		'id'   => 'corenominal-snippet-sidebar-single-widget',
		'description'   => 'The sidebar which appears when viewing a single snippet post.',
		'before_widget' => '<div id="%1$s" class="aside widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>'
	) );

}

/**
 * Create "Recent" widget for custom post type - 'link'
 */
class corenominal_recent_links_widget extends WP_Widget{
	
	function __construct()
	{
		parent::__construct(
			'corenominal_custom_post_link_widget', // Base ID
			'corenominal - Recent Links', // Name
			array('description' => __( 'Displays your latest links. Shows the title and date per link.' ))
		   );
	}

	function update( $new_instance, $old_instance )
	{
			$instance = $old_instance;
			$instance['title'] = strip_tags($new_instance['title']);
			$instance['numberOfLinks'] = strip_tags($new_instance['numberOfLinks']);
			return $instance;
	}

	function form( $instance )
	{
		if( $instance )
		{
			$title = esc_attr( $instance['title'] );
			$numberOfLinks = esc_attr( $instance['numberOfLinks'] );
		}
		else
		{
			$title = '';
			$numberOfLinks = '';
		}
		?>
			<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'corenominal_custom_post_link_widget'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
			</p>
			<p>
			<label for="<?php echo $this->get_field_id('numberOfLinks'); ?>"><?php _e('Number of Links:', 'corenominal_custom_post_link_widget'); ?></label>
			<select id="<?php echo $this->get_field_id('numberOfLinks'); ?>"  name="<?php echo $this->get_field_name('numberOfLinks'); ?>">
				<?php for($x=1;$x<=10;$x++): ?>
				<option <?php echo $x == $numberOfLinks ? 'selected="selected"' : '';?> value="<?php echo $x;?>"><?php echo $x; ?></option>
				<?php endfor;?>
			</select>
			</p>
		<?php
	}

	function widget( $args, $instance )
	{
		extract( $args );
		$title = apply_filters('widget_title', $instance['title']);
		$numberOfLinks = $instance['numberOfLinks'];
		echo $before_widget;
		if ( $title )
		{
			echo $before_title . $title . $after_title;
		}
		$this->get_corenominal_links($numberOfLinks);
		echo $after_widget;
	}

	function get_corenominal_links( $numberOfLinks )
	{
		global $post;
		$links = new WP_Query();
		$links->query( 'post_type=link&posts_per_page=' . $numberOfLinks );
		if( $links->found_posts > 0)
		{
			echo '<ul class="recent_links_widget recent">';
				while ($links->have_posts())
				{
					$links->the_post();
					$listItem = '<li>';
					$listItem .= '<a href="' . get_permalink() . '">';
					$listItem .= get_the_title() . '</a><br>';
					$listItem .= '<span class="meta"><i class="fa fa-calendar"></i> <span class="sr-only">Added: </span> ' . get_the_date() . '</span></li>';
					echo $listItem;
				}
			echo '</ul>';
			echo '<p class="alllinks"><a href="' . site_url('link') . '"><i class="fa fa-chevron-right"></i> Browse All Links</a></p>';
			wp_reset_postdata();
		}
		else
		{
			echo '<p>No links found!</p>';
		}
	}

}
register_widget( 'corenominal_recent_links_widget' );

/**
 * Create "Recent" widget for posts - provides a custom style to match other corenominal widgets
 */
class corenominal_recent_posts_widget extends WP_Widget{
	
	function __construct()
	{
		parent::__construct(
			'corenominal_recent_posts_widget', // Base ID
			'corenominal - Recent Posts', // Name
			array('description' => __( 'Displays your latest posts. Shows the title and date per link.' ))
		   );
	}

	function update( $new_instance, $old_instance )
	{
			$instance = $old_instance;
			$instance['title'] = strip_tags($new_instance['title']);
			$instance['numberOfPosts'] = strip_tags($new_instance['numberOfPosts']);
			return $instance;
	}

	function form( $instance )
	{
		if( $instance )
		{
			$title = esc_attr( $instance['title'] );
			$numberOfPosts = esc_attr( $instance['numberOfPosts'] );
		}
		else
		{
			$title = '';
			$numberOfPosts = '';
		}
		?>
			<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'corenominal_recent_posts_widget'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
			</p>
			<p>
			<label for="<?php echo $this->get_field_id('numberOfPosts'); ?>"><?php _e('Number of Links:', 'corenominal_recent_posts_widget'); ?></label>
			<select id="<?php echo $this->get_field_id('numberOfPosts'); ?>"  name="<?php echo $this->get_field_name('numberOfPosts'); ?>">
				<?php for($x=1;$x<=10;$x++): ?>
				<option <?php echo $x == $numberOfPosts ? 'selected="selected"' : '';?> value="<?php echo $x;?>"><?php echo $x; ?></option>
				<?php endfor;?>
			</select>
			</p>
		<?php
	}

	function widget( $args, $instance )
	{
		extract( $args );
		$title = apply_filters('widget_title', $instance['title']);
		$numberOfPosts = $instance['numberOfPosts'];
		echo $before_widget;
		if ( $title )
		{
			echo $before_title . $title . $after_title;
		}
		$this->get_corenominal_links($numberOfPosts);
		echo $after_widget;
	}

	function get_corenominal_links( $numberOfPosts )
	{
		global $post;
		$links = new WP_Query();
		$links->query( 'post_type=post&posts_per_page=' . $numberOfPosts );
		if( $links->found_posts > 0)
		{
			echo '<ul class="recent_posts_widget recent">';
				while ($links->have_posts())
				{
					$links->the_post();
					$listItem = '<li>';
					$listItem .= '<a href="' . get_permalink() . '">';
					$listItem .= get_the_title() . '</a><br>';
					$listItem .= '<span class="meta"><i class="fa fa-calendar"></i> <span class="sr-only">Added: </span> ' . get_the_date() . '</span></li>';
					echo $listItem;
				}
			echo '</ul>';
			echo '<p class="allposts"><a href="' . site_url() . '"><i class="fa fa-chevron-right"></i> Browse All Posts</a></p>';
			wp_reset_postdata();
		}
		else
		{
			echo '<p>No posts found!</p>';
		}
	}

}
register_widget( 'corenominal_recent_posts_widget' );

/**
 * Create "Recent" widget for custom post type - 'link'
 */
class corenominal_rss_widget extends WP_Widget{
	
	function __construct()
	{
		parent::__construct(
			'corenominal_rss_widget', // Base ID
			'corenominal - RSS Links', // Name
			array('description' => __( 'Displays links to your RSS feeds.' ))
		   );
	}

	function update( $new_instance, $old_instance )
	{
			$instance = $old_instance;
			$instance['title'] = strip_tags($new_instance['title']);
			return $instance;
	}

	function form( $instance )
	{
		if( $instance )
		{
			$title = esc_attr( $instance['title'] );
		}
		else
		{
			$title = '';
		}
		?>
			<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'corenominal_rss_widget'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
			</p>
		<?php
	}

	function widget( $args, $instance )
	{
		extract( $args );
		$title = apply_filters('widget_title', $instance['title']);
		
		if ( $title )
		{
			$title =  $before_title . $title . $after_title;
		}
		
		$count_posts = wp_count_posts( 'post' );
		$published_posts = $count_posts->publish;
		$count_posts = wp_count_posts( 'link' );
		$published_links = $count_posts->publish;
		$feeds = '';
		
		if( $published_posts )
		{
			$feeds .= '<li><i class="fa fa-rss"></i> <a href="' . site_url() . '/feed/?post_type=post">Subscribe to Posts</a></li>';
		}
		
		if( $published_links )
		{
			$feeds .= '<li><i class="fa fa-rss"></i> <a href="' . site_url() . '/feed/?post_type=link">Subscribe to Links</a></li>';
		}
		
		if($feeds != '')
		{
			echo $before_widget;
			echo $title;
			echo '<ul class="subscriptions">';
			echo $feeds;
			echo '</ul>';
			echo $after_widget;
		}
	}

}
register_widget( 'corenominal_rss_widget' );
