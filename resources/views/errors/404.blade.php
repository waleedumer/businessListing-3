<link rel="stylesheet" href="{{asset('css/app.css')}}">
<link rel="stylesheet" href="{{asset('css/all.css')}}">
    <style type="text/css">

                          ::selection { background-color: #E13300; color: white; }
    ::-moz-selection { background-color: #E13300; color: white; }

    body {
        background-color: #fff;
        margin: 40px;
        font: 13px/20px normal Helvetica, Arial, sans-serif;
        color: #4F5155;
    }

    a {
        color: #003399;
        background-color: transparent;
        font-weight: normal;
    }

    h1 {
        color: #444;
        background-color: transparent;
        border-bottom: 1px solid #D0D0D0;
        font-size: 19px;
        font-weight: normal;
        margin: 0 0 14px 0;
        padding: 14px 15px 10px 15px;
    }

    code {
        font-family: Consolas, Monaco, Courier New, Courier, monospace;
        font-size: 12px;
        background-color: #f9f9f9;
        border: 1px solid #D0D0D0;
        color: #002166;
        display: block;
        margin: 14px 0 14px 0;
        padding: 12px 10px 12px 10px;
    }

    #container {
        margin: 10px;
        border: 1px solid #D0D0D0;
        box-shadow: 0 0 8px #D0D0D0;
    }

    p {
        margin: 12px 15px 12px 15px;
    }

</style>
<div id="error_page">
	<div class="wrapper">
		<div class="container">
			<div class="row justify-content-center text-center">
				<div class="col-xl-7 col-lg-9">
					<h2>404 <i class="icon_error-triangle_alt"></i></h2>
					<p>We are sorry, but the page you are looking for does not exist</p>
					<form action="{{url('home/search')}}" method="get">
						<div class="search_bar_error">
							<input type="text" class="form-control" name="search_string" placeholder="what are you looking for ?" >
							<input type="submit" value="search">
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
