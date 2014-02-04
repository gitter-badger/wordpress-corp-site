<?php
function getStyle($atts) {
    $backgrounds = [
        'pink'=>'#EF596C',
        'orange' => '#EE7B21',
        'yellow' => '#FBC84E',
        'gray' => '#ccc',
        'white' => '#f1f1f1',
        'teal' => '#5DC1B4'
    ];
    if (isset($atts['style'])) {
        if (isset($backgrounds[$atts['style']])) {
            return $backgrounds[$atts['style']];
        }
    }
    return 'pink';
}

function join_us_link( $atts )
{
    $isDemoLink = '';
    $demoLinkAttr = '';
    if (isset($atts['form']) && strtolower($atts['form']) == 'yes') {
        $isDemoLink = 'request-form';
        $demoLinkAttr = " data-context='request-demo' data-item-id='custom-link-request-demo' ";
    }
    $style = getStyle($atts);
    $text = isset($atts['text']) ? $atts['text'] : 'REQUEST A DEMO';
    $url = isset($atts['page']) ? site_url($atts['page']) : '';
    $url = isset($atts['url']) ? $atts['url'] : $url;

	$html = "<a class=\"demo-link ".$isDemoLink."\" ".$demoLinkAttr." style=\"background-color:{$style}\" href=\"{$url}\">{$text}" .
            "<svg class=\"tip\" height=\"26\" width=\"14\">" .
                "<polygon points=\"0,27 0,27 0,0 0,0 10.084,13.213\" style=\"fill:{$style};\" />" .
            "</svg>" .
            "</a>";
    return $html;
}
add_shortcode( 'demo-link', 'join_us_link' );