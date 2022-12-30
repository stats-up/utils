@extends("sup.base")

@section("head")
    @livewireStyles
@endsection

@section("body")
    @livewire("sup.database")
    @livewireScripts
@endsection