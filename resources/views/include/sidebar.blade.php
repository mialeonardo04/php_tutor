	<div class="left-side-bar">
		<div class="brand-logo">
			<a href="/">
				<img src="{{ asset('theme/vendors/images/phpitutor_logo.png') }}" alt="">
			</a>
		</div>
		<div class="menu-block customscroll">
			<div class="sidebar-menu">
				<ul id="accordion-menu">
                    <li>
                        <a href="/" class="dropdown-toggle no-arrow">
                            <span class="fa fa-home"></span><span class="mtext">Home</span>
                        </a>
                    </li>
                    @if(Auth::user()->roles[0]['name'] == "pengajar")
                        <li>
                            <a href="{{route('pengajar.datasiswa')}}" class="dropdown-toggle no-arrow">
                                <span class="fa fa-mortar-board"></span><span class="mtext">Student Data </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('pengajar.unitrecords')}}" class="dropdown-toggle no-arrow">
                                <span class="fa fa-info-circle"></span><span class="mtext">Unit Courses Record </span>
                            </a>
                        </li>
                    @else
                        @if($statusprogress == 1)
                            <li>
                                <a href="/siswa/units" class="dropdown-toggle no-arrow">
                                    <span class="fa fa-list-alt"></span><span class="mtext">Take Course </span>
                                </a>
                            </li>
                            <li>
                                <a href="/siswa/achievements" class="dropdown-toggle no-arrow">
                                    <span class="fa fi-crown"></span><span class="mtext">Achievement(s) </span>
                                </a>
                            </li>
                        @else
                            <li>
                                <a href="" class="dropdown-toggle no-arrow">
                                    <span class="fa fa-list-alt"></span><span class="mtext">Take Course </span>
                                </a>
                            </li>
                            <li>
                                <a href="" class="dropdown-toggle no-arrow">
                                    <span class="fa fi-crown"></span><span class="mtext">Achievement(s) </span>
                                </a>
                            </li>
                        @endif

                    @endif
				</ul>
			</div>
		</div>
	</div>
