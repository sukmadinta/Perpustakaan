<!--awal MENU NAVBAR-->
<div>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #2980b9;">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/home" style="color: white;">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/buku" style="color: white;">Data Buku</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/anggota" style="color: white;">Data Anggota</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/petugas" style="color: white;">Data Petugas</a>
                </li>
                <li class="nav-item"> 
                    <a class="nav-link" href="/pinjam" style="color: white;">Data Peminjaman</a> 
                </li>
                <li class="nav-item"> 
                    <a class="nav-link" href="/pengembalian" style="color: white;">Data Pengembalian</a> 
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/logout" style="color: white;">Logout</a>
                </li>
                
                <!-- Menu lainnya -->
                <div class="search-form">
                    <button type="button" onclick="toggleSearch()">
                        <i class="fa fa-search search-icon"></i>
                    </button>
                    <form action="{{ route('search') }}" method="GET" class="search-form">
                        <input type="text" name="query" placeholder="Cari..." required>
                    </form>
                </div>
               

            <script>
                function toggleSearch() {
                    var input = document.querySelector('.search-form input');
                    input.style.display = input.style.display === 'inline-block' ? 'none' : 'inline-block';
                    if (input.style.display === 'inline-block') {
                        input.focus();
                    }
                }
            </script>

            </ul>
        </div>
    </nav>            
</div>
<!--akhir MENU NAVBAR-->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function(){
        // Mendapatkan path dari URL
        var currentPath = window.location.pathname;

        // Loop melalui setiap tombol navbar
        $(".navbar-nav li a").each(function(){
            // Mendapatkan href dari tombol
            var navItemPath = $(this).attr("href");

            // Mengecek apakah path tombol sama dengan path halaman yang sedang dibuka
            if(currentPath === navItemPath){
                // Menambahkan kelas active jika sesuai
                $(this).addClass("active");
            }
        });
    });
</script>
<style>
    .navbar-nav .nav-link.active {
        color: yellow !important; /* Ubah warna sesuai kebutuhan */
        font-weight: bold; /* Tambahkan gaya tambahan jika diperlukan */
        /* Atau tambahkan properti CSS lainnya untuk menandai tombol aktif */
    }
</style>

