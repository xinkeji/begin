<?php
/*
Template Name: 文章更新
*/
if ( ! defined( 'ABSPATH' ) ) exit;
?>
<?php get_header(); ?>

<?php
function up_archives_list() {
	$output = '<div id="archives-box">';
	$the_query = new WP_Query( 'posts_per_page=-1&cat='.zm_get_option('cat_up_n').'&year='.zm_get_option('year_n').'&monthnum='.zm_get_option('mon_n').'&ignore_sticky_posts=1' );
	$year = 0; $mon = 0; $i = 0; $j = 0;
	while ( $the_query->have_posts() ) : $the_query->the_post();
		$year_tmp = get_the_time('Y');
		$mon_tmp = get_the_time('m');
		$y=$year; $m=$mon;
		if ($mon != $mon_tmp && $mon > 0) $output .= '</ul></li>';
		if ($year != $year_tmp && $year > 0) $output .= '</ul>';
		if ($year != $year_tmp) {
			$year = $year_tmp;
			$output .= '<h3 class="beyear">'. $year .' 年</h3>';
			$output .= '<ul class="mon_list">';
		}
		if ($mon != $mon_tmp) {
			$mon = $mon_tmp;
			$output .= '<span class="bemon">'. $mon .'月</span><span class="year-m">'. $year .'年</span><div class="clear"></div>';
			$output .= '<ul class="mon-list">';
		}
		$output .= '<li class="day-box">';
		$output .= '<span class="day-w"><time datetime="'.get_the_date('Y-m-d').' ' . get_the_time('H:i:s').'"><span class="days">'. get_the_time('d') .'</span><span class="week-d">日<br />'. get_the_time('l') .'</span></time></span>';
		$output .= '<a href="'. get_permalink() .'">'. get_the_title() .'</a></li>';
		$output .= '</li>';

	endwhile;
	wp_reset_postdata();
	$output .= '</ul>';
	$output .= '</li>';
	$output .= '</ul>';
	$output .= '</div>';
	echo $output;
}
?>
<div class="up-area">
	<main id="main" class="be-main site-main" role="main">
		<?php while ( have_posts() ) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>">
				<header class="archives-header">
					<h1 class="archives-title"><?php the_title(); ?></h1>
		
						<div class="single-content">
							<?php the_content(); ?>
						</div>
	
					<ul class="archives-meta">
						<li>今日更新：
							<?php today_renew(); ?>
						</li>
						<li>本周更新：
							<?php week_renew(); ?>
						</li>
						<div class="clear"></div>
					</ul>
				</header>
			</article>
		<?php endwhile;?>
		<div class="up-archives">
			<ul class="mon-list ms future-post">
				<span class="future-t"><i class="be be-file"></i>即将发表</span>
				<ul class="day-list">
					<?php
					$my_query = new WP_Query( array ( 'post_status' => 'future','cat' => '','order' => 'ASC','showposts' => 5,'ignore_sticky_posts' => '1'));
					if ($my_query->have_posts()) {
						while ($my_query->have_posts()) : $my_query->the_post();
							$do_not_duplicate = $post->ID;
							echo '<li>';
							the_title();
							echo '</li>';
						endwhile; wp_reset_postdata();
					} else {
						echo '<li>暂无，敬请期待！</li>';
					}
					?>
				</ul>
			</ul>

			<?php up_archives_list(); ?>
		</div>
	</main>
</div>
<?php get_footer(); ?>