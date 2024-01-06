@extends('master')
@section('content')
@auth
    {{-- Navbar start --}}
    @include('layouts.navigasi.navbar')
    {{-- Navbar end --}}

    {{-- Hero start --}}
    @include('layouts.hero')
    {{-- Hero end --}}

    {{-- Product best seller start --}}
    @include('layouts.best')
    {{-- Product best seller end --}}

    {{-- Display product start --}}
    @include('layouts.ourproduct')
    {{-- Display product end --}}

    {{-- Footer start --}}
    @include('layouts.footer')
    {{-- Footer end --}}

    @include('script')
@endauth
@guest
    {{-- Navbar start --}}
    @include('layouts.navigasi.navbarguest')
    {{-- Navbar end --}}

    {{-- Hero start --}}
    @include('layouts.hero')
    {{-- Hero end --}}

    {{-- Product best seller start --}}
    @include('layouts.best')
    {{-- Product best seller end --}}

    {{-- Display product start --}}
    @include('layouts.ourproduct')
    {{-- Display product end --}}

    {{-- Footer start --}}
    @include('layouts.footerguest')
    {{-- Footer end --}}

    @include('script')
@endguest
@endsection