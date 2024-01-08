@extends('index')
@section('Title', 'Edit Produk')
@include('admin.navigasi.sidebarproduct')
@section('content')

<div class="relative overflow-x-auto shadow-md sm:rounded-lg ml-8 mr-8 p-6 md:ml-64 md:mr-10 md:mt-2">
    <div>
        <h1 class="text-md md:text-xl font-bold text-center mb-6">Edit Produk</h1>
    </div>
    <form id="editproductForm" action="{{ route('editproduct.action', ['id' => $product->id]) }}" method="POST" enctype="multipart/form-data" class="max-w-sm lg:max-w-2xl mx-auto">
        @csrf
        <div class="flex flex-col lg:flex-row lg:gap-8 justify-between lg:w-full">
            <div class="lg:w-full">
                <div class="mb-5">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Produk</label>
                <input type="text" id="name" name="name" value="{{ $product->name }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Nama produk" required>
            </div>
                <div class="mb-5">
                    <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga</label>
                    <input type="text" id="price" name="price" value="{{ $product->price }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="100000" required>
                </div>
                <div class="mb-5">
                    <label for="size" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ukuran</label>
                    <select id="size" name="size" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>{{ $product->size }}</option>
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                        <option value="XL">XL</option>
                    </select>
                </div>
                <div class="mb-5">
                    <label for="color" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Warna</label>
                    <select id="color" name="color" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        <option selected>{{ $product->color }}</option>
                        <option value="-">-</option>
                        <option value="Hitam">Hitam</option>
                        <option value="Putih">Putih</option>
                        <option value="Abu">Abu</option>
                        <option value="Hijau">Hijau</option>
                        <option value="Maroon">Maroon</option>
                        <option value="Navy">Navy</option>
                    </select>
                </div>
                <div class="mb-5">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="image">Upload file</label>
                    <input value="{{ $product->image }}" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 p-[10px]" aria-describedby="user_avatar_help" id="image" name="image" type="file">
                </div>
            </div>
            <div class="lg:w-full">
                <div class="mb-5">
                    <label for="quantity" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah</label>
                    <input value="{{ $product->quantity }}" type="text" id="quantity" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" name="quantity" placeholder="0" required>
                </div>
                <div class="mb-5">
                    <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
                    <select id="category" name="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>{{ $product->category }}</option>
                        <option value="T-Shirt">T-Shirt</option>
                        <option value="Shirt">Shirt</option>
                        <option value="Pants">Pants</option>
                        <option value="Outwear">Outwear</option>
                    </select>
                </div>
                <div class="mb-5">
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
                    <textarea id="description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 h-[230px] rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Deskripsikan produk anda...">{{ $product->description }}</textarea>
                </div>
            </div>
        </div>
        <div class="flex w-full justify-center mt-2">
            <button id="editButton" type="submit" class="text-white w-1/2 bg-mainColor hover:bg-mainColorOld focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
        </div>
    </form>
</div>
<script>
    const addButton = document.getElementById('editButton');
    addButton.addEventListener('click', (event) => {
        const nameValue = document.getElementById('name').value;
        const priceValue = document.getElementById('price').value;
        const sizeValue = document.getElementById('size').value;
        const colorValue = document.getElementById('color').value;
        const imageValue = document.getElementById('image').value;
        const quantityValue = document.getElementById('quantity').value;
        const categoryValue = document.getElementById('category').value;
        const descriptionValue = document.getElementById('description').value;
        if (!nameValue || !priceValue || !sizeValue
            || !colorValue || !imageValue || !quantityValue
            || !categoryValue) {
            event.preventDefault();
            Swal.fire({
                title: "Error!",
                text: "Harap isi semua inputan.",
                icon: "error",
            });
        } else {
            event.preventDefault();
            Swal.fire({
                title: "Menunggu...",
                text: "Proses sedang berlangsung.",
                icon: "info",
                showCancelButton: false,
                showConfirmButton: false,
                allowOutsideClick: false,
                allowEscapeKey: false,
            });
            setTimeout(() => {
                Swal.fire({
                    title: "Success!",
                    text: "Data berhasil diubah!",
                    icon: "success",
                    confirmButtonText: "OK",
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "{{ route('products') }}";   
                        document.getElementById('editproductForm').submit();
                    }
                });
            }, 3000);
        }
    });
    </script>
@endsection