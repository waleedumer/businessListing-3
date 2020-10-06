
@if($listing_details['images'] != null && count(json_decode($listing_details['images'])) > 2)
<div class="hero_in shop_detail">
    <div class="owl-carousel owl-theme owl-loaded listing-carousel">
        @foreach(json_decode($listing_details['images']) as $key => $image)
            <div class="item">
                <img src="<?php echo asset('uploads/listing_images/'.$image); ?>" alt="">
            </div>
        @endforeach
    </div>
</div>
@else
<div class="hero_in shop_detail" style="background: url(<?php echo asset('uploads/listing_cover_photo/'.$listing_details['listing_cover']); ?>) center center no-repeat; background-size: cover;">
</div>
@endif

<!--/hero_in-->
{{--{{dd($listing_details->photos)}}--}}
<nav class="secondary_nav sticky_horizontal_2">
    <div class="container">
        <ul class="clearfix">
            <li><a href="#description" class="active">Dscription</a></li>
            <li><a href="#reviews">Reviews</a></li>
            <li><a href="#sidebar">Booking</a></li>
        </ul>
    </div>
</nav>

<div class="container margin_60_35">
    <div class="row">
        <div class="col-lg-8">
            <section id="description">
                <div class="detail_title_1">
                    <div class="row">
                        <div class="col-6">

                        </div>
                        <div class="col-6">

                        </div>
                    </div>
                    <h1>
                        <?php echo $listing_details['name']; ?>

                        <?php $claiming_status = $listing_details->claimed_listing->status; ?>
                        <?php if($claiming_status == 1): ?>
                        <span class="claimed_icon" data-toggle="tooltip" title="This listing is verified">
			                	<img src="<?php echo asset('frontend/images/verified.png'); ?>" width="30" />
			                </span>
                        <?php endif; ?>
                    </h1>
                    <?php if ($listing_details['latitude'] != "" && $listing_details['longitude'] != ""): ?>
                    <a class="address" href="http://maps.google.com/maps?q=<?php echo $listing_details['latitude']; ?>,<?php echo $listing_details['longitude']; ?>" target="_blank"><?php echo $listing_details['address']; ?>{{$listing_details->city()->exists()?$listing_details->city['name']:'unknown'.', '.$listing_details->country['name']}}</a>
                    <?php endif; ?>
                </div>

                <div class="add_bottom_15">
                    <?php
                    $categories = $listing_details->categories;
                    foreach($categories as $category):
                    $category_name = $category->name;
                    ?>
                    <span class="loc_open mr-2">
						<a href="<?php echo url('home/filter_listings?category='.Illuminate\Support\Str::of($category_name)->slug('-').'&&status=all'); ?>"
                           style="color: #32a067;">
							<?php echo $category_name;?>
							>
						</a>
					</span>
                    <?php
                    endforeach;
                    ?>
                </div>

                <h5>About</h5>
                <p>
                    <?php echo nl2br($listing_details['description']); ?>
                </p>
                <!-- Photo Gallery -->

                <?php if (count($listing_details->photos) > 0): ?>
                <h5 class="add_bottom_15">Photo gallery</h5>
                <div class="grid-gallery">
                    <ul class="magnific-gallery">
                        <?php foreach ($listing_details->photos as $key => $photo): ?>
                        <?php if (file_exists('uploads/listing_images/'.$photo)): ?>
                        <li>
                            <figure>
                                <img src="<?php echo asset('uploads/listing_images/'.$photo); ?>" alt="">
                                <figcaption>
                                    <div class="caption-content">
                                        <a href="<?php echo asset('uploads/listing_images/'.$photo); ?>" title="" data-effect="mfp-zoom-in">
                                            <i class="pe-7s-plus"></i>
                                        </a>
                                    </div>
                                </figcaption>
                            </figure>
                        </li>
                        <?php endif; ?>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php endif; ?>

                <hr>
                @include('includes.frontend.content.contact_and_social')

                <h5 class="add_bottom_15">Amenities</h5>
                <div class="row add_bottom_30">
                    <?php foreach($listing_details->amenities as $key => $amenity): ?>
                    <div class="col-md-4">
                        <ul class="">
                            <li>
                                <i class="{{$amenity['icon']}}"></i>
                                {{$amenity['name']}}
                            </li>
                        </ul>
                    </div>
                    <?php endforeach; ?>
                </div>
                <!-- /row -->

                <!-- Opening and Closing Time -->
                 @include('includes.frontend.content.opening_and_closing_time_schedule')

            <!-- Listing Type Wise Inner Page -->
                <?php if ($listing_details['listing_type'] == 'hotel'): ?>
                <hr>
                @include('includes.frontend.content.listing_hotel_inner_page')
                <?php elseif ($listing_details['listing_type'] == 'shop'):?>
                <hr>
                @include('includes.frontend.content.listing_shop_inner_page')
                <?php elseif ($listing_details['listing_type'] == 'restaurant'):?>
                <hr>
                @include('includes.frontend.content.listing_restaurant_inner_page')
                <?php elseif ($listing_details['listing_type'] == 'beauty'):?>
                <hr>
                @include('includes.frontend.content.listing_beauty_inner_page')
                <?php endif; ?>
            <!-- /row -->

                <!-- Video File Base On Package-->
<!--                --><?php //include 'video_player.php'; ?>

                <hr>
                <h3>Ubicación</h3>
                <!-- <div id="categorySideMap" class="map-full map-layout single-listing-map" style="z-index: 50;"></div> -->
                <div id="map" class="map-full map-layout single-listing-map" style="z-index: 50;"></div>
                <!-- End Map -->
            </section>
            <!-- /section -->
            <!-- Section Of Review Starts -->
