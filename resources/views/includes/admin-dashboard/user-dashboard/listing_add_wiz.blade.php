<?php
//$countries  = $this->db->get('country')->result_array();
//$categories = $this->db->get('category')->result_array();
//?>
<div class="row">
    <div class="col-sm-4">
        <div class="tile-title tile-primary">
            <div class="icon">
                <i class="glyphicon glyphicon-lock"></i>
            </div>
            <div class="title">
                <h3>
                    <?php
                    $user_id = auth()->user()->id;
                    $package_id = auth()->user()->packages->last();
                    $total_listing = auth()->user()->packages->last()['number_of_listings'];
                    echo $total_listing;
                    ?>
                </h3>
                <p>
                    Total capacity
                </p>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="tile-title tile-red">
            <div class="icon">
                <i class="glyphicon glyphicon-link"></i>
            </div>
            <div class="title">
                <h3>
                    <?php
                    $submited_listing = 0;
                    $submited_listings = auth()->user()->listings;
                    foreach($submited_listings as $row){
                        $submited_listing++;
                    }
                    echo $submited_listing;
                    ?>
                </h3>
                <p>
                    Already submited
                </p>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="tile-title tile-blue">
            <div class="icon">
                <i class="entypo-paper-plane"></i>
            </div>
            <div class="title">
                <h3>
                    <?php
                    if($total_listing < $submited_listing){
                        echo 0;
                    }else{
                        echo $free_space = $total_listing - $submited_listing;
                    }
                    ?>
                </h3>
                <p>
                    Free space
                </p>
            </div>
        </div>
    </div>
