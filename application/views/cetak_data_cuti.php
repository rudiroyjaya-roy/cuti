<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekap Laporan Cuti Studio 12 Palembang Sumatera Selatan</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 40px;
            color: #333;
        }

        .header {
    display: flex;
    align-items: center;
    margin-bottom: 30px;
    border-bottom: 2px solid #000;
    padding-bottom: 10px;
    justify-content: center;
    position: relative;
}

.header img {
    width: 210px; 
    position: absolute;
    left: 40px; 
}

.header-content {
    flex: 1;
    text-align: center;
}


        .report-title {
            text-align: center;
            margin-top: 20px;
            font-size: 20px;
            text-transform: uppercase;
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            border: 1px solid #666;
            font-size: 14px;
            text-align: center;
        }

        th {
            background-color: #f5f5f5;
            text-transform: uppercase;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tfoot td {
            border: none;
            text-align: right;
            padding-top: 20px;
        }

        @media print {
            body {
                margin: 0;
            }
            .header {
                border-bottom: 1px solid #000;
                padding-bottom: 5px;
            }
            th {
                background-color: #ccc !important;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <!-- <img src="<?=base_url();?>assets/login/images/studio12.png" alt="Studio 12 Logo"> -->
        <div class="header-content">
            <h1>Rekap Laporan Cuti Studio 12 (coffee & resto)</h1>
            <p>Jl. Sultan Mahmud Badaruddin II, Alang-Alang Lebar Km12 Kota Palembang, Sumatera Selatan</p>
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>Alasan</th>
                <th>Diajukan</th>
                <th>Mulai</th>
                <th>Berakhir</th>
                <th>Perihal</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; foreach ($cuti as $i) : ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $i['nama_lengkap'] ?></td>
                <td><?= $i['alasan'] ?></td>
                <td><?= $i['tgl_diajukan'] ?></td>
                <td><?= $i['mulai'] ?></td>
                <td><?= $i['berakhir'] ?></td>
                <td><?= $i['perihal_cuti'] ?></td>
                <td><?= $i['id_status_cuti'] == 2 ? 'Diterima' : ($i['id_status_cuti'] == 3 ? 'Ditolak' : 'Menunggu Konfirmasi') ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table><br>
    <?= date('d F Y') ?></td>
     
    <script type="text/javascript">
        window.print();
        setTimeout(function() {
            window.close();
        }, 3000);
    </script>
</body>
</html>