<!--        -->@include('includes.frontend.content.listing_reviews')
        <!-- section -->

        <?php $google_analytics_id = $listing_details['google_analytics_id']; ?>
        <!-- Global site tag (gtag.js) - Google Analytics -->
            <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $google_analytics_id; ?>"></script>
            <script>
                window.dataLayer = window.dataLayer || [];
                function gtag(){dataLayer.push(arguments);}
                gtag('js', new Date());

                gtag('config', '<?php echo $google_analytics_id; ?>');
            </script>
        </div>
        <!-- /col -->

        <!-- Contact Form Base On Package-->
        <?php if($listing_details->package['ability_to_add_contact_form'] == 1): ?>
        <aside class="col-lg-4" id="sidebar">
            <div class="box_detail booking">
                @if(Auth::check())
                <form class="contact-us-form" action="<?php echo url('home/contact_us/'.$listing_details['listing_type']); ?>" method="post">
                    <input type="hidden" name="user_id" value="<?php echo $listing_details['user_id']; ?>">
                    <input type="hidden" name="requester_id" value="<?php echo auth()->user()->id; ?>">
                    <input type="hidden" name="listing_id" value="<?php echo $listing_details['id']; ?>">
                    <input type="hidden" name="listing_type" value="<?php echo $listing_details['listing_type']; ?>">
                    <input type="hidden" name="slug" value="<?php echo Illuminate\Support\Str::of($listing_details['name'])->slug('-'); ?>">
                    <?php if ($listing_details['listing_type'] == 'hotel'): ?>
							@include('includes.frontend.content.hotel_room_booking_contact_form')
						<?php elseif ($listing_details['listing_type'] == 'restaurant'): ?>
							@include('includes.frontend.content.restaurant_booking_contact_form')
						<?php elseif ($listing_details['listing_type'] == 'beauty'): ?>
							@include('includes.frontend.content.beauty_service_contact_form')
						<?php else: ?>
							@include('includes.frontend.content.general_contact_form')
						<?php endif; ?>
                    <a href="javascript::" class=" add_top_30 btn_1 full-width purchase" onclick="getTheGuestNumberForBooking('<?php echo $listing_details['listing_type']; ?>')">Submit</a>
                </form>

                <a href="javascript:" onclick="addToWishList('<?php echo $listing_details['id']; ?>')" class="btn_1 full-width outline wishlist" id = "btn-wishlist"><i class="icon_heart"></i> <?php echo $listing_details->users()->exists() ? 'Remove from wishlist' : 'Add to wishlist'; ?></a>
                <div class="text-center"><small>No money charged in this step</small></div>
                @else
                    <a href="{{(route('login'))}}" class="btn_1 full-width purchase" >Login to contact us</a>
                    @endif
            </div>

            <ul class="share-buttons">
                <li><a href = "https://www.facebook.com/sharer/sharer.php?u=<?php echo url()->full();?>" class="fb-share" target="_blank"><i class="social_facebook"></i> Share</a></li>
                <li><a href = "https://twitter.com/share?url=<?php echo url()->full();?>" target = "_blank" class="twitter-share"><i class="social_twitter"></i> Tweet</a></li>
                <li><a href = "http://pinterest.com/pin/create/link/?url=<?php echo url()->full();?>" target="_blank" class="gplus-share"><i class="social_pinterest"></i> Pin</a></li>
            </ul>
        </aside>
        <?php endif; ?>
        {!! $listing_details->video_html !!}

{{--        <script src="{url}"></script>--}}

    </div>
    <!-- /row -->
</div>
<!-- /container -->




<!-- This map-category.php file has all the fucntions for showing the map, marker, map info and all the popup markups -->
<?php include 'frontend/js/map/map-category.php'; ?>

<!-- This script is needed for providing the json file which has all the listing points and required information -->
@push('custom-script')
<script type="text/javascript">
    var isLoggedIn = '<?php echo Auth::check(); ?>';

    // This function performs all the functionalities to add to wishlist
    function addToWishList(listing_id) {
        if (isLoggedIn === '1') {
            $.ajax({
                type : 'POST',
                url : '<?php echo url('home/add_to_wishlist'); ?>',
                data : {CSRF: getCSRFTokenValue()},
                success : function(response) {
                    if (response == 'added') {
                        $('#btn-wishlist').html('<i class="icon_heart"></i> Remove from wishlist');
                    }else {
                        $('#btn-wishlist').html('<i class="icon_heart"></i> Add to wishlist');
                    }
                }
            });
        }else {
            loginAlert();
        }
    }

    // This function shows the Report listing form
    function showClaimForm(){
        $('#claim_form').toggle();
        $('#report_form').hide();
    }
    // This function shows the Report listing form
    function showReportForm() {
        $('#report_form').toggle();
        $('#claim_form').hide();
    }

    // This function return the number of different types of guests
    function getTheGuestNumberForBooking(listing_type) {
        if (isLoggedIn === '1') {
            if (listing_type === "restaurant" || listing_type === "hotel") {
                $('#adult_guests_for_booking').val($('#adult_guests').val());
                $('#child_guests_for_booking').val($('#child_guests').val());
            }

            $('.contact-us-form').submit();
        }else {
            loginAlert();
        }

    }

    createListingsMap({
        mapId: 'map',
        jsonFile: '<?php echo asset('frontend/single-listing-geojson/listing-id-'.$listing_details['id'].'.json'); ?>'
    });
    $('.owl-carousel').owlCarousel({
    loop: true,
    nav: true,
    navText: ["<span class='fa fa-chevron-left'></span>","<span class='fa fa-chevron-right'></span>"]
    })
    $('.owl-carousel').find('.owl-nav').removeClass('disabled')
</script>
@endpush


