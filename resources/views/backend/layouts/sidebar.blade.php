<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: rgb(1, 120, 15)">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('backend') }}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                <a href="{{route('logout')  }}" class="nav-link"  onclick="event.preventDefault();
                                    this.closest('form').submit();">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Logout</p>
                </a>
              </form>
              </li>

            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Content
                <i class="fas fa-angle-left right"></i>
                @php
                $prefix = Request::route()->getPrefix();
                $route = Request::route()->getName();
                @endphp
              </p>
            </a>
            <ul class="nav nav-treeview">
              @if (Auth::user()->role == 'sp')
              <li class="nav-item">
                <a href="{{ route('general.index') }}" class="nav-link {{$route == 'general.index'?'active':''}}" >
                  <i class="far fa-circle nav-icon"></i>
                  <p>General Info</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="{{ route('event.index') }}" class="nav-link {{$route == 'event.index'?'active':''}}" >
                  <i class="far fa-circle nav-icon"></i>
                  <p>Events</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('bill.index') }}" class="nav-link {{$route == 'bill.index'?'active':''}}" >
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bill</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('organization.index') }}" class="nav-link {{$route == 'organization.index'?'active':''}}" >
                  <i class="far fa-circle nav-icon"></i>
                  <p>Organization</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('donation.index') }}" class="nav-link {{$route == 'donation.index'?'active':''}}" >
                  <i class="far fa-circle nav-icon"></i>
                  <p>Donation</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('truck.index') }}" class="nav-link {{$route == 'truck.index'?'active':''}}" >
                  <i class="far fa-circle nav-icon"></i>
                  <p>Truck</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('schedule.index') }}" class="nav-link {{$route == 'schedule.index'?'active':''}}" >
                  <i class="far fa-circle nav-icon"></i>
                  <p>Schedule</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('complain.index') }}" class="nav-link {{$route == 'complain.index'?'active':''}}" >
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Complains</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('vendor.index') }}" class="nav-link {{$route == 'vendor.index'?'active':''}}" >
                  <i class="far fa-circle nav-icon"></i>
                  <p>Vendor</p>
                </a>
              </li>

              @else
               <li class="nav-item">
                <a href="{{ route('vendor.bill.index') }}" class="nav-link {{$route == 'vendor.bill.index'?'active':''}}" >
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bill Collection</p>
                </a>
              </li>  
              @endif
             

{{-- 
             
              <li class="nav-item">
                <a href="{{ route('client.index') }}" class="nav-link {{$route == 'client.index'?'active':''}}" >
                  <i class="far fa-circle nav-icon"></i>
                  <p>Client </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('service.index') }}" class="nav-link {{$route == 'service.index'?'active':''}}" >
                  <i class="far fa-circle nav-icon"></i>
                  <p>Services </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('portfolio.index') }}" class="nav-link {{$route == 'portfolio.index'?'active':''}}" >
                  <i class="far fa-circle nav-icon"></i>
                  <p>Portfolio </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('course.index') }}" class="nav-link {{$route == 'course.index'?'active':''}}" >
                  <i class="far fa-circle nav-icon"></i>
                  <p>Course </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('contact.index') }}" class="nav-link {{$route == 'contact.index'?'active':''}}" >
                  <i class="far fa-circle nav-icon"></i>
                  <p>Contact </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('social.index') }}" class="nav-link {{$route == 'social.index'?'active':''}}" >
                  <i class="far fa-circle nav-icon"></i>
                  <p>Social Media </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('testimonial.index') }}" class="nav-link {{$route == 'testimonial.index'?'active':''}}" >
                  <i class="far fa-circle nav-icon"></i>
                  <p>Testimonials</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('message.index') }}" class="nav-link {{$route == 'message.index'?'active':''}}" >
                  <i class="far fa-circle nav-icon"></i>
                  <p>Message</p>
                </a>
              </li> --}}
              {{-- <li class="nav-item">
                <a href="{{ route('logo.index') }}" class="nav-link {{$route == 'logo.index'?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Logo</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('about.index') }}" class="nav-link {{$route == 'about.index'?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>About Us</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('mission.index') }}" class="nav-link {{$route == 'mission.index'?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Mission </p>
                </a>
              </li> --}}
              {{-- <li class="nav-item">
                <a href="{{ route('vision.index') }}" class="nav-link {{$route == 'vision.index'?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Vision </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('focus.index') }}" class="nav-link {{$route == 'focus.index'?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Focus Area </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('event.index') }}" class="nav-link {{$route == 'event.index'?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Event</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('blog.index') }}" class="nav-link {{$route == 'blog.index'?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Blog</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('team.index') }}" class="nav-link {{$route == 'team.index'?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Team</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('social.index') }}" class="nav-link {{$route == 'social.index'?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Social Media</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('general.index') }}" class="nav-link {{$route == 'general.index'?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>General Information</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('partner.index') }}" class="nav-link {{$route == 'partner.index'?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Partner</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('testimonial.index') }}" class="nav-link {{$route == 'testimonial.index'?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Testimonial</p>
                </a>
              </li> --}}
            </ul>
          </li>


          <li class="nav-header">EXAMPLES</li>
 
          <li class="nav-header">MISCELLANEOUS</li>

          <li class="nav-header">MULTI LEVEL EXAMPLE</li>

          <li class="nav-header">LABELS</li>
    
 
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>