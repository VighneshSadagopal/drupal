<?php

function themename_preprocess_page(&$variables) {
if ($variables['is_front']) {
drupal_add_js(drupal_get_path('theme', 'visual') . 'js/frontnav.js');
$variables['scripts'] = drupal_get_js();
}
}

?>