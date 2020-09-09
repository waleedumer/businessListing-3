<link rel="shortcut icon" href="<?php echo asset('global/favicon.png');?>">
<!-- Neon theme css -->
<link rel="stylesheet" href="<?php echo asset('backend/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css');?>" type="text/css">
<link rel="stylesheet" href="<?php echo asset('backend/css/font-icons/entypo/css/entypo.css');?>" type="text/css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600" type="text/css">
<link rel="stylesheet" href="{{asset('backend/css/bootstrap.css')}}" type="text/css">
<link rel="stylesheet" href="{{asset('backend/css/neon-core.css')}}" type="text/css">
<link rel="stylesheet" href="{{asset('backend/css/neon-theme.css')}}" type="text/css">
<link rel="stylesheet" href="{{asset('backend/css/neon-forms.css')}}" type="text/css">
<link rel="stylesheet" href="{{asset('backend/css/custom.css')}}" type="text/css">
<link rel="stylesheet" href="{{asset('backend/js/vertical-timeline/css/component.css')}}" type="text/css">
<link rel="stylesheet" href="{{asset('backend/js/datatable/css/dataTables.bootstrap.css')}}" type="text/css"/>
<link rel="stylesheet" href="{{asset('backend/js/datatable/buttons/css/buttons.bootstrap.css')}}" type="text/css"/>
<link rel="stylesheet" href="{{asset('backend/js/wysihtml5/bootstrap-wysihtml5.css')}}" type="text/css">
<link rel="stylesheet" href="{{asset('backend/js/dropzone/dropzone.css')}}" type="text/css">
<link rel="stylesheet" href="{{asset('backend/js/daterangepicker/daterangepicker-bs3.css')}}" type="text/css">
<!-- font awesome 5 -->
<link href="<?php echo asset('backend/css/fontawesome-all.min.css') ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo asset('backend/css/font-awesome-icon-picker/fontawesome-iconpicker.min.css') ?>" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css">
<link href="<?php echo asset('backend/css/main.css') ?>" rel="stylesheet" type="text/css" />
<!-- RTL Theme -->
<?php if ($text_align ?? '' == 'right-to-left') : ?>
    <link rel="stylesheet" href="<?php echo asset('assets/backend/css/neon-rtl.css');?>">
<?php endif; ?>
<script src="<?php echo asset('backend/js/jquery-2.2.4.min.js'); ?>" charset="utf-8"></script>
<!-- AM Chart resources -->
<script src="https://www.amcharts.com/lib/4/core.js"></script>
<script src="https://www.amcharts.com/lib/4/charts.js"></script>
<script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>
