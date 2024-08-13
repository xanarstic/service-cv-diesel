<body>


            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Teknisi
                                <a class="btn btn-sm btn-primary" href="<?= base_url('home/tteknisi')?>">Tambah Teknisi</a>
                        </h6>
                        <a href="">Show All</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col">Nama</th>
                                    <th scope="col">No. Telp</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                $no=1;
                foreach ($darren as $key) { ?>
                                <tr>
                                    <td><?= $key->nama_teknisi ?></td>
                                    <td><?= $key->No_Telp ?></td>
                                    <td><?= $key->email ?></td>
                                    <td><?= $key->status ?></td>
                                    <td>
                                        <a href=" <?= base_url('home/eteknisi/'.$key->id_teknisi)?>">
		                                <button class="btn btn-sm btn-primary">Edit</button>
		                                </a>
                                        <a href=" <?= base_url('home/deletet/'.$key->id_teknisi)?>">
		                                <button class="btn btn-sm btn-primary">Delete</button>
		                                </a>
                                    </td>
                                    
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->

