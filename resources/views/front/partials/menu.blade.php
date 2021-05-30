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

      <span class="navbar-brand logo-wef"><a href="{{ url('/') }}"><strong>WE FASHION</strong></a></span>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

      <ul class="nav navbar-nav">
        <li class="nav-item @if(isset($activeSoldes)) active @endif"><a class="nav-link text-uppercase"
            href="{{ url('/soldes') }}">Soldes</a></li>
        @if(isset($categories))
        @forelse($categories as $id => $gender)
        <li class="nav-item @if(isset($activeCategory) && $activeCategory == $gender['gender']) active @endif">
          <a class="nav-link text-uppercase"
            href="{{route('category', $categories[$id]->id)}}">{{$gender["gender"]}}</a>
          @empty
        <li></li>
        @endforelse
        @endif
      </ul>
      <ul class="nav navbar-nav navbar-right">
        {{-- Return true if connected --}}
        @if (Auth::check())
        <li class="nav-item"><a href="{{ url('/admin') }}">
            <span class="glyphicon glyphicon-edit"></span>
          </a></li>


        @endif
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->

</nav>