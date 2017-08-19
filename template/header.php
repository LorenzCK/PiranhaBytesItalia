<!DOCTYPE html>
<html lang="it">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>

    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700" rel="stylesheet" />
    <link href="<?php echo get_stylesheet_directory_uri(); ?>/resources/fonts/aqua-webfont.css" rel="stylesheet" />
    <link href="<?php echo get_stylesheet_directory_uri(); ?>/resources/bootstrap.min.css" rel="stylesheet" />
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
                  <li class="dropdown-header">Gothic 1</li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li role="separator" class="divider"></li>
                  <li class="dropdown-header">Gothic 2</li>
                  <li><a href="#">Separated link</a></li>
                  <li><a href="#">One more separated link</a></li>
                  <li role="separator" class="divider"></li>
                  <li class="dropdown-header">Gothic 3</li>
                  <li><a href="#">Separated link</a></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Elex <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo get_term_link('elex', 'category'); ?>" title="Notizie relative ad Elex">Notizie</a></li>
                  <li><a href="#">Download</a></li>
                  <li><a href="#">Preview</a></li>
                  <li><a href="#">Recensioni</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Risen <span class="caret"></span></a>
                <ul class="dropdown-menu dropdown-menu-right">
                  <li><a href="<?php echo get_term_link('risen-saga', 'category'); ?>" title="Notizie relative alla saga di Risen">Notizie</a></li>
                  <li role="separator" class="divider"></li>
                  <li class="dropdown-header">Risen 1</li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li role="separator" class="divider"></li>
                  <li class="dropdown-header">Risen 2</li>
                  <li><a href="#">Separated link</a></li>
                  <li><a href="#">One more separated link</a></li>
                  <li role="separator" class="divider"></li>
                  <li class="dropdown-header">Risen 3</li>
                  <li><a href="#">Separated link</a></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </li>
            </ul>
          </div><!--/.navbar-collapse -->
        </div>
      </nav>
    </div><!--/.navbar-container -->

    <div class="wrapper <?php echo pbi_get_section_class(); ?>">

      <div class="section-header noselect" aria-hidden="true">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/resources/headers/<?php echo pbi_get_section_class(); ?>-0.5.png" srcset="<?php echo get_stylesheet_directory_uri(); ?>/resources/headers/<?php echo pbi_get_section_class(); ?>-0.5.png 300w, <?php echo get_stylesheet_directory_uri(); ?>/resources/headers/<?php echo pbi_get_section_class(); ?>-1.0.png 600w" />
      </div>

      <div id="page-content" class="container">
