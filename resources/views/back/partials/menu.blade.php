<nav class="navbar navbar-default">
  <div class="container-fluid">

    <div class="navbar-header container-fluid">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
        data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <span class="navbar-brand logo-wef"><strong>WE FASHION</strong></span>

    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="nav-item"><a class="nav-link text-uppercase" href="{{ url('/admin') }}">Produits</a></li>
        <li class="nav-item"><a class="nav-link text-uppercase" href="{{ url('/admin/category') }}">Catégories</a></li>
      </ul>

      <ul class="nav navbar-nav navbar-right">

        <li class="nav-item"><a href="{{ url('/') }}">
            <span class="glyphicon glyphicon-home"></span>
          </a>
        </li>
        <li class="nav-item"><a class="nav-link text-uppercase" href="{{ route('logout') }}"
            onclick=" event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          {{ csrf_field() }}
        </form>

      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>