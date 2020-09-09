<div class="container margin_60_35">
    <div class="row">

        @if( $blog_detail_page ?? ''== 1)
            @include('includes.frontend.content.blog_detail_page')
        @else
            @include('includes.frontend.content.blog_main_page')
        @endif

        <aside class="col-lg-3">
            <div class="widget search_blog">
                <label>Title, Description, Category</label>
                <div class="form-group">
                    <input type="text" name="search" value="<?php if($searching_value ?? '' != ''){ echo $searching_value ?? ''; } ?>" id="searching_key" class="form-control" placeholder="Search..">
                    <span><input type="submit" id="blog_searching_btn" onclick="blog_search()" value="Search" style="cursor: pointer;"></span>
                </div>
            </div>
            <!-- /widget -->
            <div class="widget">
                <div class="widget-title">
                    <h4>Latest Post</h4>
                </div>
                <ul class="comments-list">
                    <?php foreach($latest_posts as $latest_post): ?>
                    @if($latest_post->status!=0)
                    <li>
                        <div class="alignleft">
                            <a href="<?php echo url('home/post/'.$latest_post['id'].'/'.Illuminate\Support\Str::of($latest_post['title'])->slug('-')); ?>">
                                <?php if(file_exists('uploads/blog_thumbnails/'.$latest_post['blog_thumbnail'])): ?>
                                <img src="<?php echo asset('uploads/blog_thumbnails/'.$latest_post['blog_thumbnail']); ?>" alt="...">
                                <?php else: ?>
                                <img src="<?php echo asset('uploads/blog_thumbnails/thumbnail.png'); ?>" alt="...">
                                <?php endif; ?>
                            </a>
                        </div>
                        <small>{{$latest_post->category['name']}} - <?php echo date('d M Y', $latest_post['added_date']); ?></small>
                        <h3>
                            <a href="<?php echo url('home/post/'.$latest_post['id'].'/'.Illuminate\Support\Str::of($latest_post['title'])->slug('-')); ?>">
                                <?php
                                $string = strip_tags($latest_post['blog_text']);
                                if (strlen($string) > 55) {

                                    // truncate string
                                    $stringCut = substr($string, 0, 55);
                                    $endPoint = strrpos($stringCut, ' ');

                                    //if the string doesn't contain any space then it will cut without word basis.
                                    $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                    $string .= '...';
                                }
                                echo $string;
                                ?>
                            </a>
                        </h3>
                        <!-- <small><i class="ti-comment pt-2"></i><span class="" style="">20</span></small> -->
                    </li>
                        @endif
                    <?php endforeach; ?>
                </ul>
            </div>
            <!-- /widget -->
            <div class="widget">
                <div class="widget-title">
                    <h4>Categories</h4>
                </div>
                <ul class="cats">
                    <?php
                    foreach ($blogs_categories as $blogs_category): ?>
{{--                    {{dd($blogs_category->status)}}--}}
                        @if($blogs_category->status!=0)
                    <li>
                        <?php $category_name = ($blogs_category->category['name']);?>
                        <a href="<?php echo url('home/blog/'.$blogs_category['category_id'].'?category='.Illuminate\Support\Str::of($category_name)->slug('-')); ?>" class="<?php if($category_name == 1) echo 'text-primary'; ?>">
                            <?php echo $category_name; ?>
                            <span>(<?php echo count($blogs_categories); ?>)</span>
                        </a>
                    </li>
                        @endif
                    <?php endforeach; ?>
                </ul>
            </div>
            <!-- /widget -->
            <!-- <div class="widget">
                <div class="widget-title">
                    <h4>Popular Tags</h4>
                </div>
                <div class="tags">
                    <a href="#">Food</a>
                    <a href="#">Bars</a>
                    <a href="#">Cooktails</a>
                    <a href="#">Shops</a>
                    <a href="#">Best Offers</a>
                    <a href="#">Transports</a>
                    <a href="#">Restaurants</a>
                </div>
            </div> -->
            <!-- /widget -->
        </aside>
        <!-- /aside -->
    </div>
    <!-- /row -->
</div>
<!-- /container -->

<script>
    function blog_search(){
        var searching_value = $('#searching_key').val();
        if(searching_value != ''){
            location.replace("<?php echo url('home/blog?search='); ?>"+searching_value);
        }else{
            location.replace("<?php echo url('home/blog'); ?>");
        }
    }


    // Get the input field
    var input = document.getElementById("searching_key");

    // Execute a function when the user releases a key on the keyboard
    input.addEventListener("keyup", function(event) {
        // Number 13 is the "Enter" key on the keyboard
        if (event.keyCode === 13) {
            // Cancel the default action, if needed
            event.preventDefault();
            // Trigger the button element with a click
            document.getElementById("blog_searching_btn").click();
        }
    });
</script>
