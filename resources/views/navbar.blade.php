<nav class="bg-white shadow-sm py-3">
    <div class="container">

        <h1 class="title mb-2">🌷 Iin's Bouquet</h1>

        <p class="text-muted mb-3">
            Fresh Flowers • Beautiful Moments • Made With Love
        </p>

        <div class="d-flex justify-content-between align-items-center">

            <div>
                <a href="{{ route('products.index') }}"
                   class="text-decoration-none fw-semibold text-primary me-4">
                    📦 Item
                </a>

                <a href="#"
                   class="text-decoration-none fw-semibold text-primary">
                    💳 Transaksi
                </a>
            </div>

            <div class="text-end">

                <button class="btn btn-primary mb-2"
                        data-bs-toggle="modal"
                        data-bs-target="#modalTambah">
                    + Tambah Item
                </button>

                <br>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf

                    <button type="submit" class="btn btn-danger">
                        Logout
                    </button>
                </form>

            </div>

        </div>

    </div>
</nav>