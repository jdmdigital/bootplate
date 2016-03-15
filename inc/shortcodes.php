<?php
/* Bootplate Shortcodes */

// [antispam xclass=""]client@clienturl.com[/antispam]
if(!function_exists('jdm_antispam_shortcode')) {
	function jdm_antispam_shortcode($atts, $content= null) {
		extract( shortcode_atts( array(
			'xclass' => '',
		), $atts ) );
		if ( ! is_email( $content ) ) {
			return;
		}
		if($xclass != '') {
			return '<a href="mailto:' . antispambot( $content ) . '" class="'.$xclass.'">' . antispambot( $content ) . '</a>';
		} else {
			return '<a href="mailto:' . antispambot( $content ) . '">' . antispambot( $content ) . '</a>';
		}
	}
	add_shortcode( 'antispam', 'jdm_antispam_shortcode' );
}

// [one_half xclass="col-md-6" openrow='y'] [/one_half] - Includes opening row
if(!function_exists('one_half_shortcode')) {
	function one_half_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'xclass' => 'col-md-6',
			'openrow' => 'y',
		), $atts ) );
		$html = '';
		if(strtolower($openrow) == 'y' || strtolower($openrow) == 'yes') {
			$html .= '<div class="row">';
		}
		$html .= '	<div class="'.$xclass.'">'.do_shortcode($content).'</div>';
		return $html;
	}
	add_shortcode( 'one_half', 'one_half_shortcode' );
}

// [one_half_last xclass="col-md-6" openrow='y'] [/one_half_last] - closes opening row
if(!function_exists('one_half_last_shortcode')) {
	function one_half_last_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'xclass' => 'col-md-6',
			'openrow' => 'y',
		), $atts ) );
		$html = '';
		
		$html .= '	<div class="'.$xclass.'">'.do_shortcode($content).'</div>';
		if(strtolower($openrow) == 'y' || strtolower($openrow) == 'yes') {
			$html .= '</div><!--/row one_half_last-->';
		}
		return $html;
	}
	add_shortcode( 'one_half_last', 'one_half_last_shortcode' );
}

// [one_third_first xclass="col-md-4" openrow='y'] [/one_half] - Includes opening row
if(!function_exists('one_third_first_shortcode')) {
	function one_third_first_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'xclass' => 'col-md-4',
			'openrow' => 'y',
		), $atts ) );
		$html = '';
		if(strtolower($openrow) == 'y' || strtolower($openrow) == 'yes') {
			$html .= '<div class="row">';
		}
		$html .= '	<div class="'.$xclass.'">'.do_shortcode($content).'</div>';
		return $html;
	}
	add_shortcode( 'one_third_first', 'one_third_first_shortcode' );
}

// [one_third xclass="col-md-4"] [/one_half] - Includes opening row
if(!function_exists('one_third_shortcode')) {
	function one_third_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'xclass' => 'col-md-4',
		), $atts ) );
		$html = '';
		if(strtolower($openrow) == 'y' || strtolower($openrow) == 'yes') {
			$html .= '<div class="row">';
		}
		$html .= '	<div class="'.$xclass.'">'.do_shortcode($content).'</div>';
		return $html;
	}
	add_shortcode( 'one_third', 'one_third_shortcode' );
}

// [one_third_last xclass="col-md-4" openrow='y'] [/one_half_last] - closes opening row
if(!function_exists('one_third_last_shortcode')) {
	function one_third_last_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'xclass' => 'col-md-4',
			'openrow' => 'y',
		), $atts ) );
		$html = '';
		
		$html .= '	<div class="'.$xclass.'">'.do_shortcode($content).'</div>';
		if(strtolower($openrow) == 'y' || strtolower($openrow) == 'yes') {
			$html .= '</div><!--/row one_third_last-->';
		}
		return $html;
	}
	add_shortcode( 'one_third_last', 'one_third_last_shortcode' );
}

