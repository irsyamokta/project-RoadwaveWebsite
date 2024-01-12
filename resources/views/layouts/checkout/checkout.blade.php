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
                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Keranjang Belanja</span>
              </div>
            </li>
          </ol>
        </nav>
        <div class="w-full mx-auto mb-3">
          <h3 class="text-lg font-bold text-slate-700 dark:text-gray-200">Keranjang Belanja</h3>
        </div>
        <div class="w-full bg-gray-200 p-3 mb-2 flex dark:bg-gray-700">
          <div class="w-24 mr-5">
            <h3 class="text-sm text-slate-700 dark:text-slate-200">Produk</h3>
          </div>
          <div class="w-full space-x-5 hidden sm:flex">
            <div class="sm:flex-1 justify-center">
              <h3 class="text-sm text-slate-700 dark:text-slate-200">Nama Barang</h3>
            </div>
            <div class="sm:flex-1 justify-center">
              <h3 class="text-sm text-slate-700 dark:text-slate-200 lg:text-center text-start">Harga</h3>
            </div>
            <div class="sm:flex-1 justify-center">
              <h3 class="text-sm text-slate-700 dark:text-slate-200 lg:text-center text-start">Ukuran</h3>
            </div>
            <div class="sm:flex-1 justify-center">
              <h3 class="text-sm text-slate-700 dark:text-slate-200">Jumlah</h3>
            </div>
          </div>
        </div>
        <div class="w-full mx-auto space-y-2 mb-5">
        {{-- @foreach ($carts as $cart) --}}
        @foreach ($products as $product)
          <div class="w-full border-2 border-slate-200 p-3">
            <div class="w-full mx-auto flex">
              <div class="w-24 h-32 flex items-center bg-slate-100 mr-2">
                <a href="" class="">
                  <img src="{{ url('storage/assets/product/' . $product->image . '') }}" alt="product" />
                </a>
              </div>
              <div class="flex flex-wrap justify-between w-full sm:space-x-5">
                <div class="flex items-center sm:flex-1 order-1">
                  <a href="" class="flex items-center">
                    <h5 class="text-sm text-slate-700 dark:text-gray-200">{{ $product->name }}</h5>
                  </a>
                </div>
                <div class="flex justify-center items-center sm:flex-1 order-2 sm:order-3">
                  <select
                    id="size"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-xs focus:ring-blue-500 focus:border-blue-500 block w-[116px] p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  >
                    <option selected>{{ $product->size }}</option>
                    <option value="S">S</option>
                    <option value="M">M</option>
                    <option value="L">L</option>
                    <option value="XL">XL</option>
                  </select>
                </div>
                <div class="flex justify-center sm:flex-1 items-center order-3 sm:order-2">
                  <div class="flex justify-start items-center flex-wrap">
                    <p class="text-sm text-red-600 mr-0.5">Rp</p>
                    <p class="text-sm text-red-600 mr-1">{{ number_format($product->price, 0, ',', '.') }}</p>
                    <p class="text-sm mr-0.5 dark:text-slate-600"><s>Rp</s></p>
                    <p class="text-sm dark:text-slate-600"><s>120.000</s></p>
                  </div>
                </div>
                <div class="flex justify-between w-full sm:flex-1 items-center order-4">
                  <div class="mr-5">
                    <form class="max-w-xs mx-auto">
                      <div class="relative flex items-center max-w-[11rem]">
                        <button
                          type="button"
                          id="decrement-button"
                          data-input-counter-decrement="bedrooms-input"
                          class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 p-2 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none"
                        >
                          <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16" />
                          </svg>
                        </button>
                        <input
                          type="text"
                          id="bedrooms-input"
                          data-input-counter
                          data-input-counter-min="1"
                          data-input-counter-max="10"
                          aria-describedby="helper-text-explanation"
                          class="bg-gray-50 border-x-0 border-gray-300 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-14 py-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                          placeholder=""
                          value="1"
                          required
                        />
  
                        <button
                          type="button"
                          id="increment-button"
                          data-input-counter-increment="bedrooms-input"
                          class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 p-2 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none"
                        >
                          <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
                          </svg>
                        </button>
                      </div>
                    </form>
                  </div>
                  <div class="">
                    <button type="button" class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-slate-300 font-medium rounded-lg text-sm py-1.5 px-2.5 focus:outline-none dark:focus:ring-gray-600">X</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="w-full bg-gray-200 dark:bg-gray-700 mt-2 py-2 px-1 flex justify-between">
              <div class="justify-center flex-none">
                <h3 class="text-sm text-slate-700 dark:text-slate-200 font-semibold">SubTotal</h3>
              </div>
              <div class="justify-start flex">
                <h3 class="text-sm text-slate-700 dark:text-slate-200 font-semibold mr-1">Rp</h3>
                <h3 class="text-sm text-slate-700 dark:text-slate-200 font-semibold">{{ number_format($product->price, 0, ',', '.') }}</h3>
              </div>
            </div>
          </div>
          @endforeach
        </div>
        <div class="rounded-md w-full border-2 border-slate-200 p-3 block space-y-2 md:space-y-0 md:flex md:justify-between my-7">
          <div class="flex space-x-1 items-center justify-between">
            <h3 class="text-base text-slate-700 dark:text-slate-200 font-semibold">Total</h3>
            <div class="flex">
              <h3 class="text-base text-slate-700 dark:text-slate-200 font-bold mr-1">Rp</h3>
              <h3 class="text-base text-slate-700 dark:text-slate-200 font-bold">{{ number_format($product->price, 0, ',', '.') }}</h3>
            </div>
          </div>
          <button type="button" class="w-full md:w-32 lg:w-64 text-white bg-mainColor hover:bg-mainColorOld focus:ring-4 focus:ring-slate-300 font-medium rounded-lg text-sm py-3 px-4 focus:outline-none dark:focus:ring-gray-600 md:items-center md:mt-1 font-semibold">Checkout</button>
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