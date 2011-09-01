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

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="<?php print $conf['lang']; ?>" xml:lang="<?php print $conf['lang']; ?>">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?php tpl_pagetitle() ?> | <?php echo strip_tags($conf['title']) ?></title>
	<?php tpl_metaheaders() ?>
	<link rel="shortcut icon" href="<?php echo _tpl_getFavicon() /* DW versions > 2010-11-12 can use the core function tpl_getFavicon() */ ?>" />
	<?php _tpl_include('meta.html') ?>
</head>

<?php // TODO: Add conditional logged-in or not-logged-in ?>
<body id="dokuwiki__site" class="mode_<?php echo $ACT; ?> front page-node no-sidebars layout-main sidebars-both-last font-size-14 grid-type-fluid grid-width-16 fluid-90">
	<?php html_msgarea() // occasional error and info messages on top of the page ?>
	<?php /* classes mode_<action> are added to make it possible to e.g. style a page differently if it's in edit mode,
		see http://www.dokuwiki.org/devel:action_modes for a list of action modes */ ?>
	<?php /* .dokuwiki should always be in one of the surrounding elements (e.g. plugins and templates depend on it) */ ?>
	<div id="page" class="page">
		<div id="page-inner" class="page-inner">
			<div id="skip" class="a11y">
				<a href="#dokuwiki__content"><?php echo tpl_getLang('skip_to_content'); ?></a></li>
			</div>

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
										<div class="content clearfix">
											<form id="user-login-form" method="post" accept-charset="UTF-8" action="/node?destination=node">
												<input type="hidden" name="sectok" value="some-tbd-value FIXME FIXME FIXME" />
												<input type="hidden" name="id" value="title of the current page I guess FIXME FIXME FIXME" />
												<input type="hidden" name="do" value="login" />
												<input type="hidden" name="r" value="0" /> <!-- Stay logged in -->
												<div>
													<div id="edit-name-wrapper" class="form-item overlabel-wrapper">
														<label for="edit-name" class="overlabel-apply" style="text-indent: 0px; cursor: text;">Benutzername: <span title="Diese Angabe wird benötigt." class="form-required">*</span></label>
														<input type="text" class="form-text required" value="" size="15" id="edit-name" name="u" maxlength="60">
													</div>
													<div id="edit-pass-wrapper" class="form-item overlabel-wrapper">
														<label for="edit-pass" class="overlabel-apply" style="text-indent: 0px; cursor: text;">Passwort: <span title="Diese Angabe wird benötigt." class="form-required">*</span></label>
														<input type="password" class="form-text required" size="15" maxlength="60" id="edit-pass" name="p">
													</div>
													<input type="submit" class="form-submit" value="Anmelden" id="edit-submit" name="op">
													<div class="item-list">
														<ul>
															<li class="first">
																<a title="Ein neues Benutzerkonto erstellen." href="/user/register">Registrieren</a>
															</li>
															<li class="last">
																<a title="Ein neues Passwort per E-Mail anfordern." href="/user/password">Neues Passwort anfordern</a>
															</li>
														</ul>
													</div>
												</div>
											</form>
										</div>
									</div><!-- /inner-inner -->
								</div><!-- /inner-wrapper -->
								<div class="corner-bottom"><div class="corner-bottom-right corner"></div><div class="corner-bottom-left corner"></div></div>
							</div><!-- /inner -->
						</div><!-- /block -->
					</div><!-- /header-top-inner -->
				</div><!-- /header-top -->
			</div>
	
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
									<li class="leaf first"><a title="zurück zur Startseite" href="/">Startseite</a></li>
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
					</div><!-- /preface-top-inner -->
				</div><!-- /preface-top -->
			</div>

			<div class="main-wrapper full-width" id="main-wrapper">
				<div class="main row grid16-16" id="main">
					<div class="main-inner inner clearfix" id="main-inner">
						<div class="sidebar-first row nested grid16-4" id="sidebar-first">
							<div class="sidebar-first-inner inner clearfix" id="sidebar-first-inner">
								<div class="block block-user odd first last fusion-bold-links marina-rounded-corners marina-title-green grid16-16" id="block-user-1">
									<div class="inner">
										<div class="corner-top"><div class="corner-top-right corner"></div><div class="corner-top-left corner"></div></div>
										<div class="inner-wrapper">
											<div id="dokuwiki__sitetools" class="inner-inner" style="border: medium none; position: relative;">
												<div class="block-icon pngfix"></div>
												<!-- SITE TOOLS -->
												<h2 class="title block-title a11y"><?php echo tpl_getLang('site_tools'); ?></h2>
												<div class="content clearfix">
												<ul class="menu">
													<?php tpl_action('recent', 1, 'li'); ?>	
													<?php tpl_action('index',  1, 'li'); ?>
												</ul>
											</div>
										</div><!-- /inner-inner -->
									</div><!-- /inner-wrapper -->
									<div class="corner-bottom"><div class="corner-bottom-right corner"></div><div class="corner-bottom-left corner"></div></div>
								</div><!-- /inner -->
							</div><!-- /block --></div><!-- /sidebar-first-inner -->
						</div><!-- /sidebar-first -->

						<!-- main group: width = grid_width - sidebar_first_width -->
						<div class="main-group row nested grid16-12" id="main-group">
							<div class="main-group-inner inner clearfix" id="main-group-inner">
								<div class="main-content row nested" id="main-content">
									<div class="main-content-inner inner clearfix" id="main-content-inner">
										<!-- content group: width = grid_width - (sidebar_first_width + sidebar_last_width) -->
										<div style="width:100%" class="content-group row nested " id="content-group">
											<div class="content-group-inner inner clearfix" id="content-group-inner">
												<div class="content-region row nested" id="content-region">
													<div class="content-region-inner inner clearfix" id="content-region-inner">
														<a id="dokuwiki__content" name="dokuwiki__content"></a>
														<div class="content-inner block" id="content-inner">
															<div class="content-inner-inner inner clearfix" id="content-inner-inner">
																<div class="content-content" id="content-content">
																	<!-- wikipage start -->
                   													<?php tpl_content() // the main content ?>
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

