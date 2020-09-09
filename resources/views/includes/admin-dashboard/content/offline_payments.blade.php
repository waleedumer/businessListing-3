<div class="row">
    <div class="col-lg-10">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    Offline Payment
                </div>
            </div>
            <div class="panel-body">
                <form action="<?php echo route('offline_payment.store'); ?>" method="post" enctype="multipart/form-data" role="form" class="form-horizontal form-groups-bordered">
                    @csrf
                    <div class="form-group">
                        <label for="user_id" class="col-sm-3 control-label">User</label>
                        <div class="col-sm-7">
                            <select name="user_id" id = "user_id" class="select2" data-allow-clear="true" data-placeholder="Select User" required>
                                <option value="">Select User</option>
                                <?php
                                foreach($users as $user):
                                if($user['role_id'] == 2):?>
                                <option value="<?php echo $user->id; ?>"><?php echo $user->name; ?></option>
                                <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="package_id" class="col-sm-3 control-label">Choose Package</label>

                        <div class="col-sm-7">
                            <select name="package_id" id = "package_id" class="select2" data-allow-clear="true" data-placeholder="Select Package" required>
                                <option value="">Select Package</option>
                                <?php
                                foreach($packages as $package):
                                if($package['package_type'] == 1):?>
                                <option value="<?php echo $package['id']; ?>"><?php echo $package['name'].' '.'('.$package['price'].') '; ?></option>
                                <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="amount_paid" class="col-sm-3 control-label">Payment Amount({{$currency ?? '' ?? '' ?? '' ?? '' ?? '' ?? ''??''}})</label>

                        <div class="col-sm-7">
                            <input type="number" class="form-control" name="amount_paid" id="amount_paid" value="0" placeholder="Amount" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="payment_method" class="col-sm-3 control-label">Payment Method</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="payment_method" id="payment_method" placeholder="Payment Method" required>
                        </div>
                    </div>

                    <div class="col-sm-offset-3 col-sm-5" style="padding-top: 10px;">
                        <button type="submit" class="btn btn-info">Add User To Package</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- end col-->
</div>
