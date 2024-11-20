<?php

$business_pro_color_palette_css = '';

// Global Color
$business_pro_first_color = business_pro_get_option('business_pro_first_color', '#FFCC00');

if($business_pro_first_color != false) {
    $business_pro_color_palette_css .= ':root {';
    $business_pro_color_palette_css .= '--primary-color: '.esc_attr($business_pro_first_color).'!important;';
    $business_pro_color_palette_css .= '}';
}

$business_pro_color_palette_css .= '}';

/*-------------- Copyright Text Align-------------------*/
$business_pro_copyright_text_align = business_pro_get_option('business_pro_copyright_text_align');
$business_pro_color_palette_css .= '.site-footer{';
$business_pro_color_palette_css .= 'text-align: '.esc_attr($business_pro_copyright_text_align).' !important;';
$business_pro_color_palette_css .= '}';
$business_pro_color_palette_css .= '
@media screen and (max-width:575px) {
    .site-footer{';
$business_pro_color_palette_css .= 'text-align: center !important;';
$business_pro_color_palette_css .= '} }';

// copyright font size
$business_pro_copyright_text_font_size = business_pro_get_option('business_pro_copyright_text_font_size');
$business_pro_color_palette_css .= '.copyright-text{';
$business_pro_color_palette_css .= 'font-size: '.esc_attr($business_pro_copyright_text_font_size).'px;';
$business_pro_color_palette_css .= '}';
