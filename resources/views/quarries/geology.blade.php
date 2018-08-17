@extends('layout')


@section('content')
	<div class="bannerContainer">
		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
		  	<!-- Wrapper for slides -->
		 	<div class="carousel-inner" role="listbox">
			    <div class="item active">
			      	{{ Html::image('/img/jeoloji.jpg', 'Jeoloji', array('class' => 'img-responsive fullWidth')) }}
			      	<div class="carousel-caption lessbottomcaption">
			        	<span>JEOLOJİ</span>
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
						
						Mermer işletme lisansları,  literatürde Beyşehir-Hoyran-Haldum Napları olarak tanımlanan Paleozoik- Senozoik kayaların göze çarpan sıkışmış levhalarının varlığıyla nitelendirilen alanda Türkiye'nin  merkezi güneyinde bulunan  Toroslar'da konumludur. Bu naplar, platform karbonatların, ofiyolitlerin, radyolaritlerin ve kıtasal kaya türlerinin bir karışımından oluşmaktadır.
						<br><br>
						21 Ilan Marble lisansı ile kaplanan alan, ofiyolit melanj nap bölümünü oluşturan 60-100m kalınlıkta karbonat birimi içerisinde bulunur.
						<br><br>

						Katman, 20 – 300 KD bir sığ derinlikte açı ile KKB-GGD yönünde ayrılır. Birimin ana bölümü,  peljik faunanın artık fosillerini içeren başkalaşmamış, soluk bej renginde, sığ su karbonattan oluşur.
						<br><br>

						Karbonat tabakası, tabakalaşma yüzeyi özelliklerinden uzaktır ve kalsit-sızdırmaz küçük damarlar ve fosillerin yanında küçük dolomit kristaller görünür.
					</div>
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
						{{ Html::image('/img/geology.jpg', 'Jeoloji', array('class' => 'img-responsive fullWidth')) }}
					</div>
				</div>
			</div>
		</div>
	</section>
@stop