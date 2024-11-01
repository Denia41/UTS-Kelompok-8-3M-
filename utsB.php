<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Transaksi Pembelian</title>
    <style>
        table {
            width: 60%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        .transaction-summary {
            border: 1px solid black;
            padding: 10px;
            width: 60%;
        }
    </style>
</head>
<body>

<h2>A. Tabel Harga Barang</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Produk</th>
        <th>Stok</th>
        <th>Harga</th>
        <th>Jumlah</th>
    </tr>

    <?php
        // Array multidimensi untuk barang
        $barang = [
            ['ID' => 1, 'Produk' => 'Buavita', 'Stok' => 30, 'Harga' => 10890, 'Jumlah' => 326700],
            ['ID' => 2, 'Produk' => 'Bango', 'Stok' => 21, 'Harga' => 21890, 'Jumlah' => 459690],
            ['ID' => 3, 'Produk' => 'Sariwangi', 'Stok' => 10, 'Harga' => 9990, 'Jumlah' => 99900],
            ['ID' => 4, 'Produk' => 'Shampo Baby', 'Stok' => 20, 'Harga' => 21980, 'Jumlah' => 439600],
            ['ID' => 5, 'Produk' => 'Bedak', 'Stok' => 15, 'Harga' => 14990, 'Jumlah' => 224850],
            ['ID' => 6, 'Produk' => 'Baju Bayi', 'Stok' => 20, 'Harga' => 35500, 'Jumlah' => 710000],
            ['ID' => 7, 'Produk' => 'Jumper', 'Stok' => 25, 'Harga' => 49999, 'Jumlah' => 1249975]
        ];

        // Menghitung total jumlah
        $totalJumlah = 0;
        foreach ($barang as $item) {
            $totalJumlah += $item['Jumlah'];
        }

        // Menampilkan tabel barang
        foreach ($barang as $item) {
            echo "<tr>";
            echo "<td>{$item['ID']}</td>";
            echo "<td>{$item['Produk']}</td>";
            echo "<td>{$item['Stok']}</td>";
            echo "<td>" . number_format($item['Harga'], 0, ',', '.') . "</td>";
            echo "<td>" . number_format($item['Jumlah'], 0, ',', '.') . "</td>";
            echo "</tr>";
        }
        echo "<tr><td colspan='4'><strong>Total</strong></td><td><strong>Rp " . number_format($totalJumlah, 0, ',', '.') . "</strong></td></tr>";
        echo "</table>";
    ?>

<h2>B. Struk Pembelian</h2>
<div class="transaction-summary">
    <p>Tanggal Transaksi: <?php echo date("d F Y"); ?></p>
    <table>
        <tr>
            <th>Produk</th>
            <th>Kuantitas</th>
            <th>Harga Satuan</th>
            <th>Subtotal</th>
        </tr>

        <?php
        // Array multidimensi untuk transaksi
        $transaksi = [
            ["produk" => "Bedak", "kuantitas" => 15],
            ["produk" => "Baju Bayi", "kuantitas" => 15],
            ["produk" => "Buavita", "kuantitas" => 15],
            ["produk" => "Shampo Baby", "kuantitas" => 10],
            ["produk" => "Bango", "kuantitas" => 3], // Mengganti produk yang tidak ada sebelumnya
        ];

        $totalTransaksi = 0;

        // Menghitung subtotal dan total transaksi
        foreach ($transaksi as $trans) {
            foreach ($barang as $item) {
                if ($trans["produk"] == $item["Produk"]) {
                    $subtotal = $trans["kuantitas"] * $item["Harga"];
                    $totalTransaksi += $subtotal;
                    echo "<tr>";
                    echo "<td>" . $trans["produk"] . "</td>";
                    echo "<td>" . $trans["kuantitas"] . "</td>";
                    echo "<td>" . number_format($item["Harga"], 0, ",", ".") . "</td>";
                    echo "<td>" . number_format($subtotal, 0, ",", ".") . "</td>";
                    echo "</tr>";
                }
            }
        }

        // Menghitung diskon
        $diskon = 0;
        if ($totalTransaksi >= 400000) {
            $diskon = 0.35 * $totalTransaksi;
        } elseif ($totalTransaksi >= 250000) {
            $diskon = 0.20 * $totalTransaksi;
        }

        // Menghitung total pembayaran
        $totalPembayaran = $totalTransaksi - $diskon;
        ?>

    </table>

    <p><strong>Total:</strong> Rp <?php echo number_format($totalTransaksi, 0, ",", "."); ?></p>
    <p><strong>Diskon:</strong> Rp <?php echo number_format($diskon, 0, ",", "."); ?></p>
    <p><strong>Total Pembayaran:</strong> Rp <?php echo number_format($totalPembayaran, 0, ",", "."); ?></p>
</div>

<?php
    $multiArray = [
        ["Produk", "Stok", "Harga"],
        ["Buavita", 30, 10890],
        ["Bango", 21, 21890],
        ["Sariwangi", 10, 9980],
        ["Shampo Baby", 20, 21890],
        ["Bedak", 15, 14990],
        ["Baju Bayi", 25, 35990],
        ["Jumper", 25, 49999]
    ];

    echo "<h2>C. Array multidimensi</h2>";
    echo "<table border='1'>";
    foreach ($multiArray as $row) {
        echo "<tr>";
        foreach ($row as $col) {
            echo "<td>" . (is_numeric($col) ? number_format($col, 0, ',', '.') : $col) . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";

?>

</body>
</html>