<div class="price">
    <h5 class="d-inline">Appointment</h5>
    <div class="score"><span><?php echo isset($quality) ? $quality : 'Unreviewed'; ?><em><?php echo count($reviews).' '.'Reviews'; ?></em></span><strong><?php echo $rating; ?></strong></div>
</div>

<div class="form-group" id="input-dates">
    <input class="form-control date-picker" type="text" name="dates" placeholder="When.." required>
    <i class="icon_calendar"></i>
</div>

<div class="form-group">
    <select class="form-control" name="service" id="service" onchange="checkTime()" required>
        <option value="">Select a service</option>
        <?php
        $services = $listing->beauty_services;
        foreach($services as $service){
        $times = explode(',', $service['service_times']);
        $time_from = strtotime($times[0].":00");
        $time_to   = strtotime($times[1].":00");
        ?>
        <option value="<?php echo $service['id']; ?>">
            <?php echo $service['name']; ?>
            <?php echo '('.date('h:i A', $time_from).' - '.date('h:i A', $time_to).')'; ?>
        </option>
        <?php } ?>
    </select>
</div>

<div class="form-group">
    <input id="timepicker" onchange="checkTime()" class="" name="time" placeholder="00:00" width="100%" autocomplete="off" required>
    <script>
        $('#timepicker').timepicker({
            uiLibrary: 'bootstrap4'
        });
    </script>
</div>

<div class="form-group">
    <textarea name="note" class="form-control" placeholder="Note" style="height: 80px;" required></textarea>
</div>

<script>
    $('document').ready(function(){
        $('#service').show();

        $("#timepicker").focus(function(){
            $('.input-group-append').click();
        });
    });

    function checkTime(){
        var booking_time = $('#timepicker').val();
        var service_id = $('#service').val();
        if(service_id != "" && booking_time != ""){
            $.ajax({
                url: "<?php echo url('home/beauty_service_time/'); ?>"+service_id+"/"+booking_time,
                success: function(response){
                    if(response != 1){
                        $('#timepicker').val('');
                        toastr.error('The time must be between opening and closing time.');
                    }
                }
            });
        }
    }
</script>
