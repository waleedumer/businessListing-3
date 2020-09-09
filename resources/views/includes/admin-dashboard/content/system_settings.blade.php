<div class="row">
    <div class="col-lg-7">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    System Settings
                </div>
            </div>
            <div class="panel-body">
                <form action="<?php echo route('system_settings.store'); ?>" method="post" enctype="multipart/form-data" role="form" class="form-horizontal form-groups-bordered">
                    @csrf
                    <div class="form-group">
                        <label for="website_title" class="col-sm-3 control-label">Website Title</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="website_title" id="website_title" placeholder="Website Title" value="<?php echo $website_details['website_title']->description;  ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="system_title" class="col-sm-3 control-label">System Title</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="system_title" id="system_title" placeholder="System Title'); ?>" value="<?php echo $website_details['system_title']->description;  ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="meta_keyword" class="col-sm-3 control-label">Meta Keyword</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id = "meta_keyword" value="<?php echo $website_details['meta_keyword']->description;  ?>" name="meta_keyword" data-role="tagsinput"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="meta_description" class="col-sm-3 control-label">Meta Description</label>
                        <div class="col-sm-7">
                            <textarea name="meta_description" class="form-control" rows="5" cols="80"><?php echo $website_details['meta_description']->description;  ?></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="system_email" class="col-sm-3 control-label">System Email</label>
                        <div class="col-sm-7">
                            <input type="email" class="form-control" name="system_email" id="system_email" placeholder="System Email" value="<?php echo $website_details['system_email']->description;  ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="address" class="col-sm-3 control-label">Address</label>
                        <div class="col-sm-7">
                            <textarea name="address" class="form-control" rows="5" cols="80"><?php echo $website_details['address']->description;  ?></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="phone" class="col-sm-3 control-label">Phone</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" value="<?php echo $website_details['phone']->description;  ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="country_id" class="col-sm-3 control-label">Country</label>

                        <div class="col-sm-7">
                            <select name="country_id" id = "country_id" class="select2" data-allow-clear="true" data-placeholder="Select Country">
                                <?php foreach ($countries as $country): ?>
                                <option value="<?php echo $country['id']; ?>" <?php if($country['id'] ==$website_details['country_id']->description) echo 'selected'; ?>><?php echo $country['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="timezone" class="col-sm-3 control-label">Timezone</label>

{{--                        <div class="col-sm-7">--}}
{{--                            <select name="timezone" id = "timezone" class="select2" data-allow-clear="true" data-placeholder="<?php echo get_phrase('select_timezone'); ?>">--}}
{{--                                <?php $tzlist = DateTimeZone::listIdentifiers(DateTimeZone::ALL); ?>--}}
{{--                                <?php foreach ($tzlist as $tz): ?>--}}
{{--                                <option value="<?php echo $tz; ?>" <?php if(get_settings('timezone') == $tz) echo 'selected'; ?>><?php echo $tz; ?></option>--}}
{{--                                <?php endforeach; ?>--}}
{{--                            </select>--}}
{{--                        </div>--}}
                    </div>

{{--                    <div class="form-group">--}}
{{--                        <label for="language" class="col-sm-3 control-label">System Language</label>--}}

{{--                        <div class="col-sm-7">--}}
{{--                            <select name="language" id = "language" class="select2" data-allow-clear="true" data-placeholder="Select Language">--}}
{{--                                <?php foreach ($languages as $language): ?>--}}
{{--                                <option value="<?php echo $language; ?>" <?php if($website_details['language'] == $language) echo 'selected'; ?>><?php echo ucfirst($language); ?></option>--}}
{{--                                <?php endforeach; ?>--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="form-group">--}}
{{--                        <label for="purchase_code" class="col-sm-3 control-label"><?php echo get_phrase('purchase_code'); ?></label>--}}
{{--                        <div class="col-sm-7">--}}
{{--                            <input type="text" class="form-control" name="purchase_code" id="purchase_code" placeholder="<?php echo get_phrase('purchase_code'); ?>" value="<?php echo get_settings('purchase_code');  ?>">--}}
{{--                        </div>--}}
{{--                    </div>--}}

                    <div class="form-group">
                        <label for="footer_text" class="col-sm-3 control-label">Footer Text</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="footer_text" id="footer_text" placeholder="Text" value="<?php echo $website_details['footer_text']->description;  ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="footer_link" class="col-sm-3 control-label">Footer Link</label>
                        <div class="col-sm-7">
                            <input type="url" class="form-control" name="footer_link" id="footer_link" placeholder="Url" value="<?php echo $website_details['footer_link']->description;  ?>">
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
</div>
