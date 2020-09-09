<div class="row">
    <div class="col-lg-10">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    Update City
                </div>
            </div>
            <div class="panel-body">

                <form action="<?php echo route('cities.update',$city_details['id']); ?>" method="post" enctype="multipart/form-data" role="form" class="form-horizontal form-groups-bordered">
                @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">City Name'); ?></label>

                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="name" id="name" placeholder="City Name" value="<?php echo $city_details['name']; ?>">
                        </div>
                    </div>



                    <div class="form-group">
                        <label for="country_id" class="col-sm-3 control-label">Country</label>

                        <div class="col-sm-7">
                            <select name="country_id" id = "country_id" class="select2" data-allow-clear="true" data-placeholder="Select Country">
                                <option value="0">None</option>
                                <?php foreach ($countries as $key=>$country): ?>
                                <option value="<?php echo $key; ?>" <?php if($city_details['country_id'] == $key) echo 'selected'; ?>><?php echo $country ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-offset-3 col-sm-5" style="padding-top: 10px;">
                        <button type="submit" class="btn btn-info">Update City</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- end col-->
</div>
