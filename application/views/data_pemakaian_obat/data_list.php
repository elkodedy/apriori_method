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
                            <div class="card">
                                <div class="card-header">
                                <a href="<?php echo site_url('data_pemakaian_obat/create') ?>" class="btn-sm btn-primary">Tambah Data</a>
                                
                                <a href="" class="btn-sm btn-success">Import Data</a>
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
                                            
                                            $no=1;
                                            foreach( $files as $file ):
                                        ?>


                                            <tr>
                                                <td> <?php echo $no?> </td>
                                                <td> <?php echo $file->nama_obat?> </td>
                                                <td>
                                                    <?php 
                                                        $num = 0; 
                                                        foreach($arrayMonth as $arr){
                                                        if($file->bulan == $num){
                                                            echo $arrayMonth[$num];
                                                        }
                                                        $num++;
                                                        }
                                                    ?>
                                                </td>
                                                <td> <?php echo $file->tahun?> </td>
                                                <td> <?php echo $file->stok_awal?> </td>
                                                <td> <?php echo $file->penerimaan?> </td>
                                                <td> <?php echo $file->persediaan?> </td>
                                                <td> <?php echo $file->sisa_stok?> </td>
                                                <td> <?php echo $file->persediaan-$file->sisa_stok?> </td>
                                                <td><a href="<?php echo site_url('data_pemakaian_obat/edit/').$file->id_pemakaian;?>" class="btn-sm btn-primary">Edit</a>
                                                <a href="<?php echo site_url('data_pemakaian_obat/delete/').$file->id_pemakaian;?>" class="btn-sm btn-danger">Hapus</a></td>
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
