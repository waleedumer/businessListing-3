<div class="price">
    <span class="contact">Book a room</span>
    <div class="score"><span><?php echo isset($quality) ? $quality : 'Unreviewed'; ?><em><?php echo count($reviews).' '.'Reviews'; ?></em></span><strong><?php echo $rating; ?></strong></div>
</div>

<div class="form-group" id="input-dates">
    <input class="form-control date-range-picker" type="text" name="dates" placeholder="When.." autocomplete="off" required>
    <i class="icon_calendar"></i>
</div>

<div class="panel-dropdown">
    <a href="#">Guests <span class="qtyTotal">1</span></a>
    <div class="panel-dropdown-content right">
        <div class="qtyButtons">
            <label>Adults</label>
            <input type="text" name="qtyInput" id = "adult_guests" value="1">
        </div>
        <input type="hidden" name="adult_guests_for_booking" id = 'adult_guests_for_booking' value="0">
        <div class="qtyButtons">
            <label>Children</label>
            <input type="text" name="qtyInput" id ="child_guests" value="0">
        </div>
        <input type="hidden" name="child_guests_for_booking" id = "child_guests_for_booking" value="0">
    </div>
</div>

<div class="form-group clearfix">
    <div class="custom-select-form">
        <select class="wide" name="room_type" required>
            <option value="">Room type</option>
            <?php
            $hotel_rooms = $listing_details->hotel_room_specifications;
            foreach ($hotel_rooms as $key => $hotel_room): ?>
            <option value="<?php echo $hotel_room['name']; ?>"><?php echo $hotel_room['name']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
</div>
