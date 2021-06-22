<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <ol>
            <li><a href="<?php echo site_url('home') ?>">Home</a></li>
            <li><a href="#">Informasi</a></li>
        </ol>
        <h2>Informasi</h2>

    </div>
</section><!-- End Breadcrumbs -->


<style>
    span {
        font-size: 14px;

    }
</style>

<main id="main">
    <section id="services" class="services">
        <div class="container" data-aos="fade-up">

            <!-- ======= Blog Section ======= -->
            <section id="blog" class="blog">
                <div class="container" data-aos="fade-up">

                    
                    <div class="section-title text-left col-lg-12">
                        <h2>
                            <?php
                            if ($this->uri->segment(3) == 0 || $news == NULL)
                                echo 'Semua Informasi';
                            else echo $news[0]->news_category_name;
                            ?>

                        </h2>
                    </div>

                    <div class="row">
                        <div class="col-lg-8">
                            <div class="entries">
                                <?php
                                if ($this->uri->segment(2) == "berita_search") {
                                    echo "Kata Kunci Pencarian : <span class='label label-danger label-inline font-weight-lighter mr-2'>" . $search . "</span><hr style='border: 0.5px dashed #d2d6de'>";
                                }
                                if ($news == NULL) {
                                    echo '<b class="px-3">Berita Tidak Ada!!!</b>';
                                } else {
                                    foreach ($news as $n) { ?>

                                        <article class="entry">

                                            <div class="entry-img">
                                                <img src="<?php echo base_url(); ?>upload/news/<?php echo $n->news_cover; ?>" alt="" class="img-fluid">
                                            </div>

                                            <h2 class="entry-title">
                                                <a href="<?php echo site_url('page/berita_detail/' . $n->news_id); ?>"><?php echo $n->news_title; ?></a>
                                            </h2>

                                            <div class="entry-meta" style="color:#777777;font-size:12px;">
                                                <ul>

                                                    <li class="d-flex align-items-center"> <?php echo indonesiaDate($n->news_date) ?></li>
                                                </ul>
                                            </div>

                                            <div class="entry-content">
                                                <p>
                                                    <?php echo substr($n->news_text, 0, 150) . "...."; ?>
                                                </p>
                                                <div class="read-more">
                                                    <a href="<?php echo site_url('page/berita_detail/' . $n->news_id); ?>">Baca Informasi</a>
                                                </div>
                                            </div>

                                        </article><!-- End blog entry -->

                                <?php }
                                } ?>
                            </div>

                            <hr>
                            <div class="blog-pagination"><?php echo $links; ?></div>

                        </div><!-- End blog entries list -->

                        <div class="col-lg-4">

                            <div class="sidebar">

                                <h3 class="sidebar-title">Pencarian Informasi</h3>
                                <div class="sidebar-item search-form">
                                    <?php echo form_open("page/berita_search") ?>
                                    <input type="text" name="key">
                                    <button type="submit"><i class="icofont-search"></i></button>
                                    <?php echo form_close(); ?>
                                </div><!-- End sidebar search formn-->

                                <hr>
                                <h3 class="sidebar-title">Kategori</h3>
                                <div class="sidebar-item categories">
                                    <ul>
                                        <?php foreach ($news_category as $f) { ?>
                                            <li><a href="<?php echo site_url('page/berita/' . $f->news_category_id); ?>"><?php echo $f->news_category_name; ?></a></li>
                                        <?php } ?>
                                        <!-- <li><a href="#" class="text-secondary">Lihat album lainnya . . .</a></li> -->
                                    </ul>
                                </div>

                                <hr>
                                <h3 class="sidebar-title">Informasi Terbaru</h3>
                                <div class="sidebar-item recent-posts">
                                    <?php foreach ($recent as $r) { ?>
                                        <div class="post-item clearfix">
                                            <img class="pt-1" src="<?php echo base_url(); ?>upload/news/<?php echo $r->news_cover ?>" alt="">
                                            <h4><a href="<?php echo site_url('page/berita_detail/' . $n->news_id); ?>"><?php echo $r->news_title ?></a></h4>
                                            <time><?php echo indonesiaDate($r->news_date); ?></time>
                                        </div>
                                    <?php } ?>

                                </div><!-- End sidebar recent posts-->

                            </div><!-- End sidebar -->

                        </div><!-- End blog sidebar -->

                    </div>

                </div>
            </section><!-- End Blog Section -->

        </div>
    </section>
</main><!-- End #main -->