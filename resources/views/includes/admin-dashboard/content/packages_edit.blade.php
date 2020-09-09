<div class="row">
    <div class="col-lg-10">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    Update Package
                </div>
            </div>
            <div class="panel-body">

                <form action="<?php echo route('packages.edit',$package_details['id']); ?>" method="post" enctype="multipart/form-data" role="form" class="form-horizontal form-groups-bordered">
                @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="package_type" class="col-sm-3 control-label">Package Type</label>

                        <div class="col-sm-7">
                            <select name="package_type" id = "package_type" class="select2" data-allow-clear="true" data-placeholder="Package Type">
                                <?php
                                if($package_details['package_type'] == 0){
                                    $free = 'selected';
                                    $paid = null;
                                }else{
                                    $free = null;
                                    $paid = 'selected';
                                }
                                ?>
                                <option value="0" id="free" <?php echo $free; ?>>Free</option>
                                <option value="1" id="paid" <?php echo $paid; ?>>Paid</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Package Name</label>

                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="name" id="name" placeholder="Package Name" value="<?php echo $package_details['name']; ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Price({{$currency??''}}</label>

                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="price" id="price" placeholder="Price" value="<?php echo $package_details['price']; ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label" for = "validity">Validity in Days</label>

                        <div class="col-sm-7">
                            <div class="input-group">
                                <input type="number" class="form-control" name="validity" id="validity" placeholder="Validity In Days" aria-describedby="days-addon" min="1"  value="<?php echo $package_details['validity']; ?>" required>
                                <span class="input-group-addon" id="days-addon">Days</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="number_of_listings" class="col-sm-3 control-label">Number Of Listings</label>
                        <div class="col-sm-7">
                            <input type="number" class="form-control" name="number_of_listings" id="number_of_listings" placeholder="Number Of Listings" value="<?php echo $package_details['number_of_listings']; ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="number_of_categories" class="col-sm-3 control-label">Number Of Categories</label>
                        <div class="col-sm-7">
                            <input type="number" class="form-control" name="number_of_categories" id="number_of_categories" placeholder="Number Of Categories" value="<?php echo $package_details['number_of_categories']; ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="number_of_tags" class="col-sm-3 control-label">Number Of Tags</label>
                        <div class="col-sm-7">
                            <input type="number" class="form-control" name="number_of_tags" id="number_of_tags" placeholder="Number Of Tags'); ?>" value="<?php echo $package_details['number_of_tags']; ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="number_of_photos" class="col-sm-3 control-label">Number Of Photos</label>
                        <div class="col-sm-7">
                            <input type="number" class="form-control" name="number_of_photos" id="number_of_photos" placeholder="Number Of Photos" value="<?php echo $package_details['number_of_photos']; ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="ability_to_add_video" class="col-sm-3 control-label"></label>
                        <div class="col-sm-7">
                            <input tabindex="5" type="checkbox" class="icheck-2" id="ability_to_add_video" value="1" name = "ability_to_add_video" <?php if($package_details['ability_to_add_video'] == 1) echo 'checked'; ?>>
                            <label for="ability_to_add_video">Ability To Add Video</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="ability_to_add_contact_form" class="col-sm-3 control-label"></label>
                        <div class="col-sm-7">
                            <input tabindex="5" type="checkbox" class="icheck-2" id="ability_to_add_contact_form" value="1" name = "ability_to_add_contact_form" <?php if($package_details['ability_to_add_contact_form'] == 1) echo 'checked'; ?>>
                            <label for="ability_to_add_contact_form">Ability To Add Contact Form</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="is_recommended" class="col-sm-3 control-label"></label>
                        <div class="col-sm-7">
                            <input tabindex="5" type="checkbox" class="icheck-2" id="is_recommended" value="1" name = "is_recommended" <?php if($package_details['is_recommended'] == 1) echo 'checked'; ?>>
                            <label for="is_recommended">Mark This Package As Recommended</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="featured" class="col-sm-3 control-label"></label>
                        <div class="col-sm-7">
                            <input tabindex="5" type="checkbox" class="icheck-2" id="featured" value="1" name = "featured" <?php if($package_details['featured'] == 1) echo 'checked'; ?>>
                            <label for="featured">Featured</label>
                        </div>
                    </div>

                    <div class="col-sm-offset-3 col-sm-5" style="padding-top: 10px;">
                        <button type="submit" class="btn btn-info">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- end col-->
</div>
<script type="text/javascript">

    $(document).ready(function(){
        $("#package_type").change(function(){
            var amount = $('#package_type').val();
            if(amount == 0){
                $('#price').val(0);
                $('#price').prop('readonly', true);
            }else{
                $('#price').val();
                $('#price').prop('readonly', false);
            }
        });
    });
</script>
