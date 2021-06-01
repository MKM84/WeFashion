{{-- <li class="nav-item">
    <form action="{{route('product.search')}}" class="flex-form">

    <div class="form-group mb-0">
        <input type="text" name="q" class="form-control" value="{{ request()->q ?? ''}}" >
    </div>
        <button type="submit" class="btn btn-info glyphicon glyphicon-search"></button>
    </form>
</li> --}}
<li class="nav-item container-fluid">

<form class="navbar-form navbar-right" action="{{route('product.search')}}">
    <div class="form-group search-ctn">
      <input type="text" name="q" class="form-control form-search" value="{{ request()->q ?? ''}}"  placeholder="Chercher...">
      <button class="btn btn-default glyphicon glyphicon-search btn-search text-center" type="submit"></button>

    </div><!-- /input-group -->

  </form><!-- /.col-lg-6 -->
</li>