</div>
<?php if($total_listing > $submited_listing){  ?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    Add listing form
                </div>
            </div>
            <div class="panel-body">
                <form action="<?php echo url('user/listings/add'); ?>" method="post" enctype="multipart/form-data" role="form" class="form-horizontal form-groups-bordered listing_add_form">
                    @csrf
                    <input type="hidden" name="total_listing" value="<?php echo $total_listing; ?>">
                    <input type="hidden" name="submited_listing" value="<?php echo $submited_listing; ?>">
                    <div class="col-md-12">
                        <ul class="nav nav-tabs bordered"><!-- available classes "bordered", "right-aligned" -->
                            <li class="active">
                                <a href="#first" data-toggle="tab">
                                    <span class="visible-xs"><i class="entypo-home"></i></span>
                                    <span class="hidden-xs">Basic</span>
                                </a>
                            </li>
                            <li>
                                <a href="#second" data-toggle="tab">
                                    <span class="visible-xs"><i class="entypo-user"></i></span>
                                    <span class="hidden-xs">Location</span>
                                </a>
                            </li>
                            <li>
                                <a href="#third" data-toggle="tab">
                                    <span class="visible-xs"><i class="entypo-mail"></i></span>
                                    <span class="hidden-xs">Amenities</span>
                                </a>
                            </li>
                            <li>
                                <a href="#fourth" data-toggle="tab">
                                    <span class="visible-xs"><i class="entypo-cog"></i></span>
                                    <span class="hidden-xs">Media</span>
                                </a>
                            </li>
                            <li>
                                <a href="#fifth" data-toggle="tab">
                                    <span class="visible-xs"><i class="entypo-cog"></i></span>
                                    <span class="hidden-xs">SEO</span>
                                </a>
                            </li>
                            <li>
                                <a href="#sixth" data-toggle="tab">
                                    <span class="visible-xs"><i class="entypo-cog"></i></span>
                                    <span class="hidden-xs">Schedule</span>
                                </a>
                            </li>
                            <li>
                                <a href="#seventh" data-toggle="tab">
                                    <span class="visible-xs"><i class="entypo-cog"></i></span>
                                    <span class="hidden-xs">Contact</span>
                                </a>
                            </li>
                            <li>
                                <a href="#eighth" data-toggle="tab">
                                    <span class="visible-xs"><i class="entypo-cog"></i></span>
                                    <span class="hidden-xs">Type</span>
                                </a>
                            </li>
                            <li>
                                <a href="#ninth" data-toggle="tab">
                                    <span class="visible-xs"><i class="entypo-cog"></i></span>
                                    <span class="hidden-xs">Finish</span>
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane active" id="first">
                                @include('includes.admin-dashboard.user-dashboard.add_listing_basic')
                            </div>
                            <div class="tab-pane" id="second">
                                @include('includes.admin-dashboard.user-dashboard.add_listing_location')
                            </div>
                            <div class="tab-pane" id="third">
                                @include('includes.admin-dashboard.user-dashboard.add_listing_amenity')
                            </div>

                            <div class="tab-pane" id="fourth">
                                @include('includes.admin-dashboard.user-dashboard.add_listing_media')
                            </div>

                            <div class="tab-pane" id="fifth">
                                @include('includes.admin-dashboard.user-dashboard.add_listing_seo')
                            </div>
                            <div class="tab-pane" id="sixth">
                                @include('includes.admin-dashboard.user-dashboard.add_listing_scedule')
                            </div>

                            <div class="tab-pane" id="seventh">
                                @include('includes.admin-dashboard.user-dashboard.add_listing_contact')
                            </div>

                            <div class="tab-pane" id="eighth">
                                @include('includes.admin-dashboard.user-dashboard.add_listing_type')
                            </div>
                            <div class="tab-pane" id="ninth">
                                @include('includes.admin-dashboard.user-dashboard.add_listing_finish')
                            </div>
                        </div>
                    </div>
                    <input type="text" name="package_id" value="{{auth()->user()->packages->last()['id']}}" hidden>
                </form>
            </div>
        </div>
    </div><!-- end col-->
</div>
<?php }elseif($total_listing < $submited_listing){ ?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    Oops
                </div>
            </div>
            <div class="panel-body text-center">
                <img src="<?php echo asset('frontend/images/file-searching.svg'); ?>" height="90" alt="File not found Image">

                <h4 class="text-uppercase text-danger mt-3"><?php echo 'listing'.' '.$total_listing.' / '.$submited_listing; ?></h4>
                <h5 class="mt-3 text-danger ">The list ability of your current package is <?php echo $total_listing ?>, so all your listings will not be displayed on the home page. Buy a upper level package, to show on all the listing home pages.</h5>

                <a class="btn btn-primary mt-3" href="<?php echo url('user/packages'); ?>"><i class="mdi mdi-reply"></i>Purchase package</a></a>
            </div>
        </div>
    </div><!-- end col-->
</div>
<?php }else{ ?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    Oops
                </div>
            </div>
            <div class="panel-body text-center">
                <img src="<?php echo asset('frontend/images/file-searching.svg'); ?>" height="90" alt="File not found Image">

                <h4 class="text-uppercase text-danger mt-3"><?php echo 'Listing'.' '.$total_listing.' / '.$submited_listing; ?></h4>
                <p class="text-muted mt-3">There is no free space add to the listing, for that you have to buy a upper level package.</p>

                <a class="btn btn-primary mt-3" href="<?php echo url('user/packages'); ?>"><i class="mdi mdi-reply"></i>Purchase package</a></a>
            </div>
        </div>
    </div><!-- end col-->
</div>
<?php } ?>
<script type="text/javascript">
    // User Specific Data
    var highestNumberOfCategories = parseInt('<?php echo auth()->user()->packages()->count()>0? auth()->user()->packages->last()['number_of_categories']:0; ?>');
    var highestNumberOfPhotos     = parseInt('<?php echo auth()->user()->packages()->count()>0?auth()->user()->packages->last()['number_of_photos']:0; ?>');
    var highestNumberOfTags       = parseInt('<?php echo auth()->user()->packages()->count()>0?auth()->user()->packages->last()['number_of_tags']:0; ?>');

    var blank_category = $('#blank_category_field').html();
    var blank_photo_uploader = $('#blank_photo_uploader').html();
    var blank_special_offer_div = $('#blank_special_offer_div').html();
    var blank_food_menu_div = $('#blank_food_menu_div').html();
    var blank_beauty_service_div = $('#blank_beauty_service_div').html();
    var blank_hotel_room_specification_div = $('#blank_hotel_room_specification_div').html();
    var listing_type_value = $('.listing-type-radio').val();

    $(document).ready(function() {
        $('#blank_category_field').hide();
        $('#blank_photo_uploader').hide();
        $('#blank_special_offer_div').hide();
        $('#blank_food_menu_div').hide();
        $('#blank_beauty_service_div').hide();
        $('#blank_hotel_room_specification_div').hide();
        $("input[name='tags']").tagsinput({
            maxTags: highestNumberOfTags
        });
    });

    function countElements(class_name) {
        var numItems = $('.'+class_name).length
        return numItems;
    }

    function getCityList(country_id) {
        $.ajax({
            type : 'GET',
            url : '<?php echo url('home/get_city_list_by_country_id'); ?>'+'/'+country_id,
            success : function(response) {
                $('#city_id').html(response);
            },
        });
    }

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

        jQuery('#beauty_service_div').append(blank_beauty_service_div);
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
        if (countElements('appendedCategoryFields') >= highestNumberOfCategories) {
            error_notify('Upgrade your package for adding more category')
        }else {
            jQuery('#category_area').append(blank_category);
        }
    }

    function removeCategory(categoryElem) {
        jQuery(categoryElem).closest('.appendedCategoryFields').remove();
    }

    function appendPhotoUploader() {
        if (countElements('appendedPhotoUploader') >= highestNumberOfPhotos) {
            error_notify('Upgrade your package for adding more photos')
        }else {
            jQuery('#photos_area').append(blank_photo_uploader);
        }
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
            $('#demo-btn').html('<i class="mdi mdi-eye"></i> Preview products');
        }
        else if (listing_type === "hotel") {
            $('#special_offer_parent_div').hide();
            $('#food_menu_parent_div').hide();
            $('#beauty_service_parent_div').hide();
            $('#hotel_room_specification_parent_div').show();
            $('#demo-btn').html('<i class="mdi mdi-eye"></i> Preview rooms');
        }
        else if (listing_type === "restaurant") {
            $('#special_offer_parent_div').hide();
            $('#food_menu_parent_div').show();
            $('#beauty_service_parent_div').hide();
            $('#hotel_room_specification_parent_div').hide();
            $('#demo-btn').html('<i class="mdi mdi-eye"></i> Preview food menu');
        }else if (listing_type === "beauty") {
            $('#special_offer_parent_div').hide();
            $('#food_menu_parent_div').hide();
            $('#beauty_service_parent_div').show();
            $('#hotel_room_specification_parent_div').hide();
            $('#demo-btn').html('<i class="mdi mdi-eye"></i> Preview food menu');
        }else {
            $('#special_offer_parent_div').hide();
            $('#food_menu_parent_div').hide();
            $('#beauty_service_parent_div').hide();
            $('#hotel_room_specification_parent_div').hide();
            $('#demo-btn').html('<i class="mdi mdi-eye"></i> No preview available');
        }
    }

    // This fucntion checks the minimul required fields of listing form
    function checkMinimumFieldRequired() {
        var title = $('#title').val();
        var defaultCategory = $('#category_default').val();
        var latitude = $('#latitude').val();
        var longitude = $('#longitude').val();
        if (title === "" || defaultCategory === "" || latitude === "" || longitude === "") {
            error_notify('Listing title, Listing category, Latitude, Longitude Can not be empty');
        }else {
            $('.listing_add_form').submit();
        }
    }

    // Show Listing Type Wise Demo
    function showListingTypeWiseDemo(param) {
        if (listing_type_value === 'hotel') {
            showAjaxModal('<?php echo url('modal/popup/preview_of_details/hotel_room');?>', 'Preview');
        }
        if (listing_type_value === 'restaurant') {
            showAjaxModal('<?php echo url('modal/popup/preview_of_details/food_menu');?>', 'Preview');
        }
        if (listing_type_value === 'shop') {
            showAjaxModal('<?php echo url('modal/popup/preview_of_details/special_offers');?>', 'Preview');
        }
        if (listing_type_value === 'beauty') {
            showAjaxModal('<?php echo url('modal/popup/preview_of_details/beauty_service');?>', 'Preview');
        }
    }
</script>
