<!-- Favicons-->
<link rel="shortcut icon" href="<?php echo asset('global/favicon.png');?>" type="image/x-icon">

<link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
<link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
<link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
<link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">

<!-- font awesome 5 -->
<link href="<?php echo asset('backend/css/fontawesome-all.min.css') ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo asset('backend/css/font-awesome-icon-picker/fontawesome-iconpicker.min.css') ?>" rel="stylesheet" type="text/css" />

<!-- GOOGLE WEB FONT -->
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

<!-- BASE CSS -->
<link href="<?php echo asset('frontend/css/bootstrap.min.css');?>" rel="stylesheet">
<link href="<?php echo asset('frontend/css/style.css');?>" rel="stylesheet">
<link href="<?php echo asset('frontend/css/vendors.css');?>" rel="stylesheet">
<link href="<?php echo asset('frontend/css/tables.css');?>" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css">

<!--MAPS Leaflet css cdn-->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin=""/>
<!-- <script src="https://api.mapbox.com/mapbox-gl-js/v1.10.0/mapbox-gl.js"></script>
<link href="https://api.mapbox.com/mapbox-gl-js/v1.10.0/mapbox-gl.css" rel="stylesheet" /> -->


<!-- Toastr -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

<!-- SPECIFIC CSS -->
<link href="<?php echo asset('frontend/css/blog.css"');?> rel="stylesheet">

<!-- Timepicker custom css -->
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

<!-- YOUR CUSTOM CSS -->
<link href="<?php echo asset('frontend/css/custom.css');?>" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.9/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- <link rel="stylesheet" href="{{asset('backend/css/neon-core.css')}}" type="text/css"> -->
<!-- <link rel="stylesheet" href="{{asset('backend/css/neon-theme.css')}}" type="text/css"> -->
<!-- <link rel="stylesheet" href="{{asset('backend/css/neon-forms.css')}}" type="text/css"> -->

<!-- The leaflet js CDN -->
<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
        integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
        crossorigin=""></script>

<!-- Timepicker js -->
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<style>
        .fileinput {
  margin-bottom: 9px;
  display: inline-block;
}
.fileinput .uneditable-input {
  display: inline-block;
  margin-bottom: 0px;
  vertical-align: middle;
  cursor: text;
}
.fileinput i + .fileinput-filename,
.fileinput .btn + .fileinput-filename {
  padding-left: 5px;
}
.fileinput.fileinput-exists .close {
  opacity: 1;
  color: #dee0e4;
  position: relative;
  top: 3px;
  margin-left: 5px;
}
.fileinput .thumbnail {
  overflow: hidden;
  display: inline-block;
  margin-bottom: 5px;
  vertical-align: middle;
  text-align: center;
}
.fileinput .thumbnail[data-trigger="fileinput"] {
  cursor: pointer;
}
.fileinput .thumbnail:before,
.fileinput .thumbnail:after {
  content: " ";
  /* 1 */
  display: table;
  /* 2 */
}
.fileinput .thumbnail:after {
  clear: both;
}
.fileinput .thumbnail > img {
  max-height: 100%;
  display: block;
}
.fileinput .btn {
  vertical-align: middle;
}
.fileinput-exists .fileinput-new,
.fileinput-new .fileinput-exists {
  display: none;
}
.fileinput-inline .fileinput-controls {
  display: inline;
}
.fileinput .uneditable-input {
  white-space: normal;
}
.fileinput-new .input-group .btn-file {
  border-radius: 0 3px 3px 0;
}
.fileinput-new .input-group .btn-file.btn-xs,
.fileinput-new .input-group .btn-file.btn-sm {
  border-radius: 0 2px 2px 0;
}
.fileinput-new .input-group .btn-file.btn-lg {
  border-radius: 0 3px 3px 0;
}
.form-group.has-warning .fileinput .uneditable-input {
  color: #574802;
  border-color: #ffd78a;
}
.form-group.has-warning .fileinput .fileinput-preview {
  color: #574802;
}
.form-group.has-warning .fileinput .thumbnail {
  border-color: #ffd78a;
}
.form-group.has-error .fileinput .uneditable-input {
  color: #ac1818;
  border-color: #ffafbd;
}
.form-group.has-error .fileinput .fileinput-preview {
  color: #ac1818;
}
.form-group.has-error .fileinput .thumbnail {
  border-color: #ffafbd;
}
.form-group.has-success .fileinput .uneditable-input {
  color: #045702;
  border-color: #b4e8a8;
}
.form-group.has-success .fileinput .fileinput-preview {
  color: #045702;
}
.form-group.has-success .fileinput .thumbnail {
  border-color: #b4e8a8;
}
.input-group-addon:not(:first-child) {
  border-left: 0;
}
.fileinput .uneditable-input,
.fileinput-new .input-group .btn-file {
  display: table-cell !important;
}

.col-sm-2e {
    position: absolute;
    top: 0;
    right: 0px;
}

.col-sm-2e .btn {
    border-radius: 20px;
}

div#photos_area {
    width: 100%;
}

.btn-orange {
  color: #ffffff;
  background-color: #ff9600;
  border-color: #ff9600;
}

.btn-white {
  color: #303641;
  background-color: #ffffff;
  border-color: #ffffff;
  border-color: #ebebeb;
}
.btn-white:hover,
.btn-white:focus,
.btn-white:active,
.btn-white.active,
.open .dropdown-toggle.btn-white {
  color: #303641;
  background-color: #ebebeb;
  border-color: #e0e0e0;
}
</style>