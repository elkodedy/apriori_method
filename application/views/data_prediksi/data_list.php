        <div class="content-wrapper">
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
            </section>

            <?php if ($this->session->flashdata('alert')) {
                echo $this->session->flashdata("alert");
            } ?>


            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Pilih data obat yang akan diprediksi <a onclick="location.reload();" class="btn btn-sm btn-success float-right">Refresh</a></h5>
                                </div>

                                <?php echo form_open_multipart('data_prediksi/forecast') ?>

                                <?php //echo csrf() 
                                ?>

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>Nama Obat</label>
                                                <select class="custom-select form-control-border border-width-2" name="id_obat" required="required">
                                                    <?php foreach ($files as $file) {
                                                        echo '<option value="' . $file->id_obat . '">' . $file->nama_obat .  '</option>';
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">

                                        <div class="col-12 col-sm-3">
                                            <div class="form-group">
                                                <label>Alfa</label>
                                                <input type="number" class="form-control" name="alpha" placeholder="Alfa...." min="0" max="1" step="0.01" required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-3">
                                            <div class="form-group">
                                                <label>Beta</label>
                                                <input type="number" class="form-control" name="beta" placeholder="Beta...." min="0" max="1" step="0.01" required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-3">
                                            <div class="form-group">
                                                <label>Gamma</label>
                                                <input type="number" class="form-control" name="gamma" placeholder="Gamma...." min="0" max="1" step="0.01" required>
                                            </div>
                                        </div>


                                    </div>
                                </div>
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
                                <div class="card-footer">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>


            <!-- <section class="col-lg-12 connectedSortable px-3">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-chart-pie mr-1"></i> Grafik Prediksi Obat <?php //if (isset($bulan_ke)) echo $bulan[count($bulan_ke) - 23] . ' ' . $tahun[count($bulan_ke) - 23] . ' - ' . $bulan[count($bulan_ke) - 12] . ' ' . $tahun[count($bulan_ke) - 12] 
                                                                                        ?>
                        </h3>
                        <div class="card-tools">
                            <ul class="nav nav-pills ml-auto">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#aktual-chart" data-toggle="tab">Area</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="tab-content p-0">
                            <div class="chart tab-pane active" id="aktual-chart" style="position: relative; height: 300px;">
                                <canvas id="aktual-chart-canvas" height="300" style="height: 300px;"></canvas>
                            </div>
                            <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                                <canvas id="sales-chart-canvas" height="300" style="height: 300px;"></canvas>
                            </div>
                        </div>
                    </div>

                    <span class="btn btn-sm btn-flat" style="background-color: rgba(60,141,188,1);"></span> Data aktual tahun <?php //echo $tahun[count($bulan_ke) - 13] 
                                                                                                                                ?> <br>
                    <span class="btn btn-sm btn-flat" style="background-color: rgba(242, 210, 131, 1);"></span> Data prediksi tahun <?php //echo $tahun[count($bulan_ke) - 13] 
                                                                                                                                    ?>
                </div>
            </section> -->

        </div>

        <!-- <div class="card bg-gradient-primary" style="display:none;">
            <div class="row">
                <div class="col-4 text-center">
                    <div id="sparkline-1"></div>
                    <div class="text-white">Visitors</div>
                </div>
                <div class="col-4 text-center">
                    <div id="sparkline-2"></div>
                    <div class="text-white">Online</div>
                </div>
                <div class="col-4 text-center">
                    <div id="sparkline-3"></div>
                    <div class="text-white">Sales</div>
                </div>
            </div>
        </div>
        </section>
        </div>

        <aside class="control-sidebar control-sidebar-dark">
        </aside>
        </div> -->


        <script>
            // var salesChartData = {
            //     labels: [
            //         <?php
                        //         $index = count($bulan_ke) - 11;
                        //         if (isset($bulan_ke))
                        //             for ($i = 1; $i <= 12; $i++) {
                        //                 echo '"' . $bulan[$index] . '",';
                        //                 $index++;
                        //             }
                        //         
                        ?>
            //     ],

            //     datasets: [{
            //             label: 'Data Aktual',
            //             backgroundColor: 'rgba(60,141,188,0)',
            //             borderColor: 'rgba(60,141,188,0.8)',
            //             pointColor: 'red',
            //             pointSize: 4,
            //             gridTextSize: 10,
            //             pointStrokeColor: 'red',
            //             pointHighlightFill: 'red',
            //             pointHighlightStroke: 'red',
            //             data: [
            //                 <?php
                                //                 $index = count($bulan_ke) - 23;
                                //                 if (isset($bulan_ke))
                                //                     for ($i = 1; $i <= 24; $i++) {
                                //                         if ($i < 13)
                                //                             echo $data_aktual[$index] . ',';
                                //                         $index++;
                                //                     }
                                //                 
                                ?>
            //             ]
            //         },

            //         {
            //             label: 'Data Prediksi',
            //             backgroundColor: 'rgba(242, 210, 131, 0)',
            //             borderColor: 'rgba(242, 210, 131, 0.8)',
            //             pointColor: 'red',
            //             pointSize: 4,
            //             gridTextSize: 10,
            //             pointStrokeColor: 'red',
            //             pointHighlightFill: 'red',
            //             pointHighlightStroke: 'red',
            //             data: [
            //                 <?php
                                //                 $index = count($bulan_ke) - 23;
                                //                 if (isset($bulan_ke))
                                //                     for ($i = 1; $i <= 24; $i++) {
                                //                         if ($i < 13)
                                //                             echo number_format((float)$prediksi[$index], 2, '.', '') . ',';
                                //                         $index++;
                                //                     }
                                //                 
                                ?>
            //             ]
            //         }
            //     ]
            // }
        </script>