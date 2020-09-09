<section class="hero_single version_2" style="background: #222 url(<?php echo asset('uploads/system/home_banner.jpg'); ?>) center center no-repeat; background-size: cover;">
    <div class="wrapper">
        <div class="container">
            <h3>{{\App\FrontendSetting::all()->keyBy('type')['banner_title']->description}}</h3>
            <p>{{\App\FrontendSetting::all()->keyBy('type')['slogan']->description}}</p>
            <form action="<?php echo route('home.search'); ?>" method="get">
                <div class="row no-gutters custom-search-input-2">
                    <div class="col-lg-7">
                        <div class="form-group">
                            <input class="form-control" type="text" name="search_string" placeholder="What are you looking for...">
                            <i class="icon_search"></i>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <select class="wide" name="selected_category_id">
                            <option value="">All Categories</option>
                            <?php
//                            $categories = $this->crud_model->get_categories()->result_array();
                            foreach ($categories as $category):?>
                            <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-lg-2">
                        <input type="submit" value="Search">
                    </div>
                </div>
                <!-- /row -->
            </form>
        </div>
    </div>
</section>
<!-- /hero_single -->

<div class="bg_color_1">
    <div class="container margin_80_55">
        <div class="main_title_2">
            <span><em></em></span>
            <h2>Popular Categories</h2>
            <p>The popular categories are progressively below.</p>
        </div>
        <div class="row" id="home_category">
            <!-- Single Item of popular category starts -->
            <?php
            $categories = \App\Category::where('parent', '=', 0)->paginate(9);
            foreach ($categories as $key => $category):?>
            <div class="col-lg-4 col-md-6">
                <a href="<?php echo url('home/filter_listings?category='.Illuminate\Support\Str::of($category['name'])->slug('-').'&&amenity=&&video=0&&status=all'); ?>" class="grid_item">
                    <figure>
                        <img src="<?php echo asset('uploads/category_thumbnails/').$category['thumbnail'];?>" alt="">
                        <div class="info">
                            <small><?php echo count(App\Category::find($category['id'])->listings); ?>Listings</small>
                            <h3><?php echo $category['name']; ?></h3>
                        </div>
                    </figure>
                </a>
            </div>
            <?php endforeach; ?>
            <div class="col-12 text-center" id="home_category_loader" style="display: none; opacity: .5;">
                <img src="<?php echo asset('frontend/images/loader.gif'); ?>" width="50">
            </div>
            <!-- Single Item of popular category ends -->
            <?php $category_array_count = count(App\Category::where('parent','=',0)->get()); ?>
            <?php if($category_array_count > 9): ?>
            <div class="col-12">
                <a href="javascript: void(0)" class="float-right btn_1 rounded" onclick="home_categories()">View all</a>
            </div>
            <?php endif; ?>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /bg_color_1 -->

<div class="container-fluid margin_80_55">
    <div class="main_title_2">
        <span><em></em></span>
        <h2>Popular listings</h2>
    </div>

    <div id="reccomended" class="owl-carousel owl-theme">
        <?php // $listing_number = 0; ?>
<!--        --><?php //$listings = $this->frontend_model->get_top_ten_listings();



        // foreach ($listings as $key => $listing):
        // 	$package_id = has_package($listing['user_id']);
        // 	$total_listing = $this->db->get_where('package_purchased_history', array('id', $package_id))->row('number_of_listings');

        // 	$listings_2 = $this->db->get_where('listing', array('user_id' => $listing['user_id']));
        // 	foreach($listings_2 as $listing_2){
        // 		$listing_number++;
        // 		if($listing_number < $total_listing || $listing_number == $total_listing){
        // 			echo 'show, ';
        // 		}
        // 	}
        // endforeach;


        foreach ($listings as $key => $listing): ?>
        <div class="item">
            <div class="strip grid">
                <figure>

                    <!--redirect to routs file-->
                    <a href="<?php echo route('listings.show',$listing['id']); ?>"><img src="<?php echo asset('uploads/listing_thumbnails/'.$listing['listing_thumbnail']); ?>" class="img-fluid" alt="" width="400" height="266"><div class="read_more"><span>Read more</span></div></a>
                    <small><?php echo $listing['listing_type'] == "" ? ('general')  : $listing['listing_type'] ; ?></small>
                </figure>
                <div class="wrapper">
                    <h3>
                        <a href="<?php echo route('listings.show',$listing['id']); ?>" class="float-left"><?php echo $listing['name']; ?></a>
                        <?php $claiming_status = App\ClaimedListing::all()->keyBy('listing_id')[$listing['id']]->status; ?>
                        <?php if($claiming_status == 1): ?>
                        <img class="float-left ml-1" data-toggle="tooltip" title="This listing is verified" src="<?php echo asset('frontend/images/verified.png'); ?>" style="width: 25px;">
                        <?php endif; ?>
                    </h3>
                    <br>
                    <p class="mt-1"><?php echo substr($listing['description'], 0, 100) . '...'; ?>.</p>
                    <a class="address" href="http://maps.google.com/maps?q=<?php echo $listing['latitude']; ?>,<?php echo $listing['longitude']; ?>" target="_blank">Get Directions</a>
                </div>
                <ul>
                <!-- <li><span class="loc_open"><?php echo $listing->time; ?></span></li> -->
                    <li><span class="<?php echo ($listing->time) == 'closed' ? 'loc_closed' : 'loc_open'; ?>"><?php echo $listing->time; ?></span></li>
                    <li><div class="score"><span>
						<?php
                                if ($listing->reviews()->exists()) {
                                    $quality = $listing->reviews;
                                    echo $quality;
                                }else {
                                    echo 'Unreviewed';
                                }
                                ?>
						<em><?php echo count($listing->reviews).' '.'Reviews'; ?></em></span><strong>{{$listing->reviews}}); ?></strong></div></li>
                </ul>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <!-- /carousel -->
    <div class="container">
        <div class="btn_home_align"><a href="<?php echo url('home/listings'); ?>" class="btn_1 rounded">View All</a></div>
    </div>
    <!-- /container -->
</div>
<!-- /container -->


<!-- /container -->

<script>
    function home_categories(limitation){
        $.ajax({
            url: "<?php echo url('home/home_categories/'); ?>",
            success: function(response){
                $('#home_category_loader').show();
                setInterval(function(){
                    $('#home_category_loader').hide();
                    $('#home_category').html(response);
                },1500);

            }
        });
    }
</script>
