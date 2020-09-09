<div id="hotel_room_specification_parent_div" style="display: none; padding-top: 10px;">
    <div id = "hotel_room_specification_div">
        <div class="hotel_room_specification_div">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="panel panel-primary" data-collapsed="0">
                        <div class="panel-body">
                            <h5 class="card-title mb-0">Hotel room specification</h5>
                            <div class="collapse show" style="padding-top: 10px;">
                                <div class="row no-margin">
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <label for="room_name">Room name</label>
                                            <input type="text" name="room_name[]" class="form-control" />
                                        </div>
                                        <div class="form-group">
                                            <label for="room_description">Room description</label>
                                            <textarea name="room_description[]" class="form-control" rows="5"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="room_price">Room price {{App\Setting::all()->keyBy('type')['system_currency']->description}} </label>
                                            <input type="text" name="room_price[]" class="form-control" />
                                        </div>

                                        <div class="form-group">
                                            <label for="hotel_room_amenities">Hotel room amenities <small>(Press Enter after entering every amenity)</small></label>
                                            <input type="text" class="form-control bootstrap-tag-input" name="hotel_room_amenities[]" data-role="tagsinput"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="wrapper-image-preview">
                                            <div class="box">
                                                <div class="js--image-preview"></div>
                                                <div class="upload-options">
                                                    <label for="room-image-1" class="btn"> <i class="entypo-camera"></i> Upload room image <small>(800 X 533)</small> </label>
                                                    <input id="room-image-1" style="visibility:hidden;" type="file" class="image-upload" name="room_image[]" accept="image/*">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- end card-->
            </div>
        </div>
    </div>
    <div class="row text-center">
        <button type="button" class="btn btn-primary" name="button" onclick="appendHotelRoomSpecification()"> <i class="mdi mdi-plus"></i> Add new room</button>
    </div>
</div>


<div id = "blank_hotel_room_specification_div">
    <div class="hotel_room_specification_div">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <div class="panel panel-primary" data-collapsed="0">
                    <div class="panel-body">
                        <h5 class="card-title mb-0">Hotel room specification
                            <button type="button" class="btn btn-danger btn-sm btn-rounded alignToTitleOnPreview" name="button" onclick="removeHotelRoomSpecification(this)">Remove this room</button>
                        </h5>
                        <div class="collapse show" style="padding-top: 10px;">
                            <div class="row no-margin">
                                <div class="col-lg-8">
                                    <div class="form-group">
                                        <label for="room_name">Room name</label>
                                        <input type="text" name="room_name[]" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label for="room_description">Room description</label>
                                        <textarea name="room_description[]" class="form-control" rows="5"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="room_price">Room price {{App\Setting::all()->keyBy('type')['system_currency']->description}}</label>
                                        <input type="text" name="room_price[]" class="form-control" />
                                    </div>

                                    <div class="form-group">
                                        <label for="amenities">Amenities<small>(Press Enter after entering every amenity)</small> </label>
                                        <input type="text" class="form-control bootstrap-tag-input" name="hotel_room_amenities[]" data-role="tagsinput"/>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="wrapper-image-preview">
                                        <div class="box">
                                            <div class="js--image-preview"></div>
                                            <div class="upload-options">
                                                <label for="room-image-1" class="btn"> <i class="entypo-camera"></i> Upload room image <small> (800 X 533) </small> </label>
                                                <input id="room-image-1" style="visibility:hidden;" type="file" class="image-upload" name="room_image[]" accept="image/*">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end card-->
        </div>
    </div>
</div>
