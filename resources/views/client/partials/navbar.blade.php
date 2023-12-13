<nav class="navbar navbar-expand-lg navbar-light bg-white py-3">
  <div class="container px-5">
      <a class="navbar-brand" href="/"><span class="fw-bolder text-primary">
    <img src="https://cdn.discordapp.com/attachments/1169305806651535505/1177530308753629195/logo_web_fix.png?ex=6572d78f&is=6560628f&hm=24de6691a5adcb9576079858dcb64cb43a355f05956da1c8d329dff294fac803&" width="50" height="60" alt="">    
    </span></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0 small fw-bolder">
              <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
              <li class="nav-item"><a class="nav-link" href="/author">Authors</a></li>

            @auth
            @if (auth()->user()->is_admin)
            <li class="nav-item"><a class="nav-link" href="/dashboard">Dashboard</a></li>

            @endif
            <li class="nav-item"><a class="nav-link" href="/tasks">Tasks</a></li>
            <li class="nav-item"><a class="nav-link" href="/priority">Priority Tasks</a></li>
            @endauth
            @guest
            <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
            @endguest
              @auth
              <li class="dropdown nav-item mt-1/4">
                  
                <a class="nav-link dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  {{auth()->user()->name}}
                </a>
                <ul class="dropdown-menu">
                  <li> <form method="post" action="{{ route('logout') }}">
                    @csrf
                    <button class="dropdown-item" data-toggle="modal" data-target="#logoutModal" type="submit"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout</button>
                </form></li>
                  <li><a class="dropdown-item" href="/profile">
                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile</a></li>
                </ul>
              </li> 
              @endauth
               
              
              
          </ul>
      </div>
  </div>
</nav>