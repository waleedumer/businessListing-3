<header class="header menu_fixed">
    <div id="logo">
        <a href="<?php echo url('home'); ?>" title="{{\App\Setting::all()->keyBy('type')['system_title']->description}}">
            <img src="<?php echo asset('global/light_logo.png');?>" width="165" height="35" alt="" class="logo_normal">
            <img src="<?php echo asset('global/dark_logo.png');?>" width="165" height="35" alt="" class="logo_sticky">
        </a>
    </div>
    <ul id="top_menu">
        @if(!(Auth::check()))
        <li><a href="<?php echo url('login'); ?>" class="login" title="Sign In">Sign In</a></li>
        @endif
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
</header>
