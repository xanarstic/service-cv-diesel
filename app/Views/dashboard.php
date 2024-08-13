<!-- View: dashboard.php -->
<!DOCTYPE html>
<style>
    .hidden-th {
        display: none;
    }
    .hidden-td {
        display: none;
    }
</style>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    
            <!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-bar fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Sale</p>
                                <h6 class="mb-0">$1234</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-area fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Today Revenue</p>
                                <h6 class="mb-0">$1234</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-pie fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Order</p>
                                <h6 class="mb-0">23</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sale & Revenue End -->

    <div class="container-fluid pt-4 px-4">
        <div class="bg-light text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Recent Orders</h6>
                <a href="#">Show All</a>
            </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr class="text-dark">
                            <th scope="col">No Pesanan</th>
                            <th scope="col">Nama</th>
                            <th scope="col" class="hidden-th">telp</th>
                            <th scope="col" class="hidden-th">alamat</th>
                            <th scope="col">Merek Genset</th>
                            <th scope="col">Merek Mesin</th>
                            <th scope="col">Kapasitas Genset</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Sistem Pesanan</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $no = 1;
                    foreach ($darren as $key) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= htmlspecialchars($key->nama_pemilik) ?></td>
                            <td class="hidden-td"><?= htmlspecialchars($key->no_telp) ?></td>
                            <td class="hidden-td"><?= htmlspecialchars($key->alamat) ?></td>
                            <td><?= htmlspecialchars($key->merk_genset) ?></td>
                            <td><?= htmlspecialchars($key->merk_mesin) ?></td>
                            <td><?= htmlspecialchars($key->kapasitas_genset) ?></td>
                            <td><?= htmlspecialchars($key->deskripsi_masalah) ?></td>
                            <td><?= htmlspecialchars($key->sistem_pesanan) ?></td>
                            <td><?= htmlspecialchars($key->status) ?></td>
                            <td>
                            <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#detailsModal" data-id="<?= $key->id_pesanan ?>" data-nama="<?= htmlspecialchars($key->nama_pemilik) ?>" data-merk-genset="<?= htmlspecialchars($key->merk_genset) ?>" data-merk-mesin="<?= htmlspecialchars($key->merk_mesin) ?>" data-kapasitas="<?= htmlspecialchars($key->kapasitas_genset) ?>" data-deskripsi="<?= htmlspecialchars($key->deskripsi_masalah) ?>" data-sistem="<?= htmlspecialchars($key->sistem_pesanan) ?>" data-status="<?= htmlspecialchars($key->status) ?>" data-notelp="<?= htmlspecialchars($key->no_telp) ?>" data-alamat="<?= htmlspecialchars($key->alamat) ?>">View Details</button>

                            </td>
                           
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

   <!-- Modal for Order Details -->
    <div class="modal fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="detailsModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailsModalLabel">Order Details</h5>
                  
                </div>
                <div class="modal-body">
                    <form action=" <?= base_url('home/editdetail/'.$key->id_pesanan)?>" method="POST">
                        <input type="hidden" id="orderId" name="orderId">
                        
                        <div class="form-group">
                            <label for="namaPemilik">Nama Pemilik</label>
                            <input type="text" class="form-control" id="namaPemilik" name="nama" disabled>
                        </div>
                        <div class="form-group">
                            <label for="namaPemilik">No. Telpon</label>
                            <input type="text" class="form-control" id="noTelpon" name="notelp" disabled>
                        </div>
                        <div class="form-group">
                            <label for="namaPemilik">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" disabled>
                        </div>
                        <div class="form-group">
                            <label for="merkGenset">Merek Genset</label>
                            <input type="text" class="form-control" id="merkGenset" name="merk" disabled>
                        </div>
                        <div class="form-group">
                            <label for="merkMesin">Merek Mesin</label>
                            <input type="text" class="form-control" id="merkMesin" name="mesin" disabled>
                        </div>
                        <div class="form-group">
                            <label for="kapasitasGenset">Kapasitas Genset</label>
                            <input type="text" class="form-control" id="kapasitasGenset" name="kapasitas" disabled>
                        </div>
                        <div class="form-group">
                            <label for="deskripsiMasalah">Deskripsi Masalah</label>
                            <textarea class="form-control" id="deskripsiMasalah" name="deskripsi" rows="3" disabled></textarea>
                        </div>
                        <div class="form-group">
                        <label for="sistemPesanan">Sistem Pesanan</label>
                        <select class="form-control" id="sistemPesanan" name="sistem" required>
                            <option value="Pick Up" <?= $darren['sistem_pesanan'] == 'Pick Up' ? 'selected' : '' ?>>Pick Up</option>
                            <option value="Langsung" <?= $darren['sistem_pesanan'] == 'Langsung' ? 'selected' : '' ?>>Langsung</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="On-Going" <?= $darren['status'] == 'On-Going' ? 'selected' : '' ?>>On-Going</option>
                            <option value="Done" <?= $darren['status'] == 'Done' ? 'selected' : '' ?>>Done</option>
                        </select>
                    </div>

                        <button type="submit" class="btn btn-primary">Save Changes</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



<!-- Modal -->
<script>
    $('#detailsModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var modal = $(this);

        modal.find('#orderId').val(button.data('id'));
        modal.find('#namaPemilik').val(button.data('nama'));
        modal.find('#noTelpon').val(button.data('notelp')); 
        modal.find('#alamat').val(button.data('alamat'));   
        modal.find('#merkGenset').val(button.data('merk-genset'));
        modal.find('#merkMesin').val(button.data('merk-mesin'));
        modal.find('#kapasitasGenset').val(button.data('kapasitas'));
        modal.find('#deskripsiMasalah').val(button.data('deskripsi'));
        modal.find('#sistemPesanan').val(button.data('sistem'));
        modal.find('#status').val(button.data('status'));
    });
</script>



</body>
</html>
