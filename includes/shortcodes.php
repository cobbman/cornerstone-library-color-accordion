<?php

// Adv Accordion
// =============================================================================

function csl_color_accordion_shortcode( $atts, $content = null ) {
  extract( shortcode_atts( array(
    'id'    => '',
    'class' => '',
    'style' => ''
  ), $atts, 'csl_color_accordion' ) );

  $id    = ( $id    != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
  $class = ( $class != '' ) ? 'class="x-accordion color ' . esc_attr( $class ) . '"' : 'class="x-accordion color"';
  $style = ( $style != '' ) ? 'style="' . $style . '"' : '';

  $output = "<div {$id} {$class} {$style}>" . do_shortcode( $content ) . "</div>";

  return $output;
}

add_shortcode( 'csl_color_accordion', 'csl_color_accordion_shortcode' );



// Adv Accordion Item
// =============================================================================

function csl_color_accordion_item_shortcode( $atts, $content = null ) {
  extract( shortcode_atts( array(
    'id'          => '',
    'class'       => '',
    'style'       => '',
    'parent_id'   => '',
    'title'       => '',
    'title_extra' => '',
    'bg_color'    => '',
    'open'        => ''
  ), $atts, 'csl_color_accordion_item' ) );

  $id        = ( $id        != ''     ) ? 'id="' . esc_attr( $id ) . '"' : '';
  $class     = ( $class     != ''     ) ? 'class="x-accordion-group ' . esc_attr( $class ) . '"' : 'class="x-accordion-group"';
  $style     = ( $style     != ''     ) ? 'style="' . $style . '"' : '';
  $parent_id = ( $parent_id != ''     ) ? 'data-parent="#' . $parent_id . '"' : '';
  $title     = ( $title     != ''     ) ? $title : '';
  $open      = ( $open      == 'true' ) ? 'collapse in' : 'collapse';
  $color     = ( $bg_color  != ''     ) ? 'style="background-color: ' . $bg_color . ';"' : 'style="background-color:#002a5b;"';
  $title_extra = ( $title_extra != '' ) ? $title_extra : '';

  static $count = 0; $count++;

  if ( $open == 'collapse in' ) {

    $output = "<div {$id} {$class} {$style}>"
              . '<div class="x-accordion-heading">'
                . "<a class=\"x-accordion-toggle\" {$color} data-toggle=\"collapse\" {$parent_id} href=\"#collapse-{$count}\"><span class=\"adv-title\">{$title}</span> <span class=\"extra-title\">{$title_extra}</span></a>"
              . '</div>'
              . "<div id=\"collapse-{$count}\" class=\"accordion-body {$open}\">"
                . '<div class="x-accordion-inner">'
                  . do_shortcode( $content )
                . '</div>'
              . '</div>'
            . '</div>';

  } else {

    $output = "<div {$id} {$class} {$style}>"
              . '<div class="x-accordion-heading">'
                . "<a class=\"x-accordion-toggle collapsed\" {$color} data-toggle=\"collapse\" {$parent_id} href=\"#collapse-{$count}\"><span class=\"adv-title\">{$title}</span> <span class=\"extra-title\">{$title_extra}</span></a>"
              . '</div>'
              . "<div id=\"collapse-{$count}\" class=\"accordion-body {$open}\">"
                . '<div class="x-accordion-inner">'
                  . do_shortcode( $content )
                . '</div>'
              . '</div>'
            . '</div>';

  }

  return $output;
}

add_shortcode( 'csl_color_accordion_item', 'csl_color_accordion_item_shortcode' );