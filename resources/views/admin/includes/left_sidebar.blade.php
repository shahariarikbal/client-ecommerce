
    <div class="br-logo"><a href="{{ url('admin/dashboard') }}"><span>[</span><i>CTT</i><span>]</span></a></div>
    <div class="br-sideleft sideleft-scrollbar">
      <label class="sidebar-label pd-x-10 mg-t-20 op-3">Navigation</label>
      <ul class="br-sideleft-menu">
        <li class="br-menu-item">
          <a href="{{ url('admin/dashboard') }}" class="br-menu-link {{ Request::is('admin/dashboard') ? 'active' : ''}}">
            <i class="menu-item-icon icon ion-ios-home-outline tx-24"></i>
            <span class="menu-item-label">Dashboard</span>
          </a><!-- br-menu-link -->
        </li><!-- br-menu-item -->

        <label class="sidebar-label pd-x-10 mg-t-25 mg-b-20 tx-info">Manage</label>


        {{-- @dd(Session::all()) --}}

        {{-- get the role and permission array --}}
        @php
          // $role = App\Models\Role::where('role', Session::get('admin_role'))->first(); // ei admin er data
          // $role_permissions = [];
          // if($role != null && $role->permissions != null){
          //   $role_permissions = json_decode($role->permissions); // ei admin er ei roler permission ki ki
          // }
        @endphp

        {{-- admins --}}
        {{-- @if (Session::get('admin_role') == 'admin' || in_array('role', $role_permissions)) --}}

          <li class="br-menu-item">
            <a href="#" class="br-menu-link with-sub {{ Request::is('admin/admin*') ? 'show-sub' : ''}}">
              <i class="menu-item-icon icon ion-android-person tx-24"></i>
              <span class="menu-item-label">Roles</span>
            </a><!-- br-menu-link -->
            <ul class="br-menu-sub" style="{{ Request::is('admin/role*') ? 'display: block;' : 'display: none;'}}">

              <li class="sub-item">
                <a href="{{ url('admin/role/index') }}" class="sub-link {{ Request::is('admin/role/*') ? 'active' : ''}}">Roles</a>
              </li>

            </ul>
          </li>

        {{-- @endif --}}

      </ul><!-- br-sideleft-menu -->
      <br>
    </div><!-- br-sideleft -->
