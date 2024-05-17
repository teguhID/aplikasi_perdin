<!DOCTYPE html>
<html>
<head>
    <title>Invoice</title>
    <style>
        /* CSS untuk styling invoice */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        .invoice {
            width: 80%;
            margin: 0 auto;
            border: 1px solid #000;
            padding: 20px;
        }
        .invoice-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .invoice-body {
            margin-bottom: 20px;
        }
        .invoice-table {
            width: 100%;
            border-collapse: collapse;
        }
        .invoice-table th, .invoice-table td {
            border: 1px solid #000;
            padding: 8px;
        }
        .invoice-total {
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="invoice" id="content">
        <div class="invoice-header">
            <h2>Invoice</h2>
            <p>No Invoice: 7</p>
        </div>
        <div class="invoice-body">
            <p>Nama: Ujang</p>
            <p>Email: ujang@gmail.com</p>
            <p>Produk: domain.com dengan durasi 3 bulan</p>
            <p>Harga: Rp. 300.000</p>
        </div>
        <div class="invoice-total">
            <p>Total Harga: Rp. 300.000</p>
        </div>
    </div>
</body>

<script src="{{ asset('') }}js/jquery-3.7.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $(document).ready(function () {
        const element = document.getElementById('content');
        html2pdf(element);
        setTimeout(function() {
            window.close();
        }, 100);
    });
</script>

</html>
