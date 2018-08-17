@extends('layout')


@section('content')

	<section class="anySection">
		<div class="mainContainer">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
						{{ Html::image('/img/logo-new.png', 'İlan Marble', array('class' => 'img-responsive fullWidth hidden-xs')) }}
						<br>

						{{Html ::image('/img/aboutilanmarble2.jpg', 'İlan Marble', array('class' => 'img-responsive fullWidth hidden-xs')) }}
						<br>
					</div>
					<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 adjustHeader">
						<h3 style="margin-top: 0;">{{ trans('layout.aboutIlan') }}</h3>
						<div class="headBorder"></div>
						<!-- 16:9 aspect ratio -->
						<div class="embed-responsive embed-responsive-16by9">
						  <iframe class="embed-responsive-item" src="https://player.vimeo.com/video/256727604"></iframe>
						</div>
						<br>
						{!! $aboutIlan->{'description_'.$l} !!}
					</div>
				</div>
			</div>
		</div>
	</section>
@stop