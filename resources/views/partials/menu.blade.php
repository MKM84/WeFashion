<nav class="navbar navbar-default">
  <div class="container-fluid">

    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
        data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <span class="navbar-brand" ><a href="{{ url('/') }}">WeFashion</a></span>

    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav">

        <li class="nav-item @if(isset($activeSoldes)) active @endif"><a href="{{ url('/soldes') }}">SOLDES</a></li>
        {{-- <li class=""><a href="{{ url('/homme') }}">Homme</a></li>
        <li class=""><a href="{{ url('/femme') }}">Femme</a></li> --}}

        @if(isset($categories))
                @forelse($categories as $id => $gender)

                <li class="nav-item @if(isset($activeCategory) && $activeCategory == $gender['gender']) active @endif">
                <a class="nav-link text-uppercase" href="{{route('category', $categories[$id]->id)}}">{{$gender["gender"]}}</a>

                @empty 
                <li>Aucune catégorie pour l'instant</li>
                @endforelse
                @endif
      </ul>
    </div><!-- /.navbar-collapse -->

  </div><!-- /.container-fluid -->
</nav>