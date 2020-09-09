<div class="form-group">
    <label for="country_id" class="col-sm-3 control-label">Country</label>

    <div class="col-sm-7">
        <select name="country_id" id = "country_id" class="select2" data-allow-clear="true" data-placeholder="Select Country" onchange="getCityList(this.value)">
            <option value="0">None</option>
            <?php foreach ($countries as $country): ?>
            <option value="<?php echo $country['id']; ?>"><?php echo $country['name']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-3 control-label" for="city_id">City</label>
    <div class="col-sm-7">
        <select class="form-control select2" name="city_id" id="city_id">
            <option value="">Select city</option>
        </select>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-3 control-label" for="address">Address</label>
    <div class="col-sm-7">
        <textarea name="address" rows="5" class="form-control" id = "address"></textarea>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-3 control-label" for="latitude">Latitude</label>
    <div class="col-sm-7">
        <input type="text" class="form-control" id="latitude" name="latitude" placeholder="You can provide latitude for getting the exact result">
    </div>
</div>

<div class="form-group row mb-3">
    <label class="col-sm-3 control-label" for="longitude">Longitude</label>
    <div class="col-md-7">
        <input type="text" class="form-control" id="longitude" name="longitude" placeholder="You can provide longitude for getting the exact result">
    </div>
</div>
