<!DOCTYPE html>
<html lang="en">
<head>

    <title>{{$page_data['page_title'] ?? '' }}| {{$website_title ?? ''}}</title>
    <!-- all the meta tags -->
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="" name="description" />
    <meta content="" name="author" />
<!-- all the css files -->
    @include('includes.admin-dashboard.dashboard-top')

</head>
<body class="page-body" >
<div class="page-container">
    <!-- SIDEBAR -->
    @if(strtolower(auth()->user()->role['name'])=='admin')
        @include('layouts.dashboard-sidebar')
    @elseif(strtolower(auth()->user()->role['name'])=='user')
        @include('includes.admin-dashboard.user-dashboard.navigation');
    @endif
    <div class="main-content">

        <!-- Topbar Start -->
        @include('layouts.dashboard-header')

        <h3 style="margin:20px 0px;" class="hidden-print">
            <i class="entypo-right-circled"></i>
            {{$page_data['page_title']??''}}
        </h3>

        <!-- Start Content-->
        @if(strtolower(auth()->user()->role['name'])=='admin')
            @include('includes.admin-dashboard.content.'.$page_data['page_name'])
        @elseif(strtolower(auth()->user()->role['name'])=='user')
            @include('includes.admin-dashboard.user-dashboard.'.$page_data['page_name']);
        @endif
    <!-- Footer starts here -->
{{--        @include('includes.footer')--}}
    </div>
</div>
<!-- all the js files -->
@include('includes.admin-dashboard.dashboard-bottom')
@include('includes.admin-dashboard.modal')
@include('includes.admin-dashboard.dashboard-common-scripts')

</body>
</html>


