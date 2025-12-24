  <div class="col-md-3 col-lg-2 bg-dark text-white vh-100 p-3">
      <h4 class="fw-bold mb-4">Menu</h4>
      <h5 class="fw-bold mb-4"> <i class='far fa-user-circle' style='font-size:26px'></i> {{ Auth::user()->name }}</h5>
      <ul class="nav flex-column gap-2">
          <li class="nav-item">
              <a href="/user/dashboard" class="nav-link text-white"><i class="fa fa-dashboard"></i> Dashboard</a>
          </li>
          <li class="nav-item">
              <a href="/user/userprofile" class="nav-link text-white"><i class="fa fa-user"></i> User Profile</a>
          </li>
          <li class="nav-item">
              <a href="/user/userblogs" class="nav-link text-white"><i class="fa fa-blog"></i> Blog Management</a>
          </li>
          <li class="nav-item">
              <form action="/logout" method="POST">
                  @csrf
                  <button class="nav-link text-white" type="submit"><i class="fa fa-sign-out"></i> Logout</button>
              </form>
          </li>
      </ul>
  </div>
