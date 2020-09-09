<div class="sidebar-menu">
    <header class="logo-env" >

        <!-- logo collapse icon -->
        <div class="sidebar-collapse" style="margin-top: 0px;">
            <a href="#" class="sidebar-collapse-icon" onclick="hide_brand()">
                <i class="entypo-menu"></i>
            </a>
        </div>
        <script type="text/javascript">
            function hide_brand() {
                $('#branding_element').toggle();
            }
        </script>

        <!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
        <div class="sidebar-mobile-menu visible-xs">
            <a href="#" class="with-animation">
                <i class="entypo-menu"></i>
            </a>
        </div>
    </header>

    <div style=""></div>
    <ul id="main-menu" class="">
        <div style="text-align: -webkit-center;" id="branding_element">
            <img src="<?php echo asset('global/light_logo.png'); ?>"  style="max-height:30px;"/>
        </div>
        <br>
        <!-- Home -->
        <li class="<?php if ($page_data['page_name'] == 'dashboard') echo 'active'; ?> " style="border-top:1px solid #232540;">
            <a href="<?php echo route('user.dashboard'); ?>">
                <i class="fa fa-home"></i>
                <span>Dashboard</span>
            </a>
        </li>



        <!-- Listings -->
        <li class="<?php if ($page_data['page_name'] == 'listings' || $page_data['page_name'] == 'listing_add_wiz' || $page_data['page_name'] == 'listing_edit_wiz') echo 'opened active has-sub'; ?>">
            <a href="#">
                <i class="fa fa-sitemap"></i>
                <span>Directory</span>
            </a>
            <ul>
                <li class="<?php if ($page_data['page_name'] == 'listings') echo 'active'; ?> ">
                    <a href="<?php echo route('user.listings.index'); ?>">
                        <span><i class="entypo-dot"></i> All directories</span>
                    </a>
                </li>

                <li class="<?php if ($page_data['page_name']== 'listing_add_wiz') echo 'active'; ?> ">
                    <a href="<?php echo route('user.listings.create'); ?>">
                        <span><i class="entypo-dot"></i> Add new directory</span>
                    </a>
                </li>
            </ul>
        </li>
        <!-- Bookings -->
        <li class="<?php if ($page_data['page_name'] == 'booking_request_hotel' || $page_data['page_name'] == 'booking_request_restaurant' || $page_data['page_name'] == 'booking_request_beauty') echo 'opened active has-sub'; ?>">
            <a href="#">
                <i class="fa fa-tasks"></i>
                <span>Booking requests</span>
            </a>
            <ul>
                <li class="<?php if ($page_data['page_name'] == 'booking_request_hotel') echo 'active'; ?> ">
                    <a href="<?php echo url('user/booking_request_hotel'); ?>">
                        <span><i class="entypo-dot"></i> Hotel</span>
                    </a>
                </li>

                <li class="<?php if ($page_data['page_name'] == 'booking_request_restaurant') echo 'active'; ?> ">
                    <a href="<?php echo url('user/booking_request_restaurant'); ?>">
                        <span><i class="entypo-dot"></i>Restaurant</span>
                    </a>
                </li>
                <li class="<?php if ($page_data['page_name'] == 'booking_request_beauty') echo 'active'; ?> ">
                    <a href="<?php echo url('user/booking_request_beauty'); ?>">
                        <span><i class="entypo-dot"></i> Beauty</span>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Pricing -->
        <li class="<?php if ($page_data['page_name'] == 'packages' || $page_data['page_name'] == 'purchase_history' || $page_data['page_name'] == 'package_invoice') echo 'opened active has-sub'; ?>">
            <a href="#">
                <i class="fa fa-credit-card"></i>
                <span>Pricings</span>
            </a>
            <ul>
                <li class="<?php if ($page_data['page_name'] == 'packages') echo 'active'; ?> ">
                    <a href="<?php echo url('user/packages'); ?>">
                        <span><i class="entypo-dot"></i> All packages</span>
                    </a>
                </li>
                <?php if (auth()->user()->packages()->exists()): ?>
                <li class = "<?php if($page_data['page_name'] == 'purchase_history' || $page_data['page_name'] == 'package_invoice') echo 'active'; ?>">
                    <a href="<?php echo url('user/purchase_history'); ?>">
                        <span><i class="entypo-dot"></i>Purchase history
                    </a>
                </li>
                <?php endif; ?>
            </ul>
        </li>

        <!-- Wishlist -->
        <li class="<?php if ($page_data['page_name'] == 'wishlists') echo 'active'; ?>">
            <a href="<?php echo route('user.wishlists'); ?>">
                <i class="fa fa-heart"></i>
                <span>Wishlist</span>
            </a>
        </li>

        <!-- Manage Profile -->
        <li class="<?php if ($page_data['page_name'] == 'manage_profile') echo 'active'; ?>">
            <a href="<?php echo route('user.manage_profile',auth()->user()->id); ?>">
                <i class="fa fa-user"></i>
                <span>Account</span>
            </a>
        </li>
    </ul>
</div>
