@extends('admin.index')
@section('title', 'Admin Product')
@section('content')
@include('admin.navigasi.sidebarproduct')
<div class="relative overflow-x-auto shadow-md sm:rounded-lg ml-8 mr-8 p-6 md:ml-64 md:mr-10 md:mt-10">
    <div class="flex justify-between md:justify-between">
        <h1 class="text-md md:text-xl font-bold mb-7">Daftar Produk Roadwave</h1>
        <button type="button" class="w-[95px] h-[35px] text-[8px] md:w-[120px] md:h-[40px] md:text-[12px] font-medium text-center text-white bg-mainColor rounded-lg hover:bg-mainColorOld focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><a href="{{ route('addproduct') }}">Tambah Produk</a></button>
    </div>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Kode
                </th>
                <th scope="col" class="px-6 py-3">
                    Nama Produk
                </th>
                <th scope="col" class="px-6 py-3">
                    Kategori
                </th>
                <th scope="col" class="px-6 py-3">
                    Harga
                </th>
                <th scope="col" class="px-4 py-3">
                    Size
                </th>
                <th scope="col" class="px-6 py-3">
                    Warna
                </th>
                <th scope="col" class="px-4 py-3">
                    Kuantitas
                </th>
                <th scope="col" class="px-6 py-3">
                    Aksi
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    RDW{{ $product->id }}
                </th>
                <td class="px-6 py-4">
                    {{ $product->name }}
                </td>
                <td class="px-6 py-4">
                    {{ $product->category }}
                </td>
                <td class="px-6 py-4">
                    Rp{{ number_format($product->price, 0, ',', '.') }}
                </td>
                <td class="px-6 py-4">
                    {{ $product->size }}
                </td>
                <td class="px-6 py-4">
                    {{ $product->color }}
                </td>
                <td class="px-6 py-4">
                    {{ $product->quantity }}
                </td>
                <td>
                    <div class="inline-flex items-center rounded-md shadow-sm">
                        <button class="text-slate-800 hover:text-mainColor text-sm bg-white hover:bg-slate-100 border border-slate-200 rounded-l-lg font-medium px-4 py-2 inline-flex space-x-1 items-center">
                            <span><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                </svg>
                            </span>
                            <span class="hidden md:inline-block"><a href="{{ route('editproduct', ['id' => $product->id]) }}">Edit</a></span>
                        </button>
                        @include('admin.crud.deleteproduct')
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
 </div>
@endsection