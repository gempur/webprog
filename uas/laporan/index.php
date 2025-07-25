<?php
include '../header.php';

?>
<div class="container">
    <div class="row">
        <div class="col-md-8">

            <div class="card">
                <div class="card-title">Laporan Transaksi</div>
                <div class="card-body">
                    <table id="transactionTable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nota No</th>
                                <th>Tanggal</th>
                                <th>Nama</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM transaksi_penjualan 
                            LEFT JOIN master_barang ON transaksi_penjualan.id_barang = master_barang.id
                            ORDER BY tanggal_transaksi DESC";
                            $result = $conn->query($query);
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>
                                        <td>{$row['id']}</td>
                                        <td>{$row['nota_no']}</td>
                                        <td>{$row['tanggal_transaksi']}</td>
                                        <td>{$row['nama_barang']}</td>
                                        <td>{$row['jumlah']}</td>
                                        <td>{$row['harga']}</td>
                                        <td>{$row['total_harga']}</td>
                                      </tr>";
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="6">Total</td>
                                <td>
                                    <?php
                                    $total_query = "SELECT SUM(total_harga) as total FROM transaksi_penjualan";
                                    $total_result = $conn->query($total_query);
                                    $total_row = $total_result->fetch_assoc();
                                    echo number_format($total_row['total'], 2);
                                    ?>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="start_date">Start Date</label>
                        <input type="date" class="form-control" id="start_date" name="start_date" value="<?php echo $start_date; ?>">
                    </div>
                    <div class="form-group">
                        <label for="end_date">End Date</label>
                        <input type="date" class="form-control" id="end_date" name="end_date" value="<?php echo $end_date; ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </div>
        </div>
    </div>
</div>