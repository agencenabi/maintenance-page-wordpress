<!doctype html>
<?php 
	define( 'WP_USE_THEMES', false );
	$path = preg_replace('/wp-content.*$/','',__DIR__);
	include($path.'wp-load.php');
	$blog_title = get_bloginfo( 'name' );
	$pageTitle = get_option( 'nabimaint_title' );
	$pageText = get_option( 'nabimaint_text' );
	$pageBranding = get_option( 'nabimaint_branding' );
?>
<html lang="fr-FR" prefix="og: http://ogp.me/ns#">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" />
    <meta name="format-detection" content="telephone=no">
    <title><?php echo $pageTitle . ' - ' . $blog_title; ?></title>
	<meta name="robots" content="noindex,follow"/>
	<meta property="og:locale" content="fr_FR" />
	<meta property="og:type" content="object" />
	<meta property="og:title" content="<?php echo $pageTitle . ' - ' . $blog_title; ?>" />
	<meta property="og:site_name" content="<?php echo $blog_title; ?>" />
	<meta name="twitter:card" content="summary_large_image" />
	<meta name="twitter:title" content="<?php echo $pageTitle . ' - ' . $blog_title; ?>" />
	
    <!-- Favicon -->
	<link rel="apple-touch-icon-precomposed" sizes="57x57" href="/wp-content/plugins/nabi-maintenance/maintenance/assets/img/favicon/apple-touch-icon-57x57.png" />
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="/wp-content/plugins/nabi-maintenance/maintenance/assets/img/favicon/apple-touch-icon-114x114.png" />
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="/wp-content/plugins/nabi-maintenance/maintenance/assets/img/favicon/apple-touch-icon-72x72.png" />
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="/wp-content/plugins/nabi-maintenance/maintenance/assets/img/favicon/apple-touch-icon-144x144.png" />
	<link rel="apple-touch-icon-precomposed" sizes="120x120" href="/wp-content/plugins/nabi-maintenance/maintenance/assets/img/favicon/apple-touch-icon-120x120.png" />
	<link rel="apple-touch-icon-precomposed" sizes="152x152" href="/wp-content/plugins/nabi-maintenance/maintenance/assets/img/favicon/apple-touch-icon-152x152.png" />
	<link rel="icon" type="image/png" href="/wp-content/plugins/nabi-maintenance/maintenance/assets/img/favicon/favicon-32x32.png" sizes="32x32" />
	<link rel="icon" type="image/png" href="/wp-content/plugins/nabi-maintenance/maintenance/assets/img/favicon/favicon-16x16.png" sizes="16x16" />
	<meta name="application-name" content="&nbsp;"/>
	<meta name="msapplication-TileColor" content="#FFFFFF" />
	<meta name="msapplication-TileImage" content="/wp-content/plugins/nabi-maintenance/maintenance/assets/img/favicon/mstile-144x144.png" />
	<link rel='stylesheet' href='assets/css/style.css' type='text/css' media='all' />
	<script>history.pushState('data to be passed', 'Title of the page', '/');</script>
</head>
<body class="error404">
	<div class="main_content page error__wrapper">
		<div class="_container">
			<div class="_row u-flex">

				<div class="bubble1 is_turquoise is_large"></div>
				<div class="bubble2 is_orange is_xlarge"></div>
				<div class="bubble3 is_orange is_small"></div>
				<div class="bubble4 is_purple is_striked is_xsmall"></div>

				<div class="_col _col--xl-5">
					<?php  if( $pageBranding == '1' ) { ?>
						<a href="https://agencenabi.com">
							<img src="/wp-content/plugins/nabi-maintenance/maintenance/assets/img/nabi-logo.svg" alt="Agence Nabi" />
						</a>
					<?php } ?>
					
					<h1><?php echo $pageTitle; ?></h1>
					<div class="error__quote">
						<p class="quote"><?php echo $pageText; ?></p>
					</div>

				</div>
				<div class="_col _col--xl-7">
					<img class="floatingImg" src="/wp-content/plugins/nabi-maintenance/maintenance/assets/img/404-illustration.png" alt="404-illustration" width="887" height="1040" />
				</div>
			</div>
		</div>
		<footer>
			<p>© <?php echo $blog_title; ?> - Tous droits réservés.</p>
		</footer>
	</div>
</body>
</html>
