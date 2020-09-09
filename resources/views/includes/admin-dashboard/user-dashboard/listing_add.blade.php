<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-account-circle title_icon"></i> Add new listing</h4>
            </div>
        </div>
    </div>
</div>

<?php$total_packages=auth()->user()->packages()->count();
$selected_package=auth()->user()->packages->last()?>
<?php if($total_packages>0)?>

<form action="<?php echo url('user/listings/add'); ?>" method="post" role="form" class="form-horizontal form-groups-bordered" enctype="multipart/form-data">
    <div class="row justify-content-md-center">
        <!-- First Portion Starts -->
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <div class="col-lg-12">
                        <h4 class="header-title">Basic information</h4>
                        <hr>
                        <div class="form-group">
                            <label for="title"> <span class="required">*</span> Title</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="form-group">
                            <label for="description"> <span class="required">*</span> Description</label>
                            <textarea name="description" rows="5" class="form-control" id = "description" required></textarea>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <h4 class="header-title mt-3">Location</h4>
                        <hr>
                        <div class="form-group">
                            <label for="country_id"> <span class="required">*</span> Country</label>
                            <select class="form-control select2" data-toggle="select2" name="country_id" id="country_id" onchange="getCityList(this.value)">
                                <option value="">Select country</option>
                                <?php foreach ($countries as $country): ?>
                                <option value="<?php echo $country['id']; ?>"><?php echo $country['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="city_id"> <span class="required">*</span> City</label>
                            <select class="form-control select2" data-toggle="select2" name="city_id" id="city_id">
                                <option value="">Select city</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="address"> <span class="required">*</span> Address</label>
                            <textarea name="address" rows="5" class="form-control" id = "address" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="latitude">Latitude</label>
                            <input type="text" class="form-control" id="latitude" name="latitude" placeholder="You can provide latitude for getting the exact result">
                        </div>
                        <div class="form-group">
                            <label for="longitude">Longitude></label>
                            <input type="text" class="form-control" id="longitude" name="longitude" placeholder="You can provide longitude for getting the exact result">
                        </div>
                    </div>


                    <div class="col-lg-12">
                        <h4 class="header-title mt-3">Amenities</h4>
                        <hr>
                        <div class="row">
<!--                            --><?php //$amenities = $this->crud_model->get_amenities();
                            foreach ($amenities as $amenity):?>
                            <div class="col-xl-6 mb-1">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="amenities[]" id="<?php echo $amenity['id']; ?>" value="<?php echo $amenity['id']; ?>">
                                    <label class="custom-control-label" for="<?php echo $amenity['id']; ?>"><i class="<?php echo $amenity['icon']; ?>" style="color: #636363;"></i> <?php echo $amenity['name']; ?></label>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <h4 class="header-title mt-3">Thumbnail</h4>
                        <hr>
                        <div class="col-xl-10 p-0">
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name = "listing_thumbnail" id="listing_thumbnail" onchange="changeTitleOfImageUploader(this)" accept="image/*">
                                    <label class="custom-file-label ellipsis" for="listing_thumbnail">Choose thumbnail</label>
                                </div>
                            </div>
                        </div>
                    </div>
{{--                    @if(auth()->user()->packages()->count()>0)--}}

                    <?php if ($selected_package['ability_to_add_video'] == 1): ?>
                    <div class="col-lg-12">
                        <h4 class="header-title mt-3">Video</h4>
                        <hr>
                        <div class="form-group">
                            <label for="video_url">Video url</label>
                            <input type="text" class="form-control" id="video_url" name="video_url" placeholder="You can provide video url">
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="col-lg-12">
                        <h4 class="header-title mt-3">Photo gallery</h4>
                        <hr>
                        <div id="photos_area">
                            <div class="row">
                                <div class="col-xl-10 pr-0">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name = "listing_images[]" id="" onchange="changeTitleOfImageUploader(this)" accept="image/*">
                                            <label class="custom-file-label ellipsis" for="">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-2">
                                    <button type="button" class="btn btn-primary btn-sm" style="margin-top: 2px; float: right;" name="button" onclick="appendPhotoUploader()"> <i class="fa fa-plus"></i> </button>
                                </div>
                            </div>
                        </div>

                        <div id="blank_photo_uploader">
                            <div class="row mt-2 appendedPhotoUploader">
                                <div class="col-xl-10 pr-0">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name = "listing_images[]" id="" onchange="changeTitleOfImageUploader(this)" accept="image/*">
                                            <label class="custom-file-label ellipsis" for="">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-2">
                                    <button type="button" class="btn btn-danger btn-sm" style="margin-top: 2px; float: right;" name="button" onclick="removePhotoUploader(this)"> <i class="fa fa-minus"></i> </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <h4 class="header-title mt-3">Tags</h4>
                        <hr>
                        <div class="form-group">
                            <label for="tags">Tags</label>
                            <input type="text" class="form-control" id = "tags" name="tags" data-role="tagsinput" style="width: 100%;"/>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <h4 class="header-title mt-3">SEO meta tags</h4>
                        <hr>
                        <div class="form-group">
                            <label for="seo_meta_tags">SEO meta tags</label>
                            <input type="text" class="form-control" id = "seo_meta_tags" name="seo_meta_tags" data-role="tagsinput" style="width: 100%;"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- First Portion Ends -->
        <!-- Second Portion Starts -->
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <div class="col-lg-12">
                        <h4 class="header-title">Category</h4>
                        <hr>
                        <div id="category_area">
                            <div class="row">
                                <div class="col-xl-10 pr-0">
                                    <select class="form-control select2" data-toggle="select2" name="categories[]" id = "category_default" required>
                                        <option value="">Select Category</option>
                                        <?php foreach ($categories as $category): ?>
                                        <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                                        <?php endforeach; ?>

                                    </select>
                                </div>
                                <div class="col-xl-2">
                                    <button type="button" class="btn btn-primary btn-sm" style="margin-top: 2px; float: right;" name="button" onclick="appendCategory()"> <i class="fa fa-plus"></i> </button>
                                </div>
                            </div>
                        </div>

                        <div id="blank_category_field">
                            <div class="row mt-2 appendedCategoryFields">
                                <div class="col-xl-10 pr-0">
                                    <select class="form-control select2" data-toggle="select2" name="categories[]">
                                        <option value="">Select category</option>
                                        <?php foreach ($categories as $category): ?>
                                        <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-xl-2">
                                    <button type="button" class="btn btn-danger btn-sm" style="margin-top: 2px; float: right;" name="button" onclick="removeCategory(this)"> <i class="fa fa-minus"></i> </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <h4 class="header-title mt-3">Opening and closing schedule</h4>
                        <hr>
                        <div class="row">
                            <?php $days = array('saturday', 'sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday'); ?>
                            <?php foreach($days as $day): ?>
                            <div class="col-xl-6">
                                <label><?php echo ucfirst($day.' opening'); ?></label>
                                <select class="form-control select2" data-toggle="select2" name="<?php echo $day.' opening'; ?>" id="<?php echo $day.' opening'; ?>">
                                    <?php for($i = 0; $i < 24; $i++): ?>
                                    <option value="<?php echo $i; ?>"> <?php echo date('h a', strtotime("$i:00:00")) ?> </option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                            <div class="col-xl-6">
                                <label><?php echo ucfirst($day.' closing'); ?></label>
                                <select class="form-control select2" data-toggle="select2" name="<?php echo $day.' closing'; ?>" id="<?php echo $day.' closing'; ?>">
                                    <?php for($i = 0; $i < 24; $i++): ?>
                                    <option value="<?php echo $i; ?>"><?php echo date('h a', strtotime("$i:00:00")) ?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <h4 class="header-title mt-3">Contact information</h4>
                        <hr>
                        <div class="form-group">
                            <label for="website">Website</label>
                            <input type="text" class="form-control" id="website" name="website" placeholder="Website">
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                        </div>

                        <div class="form-group">
                            <label for="phone_number">Phone number</label>
                            <input type="text" class="form-control" id="phone_number" name="phone" placeholder="Phone number">
                        </div>

                        <div class="form-group">
                            <label>Facebook</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon-facebook"> <i class="mdi mdi-facebook"></i> </span>
                                </div>
                                <input type="text" class="form-control" name="facebook" placeholder="www.facebook.com/xyz/" aria-label="facebook" aria-describedby="basic-addon-facebook">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Twitter</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon-twitter"> <i class="mdi mdi-twitter"></i> </span>
                                </div>
                                <input type="text" class="form-control" name="twitter" placeholder="www.twitter.com/xyz/" aria-label="twitter" aria-describedby="basic-addon-twitter">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Linkedin</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon-linkedin"> <i class="mdi mdi-linkedin"></i> </span>
                                </div>
                                <input type="text" class="form-control" name="linkedin" placeholder="www.linkedin.com/xyz/" aria-label="linkedin" aria-describedby="basic-addon-linkedin">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <h4 class="header-title mt-3">Listing type</h4>
                        <hr>
                        <div class="row">
                            <div class="col-xl-6 mb-1">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="hotel_room" name="listing_type" class="custom-control-input" value="hotel_room">
                                    <label class="custom-control-label" for="hotel_room"><i class="fa fa-hotel" style="color: #636363;"></i> Hotel room</label>
                                </div>
                            </div>
                            <div class="col-xl-6 mb-1">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="food_menu" name="listing_type" class="custom-control-input" value="food_menu">
                                    <label class="custom-control-label" for="food_menu"><i class="fa fa-hotel" style="color: #636363;"></i> Food menu</label>
                                </div>
                            </div>
                            <div class="col-xl-6 mb-1">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="shop" name="listing_type" class="custom-control-input" value="shop">
                                    <label class="custom-control-label" for="shop"><i class="fa fa-hotel" style="color: #636363;"></i> Shop</label>
                                </div>
                            </div>
                            <div class="col-xl-6 mb-1">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="general" name="listing_type" class="custom-control-input" value="general">
                                    <label class="custom-control-label" for="general"><i class="fa fa-hotel" style="color: #636363;"></i> General</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php if ($selected_package['ability_to_add_contact_form']== 1): ?>
                    <div class="col-lg-12">
                        <h4 class="header-title mt-3">Contact form type</h4>
                        <hr>
                        <div class="row">
                            <div class="col-xl-6 mb-1">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="general_contact_form" name="contact_form_type" class="custom-control-input" value="general">
                                    <label class="custom-control-label" for="general_contact_form"><i class="fa fa-hotel" style="color: #636363;"></i> General Contact form</label>
                                </div>
                            </div>
                            <div class="col-xl-6 mb-1">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="hotel_booking" name="contact_form_type" class="custom-control-input" value="hotel_booking">
                                    <label class="custom-control-label" for="hotel_booking"><i class="fa fa-hotel" style="color: #636363;"></i> Hotel booking</label>
                                </div>
                            </div>
                            <div class="col-xl-6 mb-1">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="restaurant_booking" name="contact_form_type" class="custom-control-input" value="restaurant_booking">
                                    <label class="custom-control-label" for="restaurant_booking"><i class="fa fa-hotel" style="color: #636363;"></i> Restaurant booking</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <!-- Second Portion Ends -->
    </div>
    <div class="row justify-content-md-center">
        <div class="col-xl-3">
            <button type="submit" class="btn btn-block btn-primary" name="button">Add Listing</button>
        </div>
    </div>
</form>
<?php endif;?>

<script type="text/javascript">
    var highestNumberOfCategories = parseInt('<?php echo auth()->user()->packages()->count()>0? $selected_package['number_of_categories']:  0; ?>');
    var highestNumberOfPhotos     = parseInt('<?php echo auth()->user()->packages()->count()>0? $selected_package['number_of_photos']:  0; ?>');
    var highestNumberOfTags       = parseInt('<?php echo auth()->user()->packages()->count()>0? $selected_package['number_of_tags']:  0; ?>');
    var blank_category = $('#blank_category_field').html();
    var blank_photo_uploader = $('#blank_photo_uploader').html();

    $(document).ready(function() {
        $('#blank_category_field').hide();
        $('#blank_photo_uploader').hide();
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
            type : 'POST',
            url : '<?php echo url('home/get_city_list_by_country_id'); ?>',
            data : {country_id : country_id},
            success : function(response) {
                $('#city_id').html(response);
            }
        });
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
</script>
