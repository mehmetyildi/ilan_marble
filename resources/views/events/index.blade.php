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
							<h3>{{ trans('layout.news') }}</h3>
							<div class="headBorder"></div>
							@include('includes.sideNav')
						</div>
						<br>
					</div>
					<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
							@foreach($events as $event)
							<div class="row">
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
								@if($event->image_path)
								{{ Html::image($event->image_path, $event->{'title_'.$l}, ['class' => 'img-responsive', 'title' => $event->{'title_'.$l}]) }}
								@else
								{{ Html::image('/img/eventEmpty.jpg', $event->{'title_'.$l}, ['class' => 'img-responsive', 'title' => $event->{'title_'.$l}]) }}
								@endif
								<br>
								</div>
								<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
									<h3 style="margin-top:0; margin-bottom:10px;">{{ $event->{'title_'.$l} }}</h3>
									<p>{!! mb_substr(strip_tags($event->{'description_'.$l}), 0, 300) !!}... <a class="btn btn-sm btn-primary eventLink" href="{{ route('eventDetail', ['url' => $event->{'url_'.$l}]) }}">{{ trans('layout.readMore') }}</a>
									</p>
								</div>
							</div>
							<hr>
							@endforeach
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