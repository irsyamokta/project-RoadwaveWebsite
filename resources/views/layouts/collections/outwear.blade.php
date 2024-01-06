@extends('index')
@auth
  @include('layouts.navigasi.navbar')
@endauth
@guest
  @include('layouts.navigasi.navbarguest')
@endguest
@include('layouts.navigasi.sidebar')
@section('title', 'Outwear')


@auth
  @include('layouts.footer')
@endauth
@guest
  @include('layouts.footerguest')
@endguest
@include('layouts.navigasi.bottombar')