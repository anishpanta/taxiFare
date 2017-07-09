<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Admin - Dashboard</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">

<!--Icons-->
<script src="js/lumino.glyphs.js"></script>

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><span></span>Admin</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="/logout"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Logout </a>
					
					</li>
				</ul>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		
		<ul class="nav menu">
			<li class="active"><a href="/admin"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
		</ul>

	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Change Fare Rate</h1>
				@if(Session::has('success'))
	                <div class="alert alert-success">
	                    {!! Session::get('success') !!}
	                </div>
                @endif
			</div>

		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="col-md-6">
							<form role="form" method="post">
                        	<input type="hidden" name="_token" value="{{ csrf_token() }}" />
							
								<div class="form-group">
									<label>0 to 5 Miles</label>
									<input class="form-control" name="upto5" value="{{$farerate->upto5}}">
								</div>

								<div class="form-group">
									<label>5 to 15 Miles</label>
									<input class="form-control" name="fiveto15" value="{{$farerate->fiveto15}}">
								</div>

								<div class="form-group">
									<label>15 to 100 Miles</label>
									<input class="form-control" name="fifteento100" value="{{$farerate->fifteento100}}">
								</div>

								<div class="form-group">
									<label>More than 100 Miles</label>
									<input class="form-control" name="above100" value="{{$farerate->above100}}">
								</div>

								<div class="form-group">
									<label>Airport Pickup</label>
									<input class="form-control" name="pickup" value="{{$farerate->pickup}}">
								</div>
				
								<button type="submit" class="btn btn-primary">Change Fare Rates</button>

							</form>
							</div>
							</div>
						</form>
					</div>
				</div>
			</div><!-- /.col-->
		
								
	</div>

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script>
		$('#calendar').datepicker({
		});

		!function ($) {
		    $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
		        $(this).find('em:first').toggleClass("glyphicon-minus");      
		    }); 
		    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	
</body>

</html>
