<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <ol>
            <li><a href="<?php echo site_url('home') ?>">Home</a></li>
            <li><a href="#">Gallery Foto</a></li>
        </ol>
        <h2>Gallery Foto</h2>

    </div>
</section><!-- End Breadcrumbs -->
<main id="main">

    <section id="services" class="services">
        <div class="container" data-aos="fade-up">

            <!-- ======= Blog Section ======= -->
            <section id="blog" class="blog">
                <div class="container" data-aos="fade-up">

                    <div class="row">

                        <div class="section-title col-lg-12 mb-5">
                            <h2>
                                <?php
                                if ($this->uri->segment(3) == 'image')
                                    echo 'Semua Foto';
                                elseif ($this->uri->segment(3) == 'video')
                                    echo 'Semua Video';
                                else
                                    echo 'Gallery';

                                ?>
                            </h2>
                        </div>

                        <div class="entries">
                            <div class="row justify-content-lg-center px-3">
                                <?php
                                if ($gallery == NULL) {
                                    echo '<b>Gallery Kosong!!!</b>';
                                } else {
                                    foreach ($gallery as $n) { ?>
                                        <div class="col-4">
                                            <article class="entry">

                                                <?php if ($this->uri->segment(3) == 'image') { ?>
                                                    <div class="entry-img" style="height: 250px; overflow-y: hidden;">
                                                        <img src="<?php echo base_url(); ?>upload/album/<?php echo $n->album_cover; ?>" alt="" class="img-fluid">
                                                    </div>
                                                    <h2 class="entry-title text-center">
                                                        <a href="<?php echo site_url('page/album_detail/image/' . $n->album_id); ?>"><?php echo $n->album_name; ?></a>
                                                    </h2>
                                                <?php } ?>

                                                <?php if ($this->uri->segment(3) == 'video') { ?>
                                                    <div class="entry-content" style="margin: -20px -20px 20px -20px;">
                                                        <video width="100%" controls>
                                                            <source src="<?php echo base_url(); ?>upload/album/video/<?php echo $n->gallery_dir; ?>" type="video/mp4">
                                                            Your browser does not support the video tag.
                                                        </video>
                                                    </div>
                                                    <h2 class="entry-title text-center">
                                                        <a href="<?php echo site_url('page/album_detail/video/' . $n->album_id); ?>"><?php echo $n->album_name; ?></a>
                                                    </h2>
                                                <?php } ?>

                                            </article><!-- End blog entry -->
                                        </div>
                                <?php }
                                } ?>
                            </div>
                        </div><!-- End blog entries list -->

                    </div>
                    <div class="blog-pagination">
                        <hr>
                        <?php echo $links; ?>
                    </div>
                </div>
            </section><!-- End Blog Section -->

        </div>
    </section>
</main><!-- End #main -->