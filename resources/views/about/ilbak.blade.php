@extends('layout')


@section('content')

	<section class="anySection">
		<div class="mainContainer">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
						{{ Html::image('/img/aboutilbak2.jpg', 'İlbak Holding', array('class' => 'img-responsive fullWidth')) }}
						<br>
						{{ Html::image('/img/ilbaklogo.png', 'İlbak Holding', array('class' => 'img-responsive fullWidth centeredImage hidden-xs', 'style' => 'width:60%')) }}
					</div>
					<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 colorLinkContainer adjustHeader">
						<h3 style="margin-top: 0;">{{ trans('layout.aboutIlbak') }}</h3>
						<div class="headBorder"></div>
						{!! $aboutIlbak->{'description_'.$l} !!}
						{{ Html::image('/img/ilbaklogo.png', 'İlbak Holding', array('class' => 'img-responsive fullWidth hidden-lg hidden-md hidden-sm')) }}
					</div>
				</div>
			</div>
		</div>
	</section>
@stop