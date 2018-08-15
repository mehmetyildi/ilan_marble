@extends('layout')

<?php $athome = true; ?>
@section('seo')
    <!-- TITLE -->
    <title>İlan Marble</title>
    <meta property="og:title" content="Uzer Makina "/>
    <!-- <meta name="keywords" content="{{ trans('keywords.home') }}"> -->
    <!-- DESCRIPTION -->
  <!--   <meta name="description" content="{{ trans('keywords.homedesc') }}">
    <meta property="og:description" content="{{ trans('keywords.homedesc') }}"/> -->
    <!-- IMAGE -->
    <meta property="og:image" content="{{ asset('img/logo.png') }}"/>
    <!-- URL -->
    <meta property="og:url" content="{{ route('home') }}"/>
    <meta name="canonical" content="{{ route('home') }}"/>
@endsection
@section('styles')
    <link rel="stylesheet" href="//blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
    {{ HTML::style('/css/set2.css') }}
    {{ HTML::style('/css/sliderAdditional.css') }}
    <link href="{{ url('/royalslider/royalslider.css') }}" rel="stylesheet">
	<link href="{{ url('/royalslider/skins/minimal-white/rs-minimal-white.css') }}" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Petit+Formal+Script&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
@stop
@section('content')
	<div class="popup" style="display:none;">
		<div class="relative">
			<div class="mainContainer">
				<div class="thePopup">
					<div class="relative">
						{{ HTML::image('/img/popup10.jpg', 'İlan Marble', array('class' => 'img-responsive centeredImage', 'style' => 'width:100%;')) }}
						<a class="closePopup" style="right:0; top:-35px; margin-right: 0;"></a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="bannerContainer">
		<div id="full-width-slider" class="royalSlider heroSlider rsMinW">
			@foreach($banners as $banner)
		  	<div class="rsContent">
		    	<img class="rsImg" src="{{$banner->image_path}}" alt="{{ $banner->{'title_'.$l} }}">
		  	</div>
		  	@endforeach
		</div>
	</div>
	<section class="anySection eternalBg">
		<div class="mainContainer">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="row">
							<div class="grid clearfix">
								<figure class="effect-apollo">
									{{ HTML::image('/img/home/mooncream2.jpg') }}
									<figcaption>
										<h2 class="tShadow hometShadow" style="top: 63px; left: -16px;"><span>{{ trans('layout.homeMarble') }}</span></h2>
										<div class="vline"></div>
										<a href="{{ url($l.'/marbles') }}">View more</a>
									</figcaption>			
								</figure>
								<figure class="effect-apollo">
									{{ HTML::image('/img/home/quarries2.jpg') }}
									<figcaption>
										<h2 class="tShadow hometShadow"><span>{{ trans('layout.homeQuarries') }}</span></h2>
										<div class="vline"></div>
										<a href="{{ url($l.'/quarries') }}">View more</a>
									</figcaption>			
								</figure>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	@if($thePopup)
        <!-- Modal -->
        <div class="modal fade" id="popupModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <br>
                    </div>
                    <div class="modal-body">
                        @if($thePopup->video_path)
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="{{ $thePopup->video_path }}"></iframe>
                            </div>
                        @else
                            <a href="{{ $thePopup->link }}" target="_blank"><img class="img-responsive fullWidth" src="{{ url($thePopup->{'image_path_'.$l}) }}" alt="Uzer Makina" title="Uzer Makina"></a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif
	 
@stop

@section('scripts')
 @if($thePopup)
        <script>
            jQuery(document).ready(function(){
                jQuery('#popupModal').modal('show');
                setTimeout(function(){jQuery('#popupModal').modal('hide');}, {{ $thePopup->duration }} * 1000);
            });

        </script>
    @endif
	<script src="{{ url('/royalslider/jquery.royalslider.min.js') }}" /></script>
	<script>
  		$(document).ready(function($) {
		  	$('#full-width-slider').royalSlider({
			    arrowsNav: true,
			    loop: true,
			    keyboardNavEnabled: true,
			    controlsInside: false,
			    imageScaleMode: 'fill',
			    arrowsNavAutoHide: false,
			    autoScaleSlider: true, 
			    autoScaleSliderWidth: 1900,     
			    autoScaleSliderHeight: 800,
			    controlNavigation: 'bullets',
			    thumbsFitInViewport: false,
			    navigateByClick: true,
			    autoPlay: {
		    		enabled: true,
		    		pauseOnHover: false,
			    	stopAtAction: false,
			    	delay: 3000
		    	},
			    startSlideId: 0,
			    transitionType:'fade',
			    controlNavigation:'none',
			    globalCaption: false,
			    deeplinking: {
			      enabled: true,
			      change: false
			    },
			    /* size of all images http://help.dimsemenov.com/kb/royalslider-jquery-plugin-faq/adding-width-and-height-properties-to-images */
			    imgWidth: 1900,
			    imgHeight: 800
		  	});
		});
	</script>
@stop