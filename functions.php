
<?php
function enqueue_custom_styles_and_scripts()
{wp_enqueue_style('custom-style', get_template_directory_uri() . '/style.css', array(), '1.0','all');}