
<?php
include("koneksi.php");
// ==========================================
// 1. MENGAMBIL DATA SKILLS DARI DATABASE
// ==========================================

$skillLabels = [];
$skillValues = [];

$sql = "SELECT judul, nilai FROM skill ORDER BY id ASC";
$result = $conn->query($sql);

if (!$result) {
    die("Query gagal: " . $conn->error);
}

while ($row = $result->fetch_assoc()) {
    $skillLabels[] = $row['judul'];
    $skillValues[] = (int) $row['nilai'];
}
?>

<!-- ==========================================
     2. ABOUT SECTION
========================================== -->

<section id="about" class="section-padding">
    <div class="container">

        <!-- Section Heading -->
        <div class="section-heading">
            <p class="eyebrow">GET TO KNOW ME</p>
            <h2>Tentang Saya</h2>
            <p>Perkenalan singkat mengenai latar belakang dan minat saya.</p>
        </div>

        <div class="row g-4 align-items-stretch">

            <!-- ABOUT ME -->
            <div class="col-lg-7">
                <div class="about-card h-100">

                    <h3>About Me</h3>

                    <p>
                        Perkenalkan, saya
                        <strong>Dionisius Bramantyo</strong>.
                        Saya merupakan mahasiswa mekatronika yang senang
                        belajar hal baru, bekerja secara kolaboratif, dan
                        mengembangkan kemampuan melalui pengalaman akademik
                        maupun proyek pribadi.
                    </p>

                    <p>
                        Saya memiliki ketertarikan pada bidang teknologi,
                        sistem otomasi, elektronika, robotika, dan
                        pengembangan sistem berbasis teknologi.
                    </p>

                    <p>
                        Saya selalu berusaha menggabungkan rasa ingin tahu,
                        kedisiplinan, dan kreativitas untuk menghasilkan
                        pekerjaan yang berkualitas.
                    </p>

                </div>
            </div>

            <!-- SKILLS CHART -->
            <div class="col-lg-5">
                <div class="about-card h-100">

                    <h3>My Skills</h3>

                    <p>
                        Visualisasi tingkat kemampuan berdasarkan data
                        yang tersimpan di database.
                    </p>

                    <div class="chart-container">
                        <canvas id="performanceChart"></canvas>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>


<!-- ==========================================
     3. CHART.JS
========================================== -->

<script src="https://cdn.jsdelivr.net/npm/chart.js@4.5.1/dist/chart.umd.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {

    // Data dari database melalui PHP
    const skillLabels = <?= json_encode(
        $skillLabels,
        JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP
    ) ?>;

    const skillValues = <?= json_encode($skillValues) ?>;

    // Mengambil elemen canvas
    const chartCanvas = document.getElementById('performanceChart');

    if (!chartCanvas) {
        console.error('Canvas performanceChart tidak ditemukan!');
        return;
    }

    // Membuat grafik
    new Chart(chartCanvas, {
        type: 'line',

        data: {
            labels: skillLabels,

            datasets: [{
                label: 'Tingkat Kemampuan (%)',
                data: skillValues,

                borderColor: '#1769aa',
                backgroundColor: 'rgba(23, 105, 170, 0.18)',

                borderWidth: 2.5,
                pointRadius: 4,
                pointHoverRadius: 7,

                pointBackgroundColor: '#1769aa',
                pointBorderColor: '#ffffff',
                pointBorderWidth: 2,

                fill: true,
                tension: 0.35
            }]
        },

        options: {
            responsive: true,
            maintainAspectRatio: false,

            plugins: {
                legend: {
                    display: true,
                    position: 'top'
                },

                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return ' Kemampuan: ' +
                                context.parsed.y + '%';
                        }
                    }
                }
            },

            scales: {
                y: {
                    min: 0,
                    max: 100,
                    ticks: {
                        stepSize: 20
                    }
                },

                x: {
                    grid: {
                        display: false
                    }
                }
            }
        }
    });

});
</script>
