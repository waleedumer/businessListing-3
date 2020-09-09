<header class="header_in is_sticky menu_fixed">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-12">
                <div id="logo">
                    <a href="<?php echo url('home'); ?>">
                        <img src="<?php echo asset('global/dark_logo.png');?>" width="165" height="35" alt="" class="logo_sticky">
                    </a>
                </div>
            </div>
            <div class="col-lg-9 col-12">
                <ul id="top_menu">
                    <?php if (!Auth::check()): ?>
                    <li><a href="<?php echo url('login'); ?>" class="login" title="Sign In">Sign In</a></li>
                    <?php endif; ?>
                </ul>
                <!-- /top_menu -->
                <a href="#menu" class="btn_mobile">
                    <div class="hamburger hamburger--spin" id="hamburger">
                        <div class="hamburger-box">
                            <div class="hamburger-inner"></div>
                        </div>
                    </div>
                </a>
                @include('includes.frontend.content.menu')
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</header>
<!-- /header -->

<div class="sub_header_in sticky_header">
    <div class="container">
        <h1><?php echo $page_data['page_title']??''; ?></h1>
    </div>
    <!-- /container -->
</div>
<!-- /sub_header -->
