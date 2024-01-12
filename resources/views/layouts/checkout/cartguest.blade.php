@extends('index')
@section('title', 'Cart')
@section('content')
    @auth
        @include('layouts.navigasi.navbar')
    @endauth
    @guest
        @include('layouts.navigasi.navbarguest')
    @endguest
    @include('layouts.navigasi.sidebar')
<main class="max-w-screen-xl mx-auto mt-24 px-4">
    <div class="w-full mx-auto mb-7">
      <h3 class="text-xl font-semibold text-slate-700 dark:text-gray-200">Keranjang Belanja</h3>
    </div>
    <div class="w-full flex flex-col mx-auto justify-center items-center mb-5">
        <img src="/resource/cartNull-removebg-preview.png" class="w-64 mb-5" alt="" />
        <h4 class="text-lg text-center font-semibold text-slate-700 dark:text-gray-200 mb-3">Anda perlu login terlebih dahulu untuk mengakses halaman ini</h4>
        <p class="text-sm text-center text-slate-700 dark:text-gray-200 mb-5">Sepertinya anda belum login atau belum memiliki akun, silahkan klik tombol di bawah ini untuk login atau daftar akun baru</p>
        <button
          type="button"
          class="text-white bg-mainColor hover:bg-mainColorOld focus:ring-4 focus:ring-slate-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-mainColor dark:hover:bg-mainColorOld focus:outline-none dark:focus:ring-slate-300"
        >
         <a href="{{ route('login') }}">Masuk</a> 
        </button>
      </div>
    <div class="w-full mx-auto">
      <div class="w-full mx-auto flex justify-between items-center">
        <h3 class="text-xl font-semibold text-slate-700 dark:text-gray-200 mb-5">Produk Impianmu</h3>
        <a href="{{ route('tshirt') }}">
          <h3 class="text-sm font-semibold text-mainColor mb-5">Lihat Lainnya</h3>
        </a>
      </div>
      <div class=" grid grid-cols-2 gap-4 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 w-full max-w-screen-xl mx-auto">
          @foreach ($products as $product)
        <div class="bg-white border border-gray-200 rounded-lg shadow dark:bg-darkmodeOther dark:border-gray-700">
          <a href="{{ route('productdetail', $product->id) }}">
            <img src="{{ url('storage/assets/product/' . $product->image . '') }}" class="rounded-t-lg" width="w-full" alt="" />
          </a>
          <div class="px-2 py-3">
            <h3 class="text-slate-500 text-xs">{{ $product->category }}</h3>
            <a href="{{ route('productdetail', $product->id) }}">
              <h5 class="text-base font-bold text-gray-900 dark:text-gray-200 mb-1">{{ $product->name }}</h5>
            </a>
            <div class="flex justify-between">
              <div class="flex justify-start items-center flex-wrap">
                <p class="text-xs text-red-600 mr-0.5">Rp</p>
                <p class="text-xs text-red-600 mr-1">{{ number_format($product->price, 0, ',', '.') }}</p>
                <p class="text-xs mr-0.5 dark:text-slate-600"><s>Rp</s></p>
                <p class="text-xs dark:text-slate-600"><s>120.000</s></p>
              </div>
              <div class="flex items-center justify-center ml-1">
                <span class="bg-red-600 px-1 py-[5px] text-white font-semibold text-[10px] rounded">20%</span>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
  </div>
  </main>
@auth
  @include('layouts.footer.footer')
@endauth
@guest
  @include('layouts.footer.footerguest')
@endguest
@include('layouts.navigasi.bottombar')
@endsection