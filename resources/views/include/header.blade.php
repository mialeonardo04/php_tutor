	<div class="pre-loader"></div>
	<div class="header clearfix">
		<div class="header-right">
			<div class="brand-logo">
				<a href="">
					<img src="{{ asset('theme/vendors/images/logo.png')}}" alt="" class="mobile-logo">
				</a>
			</div>
			<div class="menu-icon">
				<span></span>
				<span></span>
				<span></span>
				<span></span>
			</div>
			<div class="user-info-dropdown">
				<div class="dropdown">
					<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
						<span class="user-icon"><img src="@if(Auth::user()->photo_name === NULL){{asset('theme/vendors/images/default_avatar.jpg')}} @else {{ URL::to('/') }}/images/{{Auth::user()->photo_name}} @endif"></span>
						<span class="user-name">{{Auth::user()->name}}</span>
					</a>
					<div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="/profile/{{Auth::user()->id}}"><i class="fa fa-user-md" aria-hidden="true"></i> My Profile</a>
                        <a class="dropdown-item" href="/logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Log Out</a>
					</div>
				</div>
			</div>
		</div>
	</div>
