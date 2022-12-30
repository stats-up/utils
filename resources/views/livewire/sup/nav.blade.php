<div>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="/sup/home">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="/sup">Home</a>
          </li>
          @foreach ($vistas as $vista)
          @if ($vista != "" && $vista != "sup" && $vista != "nav" && $vista != "home")
          <li class="nav-item">
            <a class="nav-link" href="/sup/{{$vista}}">{{$vista}}</a>
          </li>
          @endif
          @endforeach
        </ul>
      </div>
    </div>
  </nav>
  <hr>
</div>