@include('layouts.header') <!-- load file header-->

	<body class="no-skin">
		<div id="navbar" class="navbar navbar-default          ace-save-state">
			@include('layouts.top')
		</div>

		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar responsive ace-save-state">
                @include('layouts.navbar')  <!-- load file navbar-->
			</div>

			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="#">Home</a>
                            </li>
                            @yield('breadcrumb')    <!-- load section breadcrumb-->
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">

						<div class="page-header">
                            @yield('content-title')     <!-- load section content-title-->
                        </div><!-- /.page-header -->

                            @yield('content-body')      <!-- load section content-body-->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

            @include('layouts.footer')      <!-- load file footer-->
			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

@include('layouts.bottom')      <!-- load file bottom-->
