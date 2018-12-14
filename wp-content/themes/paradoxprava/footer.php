    </main>
    <footer class="footer-main">
      <div class="footer-main__wrapper">
        <nav class="footer-main__footer_nav footer-nav">
          <!-- <ul class="footer-nav__list">
            <li class="footer-nav__item"><a class="footer-nav__link" href="#">Главная</a></li>
            <li class="footer-nav__item"><a class="footer-nav__link" href="#">Главная</a></li>
            <li class="footer-nav__item"><a class="footer-nav__link" href="#">Главная</a></li>
            <li class="footer-nav__item"><a class="footer-nav__link" href="#">Главная</a></li>
            <li class="footer-nav__item"><a class="footer-nav__link" href="#">Главная</a></li>
          </ul> -->
          <?php wp_nav_menu(
            array(
              'menu'=>'FooterMenu',
              'container'=>'',
              'menu_class'=>'footer-nav__list'
            )
          ); ?>
        </nav>
        <address class="footer-main__contacts-block contacts-block contacts-block--footer">
          г. Москва, ст. м. Китай-Город,<br> ул. Солянка, д. 15, этаж 1, офис 103<br> <a class="contacts-block__link" href="tel:84991361551">8-499-136-15-51</a>, <a class="contacts-block__link" href="tel:89055363001">8-905-536-30-01</a>, <a class="contacts-block__link" href="tel:89645944334">8-964-594-43-34</a> <br>Ежедневно с 09:00 до 20:00 <br><a class="contacts-block__link" href="javascript:jivo_api.open();">Написать нам</a>
        </address>
        <small class="footer-main__copyrights">&copy; 2018 Парадокс Права</small>
      </div>
    </footer>
    <!-- <script src="js/app.min.js"></script> -->
    <? if(!is_front_page()) { ?>
    <script>
    window.onload = function() {
      $(".main-nav").goTo();
    }
    </script>
    <? } ?>
      <?php wp_footer(); ?>
      <!-- BEGIN JIVOSITE CODE {literal} -->
      <script>
      (function(){ var widget_id = '6qhj7OUim8';var d=document;var w=window;function l(){var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true;s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);}if(d.readyState=='complete'){l();}else{if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})();
      </script>
      <!-- {/literal} END JIVOSITE CODE -->
  </body>
</html>
