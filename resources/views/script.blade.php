<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
<script src="https://kit.fontawesome.com/cbaed131ab.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
        const checkbox = document.querySelector("#darkmode");
        const html = document.querySelector("html");
        const logo = document.getElementById("logo");

        checkbox.addEventListener("click", function () {
            checkbox.checked ? html.classList.add("dark") : html.classList.remove("dark");
            checkbox.checked ? logo.src = "{{ url('assets/icon/logo-white.png') }}" : logo.src = "{{ url('assets/icon/logo.png') }}";
        });

        document.getElementById('logoutButton').addEventListener('click', function(e) {
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