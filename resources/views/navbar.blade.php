<nav class="bg-white shadow-sm py-3">
    <div class="container">

        <div class="text-center mb-3">

            <h1 class="title mb-2">
                🌷 Iin's Bouquet
            </h1>

            <p class="text-muted">
                Fresh Flowers • Beautiful Moments • Made With Love
            </p>

        </div>

        <div class="d-flex justify-content-between align-items-center">

            <!-- Menu -->
            <div>

                <a href="{{ route('products.index') }}"
                   class="text-decoration-none fw-semibold text-primary me-4">

                    📦 Item

                </a>

                <a href="{{ route('transactions.index') }}"
                   class="text-decoration-none fw-semibold text-danger">

                    🛒 Transaksi

                </a>

            </div>

            <!-- Tombol -->
            <div class="d-flex gap-2">

                @if(Route::currentRouteName() == 'products.index')

                <button
                    class="btn btn-primary"
                    data-bs-toggle="modal"
                    data-bs-target="#modalTambah">

                    + Tambah Item

                </button>

                <a href="{{ route('products.pdf') }}"
                   target="_blank"
                   class="btn btn-danger">

                    🧾 Simpan PDF

                </a>

                @endif

                <form action="{{ route('logout') }}"
                      method="POST">

                    @csrf

                    <button
                        type="submit"
                        class="btn btn-dark">

                        Logout

                    </button>

                </form>

            </div>

        </div>

    </div>
</nav>