        <footer id="footer">
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 footer-contact">
                            <h4>Inspektorat Provinsi Sulawesi Tenggara</h4>
                            <p>
                                <?php echo $setting[0]->setting_address; ?> <br><br>
                                <strong>Telepon:</strong> <?php echo $setting[0]->setting_phone; ?><br>
                                <strong>Email:</strong> <?php echo $setting[0]->setting_email; ?><br>
                            </p>
                        </div>

                        <div class="col-lg-4 col-md-6 footer-links">
                            <h4>Sosial Media</h4>
                            <div class="social-links mt-3">
                                <a href="https://facebook.com/<?php echo $setting[0]->setting_facebook; ?>" class="facebook"><i class="bx bxl-facebook"></i></a><br>
                                <a href="https://instagram.com/<?php echo $setting[0]->setting_instagram; ?>" class="instagram mt-3"><i class="bx bxl-instagram"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 footer-links">
                            <h4>Pengunjung</h4>
                            <div>
                                <!-- Histats.com  (div with counter) -->
                                <div id="histats_counter"></div>
                                <!-- Histats.com  START  (aync)-->

                                <!-- <script type="text/javascript">
                                    var _Hasync = _Hasync || [];
                                    _Hasync.push(['Histats.start', '1,4550151,4,408,270,55,00011111']);
                                    _Hasync.push(['Histats.fasi', '1']);
                                    _Hasync.push(['Histats.track_hits', '']);
                                    (function() {
                                        var hs = document.createElement('script');
                                        hs.type = 'text/javascript';
                                        hs.async = true;
                                        hs.src = ('//s10.histats.com/js15_as.js');
                                        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(hs);
                                    })();
                                </script>
                                <noscript><a href="/" target="_blank"><img src="//sstatic1.histats.com/0.gif?4550151&101" alt="" border="0"></a></noscript> -->

                                <!-- Histats.com  END  -->

                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="container">
                <div class="copyright">
                    &copy; Copyright <strong><span><?php echo $setting[0]->setting_owner_name; ?></span></strong>. All Rights Reserved
                </div>
            </div>
        </footer><!-- End Footer -->

        <a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>
        <div id="preloader"></div>

        <!-- Vendor JS Files -->
        <script src="<?php echo base_url() ?>assets/core-front/vendor/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url() ?>assets/core-front/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo base_url() ?>assets/core-front/vendor/jquery.easing/jquery.easing.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/core-thirdparty/orgchart/orgchart.js"></script>
        <script src="<?php echo base_url() ?>assets/core-front/vendor/php-email-form/validate.js"></script>
        <script src="<?php echo base_url() ?>assets/core-front/vendor/owl.carousel/owl.carousel.min.js"></script>
        <script src="<?php echo base_url() ?>assets/core-front/vendor/venobox/venobox.min.js"></script>
        <script src="<?php echo base_url() ?>assets/core-front/vendor/isotope-layout/isotope.pkgd.min.js"></script>
        <script src="<?php echo base_url() ?>assets/core-front/vendor/aos/aos.js"></script>
        <!-- Template Main JS File -->
        <script src="<?php echo base_url() ?>assets/core-front/js/main.js"></script>
        <script language="JavaScript" type="text/javascript">
            $(document).ready(function() {
                $('.carousel').carousel({
                    interval: 5000
                })
            });
        </script>
        </body>

        </html>