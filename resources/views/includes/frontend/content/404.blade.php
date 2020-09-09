<div id="error_page">
    <div class="wrapper">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-xl-7 col-lg-9">
                    <h2>404 <i class="icon_error-triangle_alt"></i></h2>
                    <p><?php echo 'We are sorry'.', '.'But the page you are looking for does not exist'); ?></p>
                    <form action="<?php echo url('home/search'); ?>" method="get">
                        <div class="search_bar_error">
                            <input type="text" class="form-control" name="search_string" placeholder="What are you looking for ?" >
                            <input type="submit" value="Search">
                            <input type="hidden" name="selected_category_id" value="">
                        </div>
                    </form>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /wrapper -->
</div>
