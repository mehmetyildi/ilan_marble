<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]> <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]> <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>İlan Marble</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width">
	<link rel="shortcut icon" href="{{ url('/img/favicon.ico') }}" type="image/x-icon" />

	<script src="https://use.fontawesome.com/46d6f17686.js"></script>
	<!-- <link href='https://fonts.googleapis.com/css?family=Hind:400,300,600&subset=latin-ext,latin' rel='stylesheet' type='text/css'> -->
	<!-- <link href='https://fonts.googleapis.com/css?family=Quattrocento:400,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'> -->
	<!-- <link href='https://fonts.googleapis.com/css?family=Hind:400,300,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'> -->
	<link href='https://fonts.googleapis.com/css?family=Oswald:400,300,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>



	{!! app('html')->style('/css/bootstrap.min.css') !!}
	{!! app('html')->style('/css/style_abc.css') !!}
	{!! app('html')->style('/css/component.css') !!}
	{!! app('html')->style('/css/basics/additional.css') !!}


	@yield('styles')
</head>
<body>
	<div class="topbar" style="display: none;">
		<div class="mainContainer">
			<div class="container-fluid">
				<div class="rightAlign">
					<a class="langLink" href="https://www.facebook.com/ilanmarble/" target="_blank"><i class="fa fa-facebook-official"></i> Facebook</a>
					<a class="langLink" href="https://www.instagram.com/ilanmarble/?hl=tr" target="_blank"><i class="fa fa-instagram"></i> Instagram</a>
					<a class="langLink" >|</a>
					<a class="langLink" href="{{ url('/tr') }}">TR</a>
					<a class="langLink" href="{{ url('/en') }}">ENG</a>
					
				</div>
			</div>
		</div>
	</div>
	@include('includes/nav-new')
	@include('includes/phonenav')
	@yield('content')


	<footer>
		<div class="footer">
			<div class="mainContainer">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-7 col-md-7 col-sm-7 col-xs-12 colNo">
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 footerBorderRight">
								<h3>{{ trans('layout.corporate') }}</h3>
								<a href="{{ route('ilbak') }}">{{ trans('layout.corporate1') }}</a>
								<a href="{{ route('ilanmarble') }}">{{ trans('layout.corporate2') }}</a>
								<a href="{{ route('visionmission') }}">{{ trans('layout.corporate3') }}</a>
								<a href="{{ route('events') }}">{{ trans('layout.eventsLower') }}</a>
								<a target="_blank" href="http://www.kariyer.net/ilbak-holding-a-s-is-ilanlari-c15826-p6390/?a=2">{{ trans('layout.corporate4') }}</a>
							</div>
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 footerBorderRight">
								<h3><a href="{{ route('marbles') }}">{{ trans('layout.collection') }}</a></h3>
								@foreach($layoutMarbles as $layoutMarble)
								<a href="{{ route('marbleDetail', ['url' => $layoutMarble->{'url_'.$l}]) }}">{{ $layoutMarble->{'title_'.$l} }}</a>
								@endforeach
							</div>
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 footerBorderRight">
								<h3><a href="{{ route('quarries') }}">{{ trans('layout.quarries') }}</a></h3>
								<h3 style="margin-top: 0;"><a href="{{ route('mags') }}">E-MARBLE</a></h3>
								<h3 style="margin-top: 0;"><a href="{{ route('contact') }}">{{ trans('layout.contact') }}</a></h3>
								<a href="{{ route('contact') }}">{{ trans('layout.address') }}</a>
								<a href="{{ route('contact') }}">{{ trans('layout.writeUs') }}</a>
								<h4><a href="https://www.facebook.com/ilanmarble/" target="_blank"><img style="vertical-align: top;" src="{{ url('/img/facebook.png') }}" width="20" alt=""> Facebook</a></h4>
								<h4><a href="https://www.instagram.com/ilanmarble/?hl=tr" target="_blank"><img style="vertical-align: top;" src="{{ url('/img/instagram.png') }}" width="20" alt=""> Instagram</a></h4>

							</div>
						</div>
						<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 colNo">
							<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 footerBorderRight">
								{{ Html::image('/img/footer_logo/nsi_memberlogo_v_rgb.jpg', 'İlan Marble', array('class' => 'img-responsive centeredImage', 'style' => 'max-width: 110px; margin-top:10px;')) }}
							</div>
							<div class="col-lg-7 col-md-7 col-sm-7 col-xs-12 footerBorderRight">
								{{ Html::image('/img/logo-new-footer.png', 'İlan Marble', array('class' => 'img-responsive pull-right', 'style' => 'margin-top:10px; max-width: 226px;')) }}

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="bottomLine">
			<div class="mainContainer">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 copyright">
							&copy; {{ trans('layout.copy') }}
						</div>
						<div class="col-lg-8 col-md-8 col-sm-6 col-xs-12 rightAlign">
							<a href="https://www.marble-institute.com/" target="_blank">{{ Html::image('/img/footer_logo/logo_nsi.jpg', null, ['style' => 'width:58px; margin-right:10px;']) }}</a>
							<a href="http://www.immib.org.tr" target="_blank">{{ Html::image('/img/immib_logo_.png', null, ['style' => 'width:112px;  margin-right:10px; background:#fff; padding:0 4px 4px;']) }}</a>
							<a href="http://www.imib.org.tr/en/" target="_blank">{{ Html::image('/img/footer_logo/imib-logo-tr.png', null, ['style' => 'width:84px;  margin-right:10px; background:#fff; padding:0 4px 4px;']) }}</a>

							<a href="http://www.ilbak.com.tr" target="_blank">{{ Html::image('/img/ilbak.png') }}</a>
						</div>
					</div>

				</div>
			</div>
		</div>

	</footer>

	<!-- Javascripts -->
	{{ Html::script('https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js') }}
	{{ Html::script('/js/lib/bootstrap.min.js') }}
	{{ Html::script('/js/main.js') }}
	{{ Html::script('/js/lib/component.js') }}
	@yield('scripts')
</body>
</html>

