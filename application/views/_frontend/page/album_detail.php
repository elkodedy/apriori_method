<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <ol>
            <li><a href="<?php echo site_url('home') ?>">Home</a></li>
            <li><a href="#">Informasi</a></li>
            <li><a href="#">Detail</a></li>
        </ol>
        <h2><?php echo $album[0]->album_name; ?></h2>

    </div>
</section><!-- End Breadcrumbs -->

<main id="main">

    <section id="services" class="services">
        <div class="container" data-aos="fade-up">

            <!-- ======= Blog Section ======= -->
            <section id="blog" class="blog">
                <div class="container" data-aos="fade-up">

                    <div class="entries row p-3">
                        <div class="section-title col-lg-12 mb-5">
                            <h2>
                                <?php
                                if ($this->uri->segment(3) == 'image')
                                    echo 'Foto ' . $gallery[0]->album_name;
                                elseif ($this->uri->segment(3) == 'video')
                                    echo 'Video ' . $gallery[0]->album_name;
                                else
                                    echo 'Gallery';
                                ?>
                            </h2>
                        </div>
                        <div class="col-lg-12 mb-5"> <?php echo $album[0]->album_description; ?></div>

                        <?php
                        if ($gallery == NULL) {
                            echo '<b>Gallery Kosong!!!</b>';
                        } else {
                            if ($this->uri->segment(3) == 'image') { ?>
                                <?php foreach ($gallery as $n) { ?>
                                    <div class="col-lg-4">
                                        <div class="entry-img" style="height: 250px; overflow-y: hidden;">
                                            <a href="<?php echo base_url() . 'upload/album/' . $n->gallery_dir; ?>" target="_blank" style="cursor:zoom-in">
                                                <img src="<?php echo base_url() . 'upload/album/' . $n->gallery_dir; ?>" alt="" class="img-fluid">
                                            </a>
                                        </div>
                                    </div><!-- End blog entries list -->
                                <?php } ?>

                            <?php } ?>

                            <?php if ($this->uri->segment(3) == 'video') { ?>
                                <?php foreach ($gallery as $n) { ?>
                                    <div class="col-4 shadow p-0">
                                        <video width="100%" controls>
                                            <source src="<?php echo base_url(); ?>upload/album/video/<?php echo $n->gallery_dir; ?>" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                        <div class="entry-title p-3">
                                            <b>
                                                <?php echo $n->gallery_name; ?>
                                            </b>
                                        </div>
                                    </div>
                                <?php } ?>
                            <?php  } ?>
                        <?php } ?>

                    </div>

                </div>
            </section><!-- End Blog Section -->

        </div>
    </section>
</main><!-- End #main -->