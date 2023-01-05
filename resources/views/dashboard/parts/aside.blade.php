<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
  <div class="main-menu-content">
    {{-- @if(auth()->user()->type  != 'famous' || auth()->user()->famous == null) --}}
    <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        <li class="nav-item  ">
            <a href="{{ route('edit_profile') }}">
                <i class="fa fa-user"></i>
                <span class="menu-title">تعديل الملف الشخصي</span></a>
           
        </li>
        <li class="nav-item  ">
          <a href="{{ route('sliders.index') }}">
              <i class="fa fa-slideshare"></i>
              <span class="menu-title">السلاديرات       </span></a>
         </li>
         <li class="nav-item  ">
          <a href="{{ route('categories.index') }}">
              <i class="fa fa-file"></i>
              <span class="menu-title">الفئات       </span></a>
         </li>
         <li class="nav-item  ">
          <a href="{{ route('fteures.index') }}">
              <i class="fa fa-star"></i>
              <span class="menu-title">الميزات       </span></a>
         </li>
         <li class="nav-item  ">
          <a href="{{ route('prodcuts.index') }}">
              <i class="fa fa-product-hunt"></i>
              <span class="menu-title">المنتجات       </span></a>
         </li>
         <li class="nav-item has-sub ">
          <a href="#">
              <i class="fa fa-cog"></i>
              <span class="menu-title">الاعدادات</span></a>
          <ul class="menu-content" style="">
              <li class="is-shown"><a class="menu-item" href="{{ route('system_info') }}">البيانات الاساسية</a>
              </li>
              <li class="is-shown"><a class="menu-item" href="{{ route('paid_info') }}"> اعدادات الدفع</a>
              </li>

              
           
    
    
          </ul>
      </li>
    </ul>
  </div>
</div>