<div class="newNav {{ (isset($athome)) ? 'homePage' : ''}}" style="position: static; margin-bottom: 0;">
	<div class="row">
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<div class=" newLang">
						<a class="langLink" href="{{ url('/tr') }}">TR</a> / <a class="langLink" href="{{ url('/en') }}">ENG</a>

					</div>
					<ul class="nav navbar-nav navLeft">
						<li><a href="{{ route('home') }}">{{ trans('layout.home') }}</a></li>
						
						<li class="{{ (strpos($currentRouteName, 'marbles') !== false) ? 'active' : '' }}">
							<a class="nav-link text-uppercase " href="{{ route('marbles') }}">{{ trans('layout.collection') }}</a>
						</li> 
						<li class="{{ (strpos($currentRouteName, 'quarries') !== false) ? 'active' : '' }}">
							
							<a class="nav-link text-uppercase " href="{{ route('quarries') }}">{{ trans('layout.quarries') }}
							</a>
						</li>
						<li class="{{ (strpos($currentRouteName, 'projects') !== false) ? 'active' : '' }}">
							
							<a class="nav-link text-uppercase " href="{{ route('projects') }}">{{ trans('layout.projects') }}
							</a>
						</li>
						<li class="{{ (strpos($currentRouteName, 'corporate') !== false) ? 'active' : '' }}">
							<a href="#" class="dropdown-toggle {{ (isset($athome)) ? ' atHome' : ''}}" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ trans('layout.corporate') }} <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="{{ route('ilbak') }}">{{ trans('layout.corporate1') }}</a></li>
								<li><a href="{{ route('ilanmarble') }}">{{ trans('layout.corporate2') }}</a></li>
								<li><a href="{{ route('visionmission') }}">{{ trans('layout.corporate3') }}</a></li>
								<li><a target="_blank" href="http://www.kariyer.net/ilbak-holding-a-s-is-ilanlari-c15826-p6390/?a=2">{{ trans('layout.corporate4') }}</a></li>
							</ul>
						</li>
						<li class="{{ (strpos($currentRouteName, 'events') !== false) ? 'active' : '' }}">
							
							<a class="nav-link text-uppercase " href="{{ route('events') }}">{{ trans('layout.news') }}</a>
						</li>
						<li class="{{ (strpos($currentRouteName, 'mags') !== false) ? 'active' : '' }}">
							
							<a class="nav-link text-uppercase " href="{{ route('mags') }}">E-MARBLE</a>
						</li>
						<li class="{{ (strpos($currentRouteName, 'contact') !== false) ? 'active' : '' }}">
							
							<a class="nav-link text-uppercase " href="{{ route('contact') }}">{{ trans('layout.contact') }}</a>
						</li>
					</ul>

					<ul class="nav navbar-nav navbar-right">
						<li><a href="{{ route('home') }}" style="padding:0;"><img src="{{ url('/img/logo-new.png') }}" class="img-responsive" width="250" alt=""></a>
						</li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>
	</div>
</div>