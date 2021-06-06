<nav class="navbar navbar-expand-lg navbar-dark bg-success">
  <div class="container">
  <a class="navbar-brand align-items-center" href="#">
      <img src="{{asset('img/brandwhite.png')}}" alt="" width="60" height="60" class="d-inline-block align-items-center ">
      Tanaman Digital
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/shop">Shop</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/blog">Blog</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/about">About</a>
        </li>
      </ul>
      @if (auth()->user()==true)
      <ul class="navbar-nav flex-row flex-wrap ms-md-auto justify-content-end">
        <div class="notification-icon">
          <span class="glyphicon glyphicon-envelope"></span>
          @if ($cartcount>=100)
          <span class="badge">100+</span>
          @else
          <span class="badge">{{$cartcount}}</span>
          @endif
        </div>
        <li class="nav-item col-6 col-md-auto">
          <a class="nav-link" href="/cart"><i class="bi bi-cart-fill"></i>
            <img src="{{asset('img/cart.png')}}" alt="" width="24" height="24">
          </a>
        </li>
        <li class="nav-item col-6 col-md-auto dropdown">
          <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" href="#"  role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="{{asset('img/user.png')}}" alt="" width="24" height="24">
          </a>
          <ul class="dropdown-menu bg-dark dropdown-menu-end dropdown-menu-lg-start" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item text-white" href="/profil">Profil</a></li>
            <li><a class="dropdown-item text-white" href="/trackorder">Track Order</a></li>
            <li><a class="dropdown-item text-white" href="/settings">Seting</a></li>
            <li><a class="dropdown-item text-white" href="/logout">Logout</a></li>
          </ul>
        </li>
      </ul>
      @else
      <div class="ms-md-auto justify-content-end">
      <a><img src="{{asset('img/cart.png')}}" alt="" width="24" height="24"> Login for Shop</a>
        <a class="btn btn-sm btn-outline-dark d-lg-inline-block my-2 my-md-0 ms-md-3" href="/login">Login</a>
        <a class="btn btn-sm btn-outline-dark d-lg-inline-block my-2 my-md-0 ms-md-3" href="/register">Register</a>
      </div>
      @endif
    </div>
  </div>

  
</nav>