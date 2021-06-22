<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <ol>
            <li><a href="<?php echo site_url('home') ?>">Home</a></li>
            <li><a href="#">Hubungi Kami</a></li>
        </ol>
        <h2>Hubungi Kami</h2>

    </div>
</section><!-- End Breadcrumbs -->
<main id="main">

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

            <div class="section-title col-lg-12 pt-5">
                <h2>Hubungi Kami</h2>
            </div>

            <div class="row mt-1 d-flex justify-content-end" data-aos="fade-right" data-aos-delay="100">

                <div class="col-lg-5">
                    <div class="info">
                        <div class="address">
                            <i class="icofont-google-map"></i>
                            <h4>Lokasi Kantor:</h4>
                            <p><?php echo $setting[0]->setting_address; ?></p>
                        </div>

                        <div class="email">
                            <i class="icofont-envelope"></i>
                            <h4>Email:</h4>
                            <p><?php echo $setting[0]->setting_email; ?></p>
                        </div>

                        <div class="phone">
                            <i class="icofont-phone"></i>
                            <h4>Telepon:</h4>
                            <p><?php echo $setting[0]->setting_phone; ?></p>
                        </div>

                    </div>

                </div>

                <div class="col-lg-6 mt-5 mt-lg-0" data-aos="fade-left" data-aos-delay="100">

                    <?php
                    if ($this->session->flashdata('alert')) {
                        echo $this->session->flashdata('alert');
                    } ?>

                    <?php echo form_open_multipart("page/create_contact_us") ?>
                    <div class="form-row">
                        <div class="col-md-6 form-group">
                            <?php echo csrf(); ?>
                            <input type="text" name="message_name" class="form-control" id="name" placeholder="Nama Anda" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                            <div class="validate"></div>
                        </div>
                        <div class="col-md-6 form-group">
                            <input type="email" class="form-control" name="message_email" id="email" placeholder="Email Anda" data-rule="email" data-msg="Please enter a valid email" />
                            <div class="validate"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="message_subject" id="subject" placeholder="Subjek Pengaduan" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                        <div class="validate"></div>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="message_text" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Pengaduan Anda"></textarea>
                        <div class="validate"></div>
                    </div>

                    <div class="text-center"><button class="btn btn-danger" type="submit">Kirim Pesan</button></div>
                    <?php echo form_close(); ?>

                </div>

            </div>

            <div class="row">
                <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC8aB4MpC1orBp300KQQAiVEnWdpry4OPg"></script> -->
                <!--Google map-->
                <!-- <div class="col-lg-12 shadow p-3 mb-5 bg-white rounded">
                    <iframe src="https://maps.google.com/maps?-3.9741852,122.5220737,17.56z?hl=es;z%3D14;output=embed" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div> -->
                <!--Google Maps-->
            </div>

        </div>
    </section><!-- End Contact Section -->

</main><!-- End #main -->