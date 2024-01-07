<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ url('assets/icon/favicon.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
    <!-- Font Family -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@500&display=swap" rel="stylesheet" />
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                    mainColor: "#12524B",
                    mainColorOld: "#0d3d40",
                    darkmodeBg: "#121b22",
                    darkmodeOther: "#1f2c34",
                    },
                    fontFamily: {
                        manrope: ["Manrope"],
                    },
                },
            },
        };
    </script>
    <style type="text/tailwindcss">
        #toggle:checked ~ label div.toggle-circle {
            @apply translate-x-4;
        }
    </style>
    <style>
        body {

            --sb-track-color: #ffffff;
            --sb-thumb-color: #12524b;
            --sb-size: 10px;

            scrollbar-color: var(--sb-thumb-color) var(--sb-track-color);
        }

        body::-webkit-scrollbar {
            width: var(--sb-size);
        }

        body::-webkit-scrollbar-track {
            background: var(--sb-track-color);
            border-radius: 10px;
        }

        body::-webkit-scrollbar-thumb {
            background: var(--sb-thumb-color);
            border-radius: 10px;
        }
        
    </style>
    <title>@yield('title')</title>
</head>
<body class="font-manrope dark:bg-darkmodeBg">
 @yield('content')
 <script>
    document.getElementById('logoutAdmin').addEventListener('click', function(e) {
        e.preventDefault();
        Swal.fire({
            title: 'Konfirmasi Logout',
            text: 'Apakah Anda yakin ingin logout?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Logout!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '{{ route('logout') }}';
            }
        });
    });
 </script>
</body>
</html>