<!DOCTYPE html>
<html lang="ru" dir="ltr" class="nojs">
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- <link rel="stylesheet" href="css/style.min.css"> -->
      <meta name="description" content="">
      <meta name="author" content="Alexander Komarov">
      <link type="text/plain" rel="author" href="humans.txt" />
      <!-- <link rel="preload" href="/wp-content/themes/paradoxprava/assets/fonts/roboto-v18-latin_cyrillic-regular.woff2" as="font">
      <link rel="preload" href="/wp-content/themes/paradoxprava/assets/fonts/roboto-v18-latin_cyrillic-700.woff2" as="font"> -->

      <link rel="apple-touch-icon" sizes="180x180" href="/wp-content/themes/paradoxprava/assets/img/apple-touch-icon.png">
      <link rel="icon" type="image/png" sizes="32x32" href="/wp-content/themes/paradoxprava/assets/img/favicon-32x32.png">
      <link rel="icon" type="image/png" sizes="16x16" href="/wp-content/themes/paradoxprava/assets/img/favicon-16x16.png">
      <link rel="manifest" href="/wp-content/themes/paradoxprava/assets/img/site.webmanifest">
      <link rel="mask-icon" href="/wp-content/themes/paradoxprava/assets/img/safari-pinned-tab.svg" color="#5bbad5">
      <link rel="shortcut icon" href="/wp-content/themes/paradoxprava/assets/img/favicon.ico">
      <meta name="msapplication-TileColor" content="#da532c">
      <meta name="msapplication-config" content="/wp-content/themes/paradoxprava/assets/img/browserconfig.xml">
      <meta name="theme-color" content="#ffffff">
      <title><?php echo wp_get_document_title(); ?></title>
      <?php wp_head(); ?>
  </head>
  <body>
    <header class="header-main no-webp">
      <div class="header-banner">
        <div class="header-banner__wrapper">
          <div class="header-banner__logo logo">
            <img class="logo__image" src="/wp-content/themes/paradoxprava/assets/img/logo.svg" width="90" height="90" alt="Логотип ПарадоксПрава">
            <p class="logo__text">Парадокс <br>права</p>
          </div>
          <p class="header-banner__promo-text">Юридические услуги</p>
          <p class="header-banner__contacts">г. Москва, ст. м. Китай-Город,<br> ул. Солянка, д. 15, этаж 1, офис 103<br> <a class="header-banner__contacts-link" href="tel:84991361551">8-499-136-15-51</a>, <a class="header-banner__contacts-link" href="tel:89055363001">8-905-536-30-01</a>, <a class="header-banner__contacts-link" href="tel:89645944334">8-964-594-43-34</a> <br>Ежедневно с 09:00 до 20:00 <br><a class="header-banner__contacts-link" href="javascript:jivo_api.open();">Написать нам</a></p>
        </div>
      </div>
      <nav class="header-main__main-nav main-nav main-nav--nojs main-nav--opened">
        <!-- <span class="header-main__menu-label">Меню</span> -->
        <button class="main-nav__toggler" type="button" name="menutoggler"></button>
        <?php wp_nav_menu(
          array(
            'menu'=>'MainMenu',
            'container'=>'',
            'menu_class'=>'main-nav__list menu-list'
          )
        ); ?>
      </nav>
      <section class="header-contacts">
        <h2 class="visually-hidden">Контакты</h2>
        <div class="header-contacts__wrapper">
          <ul class="header-contacts__list">
            <li class="header-contacts__contact header-contacts__contact--phone">
              <a href="tel:+74991361551">+7 (499) 136-15-51</a>
            </li>
            <li class="header-contacts__contact header-contacts__contact--phone">
              <a href="tel:+79055363001">+7 (905) 536-30-01</a>
            </li>
            <li class="header-contacts__contact header-contacts__contact--phone">
              <a href="tel:+79645944334">+7 (964) 594-43-34</a>
            </li>
            <li class="header-contacts__contact header-contacts__contact--email">
              <a href="mailto:paradoxprava@yandex.ru">paradoxprava@yandex.ru</a>
            </li>
          </ul>
        </div>
      </section>
    </header>
    <main class="page-content <? if(is_front_page()) {echo 'page-content--front-page';} ?>">
      <? if(is_front_page()) { ?>
      <h1 class="page-content__header visually-hidden">Юридическая компания ПарадоксПрава</h1>
      <? } else { ?>
      <h1 class="page-content__header"><? wp_title(''); ?></h1>
      <? } ?>
