<div>
    @livewire("sup.nav")
    <div class="container">
        <div class="row mt-5">
            @foreach ($vistas as $vista)
                @if ($vista != "home" && $vista != "nav") 
                    <div class="col-md-4">
                        <div class="card mt-3">
                            <div class="card-body">
                                <h5 class="card-title">{{ucfirst($vista)}}</h5>
                                <p class="card-text">Sección de <span class="text-primary">{{$vista}}</span></p>
                                <a href="/sup/{{$vista}}" class="btn btn-primary">Ir a {{$vista}}</a>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
