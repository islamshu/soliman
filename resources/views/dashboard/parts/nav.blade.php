<nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light bg-dark navbar-shadow">
  <div class="navbar-wrapper">
    <div class="navbar-header">
      <ul class="nav navbar-nav flex-row">
        <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
        <li class="nav-item">
          <a class="navbar-brand" href="{{ route('dashboard') }}">
            <img class="brand-logo" alt="modern admin logo" style="width: 100%;" src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/ee/Aramex_logo.svg/1024px-Aramex_logo.svg.png"> 
          </a>
        </li>
        <li class="nav-item d-md-none">
          <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="la la-ellipsis-v"></i></a>
        </li>
      </ul>
    </div>
    <div class="navbar-container content">
      <div class="collapse navbar-collapse" id="navbar-mobile">
        <ul class="nav navbar-nav mr-auto float-left">
          <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"></i></a></li>
          <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i class="ficon ft-maximize"></i></a></li>
      
         
        </ul>
        <ul class="nav navbar-nav float-right">
          <li class="dropdown dropdown-user nav-item">
            <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown" aria-expanded="false">
              
                <span class="user-name text-bold-700">{{ auth()->user()->name }}</span>
              
              <span class="avatar avatar-online">
                <img src="http://website.foryougo.net/backend/images/portrait/small/avatar-s-19.png" alt="avatar"><i></i></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              
              <div class="dropdown-divider"></div><a class="dropdown-item" href="{{ route('logout') }}"><i class="ft-power"></i> @lang('تسجيل خروج')</a>
            </div>
          </li>
          
          
          
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <!-- Full Screen Button -->
         
          @php
          $notifications = auth()->user()->unreadNotifications;
          $count = auth()->user()->unreadNotifications->count();

      @endphp
          <li class="dropdown dropdown-notification nav-item">
            <a class="nav-link nav-link-label" id="reeed" href="#" data-toggle="dropdown" aria-expanded="false"><i class="ficon ft-bell"></i>
              <span class="badge badge-pill badge-default badge-danger badge-default badge-up badge-glow usercount " id="count">{{ $count }}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
              <li class="dropdown-menu-header">
                <h6 class="dropdown-header m-0">
                  <span class="grey darken-2">@lang('Notifications')</span>
                </h6>
              </li>
              
              <li class="scrollable-container media-list w-100 ps-container ps-theme-dark" data-ps-id="0aa33947-2a90-7244-da0a-58037619abb6" id="data_notify">
                @forelse  ($notifications as $item)

                <a href="{{ route('show.notification',$item->id) }}">
                  <div class="media">
                    <div class="media-left align-self-center"><i class="ft-plus-square icon-bg-circle bg-cyan"></i></div>
                    <div class="media-body">
                      <h6 class="media-heading">@if(get_lang() == 'ar') {{$item->data['title_ar'] }} @else {{$item->data['title_en'] }} @endif</h6>
                      <small>
                        
                        <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">{{ \Carbon\Carbon::parse($item->data['time'])->diffForhumans() }}</time>
                      </small>
                    </div>
                  </div>
                </a>
                @endforeach
             
              <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 3px;"><div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; right: -8px;"><div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></li>
              <li class="dropdown-menu-footer"><a class="dropdown-item text-muted text-center" id="read_notofication" href="javascript:void(0)">@lang('Read all notifications')</a></li>
            </ul>
          </li>










          

         
        </ul>
      </div>
    </div>
  </div>
</nav>