// [card col="col-md-4" xclass="bootplate-card" imgsrc="" title="" subtitle="" link="" linktext="" openrow='y/n' closerow='y/n'] [/card] 
if(!function_exists('card_shortcode')) {
	function card_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'col' => 'col-md-4',
			'xclass' => 'bootplate-card',
			'imgsrc' => '',
			'title' => '',
			'subtitle' => '',
			'link' => '',
			'linktext' => '',
			'openrow' => 'n',
			'closerow' => 'n',
		), $atts ) );
		$imgplaceholder = get_template_directory_uri().'/img/325x200.png';
		$html = '';
		
		if(strtolower($openrow) == 'y' || strtolower($openrow) == 'yes') {
		$html .= '<div class="row"><!--row cards-->'."\r\n";
		}
		$html .= '	<div class="'.$col.'">'."\r\n";
		$html .= '		<div class="card '.$xclass.'">'."\r\n";
		if($imgsrc != '') {
		$html .= '			<div class="imglazy"><img class="card-img-top lazy" alt="Card Image" data-original="'.$imgsrc.'" src="'.$imgplaceholder.'" style=""></div>'."\r\n";
		}
		$html .= '			<div class="card-block">';
		if($title != '' && $subtitle == '') {
		$html .= '				<h4 class="card-title">'.$title.'</h4>'."\r\n";
		} elseif($title != '' && $subtitle != '') {
		$html .= '				<h4 class="card-title">'.$title.' <small>'.$subtitle.'</small></h4>'."\r\n";
		}
		$html .= '				<p class="card-text">'.do_shortcode($content).'</p>'."\r\n";
		if($link != '' && $linktext != '') {
		$html .= '				<a class="card-link" href="'.$link.'">'.$linktext.'</a>'."\r\n";
		}
		$html .= '			</div> <!--/.card-block-->'."\r\n";
		$html .= '		</div><!--/card-->'."\r\n";
		$html .= '	</div><!--/col-->'."\r\n";
		
		if(strtolower($closerow) == 'y' || strtolower($closerow) == 'yes') {
		$html .= '</div><!--/row cards-->'."\r\n";
		}
		return $html;
	}
	add_shortcode( 'card', 'card_shortcode' );
}

// [section class="bg-default" reopen="n/y"] [/section]
if(!function_exists('section_shortcode')) {
	function section_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'class' => 'bg-default',
			'reopen' => 'n',
		), $atts ) );
		$html = '</div></section>';
		
		$html .= '<section class="'.$class.'"><div class="container">'.do_shortcode($content).'</div></section>';
		if(strtolower($reopen) == 'y' || strtolower($reopen) == 'yes') {
			$html .= '<section><div class="container">';
		}
		return $html;
	}
	add_shortcode( 'section', 'section_shortcode' );
}

// [alert type="warning" dismiss="n"] [/alert]
if(!function_exists('alert_shortcode')) {
	function alert_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'type' => 'warning',
			'dismiss' => 'n',
		), $atts ) );
		
		if($dismiss == 'y') {
			return '<div class="alert alert-'.$type.' alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'.do_shortcode($content).'</div>';
		} else {
			return '<div class="alert alert-'.$type.'" role="alert">'.do_shortcode($content).'</div>';
		}
	}
	add_shortcode( 'alert', 'alert_shortcode' );
}

// [tweetable via="jdmdigital"] [/tweetable]
if(!function_exists('tweetable_shortcode')) {
	function tweetable_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'via' => 'jdmdigital',
		), $atts ) );
		$postid = get_the_ID();
		$permalink = get_permalink($postid);
		$title = get_the_title($postid);
		if(function_exists('wpbitly_get_shortlink')) {
			$shortlink = wpbitly_get_shortlink($permalink, $postid);
		} else {
			$shortlink = wp_get_shortlink($postid);
		}
		
		return '<a class="tweetable mini" href="https://twitter.com/share?text='. htmlentities($title).':&amp;url='. urlencode($shortlink).'&amp;via='.$via.'" title="Tweet This" rel="nofollow">'.do_shortcode($content).'</a>';
	}
	add_shortcode( 'tweetable', 'tweetable_shortcode' );
}

// [clearfix]
if(!function_exists('clearfix_shortcode')) {
	function clearfix_shortcode($atts) {
		return '<div class="clearfix"></div>';
	}
	add_shortcode( 'clearfix', 'clearfix_shortcode' );
}


//  [hr xclass="sep"]
if(!function_exists('hr_func')) {
	function hr_func( $atts ) {
		extract( shortcode_atts( array(
			'xclass' => '',
		), $atts ) );
	
		if($xclass != '') {
			return '<hr class="'.$xclass.'" />';
		} else {
			return '<hr />';
		}
	}
	add_shortcode( 'hr', 'hr_func' );
}

// [caption id="attachment_10003" align="alignnone" width="961"]
function caption_shortcode( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'id' => '',
		'align' => 'alignnone',
		'width' => '',
	), $atts ) );
	
	return '<div id="'.$id.'" class="wp-caption '.$align.'">'.do_shortcode($content).'</div>';
}
add_shortcode( 'caption', 'caption_shortcode' );

// [loggedin]Only shown to logged-in users.[/loggedin]
function loggedin_shortcode( $atts, $content = null ) {
	if(is_user_logged_in()){
		return do_shortcode($content);
	}
}
add_shortcode( 'loggedin', 'loggedin_shortcode' );

// [loggedout]Only shown to logged-out users.[/loggedout]
function loggedout_shortcode( $atts, $content = null ) {
	if(!is_user_logged_in()){
		return do_shortcode($content);
	}
}
add_shortcode( 'loggedout', 'loggedout_shortcode' );

?>
