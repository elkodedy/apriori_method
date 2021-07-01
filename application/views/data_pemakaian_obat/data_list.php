        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Data Pemakaian Obat</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Data Pemakaian Obat</li>
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
                            <!-- alert  -->
                            <?php if ($this->session->flashdata('alert')) {
                                echo $this->session->flashdata("alert");
                            } ?>
                            <div class="card">
                                <div class="card-header">
                                    <a href="<?php echo site_url('data_pemakaian_obat/create') ?>" class="btn btn-sm btn-primary">Tambah Data</a>
                                    <a onclick="location.reload();" class="btn btn-sm btn-success">Refresh</a>
                                    <!-- <a href="" class="btn-sm btn-success">Import Data</a> -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="tabel_1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Obat</th>
                                                <th>Bulan</th>
                                                <th>Tahun</th>
                                                <th>Stok Awal</th>
                                                <th>Penerimaan</th>
                                                <th>Persediaan</th>
                                                <th>Sisa Stok</th>
                                                <th>Pemakaian</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            $arrayMonth = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

                                            $no = 1;
                                            foreach ($files as $file) :
                                            ?>


                                                <tr>
                                                    <td> <?php echo $no ?> </td>
                                                    <td> <?php echo $file->nama_obat ?> </td>
                                                    <td>
                                                        <?php
                                                        $num = 0;
                                                        foreach ($arrayMonth as $arr) {
                                                            if ($file->bulan == $num) {
                                                                echo $arrayMonth[$num];
                                                            }
                                                            $num++;
                                                        }
                                                        ?>
                                                    </td>
                                                    <td> <?php echo $file->tahun ?> </td>
                                                    <td> <?php echo $file->stok_awal ?> </td>
                                                    <td> <?php echo $file->penerimaan ?> </td>
                                                    <td> <?php echo $file->persediaan ?> </td>
                                                    <td> <?php echo $file->sisa_stok ?> </td>
                                                    <td> <?php echo $file->persediaan - $file->sisa_stok ?> </td>
                                                    <td>
                                                        <a href="<?php echo site_url('data_pemakaian_obat/edit/') . $file->id_pemakaian; ?>" class="btn btn-sm btn-primary">Edit</a>
                                                        <a class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modalDelete<?php echo $file->id_pemakaian ?>">Hapus</a>
                                                    </td>
                                                </tr>

                                                <!-- Modal Delete-->
                                                <div class="modal fade" id="modalDelete<?php echo $file->id_pemakaian ?>" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <i aria-hidden="true" class="ki ki-close"></i>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Apakah anda yakin akan menghapus data ini?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a href="<?php echo site_url('data_pemakaian_obat/delete/') . $file->id_pemakaian; ?>" class="btn btn-danger font-weight-bold">Hapus</a>
                                                                <button type="button" class="btn btn-secondary font-weight-bold" data-dismiss="modal">Batal</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

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