<?php
    $settings=App\Setting::all()->keyBy('type');
// Paypal Keys
$paypal_settings = $settings['paypal']->description;
$paypal = json_decode($paypal_settings);

// Stripe Keys

$stripe_settings = $settings['stripe']->description;
$stripe = json_decode($stripe_settings);
?>

<div class="row">
    <div class="col-lg-12">
        <!-- Pricing Title-->
        <div class="text-center">
            <h3 class="mb-2">Our plans and pricings</h3>
            <p class="text-muted w-50 m-auto">
                We have plans and prices that fit your business perfectly.
            </p>
        </div>
        <div class="gallery-env">
            <div class="row">
                <?php foreach ($packages as $package): ?>
                <div class="col-sm-4">
                    <article class="album">
                        <section class="album-info text-center">
                            <h2><a href="extra-gallery-single.html"><?php echo $package['name']; ?></a></h2>
                            <p>
                            <h4>
                                <i>
                                    <?php if ($package['package_type'] == 0): ?>
                                    <div class="label label-success">Free</div>
                                    <?php else: ?>
                                    <?php echo $setting['system_currency']->description." ".($package['price']); ?> <span>/ <?php echo $package['validity'].' '.'days'; ?></span>
                                    <?php endif; ?>
                                </i>
                            </h4>
                            </p>
                            <p>
                            <?php if ($package['is_recommended'] == 1): ?>
                            <div class="label label-info">Recommended</div>
                            <?php endif; ?>
                            </p>
                        </section>

                        <footer class="text-center">
                            <div class="album-images-count"> <?php echo $package['number_of_listings'].' '.'Listings'; ?> This package</div>
                        </footer>
                        <footer>
                            <div class="album-images-count"> <?php echo $package['number_of_categories'].' '.'Categories'; ?> Per listing </div>
                        </footer>
                        <footer>
                            <div class="album-images-count"> <?php echo $package['number_of_photos'].' '.'Photos'; ?>  Per listing </div>
                        </footer>
                        <footer>
                            <div class="album-images-count"> <?php echo $package['number_of_tags'].' '.'Tags'; ?> Per listing </div>
                        </footer>
                        <footer>
                            <div class="album-images-count"> <?php echo $package['ability_to_add_contact_form'] == 1 ? 'Availability of' : 'Unavailability of'; ?> Contact form </div>
                        </footer>
                        <footer>
                            <div class="album-images-count"> <?php echo $package['ability_to_add_video'] == 1 ? 'Availability of' : 'Unavailability of'; ?> Video </div>
                        </footer>
                        <footer>
                            <div class="album-images-count"> <?php echo $package['featured'] == 1 ? 'Featured listings allowed' : 'Featured listings unallowed'; ?> </div>
                        </footer>
                        <footer>
                            <div class="album-images-count"> <?php echo $package['validity'].' '.'Days'; ?> Listing </div>
                        </footer>

                        <div class="category-actions text-center">
                            <?php
                            $package_type = $package['package_type'];

                            $total_submited_package = 0;
                            $sumited_packages = auth()->user()->listings;
                            foreach($sumited_packages as $sumited_package){
                                $total_submited_package++;
                            }

                            if($package_type == 0){

                            if($total_submited_package > $package['number_of_listings']){
                                echo "<span style = 'color: red;'>".'Listings capacity limited'.', '.'Please choose a upper level package'."</span>";
                            }else{
                            ?>
                            <a href="<?php echo url('user/free_package'.'/'.$package['id']) ?>" class="btn btn-primary mt-4 mb-2 btn-rounded">Choose plan</a>
                            <?php
                            }
                            }else{

                            if($total_submited_package > $package['number_of_listings']){
                                echo "<span style = 'color: red;'>".'Listings capacity limited'.', '.'Please choose a upper level package'."</span>";
                            }else{
                            ?>
                            <a href="<?php echo url('user/payment_gateway/'.$package['id']); ?>" class="btn btn-orange mt-4 mb-2 btn-rounded">Purchase plan</a>
                            <?php
                            }
                            }
                            ?>
                        </div>
                    </article>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
