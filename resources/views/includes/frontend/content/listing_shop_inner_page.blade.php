<?php $products = $listing_details->product_details; ?>
<h5>Featured products</h5>
<div class="row">
    <?php foreach ($products as $product): ?>
    <div class="col-lg-6 col-md-12">
        <ul class="menu_list">
            <li>
                <div class="thumb">
                    <img src="<?php echo asset('uploads/product_images/'.$product['photo']); ?>" alt="" style="height: 88px; width: 88px;">
                </div>
                <h6><?php echo $product['name']; ?> <span><?php echo App\Setting::all()->keyBy('type')['system_currency']->description." ".$product['price']; ?> </span></h6>
                <p>
                    <?php echo str_replace(',', ' / ', $product['variant']); ?>
                </p>
            </li>
        </ul>
    </div>
    <?php endforeach; ?>
</div>
