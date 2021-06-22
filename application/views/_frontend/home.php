    <style>
        .news-text p {
            font-size: 14px;
        }

        .news-text span {
            font-size: 14px;
        }

        .owl-carousel-image .animated {
            animation-duration: 3500ms;
        }

        #hero .carousel-item::before {
            content: '';
            background-color: rgba(0, 0, 0, 0);
        }

        .carousel-item {

            background-position: center center;
        }
    </style>

    <section id="hero" style="height: 70vh;">
        <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

            <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

            <div class="carousel-inner" role="listbox">

                <?php $i = 1;
                foreach ($slider as $s) { ?>
                    <div class="carousel-item <?php if ($i == 1) {
                                                    echo "active";
                                                } ?>" style="background-image: url(<?php echo base_url(); ?>upload/slider/<?php echo $s->slider_image; ?>); background-position: center;">
                        <div class="carousel-container">
                            <div class="container">
                            </div>
                        </div>
                    </div>
                <?php $i++;
                } ?>
            </div>
        </div>
    </section><!-- End Hero -->

    <main id="main" class="py-5">
        <!-- ======= Beranda ======= -->
        <section id="blog" class="blog home-sticky">
            <div class="container" data-aos="fade-up">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="section-title text-center col-lg-12">
                                <h2>Sambutan Inspektur</h2>
                            </div>

                            <div class="col-lg-12">
                            <!-- <div class="col-lg-6 pt-2"> -->
                                <div class="col-lg-12 p-0">
                                    <img src="<?php echo base_url(); ?>upload/content/<?php echo $content[0]->content_image; ?>" width="100%">
                                </div>
                                <hr>
                            </div>

                            <div class="col-lg-12">
                            <!-- <div class="col-lg-6"> -->
                                <?php echo $content[0]->content_text ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="section-title text-center col-lg-12">
                                <h2>Berita Terbaru</h2>
                            </div>

                            <div class="row px-5">
                                <?php foreach ($news as $n) { ?>
                                    <div class="col-lg-6 news-text">
                                        <div class="col-lg-12 p-0" style="height: 150px; overflow-y: hidden;">
                                            <img src="<?php echo base_url(); ?>upload/news/<?php echo $n->news_cover; ?>" style="width: 100%;">
                                        </div>
                                        <div class="section-title text-left pb-1 pt-2">
                                            <b><a href="<?php echo site_url('page/berita_detail/') . $n->news_id; ?>"><?php echo $n->news_title ?></b></a>
                                        </div>
                                        <div class="content-justify" style="word-wrap: break-word">
                                            <?php echo substr($n->news_text, 0, 150); ?><a href="<?php echo site_url('page/berita_detail/') . $n->news_id; ?>">...baca</a>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="p-4 text-right">
                            <a class="btn btn-danger btn-sm" href="<?php echo site_url('page/berita/1'); ?>">Berita Lain . . .</a>
                        </div>
                    </div>
                    <!-- <a href="<?php echo site_url('page/berita') ?>" class="btn btn-sm btn-success">Lihat Informasi Lainnya </a> -->
                </div>
        </section>

        <!-- ======= Photos Section ======= -->
        <section id="clients" class="clients" style="background-color: #f1f8ff;">
            <div class="section-title text-center col-lg-12">
                <h2>Foto Terbaru</h2>
            </div>
            <div class="container" data-aos="zoom-in">
                <div class="owl-carousel owl-carousel-image clients-carousel">
                    <?php foreach ($gallery as $g) { ?>
                        <img src="<?php echo base_url() . 'upload/album/' . $g->gallery_dir ?>" alt="" style="opacity: 1; width: 100%; transition: 0.5s; border-radius:5px;">
                    <?php } ?>
                </div>
                <div class="p-4 text-right">
                    <a class="btn btn-danger btn-sm" href="<?php echo site_url('page/album/image') ?>">Lihat Foto Lainnya . . .</a>
                </div>
            </div>
        </section><!-- End Clients Section -->

        <!-- ======= Clients Section ======= -->
        <section id="clients" class="clients">
            <div class="section-title text-center col-lg-12">
                <h2>Link Terkait</h2>
            </div>
            <div class="container" data-aos="zoom-in">
                <div class="owl-carousel clients-carousel">
                    <img src="<?php echo base_url(); ?>assets/core-front/img/icon/link_terkait/pemkot.png" alt="">
                    <img src="<?php echo base_url(); ?>assets/core-front/img/icon/link_terkait/sicantik.png" alt="">
                    <img src="<?php echo base_url(); ?>assets/core-front/img/icon/link_terkait/oss.png" alt="">
                    <img src="<?php echo base_url(); ?>assets/core-front/img/icon/link_terkait/bkpm.png" alt="">
                    <img src="<?php echo base_url(); ?>assets/core-front/img/icon/link_terkait/kswp.png" alt="">
                </div>
            </div>
        </section><!-- End Clients Section -->

    </main><!-- End #main -->