@extends('layout')


@section('content')
	<div class="bannerContainer">
		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
		  	<!-- Wrapper for slides -->
		 	<div class="carousel-inner" role="listbox">
			    <div class="item active">
			      	{{ HTML::image('/img/licences.jpg', 'Lisanslar', array('class' => 'img-responsive fullWidth')) }}
			      	<div class="carousel-caption lessbottomcaption">
			        	<span>LİSANSLAR</span>
			      	</div>
			    </div>
		 	</div>
		</div>
	</div>

	<section class="anySection">
		<div class="mainContainer">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
						
						<strong>LİSANSLARIMIZ</strong>
						<br><br>

						21’i Beyşehir, 1’i de Mersin, Taşucu alanında olmak üzere, şirket, 22 mermer işletim lisansına sahiptir.
						<br><br>
						 
						Tüm lisanslar, aslen Antalya Mermer adına kayıtlı olup daha sonra Ilan Marble firmasına geçmiştir. Tüm lisanslar için, işletim lisansının çıkarılması için Nisan 2013'te Ankara'daki madencilik makamlarına başvuru yapılmıştır. İşletim izni başvuruları Şubat 2014'te onaylanmıştır.
						<br><br>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
						<div id="googlemaps"></div>
					</div>
				</div>
			</div>
		</div>
	</section>
@stop

@section('scripts')
	<script type='text/javascript' src='http://maps.google.com/maps/api/js?sensor=false&#038;ver=4.0'></script>
	{{ HTML::script('/js/customMap2.js') }}
@stop