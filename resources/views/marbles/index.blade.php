@extends('layout')

@section('styles')
    {{ Html::style('/css/set2.css') }}
    
@stop
<?php 
    $version = rand(1,2);
?>
@section('content')
	
	<section class="anySection">
		<div class="mainContainer">
			<div class="container-fluid">
				<div class="row">	
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
						<div class=" leftSidebar">
							<h3>{{ trans('layout.collection') }}</h3>
							<div class="headBorder"></div>
							<ul>
								@foreach($marbles as $marble)
								<li><a href="{{ route('marbleDetail', ['url' => $marble->{'url_'.$l}]) }}">{{ $marble->{'title_'.$l} }}</a></li>
								@endforeach
							</ul>
							<hr style="width:90%; margin-left:0;">
							@include('includes.sideNav')
						</div>
						<br>
					</div>
					<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
						<!-- {{ trans('layout.marblesOpening') }} -->
						<div class="grid clearfix" style="padding:0;">
							@foreach($marbles as $marble)
							<figure class="effect-apollo" style="margin-top: 0; width:100%; max-width:1000px">
								{{ Html::image($marble->image_path, null, ['style' => 'width:100%;']) }}
								<figcaption>
									<h2><span style="color:#000;">{{ $marble->{'title_'.$l} }}</span></h2>
									<a href="{{ route('marbleDetail', ['url' => $marble->{'url_'.$l}]) }}">View more</a>
								</figcaption>			
							</figure>
							@endforeach
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</section>
@stop

@section('scripts')
	
@stop