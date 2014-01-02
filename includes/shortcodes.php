<?php
function join_us_link( $atts )
{
    $style = isset($attr['style']) ? $attr['style'] : 'pink';
    $text = isset($attr['text']) ? $attr['text'] : 'REQUEST A DEMO';
    $background = '';
    $url = 'http://www.convertro.com';

	switch ($style)
    {
        case 'pink':
            $background = '#EF596C';
            break;
        case 'orange':
            $background = '#EE7B21';
            break;
    }


    if (isset($attr['url']))
    {
        $url = $attr['url'];
    }
	$html = "<a class=\"demo-link\" style=\"background-color:{$background}\" href=\"{$url}\">{$text}" .
            "<svg class=\"tip\" height=\"26\" width=\"14\">" .
                "<polygon points=\"0,27 0,27 0,0 0,0 10.084,13.213\" style=\"fill:{$background};\" />" .
            "</svg>" .
            "</a>";
    return $html;
}
add_shortcode( 'demo-link', 'join_us_link' );