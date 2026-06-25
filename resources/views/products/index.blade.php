<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Iin's Bouquet</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

<style>

body{
    background:linear-gradient(135deg,#fff0f5,#ffe4ec);
    font-family:'Poppins',sans-serif;
}

.title{
    font-family:'Dancing Script',cursive;
    font-size:3.5rem;
    color:#e75480;
}

.subtitle{
    color:#888;
}

.card-custom{
    background:white;
    border:none;
    border-radius:20px;
    box-shadow:0 10px 25px rgba(0,0,0,.08);
}

.stats{
    color:white;
    border-radius:20px;
    padding:25px;
    margin-bottom:20px;
}

.s1{
    background:linear-gradient(135deg,#6c63ff,#8f94fb);
}

.s2{
    background:linear-gradient(135deg,#ff6b9d,#ff9bc2);
}

.table th{
    background:#ffb6c1;
    color:white;
    border:none;
}

.table-hover tbody tr:hover{
    background:#fff5f8;
}

.btn-primary{
    background:#e75480;
    border:none;
}

.btn-primary:hover{
    background:#d6416c;
}

.modal-content{
    border-radius:20px;
    border:none;
}

</style>

</head>
<body>

<div class="container py-4">

    <div class="text-center mb-4">

    <h1 class="title">
        🌷 Iin's Bouquet
    </h1>

    <p class="subtitle">
        Fresh Flowers • Beautiful Moments • Made With Love
    </p>

</div>

    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif

    <div class="row mb-4">

        <div class="col-md-6">

            <div class="stats s1">

                <h5>Total Produk</h5>

                <h2>{{ $products->count() }}</h2>

            </div>

        </div>

        <div class="col-md-6">

            <div class="stats s2">

                <h5>Total Stok</h5>

                <h2>{{ $products->sum('stok') }}</h2>

            </div>

        </div>

    </div>

    <div class="card-custom p-4">

        <div class="d-flex justify-content-between align-items-center mb-3">

    <div class="d-flex align-items-center">

        <h4 class="mb-0">
            📦 Data Produk
        </h4>

        <a href="{{ route('transactions.index') }}"
           class="text-decoration-none ms-3 fw-semibold"
           style="color:#e75480;font-size:20px;">

            🛒 Transaksi

        </a>

    </div>

    <div class="d-flex gap-2">

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

        <form action="{{ route('logout') }}" method="POST">
            @csrf

            <button class="btn btn-dark">
                Logout
            </button>
        </form>

    </div>

</div>

        <table class="table table-hover table-bordered">

            <thead>

                <tr>

                    <th>No</th>
                    <th>Nama Item</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Deskripsi</th>
                    <th width="120">Aksi</th>

                </tr>

            </thead>

            <tbody>

            @forelse($products as $item)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $item->nama_barang }}</td>

                    <td>
                        Rp {{ number_format($item->harga,0,',','.') }}
                    </td>

                    <td>{{ $item->stok }}</td>

                    <td>{{ $item->deskripsi }}</td>

                    <td>

                        <button
                            class="btn btn-success btn-sm"
                            data-bs-toggle="modal"
                            data-bs-target="#editModal{{ $item->id }}">

                            ✏

                        </button>

                        <form
                            action="{{ route('products.destroy',$item->id) }}"
                            method="POST"
                            class="d-inline">

                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="btn btn-danger btn-sm">

                                🗑

                            </button>

                        </form>

                    </td>

                </tr>

                <div class="modal fade" id="editModal{{ $item->id }}">

                    <div class="modal-dialog">

                        <div class="modal-content">

                            <form action="{{ route('products.update',$item->id) }}" method="POST">

                                @csrf
                                @method('PUT')

                                <div class="modal-header">

                                    <h5>Edit Produk</h5>

                                </div>

                                <div class="modal-body">

                                    <input
                                        type="text"
                                        name="nama_barang"
                                        class="form-control mb-2"
                                        value="{{ $item->nama_barang }}"
                                        required>

                                    <input
                                        type="number"
                                        name="harga"
                                        class="form-control mb-2"
                                        value="{{ $item->harga }}"
                                        required>

                                    <input
                                        type="number"
                                        name="stok"
                                        class="form-control mb-2"
                                        value="{{ $item->stok }}"
                                        required>

                                    <textarea
                                        name="deskripsi"
                                        class="form-control"
                                        required>{{ $item->deskripsi }}</textarea>

                                </div>

                                <div class="modal-footer">

                                    <button
                                        type="submit"
                                        class="btn btn-primary">

                                        Update

                                    </button>

                                </div>

                            </form>

                        </div>

                    </div>

                </div>

            @empty

                <tr>

                    <td colspan="6" class="text-center">

                        Belum ada data produk

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

<div class="modal fade" id="modalTambah">

    <div class="modal-dialog">

        <div class="modal-content">

            <form action="{{ route('products.store') }}" method="POST">

                @csrf

                <div class="modal-header">

                    <h5>Tambah Produk</h5>

                </div>

                <div class="modal-body">

                    <input
                        type="text"
                        name="nama_barang"
                        class="form-control mb-2"
                        placeholder="Nama Produk"
                        required>

                    <input
                        type="number"
                        name="harga"
                        class="form-control mb-2"
                        placeholder="Harga"
                        required>

                    <input
                        type="number"
                        name="stok"
                        class="form-control mb-2"
                        placeholder="Stok"
                        required>

                    <textarea
                        name="deskripsi"
                        class="form-control"
                        placeholder="Deskripsi Produk"
                        required></textarea>

                </div>

                <div class="modal-footer">

                    <button
                        type="submit"
                        class="btn btn-primary">

                        Simpan

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
```
