<div class="sidebar-menu">
    <header class="logo-env">

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
            <img src="{{asset('global/light_logo.png')}}"  style="max-height:30px;"/>
        </div>
        <br>
        <!-- Home -->
        <li class="<?php if ($page_data ['page_name'] == 'dashboard') echo 'active'; ?> " style="border-top:1px solid #232540;">
            <a href="{{url('admin/dashboard')}}">
                <i class="fa fa-home"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <!-- Category -->
        <li class="<?php if ($page_data ['page_name']== 'categories' || $page_data ['page_name']  == 'sub_categories' || $page_data ['page_name'] == 'categories_create' || $page_data ['page_name'] == 'categories_edit') echo 'opened active has-sub'; ?>">
            <a href="#">
                <i class="fa fa-globe"></i>
                <span>Categories</span>
            </a>
            <ul>
                <li class="<?php if ($page_data ['page_name'] == 'categories') echo 'active'; ?> ">
                    <a href="{{route('categories.index')}}">
                        <span><i class="entypo-dot"></i> Categories</span>
                    </a>
                </li>

                <li class="<?php if ($page_data ['page_name']== 'categories_create') echo 'active'; ?> ">
                    <a href="{{route('categories.create')}}">
                        <span><i class="entypo-dot"></i> Add New Category</span>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Amenity -->
        <li class="<?php if ($page_data ['page_name'] == 'amenities' || $page_data ['page_name']== 'amenities_create' || ['page_name']== 'amenities_edit') echo 'opened active has-sub'; ?>">
            <a href="#">
                <i class="fa fa-puzzle-piece"></i>
                <span>Amenities</span>
            </a>
            <ul>
                <li class="<?php if ($page_data ['page_name']== 'amenities') echo 'active'; ?> ">
                    <a href="{{route('amenities.index')}}">
                        <span><i class="entypo-dot"></i> Amenities</span>
                    </a>
                </li>
                <li class="<?php if ($page_data ['page_name']== 'amenities_create') echo 'active'; ?> ">
                    <a href="{{route('amenities.create')}}">
                        <span><i class="entypo-dot"></i> Add New Amenity</span>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Listings -->
        <li class="<?php if ($page_data['page_name'] == 'listings' || $page_data['page_name'] == 'listing_create_wiz' || $page_data['page_name'] == 'listing_edit_wiz' || $page_data['page_name'] == 'reported_listings' || $page_data['page_name'] == 'listings_claimed') echo 'opened active has-sub'; ?>">
            <a href="#">
                <i class="fa fa-sitemap"></i>
                <span>Directory</span>
            </a>
            <ul>
                <li class="<?php if ($page_data['page_name'] == 'listings') echo 'active'; ?> ">
                    <a href="{{route('listings.index')}}">
                        <span><i class="entypo-dot"></i> All Directories</span>
                    </a>
                </li>

                <li class="<?php if ($page_data['page_name'] == 'listing_create_wiz') echo 'active'; ?> ">
                    <a href="{{route('listings.create')}}">
                        <span><i class="entypo-dot"></i> Add new Directory</span>
                    </a>
                </li>
                <li class="<?php if ($page_data['page_name'] == 'listings_claimed') echo 'active'; ?> ">
                    <a href="{{url('admin/claimed_listings')}}">
                        <span><i class="entypo-dot"></i>Claimed Directory</span>
                    </a>
                </li>
                <li class="<?php if ($page_data['page_name'] == 'reported_listings') echo 'active'; ?> ">
                    <a href="{{url('admin/reported_listings')}}">
                        <span><i class="entypo-dot"></i> Reported Directory</span>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Blogs -->
        <li class="<?php if ($page_data ['page_name'] == 'blogs' || $page_data['page_name']== 'blogs_create' || $page_data['page_name']== 'blogs_edit') echo 'opened active has-sub'; ?>">
            <a href="#">
                <i class="fa fa-align-left"></i>
                <span>Blog</span>
            </a>
            <ul>
                <li class="<?php if ($page_data ['page_name']== 'blogs') echo 'active'; ?> ">
                    <a href="{{url('admin/blogs')}}">
                        <span><i class="entypo-dot"></i> Posts</span>
                    </a>
                </li>
                <li class="<?php if ($page_data ['page_name'] == 'blogs_create') echo 'active'; ?> ">
                    <a href="{{route('blogs.create')}}">
                        <span><i class="entypo-dot"></i>Add New Post</span>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Bookings -->
        <li class="<?php if ($page_data['page_name'] == 'booking_hotel' || $page_data['page_name'] == 'booking_restaurant' || $page_data['page_name'] == 'booking_beauty') echo 'opened active has-sub'; ?>">
            <a href="#">
                <i class="fa fa-tasks"></i>
                <span>Booking Requests</span>
            </a>
            <ul>
                <li class="<?php if ($page_data['page_name'] == 'booking_hotel') echo 'active'; ?> ">
                    <a href="{{route('booking_hotel.index')}}">
                        <span><i class="entypo-dot"></i>Hotel</span>
                    </a>
                </li>

                <li class="<?php if ($page_data['page_name']=='booking_restaurant') echo 'active'; ?> ">
                    <a href="{{route('booking_restaurant.index')}}">
                        <span><i class="entypo-dot"></i>Restaurant</span>
                    </a>
                </li>
                <li class="<?php if ($page_data['page_name'] == 'booking_beauty') echo 'active'; ?> ">
                    <a href="{{route('booking_beauty.index')}}">
                        <span><i class="entypo-dot"></i>Beauty</span>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Cities -->
        <li class="<?php if ($page_data ['page_name'] == 'cities' || $page_data ['page_name'] == 'cities_create' || $page_data ['page_name'] == 'cities_edit') echo 'opened active has-sub'; ?>">
            <a href="#">
                <i class="fa fa-location-arrow"></i>
                <span>Cities</span>
            </a>
            <ul>
                <li class="<?php if ($page_data ['page_name']  == 'cities') echo 'active'; ?> ">
                    <a href="{{route('cities.index')}}">
                        <span><i class="entypo-dot"></i>Cities</span>
                    </a>
                </li>

                <li class="<?php if ($page_data ['page_name'] == 'cities_create') echo 'active'; ?> ">
                    <a href="{{route('cities.create')}}">
                        <span><i class="entypo-dot"></i>Add New City</span>
                    </a>
                </li>
            </ul>
        </li>
        <!-- Pricing -->
        <li class="<?php if ($page_data ['page_name']== 'packages' || $page_data ['page_name'] == 'packages_create' || $page_data ['page_name']  == 'packages_edit') echo 'opened active has-sub'; ?>">
            <a href="#">
                <i class="fa fa-credit-card"></i>
                <span>Pricings</span>
            </a>
            <ul>
                <li class="<?php if ($page_data ['page_name'] == 'packages') echo 'active'; ?> ">
                    <a href="{{route('packages.index')}}">
                        <span><i class="entypo-dot"></i>All Packages</span>
                    </a>
                </li>

                <li class="<?php if ($page_data ['page_name'] == 'packages_create') echo 'active'; ?> ">
                    <a href="{{route('packages.create')}}">
                        <span><i class="entypo-dot"></i>Add New Package</span>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Offline Payment -->
        <li class="<?php if ($page_data ['page_name']  == 'offline_payments') echo 'active'; ?> " style="border-top:1px solid #232540;">
            <a href="{{route('offline_payment.create')}}">
                <i class="fa fa-archive"></i>
                <span>Offline Payment</span>
            </a>
        </li>

        <!-- Reports -->
        <li class="<?php if ($page_data['page_name'] == 'payment_history' || $page_data['page_name'] == 'package_invoice') echo 'active'; ?> " style="border-top:1px solid #232540;">
            <a href="{{route('offline_payment.index')}}">
                <i class="fa fa-paperclip"></i>
                <span>Payment History</span>
            </a>
        </li>
        <!-- Rating wise quality -->
        <li class="<?php if ($page_data ['page_name']== 'rating_wise_quality' || $page_data ['page_name'] == 'rating_wise_quality_edit') echo 'active'; ?> " style="border-top:1px solid #232540;">
            <a href="{{route('review_wise_quality.index')}}">
                <i class="fa fa-thumbs-up"></i>
                <span>Rating Wise Quality</span>
            </a>
        </li>

        <!-- Users -->
        <li class="<?php if ($page_data ['page_name'] == 'agents' || $page_data ['page_name'] == 'users' || $page_data ['page_name'] == 'user_create' || $page_data ['page_name']== 'user_edit') echo 'opened active has-sub'; ?>">
            <a href="#">
                <i class="fa fa-users"></i>
                <span>Users</span>
            </a>
            <ul>
                <li class="<?php if ($page_data ['page_name']  == 'users') echo 'active'; ?> ">
                    <a href="{{url('admin/users')}}">
                        <span><i class="entypo-dot"></i> Users</span>
                    </a>
                </li>

                <li class="<?php if ($page_data['page_name']  == 'user_create') echo 'active'; ?> ">
                    <a href="{{route('users.create')}}">
                        <span><i class="entypo-dot"></i>Add New user</span>
                    </a>
                </li>
            </ul>
        </li>
        <!-- SETTINGS -->
        <li class="<?php
        if ($page_data['page_name'] == 'system_settings' || $page_data['page_name'] == 'frontend_settings' || $page_data['page_name'] == 'map_settings' || $page_data['page_name'] == 'payment_settings' || $page_data['page_name'] == 'manage_language' || $page_data['page_name'] == 'smtp_settings' || $page_data['page_name'] == 'about' ) echo 'opened active'; ?> ">
            <a href="#">
                <i class="fa fa-cogs"></i>
                <span>Settings</span>
            </a>
            <ul>
                <li class="<?php if ($page_data['page_name'] == 'system_settings') echo 'active'; ?> ">
                    <a href="{{route('system_settings.index')}}">
                        <span><i class="entypo-dot"></i>System Settings</span>
                    </a>
                </li>
                <li class="<?php if ($page_data['page_name'] == 'frontend_settings') echo 'active'; ?> ">
                    <a href="{{route('frontend_settings.index')}}">
                        <span><i class="entypo-dot"></i>Frontend Settings</span>
                    </a>
                </li>
                <li class="<?php if ($page_data['page_name'] == 'map_settings') echo 'active'; ?> ">
                    <a href="{{url('admin/map_settings')}}">
                        <span><i class="entypo-dot"></i>Map Settings</span>
                    </a>
                </li>
                <li class="<?php if ($page_data['page_name'] == 'payment_settings') echo 'active'; ?> ">
                    <a href="{{url('admin/payment_settings')}}">
                        <span><i class="entypo-dot"></i>Payment Settings</span>
                    </a>
                </li>
{{--                <li class="<?php if ($page_data['page_name'] == 'manage_language') echo 'active'; ?> ">--}}
{{--                    <a href="{{url('admin/manage_language')}}">--}}
{{--                        <span><i class="entypo-dot"></i>Language Settings</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
                <li class="<?php if ($page_data['page_name'] == 'smtp_settings') echo 'active'; ?> ">
                    <a href="{{url('admin/smtp_settings')}}">
                        <span><i class="entypo-dot"></i>Smtp Settings</span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</div>

