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

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Edit Data Pemakaian Obat</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <?php echo form_open_multipart(); ?>
                <div class="card-body">

                    <!-- input states -->
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="exampleSelectBorderWidth2">Nama Obat</label>
                                <input type="text" class="form-control" value="<?php echo $files[0]->nama_obat; ?>" readonly>
                                <input type="number" class="form-control" name="id_pemakaian" value="<?php echo $files[0]->id_pemakaian; ?>" hidden readonly>
                                <span style="color:red"><?php echo form_error('id_pemakaian'); ?></span>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="exampleSelectBorderWidth2">Bulan</label>
                                <select class="form-control" name="bulan">
                                    <?php
                                    $arrayMonth = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                                    $num = 0;

                                    foreach ($arrayMonth as $arr) {
                                        if ($files[0]->bulan == $num) {
                                            echo '<option selected value="' . $num . '">' . $arrayMonth[$num - 0] . '</option>';
                                        } else {
                                            echo '<option value="' . $num . '">' . $arrayMonth[$num - 0] . '</option>';
                                        }
                                        $num++;
                                    }
                                    ?>
                                </select>
                                <span style="color:red"><?php echo form_error('bulan'); ?></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="exampleSelectBorderWidth2">Tahun</label>
                                <input type="number" class="form-control" name="tahun" placeholder="Tahun" value="<?php echo $files[0]->tahun; ?>">
                                <span style="color:red"><?php echo form_error('tahun'); ?></span>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="exampleSelectBorderWidth2">Stok Awal</label>
                                <input type="number" class="form-control" name="stok_awal" placeholder="Stok Awal" value="<?php echo $files[0]->stok_awal; ?>">
                                <span style="color:red"><?php echo form_error('stok_awal'); ?></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="exampleSelectBorderWidth2">Penerimaan</label>
                                <input type="number" class="form-control" name="penerimaan" placeholder="Penerimaan" value="<?php echo $files[0]->penerimaan; ?>">
                                <span style="color:red"><?php echo form_error('penerimaan'); ?></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Sisa Stok</label>
                                <input type="number" min="0" class="form-control" name="sisa_stok" placeholder="Sisa Stok" value="<?php echo $files[0]->sisa_stok; ?>">
                                <span style="color:red"><?php echo form_error('pemakaian'); ?></span>
                            </div>
                        </div>
                    </div>
                    <!-- /input states -->
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
        <?php echo form_close() ?>

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