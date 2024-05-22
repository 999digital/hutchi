<div class="btt"><a href="#main-content"><?php include realpath(dirname(__DIR__)) . '/hutchi/img/arrow-right.svg'; ?><span class="text">Back to top</span></a></div>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-end"><p class="eyebrow theme-white">Let's Connect</p></div>
        </div>
        <div class="row header-row">
            <div class="col-12 col-md-6"><p class="display-2">Made<br>for people</p></div>
            <div class="col-12 col-md-6 d-flex justify-content-end"><p class="has-text-align-right">
                    <a href="https://www.instagram.com/hutchi_tech/" target="_blank" class="sm-icon instagram"
                       title="instagram"><?php include realpath(dirname(__DIR__)) . '/hutchi/img/instagram.svg'; ?></a>
                    <a href="https://www.facebook.com/HutchiTech" target="_blank" class="sm-icon facebook"
                       title="facebook"><?php include realpath(dirname(__DIR__)) . '/hutchi/img/facebook.svg'; ?></a>
                    <a href="https://x.com/Hutchi_tech" target="_blank" class="sm-icon x"
                       title="x"><?php include realpath(dirname(__DIR__)) . '/hutchi/img/x.svg'; ?></a>
                    <!--a href="https://vimeo.com" target="_blank" class="sm-icon vimeo"
                       title="vimeo"><?php include realpath(dirname(__DIR__)) . '/hutchi/img/vimeo.svg'; ?></a-->
                    <a href="https://www.linkedin.com/company/hutchi-tech/" target="_blank" class="sm-icon linkedin"
                       title="linkedin"><?php include realpath(dirname(__DIR__)) . '/hutchi/img/linkedin.svg'; ?></a>
                    <br>
                    <a href="mailto:info@hutchison-t.com">info@hutchi.tech</a>
                    <br>Tel. 0333 240 7369</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-3">
                <h6 class="title-sub"><a href="/solutions/">SOLUTIONS</a></h6>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'menu-f1',
                    'depth' => 1,
                    'container' => 'div'
                ));
                ?>
            </div>
            <div class="col-12 col-md-3">
                <h6 class="title-sub"><a href="/sectors/">SECTORS</a></h6>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'menu-f2',
                    'depth' => 1,
                    'container' => 'div'
                ));
                ?>
            </div>
            <div class="col-12 col-md-3">
                <h6 class="title-sub">COMPANY</h6>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'menu-f3',
                    'depth' => 1,
                    'container' => 'div'
                ));
                ?>
            </div>
            <div class="col-12 col-md-3">
                <h6 class="title-sub">INFORMATION</h6>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'menu-f4',
                    'depth' => 1,
                    'container' => 'div'
                ));
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <p class="copyright">&copy; <?php echo date('Y'); ?> HUTCHISON TECHNOLOGIES LTD.</p>
            </div>
        </div>
    </div>

    <?php wp_footer() ?>
</footer>
</body>
</html>