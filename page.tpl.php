 <?php
/**
* @file
* Default theme implementation to display a single Drupal page.
*
* Available variables:
*
* General utility variables:
* - $base_path: The base URL path of the Drupal installation. At the very
* least, this will always default to /.
* - $directory: The directory the template is located in, e.g. modules/system
* or themes/bartik.
* - $is_front: TRUE if the current page is the front page.
* - $logged_in: TRUE if the user is registered and signed in.
* - $is_admin: TRUE if the user has permission to access administration pages.
*
* Site identity:
* - $front_page: The URL of the front page. Use this instead of $base_path,
* when linking to the front page. This includes the language domain or
* prefix.
* - $logo: The path to the logo image, as defined in theme configuration.
* - $site_name: The name of the site, empty when display has been disabled
* in theme settings.
* - $site_slogan: The slogan of the site, empty when display has been disabled
* in theme settings.
*
* Navigation:
* - $main_menu (array): An array containing the Main menu links for the
* site, if they have been configured.
* - $secondary_menu (array): An array containing the Secondary menu links for
* the site, if they have been configured.
* - $breadcrumb: The breadcrumb trail for the current page.
*
* Page content (in order of occurrence in the default page.tpl.php):
* - $title_prefix (array): An array containing additional output populated by
* modules, intended to be displayed in front of the main title tag that
* appears in the template.
* - $title: The page title, for use in the actual HTML content.
* - $title_suffix (array): An array containing additional output populated by
* modules, intended to be displayed after the main title tag that appears in
* the template.
* - $messages: HTML for status and error messages. Should be displayed
* prominently.
* - $tabs (array): Tabs linking to any sub-pages beneath the current page
* (e.g., the view and edit tabs when displaying a node).
* - $action_links (array): Actions local to the page, such as 'Add menu' on the
* menu administration interface.
* - $feed_icons: A string of all feed icons for the current page.
* - $node: The node object, if there is an automatically-loaded node
* associated with the page, and the node ID is the second argument
* in the page's path (e.g. node/12345 and node/12345/revisions, but not
* comment/reply/12345).
*
* Regions:
* - $page['help']: Dynamic help text, mostly for admin pages.
* - $page['highlighted']: Items for the highlighted content region.
* - $page['content']: The main content of the current page.
* - $page['sidebar_first']: Items for the first sidebar.
* - $page['sidebar_second']: Items for the second sidebar.
* - $page['header']: Items for the header region.
* - $page['footer']: Items for the footer region.
*
* @see template_preprocess()
* @see template_preprocess_page()
* @see template_process()
*/
?>

<div id="page-wrapper">
  <div id="page">
    <div id="header">
      <div id="logo">
        <?php if ($logo): ?>
        <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo"> <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" /> </a>
        <?php endif; ?>
        <?php if ($site_name || $site_slogan): ?>
        <div id="name-and-slogan">
          <?php if ($site_name): ?>
          <?php if ($title): ?>
          <div id="site-name"><strong> <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a> </strong></div>
          <?php else: /* Use h1 when the content title is empty */ ?>
          <h1 id="site-name"> <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a> </h1>
          <?php endif; ?>
          <?php endif; ?>
          <?php if ($site_slogan): ?>
          <div id="site-slogan"><?php print $site_slogan; ?></div>
          <?php endif; ?>
        </div>
        <!-- /#name-and-slogan -->
        <?php endif; ?>
        <?php print render($page['header']); ?> </div>
      <ul class='social'>
        <li class='email'><a href='mailto:info@porternovelli.nl' name='email'>Email</a></li>
		<li class='flickr'><a href='http://www.flickr.com/photos/porternovellinl/' target="_blank" name='flickr'>Flickr</a></li>
        <li class='fb'><a href='http://www.facebook.com/PorterNovelliNL' name='Facebook' target='_blank'>Facebook</a></li>
        <li class='twitter'><a href='http://www.twitter.com/PorterNovelliNL' name='Twitter' target='_blank'>Twitter</a></li>
        <li class='linkedin'><a href='http://www.linkedin.com/companies/porter-novelli' name='Linked In' target='_blank'>Linked In</a></li>
        <li class='youtube'><a href='http://www.youtube.com/user/PorterNovelli' name='You Tube' target='_blank'>YouTube</a></li>
        <li class='blog'><a href='http://blog.porternovelli.nl' target="_blank">Blog</a></li>
      </ul>
    
    <!-- /.section, /#header -->
    <?php if ($main_menu || $secondary_menu): ?>
    <div id="navigation"> <?php print theme('links__system_main_menu', array('links' => $main_menu, 'attributes' => array('id' => 'main-menu', 'class' => array('links', 'inline', 'clearfix')), )); ?> </div>
    
    <?php endif; ?>
    </div><!-- /.section, /#navigation -->
    <?php print $messages; ?>
    <div id="main-wrapper">
      <div id="main" class="clearfix">
        <div id="content" class="column">
          <div id="content-node">
            <?php if ($page['highlighted']): ?>
            <div id="highlighted"><?php print render($page['highlighted']); ?></div>
            <?php endif; ?>
            <?php if ($title): 	            switch ($node->type){
	            case "contact":
	            echo("<h1 id=\"page-title\">Contact</h1>");
	            break;
	            case "human_resource":
	            echo("<h1 id=\"page-title\">Carri&#232;re</h1>");
	            break;
	            case "nieuws":
	            echo("<h1 id=\"page-title\">Nieuws</h1>");
	            break;}
		        endif; ?>
            <?php if ($tabs): ?>
            <div class="tabs"><?php print render($tabs); ?></div>
            <?php endif; ?>
            <?php print render($page['help']); ?>
            <?php if ($action_links): ?>
            <ul class="action-links">
              <?php print render($action_links); ?>
            </ul>
            <?php endif; ?>
            <?php print render($page['content']); ?><?php print $feed_icons; ?> </div>
        </div>
        <!---/content-node---> 
        <!-- /.section, /#content -->
        <?php if ($page['sidebar_first']): ?>
        <div id="sidebar-first" class="column sidebar"> <?php print render($page['sidebar_first']); ?> </div>
        <!-- /.section, /#sidebar-first -->
        <?php endif; ?>
        <?php if ($page['sidebar_second']): ?>
        <div id="sidebar-second" class="column sidebar equal_heights"> <?php print render($page['sidebar_second']); ?> </div>
        <!-- /.section, /#sidebar-second -->
        <?php endif; ?>
      </div>
    </div>
   
    <!-- /#main, /#main-wrapper -->
    <div id="footer">
      <div class="section"> <?php print render($page['footer']); ?> </div>
    </div>
    <!-- /.section, /#footer --> 
  </div>
</div>
<!-- /#page, /#page-wrapper --> 