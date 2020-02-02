	<div class="left-side-bar">
		<div class="brand-logo">
			<a href="/">
				<img src="{{ asset('theme/vendors/images/phpitutor_logo.png') }}" alt="">
			</a>
		</div>
		<div class="menu-block customscroll">
			<div class="sidebar-menu">
				<ul id="accordion-menu">
                    @if($statusprogress == 1)
                        <li class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle">
                                <span class="fa fa-pie-chart"></span><span class="mtext">{{$unit->name}}</span>
                            </a>
                            <ul class="submenu"style="display: block">
                                @foreach($courses as $course)
                                    <li><a href="/siswa/courses/{{$course->id_course}}">{{$course->description}}</a></li>
                                @endforeach
                            </ul>
                        </li>

                        <li>
                            <a href="/" class="dropdown-toggle no-arrow">
                                <span class="fa fa-home"></span><span class="mtext">Back to Home</span>
                            </a>
                        </li>
                        <li>
                            <a href="/siswa/units" class="dropdown-toggle no-arrow">
                                <span class="fa fa-list-alt"></span><span class="mtext">Take Another Course </span>
                            </a>
                        </li>
                    @endif
				</ul>
			</div>
		</div>
	</div>
