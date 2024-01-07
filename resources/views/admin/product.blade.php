@extends('admin.index')
@section('title', 'Admin Product')
@section('content')
@include('admin.sidebarproduct')
<div class="relative overflow-x-auto shadow-md sm:rounded-lg ml-8 mr-8 p-6 md:ml-72 md:mr-10 md:mt-10">
    <div class="flex justify-between md:justify-between">
        <h1 class="text-md md:text-xl font-bold mb-7">Daftar Produk Roadwave</h1>
        <button type="button" class="w-[95px] h-[35px] text-[8px] md:w-[120px] md:h-[40px] md:text-[12px] font-medium text-center text-white bg-mainColor rounded-lg hover:bg-mainColorOld focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><a href="{{ route('addproduct') }}">Tambah Produk</a></button>
    </div>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    No
                </th>
                <th scope="col" class="px-6 py-3">
                    Nama Produk
                </th>
                <th scope="col" class="px-6 py-3">
                    Harga
                </th>
                <th scope="col" class="px-6 py-3">
                    Kategori
                </th>
                <th scope="col" class="px-6 py-3">
                    Kuantitas
                </th>
                <th scope="col" class="px-6 py-3">
                    Size
                </th>
                <th scope="col" class="px-6 py-3">
                    Aksi
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
             @foreach ($products as $product)
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $product->id }}
                </th>
                <td class="px-6 py-4">
                    {{ $product->name }}
                </td>
                <td class="px-6 py-4">
                    {{ number_format($product->price, 0, ',', '.') }}
                </td>
                <td class="px-6 py-4">
                    {{ $product->category }}
                </td>
                <td class="px-6 py-4">
                    {{ $product->quantity }}
                </td>
                <td class="px-6 py-4">
                    {{ $product->size }}
                </td>
                
                <td class="px-6 py-4">
                    <a href="{{ route('editproduct', $product->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
 </div>
@endsection