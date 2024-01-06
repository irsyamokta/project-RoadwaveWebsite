@extends('index')
@section('content')
@section('title', 'Register')
<div class="flex overflow-hidden">
  <div class="bg-[#12524B] h-[100vh] w-1/2 text-center flex flex-col justify-center items-center">
      <img src="" alt="">
      <h1 class="text-white font-semibold text-[48px]">Welcome Back!</h1>
      <p class="text-[12px] px-10 mt-3 text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Est rem optio enim sequi! Eligendi error molestiae labore odit deleniti officia?</p>
  </div>
  <div class="bg-white h-[100vh] w-1/2 flex justify-center items-center">
      <form action="{{ route('register.action') }}" method="POST">
          @csrf
          <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto lg:py-0">
            <div class="w-[450px] rounded-lg md:mt-0 sm:max-w-md xl:p-0">
              <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <p class="text-xl font-bold leading-tight tracking-tight text-center text-gray-900 md:text-2xl">
                  Create an account
                  </p>
                  <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">
                      Your name
                    </label>
                    <input id="name" type="text"  name="name" class=" bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5"  placeholder="JohnDoe" value="{{ old('name') }}" required autocomplete="name" autofocus>
                  </div>
                  <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">
                      Username
                    </label>
                    <input id="username" type="text" name="username" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5"   placeholder="JohnDoe" value="{{ old('username') }}" required>
                  </div>
                  <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">
                      Password
                    </label>
                    <input id="password" type="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5 @error('password') is-invalid @enderror" placeholder="••••••••" required autocomplete="new-password">
                      @error('password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
                  <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">
                      Confirm password
                    </label>
                    <input id="password_confirm" name="password_confirm" type="password" class="form-control bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5" placeholder="••••••••" required>
                  </div>
                  <div class="flex items-start">
                    <div class="flex items-center h-5">
                      <input class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 bg-gray-400 border-gray-600 focus:ring-primary-600 ring-offset-gray-800" type="checkbox" aria-describedby="terms" id="termsCheckbox" onchange="toggleButton()">
                    </div>
                    <div class="ml-3 text-sm">
                      <label class="font-light text-gray-500 text-gray-300">
                        I accept the
                        <a href="#" class="font-medium text-primary-600 hover:underline text-primary-500">
                          Terms and Conditions
                        </a>
                      </label>
                    </div>
                  </div>
                  <button id="submitButton" class="w-full bg-[#12524B] hover:bg-slate-500 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center  focus:ring-blue-800 text-white disabled:opacity-50" type="submit" disabled>
                    Create an account
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
    // Show success alert on page load if there is a success message
    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Sukses',
            text: '{{ session('success') }}',
        });
    @endif

    // Show error alert on page load if there are any errors
    @if($errors->any())
        Swal.fire({
            icon: 'error',
            title: 'Error',
            html: '@foreach($errors->all() as $err){{ $err }}<br>@endforeach',
        });
    @endif
</script>

<script>
    function toggleButton() {
        var checkbox = document.getElementById('termsCheckbox');
        var button = document.getElementById('submitButton');
        var nameInput = document.getElementsByName('name')[0].value;
        var usernameInput = document.getElementsByName('username')[0].value;
        var passwordInput = document.getElementsByName('password')[0].value;
        var confirmPasswordInput = document.getElementsByName('password_confirm')[0].value;
        button.disabled = !(checkbox.checked && nameInput && usernameInput && passwordInput && confirmPasswordInput);
    }
</script>
@endsection