<footer class="plus_border">
    <div class="container margin_60_35">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <a data-toggle="collapse" data-target="#collapse_ft_1" aria-expanded="false" aria-controls="collapse_ft_1" class="collapse_bt_mobile">
                    <h3>Quick Links</h3>
                    <div class="circle-plus closed">
                        <div class="horizontal"></div>
                        <div class="vertical"></div>
                    </div>
                </a>
                <div class="collapse show" id="collapse_ft_1">
                    <ul class="links">
                        <li><a href="<?php echo url('home/about'); ?>">About</a></li>
                        <li><a href="<?php echo url('home/terms_and_conditions'); ?>">Terms and conditions</a></li>
                        <li><a href="<?php echo url('home/privacy_policy'); ?>">Privacy policy</a></li>
                        <li><a href="<?php echo url('home/faq'); ?>">FAQ</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <a data-toggle="collapse" data-target="#collapse_ft_2" aria-expanded="false" aria-controls="collapse_ft_2" class="collapse_bt_mobile">
                    <h3>Categories</h3>
                    <div class="circle-plus closed">
                        <div class="horizontal"></div>
                        <div class="vertical"></div>
                    </div>
                </a>
                <div class="collapse show" id="collapse_ft_2">
                    <ul class="links" id="footer_category">

                        <?php
                        $categories=\App\Category::paginate(6);
                        $all_categories=\App\Category::all();
                        $settings=\App\Setting::all()->keyBy('type');
                        foreach ($categories as $key => $category):?>
                        <li><a href="<?php echo url('home/filter_listings?category='.Illuminate\Support\Str::of($category['name'])->slug('-').'&&amenity=&&video=0&&status=all'); ?>"><?php echo $category['name']; ?></a></li>
                        <?php endforeach; ?>
                        <div id="loader" style="display: none; opacity: .5;"><img src="<?php echo asset('frontend/images/loader.gif'); ?>" width="25"></div>
                        <?php if(count($all_categories) > 6): ?>
                        <a href="javascript: void(0)" onclick="more_category()">View all categories</a>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <a data-toggle="collapse" data-target="#collapse_ft_3" aria-expanded="false" aria-controls="collapse_ft_3" class="collapse_bt_mobile">
                    <h3>Contacts</h3>
                    <div class="circle-plus closed">
                        <div class="horizontal"></div>
                        <div class="vertical"></div>
                    </div>
                </a>
                <div class="collapse show" id="collapse_ft_3">
                    <ul class="contacts">
                        <li><i class="ti-home"></i><?php echo $settings['address']->description; ?></li>
                        <li><i class="ti-headphone-alt"></i><?php echo $settings['phone']->description; ?></li>
                        <li><i class="ti-email"></i><a href="#0"><?php echo $settings['system_email']->description; ?></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="social-links">
                    <h5>Follow us</h5>
                    <ul>

                        <li><a href="<?php echo $settings['facebook']->description; ?>"><i class="ti-facebook"></i></a></li>
                        <li><a href="<?php echo $settings['twitter']->description; ?>"><i class="ti-twitter-alt"></i></a></li>
                        <li><a href="<?php echo $settings['google']->description; ?>"><i class="ti-google"></i></a></li>
                        <li><a href="<?php echo $settings['pinterest']->description; ?>"><i class="ti-pinterest"></i></a></li>
                        <li><a href="<?php echo $settings['instagram']->description; ?>"><i class="ti-instagram"></i></a></li>
                        <li><a href="<?php echo $settings['linkedin']->description; ?>"><i class="ti-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /row-->
        <hr>
        <div class="row justify-content-end">
            <div class="col-lg-6">
                <ul id="additional_links">
                    <li><a href="<?php echo url('home/about'); ?>">About</a></li>
                    <li><a href="<?php echo url('home/terms_and_conditions'); ?>">Terms and conditions</a></li>
                    <li><a href="<?php echo url('home/privacy_policy'); ?>">Privacy policy</a></li>
                    <li><a href="<?php echo url('home/faq'); ?>">FAQ</a></li>
                    <li><a href="<?php echo $settings['footer_link']->description; ?>"><?php echo $settings['footer_text']->description; ?></a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!--/footer-->

<script>
    function more_category(){
        $.ajax({
            url: "<?php echo url('home/footer_more_category/'); ?>",
            success: function(response){
                $('#loader').show();
                setInterval(function(){
                    $('#loader').hide();
                    $('#footer_category').html(response);
                },1000);

            }
        });
    }
</script>
