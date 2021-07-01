        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Prediksi Pemakaian Obat</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Prediksi Pemakaian Obat</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- alert  -->
            <?php if ($this->session->flashdata('alert')) {
                echo $this->session->flashdata("alert");
            } ?>

            <!-- alert  -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Pilih data obat yang akan diprediksi <a onclick="location.reload();" class="btn btn-sm btn-success float-right">Refresh</a></h5>
                                </div>

                                <!-- /.card-header -->
                                <?php echo form_open_multipart('data_prediksi/forecast') ?>

                                <?php //echo csrf() ; 
                                ?>

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>Nama Obat</label>
                                                <select class="custom-select form-control-border border-width-2" name="id_obat" required="required">
                                                    <!-- <option selected disabled>---pilih Obat---</option> -->
                                                    <?php foreach ($files as $file) {
                                                        echo '<option value="' . $file->id_obat . '">' . $file->nama_obat .  '</option>';
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- <div class="col-12 col-sm-3">
                                            <div class="form-group">
                                                <label>Tahun</label>
                                                <input type="number" class="form-control" name="tahun" placeholder="Tahun" value="<?php echo date("Y"); ?>">
                                            </div>
                                        </div> -->

                                    </div>


                                    <div class="row">

                                        <div class="col-12 col-sm-3">
                                            <div class="form-group">
                                                <label>Alfa</label>
                                                <input type="number" class="form-control" name="alpha" placeholder="Alfa...." min="0" max="10" step="0.01" required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-3">
                                            <div class="form-group">
                                                <label>Beta</label>
                                                <input type="number" class="form-control" name="beta" placeholder="Beta...." min="0" max="10" step="0.01" required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-3">
                                            <div class="form-group">
                                                <label>Gamma</label>
                                                <input type="number" class="form-control" name="gamma" placeholder="Gamma...." min="0" max="10" step="0.01" required>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Prediksi "namanya"</button>
                                </div>
                                <?php echo form_close() ?>
                            </div>


                            <div class="card">
                                <div class="card-header">
                                    <?php if (isset($mape)) { ?>
                                        <label>MAPE = <?php echo number_format((float)$mape, 2, '.', '')  ?></label>
                                        <label class="ml-5">Aplha = <?php echo $alpha  ?></label>
                                        <label class="ml-5">Beta = <?php echo $beta  ?></label>
                                        <label class="ml-5">Gamma = <?php echo $gamma  ?></label>
                                    <?php } ?>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="tabel_1" id="tabel_prediksi" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Obat</th>
                                                <th>Bulan</th>
                                                <th>Tahun</th>
                                                <th>Data Aktual</th>
                                                <th>Data Ramalan</th>
                                                <th>Error</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (isset($bulan_ke)) {
                                                $index = count($bulan_ke) - 23;
                                                for ($i = 1; $i <= 24; $i++) { ?>
                                                    <tr>
                                                        <td><?php echo $i ?></td>
                                                        <td>
                                                            <?php if (isset($nama_obat[$index]))
                                                                echo $nama_obat[$index] ?>
                                                        </td>
                                                        <td>
                                                            <?php if (isset($bulan[$index]))
                                                                echo $bulan[$index] ?>
                                                        </td>
                                                        <td>
                                                            <?php if (isset($tahun[$index]))
                                                                echo $tahun[$index] ?>
                                                        </td>
                                                        <td>
                                                            <?php if (isset($data_aktual[$index]))
                                                                echo $data_aktual[$index] ?>
                                                        </td>
                                                        <td>
                                                            <?php if (isset($prediksi[$index]))
                                                                echo number_format((float)$prediksi[$index], 2, '.', '')  ?>
                                                        </td>
                                                        <td>
                                                            <?php if (isset($error[$index]))
                                                                echo number_format((float)$error[$index], 2, '.', '')  ?>
                                                        </td>
                                                    </tr>
                                            <?php $index++;
                                                }
                                            } ?>
                                        </tbody>
                                    </table>
                                    <script>

                                    </script>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
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

        <?php if (isset($bulan_ke)) { ?>
            <script>
                var $salesChart = $('#sales-chart')
                // eslint-disable-next-line no-unused-vars
                var salesChart = new Chart($salesChart, {
                    type: 'bar',
                    data: {
                        labels: ['JAN', 'FEB', 'MAR', 'APR', 'MEI', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
                        datasets: [{
                                backgroundColor: '#007bff',
                                borderColor: '#007bff',
                                data: [
                                    1000, 2000, 3000, 2500, 2700, 2500, 3000
                                ]
                            },
                            {
                                backgroundColor: '#ced4da',
                                borderColor: '#ced4da',
                                data: [700, 1700, 2700, 2000, 1800, 1500, 2000]
                            }
                        ]
                    },
                    options: {
                        maintainAspectRatio: false,
                        tooltips: {
                            mode: mode,
                            intersect: intersect
                        },
                        hover: {
                            mode: mode,
                            intersect: intersect
                        },
                        legend: {
                            display: false
                        },
                        scales: {
                            yAxes: [{
                                // display: false,
                                gridLines: {
                                    display: true,
                                    lineWidth: '4px',
                                    color: 'rgba(0, 0, 0, .2)',
                                    zeroLineColor: 'transparent'
                                },
                                ticks: $.extend({
                                    beginAtZero: true,

                                    // Include a dollar sign in the ticks
                                    callback: function(value) {
                                        if (value >= 1000) {
                                            value /= 1000
                                            value += 'k'
                                        }

                                        return '$' + value
                                    }
                                }, ticksStyle)
                            }],
                            xAxes: [{
                                display: true,
                                gridLines: {
                                    display: false
                                },
                                ticks: ticksStyle
                            }]
                        }
                    }
                })
            </script>
        <?php } ?>