<?php
// Paypal Keys
$paypal_settings = $website_details['paypal']->description;
$paypal = json_decode($paypal_settings);

// Stripe Keys
$stripe_settings = $website_details['stripe']->description;
$stripe = json_decode($stripe_settings);
?>
<!-- start page title -->
<div class="row">
    <div class="col-lg-7">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    System Currency Settings
                </div>
            </div>
            <div class="panel-body">
                <form action="<?php echo route('payment_settings.system_currency_settings'); ?>" method="post" enctype="multipart/form-data" role="form" class="form-horizontal form-groups-bordered">
                    @csrf
                    <div class="form-group">
                        <label for="system_currency" class="col-sm-3 control-label">System Currency</label>

                        <div class="col-sm-7">
                            <select name="system_currency" id = "system_currency" class="select2" data-allow-clear="true" data-placeholder="System Currency">
                                <option value="">Select System Currency</option>
                                <?php
                                foreach ($currencies as $currency):?>
                                <option value="<?php echo $currency['code'];?>"
                                <?php if ($website_details['system_currency']->description == $currency['code'])echo 'selected';?>> <?php echo $currency['code'];?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="currency_position" class="col-sm-3 control-label">Currency Position</label>

                        <div class="col-sm-7">
                            <select name="currency_position" id = "currency_position" class="select2" data-allow-clear="true" data-placeholder="Currency Position">
                                <option value="left" <?php if ($website_details['currency_position']->description == 'left') echo 'selected';?> >Left</option>
                                <option value="right" <?php if ($website_details['currency_position']->description == 'right') echo 'selected';?> >Right</option>
                                <option value="left-space" <?php if ($website_details['currency_position']->description == 'left-space') echo 'selected';?> >Left With a Space</option>
                                <option value="right-space" <?php if ($website_details['currency_position'] == 'right-space') echo 'selected';?> > Right With a Space</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-offset-3 col-sm-5" style="padding-top: 10px;">
                        <button type="submit" class="btn btn-info">Update System Currency</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- end col-->
    <div class="col-md-5">
        <div class="alert alert-info" role="alert">
            <h4 class="alert-heading">Heads Up!</h4>
            <p> Please make sure that System currency, Paypal currency and Stripe currency Are same</p>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-7">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    Setup Paypal Settings
                </div>
            </div>
            <div class="panel-body">
                <form action="<?php echo route('payment_settings.paypal_settings'); ?>" method="post" enctype="multipart/form-data" role="form" class="form-horizontal form-groups-bordered">
                    @csrf
                    <div class="form-group">
                        <label for="paypal_active" class="col-sm-3 control-label">Active</label>

                        <div class="col-sm-7">
                            <select name="paypal_active" id = "paypal_active" class="select2" data-allow-clear="true" data-placeholder="Paypal Active">
                                <option value="0" <?php if ($paypal[0]->active == 0) echo 'selected';?>> No</option>
                                <option value="1" <?php if ($paypal[0]->active == 1) echo 'selected';?>> Yes</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="paypal_mode" class="col-sm-3 control-label">Mode</label>

                        <div class="col-sm-7">
                            <select name="paypal_mode" id = "paypal_mode" class="select2" data-allow-clear="true" data-placeholder="Paypal Mode">
                                <option value="sandbox" <?php if ($paypal[0]->mode == 'sandbox') echo 'selected';?>> Sandbox</option>
                                <option value="production" <?php if ($paypal[0]->mode == 'production') echo 'selected';?>> Production</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="paypal_currency" class="col-sm-3 control-label">Paypal Currency</label>

                        <div class="col-sm-7">
                            <select name="paypal_currency" id = "paypal_currency" class="select2" data-allow-clear="true" data-placeholder="Paypal Currency">
                                <option value="">Select Paypal Currency</option>
                                <?php
                                foreach ($paypal_supported_currencies as $currency):?>
                                <option value="<?php echo $currency['code'];?>"
                                <?php if ($website_details['paypal_currency']->description == $currency['code'])echo 'selected';?>> <?php echo $currency['code'];?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Client id (Sandbox)</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="sandbox_client_id" id="sandbox_client_id" placeholder="Sandbox Client Id"  value="<?php echo $paypal[0]->sandbox_client_id;?>" required >
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="production_client_id" class="col-sm-3 control-label">Client id (Production)</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="production_client_id" id="production_client_id" placeholder="Sandbox Client Id"  value="<?php echo $paypal[0]->production_client_id;?>" required >
                        </div>
                    </div>

                    <div class="col-sm-offset-3 col-sm-5" style="padding-top: 10px;">
                        <button type="submit" class="btn btn-info">Update Paypal Keys</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- end col-->
</div>

<div class="row">
    <div class="col-lg-7">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    Setup Stripe Settings
                </div>
            </div>
            <div class="panel-body">
                <form action="<?php echo route('payment_settings.stripe_settings'); ?>" method="post" enctype="multipart/form-data" role="form" class="form-horizontal form-groups-bordered">
                    @csrf
                    <div class="form-group">
                        <label for="stripe_active" class="col-sm-3 control-label">Active</label>

                        <div class="col-sm-7">
                            <select name="stripe_active" id = "stripe_active" class="select2" data-allow-clear="true" data-placeholder="Stripe Active">
                                <option value="0" <?php if ($stripe[0]->active == 0) echo 'selected';?>>No</option>
                                <option value="1" <?php if ($stripe[0]->active == 1) echo 'selected';?>> Yes</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="testmode" class="col-sm-3 control-label">Test Mode</label>

                        <div class="col-sm-7">
                            <select name="testmode" id = "testmode" class="select2" data-allow-clear="true" data-placeholder="Test Mode">
                                <option value="on" <?php if ($stripe[0]->testmode == 'on') echo 'selected';?>> On</option>
                                <option value="off" <?php if ($stripe[0]->testmode == 'off') echo 'selected';?>> Off</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="stripe_currency" class="col-sm-3 control-label">Stripe Currency</label>

                        <div class="col-sm-7">
                            <select name="stripe_currency" id = "stripe_currency" class="select2" data-allow-clear="true" data-placeholder="Stripe Currency">
                                <option value="">Select Stripe Currency</option>
                                <?php
                                foreach ($stripe_supported_currencies as $currency):?>
                                <option value="<?php echo $currency['code'];?>"
                                <?php if ($website_details['stripe_currency']->description == $currency['code'])echo 'selected';?>> <?php echo $currency['code'];?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="secret_key" class="col-sm-3 control-label">Test Secret Key</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="secret_key" id="secret_key" value="<?php echo $stripe[0]->secret_key;?>" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="public_key" class="col-sm-3 control-label">Test Public Key</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="public_key" id="public_key" value="<?php echo $stripe[0]->public_key;?>" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="secret_live_key" class="col-sm-3 control-label">Live Secret Key</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="secret_live_key" id="secret_live_key" value="<?php echo $stripe[0]->secret_live_key;?>" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="public_live_key" class="col-sm-3 control-label">Live Public Key</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="public_live_key" id="public_live_key" value="<?php echo $stripe[0]->public_live_key;?>" >
                        </div>
                    </div>

                    <div class="col-sm-offset-3 col-sm-5" style="padding-top: 10px;">
                        <button type="submit" class="btn btn-info">Update Stripe Keys</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- end col-->
</div>