<?php /*

                <!-- SITE TOOLS -->
                <div id="dokuwiki__sitetools">
                    <h3 class="a11y"><?php echo tpl_getLang('site_tools') ?></h3>
                    <?php tpl_searchform() ?>
                    <ul>
                        <?php
                            tpl_action('recent', 1, 'li');
                            tpl_action('index', 1, 'li');
                        ?>
                    </ul>
                </div>

            </div>
            <div class="clearer"></div>

            <!-- BREADCRUMBS -->
            <?php if($conf['breadcrumbs']){ ?>
                <div class="breadcrumbs"><?php tpl_breadcrumbs() ?></div>
            <?php } ?>
            <?php if($conf['youarehere']){ ?>
                <div class="breadcrumbs"><?php tpl_youarehere() ?></div>
            <?php } ?>

            <div class="clearer"></div>
            <hr class="a11y" />
        </div></div><!-- /header -->


        <div class="wrapper">

            <!-- ********** ASIDE ********** -->
            <div id="dokuwiki__aside"><div class="pad include">
                <?php tpl_include_page(tpl_getConf('sidebarID')) // includes the given wiki page ?>
                <div class="clearer"></div>
            </div></div><!-- /aside -->

            <!-- ********** CONTENT ********** -->
            <div id="dokuwiki__content"><div class="pad">
                <?php tpl_flush() // flush the output buffer ?>
                <?php _tpl_include('pageheader.html') ?>

                <div class="page">
                    <!-- wikipage start -->
                    <?php tpl_content() // the main content ?>
                    <!-- wikipage stop -->
                    <div class="clearer"></div>
                </div>

                <?php tpl_flush() ?>
                <?php _tpl_include('pagefooter.html') ?>
            </div></div><!-- /content -->

            <div class="clearer"></div>
            <hr class="a11y" />

            <!-- PAGE ACTIONS -->
            <?php if ($showTools): ?>
                <div id="dokuwiki__pagetools">
                    <h3 class="a11y"><?php echo tpl_getLang('page_tools') ?></h3>
                    <ul>
                        <?php
                            tpl_action('edit', 1, 'li');
                            _tpl_action('discussion', 1, 'li');
                            tpl_action('history', 1, 'li');
                            tpl_action('backlink', 1, 'li');
                            tpl_action('subscribe', 1, 'li');
                            tpl_action('revert', 1, 'li');
                            tpl_action('top', 1, 'li');
                        ?>
                    </ul>
                </div>
            <?php endif; ?>
        </div><!-- /wrapper -->

        <!-- ********** FOOTER ********** -->
        <div id="dokuwiki__footer"><div class="pad">
            <div class="doc"><?php tpl_pageinfo() // 'Last modified' etc ?></div>
            <?php tpl_license('button') // content license, parameters: img=*badge|button|0, imgonly=*0|1, return=*0|1 ?>
        </div></div><!-- /footer -->

        <?php _tpl_include('footer.html') ?>
    </div></div><!-- /site -->

    <div class="no"><?php tpl_indexerWebBug() // provide DokuWiki housekeeping, required in all templates ?></div>
*/ ?>
</body>
</html>
