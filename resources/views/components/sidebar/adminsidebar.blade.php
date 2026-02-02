  <style>
    .nav-link.active{
    background:linear-gradient(135deg,#6366f1,#8b5cf6);
    color:#fff !important;
    border-radius:8px;
    font-weight:600;
}

.nav-link:hover{
    background:rgba(255,255,255,.1);
    border-radius:8px;
}

  </style>
  <div class="col-md-3 col-lg-2 bg-dark text-white vh-100 p-3">
      <h4 class="fw-bold mb-4">Menu</h4>
      <h5 class="fw-bold mb-4"> <i class='far fa-user-circle' style='font-size:26px'></i> {{ Auth::user()->name }}</h5>
      <ul class="nav flex-column gap-2">
          <li class="nav-item">
              <a href="/admin/admindashboard" class="nav-link text-white {{ Request::is('admin/admindashboard*') ? 'active' : '' }}"><i class="fa fa-dashboard"></i> Dashboard</a>
          </li>

          <li class="nav-item">
              <a href="/admin/userslist" class="nav-link text-white {{ Request::is('admin/userslist*') ? 'active' : '' }}"><i class="fa fa-users"></i> Users List Management</a>
          </li>
          <li class="nav-item">
              <a href="/admin/adminblogs" class="nav-link text-white {{ Request::is('admin/adminblogs*') ? 'active' : '' }}"> <i class="fa fa-blog"></i> Blog Management</a>
          </li>

          <li class="nav-item">
              <a href="/admin/mailbox" class="nav-link text-white {{ Request::is('admin/mailbox*') ? 'active' : '' }}"><i class="fa fa-envelope"></i> Mail Box</a>
          </li>

          <li class="nav-item">
<<<<<<< HEAD
              <a href="/admin/categories" class="nav-link text-white {{ Request::is('admin/categories*') ? 'active' : '' }}"><i class="fa fa-cubes"></i> Category Set</a>
          </li>

          <li class="nav-item">
=======
>>>>>>> 0bd373c53cca39c0ea4a4d40ddb035e1b6e7ad00

              <form action="/logout" method="POST">
                  @csrf
                  <button class="nav-link text-white" type="submit"><i class="fa fa-sign-out"></i> Logout</button>
              </form>
          </li>
      </ul>
      </ul>
  </div>
