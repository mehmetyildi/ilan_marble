@extends('layout')


@section('content')

	<section class="anySection">
		<div class="mainContainer">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
						{{ Html::image('/img/aboutvisionmission2.jpg', 'Vizyon Misyon', array('class' => 'img-responsive fullWidth hidden-xs')) }}
					</div>
					<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 adjustHeader">
						<h3 style="margin-top: 0;">{{ trans('layout.aboutVisionMission') }}</h3>
						<div class="headBorder"></div>
						{!! $aboutVision->{'description_'.$l} !!}
					</div>
				</div>
			</div>
		</div>
	</section>
@stop