  <div class="col-md-3 col-lg-2 bg-dark text-white vh-100 p-3">
      <h4 class="fw-bold mb-4">Menu</h4>
      <h5 class="fw-bold mb-4"> <i class='far fa-user-circle' style='font-size:26px'></i> {{ Auth::user()->name }}</h5>
      <ul class="nav flex-column gap-2">
          <li class="nav-item">
              <a href="/admin/admindashboard" class="nav-link text-white">Dashboard</a>
          </li>
          <li class="nav-item">
              <a href="/admin/userslist" class="nav-link text-white">Users List Management</a>
          </li>
          <li class="nav-item">
              <a href="/admin/adminblogs" class="nav-link text-white">Blog Management</a>
          </li>
          <li class="nav-item">

              <form action="/logout" method="POST">
                  @csrf
                  <button class="nav-link text-white" type="submit">Logout</button>
              </form>
          </li>
      </ul>
      </ul>
  </div>
