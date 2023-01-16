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
            <a href="{{ route('menus.index') }}">
                <i class="fa fa-slideshare"></i>
                <span class="menu-title">القوائم       </span></a>
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
          <a href="{{ route('how_it_works.index') }}">
              <i class="fa fa-star"></i>
              <span class="menu-title">كيف يعمل الموقع       </span></a>
         </li>
         <li class="nav-item  ">
          <a href="{{ route('prodcuts.index') }}">
              <i class="fa fa-product-hunt"></i>
              <span class="menu-title">المنتجات       </span></a>
         </li>
         <li class="nav-item  ">
          <a href="{{ route('mails') }}">
              <i class="fa fa-product-hunt"></i>
              <span class="menu-title">طلبات البريد الالكتروني       </span></a>
         </li>
         <li class="nav-item has-sub ">
          <a href="#">
              <i class="fa fa-cog"></i>
              <span class="menu-title">الاعدادات</span></a>
          <ul class="menu-content" style="">
              <li class="is-shown"><a class="menu-item" href="{{ route('system_info') }}">البيانات الاساسية</a>
              </li>
              <li class="is-shown"><a class="menu-item" href="{{ route('socail') }}">  اعدادات السوشل ميديا   </a>
              </li>
              <li class="is-shown"><a class="menu-item" href="{{ route('paid_info') }}"> اعدادات الدفع</a>
              </li>
              <li class="is-shown"><a class="menu-item" href="{{ route('about_page') }}">  صفحة من نحن  </a>
              </li>
              <li class="is-shown"><a class="menu-item" href="{{ route('returns_exchange_page') }}">  صفحة سياسة الاسترجاع </a>
              </li>
              <li class="is-shown"><a class="menu-item" href="{{ route('usage_policy_page') }}">  صفحة سياسة الاستخدام </a>
              </li>

              

              
           
    
    
          </ul>
      </li>
    </ul>
  </div>
</div>