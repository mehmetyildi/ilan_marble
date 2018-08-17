<section class="navSection">
	<div class="mainContainer">
		<a href="{{url($l.'/')}}"><img src="{{ url('/img/logoyellow.jpg') }}" alt="" style="width: 175px;" class="centeredImage"></a>
		<nav class="navbar navbar-default">
	    	<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
	      		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
	     		 </button>
    		</div>
	
    		<!-- Collect the nav links, forms, and other content for toggling -->
	   		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      		<ul class="nav navbar-nav">
	      			<li class="{{ (strpos($currentRouteName, 'marbles') !== false) ? 'active' : '' }}">
	      				<a class="nav-link text-uppercase " href="{{ url($l.'/marbles') }}">{{ trans('layout.collection') }}</a>
	      			</li>
	      			{{ HTML::clever_link('/quarries', trans('layout.quarries')) }}<a {{ (isset($athome)) ? 'class="atHome"' : ''}} href="{{ url($l.'/quarries') }}">{{ trans('layout.quarries') }}</a></li>
	      			{{ HTML::clever_link('/projects', trans('layout.projects')) }}<a {{ (isset($athome)) ? 'class="atHome"' : ''}} href="{{ url($l.'/projects') }}">{{ trans('layout.projects') }}</a></li>
	        		{{ HTML::clever_link('/about', trans('layout.corporate')) }}
	          			<a href="#" class="dropdown-toggle {{ (isset($athome)) ? ' atHome' : ''}}" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ trans('layout.corporate') }} <span class="caret"></span></a>
	          			<ul class="dropdown-menu">
				            <li><a href="{{ url($l.'/about/ilbak') }}">{{ trans('layout.corporate1') }}</a></li>
				            <li><a href="{{ url($l.'/about/ilanmarble') }}">{{ trans('layout.corporate2') }}</a></li>
				            <li><a href="{{ url($l.'/about/visionmission') }}">{{ trans('layout.corporate3') }}</a></li>
				            <li><a target="_blank" href="http://www.kariyer.net/ilbak-holding-a-s-is-ilanlari-c15826-p6390/?a=2">{{ trans('layout.corporate4') }}</a></li>
	          			</ul>
	        		</li>
	        		<!-- {{ HTML::clever_link('/events', trans('layout.corporate')) }}
	          			<a href="#" class="dropdown-toggle {{ (isset($athome)) ? ' atHome' : ''}}" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ trans('layout.news') }} <span class="caret"></span></a>
	          			<ul class="dropdown-menu">
				            <li><a href="{{ url($l.'/events') }}">{{ trans('layout.events') }}</a></li>
				            <li><a href="{{ url($l.'/mag') }}">E-MARBLE</a></li>
	          			</ul>
	        		</li> -->
	        		{{ HTML::clever_link('/events', trans('layout.news')) }}<a {{ (isset($athome)) ? 'class="atHome"' : ''}} href="{{ url($l.'/events') }}">{{ trans('layout.news') }}</a></li>
	        		{{ HTML::clever_link('/mag', 'E-MARBLE') }}<a {{ (isset($athome)) ? 'class="atHome"' : ''}} href="{{ url($l.'/mag') }}">E-MARBLE</a></li>
	      			{{ HTML::clever_link('/contact', trans('layout.contact')) }}<a {{ (isset($athome)) ? 'class="atHome"' : ''}} href="{{ url($l.'/contact') }}">{{ trans('layout.contact') }}</a></li>
	     		</ul>
    		</div><!-- /.navbar-collapse -->
		</nav>
	</div>
</section>