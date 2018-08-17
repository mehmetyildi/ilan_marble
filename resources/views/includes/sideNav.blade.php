<section id="set-5" class="hidden-xs">
	<div class="row">
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 colNo">
			<div class="hi-icon-wrap hi-icon-effect-5 hi-icon-effect-5a clearfix">
				<a href="{{ url('/katalog/ilan_marble_katalog_2018.pdf') }}" target="_blank" class="hi-icon hi-icon-bookmark"></a>
			</div>
		</div>
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 colNo">
			<a href="{{ url('/katalog/ilan_marble_katalog_2018.pdf') }}" target="_blank" class="sideTitle clearfix">{{ trans('layout.broshure') }}</a>
		</div>
	</div>
	<!-- <div class="row">
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 colNo">
			<div class="hi-icon-wrap hi-icon-effect-5 hi-icon-effect-5a clearfix">
				<a href="{{ url($l.'/events/mag') }}" class="hi-icon hi-icon-archive"></a>
			</div>
		</div>
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 colNo">
			<a  href="{{ url($l.'/events/mag') }}" class="sideTitle clearfix">E-Marble</a>
		</div>
	</div> -->
	

	<div class="row">
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 colNo">
			<div class="hi-icon-wrap hi-icon-effect-5 hi-icon-effect-5a clearfix">
				<a href="{{ route('events') }}" class="hi-icon hi-icon-earth"></a>
			</div>
		</div>
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 colNo">
			<a  href="{{ route('events') }}" class="sideTitle clearfix">{{ trans('layout.newsLower') }}</a>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 colNo">
			<div class="hi-icon-wrap hi-icon-effect-5 hi-icon-effect-5a clearfix">
				<a href="{{ route('ilanmarble') }}" class="hi-icon hi-icon-videos"></a>
			</div>
		</div>
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 colNo">
			<a href="{{ route('ilanmarble') }}" class="sideTitle clearfix">{{ trans('layout.watchVideo') }}</a>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 colNo">
			<div class="hi-icon-wrap hi-icon-effect-5 hi-icon-effect-5a clearfix">
				<a href="{{ route('contact') }}" class="hi-icon hi-icon-location"></a>
			</div>
		</div>
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 colNo">
			<a href="{{ route('contact') }}" class="sideTitle clearfix">{{ trans('layout.contactUs') }}</a>
		</div>
	</div>

	
</section>
<hr style="width:90%; margin-left:0;">

<ul>
	<li>
		<a style="color:#7d6956; text-align:left;" href="{{ url('/sanaltur/SanalTur/index.html') }}" target="_blank"><img src="{{ url('/img/360-tur.png') }}" width="90" alt=""> {{ trans('layout.tour') }}</a>
	</li>
</ul>
<hr style="width:90%; margin-left:0;">
<h3>SOCIAL</h3>
<div class="headBorder"></div>
<ul>
	<li>
		<h3><a style="color:#7d6956;" href="https://www.facebook.com/ilanmarble/" target="_blank"><img src="{{ url('/img/facebook.png') }}" width="30" alt=""> Facebook</a></h3>
	</li>
    <li>
    	<h3><a style="color:#7d6956;" href="https://www.instagram.com/ilanmarble/?hl=tr" target="_blank"><img src="{{ url('/img/instagram.png') }}" width="30" alt=""> Instagram</a></h3>
    </li>
</ul>
