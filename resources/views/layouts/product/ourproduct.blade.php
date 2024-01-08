{{-- Display product start --}}
<h2 class="text-[20px] font-bold text-center mb-[2rem] dark:text-white">Our Products</h2>
<div class="grid grid-cols-2 px-2 gap-2 md:grid-cols-3 lg:grid-cols-4 lg:gap-1">
    <!-- Items 1 -->
    @foreach ($products as $product)
    <div class="w-[190px] sm:w-56 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 box-border mx-0.5 my-2 sm:mx-2 lg:mx-3 lg:my-3">
      <a href="#">
        <img class="p-2 rounded-t-lg" src="{{ url('storage/assets/product/' . $product->image . '') }}" width="100%" alt="product image" />
      </a>
      <div class="px-2 pb-2">
        <h3 class="text-slate-500 text-sm">{{ $product->category }}</h3>
        <a href="#">
          <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">{{ $product->name }}</h5>
        </a>
        <div class="flex items-center justify-between mt-2.5 mb-5 box-border">
          <div class="flex justify-start items-start space-x-1 rtl:space-x-reverse flex-wrap">
            <p class="text-[11px] sm:text-sm text-red-600">Rp</p>
            <p class="text-[11px] sm:text-sm text-red-600">{{ number_format($product->price, 0, ',', '.') }}</p>
            <p class="text-[11px] sm:text-sm"><s>Rp</s></p>
            <p class="text-[11px] sm:text-sm"><s>120.000</s></p>
          </div>
          <span class="bg-red-600 text-white text-[10px] font-semibold px-2 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ms-2 box-border sm:text-sm">20%</span>
        </div>
      </div>
    </div>
    @endforeach
  </div>
{{-- Display product end --}}