@extends('admin.index')
@section('title', 'Admin Dashboard')
@section('content')
@include('admin.navigasi.sidebardashboard')
<div class="p-4 sm:ml-64">
    <div class="grid grid-cols-1 gap-8 px-4 mt-8 sm:grid-cols-4 sm:px-8 md:-ml-12">
        <div class="flex items-center bg-white border rounded-sm overflow-hidden shadow">
            <div class="p-4 bg-green-400">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12 text-white">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
                </svg>
            </div>
            <div class="px-4 text-gray-700">
                <h3 class="text-sm tracking-wider">Saldo</h3>
                <p class="text-lg font-bold">Rp {{ number_format($orders->sum('total'), 0, ',', '.') }}</p>
            </div>
       </div>
       <div class="flex items-center bg-white border rounded-sm overflow-hidden shadow">
            <div class="p-4 bg-blue-400">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12 text-white">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                </svg>
            </div>
            <div class="px-4 text-gray-700">
                <h3 class="text-sm tracking-wider">Total Order</h3>
                <p class="text-lg font-bold">{{ $orders->count() }}</p>
            </div>
       </div>
       <div class="flex items-center bg-white border rounded-sm overflow-hidden shadow">
           <div class="p-4 bg-indigo-400">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12 text-white">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
                </svg>
            </div>
           <div class="px-4 text-gray-700">
               <h3 class="text-sm tracking-wider">Selesai</h3>
               <p class="text-lg font-bold">{{ $orders->where('status', 3)->count() }}</p>
           </div>
       </div>
       <div class="flex items-center bg-white border rounded-sm overflow-hidden shadow">
            <div class="p-4 bg-red-400">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12 text-white">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 0v3.75m-16.5-3.75v3.75m16.5 0v3.75C20.25 16.153 16.556 18 12 18s-8.25-1.847-8.25-4.125v-3.75m16.5 0c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125" />
                </svg>
            </div>
            <div class="px-4 text-gray-700">
                <h3 class="text-sm tracking-wider">Total Produk</h3>
                <p class="text-lg font-bold">{{ $products->count() }}</p>
            </div>
       </div>
   </div>
</div>
  <div class="relative overflow-x-auto shadow-md sm:rounded-lg ml-8 mr-8 p-6 md:ml-64 md:mr-10 md:mt-10">
     <div class="flex justify-between">
       <h1 class="text-xl font-bold mb-7">Daftar Orderan Masuk</h1>
   </div>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    No
                </th>
                <th scope="col" class="px-6 py-3">
                    Kode Order
                </th>
                <th scope="col" class="px-6 py-3">
                    Nama Produk
                </th>
                <th scope="col" class="px-6 py-3">
                    Total Order
                </th>
                <th scope="col" class="px-6 py-3">
                    Total Harga
                </th>
                <th scope="col" class="px-6 py-3">
                    Status
                </th>
                <th scope="col" class="px-6 py-3">
                    Aksi
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
             @foreach ($orders as $orders)
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $orders->id }}
                </th>
                <td class="px-6 py-4">
                    CUS{{ $orders->order_code }}
                </td>
                <td class="px-6 py-4">
                    {{ $orders->name }}
                </td>
                <td class="px-6 py-4">
                    {{  $orders->total_order }}
                </td>
                <td class="px-6 py-4">
                    Rp{{  number_format($orders->total, 0, ',', '.') }}
                </td>
                <td class="px-2 py-4 flex">
                   @if($orders->status == 0)
                   <span class="w-[120px] px-2 py-2 text-[11px] font-medium text-center text-white bg-red-700 rounded-lg font-medium" >Belum diproses</span>
                   @elseif($orders->status == 1)
                   <span class="w-[120px] px-2 py-2 text-[11px] font-medium text-center text-white bg-blue-700 rounded-lg font-medium">Diproses</span>
                   @elseif($orders->status == 2)
                   <span class="w-[120px] px-2 py-2 text-[11px] font-medium text-center text-white bg-yellow-600 rounded-lg font-medium">Dikirim</span>
                   @elseif($orders->status == 3)
                   <span class="w-[120px] px-2 py-2 text-[11px] font-medium text-center text-white bg-green-700 rounded-lg font-medium">Selesai</span>
                   @endif
                </td>
                <td class="px-6 py-4">
                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Lihat</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
 </div>
@endsection