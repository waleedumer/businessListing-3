<form action="{{route('store.listing')}}" method="post" enctype="multipart/form-data" role="form" class="form-horizontal form-groups-bordered listing_add_form">
    @csrf
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1 my-5">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="card-title">
                                    <h5>Primary Listing Details</h5>
                                </div>
                                <div class="step-one">
                                    @include('includes.frontend.content.listing_create_1')
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="card-title">
                                    <h5>Category & Services</h5>
                                </div>
                                <div class="step-one">
                                    @include('includes.frontend.content.listing_create_2')
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="card-title">
                                    <h5>Amenities</h5>
                                </div>
                                <div class="step-one">
                                    @include('includes.frontend.content.listing_create_5')
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="card-title">
                                    <h5>Business Hours</h5>
                                </div>
                                <div class="step-one">
                                    @include('includes.frontend.content.listing_create_3')
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="card-title">
                                    <h5>Social Media</h5>
                                </div>
                                <div class="step-one">
                                    @include('includes.frontend.content.listing_create_4')
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="card-title">
                                    <h5>SEO</h5>
                                </div>
                                <div class="step-one">
                                    @include('includes.frontend.content.listing_create_9')
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="card-title">
                                    <h5>Media</h5>
                                </div>
                                <div class="step-one">
                                    @include('includes.frontend.content.listing_create_7')
                                </div>
                                <button class="btn btn-success float-right">Add</button>

                            </div>
                        </div>
                        
                    </div>
                    <div class="col-lg-3">
                    <div class="page-style2-sidebar testClass" style="position: static; width: auto;">
                                            <div class="quick_tip quick_tip_style2 lp-style-wrap-border">
                                                <div class="quick-tip-inner"><h2>Tagline</h2><p>For businesses, taglines are of importance as they help business convey what they want to do and their goals to the customers.</p><img src="https://classic.listingprowp.com/wp-content/themes/listingpro/assets/images/quick-tip/title.png"></div></div></div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
   
</form>

<script type="text/javascript">
    function getCityList(country_id) {
        $.ajax({
            type : 'GET',
            url : '<?php echo url('home/get_city_list_by_country_id'); ?>'+'/'+country_id,
            success : function(response) {
                $('#city_id').html(response);
            }
        });
    }
    var blank_category = $('#blank_category_field').html();
    var blank_photo_uploader = $('#blank_photo_uploader').html();
    var blank_special_offer_div = $('#blank_special_offer_div').html();
    var blank_food_menu_div = $('#blank_food_menu_div').html();
    var blank_beauty_menu_div = $('#blank_beauty_service_div').html();
    var blank_hotel_room_specification_div = $('#blank_hotel_room_specification_div').html();
    var listing_type_value = $('.listing-type-radio').val();

    $(document).ready(function() {
        $('#blank_category_field').hide();
        $('#blank_photo_uploader').hide();
        $('#blank_special_offer_div').hide();
        $('#blank_food_menu_div').hide();
        $('#blank_beauty_service_div').hide();
        $('#blank_hotel_room_specification_div').hide();
    });

    function appendHotelRoomSpecification() {

        jQuery('#hotel_room_specification_div').append(blank_hotel_room_specification_div);
        let selector = jQuery('#hotel_room_specification_div .hotel_room_specification_div');

        let rand = Math.random().toString(36).slice(3);

        $(selector[selector.length - 1]).find('label.btn').attr('for', 'room-image-' + rand );
        $(selector[selector.length - 1]).find('input.image-upload').attr('id', 'room-image-' + rand );
        $(".bootstrap-tag-input").tagsinput('items');
        initImagePreviewer();
    }

    function removeHotelRoomSpecification(elem) {
        jQuery(elem).closest('.hotel_room_specification_div').remove();
        $(".bootstrap-tag-input").tagsinput('items');
    }

    function appendFoodMenu() {

        jQuery('#food_menu_div').append(blank_food_menu_div);
        let selector = jQuery('#food_menu_div .food_menu_div');

        let rand = Math.random().toString(36).slice(3);

        $(selector[selector.length - 1]).find('label.btn').attr('for', 'menu-image-' + rand );
        $(selector[selector.length - 1]).find('input.image-upload').attr('id', 'menu-image-' + rand );
        $(".bootstrap-tag-input").tagsinput('items');
        initImagePreviewer();
    }

    function removeFoodMenu(elem) {
        jQuery(elem).closest('.food_menu_div').remove();
        $(".bootstrap-tag-input").tagsinput('items');
    }

    function appendBeautyService() {

        jQuery('#beauty_service_div').append(blank_beauty_menu_div);
        let selector = jQuery('#beauty_service_div .beauty_service_div');

        let rand = Math.random().toString(36).slice(3);

        $(selector[selector.length - 1]).find('label.btn').attr('for', 'service-image-' + rand );
        $(selector[selector.length - 1]).find('input.image-upload').attr('id', 'service-image-' + rand );
        $(".bootstrap-tag-input").tagsinput('items');
        initImagePreviewer();
    }

    function removeBeautyService(elem) {
        jQuery(elem).closest('.beauty_service_div').remove();
        $(".bootstrap-tag-input").tagsinput('items');
    }

    function appendSpecialOffer() {

        jQuery('#special_offer_div').append(blank_special_offer_div);
        let selector = jQuery('#special_offer_div .special_offer_div');

        let rand = Math.random().toString(36).slice(3);

        $(selector[selector.length - 1]).find('label.btn').attr('for', 'product-image-' + rand );
        $(selector[selector.length - 1]).find('input.image-upload').attr('id', 'product-image-' + rand );
        $(".bootstrap-tag-input").tagsinput('items');
        initImagePreviewer();
    }

    function removeSpecialOffer(elem) {
        jQuery(elem).closest('.special_offer_div').remove();
        $(".bootstrap-tag-input").tagsinput('items');
    }

    function appendCategory() {
        jQuery('#category_area').append(blank_category);
    }

    function removeCategory(categoryElem) {
        jQuery(categoryElem).closest('.appendedCategoryFields').remove();
    }

    function appendPhotoUploader() {
        jQuery('#photos_area').append(blank_photo_uploader);
    }

    function removePhotoUploader(photoElem) {
        jQuery(photoElem).closest('.appendedPhotoUploader').remove();
    }

    function showListingTypeForm(listing_type) {
        listing_type_value = listing_type;
        if (listing_type === "shop") {
            $('#special_offer_parent_div').show();
            $('#food_menu_parent_div').hide();
            $('#beauty_service_parent_div').hide();
            $('#hotel_room_specification_parent_div').hide();
            $('#demo-btn').html('<i class="mdi mdi-eye"></i>Preview  Products');
        }
        else if (listing_type === "hotel") {
            $('#special_offer_parent_div').hide();
            $('#food_menu_parent_div').hide();
            $('#beauty_service_parent_div').hide();
            $('#hotel_room_specification_parent_div').show();
            $('#demo-btn').html('<i class="mdi mdi-eye"></i> Preview Rooms');
        }
        else if (listing_type === "restaurant") {
            $('#special_offer_parent_div').hide();
            $('#food_menu_parent_div').show();
            $('#beauty_service_parent_div').hide();
            $('#hotel_room_specification_parent_div').hide();
            $('#demo-btn').html('<i class="mdi mdi-eye"></i> Preview Food Menu');
        }
        else if (listing_type === "beauty") {
            $('#special_offer_parent_div').hide();
            $('#food_menu_parent_div').hide();
            $('#beauty_service_parent_div').show();
            $('#hotel_room_specification_parent_div').hide();
            $('#demo-btn').html('<i class="mdi mdi-eye"></i> Preview Beauty Service');
        }else {
            $('#special_offer_parent_div').hide();
            $('#beauty_service_parent_div').hide();
            $('#food_menu_parent_div').hide();
            $('#hotel_room_specification_parent_div').hide();
            $('#demo-btn').html('<i class="mdi mdi-eye"></i> No Preview Available');
        }
    }

    // This fucntion checks the minimul required fields of listing form
    function checkMinimumFieldRequired() {
        var title = $('#title').val();
        var defaultCategory = $('#category_default').val();
        var latitude = $('#latitude').val();
        var longitude = $('#longitude').val();
        if (title === "" || defaultCategory === "" || latitude === "" || longitude === "") {
            error_notify('Listing Title', 'Listing Category', 'Latitude', 'Longitude (Can not be Empty');
        }else {
            $('.listing_add_form').submit();
        }
    }

    // Show Listing Type Wise Demo
    function showListingTypeWiseDemo(param) {
        if (listing_type_value === 'hotel') {
            showAjaxModal('<?php echo url("modal/popup/preview_of_details/hotel_room");?>', 'Preview');
        }
        if (listing_type_value === 'restaurant') {
            showAjaxModal('<?php echo url("modal/popup/preview_of_details/food_menu");?>', 'Preview');
        }
        if (listing_type_value === 'shop') {
            showAjaxModal('<?php echo url("modal/popup/preview_of_details/special_offers");?>', 'Preview');
        }
        if (listing_type_value === 'beauty') {
            showAjaxModal('<?php echo url("modal/popup/preview_of_details/beauty_service");?>', 'Preview');
        }
    }
</script>

<script>
    function service_time(){
        var starting_time = $('#starting_time').val();
        var ending_time = $('#starting_time').val();
        if(starting_time != '' && ending_time != ''){
            $("#ending_time").attr("min", starting_time);
            $("#ending_time").attr("max", "24:00");
        }
    }

    // function service_time_min(){
    // 	var ending_time   = $('#ending_time').val();
    // 	if(ending_time != ''){
    // 		$("#ending_time").attr("min", "1");
    // 		$("#ending_time").attr("max", ending_time);
    // 	}
    // }
</script>
