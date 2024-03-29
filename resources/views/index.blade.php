<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ url('assets/icon/favicon.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
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
    @include('script')
</body>
</html>