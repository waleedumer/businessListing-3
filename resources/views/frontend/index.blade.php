<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Meta tags and seo configuration -->
    @include ('includes.frontend.site_meta')

<!-- Top css library files -->
    @include ('includes.frontend.frontend_top')

</head>

<body>
<div id="page">

    <!-- Header -->

@if ($page_data['page_name'] == 'home' || $page_data['page_name'] == '404')
    @include ('layouts.frontend_header_home')
@elseif ($page_data['page_name'] == 'listings' || $page_data['page_name'] == 'listing/create')
    @include ('layouts.frontend_header_listing');
@elseif ($page_data['page_name'] == 'directory_listing')
    @include ('layouts.frontend_header_home');
@else
    @include ('layouts.frontend_header');
    @endif


<!-- Main page -->
    <main>
        @include ('includes.frontend.content.'.$page_data['page_name'])
    </main>

    <!-- Site footer -->
    <?php
    if(!($page_data['page_name'] == 'listings' && session('listings_view') == 'list_view')):
    ?>
        @include ('includes.frontend.content.footer');
    <?php
    endif;
    ?>
</div>

<!-- Signin popup -->
@include('includes.frontend.signin_popup')

<!-- Back to top button -->
<div id="toTop"></div>

<!-- Bottom js library files -->
@include ('includes.frontend.frontend_bottom')

<!--modal-->
@include ('includes.frontend.modal')
<?php
if($cookie_status == 1):
    ?>
    @include ('includes.frontend.eu_coookie');
<?php endif;
?>

</body>
</html>
