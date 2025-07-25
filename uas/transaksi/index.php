<?php 
include '../header.php';

?>
<div class="container">
    <div class="row">
        
        <div class="col-md-8">

            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <div class="input-group ">
                            <select id="searchProduct" class="form-control input-group-prepend">
                                
                            </select>
                            <div class="input-group-append">
                                <input type="number" id="quantity" class="form-control" placeholder="Jumlah" min="1" value="1">
                            </div>
                            <button id="addProductBtn" class="btn btn-primary">Tambah</button>
                        </div>
                        
                    </div>
                    <form id="temporaryForm" action="<?php echo $path; ?>/transaksi/proses.php" method="POST">
                        <table id="temporaryTable" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th style="width: 100px;">Nama Produk</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th>Total</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="temporaryTableBody">
                                
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="4">Total</td>
                                    <td id="totalAmount">
                                       
                                    </td>
                                    <td></td>
                                </tr>
                            </tfoot>
                        </table>
                        <button type="button" class="btn btn-primary mb-3" id="addItemBtn">Final</button>
                    </form> 
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <h2>List Transaksi</h2>
            <form action="">
                <div class="form-group">
                    <label for="start_date">Start Date</label>
                    <input type="date" class="form-control" id="start_date" name="start_date" value="<?php echo $start_date; ?>">
                    <label for="end_date">End Date</label>
                    <input type="date" class="form-control" id="end_date" name="end_date" value="<?php echo $end_date; ?>">
                </div>
                <button type="submit" class="btn btn-primary">Filter</button>
            </form>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $start_date = isset($_GET['start_date']) ? $_GET['start_date'] : date('Y-m-d 00:00:00');
                    $end_date = isset($_GET['end_date']) ? $_GET['end_date'] : date('Y-m-t 23:59:59');

                    $transaksi_list = 'SELECT 
                    nota_no, 
                    sum(total_harga) as total 
                    FROM transaksi_penjualan 
                    WHERE tanggal_transaksi BETWEEN ? AND ?
                    GROUP BY nota_no 
                    ORDER BY nota_no DESC';
                    $stmt = $conn->prepare($transaksi_list);
                    $stmt->bind_param("ss", $start_date, $end_date);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['nota_no']}</td>
                                <td>{$row['total']}</td>
                              </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        var tables = $('#temporaryTable').DataTable({
            "paging": false,
            "info": false,
            "searching": false,
            "ordering": false
        });

        $('#searchProduct').select2({
            placeholder: 'Pilih Produk',
            ajax: {
                url: '<?php echo $path; ?>/transaksi/get_produk.php',
                dataType: 'json',
                delay: 250,
                processResults: function(data) {
                    return {
                        results: data.map(function(item) {
                            return { id: item.id, text: item.nama_barang, harga: item.harga };
                        })
                    };
                },
                cache: true
            }
        });

        // Add product to temporary table
        $('#addProductBtn').click(function() {
            var productId = $('#searchProduct').val();
            var quantity = $('#quantity').val();
            if (productId && quantity > 0) {
                var product = $('#searchProduct').select2('data')[0];
                var productId = product.id;
                var price = parseFloat(product.harga);
                var total = price * quantity;
                var row = `<tr>
                            <td></td>
                            <td>${product.text}</td>
                            <td>${price}</td>
                            <td>${quantity}</td>
                            <td>${total}</td>
                            <td><button type='button' class='btn btn-danger remove-item'>Hapus</button></td>
                        </tr>`;
                $('#temporaryTableBody').append(row);
                $('#temporaryForm').append(`<input type='hidden' name='item[]' value='${JSON.stringify({id_produk: productId, nama_produk: product.text, harga: price, jumlah: quantity, total: total})}'>`);
                updateTotalAmount();
                $('#searchProduct').val(null).trigger('change');
                $('#quantity').val(1);

            } else {
                alert('Please select a product and enter a valid quantity.');
            }
        });

        // Remove item from temporary table
        $(document).on('click', '.remove-item', function() {
            $(this).closest('tr').remove();
            updateTotalAmount();
        });

        // Update total amount
        function updateTotalAmount() {
            var total = 0;
            $('#temporaryTableBody tr').each(function() {
                var itemTotal = parseFloat($(this).find('td:nth-child(5)').text());
                if (!isNaN(itemTotal)) {
                    total += itemTotal;
                }
            });
            $('#totalAmount').text(total);
        }

        // Finalize transaction
        $('#addItemBtn').click(function() {
            $('#temporaryForm').submit();
        });
    });
</script>