<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Transaksi - Iin's Bouquet</title>

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

.card-custom{
    background:white;
    border:none;
    border-radius:20px;
    box-shadow:0 10px 25px rgba(0,0,0,.08);
}

.table th{
    background:#ffb6c1;
    color:white;
}

.btn-pink{
    background:#e75480;
    color:white;
    border:none;
}

.btn-pink:hover{
    background:#d6416c;
    color:white;
}

.stats{
    color:white;
    border-radius:20px;
    padding:25px;
    margin-bottom:20px;
}

.s1{
    background:linear-gradient(135deg,#ff6b9d,#ff9bc2);
}

</style>

</head>
<body>

<div class="container py-4">

    <div class="text-center mb-4">

        <h1 class="title">
            🌷 Iin's Bouquet
        </h1>

        <p class="text-muted">
            Fresh Flowers • Beautiful Moments • Made With Love
        </p>

    </div>

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <a href="{{ route('products.index') }}"
               class="btn btn-outline-primary">
                📦 Item
            </a>

            <a href="{{ route('transactions.index') }}"
               class="btn btn-pink">
                🛒 Transaksi
            </a>
        </div>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="btn btn-dark">
                Logout
            </button>
        </form>

    </div>

    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif

    <div class="row">

        <div class="col-md-4">

            <div class="stats s1">

                <h5>Total Transaksi</h5>

                <h2>{{ $transactions->count() }}</h2>

            </div>

        </div>

    </div>

    <div class="card-custom p-4 mb-4">

        <h4 class="mb-3">
            🛒 Tambah Transaksi
        </h4>

        <form action="{{ route('transactions.store') }}"
              method="POST">

            @csrf

            <div class="row">

                <div class="col-md-5">

                    <label>Produk</label>

                    <select
                        name="product_id"
                        class="form-control"
                        required>

                        <option value="">
                            Pilih Produk
                        </option>

                        @foreach($products as $product)

                        <option value="{{ $product->id }}">

                            {{ $product->nama_barang }}
                            -
                            Rp {{ number_format($product->harga,0,',','.') }}
                            (Stok: {{ $product->stok }})

                        </option>

                        @endforeach

                    </select>

                </div>

                <div class="col-md-3">

                    <label>Jumlah</label>

                    <input
                        type="number"
                        name="qty"
                        class="form-control"
                        required>

                </div>

                <div class="col-md-4">

                    <label>&nbsp;</label>

                    <button
                        type="submit"
                        class="btn btn-pink w-100">

                        Simpan Transaksi

                    </button>

                </div>

            </div>

        </form>

    </div>

    <div class="card-custom p-4">

        <h4 class="mb-3">
            📋 Riwayat Transaksi
        </h4>

        <table class="table table-bordered table-hover">

            <thead>

                <tr>

                    <th>No</th>
                    <th>Produk</th>
                    <th>Qty</th>
                    <th>Total</th>
                    <th>Tanggal</th>

                </tr>

            </thead>

            <tbody>

            @forelse($transactions as $item)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $item->product->nama_barang }}</td>

                    <td>{{ $item->qty }}</td>

                    <td>
                        Rp {{ number_format($item->total,0,',','.') }}
                    </td>

                    <td>
                        {{ $item->created_at->format('d-m-Y H:i') }}
                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="5" class="text-center">

                        Belum ada transaksi

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

</body>
</html>