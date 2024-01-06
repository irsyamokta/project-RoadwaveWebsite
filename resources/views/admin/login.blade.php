@extends('index')

@section('content')
@section('title', 'Login Admin')
    
<div class="flex flex-col overflow-hidden lg:flex-row lg:items-center">
  <div class="bg-[#12524B] h-[350px] w-full lg:w-full lg:h-[100vh] text-center flex flex-col justify-center items-center">
      <img src="" alt="">
      <h1 class="text-white font-semibold text-[48px]">Admin</h1>
      <p class="text-[12px] px-10 mt-3 text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Est rem optio enim sequi! Eligendi error molestiae labore odit deleniti officia?</p>
  </div>
  <div class="bg-white items-start w-full lg:w-full lg:items-start flex justify-center items-center">
      <form class="mt-5" action="{{ route('loginAdmin.action') }}" method="POST" id="loginForm">
          @csrf
          <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto lg:py-0">
            <div class="w-[450px] rounded-lg md:mt-0 sm:max-w-md xl:p-0">
              <div class="p-10 space-y-4 md:space-y-6 sm:p-8">
                <p class="text-xl font-bold leading-tight tracking-tight text-center text-gray-900 md:text-2xl">
                  Login
                  </p>
                  <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">
                      Username
                    </label>
                    <input placeholder="JohnDoe" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5" id="username" type="text" name="username" required autocomplete="username" autofocus>
                  </div>
                  <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">
                      Password
                    </label>
                    <input class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5" placeholder="••••••••" id="password" type="password" name="password">
                      @error('password')
                          <span class="invalid-feedback text-xs mt-[2px] text-red-500" role="alert">
                              {{ $message }}
                          </span>
                      @enderror
                  </div>
                  <div class="flex items-start">
                    <div class="text-sm">
                      <label class="font-light text-gray-500 text-gray-300">
                        <a href="{{ route('password') }}" class="font-light text-primary-600 hover:underline text-primary-500">
                          Forgot Password?
                        </a>
                      </label>
                    </div>
                  </div>
                  <button id="submitButton" class="w-full bg-[#12524B] hover:bg-slate-500 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center  focus:ring-blue-800 text-white" type="submit">
                    Login
                  </button>
                  <div class="text-sm">
                    <label class="font-light text-gray-500 text-gray-300">
                      Don't have an account?
                      <a href="{{ route('register') }}" class="font-bold text-mainColor hover:underline text-primary-500">
                        Register
                      </a>
                    </label>
                  </div>
              </div>
            </div>
          </div>
      </form>          
  </div>
</div>

<!-- Include SweetAlert library -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- JavaScript to trigger SweetAlert modals -->
<script>

    @if(session('success'))
        Swal.fire({
              icon: 'success',
              title: 'Sukses',
              text: '{{ session('success') }}',
        });
    @endif

    @if($errors->any())
        Swal.fire({
              icon: 'error',
              title: 'Error',
              html: '@foreach($errors->all() as $err){{ $err }}<br>@endforeach',
        });
    @endif
</script>
@endsection
