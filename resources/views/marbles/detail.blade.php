@extends('layout')

@section('styles')
	<style>
		.absCaption .mainContainer{
			background: #000;
		}
		.absCaption .mainContainer .row{
			border:none;
		}
		.slideMarble{
			color:#000;
			border:#000;
			background: rgba(233, 180, 69, 0.9);
		}
		.slideMarble:hover{
			color:#000;
		}
		.marbleTitle{
			padding: 4px;
		}
	</style>
@stop

@section('content')

	<div class="bannerContainer relative">
		<div id="ilanmarble-carousel" class="carousel slide shaded" data-ride="carousel" data-interval="false">
			<div class="absCaption">
				<div class="mainContainer">
					<div class="container-fluid">
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-6 hidden-xs">
								<div class="marbleTitle clearfix">
									<h3 style="text-transform: uppercase;">{{ $marble->{'title_'.$l} }}</h3>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<div class="changeZoom clearfix">
									<a class="slideMarble" style="display: none;" data-target="toSlab">SLAB</a>
									<a class="slideMarble" data-target="toCloseup">CLOSE-UP</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		  	<!-- Wrapper for slides -->
		 	<div class="carousel-inner homePageBanner" role="listbox">
			    <div class="item active">
			      	{{ HTML::image($marble->image_path_slab, null, array('class' => 'img-responsive fullWidth ')) }}
			    </div>
			    <div class="item ">
			      	{{ HTML::image($marble->image_path_close, null, array('class' => 'img-responsive fullWidth ')) }}
			    </div>
		 	</div>

		  	<!-- Controls -->
		  	<a class="left carousel-control" id="toSlab" href="#ilanmarble-carousel" role="button" data-slide="prev" style="display: none;">
			    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			    <span class="sr-only">Previous</span>
		  	</a>
		  	<a class="right carousel-control" id="toCloseup" href="#ilanmarble-carousel" role="button" data-slide="next" style="display: none;">
			    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			    <span class="sr-only">Next</span>
		  	</a>
		</div>	
	</div>

	<section class="anySection">
		<div class="mainContainer">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
						<div class="leftSidebar">
							<h3>{{ trans('layout.collection') }}</h3>
							<div class="headBorder"></div>
							<ul>
								@foreach($marbles as $m)
									@if($m->id == $marble->id)
									<li><a class="selected" href="{{ url($l.'/marbles/detail/'.$m->id) }}">{{ $m->{'title_'.$l} }}</a></li>
									@else
									<li><a href="{{ url($l.'/marbles/detail/'.$m->id) }}">{{ $m->{'title_'.$l} }}</a></li>
									@endif
								@endforeach
							</ul>
							<hr style="width:90%; margin-left:0;">
							@include('includes.sideNav')
						</div>
						<br>
					</div>
					<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
						{!! $marble->{'description_'.$l} !!}
					</div>
					
				</div>
			</div>
		</div>
	</section>
	
@stop
