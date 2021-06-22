        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Data Obat</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Data Obat</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- alert  -->

            <!-- alert  -->


            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <a href="<?php echo site_url('data_obat/create') ?>" class="btn-sm btn-primary">Tambah Data</a>

                                    <a href="<?php echo site_url('data_obat/to_pdf') ?>" class="btn-sm btn-success">Import Data</a>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="tabel_1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Obat</th>
                                                <th>Satuan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            // var_dump($files); die;
                                            $no = 1;
                                            foreach ($files as $file) :
                                            ?>


                                                <tr>
                                                    <td> <?php echo $no ?> </td>
                                                    <td> <?php echo $file->nama_obat ?> </td>
                                                    <td> <?php echo $file->satuan ?> </td>
                                                    <td><a href="<?php echo site_url('data_obat/edit/') . $file->id_obat; ?>" class="btn-sm btn-primary">Edit</a>
                                                        <a href="<?php echo site_url('data_obat/delete/') . $file->id_obat; ?>" class="btn-sm btn-danger">Hapus</a>
                                                    </td>
                                                </tr>
                                            <?php
                                                $no++;
                                            endforeach;
                                            ?>
                                        </tbody>
                                    </table>



                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <!-- /.content -->
        </div>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
        </div>
        <!-- ./wrapper -->