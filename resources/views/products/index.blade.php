<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Iin's Bouquet</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&family=Dancing+Script:wght@700&display=swap" rel="stylesheet">

<style>
body{
    font-family:Poppins;
    background:#f4f7ff;
}
.title{
    font-family:'Dancing Script',cursive;
    font-size:3.3rem;
    color:#e75480;
}
.card-custom{
    border:none;
    border-radius:20px;
    box-shadow:0 10px 25px rgba(0,0,0,.08);
}
.table thead{
    background:#6c63ff;
    color:white;
}
.table tbody tr:hover{
    background:#f8f9ff;
}
.btn-primary{
    background:linear-gradient(135deg,#6c63ff,#4a90e2);
    border:none;
}
.stat{
    color:white;
    border:none;
    border-radius:20px;
}
.s1{
    background:linear-gradient(135deg,#6c63ff,#8f94fb);
}
.s2{
    background:linear-gradient(135deg,#ff6b9d,#ff9bc2);
}
.badge-stock{
    background:#d1f7d6;
    color:#0f9d58;
    padding:6px 12px;
    border-radius:20px;
}
.modal-content{
    border:none;
    border-radius:20px;
}
</style>
</head>

<body>

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="title">🌷 Iin's Bouquet</h1>
            <p class="text-muted">
                Fresh Flowers • Beautiful Moments • Made With Love
            </p>
        </div>

        <button class="btn btn-primary px-4"
                data-bs-toggle="modal"
                data-bs-target="#modalTambah">
            + Tambah Item
        </button>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row mb-4">

        <div class="col-md-6 mb-3">
            <div class="card stat s1 shadow">
                <div class="card-body">
                    <h6>Total Produk</h6>
                    <h2>{{ $products->count() }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-3">
            <div class="card stat s2 shadow">
                <div class="card-body">
                    <h6>Total Stok</h6>
                    <h2>{{ $products->sum('stok') }}</h2>
                </div>
            </div>
        </div>

    </div>

    <div class="card card-custom">
        <div class="card-body">

            <table class="table table-hover align-middle">

                <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
                </thead>

                <tbody>

                @forelse($products as $item)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>
                        <strong>{{ $item->nama_barang }}</strong>
                    </td>

                    <td>
                        Rp {{ number_format($item->harga,0,',','.') }}
                    </td>

                    <td>
                        <span class="badge-stock">
                            {{ $item->stok }}
                        </span>
                    </td>

                    <td>{{ $item->deskripsi }}</td>

                    <td>

                        <!-- EDIT -->
                        <button class="btn btn-warning btn-sm"
                                data-bs-toggle="modal"
                                data-bs-target="#editModal{{ $item->id }}">
                            ✏️ Edit
                        </button>

                        <!-- DELETE -->
                        <form action="{{ route('products.destroy',$item->id) }}"
                              method="POST"
                              class="d-inline">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin hapus data?')">
                                🗑️ Hapus
                            </button>

                        </form>

                    </td>

                </tr>

                <!-- MODAL EDIT -->
                <div class="modal fade"
                     id="editModal{{ $item->id }}"
                     tabindex="-1">

                    <div class="modal-dialog">

                        <div class="modal-content">

                            <form action="{{ route('products.update',$item->id) }}"
                                  method="POST">

                                @csrf
                                @method('PUT')

                                <div class="modal-header">
                                    <h5>Edit Produk</h5>

                                    <button type="button"
                                            class="btn-close"
                                            data-bs-dismiss="modal">
                                    </button>
                                </div>

                                <div class="modal-body">

                                    <input type="text"
                                           name="nama_barang"
                                           class="form-control mb-3"
                                           value="{{ $item->nama_barang }}"
                                           required>

                                    <input type="number"
                                           name="harga"
                                           class="form-control mb-3"
                                           value="{{ $item->harga }}"
                                           required>

                                    <input type="number"
                                           name="stok"
                                           class="form-control mb-3"
                                           value="{{ $item->stok }}"
                                           required>

                                    <textarea
                                        name="deskripsi"
                                        class="form-control"
                                        rows="3"
                                        required>{{ $item->deskripsi }}</textarea>

                                </div>

                                <div class="modal-footer">

                                    <button type="button"
                                            class="btn btn-secondary"
                                            data-bs-dismiss="modal">
                                        Batal
                                    </button>

                                    <button type="submit"
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
                    <td colspan="6" class="text-center py-4">
                        Belum ada data barang
                    </td>
                </tr>

                @endforelse

                </tbody>

            </table>

        </div>
    </div>

</div>

<!-- MODAL TAMBAH -->

<div class="modal fade" id="modalTambah">

    <div class="modal-dialog">

        <div class="modal-content">

            <form action="{{ route('products.store') }}"
                  method="POST">

                @csrf

                <div class="modal-header">

                    <h5>Tambah Item</h5>

                    <button type="button"
                            class="btn-close"
                            data-bs-dismiss="modal">
                    </button>

                </div>

                <div class="modal-body">

                    <input type="text"
                           name="nama_barang"
                           class="form-control mb-3"
                           placeholder="Nama Barang"
                           required>

                    <input type="number"
                           name="harga"
                           class="form-control mb-3"
                           placeholder="Harga"
                           required>

                    <input type="number"
                           name="stok"
                           class="form-control mb-3"
                           placeholder="Stok"
                           required>

                    <textarea name="deskripsi"
                              class="form-control"
                              rows="3"
                              placeholder="Deskripsi"
                              required></textarea>

                </div>

                <div class="modal-footer">

                    <button type="button"
                            class="btn btn-secondary"
                            data-bs-dismiss="modal">
                        Batal
                    </button>

                    <button type="submit"
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