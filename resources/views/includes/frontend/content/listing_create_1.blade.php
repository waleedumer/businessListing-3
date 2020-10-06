<div class="form-group">
    <label for="title" class="control-label">Title</label>
    <input type="text" class="form-control" name="name" id="title" placeholder="Title" required>
</div>
<div class="form-group">
    <label for="description" class="control-label">Description</label>
    <textarea name="description" class="form-control" id="description" rows="2" cols="80"></textarea>
</div>

<!-- Address and Google Business Field -->
    <div class="form-group">
        <label class="control-label" for="address">Address</label>
        <textarea name="address" rows="2" class="form-control" id = "address"></textarea>
    </div>

    <div class="form-group">
        <label class="control-label" for="latitude">Latitude</label>
        <input type="text" class="form-control" id="latitude" name="latitude" placeholder="You can provide latitude for getting the exact result">
    </div>

    <div class="form-group">
        <label class="control-label" for="longitude">Longitude</label>
        <input type="text" class="form-control" id="longitude" name="longitude" placeholder="You can provide longitude for getting the exact result">
    </div>
<!-- Address and Google Business Field end -->

<div class="form-group">
    <label for="country_id" class="control-label">Country</label>
        <select name="country_id" id = "country_id" class="select2 form-control" data-allow-clear="true" data-placeholder="Select country" onchange="getCityList(this.value)">
            <option value="0">None</option>
            <?php foreach ($countries as $country): ?>
            <option value="<?php echo $country['id']; ?>"><?php echo $country['name']; ?></option>
            <?php endforeach; ?>
        </select>
</div>
<div class="form-group">
    <label class="control-label" for="city_id"> City</label>
        <select class="form-control select2" name="city_id" id="city_id">
            <option value="">Select city</option>
        </select>
</div>
<div class="form-group">
    <label class="control-label" for="phone_number">Phone Number</label>
    <input type="text" class="form-control" id="phone_number" name="phone" placeholder="Phone Number">
</div>
<div class="form-group">
    <label class="control-label" for="website">Website</label>
    <input type="text" class="form-control" id="website" name="website" placeholder="Website">
</div>


<div class="form-group">
    <label for="google_analytics_id" class="control-label">Google Analytics id</label>
    <div class="col-sm-7">
        <input type="text" class="form-control" name="google_analytics_id" id="google_analytics_id" placeholder="GA_MEASUREMENT_ID" placeholder="GA_MEASUREMENT_ID">
    </div>
</div>
<div class="form-group">
    <label for="featured_type" class="control-label">Featured Type</label>
        <select name="is_featured" id = "featured_type" class="selectboxit" required>
            <option value="">Select Featured Type</option>
            <option value="1">Featured</option>
            <option value="0">None Featured</option>
        </select>
</div>

