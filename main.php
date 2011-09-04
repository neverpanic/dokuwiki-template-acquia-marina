<?php
/**
 * DokuWiki port of the Acquia-Marina Drupal Template
 *
 * @link   http://drupal.org/project/acquia_marina
 * @author Clemens Lang (port to DokuWiki) <clemens@neverpanic.de>
 */

if (!defined('DOKU_INC')) die(); /* must be run from within DokuWiki */
@require_once(dirname(__FILE__).'/tpl_functions.php'); /* include hook for template functions */

$showTools = !tpl_getConf('hideTools') || (tpl_getConf('hideTools') && $_SERVER['REMOTE_USER']);
$logged_in = $_SERVER['REMOTE_USER'];

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="<?php print $conf['lang']; ?>" xml:lang="<?php print $conf['lang']; ?>">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?php tpl_pagetitle() ?> | <?php echo strip_tags($conf['title']) ?></title>
	<?php tpl_metaheaders() ?>
	<link rel="shortcut icon" href="<?php echo _tpl_getFavicon() /* DW versions > 2010-11-12 can use the core function tpl_getFavicon() */ ?>" />
	<?php _tpl_include('meta.html') ?>
</head>

<body id="dokuwiki__site" class="mode_<?php echo $ACT; ?> <?php print(($logged_in ? 'not' : '') . 'logged-in'); ?> front page-node no-sidebars layout-main sidebars-both-last font-size-14 grid-type-fluid grid-width-16 fluid-90">
	<?php html_msgarea() // occasional error and info messages on top of the page ?>
	<?php /* classes mode_<action> are added to make it possible to e.g. style a page differently if it's in edit mode,
		see http://www.dokuwiki.org/devel:action_modes for a list of action modes */ ?>
	<?php /* .dokuwiki should always be in one of the surrounding elements (e.g. plugins and templates depend on it) */ ?>
	<div id="page" class="page">
		<div id="page-inner" class="page-inner">
			<div id="skip" class="a11y">
				<a href="#dokuwiki__content"><?php echo tpl_getLang('skip_to_content'); ?></a></li>
			</div>

			<?php if (!$logged_in): ?>
			<!-- The login-box -->
			<div class="header-top-wrapper full-width" id="header-top-wrapper">
				<div class="header-top row grid16-16" id="header-top">
					<div class="header-top-inner inner clearfix" id="header-top-inner">
						<div class="block block-user odd first last fusion-horiz-login grid16-16" id="block-user-0">
							<div class="inner">
								<div class="corner-top"><div class="corner-top-right corner"></div><div class="corner-top-left corner"></div></div>
								<div class="inner-wrapper">
									<div class="inner-inner">
										<div class="block-icon pngfix"></div>
										<h2 class="title block-title">Benutzeranmeldung</h2>
										<div id="dw__login" class="content clearfix">
											<?php _tpl_html_login(); ?>
										</div>
									</div><!-- /inner-inner -->
								</div><!-- /inner-wrapper -->
								<div class="corner-bottom"><div class="corner-bottom-right corner"></div><div class="corner-bottom-left corner"></div></div>
							</div><!-- /inner -->
						</div><!-- /block -->
					</div><!-- /header-top-inner -->
				</div><!-- /header-top -->
			</div>
			<?php endif ?>
	
			<div class="header-group-wrapper full-width" id="header-group-wrapper">
				<div class="header-group row grid16-16" id="header-group">
					<div class="header-group-inner inner clearfix" id="header-group-inner">
						<div class="clearfix" id="header-group-inner-top">
							<div class="search-box block" id="search-box">
								<div class="search-box-inner inner clearfix" id="search-box-inner">
									<form id="search-theme-form" method="post" accept-charset="UTF-8" action="/">
										<div>
											<div class="container-inline" id="search">
                    <?php tpl_searchform() ?>
												<input type="text" title="Enter the terms you wish to search for" value="" size="15" id="edit-search-theme-form-header" name="search_theme_form" maxlength="128" class="search-input form-text">
												<input type="submit" value="Suche" name="op" class="search-submit">
												<input type="hidden" value="form-0adc73bbe9f0296e3f0bdd760ecd007e" id="form-0adc73bbe9f0296e3f0bdd760ecd007e" name="form_build_id">
												<input type="hidden" value="search_theme_form" id="edit-search-theme-form" name="form_id">
											</div>
											<div class="corner-bottom"><div class="corner-bottom-right corner"></div><div class="corner-bottom-left corner"></div></div>
										</div>
									</form>
								</div><!-- /search-box-inner -->
							</div><!-- /search-box -->
						</div>
						<div class="clearfix" id="header-group-inner-inner">
							<div class="header-site-info block" id="header-site-info">
								<div class="header-site-info-inner inner" id="header-site-info-inner">
									<div id="logo">
										<?php tpl_link(wl(), '<img src="' . ml('logo.png') . '" alt="' . $conf['title'] . '" />', 'id="dokuwiki__top" accesskey="h" title="[H]"'); ?>
										<?php if (tpl_getConf('tagline')): ?>
										<p class="claim"><?php echo tpl_getConf('tagline'); ?></p>
										<?php endif ?>
									</div>
								</div><!-- /header-site-info-inner -->
							</div><!-- /header-site-info -->
						</div>
						<div class="primary-menu block" id="primary-menu">
							<div class="primary-menu-inner inner clearfix" id="primary-menu-inner">
								<ul class="menu sf-menu sf-js-enabled">
								<li class="leaf first"><a title="<?php print(tpl_getLang('back_to_website_title')); ?>" href="/"><?php print(tpl_getLang('back_to_website')); ?></a></li>
									<li class="leaf active-trail last"><a class="active" title="Wiki" href="/wiki">Wiki</a></li>
								</ul>
							</div><!-- /primary-menu-inner -->
						</div><!-- /primary-menu -->
					</div><!-- /header-group-inner -->
				</div><!-- /header-group -->
			</div>

			<div class="preface-top-wrapper full-width" id="preface-top-wrapper">
				<div class="preface-top row grid16-16" id="preface-top">
					<div class="preface-top-inner inner clearfix" id="preface-top-inner">
						<?php if ($showTools):
							tpl_button('edit');
							//_tpl_button('discussion');
							tpl_action('history');
							tpl_action('revert');
						endif; ?>
					</div><!-- /preface-top-inner -->
				</div><!-- /preface-top -->
			</div>

			<div class="main-wrapper full-width" id="main-wrapper">
				<div class="main row grid16-16" id="main">
					<div class="main-inner inner clearfix" id="main-inner">
						<div class="sidebar-first row nested grid16-4" id="sidebar-first">
							<div class="sidebar-first-inner inner clearfix" id="sidebar-first-inner">
								<div id="dokuwiki__aside">
									<?php
										// render content into variable, so tpl_topc() is populated
										ob_start();
										tpl_content(false);
										$dokuwiki_content = ob_get_clean();

										// render toc into variable
										ob_start();
										tpl_toc();
										$dokuwiki_toc = ob_get_clean();
									?>
									<?php if (!empty($dokuwiki_toc)): // only show toc if non-empty ?>
									<div class="block block-user odd first last fusion-bold-links marina-rounded-corners marina-title-green grid16-16" id="block-user-3">
										<div class="inner">
											<div class="corner-top"><div class="corner-top-right corner"></div><div class="corner-top-left corner"></div></div>
											<div class="inner-wrapper">
												<div id="dokuwiki__toc" class="inner-inner" style="border: medium none; position: relative;">
													<div class="block-icon pngfix"></div>
													<!-- TOC -->
													<h2 class="title block-title a11y"><?php print($lang['toc']); ?></h2>
													<?php
														print($dokuwiki_toc);
													?>
												</div><!-- /inner-inner -->
											</div><!-- /inner-wrapper -->
											<div class="corner-bottom"><div class="corner-bottom-right corner"></div><div class="corner-bottom-left corner"></div></div>
										</div><!-- /inner -->
									</div><!-- /block -->
									<?php endif; ?>
									<div class="block block-user odd first last fusion-bold-links marina-rounded-corners marina-title-green grid16-16" id="block-user-1">
										<div class="inner">
											<div class="corner-top"><div class="corner-top-right corner"></div><div class="corner-top-left corner"></div></div>
											<div class="inner-wrapper">
												<div id="dokuwiki__sitetools" class="inner-inner" style="border: medium none; position: relative;">
													<div class="block-icon pngfix"></div>
													<!-- SITE TOOLS -->
													<h2 class="title block-title a11y"><?php echo tpl_getLang('site_tools'); ?></h2>
													<ul class="menu">
														<?php tpl_action('recent', 1, 'li'); ?>	
														<?php tpl_action('index',  1, 'li'); ?>
													</ul>
												</div><!-- /inner-inner -->
											</div><!-- /inner-wrapper -->
											<div class="corner-bottom"><div class="corner-bottom-right corner"></div><div class="corner-bottom-left corner"></div></div>
										</div><!-- /inner -->
									</div><!-- /block -->
									<?php if ($showTools): ?>
									<div class="block block-user odd first last fusion-bold-links marina-rounded-corners marina-title-green grid16-16" id="block-user-4">
										<div class="inner">
											<div class="corner-top"><div class="corner-top-right corner"></div><div class="corner-top-left corner"></div></div>
											<div class="inner-wrapper">
												<div id="dokuwiki__pagetools" class="inner-inner" style="border: medium none; position: relative;">
													<div class="block-icon pngfix"></div>
													<!-- PAGE TOOLS -->
													<h2 class="title block-title a11y"><?php echo tpl_getLang('page_tools') ?></h2>
													<ul class="menu">
														<?php
															 tpl_action('edit',       1, 'li');
															_tpl_action('discussion', 1, 'li');
															 tpl_action('history',    1, 'li');
															 tpl_action('backlink',   1, 'li');
															 tpl_action('subscribe',  1, 'li');
															 tpl_action('revert',     1, 'li');
															 tpl_action('top',        1, 'li');
														?>
													</ul>
												</div><!-- /inner-inner -->
											</div><!-- /inner-wrapper -->
											<div class="corner-bottom"><div class="corner-bottom-right corner"></div><div class="corner-bottom-left corner"></div></div>
										</div><!-- /inner -->
									</div><!-- /block -->
									<?php endif ?>
									<?php if ($conf['useacl'] && $showTools): ?>
									<div class="block block-user odd first last fusion-bold-links marina-rounded-corners marina-title-green grid16-16" id="block-user-2">
										<div class="inner">
											<div class="corner-top"><div class="corner-top-right corner"></div><div class="corner-top-left corner"></div></div>
											<div class="inner-wrapper">
												<div id="dokuwiki__usertools" class="inner-inner" style="border: medium none; position: relative;">
													<div class="block-icon pngfix"></div>
													<!-- USER TOOLS -->
													<h2 class="title block-title a11y"><?php echo tpl_getLang('user_tools') ?></h2>
													<ul class="menu">
														<?php if ($_SERVER['REMOTE_USER']): ?>
														<li class="user">
															<?php tpl_userinfo(); ?>
														</li>
														<?php endif ?>
														<?php
															 tpl_action('admin',    1, 'li');
															_tpl_action('userpage', 1, 'li');
															 tpl_action('profile',  1, 'li');
															_tpl_action('register', 1, 'li'); /* DW versions > 2011-02-20 can use the core function tpl_action('register', 1, 'li') */
															 tpl_action('login',    1, 'li');
														?>
													</ul>
												</div><!-- /inner-inner -->
											</div><!-- /inner-wrapper -->
											<div class="corner-bottom"><div class="corner-bottom-right corner"></div><div class="corner-bottom-left corner"></div></div>
										</div><!-- /inner -->
									</div><!-- /block -->
									<?php endif ?>
								</div>
							</div><!-- /sidebar-first-inner -->
						</div><!-- /sidebar-first -->

						<!-- main group: width = grid_width - sidebar_first_width -->
						<div class="main-group row nested grid16-12" id="main-group">
							<div class="main-group-inner inner clearfix" id="main-group-inner">
								<div class="main-content row nested" id="main-content">
									<div class="main-content-inner inner clearfix" id="main-content-inner">
										<!-- content group: width = grid_width - (sidebar_first_width + sidebar_last_width) -->
										<div style="width:100%" class="content-group row nested " id="content-group">
											<div class="content-group-inner inner clearfix" id="content-group-inner">
												<div class="breadcrumbs block" id="breadcrumbs">
													<div class="breadcrumbs-inner inner clearfix" id="breadcrumbs-inner">
														<!-- BREADCRUMBS -->
														<?php if ($conf['breadcrumbs']): ?>
														<div class="breadcrumb">
															<?php tpl_breadcrumbs('»'); ?>
														</div>
														<?php endif ?>
														<?php if ($conf['youarehere']): ?>
															<div class="breadcrumb">
																<?php tpl_youarehere('»'); ?>
															</div>
														<?php endif ?>
														</div>
													</div><!-- /breadcrumbs-inner -->
												</div>
												<div class="content-region row nested" id="content-region">
													<div class="content-region-inner inner clearfix" id="content-region-inner">
														<a id="dokuwiki__content" name="dokuwiki__content"></a>
														<div class="content-inner block" id="content-inner">
															<div class="content-inner-inner inner clearfix" id="content-inner-inner">
																<div class="content-content" id="content-content">
																	<!-- wikipage start -->
																	<?php print($dokuwiki_content); // the main content without TOC (rendered and buffered in the sidebar, where the toc gets printed) ?>
																	<!-- wikipage stop -->
																</div><!-- /content-content -->
															</div><!-- /content-inner-inner -->
														</div><!-- /content-inner -->
													</div><!-- /content-region-inner -->
												</div><!-- /content-region -->
											</div><!-- /content-group-inner -->
										</div><!-- /content-group -->
									</div><!-- /main-content-inner -->
								</div><!-- /main-content -->
							</div><!-- /main-group-inner -->
						</div><!-- /main-group -->
					</div><!-- /main-inner -->
				</div><!-- /main -->
			</div>

			<div class="footer-message-wrapper full-width" id="footer-message-wrapper">
				<div class="footer-message row grid16-16" id="footer-message">
					<div class="footer-message-inner inner clearfix" id="footer-message-inner">
						<div id="dokuwiki__footer">
							<div class="doc"><?php tpl_pageinfo() // 'Last modified' etc ?></div>
							<?php tpl_license('button'); // content license, parameters: img=*badge|button|0, imgonly=*0|1, return=*0|1 ?>
						</div>
						<?php _tpl_include('footer.html'); ?>
						<?php tpl_indexerWebBug(); // provide DokuWiki housekeeping, required in all templates ?>
					</div><!-- /footer-message-inner -->
				</div><!-- /footer-message -->
			</div>
		</div>
	</div>
</body>
</html>
