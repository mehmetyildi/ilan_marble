@extends('layout')

@section('content')
	<div class="bannerContainer relative">
		<div id="ilanmarble-carousel" class="carousel slide shaded" data-ride="carousel" data-interval="false">>
			<div class="absCaption">
				<div class="mainContainer">
					<div class="container-fluid">
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<div class="marbleTitle clearfix">
									<h3>Papillion</h3>
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
			      	{{ HTML::image('/img/marbles/papillion_slab.jpg', null, array('class' => 'img-responsive fullWidth ')) }}
			    </div>
			    <div class="item ">
			      	{{ HTML::image('/img/marbles/papillion_closeup.jpg', null, array('class' => 'img-responsive fullWidth ')) }}
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
						<div class="row leftSidebar">
							<h3>MERMER</h3>
							<ul>
								<li><a href="{{ url($l.'/marbles/mooncream') }}">MoonCream</a></li>
								<li><a class="selected" href="{{ url($l.'/marbles/papillion') }}">Papillion</a></li>
							</ul>
							<hr style="width:90%; margin-left:0;">
							<a class="broshureLink" href="">
								<div class="col-lg-11 col-md-11 col-sm-11 col-xs-11 ">
								{{ HTML::image('/img/brochure.png', 'Broşür', ['class' => 'img-responsive centeredImage']) }}
								</div>
								<div class="col-lg-11 col-md-11 col-sm-11 col-xs-11 centeredText">
									İlan Marble  Broşür <br><br>
								</div>
							</a>
							<hr style="width:90%; margin-left:0;">
							<a class="broshureLink" href="{{ url($l.'/events') }}">
								<div class="col-lg-11 col-md-11 col-sm-11 col-xs-11 ">
								{{ HTML::image('/img/calendar.png', 'Bize Ulaşın', ['class' => 'img-responsive centeredImage']) }}
								</div>
								<div class="col-lg-11 col-md-11 col-sm-11 col-xs-11 centeredText">
									Etkinlikler <br><br>
								</div>
							</a>
							<hr style="width:90%; margin-left:0;">
							<a class="broshureLink" href="{{ url($l.'/contact') }}">
								<div class="col-lg-11 col-md-11 col-sm-11 col-xs-11 ">
								{{ HTML::image('/img/mappin.png', 'Bize Ulaşın', ['class' => 'img-responsive centeredImage']) }}
								</div>
								<div class="col-lg-11 col-md-11 col-sm-11 col-xs-11 centeredText">
									Bize Ulaşın <br><br>
								</div>
							</a>
						</div>
						<br>
					</div>
					<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
						<strong>STİL VE SANATIN DOĞAL YORUMU…</strong>
						<br>
						<h4>Yüksek Kalite, doğal gösteriş ayrıcalığı ve zeraafetin sade güzelliğinde kaybolmanın tadını çıkarın.</h4>
					</div>
					
				</div>
			</div>
		</div>
	</section>
	
@stop
