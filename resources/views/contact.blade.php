@extends('layout')


@section('content')

	<div class="bannerContainer">
		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
			
		  	<!-- Wrapper for slides -->
		 	<div class="carousel-inner" role="listbox">
			    <div class="item active">
			      	<div id="googlemaps" data-lat="37.397192" data-long="31.617528"></div>
			    </div>
		 	</div>
		</div>
	</div>

	<section class="anySection">
		<div class="mainContainer">
			<div class="container-fluid">
				<div class="row">
				@if(count($quarries))
					@foreach($quarries as $quarry)
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 singleLocationDiv">
						
						<strong style="text-transform: uppercase;">{{ $quarry->{'title_'.$l} }}</strong>

						<div style="font-size: 16px;">{{ $quarry->{'address_'.$l} }}</div>
						@if($quarry->phone)
						<strong>Tel: </strong>{{ $quarry->phone }}<br>
						@endif
						@if($quarry->pbx)
						<strong>Fax: </strong> {{ $quarry->pbx }}<br>
						@endif
						@if($quarry->email)
						<strong>E-Mail: </strong> <a class="colorLink" href="mailto:{{ $quarry->email }}">{{ $quarry->email }}</a><br>
						@endif
						<a class="contactLink mapLink" data-lat="{{ $quarry->latitude }}" data-long="{{ $quarry->longitude }}"><i class="fa fa-map-marker"></i> ({{ trans('layout.showMap') }})</a>

					</div>
					@endforeach
				@endif
				</div>
				<div style="height:30px;"></div>
				<div class="row">
					<div class="col-md-12" id="formContainer">
						<h3>SOCIAL</h3>
						<div class="headBorder"></div>
						<div class="row">
							<div class="col-md-3">
								<h3><a style="color:#7d6956;" href="https://www.facebook.com/ilanmarble/" target="_blank"><img src="{{ url('/img/facebook.png') }}" width="30" alt=""> Facebook</a></h3>
							</div>
							<div class="col-md-3">
						    	<h3><a style="color:#7d6956;" href="https://www.instagram.com/ilanmarble/?hl=tr" target="_blank"><img src="{{ url('/img/instagram.png') }}" width="30" alt=""> Instagram</a></h3>
							</div>
						</div>
					</div>
				</div>
				<div style="height:30px;"></div>
				<div class="row">
					<div class="col-md-12" id="formContainer">
						<h3>{{ trans('layout.formTitle') }}</h3>
						<div class="headBorder"></div>
						<div class="row">
							{{Form::open(array( 'url' => '/send', 'method' => 'post', 'class'=>'clearfix', 'id' => 'kvkkForm')) }}
								@if(Session::has('message'))
									<div class="col-md-12">
										<div id="sessionMessage" class="well btn-success breadcrumb">{{ Session::get('message') }}</div>
									</div>
								@endif
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
									<div class="form-group">
									    <input type="text" class="form-control" name="name" id="name" placeholder="{{ trans('layout.formName') }}" required="">
								  	</div>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
									<div class="form-group">
									    <input type="email" class="form-control" name="email" id="email" placeholder="{{ trans('layout.formEmail') }}" required="">
								  	</div>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
									<div class="form-group">
									    <input type="text" class="form-control" name="phone" id="phone" placeholder="{{ trans('layout.formPhone') }}">
								  	</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
									    <textarea type="text" class="form-control" id="body" name="body" placeholder="{{ trans('layout.formBody') }}" required="" rows="10"></textarea>
								  	</div>
								</div>
								<div class="col-md-3 pull-right">
									<input type="submit" class="btn btn-primary fullWidth submitBtn" value="{{ trans('layout.formSubmit') }}">
								</div>
							{{ Form::close() }}
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- KVKK HTML CSS -->
	<style>
		#kvkkInfo {
			position: fixed;
			top: 0;
			left: 0;
			right: 0;
			bottom: 0;
			z-index: 19111984;
			background: rgba(0, 0, 0, 0.7); }
		@media only screen and (max-width: 767px) {
			#kvkkInfo {
			display: none !important; } }
		#kvkkInfo .relative {
			position: relative;
			width: 100%;
			height: 100%; }
		#kvkkInfo .mainContainer {
			position: relative;
			height: 100%; }
		#kvkkInfo .theKvkk {
			position: absolute;
			top: 15%;
			left: 0;
			right: 0; 
		    background: white;
			position: absolute;
			padding: 20px;
			}
		#kvkkInfo .kvkkText{
			height: 300px;
			overflow-x: scroll;
		}
		#kvkkInfo .closePopup {
			width: 24px;
			height: 25px;
			content: "x";
			display: inline-block;
			z-index: 99111984;
			position: absolute;
			top: -10px;
			right: 50%;
			margin-right: -310px; 
		}
		.kvkkActions{
			border-top: 1px solid #333;
			padding: 20px 0 20px;
		}
		.kvkkActions a{
			display: inline-block;
			
			color: #fff;
			background: #333;
			border: 1px solid #333;
			padding: 4px 12px;
			text-align: center;
		}
		.kvkkActions #kvkkApprove{
			width: 49%;
			margin-left: 1%;
		}
		.kvkkActions #kvkkDisapprove{
			width: 49%;

		}
	</style>
	<div id="kvkkInfo" style="display:none;">
		<div class="relative">
			<div class="mainContainer">
				<div class="theKvkk">
					<div class="relative">
						@if(Lang::getLocale() == 'tr')
						<div class="kvkkText">
							<h2>I.	Aydınlatma Metni</h2>

							<strong>1.	Giriş</strong><br>
							İşbu aydınlatma metni; İlbak Holding Anonim Şirketi(“Şirket”) olarak ziyaretçilerimizin kişisel verilerinin Türkiye Cumhuriyeti Anayasası ve insan haklarına ilişkin ülkemizin tarafı olduğu uluslararası sözleşmeler ile 6698 sayılı Kişisel Verilerin Korunması Kanunu (“KVKK”) başta olmak üzere ilgili mevzuata uygun olarak işlenmesinin ve verisi işlenen ilgili kişilerin haklarını etkin şekilde kullanabilmelerinin sağlanması amacıyla hazırlanmıştır. Şirketimiz ile paylaşılmış olan tüm kişisel veriler hukuka  uygun bir şekilde, faaliyet ve hizmet amaçlarımız ile bağlantılı ve ölçülü olarak işlenebilecektir.
							<br><br>
							<strong>2.	Tanımlar</strong><br>
							İşbu aydınlatma metninde kullanılan kişisel veri, özel nitelikli kişisel veri ve veri işleme kavramları KVKK’da yapılan tanımlara istinaden kullanılmıştır. KVKK’da geçen “kişisel veri” kavramı kimliği belirli veya belirlenebilir gerçek kişiye ilişkin her türlü bilgiyi; “kişisel verilerin işlenmesi” kavramı ise, kişisel verilerin tamamen veya kısmen otomatik olan ya da herhangi bir veri kayıt sisteminin parçası olmak kaydıyla otomatik olmayan yollarla elde edilmesi, kaydedilmesi, depolanması, muhafaza edilmesi, değiştirilmesi, yeniden düzenlenmesi, açıklanması, aktarılması, devralınması, elde edilebilir hâle getirilmesi, sınıflandırılması ya da kullanılmasının engellenmesi gibi veriler üzerinde gerçekleştirilen her türlü işlemi ifade eder.
							<br><br>
							<strong>3.	Kişisel Verilerin İşlenmesi İlkeleri</strong><br>
							KVKK 4. maddesi uyarınca veri sahibine ait kişisel veriler; hukuka ve dürüstlük kurallarına uygun, doğru ve gerektiğinde güncel, belirli, açık ve meşru amaçlar için; işlendikleri amaçla bağlantılı, sınırlı ve ölçülü; ilgili mevzuatta öngörülen veya işlendikleri amaç için gerekli olan süre kadar muhafaza edilme kurallarına uygun bir şekilde, veri sorumlusu Şirket tarafından aşağıda belirtilen amaçlar kapsamında işlenecektir.
							<br><br>
							<strong>4.	Kişisel Verilerin İşlenmesi Amaçları</strong><br>
							<br>
							Kişisel verileriniz;<br><br>

							•	İş yeri veya internet ve benzeri elektronik sistemlerin güvenliğinin sağlanması<br>
							•	İleride çıkabilecek hukuki uyuşmazlıkların giderilmesi <br>
							•	Yetkili resmi kurum veya kuruluşların hukuka uygun olarak talep etmeleri halinde ilgili kurumlara gerekli bildirimlerin resmi yollarla yapılması,
							amaçlarıyla, KVKK’nın 5. ve 6. maddelerinde belirtilen kişisel veri işleme şartlarına uygun olarak işlenecektir.<br><br>
							<strong>5.	Kişisel Verilerinizin Aktarılması </strong><br>

							Şirketimiz, kişisel verilerin aktarılması konusunda, KVKK'da öngörülen düzenlemelere uygun bir şekilde hareket etmektedir. Mevzuatta yer alan istisnai haller saklı kalmak kaydıyla, kişisel veriler ve özel nitelikli veriler, veri sahibinin açık rızası olmadan, tarafımızca diğer gerçek veya tüzel kişilere aktarılmamaktadır. KVKK ve sair mevzuatın öngördüğü istisnai hallerde ise kişisel verilerin yetkili kılınan idari veya adli kurum veya özel kuruluşlara aktarılması esnasında mevzuatta öngörülen şekil ve sınırlamalara uygun davranılmasına azami özen gösterilmektedir. 
							<br><br>
							Kişisel verileriniz, <br>
							•	Kanuni yükümlülüğün yerine getirilmesi veya Şirket’e ait hakların tesisi, kullanılması veya korunması amacıyla yetkili resmi kurum ve kuruluşlar ile kanunen yetkilendirilmiş özel kişilere,
							ilgili mevzuatta öngörülen usul ve esaslar çerçevesinde ve KVKK’nın 8. ve 9. maddelerinde belirtilen kişisel veri aktarma şartları ve amaçlarına uygun olarak aktarılabilecektir.
							<br><br>
							<strong>6.	Kişisel Verilerin/Özel Nitelikli Kişisel Verilerin Toplanma Yöntemi ve Hukuki Sebebi</strong><br>

							Kişisel verileriniz, otomatik yöntemlerle; Şirket’e ait internet adreslerinde yer alan hotspot sistemine giriş yapılarak bizzat veri sahibi tarafından bilgi verilmesi veya sistem üzerinden talep ve formların iletilmesi vasıtasıyla ve sisteme girişin ardından gerçekleştirilen işlemlerin kayıt altına alınması suretiyle elde edilmektedir. 
							<br><br>
							Söz konusu kişisel verilerinizin Şirket tarafından işlenmesindeki hukuki sebepler; veri sahibinin  Açık Rıza metninde, KVKK’nin 5.maddesinin birinci fıkrası uyarınca  vermiş olduğu rıza ile KVKK’nın 5.maddesinin ikinci fıkrasının ç,e ve f bentlerinde belirtilen açık rızanın istisnası olan hallerdir. Kişisel verileriniz belirtilen hukuki sebeplerle yürürlükte olan her türlü mevzuata uygun şekilde ve işbu Aydınlatma Metninin 4. ve 5. maddelerinde belirtilen amaçlarla Şirketimiz tarafından toplanmaktadır. 
							<br><br>
							<strong>.	Veri Sahibinin md.11’de Belirtilen Hakları</strong><br>
							Veri sahipleri, veri sorumlusu olarak hareket eden Şirket’e başvurarak kendisiyle ilgili; kişisel verisinin işlenip işlenmediğini öğrenme, kişisel verisinin işlenmişse buna ilişkin bilgi talep etme; kişisel verilerinin işlenme amacını ve bunların amacına uygun kullanılıp kullanılmadığını öğrenme; yurt içinde veya yurt dışında kişisel verilerinin aktarıldığı üçüncü kişiler hakkında bilgilendirilme; kişisel verilerinin eksik veya yanlış işlenmiş olması hâlinde bunların düzeltilmesini talep etme; 6698 sayılı KVKK’nın 7. maddesinde öngörülen şartlar çerçevesinde kişisel verilerinin silinmesini veya yok edilmesini talep etme; KVKK’nın 11. maddesinin (d) ve (e) bentleri uyarınca yapılan işlemlerin, kişisel verilerinin aktarıldığı üçüncü kişilere bildirilmesini isteme; işlenen verilerin münhasıran otomatik sistemler vasıtasıyla analiz edilmesi suretiyle kişinin kendisi aleyhine bir sonucun ortaya çıkmasına itiraz etme; kişisel verilerin kanuna aykırı olarak işlenmesi sebebiyle zarara uğraması hâlinde zararın giderilmesini talep etme haklarına sahiptir. 
							<br><br>
							<strong>Açık Rıza</strong>
							Yukarıda 6698 sayılı Kişisel Verilerin Korunması Kanunu’na uygun olarak hazırlanan aydınlatma metnine belirtilen hususları okudum ve anladım. Kişisel verilerimin Aydınlatma Metni’nde belirtilen amaçlar ve ilkeler kapsamında işlenmesine ve aktarılmasına özgür iradem ile ve açıkça
							<br><br>
						</div>
						<div class="kvkkActions">
							<a id="kvkkApprove">Rıza Gösteriyorum</a>
							<a id="kvkkDisapprove">Rıza Göstermiyorum</a>
						</div>
						@else
						<div class="kvkkText">
								<h2>I.	Disclosure Statement</h2>
								
								<strong>1	Introduction</strong><br>

								This disclosure statement was prepared in order to ensure that personal data of our visitors are processed in accordance with the Constitution of Turkish Republic and international conventions on human rights which our country is a party and with the related legislation, in particular the Law on the Protection of Personal Data (”KVKK”) No. 6698 as İlbak Holding Anonim Şirketi (”Company”) and that persons whose personal data are processed to be able to exercise their rights efficiently. All personal data shared with our Company shall be processed legally, in connection and calibration with our activities and service purposes.
								<br><br>
								<strong>2	Definitions</strong><br>
								Personal data, specific personal data and data processing terms used in this disclosure statement are used in accordance with the definitions within KVKK. “Personal data” term mentioned in KVKK refers to all kinds of information on the identified or identifiable real person; “Processing of personal data” term refers to all kinds of transactions made on data such as collecting, recording, retaining, maintaining, changing, rearranging, disclosing, transferring, taking over, making collectable, classifying or restricting the personal data provided that it is a part of any data recording system that is completely or partially automatic.
								<br><br>
								<strong>3	Principles of Processing Personal Data</strong><br>
								As per the Article 4 of KVKK, personal data belonging to the data subject shall be processed by the data controller Company in accordance with the law and integrity rules, accurately and for up-to-date, specific, clear and legitimate purposes when needed; in connection with the purpose they are processed, limited and calibrated; in accordance with the retention rules which applied for the purpose they are processed.
								<br><br>
								<strong>4	Purposes of Processing of Personal Data</strong><br>

								Your personal data shall be processed in order to:
								<br><br>

								•	Maintain the security of the workplace or internet and similar electronic systems<br>
								•	Eliminate legal disputes that may occur <br>
								•	To make notifications to the related authorities in the event competent public authorities or institutions demand in accordance with the law,
								within the scope of the personal data processing requirements and purposes set out in Articles 5 and 6 of the KVKK Law.
								<br><br>

								<strong>5	Transferring Your Personal Data </strong><br>

								Our company acts in accordance with the regulations set out in the KVKK in relation to the transfer of personal data. Without prejudice to the exceptional cases specified in the legislation, personal data and specific data are not transferred to other real or legal persons without the explicit consent of the data subject. In exceptional cases, as stipulated by KVKK and other legislation, attention is paid to comply with the requirements and limitations indicated in the legislation during the transfer of personal data to authorized administrative or judicial institutions or private organizations. 
								<br><br>
								Your personal data may be transferred to, <br>
								•	To authorized official institutions or organizations and legally authorized special persons in order for the fulfilment of a legal obligation or establishment, utilization or protection of rights belonging to the Company,
								Within the framework of the procedures and principles stipulated in the relevant legislation and in accordance with the personal data transfer conditions and purposes indicated in the Article 8 and 9 of the KVKK.
								<br><br>

								<strong>6	Collection Method of Personal Data / Specific Personal Data and Legal Cause</strong><br>

								Your personal data are collected through automatic methods, by entering the hotspot system within the websites owned by the Company, by obtaining information by the data subject in person or by the submission of requests and forms through the system and by recording the transactions realized after logging in the system. 
								<br><br>

								The legal causes for the processing of your personal data by the Company are those that are exceptions to the explicit consent stated in the clauses (ç), (e) and (f) of the second paragraph of the Article 5 of KVKK with the consent of the data subject in the Explicit Consent text in accordance with the first paragraph of Article 5 of the KVKK. Your personal data is collected by our Company in accordance with all applicable laws and regulations and in accordance with the legal causes set forth in Articles 4 and 5 of this Disclosure Statement. 
								<br><br>

								<strong>7	Rights of the Data Subject Indicated in Article 11</strong><br>
								By applying to the Company acting within the capacity of data controller, data subjects are entitled to; learn whether his/her data are processed, request information in the event his/her personal data is processed; learn the purpose of the personal data processing and whether they are used in accordance with their purpose; be informed on the third parties which the personal data are transferred domestically or internationally; request correction in the event the personal data are processed deficiently or incorrectly; request his/her personal data to be deleted or destructed within the framework of the conditions stipulated in the Article 7 of the KVKK no.6698; request the transactions made as per the clauses (d) and (e) of the Article 11 of the KVKK to be notified to the third parties which the personal data are transferred; object the occurrence of a result against him/her upon analysis of the processed data with automatic systems explicitly; request indemnification of damages in the event a damage is occurred in the event of processing of personal data illegally. 
								<br><br>

								<strong>Explicit Consent</strong><br>
								I have read and understood the aspects indicated in the disclosure statement prepared in accordance with the Law on Protection of Personal Data No. 6698. In relation to the processing and transferring of my personal data within the scope of the purposes and principles indicated in the Disclosure Statement,

								<br><br>
							</div>
							<div class="kvkkActions">
								<a id="kvkkApprove">I give my consent </a>
								<a id="kvkkDisapprove">I do not give my consent</a>
							</div>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- KVKK HTML CSS -->
