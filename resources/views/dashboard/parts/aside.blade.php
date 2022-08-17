<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
  <div class="main-menu-content">
    {{-- @if(auth()->user()->type  != 'famous' || auth()->user()->famous == null) --}}
    <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        <li class="nav-item  ">
            <a href="{{ route('edit_profile') }}">
                <i class="fa fa-user"></i>
                <span class="menu-title">تعديل الملف الشخصي</span></a>
           
        </li>
    </ul>
  </div>
</div>