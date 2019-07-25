<?php
/**
 * Adds Header for default pages
 *
 * @package shiro
 */

$page_header_data = wmf_get_template_data();
$title = $page_header_data["h2_title"];
$sub_title = $page_header_data["h1_title"];

?>

<div class="header-main">
<div class="module-404">
  <h1><?php echo esc_html($title); ?></h1>
  <p><?php echo esc_html($sub_title); ?></p>
</div>


</div>

<main id="content">
