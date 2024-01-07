@extends('admin.index')
@section('title', 'Admin Dashboard')
@section('content')
@include('admin.sidebardashboard')
<div class="p-4 sm:ml-64">

    <div class="grid grid-cols-1 gap-4 px-4 mt-8 sm:grid-cols-4 sm:px-8">
        <div class="flex items-center bg-white border rounded-sm overflow-hidden shadow">
           <div class="p-4 bg-green-400"><svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white" fill="none"
                   viewBox="0 0 24 24" stroke="currentColor">
                   <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                       d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                   </path>
               </svg></div>
           <div class="px-4 text-gray-700">
               <h3 class="text-sm tracking-wider">Saldo</h3>
               <p class="text-lg font-bold">Rp {{ number_format($orders->sum('total'), 0, ',', '.') }}</p>
           </div>
       </div>
       <div class="flex items-center bg-white border rounded-sm overflow-hidden shadow">
           <div class="p-4 bg-blue-400"><svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white" fill="none"
                   viewBox="0 0 24 24" stroke="currentColor">
                   <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                       d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2">
                   </path>
               </svg></div>
           <div class="px-4 text-gray-700">
               <h3 class="text-sm tracking-wider">Total Order</h3>
               <p class="text-lg font-bold">{{ $orders->count() }}</p>
           </div>
       </div>
       <div class="flex items-center bg-white border rounded-sm overflow-hidden shadow">
           <div class="p-4 bg-indigo-400"><svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white" fill="none"
                   viewBox="0 0 24 24" stroke="currentColor">
                   <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                       d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z">
                   </path>
               </svg></div>
           <div class="px-4 text-gray-700">
               <h3 class="text-sm tracking-wider">Selesai</h3>
               <p class="text-lg font-bold">{{ $orders->where('status', 3)->count() }}</p>
           </div>
       </div>
       <div class="flex items-center bg-white border rounded-sm overflow-hidden shadow">
           <div class="p-4 bg-red-400"><svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white" fill="none"
                   viewBox="0 0 24 24" stroke="currentColor">
                   <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                       d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4">
                   </path>
               </svg></div>
           <div class="px-4 text-gray-700">
               <h3 class="text-sm tracking-wider">Total Produk</h3>
               <p class="text-lg font-bold">{{ $products->count() }}</p>
           </div>
       </div>
   </div>
  </div>
  <div class="relative overflow-x-auto shadow-md sm:rounded-lg ml-8 mr-8 p-6 md:ml-72 md:mr-10 md:mt-10">
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
                    Nama
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
                    {{ $orders->order_code }}
                </td>
                <td class="px-6 py-4">
                    {{ $orders->name }}
                </td>
                <td class="px-6 py-4">
                    {{ $orders->total }}
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