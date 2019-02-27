<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','<?php echo GA_TAG_MANAGER_ID; ?>');</script>
<!-- End Google Tag Manager -->
<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo GA_ID; ?>"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', '<?php echo GA_ID; ?>');
</script>

<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name='viewport' content='width=device-width,height=device-height,initial-scale=1.0, maximum-scale=1.0, user-scalable=0'/>
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.png" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/fonts.css">
<link rel="profile" href="http://gmpg.org/xfn/11">
<script type="text/javascript">
    var basepath = "<?php echo get_template_directory_uri(); ?>";
</script>
<?php wp_head(); ?>
<?php
if ( get_field( 'google_analytics_code', 'options' ) ):
    the_field( 'google_analytics_code', 'options' );
endif;
?>
</head>
<body class="hide-cookie-campaign hasJS">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?php echo GA_TAG_MANAGER_ID; ?>"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->
        <main>