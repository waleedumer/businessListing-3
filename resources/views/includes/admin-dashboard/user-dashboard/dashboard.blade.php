<div class="row">
    <div class="col-lg-6">
        <div class="row">
            <div class="col-sm-6">
                <div class="tile-title tile-primary">
                    <div class="icon">
                        <i class="glyphicon glyphicon-leaf"></i>
                    </div>
                    <div class="title">
                        <h3>
                            <?php
                            $total_spent_amount = auth()->user()->packages;
                            if(count($total_spent_amount)>=1){
                                foreach($total_spent_amount as $amount)
                                    $arr=[''];
                                $total_spent_amount=array_sum($total_spent_amount->all('price'));
                            }else{
//                                dd($total_spent_amount);
                                $total_spent_amount=0;
                            }
                            echo App\Setting::all()->keyBy('type')['system_currency']->description.' '. $total_spent_amount;?>
                        </h3>
                        <p>
                            Total amount spent
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="tile-title tile-red">
                    <div class="icon">
                        <i class="glyphicon glyphicon-leaf"></i>
                    </div>
                    <div class="title">
                        <h3>
                            <?php
                            $wishlisted_items = auth()->user()->wishlist->contains('pivot');
                            $wishlisted_items;
                            ?>
                        </h3>
                        <p>
                            Number of wishlisted items
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="tile-title tile-blue">
                    <div class="icon">
                        <i class="glyphicon glyphicon-leaf"></i>
                    </div>
                    <div class="title">
                        <h3>
                            <?php
                            $active_listing = auth()->user()->listings->where('status','active');
                            echo count($active_listing);
                            ?>
                        </h3>
                        <p>
                            Number of active listing
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="tile-title tile-aqua">
                    <div class="icon">
                        <i class="glyphicon glyphicon-leaf"></i>
                    </div>
                    <div class="title">
                        <h3>
                            <?php
                            $pending_listing = auth()->user()->listings->where('status','pending');
                            echo count($pending_listing);
                            ?>
                        </h3>
                        <p>
                            Number of pending listing
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="row">
            <?php
            $has_packages=(auth()->user()->packages()->count());
            $currently_active_package = auth()->user()->packages->last();
            if ($has_packages>0):
            $package_details = $currently_active_package;?>
            <div class="col-sm-12">
                <div class="tile-progress tile-blue">
                    <div class="tile-header">
                        <span>Currently active package name:</span>
                        <h3><?php echo $package_details['name']; ?></h3>
                    </div>
                    <div class="tile-progressbar">
                        <span data-fill="100%"></span>
                    </div>
                    <div class="tile-footer">
                        <h4>
                            <span><?php echo 'Expiry date'.' : <b>'.date('D, d M Y', $currently_active_package['expired_date']).'</b>'; ?></span><br>
                            <span><?php echo 'Purchase date'.' : <b>'.date('D, d M Y', $currently_active_package['purchase_date']).'</b>'; ?></span><br><br>
                            <span><a href="<?php echo url('user/packages'); ?>" class="btn btn-white">More info</a></span><br>
                        </h4>
                    </div>
                </div>
            </div>
            <?php else: ?>
            <div class="col-sm-12">
                <div class="tile-progress tile-red">
                    <div class="tile-header">
                        <h3>No package is currently active</h3>
                    </div>
                    <div class="tile-progressbar">
                        <span data-fill="100%"></span>
                    </div>
                    <div class="tile-footer">
                        <h4>
                            <span><a href="<?php echo url('user/packages'); ?>" class="btn btn-white btn-rounded">Buy package</a></span><br>
                        </h4>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
