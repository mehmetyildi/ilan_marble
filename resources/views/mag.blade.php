@extends('layout')


@section('content')

	<section class="anySection">
		<div class="mainContainer">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
						<div class=" leftSidebar">
							<h3>E-MARBLE</h3>
							<div class="headBorder"></div>
							@include('includes.sideNav')
						</div>
						<br>
					</div>
					<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
						<div class="row">
						@foreach($mags as $mag)
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
							{{ HTML::image($mag->image_path, $mag->{'title_'.$l}, ['class' => 'img-responsive', 'title' => $mag->{'title_'.$l}]) }}
							<br>
							<h3 style="margin-top:0; margin-bottom:10px;">{{ $mag->{'title_'.$l} }}</h3>
								<a class="btn btn-sm btn-primary eventLink" href="{{ $mag->url }}" target="_blank">{{ trans('layout.readMore') }}</a>
								<hr>		
							</div>
						@endforeach
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	 
@stop

