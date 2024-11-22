<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>

    <style>
        * {
            font-family: "Arial", sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            width: 75mm;
            margin: 0 auto;
            padding: 10px;
        }
        .text-center {
            text-align: center;
        }
        .text-right {
            text-align: right;
        }
        h3, p {
            margin: 5px 0;
            line-height: 1.2;
        }
        h3 {
            font-size: 14pt;
        }
        p {
            font-size: 10pt;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 10pt;
        }
        table td {
            padding: 2px 0;
            vertical-align: top;
        }
        .line {
            border-top: 1px dashed #000;
            margin: 8px 0;
        }
        .bold {
            font-weight: bold;
        }
        .small-text {
            font-size: 8pt;
        }
        .btn-print {
            display: none;
        }
        @media print {
            @page {
                margin: 0;
                size: 75mm;
            }
            body {
                margin: 0;
            }
            .btn-print {
                display: none;
            }
        }
    </style>
</head>
<body onload="window.print()">
    <button class="btn-print" onclick="window.print()">Print</button>

    <!-- Header Section -->
    <div class="text-center">
        <img src="logo.png" alt="Logo" style="width: 50px; height: 50px; margin-bottom: 5px;">
        <h3>Rearboost Innovations</h3>
        <p>Main Road, Kegalle</p>
        <p>Phone: 0704867765</p>
        <p>Email: rearboost@gmail.com</p>
        <p>Website: www.rearboost.com</p>
    </div>

    <div class="line"></div>

    <!-- Invoice Details -->
    <table>
        <tr>
            <td>Invoice No:</td>
            <td>{{ tambah_nol_didepan($penjualan->id_penjualan, 10) }}</td>
            <td class="text-right">Time: 10:23</td>
        </tr>
        <tr>
            <td>Date:</td>
            <td>{{ date('d-m-Y') }}</td>
            <td class="text-right">Cashier: {{ strtoupper(auth()->user()->name) }}</td>
        </tr>
    </table>

    <div class="line"></div>

    <!-- Item Details -->
    <table>
        <tr class="bold">
            <td>Item</td>
            <td class="text-right">Qty</td>
            <td class="text-right">Discount</td>
            <td class="text-right">Total</td>
        </tr>
        @foreach ($detail as $item)
        <tr>
            <td>{{ $item->produk->nama_produk }}</td>
            <td class="text-right">{{ $item->jumlah }}</td>
            <td class="text-right">{{ format_uang($penjualan->diskon) }}</td>
            <td class="text-right">{{ format_uang($item->jumlah * $item->harga_jual) }}</td>
        </tr>
        @endforeach
    </table>

    <div class="line"></div>

    <!-- Pricing Summary -->
    <table>
        <tr>
            <td>Gross Price:</td>
            <td class="text-right">{{ format_uang($penjualan->total_harga) }}</td>
        </tr>
        <tr>
            <td>Total Items:</td>
            <td class="text-right">{{ format_uang($penjualan->total_item) }}</td>
        </tr>
        <tr>
            <td>Discount:</td>
            <td class="text-right">{{ format_uang($penjualan->diskon) }}</td>
        </tr>
        <tr class="bold">
            <td>Total:</td>
            <td class="text-right">{{ format_uang($penjualan->bayar) }}</td>
        </tr>
        <tr>
            <td>Cash:</td>
            <td class="text-right">{{ format_uang($penjualan->diterima) }}</td>
        </tr>
        <tr class="bold">
            <td>Balance:</td>
            <td class="text-right">{{ format_uang($penjualan->diterima - $penjualan->bayar) }}</td>
        </tr>
    </table>

    <div class="line"></div>

    <!-- Footer Section -->
    <p class="text-center small-text">Items which are sold cannot be returned after 3 days.</p>
    <p class="text-center bold">Thank you for your visit!</p>
    <p class="text-center small-text">Powered by TrioDev Solutions</p>

    <script>
        let body = document.body;
        let html = document.documentElement;
        let height = Math.max(
            body.scrollHeight, body.offsetHeight,
            html.clientHeight, html.scrollHeight, html.offsetHeight
        );

        document.cookie = "innerHeight=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        document.cookie = "innerHeight=" + ((height + 50) * 0.264583);
    </script>
</body>
</html>
