<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">

<title>Laporan Produk Iin's Bouquet</title>

<style>

body{
    font-family: DejaVu Sans;
}

.header{
    text-align:center;
    margin-bottom:20px;
}

.title{
    font-size:28px;
    font-weight:bold;
    color:#e75480;
}

.subtitle{
    color:#666;
    font-size:12px;
}

hr{
    border:1px solid #f8a5c2;
}

table{
    width:100%;
    border-collapse:collapse;
    margin-top:20px;
}

table th{
    background:#e75480;
    color:white;
}

table th,
table td{
    border:1px solid #cccccc;
    padding:8px;
}

.footer{
    margin-top:20px;
    text-align:right;
    font-size:12px;
    color:#666;
}

</style>

</head>
<body>

<div class="header">

    <div class="title">
        🌷 Iin's Bouquet
    </div>

    <div class="subtitle">
        Fresh Flowers • Beautiful Moments • Made With Love
    </div>

</div>

<hr>

<h3 style="text-align:center;">
    LAPORAN DATA PRODUK
</h3>

<table>

    <thead>
        <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Deskripsi</th>
        </tr>
    </thead>

    <tbody>

    @foreach($products as $item)

        <tr>

            <td>{{ $loop->iteration }}</td>

            <td>{{ $item->nama_barang }}</td>

            <td>
                Rp {{ number_format($item->harga,0,',','.') }}
            </td>

            <td>{{ $item->stok }}</td>

            <td>{{ $item->deskripsi }}</td>

        </tr>

    @endforeach

    </tbody>

</table>

<div class="footer">

    Dicetak otomatis oleh Sistem Iin's Bouquet

</div>

</body>
</html>