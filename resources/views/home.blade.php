{{-- @extends('master')
@section('content')

        @include('layouts.navigasi.navbarguest')

        @include('layouts.hero')

        @include('layouts.best')

        @include('layouts.ourproduct')

        @include('layouts.footerguest')

        @include('script')
@guest
    
    @include('layouts.navigasi.navbarguest')

    @include('layouts.hero')

    @include('layouts.best')

    @include('layouts.ourproduct')

    @include('layouts.footerguest')

    @include('script')
@endguest
@endsection --}}

@extends('master')
@section('content')

    @auth
        {{-- Check if the user has the 'admin' role --}}
        @can('admin')
            {{-- Admin-specific content --}}
            @include('admin.dashboard')
        @else
            {{-- User-specific content --}}
            @include('layouts.navigasi.navbar')
            @include('layouts.hero')
            @include('layouts.best')
            @include('layouts.ourproduct')
            @include('layouts.footer')
        @endcan

        @include('script')

    @else
        {{-- Guest content --}}
        @include('layouts.navigasi.navbarguest')
        @include('layouts.hero')
        @include('layouts.best')
        @include('layouts.ourproduct')
        @include('layouts.footerguest')
        @include('script')

    @endauth

@endsection
