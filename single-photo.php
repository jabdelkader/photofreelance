
<?php
/**
 * Template Name: Single Photo
 * Description: Template for displaying a single photo.
 */

get_header();
$titre = get_field('titre');
    $image_url = get_field('image');
    $categories = get_field('categories');
    $reference = get_field('reference');
    $annees = get_field('annees');
    $format = get_field('format');
    $type = get_field('type');
    $categories = get_field('categories');
    if (is_array($categories)) {
        $categories = implode(', ', $categories);
    }
    if (is_array($type)) {
        $type = implode(', ', $type);
    }
    if (is_array($format)) {
        $format = implode(', ',  $format);
    }
    if (is_array($annees)) {
        $annees = implode(', ',   $annees);
    }
    if (is_array($reference)) {
        $reference = implode(', ',  $reference);
    }


