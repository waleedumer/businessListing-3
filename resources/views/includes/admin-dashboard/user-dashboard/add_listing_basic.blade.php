<div class="form-group">
    <label for="title" class="col-sm-3 control-label">Title</label>
    <div class="col-sm-7">
        <input type="text" class="form-control" name="name" id="title" placeholder="Title" required>
    </div>
</div>

<div class="form-group">
    <label for="description" class="col-sm-3 control-label">Description</label>
    <div class="col-sm-7">
        <textarea name="description" class="form-control" id="description" rows="8" cols="80"></textarea>
    </div>
</div>
<div class="form-group">
    <label for="featured_type" class="col-sm-3 control-label">Featured type</label>
    <div class="col-sm-7">
        <?php $user_id = auth()->user()->id; ?>
        <?php $package_id = auth()->user()->packages->last()['id']; ?>
        <?php $featured_status = App\Package::where('id',$package_id)->first()['featured']; ?>
        <select name="is_featured" id = "featured_type" class="selectboxit" <?php if($featured_status != 1) echo 'disabled'; ?> required>
            <option value="">Select featured type</option>
            <option value="1">Featured</option>
            <option value="0"<?php if($featured_status != 1) echo 'selected'; ?>>None featured</option>
        </select>
    </div>
</div>
<div class="form-group">
    <label for="google_analytics_id" class="col-sm-3 control-label">Google analytics id</label>
    <div class="col-sm-7">
        <input type="text" class="form-control" name="google_analytics_id" id="google_analytics_id" placeholder="GA_MEASUREMENT_ID" placeholder="GA_MEASUREMENT_ID">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label" for="category">Category</label>
    <div class="col-sm-7">
        <div id="category_area">
            <div class="row">
                <div class="col-sm-7">

                    <select class="form-control select2" name="categories[]" id = "category_default" required>
                        <option value="">Select category</option>
                        <?php foreach ($categories as $category): ?>
                            <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-sm-2">
                    <button type="button" class="btn btn-primary btn-sm" style="margin-top: 2px; float: right;" name="button" onclick="appendCategory()"> <i class="fa fa-plus"></i> </button>
                </div>
            </div>
        </div>

        <div id="blank_category_field">
            <div class="row appendedCategoryFields" style="margin-top: 10px;">
                <div class="col-sm-7 pr-0">
                    <select class="form-control" name="categories[]">
                        <option value="">Select category</option>
                        <?php foreach ($categories as $category): ?>
                        <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-sm-2">
                    <button type="button" class="btn btn-danger btn-sm" style="margin-top: 2px; float: right;" name="button" onclick="removeCategory(this)"> <i class="fa fa-minus"></i> </button>
                </div>
            </div>
        </div>
    </div>
</div>
