@extends('index')
@section('content')
@section('title', 'Change Password')
<div class="flex overflow-hidden">
    <div class="bg-[#12524B] h-[100vh] w-1/2 text-center flex flex-col justify-center items-center">
        <img src="" alt="">
        <h1 class="text-white font-semibold text-[48px]">Welcome Back!</h1>
        <p class="text-[12px] px-10 mt-3 text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Est rem optio enim sequi! Eligendi error molestiae labore odit deleniti officia?</p>
    </div>
    <div class="bg-white h-[100vh] w-1/2 flex justify-center items-center">
        <form action="{{ route('password.action') }}" method="POST">
            @csrf
            <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto lg:py-0">
              <div class="w-[450px] rounded-lg md:mt-0 sm:max-w-md xl:p-0">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                  <p class="text-xl font-bold leading-tight tracking-tight text-center text-gray-900 md:text-2xl">
                    Change Password
                    </p>
                    <div>
                      <label class="block mb-2 text-sm font-medium text-gray-900">
                        Username
                      </label>
                      @auth
                        <input id="username" type="text"  name="username" class=" bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5" value="{{ Auth::user()->username }}" required readonly>
                        @endauth
                      @guest
                        <input id="username" type="text"  name="username" class=" bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5"  placeholder="jhondoe" value="{{ old('name') }}" required autofocus>
                      @endguest
                    </div>
                    <div>
                      <label class="block mb-2 text-sm font-medium text-gray-900">
                        New Password
                      </label>
                      <input id="password" type="password" name="new_password" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5 @error('password') is-invalid @enderror" placeholder="••••••••" required>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div>
                      <label class="block mb-2 text-sm font-medium text-gray-900">
                        Confirm New password
                      </label>
                      <input id="password_confirm" name="new_password_confirmation" type="password" class="form-control bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5" placeholder="••••••••" required>
                    </div>
                    
                    <button id="submitButton" class="w-full bg-[#12524B] hover:bg-slate-500 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center  focus:ring-blue-800 text-white disabled:opacity-50" type="submit">
                      Change Password
                    </button>
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
    // You can also move this script to an external file if needed
    @if(session('success'))
            Swal.fire({
            icon: 'success',
            title: 'Sukses',
            text: '{{ session('success') }}',
        }).then(function() {
            @auth
                window.location.href = '{{ route('home') }}';
            @endauth
            @guest
                window.location.href = '{{ route('login') }}';
            @endguest
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
