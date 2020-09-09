<div class="row">
    <div class="col-lg-8">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    Smtp Settings
                </div>
            </div>
            <div class="panel-body">
                <form action="<?php echo route('smtp_settings.store'); ?>" method="post" enctype="multipart/form-data" role="form" class="form-horizontal form-groups-bordered">
                    @csrf
                    <div class="form-group">
                        <label for="protocol" class="col-sm-3 control-label">Smtp Protocol</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="protocol" id="protocol" placeholder="Smtp Protocol" value="<?php echo $website_details['protocol']->description; ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="smtp_host" class="col-sm-3 control-label">Smtp Host</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="smtp_host" id="smtp_host" placeholder="Smtp Host" value="<?php echo $website_details['smtp_host']->description; ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="smtp_port" class="col-sm-3 control-label">Smtp Port</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="smtp_port" id="smtp_port" placeholder="Smtp Port" value="<?php echo $website_details['smtp_port']->description; ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="smtp_user" class="col-sm-3 control-label">Smtp User</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="smtp_user" id="smtp_user" placeholder="Smtp User" value="<?php echo $website_details['smtp_user']->description; ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="smtp_pass" class="col-sm-3 control-label">Smtp Password</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="smtp_pass" id="smtp_pass" placeholder="Smtp Password'); ?>" value="<?php echo $website_details['smtp_pass']->description; ?>" required>
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
