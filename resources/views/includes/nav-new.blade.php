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
						<li><a href="{{ url($l.'/') }}">{{ trans('layout.home') }}</a></li>
						
						<li>
							{{ HTML::clever_link('/marbles', trans('layout.collection')) }}
							<a {{ (isset($athome)) ? 'class="atHome"' : ''}} href="{{ url($l.'/marbles') }}">{{ trans('layout.collection') }}
							</a>
						</li>
						<li>
							{{ HTML::clever_link('/quarries', trans('layout.quarries')) }}
							<a {{ (isset($athome)) ? 'class="atHome"' : ''}} href="{{ url($l.'/quarries') }}">{{ trans('layout.quarries') }}
							</a>
						</li>
						<li>
							{{ HTML::clever_link('/projects', trans('layout.projects')) }}
							<a {{ (isset($athome)) ? 'class="atHome"' : ''}} href="{{ url($l.'/projects') }}">{{ trans('layout.projects') }}
							</a>
						</li>
						<li>
							{{ HTML::clever_link('/about', trans('layout.corporate')) }}
							<a href="#" class="dropdown-toggle {{ (isset($athome)) ? ' atHome' : ''}}" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ trans('layout.corporate') }} <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="{{ url($l.'/ilbak') }}">{{ trans('layout.corporate1') }}</a></li>
								<li><a href="{{ url($l.'/ilanmarble') }}">{{ trans('layout.corporate2') }}</a></li>
								<li><a href="{{ url($l.'/visionmission') }}">{{ trans('layout.corporate3') }}</a></li>
								<li><a target="_blank" href="http://www.kariyer.net/ilbak-holding-a-s-is-ilanlari-c15826-p6390/?a=2">{{ trans('layout.corporate4') }}</a></li>
							</ul>
						</li>
						<li>
							{{ HTML::clever_link('/events', trans('layout.news')) }}
							<a {{ (isset($athome)) ? 'class="atHome"' : ''}} href="{{ url($l.'/events') }}">{{ trans('layout.news') }}</a>
						</li>
						<li>
							{{ HTML::clever_link('/mag', 'E-MARBLE') }}
							<a {{ (isset($athome)) ? 'class="atHome"' : ''}} href="{{ url($l.'/mags') }}">E-MARBLE</a>
						</li>
						<li>
							{{ HTML::clever_link('/contact', trans('layout.contact')) }}
							<a {{ (isset($athome)) ? 'class="atHome"' : ''}} href="{{ url($l.'/contact') }}">{{ trans('layout.contact') }}</a>
						</li>
					</ul>

					<ul class="nav navbar-nav navbar-right">
						<li><a href="{{ url($l.'/') }}" style="padding:0;"><img src="{{ url('/img/logo-new.png') }}" class="img-responsive" width="250" alt=""></a>
						</li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>
	</div>
</div>