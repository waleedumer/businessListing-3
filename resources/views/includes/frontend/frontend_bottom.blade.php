<!-- COMMON SCRIPTS -->
<script src="<?php echo asset('frontend/js/common_scripts.js');?>"></script>
<script src="<?php echo asset('frontend/js/functions.js');?>"></script>
<script src="<?php echo asset('frontend/js/validate.js');?>"></script>
<script src="<?php echo asset('frontend/js/bootstrap-tagsinput.min.jsasset');?>" charset="utf-8"></script>
<!-- INPUT QUANTITY  -->
<script src="<?php echo asset('frontend/js/input_qty.js');?>"></script>
<script src="<?php echo asset('frontend/js/custom.js');?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script src="<?php echo asset('frontend/js/markerclusterer.js');?>"></script>
<script src="<?php echo asset('frontend/js/listing_map.js');?>"></script>
<script src="<?php echo asset('frontend/js/infobox.js');?>"></script>
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<script src="<?php echo asset('backend/js/fileinput.js');?>"></script>

<!--cookie modal-->

<!-- SHOW TOASTR NOTIFIVATION -->
{{--<?php if ($this->session->flashdata('flash_message') != ""):?>--}}

{{--<script type="text/javascript">--}}
{{--    toastr.success('<?php echo $this->session->flashdata("flash_message");?>');--}}
{{--</script>--}}

{{--<?php endif;?>--}}

{{--<?php if ($this->session->flashdata('error_message') != ""):?>--}}

{{--<script type="text/javascript">--}}
{{--    toastr.error('<?php echo $this->session->flashdata("error_message");?>');--}}
{{--</script>--}}
{{--<?php endif;?>--}}


<script type="text/javascript">
    $(function() {
        $('.date-range-picker').daterangepicker({
            autoUpdateInput: false,
            parentEl:'#input-dates',
            opens: 'left',
            locale: {
                cancelLabel: 'Clear'
            }
        });
        $('.date-range-picker').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('MM-DD-YY') + ' > ' + picker.endDate.format('MM-DD-YY'));
        });
        $('.date-range-picker').on('cancel.daterangepicker', function(ev, picker) {
            $(this).val('');
        });
    });

    $('.date-picker').daterangepicker({
        "singleDatePicker": true,
        "parentEl": '#input-dates',
        "opens": "left"
    }, function(start, end, label) {
        console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')');
    });

    function loginAlert() {
        toastr.error('You will need to login first');
    }
</script>
<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
@stack('custom-script')
