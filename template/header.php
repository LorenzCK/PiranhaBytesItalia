<!DOCTYPE html>
<html lang="it">
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>

    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700" rel="stylesheet" />
    <link href="<?php echo get_stylesheet_directory_uri(); ?>/resources/bootstrap.min.css" rel="stylesheet" />

    <?php wp_head(); ?>
  </head>

  <body>
    <div class="navbar-container navbar-fixed-top">
      <!-- Top navbar -->
      <nav class="navbar navbar-top">
        <div class="container">
          <ul class="nav navbar-nav">
            <li><a href="<?php echo get_home_url(); ?>" title="Piranha Bytes Italia homepage e notizie">Homepage</a></li>
            <li><a href="<?php echo pbi_page_permalink_from_slug('staff'); ?>" title="Staff e contatti">Staff</a></li>
            <li><a href="http://forum.multiplayer.it/forumdisplay.php?332-Gothic-Italia" title="Forum su Multiplayer.it">Forum</a></li>
            <li><a href="https://www.facebook.com/groups/staffrisenitalia/" title="Iscriviti al gruppo Piranha Bytes Italia su Facebook"><img src="<?php echo get_stylesheet_directory_uri(); ?>/resources/icon-facebook-white.png" alt="Facebook icon" /></a></li>
            <li><a href="https://www.youtube.com/user/GothicRisenItalia" title="Segui Piranha Bytes Italia su Youtube"><img src="<?php echo get_stylesheet_directory_uri(); ?>/resources/icon-youtube-white.png" alt="Youtube icon" /></a></li>
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
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Espandi menù di navigazione</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Gothic <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo get_term_link('gothic-saga', 'category'); ?>" title="Notizie relative alla saga di Gothic">Notizie</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="#">Coming soon…</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Elex <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo get_term_link('elex', 'category'); ?>" title="Notizie relative ad Elex">Notizie</a></li>
                  <li><a href="<?php echo get_term_link('raccolta-stampa-elex', 'category'); ?>" title="Raccolta stampa, articoli ed interviste relative ad Elex">Raccolta Stampa</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Risen <span class="caret"></span></a>
                <ul class="dropdown-menu dropdown-menu-right">
                  <li><a href="<?php echo get_term_link('risen-saga', 'category'); ?>" title="Notizie relative alla saga di Risen">Notizie</a></li>
                  <li role="separator" class="divider"></li>
                  <li class="dropdown-header">Risen 1</li>
                  <li><a href="<?php echo get_term_link('raccolta-stampa-risen1', 'category'); ?>" title="Raccolta stampa, articoli ed interviste relative a Risen 1">Raccolta stampa</a></li>
                  <li><a href="<?php echo get_term_link('multimedia-risen1', 'category'); ?>" title="Multimedia relativo a Risen 1">Multimedia</a></li>
                  <li><a href="<?php echo get_term_link('modding-risen1', 'category'); ?>" title="Modding relativo a Risen 1">Modding</a></li>
                  <li><a href="<?php echo get_term_link('il-bestiario-risen1', 'category'); ?>" title="Il bestiario di Risen 1">Il bestiario</a></li>
                  <li role="separator" class="divider"></li>
                  <li class="dropdown-header">Risen 2</li>
                  <li><a href="<?php echo get_term_link('raccolta-stampa-risen2', 'category'); ?>" title="Raccolta stampa, articoli ed interviste relative a Risen 2">Raccolta stampa</a></li>
                  <li><a href="<?php echo get_term_link('making-of-risen2', 'category'); ?>" title="Making of di Risen 2">Making of</a></li>
                  <li><a href="<?php echo get_term_link('il-contesto-risen2', 'category'); ?>" title="Il contesto e l'ambientazione di Risen 2">Il contesto</a></li>
                  <li><a href="<?php echo get_term_link('multimedia-risen2', 'category'); ?>" title="Multimedia relativo a Risen 2">Multimedia</a></li>
                  <li><a href="<?php echo get_term_link('dlc-risen2', 'category'); ?>" title="Downloadable Content relativo a Risen 2">DLC</a></li>
                  <li><a href="<?php echo get_term_link('modding-risen2', 'category'); ?>" title="Modding relativo a Risen 2">Modding</a></li>
                  <li><a href="<?php echo get_term_link('supporto-risen2', 'category'); ?>" title="Supporto per Risen 2">Supporto</a></li>
                  <li role="separator" class="divider"></li>
                  <li class="dropdown-header">Risen 3</li>
                  <li><a href="<?php echo get_term_link('raccolta-stampa-risen3', 'category'); ?>" title="Raccolta stampa, articoli ed interviste relative a Risen 3">Raccolta stampa</a></li>
                  <li><a href="<?php echo get_term_link('il-contesto-risen3', 'category'); ?>" title="Il contesto e l'ambientazione di Risen 3">Il contesto</a></li>
                  <li><a href="<?php echo get_term_link('multimedia-risen3', 'category'); ?>" title="Multimedia relativo a Risen 3">Multimedia</a></li>
                  <li><a href="<?php echo get_term_link('supporto-risen3', 'category'); ?>" title="Supporto per Risen 3">Supporto</a></li>
                </ul>
              </li>
            </ul>
          </div><!--/.navbar-collapse -->
        </div>
      </nav>
    </div><!--/.navbar-container -->

    <?php $section_class = pbi_get_section_class(); ?>

    <div class="wrapper <?php echo $section_class; ?>">

      <div class="section-header noselect" aria-hidden="true">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/resources/headers/<?php echo $section_class; ?>-0.5.png" srcset="<?php echo get_stylesheet_directory_uri(); ?>/resources/headers/<?php echo $section_class; ?>-0.5.png 300w, <?php echo get_stylesheet_directory_uri(); ?>/resources/headers/<?php echo $section_class; ?>-1.0.png 600w" />
      </div>

      <div id="page-content" class="container">
