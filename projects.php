
<?php
$projects = [];

$sql = "SELECT * FROM projects ORDER BY id DESC";
$result = $conn->query($sql);

if (!$result) {
    die("Query projects gagal: " . $conn->error);
}

while ($row = $result->fetch_assoc()) {
    $projects[] = $row;
}
?>

<section id="projects" class="section-padding">
    <div class="container">

        <div class="section-heading">
            <p class="eyebrow">MY RECENT WORK</p>
            <h2>Proyek Pilihan</h2>
            <p>Beberapa contoh proyek yang telah saya kerjakan.</p>
        </div>

        <div class="row g-4">

            <?php if (!empty($projects)): ?>

                <?php foreach ($projects as $index => $project): ?>

                    <div class="col-md-6 col-lg-4">
                        <article class="project-card h-100">

                          <div class="project-visual">
                            <?php if (!empty($project['gambar'])): ?>
                                  <img src="<?= htmlspecialchars($project['gambar']) ?>"
                                  alt="<?= htmlspecialchars($project['judul']) ?>">
                                  <?php else: ?>
                                  PROJECT <?= str_pad($index + 1, 2, '0', STR_PAD_LEFT) ?>
                                 <?php endif; ?>
                          </div>

                            <div class="project-content">

                                <p class="project-category">
                                    <?= htmlspecialchars($project['kategori']) ?>
                                </p>

                                <h3>
                                    <?= htmlspecialchars($project['judul']) ?>
                                </h3>

                                <p>
                                    <?= htmlspecialchars($project['deskripsi']) ?>
                                </p>

                                <?php if (!empty($project['link'])): ?>
                                    <a href="<?= htmlspecialchars($project['link']) ?>"
                                       target="_blank"
                                       rel="noopener noreferrer">
                                        Lihat Project
                                    </a>
                                <?php endif; ?>

                            </div>
                        </article>
                    </div>

                <?php endforeach; ?>

            <?php else: ?>

                <div class="col-12">
                    <p>Belum ada proyek yang ditambahkan.</p>
                </div>

            <?php endif; ?>

        </div>
    </div>
</section>
