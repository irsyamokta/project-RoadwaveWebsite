@extends('index')
@section('title', 'View Product')
@section('content')
@auth
  @include('layouts.navigasi.navbar')
@endauth
@guest
  @include('layouts.navigasi.navbarguest')
@endguest
@include('layouts.navigasi.sidebar')
<!-- BreadCrumb -->
@foreach ($products as $product)
<main class="max-w-screen-xl mx-auto mt-24 px-4">
<nav class="flex mb-7 w-full mx-auto" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
      <li class="inline-flex items-center">
        <a href="/" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-600 dark:text-gray-200 dark:hover:text-white">
          <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path
              d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"
            />
          </svg>
          Home
        </a>
      </li>
      <li></li>
      <li aria-current="page">
        <div class="flex items-center">
          <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
          </svg>
          <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">{{ $product->name }}</span>
        </div>
      </li>
    </ol>
  </nav>
  <div class="lg:flex lg:w-full lg:space-x-2 space-y-2 lg:space-y-0 mb-5">
    <div class="sm:grid sm:grid-cols-5 sm:gap-5 border-2 shadow-sm rounded-lg py-4 px-2 lg:flex-auto lg:w-2/3">
      <div class="max-w-lg mx-auto mb-3 md:mb-0 col-span-2">
        <img src="{{ url('storage/assets/product/' . $product->image . '') }}" alt="" class="" />
      </div>
      <div class="max-w-lg mx-auto col-span-3">
        <h3 class="text-lg font-bold text-slate-700 dark:text-gray-200 mb-3">{{ $product->name }}</h3>
        <h3 class="text-base font-bold text-slate-700 dark:text-gray-200">Deskripsi</h3>
        <p class="text-sm mb-2 dark:text-slate-300">{{ $product->description }}</p>
        <div class="mb-2">
          <p class="text-sm dark:text-slate-300">Detail</p>
          <p class="text-sm dark:text-slate-300">Produk Original Roadwave</p>
          <p class="text-sm dark:text-slate-300">Kaos Pria</p>
          <p class="text-sm dark:text-slate-300">Bahan: Katun</p>
          <p class="text-sm dark:text-slate-300">Warna: {{ $product->color }}</p>
        </div>
        <div class="mb-2">
          <p class="text-sm dark:text-slate-300">Ukuran:</p>
          <p class="text-sm dark:text-slate-300">S : Lebar Dada 51,5 cm, Panjang Badan 70,5 cm, Panjang Tangan 21 cm</p>
          <p class="text-sm dark:text-slate-300">M : Lebar Dada 53,5 cm, Panjang Badan 72,5 cm, Panjang Tangan 22 cm</p>
          <p class="text-sm dark:text-slate-300">L : Lebar Dada 55,5 cm, Panjang Badan 74,5 cm, Panjang Tangan 23 cm</p>
          <p class="text-sm dark:text-slate-300">XL : Lebar Dada 57,5 cm, Panjang Badan 76,5 cm, Panjang Tangan 24 cm</p>
        </div>
        <div class="mb-2">
          <p class="text-sm dark:text-slate-300">Catatan</p>
          <p class="text-sm dark:text-slate-300">Toleransi Ukuran (-+) 1-3 cm Warna mungkin dapat berbeda akibat cahaya saat pengambilan gambar maupun kondisi gadget saat melihat gambar ini</p>
        </div>
        <div class="mb-2">
          <p class="text-sm dark:text-slate-300">#fashion #kaospria #kaospriakatun</p>
        </div>
      </div>
    </div>
    @endforeach
    <div class="rounded-lg w-full lg:flex-auto lg:w-1/3">
      <div class="shadow-sm border-2 rounded-lg py-4 px-4 w-full">
        <h3 class="text-base font-bold text-slate-700 dark:text-gray-200 mb-7">Silahkan Pilih Varian</h3>
        <h3 class="text-base font-bold text-slate-700 dark:text-gray-200 ">SubTotal</h3>
        <div class="flex justify-between mb-7">
          <div class="flex items-center justify-center">
            <p class="text-base mr-1 dark:text-slate-600"><s>Rp</s></p>
            <p class="text-base dark:text-slate-600"><s>120.000</s></p>
          </div>
          <div class="flex justify-start items-center flex-wrap">
            <p class="text-base text-red-600 mr-1">Rp</p>
            <p class="text-base text-red-600 mr-2">90.000</p>
            <span class="bg-red-600 px-1 py-[5px] text-white font-semibold text-sm rounded">20%</span>
          </div>
        </div>
        <div class="">
          <h3 class="text-base font-bold text-slate-700 dark:text-gray-200 mb-2">Ukuran</h3>
          <div class="flex mb-7 space-x-7">
            <div class="flex items-center">
              <input
                id="default-radio-1"
                type="radio"
                value=""
                name="default-radio"
                class="w-4 h-4 text-mainColor bg-gray-100 border-gray-300 focus:ring-slate-200 dark:focus:ring-gray-700 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
              />
              <label for="default-radio-1" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">S</label>
            </div>
            <div class="flex items-center">
              <input
                id="default-radio-1"
                type="radio"
                value=""
                name="default-radio"
                class="w-4 h-4 text-mainColor bg-gray-100 border-gray-300 focus:ring-slate-200 dark:focus:ring-gray-700 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
              />
              <label for="default-radio-1" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">M</label>
            </div>
            <div class="flex items-center">
              <input
                id="default-radio-1"
                type="radio"
                value=""
                name="default-radio"
                class="w-4 h-4 text-mainColor bg-gray-100 border-gray-300 focus:ring-slate-200 dark:focus:ring-gray-700 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
              />
              <label for="default-radio-1" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">L</label>
            </div>
            <div class="flex items-center">
              <input
                id="default-radio-1"
                type="radio"
                value=""
                name="default-radio"
                class="w-4 h-4 text-mainColor bg-gray-100 border-gray-300 focus:ring-slate-200 dark:focus:ring-gray-700 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
              />
              <label for="default-radio-1" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">XL</label>
            </div>
          </div>
          <div class="mb-7">
            <h3 class="text-base font-bold text-slate-700 dark:text-gray-200 mb-2">Warna</h3>
            <span class="flex w-5 h-5 me-3 bg-white border  rounded-full"></span>
          </div>
          <div class="w-full flex items-center space-x-2">
            <button
              type="button"
              class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-slate-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-slate-300 flex-auto w-1/5 flex flex-auto justify-center items-center"
            >
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 group-hover:text-white">
              <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
            </svg>
              
            </button>
            <button
              type="button"
              class="text-slate-100 bg-mainColor hover:bg-mainColorOld focus:ring-4 focus:ring-slate-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-mainColor dark:hover:bg-mainColorOld focus:outline-none dark:focus:ring-slate-300 flex justify-center items-center flex-auto w-4/5"
            >
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2 group-hover:text-white">
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"
              />
            </svg>
              <a href="{{ route('cart', $product->id) }}">Tambahkan ke Keranjang</a>
            </button>
          </div>
        </div>
      </div>
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
