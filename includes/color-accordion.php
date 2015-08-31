<?php

class CSL_Color_Accordion extends Cornerstone_Element_Base {

  public function data() {
    return array(
      'name'        => 'color-accordion',
      'title'       => __( 'Color Accordion', csl18n() ),
      'section'     => 'content',
      'description' => __( 'Color Accordion description.', csl18n() ),
      'supports'    => array( 'class', 'style' ),
      'childType'   => 'color-accordion-item',
      'renderChild' => true
    );
  }

  public function controls() {

    $this->addControl(
      'elements',
      'sortable',
      __( 'Color Accordion Items', csl18n() ),
      __( 'Add a new item to your accordion.', csl18n() ),
      array(
        array( 'title' => __( 'Accordion Item 1', csl18n() ), 'content' => __( 'Add some content to your accordion item here.', csl18n() ), 'open' => true ),
        array( 'title' => __( 'Accordion Item 2', csl18n() ), 'content' => __( 'Add some content to your accordion item here.', csl18n() ) )
      ),
      array(
        'newTitle' => __( 'Accordion Item %s', csl18n() ),
        'floor'    => 1
      )
    );

    $this->addControl(
      'link_items',
      'toggle',
      __( 'Link Items (Requires ID)', csl18n() ),
      __( 'This will make opening one item close the others. It requires that you set an ID below.', csl18n() ),
      false
    );

    $this->addSupport( 'id',
      array( 'options' => array( 'monospace' => true ) )
    );
  }

  public function render( $atts ) {

    extract( $atts );

    $contents = '';

    foreach ( $elements as $e ) {

      $item_extra = $this->extra( array(
        'id'    => $e['id'],
        'class' => $e['class'],
        'style' => $e['style']
      ) );

      $e['parent_id'] = ( $link_items == 'true' && $id != '' ) ? $id : '';

      $contents .= '[csl_color_accordion_item title="' . $e['title'] . '" ';
      $contents .= 'title_extra="' . $e['title_extra'] . '" '; // custom
      $contents .= 'bg_color="' . $e['accordion_color'] . '" '; // custom
      $contents .= ( $e['parent_id'] != '' ) ? 'parent_id="' . $e['parent_id']  . '" ' : '';
      $contents .= 'open="' . $e['open']  . '"' . $item_extra . ']' . $e['content'] . '[/csl_color_accordion_item]';

    }

    $shortcode = "[csl_color_accordion{$extra}]{$contents}[/csl_color_accordion]";

    return $shortcode;

  }

}