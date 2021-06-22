    <body>
        <header id="header" class="pb-0 fixed-top">
            <div class="container d-flex align-items-center mb-4">
                <h1 class="logo">
                    <a href="<?php echo site_url('./') ?>" class="scrollto">
                        <img src="<?php echo base_url() ?>assets/core-images/base-logo120210528142401.png">
                    </a>
                </h1>
                <h5 class="mr-auto ml-3 mt-2 nav-webname"><a class="" href="<?php echo site_url('./') ?>">Inspektorat Provinsi Sulawesi Tenggara</a></h5>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="#header" class="logo mr-auto scrollto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

                <nav class="nav-menu d-none d-lg-block">
                    <ul>
                        <li class="<?php if ($this->uri->segment(1) == 'home') echo 'active' ?>"><a href="<?php echo site_url('home') ?>">Beranda</a></li>
                        <li class="<?php if ($this->uri->segment(1) == 'profil') echo 'active' ?> drop-down"><a href="<?php echo site_url('profil/sejarah') ?>">Profil</a>
                            <ul>
                                <li><a href="<?php echo site_url('profil/sejarah') ?>">Sejarah</a></li>
                                <li><a href="<?php echo site_url('profil/visi_misi') ?>">Visi Misi</a></li>
                                <li><a href="<?php echo site_url('profil/sambutan') ?>">Kata Sambutan</a></li>
                                <li><a href="<?php echo site_url('profil/tugas_pokok_fungsi') ?>">Tugas Pokok & Fungsi</a></li>
                                <!-- <li><a href="<?php //echo site_url('profil/maklumat_pelayanan') 
                                                    ?>">Maklumat Pelayanan</a></li> -->
                                <li><a href="<?php echo site_url('profil/struktur_organisasi') ?>">Struktur Organisasi</a></li>
                            </ul>
                        </li>
                        <li class="<?php if ($this->uri->segment(2) == 'berita') echo 'active' ?> drop-down"><a href="<?php echo site_url('page/berita/0') ?>">Informasi</a>
                            <ul>
                                <?php foreach ($news_category as $r) { ?>
                                    <li><a href="<?php echo site_url('page/berita/') . $r->news_category_id ?>"> <?php echo $r->news_category_name ?> </a></li>
                                <?php } ?>
                                <li class="drop-down"><a href="<?php echo site_url('page/publication/0') ?>"> Publikasi </a>
                                    <ul>
                                        <?php foreach ($publication_category as $r) { ?>
                                            <li><a href="<?php echo site_url('page/publication/') . $r->publication_category_id ?>"> <?php echo $r->publication_category_name ?> </a></li>
                                        <?php } ?>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="<?php if ($this->uri->segment(2) == 'produk_hukum') echo 'active' ?>"><a href="<?php echo site_url('page/produk_hukum/') ?>">Produk Hukum</a>
                        </li>
                        <li class="<?php if ($this->uri->segment(2) == 'album') echo 'active' ?> drop-down"><a href="#">Gallery</a>
                            <ul>
                                <li><a href="<?php echo site_url('page/album/image') ?>">Foto</a></li>
                                <li><a href="<?php echo site_url('page/album/video') ?>">Video</a></li>
                            </ul>
                        </li>
                        <li class="<?php if ($this->uri->segment(2) == 'contact_us') echo 'active' ?>"><a href="<?php echo site_url('page/contact_us') ?>">Kontak</a></li>
                    </ul>
                </nav><!-- .nav-menu -->

            </div>
        </header><!-- End Header -->