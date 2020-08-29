<head>
    <title>INVENTORY</title>
</head>

<body>
    <center>
        <h1>INVENTORY KELUAR</h1>
        <h3>DESA DEYANGAN</h3>
    </center>
    <center>
        <table border="1">
            <thead>
                <tr>
                    <th width="50">Kode</th>
                    <th width="150">Nama Produk</th>
                    <th width="150">Tipe</th>
                    <th width="150">Total Barang</th>
                    <th width="150">Kategori</th>
                    <th width="150">Lokasi</th>
                    <th width="100">Foto</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($data_list->result()) > 0) : ?>
                    <?php foreach ($data_list->result() as $data) : ?>
                        <tr>
                            <td><?php echo $data->code; ?></td>
                            <td><?php echo $data->brand; ?></td>
                            <td><?php echo $data->model; ?></td>
                            <td><?php echo $data->jumlah_datas; ?></td>
                            <td><?php echo $data->category_name; ?></td>
                            <td><?php echo $data->location_name; ?></td>
                            <td><?php if ($data->thumbnail != "") : ?>
                                    <img src="<?php echo base_url('assets/uploads/images/inventory/') . $data->thumbnail ?>" alt="<?php echo $data->brand . " " . $data->model ?>"><?php endif ?>
                            </td>
                        </tr>
                    <?php endforeach ?>
                <?php else : ?>
                    <tr>
                        <td class="text-center" colspan="7">Data Tidak Ditemukan!</td>
                    </tr>
                <?php endif ?>
            </tbody>
        </table>
    </center>
</body>
<script type="text/javascript">
    window.print();
</script>