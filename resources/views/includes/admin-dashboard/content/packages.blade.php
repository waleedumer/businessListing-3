<!-- start page title -->
<div class="row ">
    <div class="col-lg-12">
        <a href="<?php echo route('packages.create'); ?>" class="btn btn-primary alignToTitle"><i class="mdi mdi-plus"></i>Add New Package</a>
    </div><!-- end col-->
</div>
<div class="row">
    <div class="col-lg-12">
        <!-- Pricing Title-->
        <div class="text-center">
            <h3 class="mb-2">Our Plans And Pricings</h3>
            <p class="text-muted w-50 m-auto">
                We Have Plans and Prices that fit Your Business Perfectly
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
                                    <?php echo $currency ?? ''.' '.$package['price']; ?> <span>/ <?php echo $package['validity']; ?> Days</span>
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
                            <div class="album-images-count"> <?php echo $package['number_of_listings'].' '; ?>Listings This Package</div>
                        </footer>
                        <footer>
                            <div class="album-images-count"> <?php echo $package['number_of_categories'].' ' ?>Categories Per Listing</div>
                        </footer>
                        <footer>
                            <div class="album-images-count"> <?php echo $package['number_of_photos'].' '; ?>Photos  Per Listing </div>
                        </footer>
                        <footer>
                            <div class="album-images-count"> <?php echo $package['number_of_tags'].' '?>Tags Per Listing </div>
                        </footer>
                        <footer>
                            <div class="album-images-count"> <?php echo $package['ability_to_add_contact_form'] == 1 ? 'Availability Of' : 'Unavailability Of'; ?> Contact Form </div>
                        </footer>
                        <footer>
                            <div class="album-images-count"> <?php echo $package['ability_to_add_video'] == 1 ? 'Availability Of' : 'Unavailability Of'; ?> <?php echo 'Video'; ?> </div>
                        </footer>
                        <footer>
                            <div class="album-images-count"> <?php echo $package['featured'] == 1 ? 'Featured Listings Allowed' : 'Featured Listings Unallowed'; ?> </div>
                        </footer>
                        <footer>
                            <div class="album-images-count"> <?php echo $package['validity'].' '; ?>Days Listing </div>
                        </footer>
                        <div class="category-actions">
                            <a href = "<?php echo route('packages.edit',$package['id']); ?>" class="btn btn-info" style="margin-right:5px;">
                                Edit
                            </a>

                            <a href = "javascript::" class="btn btn-red" style="float: right; margin-right:5px;" onclick="confirm_modal('<?php echo route('packages.destroy',$package['id']); ?>');">
                                Delete
                            </a>
                        </div>
                    </article>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