@stop

@section('scripts')
	<script type='text/javascript' src='http://maps.google.com/maps/api/js?sensor=false&#038;ver=4.0'></script>
	{{ HTML::script('/js/lib/jquery.scrollTo.min.js') }}
	<script>var getDirections = "{{ trans('layout.directions') }}";</script>
	{{ HTML::script('/js/customMap.js') }}
	<!-- KVKK JS -->
	<script>
		window.kvkk = false;
		$('#kvkkForm').submit(function (e) {
			if(window.kvkk == false){
				e.preventDefault();
				$('#kvkkInfo').fadeIn();
			}
			
			
		});
		$('#kvkkInfo .relative').click(function(event){
			event.stopPropagation();
		});
		$(document).keydown(function(e){
		if (e.keyCode === 27){ 
			$('#kvkkInfo').fadeOut(300);
		
		}
		});

		$('#kvkkInfo').click(function(){
			$('#kvkkInfo').fadeOut(300);
		});
		$('#kvkkApprove').click(function(){
			window.kvkk = true;
			$('#kvkkForm').submit();
		});
		$('#kvkkDisapprove').click(function(){
			location.reload();
		});
	</script>
	<!-- KVKK JS -->
	@if(Session::has('message'))
		<script>
			setTimeout(function(){$('body,html').scrollTo('#formContainer', 300, {offset: {top:0,} });},300);
		</script>
	@endif
@stop