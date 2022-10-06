<div class="sl-sideleft">
    <div class="input-group input-group-search">
      <input type="search" name="search" class="form-control" placeholder="Search">
      <span class="input-group-btn">
        <button class="btn"><i class="fa fa-search"></i></button>
      </span><!-- input-group-btn -->
    </div><!-- input-group -->

    <label class="sidebar-label">Navigation</label>
    <div class="sl-sideleft-menu">
      <a href=" {{ route('frontend') }} " class="sl-menu-link ">
        <div class="sl-menu-item">
          <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
          <span class="menu-item-label">Visit Site</span>
        </div><!-- menu-item -->
      </a><!-- sl-menu-link -->
      <a href=" {{ route('admin-dashboard') }} " class="sl-menu-link @yield('dashboard')">
        <div class="sl-menu-item">
          {{-- <i class="fa fa-universal-access" aria-hidden="true"></i> --}}
          <i class="fa fa-tachometer tx-20"></i>
          <span class="menu-item-label">Dashboard</span>
        </div><!-- menu-item -->
      </a><!-- sl-menu-link -->
      <a href=" {{ route('company-profile') }} " class="sl-menu-link @yield('company-profile')">
        <div class="sl-menu-item">
          {{-- <i class="fa fa-universal-access" aria-hidden="true"></i> --}}
          <i class="fa fa-empire tx-20"></i>
          <span class="menu-item-label">Company Profile</span>
        </div><!-- menu-item -->
      </a><!-- sl-menu-link -->
      <a href="#" class="sl-menu-link @yield('categories')">
        <div class="sl-menu-item">
          <i class="menu-item-icon fa fa-th tx-20"></i>
          <span class="menu-item-label">Category</span>
          <i class="menu-item-arrow fa fa-angle-down"></i>
        </div><!-- menu-item -->
      </a><!-- sl-menu-link -->
      <ul class="sl-menu-sub nav flex-column">
        <li class="nav-item"><a href=" {{ route('categories') }} " class="nav-link @yield('add-categories')">Add Category</a></li>
        <li class="nav-item"><a href=" {{ route('subcategories') }} " class="nav-link @yield('add-sub-categories')">Add Sub Category</a></li>
        <li class="nav-item"><a href=" {{ route('brands') }} " class="nav-link @yield('add-brands')">Add Brands</a></li>
        <li class="nav-item"><a href=" {{ route('products') }} " class="nav-link @yield('add-products')">Add Products</a></li>
      </ul>
    </div><!-- sl-sideleft-menu -->
    <br>
</div><!-- sl-sideleft -->