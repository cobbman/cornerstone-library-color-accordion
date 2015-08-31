<?php

class CS_Adv_Accordion_Item extends Cornerstone_Element_Base {

  public function data() {
    return array(
      'name'        => 'adv-accordion-item',
      'title'       => __( 'Advanced Accordion Item', csl18n() ),
      'section'     => '_content',
      'description' => __( 'Advanced Accordion Item description.', csl18n() ),
      'supports'    => array( 'id', 'class', 'style' ),
      'render'      => false,
      'delegate'    => true
    );
  }

  public function controls() {

    $this->addControl(
      'title',
      'title',
      NULL,
      NULL,
      ''
    );

    // Extra Title Content

    $this->addControl(
      'title_extra',
      'textarea',
      __('Extra Title Content', csl18n() ),
      __('Extra content that will show up next to the title', csl18n() ),
      ''
    );

    // Custom Colors

    $this->addControl(
      'accordion_color',
      'color',
      __( 'Color of this item', csl18n() ),
      __( 'Specify the color and background color of your graphic.', csl18n() ),
      '#002a5b' // Blue
    );

    $this->addControl(
      'content',
      'editor',
      __( 'Content', csl18n() ),
      __( 'Include your desired content for your Accordion Item here.', csl18n() ),
      ''
    );

    $this->addControl(
      'open',
      'toggle',
      __( 'Starts Open', csl18n() ),
      __( 'If the Accordion Items are linked, only one can start open.', csl18n() ),
      false
    );

  }

  // public function render( $atts ) {

  //   extract( $atts );

  //   $extra = $this->extra( array(
  //     'id'    => $id,
  //     'class' => $class,
  //     'style' => $style
  //   ) );

  //   $shortcode = "[x_accordion_item title=\"$title\" open=\"$open\"{$extra}]{$content}[/x_accordion_item]";

  //   return $shortcode;

  // }

}