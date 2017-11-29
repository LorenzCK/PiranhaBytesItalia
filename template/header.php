<!DOCTYPE html>
<html lang="it">
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>

    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700" rel="stylesheet" />
    <link href="<?php echo get_stylesheet_directory_uri(); ?>/resources/bootstrap.min.css?ts=201711300033" rel="stylesheet" />

    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_stylesheet_directory_uri(); ?>/resources/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_stylesheet_directory_uri(); ?>/resources/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" sizes="16x16" href="<?php echo get_stylesheet_directory_uri(); ?>/resources/favicon.ico">

    <?php wp_head(); ?>

    <?php if(is_singular() && have_posts()) : ?>
      <?php the_post(); ?>
    <!-- Facebook open graph -->
    <meta property="og:title" content="<?php wp_title('|', true, 'right'); bloginfo('name'); ?>" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="<?php the_permalink(); ?>" />
    <?php if(has_post_thumbnail()) :
      //Gets image properties from thumbnail ID, and extracts URL (first element)
      $thumbnail_attribs = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
      ?><meta property="og:image" content="<?php echo $thumbnail_attribs[0]; ?>" /><meta property="og:image:width" content="<?php echo $thumbnail_attribs[1]; ?>" /><meta property="og:image:height" content="<?php echo $thumbnail_attribs[2]; ?>" />
    <?php else :
      ?><meta property="og:image" content="<?php echo get_stylesheet_directory_uri(); ?>/resources/piranha-bytes-italia-fb-cover.jpg" /><meta property="og:image:width" content="1600" /><meta property="og:image:height" content="875" />
    <?php endif; ?>
      <?php rewind_posts(); ?>
    <?php else: ?>
    <meta property="og:title" content="<?php wp_title('|', true, 'right'); bloginfo('name'); ?>" />
    <meta property="og:type" content="website" />
    <?php endif; ?>

    <meta property="og:site_name" content="<?php bloginfo('name'); ?>" />
    <meta property="fb:app_id" content="1966462676957100" />
    <meta property="fb:admins" content="1173236424" />
  </head>

  <body <?php body_class(); ?>>
    <div class="navbar-container navbar-fixed-top">
      <!-- Top navbar -->
      <nav class="navbar navbar-top">
        <div class="container">
          <ul class="nav navbar-nav">
            <li><a href="<?php echo get_home_url(); ?>" title="Piranha Bytes Italia homepage e notizie">Homepage</a></li>
            <li><a href="<?php echo pbi_page_link_from_slug('staff'); ?>" title="Staff e contatti">Staff</a></li>
            <li><a href="http://forum.multiplayer.it/forumdisplay.php?332-Piranha-Bytes-Italia" title="Forum su Multiplayer.it">Forum</a></li>
            <li class="extra-space"><a href="https://www.facebook.com/groups/staffrisenitalia/" title="Iscriviti al gruppo Piranha Bytes Italia su Facebook"><img src="<?php echo get_stylesheet_directory_uri(); ?>/resources/icon-facebook-white.png" alt="Facebook icon" /></a></li>
            <li><a href="https://www.youtube.com/user/GothicRisenItalia" title="Segui Piranha Bytes Italia su Youtube"><img src="<?php echo get_stylesheet_directory_uri(); ?>/resources/icon-youtube-white.png" alt="Youtube icon" /></a></li>
            <li><a href="https://www.twitch.tv/piranhabytesitalia" title="Segui Piranha Bytes Italia su Twitch"><img src="<?php echo get_stylesheet_directory_uri(); ?>/resources/icon-twitch-white.png" alt="Twitch icon" /></a></li>
            <li><a href="https://plus.google.com/+GothicRisenItalia" title="Segui Piranha Bytes Italia su Google+"><img src="<?php echo get_stylesheet_directory_uri(); ?>/resources/icon-googleplus-white.png" alt="Google Plus icon" /></a></li>
            <li><a href="<?php bloginfo('rss2_url'); ?>" title="Segui il Feed RSS di Piranha Bytes Italia"><img src="<?php echo get_stylesheet_directory_uri(); ?>/resources/icon-rss-white.png" alt="RSS 2.0 Feed icon" /></a></li>
          </ul>
        </div>
      </nav>

      <!-- Lower navbar -->
      <nav class="navbar navbar-default">
        <div class="container">
          <div id="logo" class="navbar-header">
            <a class="navbar-brand" href="<?php echo get_home_url(); ?>" title="Piranha Bytes Italia homepage">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/resources/piranha-bytes-italia-icon.png" width="679" height="759" alt="Piranha Bytes Italia logo" />
            </a>
          </div>
          <div class="social-bar">
            <a href="https://www.facebook.com/groups/staffrisenitalia/" title="Iscriviti al gruppo Piranha Bytes Italia su Facebook"><img src="<?php echo get_stylesheet_directory_uri(); ?>/resources/icon-facebook-black.png" alt="Facebook icon" /></a>
            <a href="https://www.youtube.com/user/GothicRisenItalia" title="Segui Piranha Bytes Italia su Youtube"><img src="<?php echo get_stylesheet_directory_uri(); ?>/resources/icon-youtube-black.png" alt="Youtube icon" /></a>
            <a href="https://www.twitch.tv/piranhabytesitalia" title="Segui Piranha Bytes Italia su Twitch"><img src="<?php echo get_stylesheet_directory_uri(); ?>/resources/icon-twitch-black.png" alt="Twitch icon" /></a>
            <a href="https://plus.google.com/+GothicRisenItalia" title="Segui Piranha Bytes Italia su Google+"><img src="<?php echo get_stylesheet_directory_uri(); ?>/resources/icon-googleplus-black.png" alt="Google Plus icon" /></a>
          </div>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Espandi menù di navigazione</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Gothic <span class="caret hidden-xs"></span></a>
                <ul class="dropdown-menu">
                  <li class="dropdown-header">I giochi</li>
                  <li><a href="<?php echo pbi_page_link_from_slug('gothic'); ?>" title="Descrizione di Gothic">Gothic</a></li>
                  <li><a href="<?php echo pbi_page_link_from_slug('gothic-2'); ?>" title="Descrizione di Gothic II">Gothic II</a></li>
                  <li><a href="<?php echo pbi_page_link_from_slug('gothic-2-la-notte-del-corvo'); ?>" title="Descrizione di Gothic II: La Notte del Corvo">Gothic II: La Notte del Corvo</a></li>
                  <li><a href="<?php echo pbi_page_link_from_slug('gothic-3'); ?>" title="Descrizione di Gothic 3">Gothic 3</a></li>
                  <li><a href="<?php echo pbi_page_link_from_slug('gothic-3-forsaken-gods'); ?>" title="Descrizione di Gothic 3: Forsaken Gods">Gothic 3: Forsaken Gods</a></li>

                  <li role="separator" class="divider"></li>

                  <li><a href="<?php echo pbi_page_link_from_path('modding/saga-di-gothic'); ?>" title="Modifiche e progetti relativi alla saga di Gothic">Modding</a></li>

                  <li role="separator" class="divider"></li>

                  <li><a href="http://www.gothicitalia.it">Visita Gothic Italia!</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Elex <span class="caret hidden-xs"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo pbi_page_link_from_slug('elex'); ?>" title="Descrizione di Elex">Il gioco</a></li>
                  <li><a href="<?php echo pbi_category_link_from_slug('elex'); ?>" title="Notizie relative ad Elex">Notizie</a></li>
                  <li><a href="<?php echo pbi_category_link_from_slug('raccolta-stampa-elex'); ?>" title="Raccolta stampa, articoli ed interviste relative ad Elex">Raccolta Stampa</a></li>
                  <li><a href="<?php echo pbi_category_link_from_slug('multimedia-elex'); ?>" title="Multimedia relativo ad Elex">Multimedia</a></li>
                  <li><a href="<?php echo pbi_page_link_from_path('modding/elex'); ?>" title="Modding relativo ad Elex">Modding</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Risen <span class="caret hidden-xs"></span></a>
                <ul class="dropdown-menu dropdown-menu-right">
                  <li class="dropdown-header">Risen 1</li>
                  <li><a href="<?php echo pbi_page_link_from_slug('risen'); ?>" title="Descrizione di Risen 1">Il gioco</a></li>
                  <li><a href="<?php echo pbi_category_link_from_slug('risen1'); ?>" title="Notizie relative a Risen">Notizie</a></li>
                  <li><a href="<?php echo pbi_category_link_from_slug('il-contesto-risen1'); ?>" title="Il contesto di Risen 1">Il contesto</a></li>
                  <li><a href="<?php echo pbi_category_link_from_slug('raccolta-stampa-risen1'); ?>" title="Raccolta stampa, articoli ed interviste relative a Risen 1">Raccolta stampa</a></li>
                  <li><a href="<?php echo pbi_category_link_from_slug('multimedia-risen1'); ?>" title="Multimedia relativo a Risen 1">Multimedia</a></li>
                  <li><a href="<?php echo pbi_category_link_from_slug('download-risen1'); ?>" title="Download relativi a Risen 1">Download</a></li>

                  <li role="separator" class="divider"></li>

                  <li class="dropdown-header">Risen 2</li>
                  <li><a href="<?php echo pbi_page_link_from_slug('risen-2-dark-waters'); ?>" title="Descrizione di Risen 2">Il gioco</a></li>
                  <li><a href="<?php echo pbi_category_link_from_slug('risen2'); ?>" title="Notizie relative a Risen 2">Notizie</a></li>
                  <li><a href="<?php echo pbi_category_link_from_slug('il-contesto-risen2'); ?>" title="Il contesto e l'ambientazione di Risen 2">Il contesto</a></li>
                  <li><a href="<?php echo pbi_category_link_from_slug('raccolta-stampa-risen2'); ?>" title="Raccolta stampa, articoli ed interviste relative a Risen 2">Raccolta stampa</a></li>
                  <li><a href="<?php echo pbi_category_link_from_slug('making-of-risen2'); ?>" title="Making of di Risen 2">Making of</a></li>
                  <li><a href="<?php echo pbi_category_link_from_slug('multimedia-risen2'); ?>" title="Multimedia relativo a Risen 2">Multimedia</a></li>
                  <li><a href="<?php echo pbi_category_link_from_slug('dlc-risen2'); ?>" title="Downloadable Content relativo a Risen 2">DLC</a></li>
                  <li><a href="<?php echo pbi_category_link_from_slug('supporto-risen2'); ?>" title="Supporto per Risen 2">Supporto</a></li>

                  <li role="separator" class="divider"></li>

                  <li class="dropdown-header">Risen 3</li>
                  <li><a href="<?php echo pbi_page_link_from_slug('risen-3-titan-lords'); ?>" title="Descrizione di Risen 3">Il gioco</a></li>
                  <li><a href="<?php echo pbi_category_link_from_slug('risen3'); ?>" title="Notizie relative a Risen 3">Notizie</a></li>
                  <li><a href="<?php echo pbi_category_link_from_slug('il-contesto-risen3'); ?>" title="Il contesto e l'ambientazione di Risen 3">Il contesto</a></li>
                  <li><a href="<?php echo pbi_category_link_from_slug('raccolta-stampa-risen3'); ?>" title="Raccolta stampa, articoli ed interviste relative a Risen 3">Raccolta stampa</a></li>
                  <li><a href="<?php echo pbi_category_link_from_slug('multimedia-risen3'); ?>" title="Multimedia relativo a Risen 3">Multimedia</a></li>
                  <li><a href="<?php echo pbi_category_link_from_slug('supporto-risen3'); ?>" title="Supporto per Risen 3">Supporto</a></li>

                  <li role="separator" class="divider"></li>

                  <li><a href="<?php echo pbi_page_link_from_path('modding/saga-di-risen'); ?>" title="Modifiche e progetti relativi alla saga di Risen">Modding</a></li>
                </ul>
              </li>

              <li class="visible-xs-block">
                <a href="http://forum.multiplayer.it/forumdisplay.php?332-Piranha-Bytes-Italia" title="Forum su Multiplayer.it">Forum</a>
              </li>
            </ul>
          </div><!--/.navbar-collapse -->
        </div>
      </nav>
    </div><!--/.navbar-container -->

    <div class="rays-cover noselect"></div>

    <?php $section_class = pbi_get_section_class(); ?>

    <div class="wrapper <?php echo $section_class; ?>">

      <div class="section-header noselect" aria-hidden="true">
        <div class="container">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/resources/headers/<?php echo $section_class; ?>-0.5.png" srcset="<?php echo get_stylesheet_directory_uri(); ?>/resources/headers/<?php echo $section_class; ?>-0.5.png 300w, <?php echo get_stylesheet_directory_uri(); ?>/resources/headers/<?php echo $section_class; ?>-1.0.png 600w" />
        </div>
      </div>

      <div id="page-content" class="container">
