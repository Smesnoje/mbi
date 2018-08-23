<?php /* Template Name: 404 */ ?>

<?php 
ob_start();
$home = get_site_url();
header("Location:".$home);
ob_end_flush();
?>
