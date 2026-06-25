<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Riwayat Transaksi</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:#fff0f5;
}

.card-custom{
    background:white;
    border-radius:20px;
    box-shadow:0 10px 20px rgba(0,0,0,.08);
}

.table th{
    background:#ffb6c1;
    color:white;
}

.title{
    color:#e75480;
    font-weight:bold;
}

</style>

</head>
<body>

<div class="container py-5">

    <div class="card-custom p-4">

        <div class="d-flex justify-content-between mb-4">

            <h3 class="title">
                🕘 Riwayat Transaksi
            </h3>

            <a href="{{ route('products.index') }}"
               class="btn btn-primary">

                Kembali

            </a>

        </div>

        <table class="table table-bordered">

            <thead>

                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Produk</th>
                    <th>Qty</th>
                    <th>Total</th>
                </tr>

            </thead>

            <tbody>

            @forelse($transactions as $item)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>
                        {{ $item->created_at->format('d-m-Y H:i') }}
                    </td>

                    <td>
                        {{ $item->product->nama_barang }}
                    </td>

                    <td>
                        {{ $item->qty }}
                    </td>

                    <td>
                        Rp {{ number_format($item->total,0,',','.') }}
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