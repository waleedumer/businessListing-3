<div class="form-group">
    <label class="control-label" for="category"> Category</label>
    <div class="col-sm-12s">
        <div id="category_area">
            <div class="row">
                <div class="col-sm-11">
                    <select class="form-control select2" name="categories[]" id = "category_default" required>
                        <option value="">Select Category</option>
                        <?php foreach ($categories as $category): ?>
                        <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-sm-1 p-0 d-flex align-items-center">
                    <button type="button" class="btn btn-primary btn-sm" style="margin-top: 2px; float: right;" name="button" onclick="appendCategory()"> <i class="fa fa-plus"></i> </button>
                </div>
            </div>
        </div>

        <div id="blank_category_field">
            <div class="row appendedCategoryFields" style="margin-top: 10px;">
                <div class="col-sm-11 pr-0">
                    <select class="form-control" name="categories[]">
                        <option value="">Select Category</option>
                        <?php foreach ($categories as $category): ?>
                        <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-sm-1 p-0 d-flex align-items-center">
                    <button type="button" class="btn btn-danger btn-sm" style="margin-top: 2px; float: right;" name="button" onclick="removeCategory(this)"> <i class="fa fa-minus"></i> </button>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-sm-offset-3 col-sm-3">
        <div class="col-lg-12">
            <div class="custom-control custom-radio">
                <input type="radio" id="general" name="listing_type" class="custom-control-input listing-type-radio" value="general" onclick="showListingTypeForm('general')" checked>
                <label class="custom-control-label" for="general"><i class="fa fa-hotel" style="color: #636363;"></i> General></label>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="custom-control custom-radio">
                <input type="radio" id="hotel" name="listing_type" class="custom-control-input listing-type-radio" value="hotel" onclick="showListingTypeForm('hotel')">
                <label class="custom-control-label" for="hotel"><i class="fa fa-hotel" style="color: #636363;"></i> Hotel </label>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="custom-control custom-radio">
                <input type="radio" id="restaurant" name="listing_type" class="custom-control-input listing-type-radio" value="restaurant" onclick="showListingTypeForm('restaurant')">
                <label class="custom-control-label" for="restaurant"><i class="fa fa-hotel" style="color: #636363;"></i> Restaurant</label>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="custom-control custom-radio">
                <input type="radio" id="shop" name="listing_type" class="custom-control-input listing-type-radio" value="shop" onclick="showListingTypeForm('shop')">
                <label class="custom-control-label" for="shop"><i class="fa fa-hotel" style="color: #636363;"></i> Shop </label>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="custom-control custom-radio">
                <input type="radio" id="beauty" name="listing_type" class="custom-control-input listing-type-radio" value="beauty" onclick="showListingTypeForm('beauty')">
                <label class="custom-control-label" for="beauty"><i class="fa fa-hotel" style="color: #636363;"></i> Beauty</label>
            </div>
        </div>
    </div>

    <div class="col-sm-3 text-left">
        <a href="#" id = "demo-btn" class="btn btn-primary mt-4" onclick="showListingTypeWiseDemo($('.listing-type-radio').val())"> <i class="mdi mdi-eye"></i> No preview available </a>
    </div>
</div>

@include('includes.admin-dashboard.content.special_offer_form')
@include('includes.admin-dashboard.content.restaurant_food_menu_form')
@include('includes.admin-dashboard.content.beauty_service_form')
@include('includes.admin-dashboard.content.hotel_room_specifications_form')
