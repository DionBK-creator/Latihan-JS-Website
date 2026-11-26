<?php
require_once 'koneksi.php';
?>

<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Portfolio personal - profil, keahlian, dan proyek.">
  <title>Portfolio | Nama Lengkap</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.9/dist/css/bootstrap.min.css" rel="stylesheet">

  <link href="style.css" rel="stylesheet">
</head>

<body>

  <header class="site-header">
    <nav class="navbar navbar-expand-lg container">
      <a class="navbar-brand fw-bold" href="#home">
        MY<span>PORTFOLIO</span>
      </a>

      <div class="nav-links ms-auto">
        <a href="#home">Home</a>
        <a href="#about">About</a>
        <a href="#skills">Skills</a>
        <a href="#projects">Projects</a>
        <a class="nav-contact" href="#contact">Contact</a>
      </div>
    </nav>
  </header>

  <main>

    <section id="home" class="hero-section">
      <div class="container">
        <div class="row align-items-center g-5">

          <div class="col-lg-6">
            <p class="eyebrow">WELCOME TO MY PORTFOLIO</p>

            <h1>
              Halo, saya <span>DionBK - creator</span>
            </h1>

            <h2>Mahasiswa &amp; Creative Learner</h2>

            <p class="hero-description">
              Saya tertarik mempelajari teknologi, mengembangkan keterampilan,
              dan mengerjakan proyek yang memberikan manfaat.
            </p>

            <div class="hero-actions">
              <a class="btn btn-primary-custom" href="#projects">
                Lihat Proyek
              </a>

              <a class="btn btn-outline-custom" href="#about">
                Tentang Saya
              </a>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="hero-image-wrap">
              <img
                src="img/Image_FE1843E1-E082-41BD-A47A-8B7207B3EDA8.jpeg"
                class="hero-image"
                alt="Ilustrasi profil dan lingkungan kerja teknologi">
            </div>
          </div>

        </div>
      </div>
    </section>

    <?php include 'about.php';
    ?>

    <!-- SKILLS SECTION -->
    <section id="skills" class="section-padding soft-section">
      <div class="container">

        <div class="section-heading">
          <p class="eyebrow">WHAT I CAN DO</p>
          <h2>Keahlian</h2>
          <p>Penrograman, Design Engineer, Sales-Man</p>
        </div>

        <div class="row g-4">

          <div class="col-md-6 col-lg-4">
            <article class="skill-card h-100">
              <div class="skill-number">01</div>
              <h3>Komunikasi</h3>
              <p>
                Menyampaikan ide dan informasi dengan jelas serta efektif.
              </p>
            </article>
          </div>

          <div class="col-md-6 col-lg-4">
            <article class="skill-card h-100">
              <div class="skill-number">02</div>
              <h3>Kerja Sama Tim</h3>
              <p>
                Berkolaborasi, berbagi tanggung jawab, dan mencapai target bersama.
              </p>
            </article>
          </div>

          <div class="col-md-6 col-lg-4">
            <article class="skill-card h-100">
              <div class="skill-number">03</div>
              <h3>Problem Solving</h3>
              <p>
                Menganalisis permasalahan dan menyusun solusi secara sistematis.
              </p>
            </article>
          </div>

        </div>
      </div>
    </section>

    <?php include 'projects.php';
    ?>
    
<!-- CONTACT SECTION -->
<?php include 'kontak.php'; ?>

  </main>

  <!-- FOOTER -->
  <footer class="site-footer">
    <div class="container d-flex flex-column flex-md-row justify-content-between gap-2">
      <span>© 2026 DionBK - creator</span>
      <span>Built with Bootstrap 5.3.9 CSS</span>
    </div>
  </footer>

</body>
</html>
