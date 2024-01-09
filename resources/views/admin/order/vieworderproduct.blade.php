@extends('admin.index')
@section('title', 'Order Product')
@section('content')
@include('admin.navigasi.sidebardashboard')
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
                    <button type="button" id="d" class="text-white hover:text-slate-300 text-sm bg-red-600 hover:bg-red-700 border border-slate-200 rounded-lg font-medium px-4 py-2 inline-flex space-x-1 items-center">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                            </svg>
                        </span>
                        <span class="hidden md:inline-block">Delete</span>
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection