<div class="row">
    <div class="col-md-7">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    Map Settings
                </div>
            </div>
            <div class="panel-body">
                <form class="" action="<?php echo route('map_settings.store'); ?>" method="post">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group" style="padding-bottom: 50px;">
                            <label for="map_access_token" class="col-sm-3 control-label">Map Access token</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="map_access_token" id="map_access_token" placeholder="pk.xxxxxxxxxxxxxxxxxxxxxxxxxxx" value="<?php echo $website_details['map_access_token']->description; ?>">
                            </div>
                        </div>
                        <div class="form-group" style="padding-bottom: 50px;">
                            <label for="default_location" class="col-sm-3 control-label">Default Location (Latitude, Longitude')</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="default_location" id="default_location" placeholder="16.731384, -169.531118" value="<?php echo $website_details['default_location']->description; ?>">
                            </div>
                        </div>

                        <div class="form-group" style="padding-bottom: 50px;">
                            <label for="max_zoom_level" class="col-sm-3 control-label">Max Zoom Level</label>
                            <div class="col-md-7">
                                <input type="number" class="form-control" name="max_zoom_level" id="max_zoom_level" placeholder="Maximum Number 19'); ?>" value="<?php echo $website_details['max_zoom_level']->description; ?>" max="19" min="13">
                            </div>
                        </div>

                        <div class="form-group" style="padding-bottom: 50px;">
                            <label for="min_zoom_listings_page" class="col-sm-3 control-label">Min Zoom Level On The Listings Page</label>
                            <div class="col-md-7">
                                <input type="number" class="form-control" name="min_zoom_listings_page" id="min_zoom_listings_page" placeholder="Minimum Number 1" value="<?php echo $website_details['min_zoom_listings_page']->description; ?>" max="13" min="1">
                            </div>
                        </div>

                        <div class="form-group" style="padding-bottom: 50px;">
                            <label for="min_zoom_directory_page" class="col-sm-3 control-label">Min Zoom Level On The Directory Page</label>
                            <div class="col-md-7">
                                <input type="number" class="form-control" name="min_zoom_directory_page" id="min_zoom_directory_page" placeholder="Minimum Number 1" value="<?php echo $website_details['min_zoom_directory_page']->description; ?>" max="13" min="1">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-3 control-label"></label>
                            <div class="col-md-7">
                                <button class = "btn btn-success" type="submit" name="button">Update Map Settings</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="alert alert-info" role="alert">
            <h4 class="alert-heading">How Do I Get A Map Access Token</h4>
            <ul>
                <li>
                    <p>First create an account in the <a href="https://www.mapbox.com/" target="_blank"><b>Mapbox</b></a>, You will get an access token. Copy the access Token and paste here.</p>
                </li>
                <li>
                    <a href="https://account.mapbox.com/auth/signup/"><b>Click here to sign up in Mapbox.</b></a>
                </li>
            </ul>
        </div>
    </div>
</div>
