@extends('layout')
@section('styles')
    <link rel="stylesheet" href="//blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
@stop

@section('content')
	<section class="anySection">
		<div class="mainContainer">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
						<div class=" leftSidebar">
							<h3>{{ trans('layout.quarries') }}</h3>
							<div class="headBorder"></div>
							

							@include('includes.sideNav')
						</div>
						<br>
					</div>
					<div class="ol-lg-9 col-md-9 col-sm-9 col-xs-12">
							<div style="font-size:20px;">{!! $aboutQuarries->{'description_'.$l} !!}</div>
							@foreach($locations as $location)
								<div class="row">
									<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
										<div style="font-size:18px;">{!! $location->{'description_'.$l} !!}</div>
									</div>
									<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
										<strong>{{ trans('layout.tech') }}</strong> <br>
										<a class="hoverRel" href="{{ url($location->image_path) }}" data-gallery>
											{{ Html::image($location->image_path, null, array('class' => 'îmg-responsive', 'width' => '150')) }}
											<span class="hoveredBg"></span>
											<span class="hoveredIcon"><i class="fa fa-search-plus"></i></span>
										</a>
									</div>
								</div>
								<hr>
							@endforeach
							<!-- <div style="height:30px;"></div> -->
							
							<div style="height:30px;"></div>
							<div class="row">
								<div class="col-md-12">
									<h4>{{ trans('layout.gallery') }}</h4>
								</div>
								@foreach($images as $image)
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 projectGallery">
									<a class="hoverRel" href="{{ url($image->image_path) }}" data-gallery title="{{ $image->{'title_'.$l} }}">
										{{ Html::image($image->image_path, $image->{'title_'.$l}, array('class' => 'îmg-responsive fullWidth', 'title' => $image->{'title_'.$l})) }}
										<span class="hoveredBg"></span>
										<span class="hoveredIcon"><i class="fa fa-search-plus"></i></span>
									</a>
								</div>
								@endforeach
							</div>
						

					</div>
					
				</div>
			</div>
		</div>
	</section>
	 <!-- The Bootstrap Image Gallery lightbox, should be a child element of the document body -->
    <div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls" data-use-bootstrap-modal="false">
        <!-- The container for the modal slides -->
        <div class="slides"></div>
        <!-- Controls for the borderless lightbox -->
        <h3 class="title"></h3>
        <a class="prev">‹</a>
        <a class="next">›</a>
        <a class="close">×</a>
        <a class="play-pause"></a>
        <ol class="indicator"></ol>
        <!-- The modal dialog, which will be used to wrap the lightbox content -->
        <div class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body next"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left prev">
                            <i class="glyphicon glyphicon-chevron-left"></i>
                            Previous
                        </button>
                        <button type="button" class="btn btn-primary next">
                            Next
                            <i class="glyphicon glyphicon-chevron-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>  
@stop

@section('scripts')
    <script type="text/javascript" src="//blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
@stop