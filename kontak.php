
<?php

$messageStatus = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['kirim_pesan'])) {

    $nama = trim($_POST['nama'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $pesan = trim($_POST['pesan'] ?? '');

    if ($nama === '' || $email === '' || $pesan === '') {

        $messageStatus = 'empty';

    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $messageStatus = 'invalid_email';

    } else {

        $stmt = $conn->prepare(
            "INSERT INTO messages (nama, email, pesan)
             VALUES (?, ?, ?)"
        );

        if (!$stmt) {
            $messageStatus = 'error';
        } else {

            $stmt->bind_param("sss", $nama, $email, $pesan);

            if ($stmt->execute()) {
                header("Location: index.php?status=success#contact");
                exit;
            } else {
                $messageStatus = 'error';
            }

            $stmt->close();
        }
    }
}
?>

<section id="contact" class="contact-section section-padding">
    <div class="container">

        <div class="contact-heading text-center">
            <p class="eyebrow">GET IN TOUCH</p>
            <h2>Contact Me</h2>
            <h6>Number: 081234567 Email: dionisiusbrama6@gmail.com</h6>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">

                <div class="contact-form-card">

                    <?php if (isset($_GET['status']) && $_GET['status'] === 'success'): ?>
                        <div class="alert alert-success">
                            Pesan berhasil dikirim!
                        </div>
                    <?php endif; ?>

                    <?php if ($messageStatus === 'empty'): ?>
                        <div class="alert alert-danger">
                            Semua kolom wajib diisi.
                        </div>
                    <?php elseif ($messageStatus === 'invalid_email'): ?>
                        <div class="alert alert-danger">
                            Format email tidak valid.
                        </div>
                    <?php elseif ($messageStatus === 'error'): ?>
                        <div class="alert alert-danger">
                            Pesan gagal disimpan. Periksa database.
                        </div>
                    <?php endif; ?>

                    <form action="index.php#contact" method="POST">

                        <div class="row g-4">

                            <div class="col-md-6">
                                <label for="contactName" class="form-label">
                                    Nama
                                </label>

                                <input
                                    type="text"
                                    class="form-control custom-input"
                                    id="contactName"
                                    name="nama"
                                    placeholder="Masukkan nama"
                                    maxlength="100"
                                    required>
                            </div>

                            <div class="col-md-6">
                                <label for="contactEmail" class="form-label">
                                    Email
                                </label>

                                <input
                                    type="email"
                                    class="form-control custom-input"
                                    id="contactEmail"
                                    name="email"
                                    placeholder="nama@email.com"
                                    maxlength="150"
                                    required>
                            </div>

                            <div class="col-12">
                                <label for="contactMessage" class="form-label">
                                    Pesan
                                </label>

                                <textarea
                                    class="form-control custom-input custom-textarea"
                                    id="contactMessage"
                                    name="pesan"
                                    rows="5"
                                    placeholder="Tuliskan pesan kamu..."
                                    required></textarea>
                            </div>

                            <div class="col-12 text-center">
                                <button
                                    type="submit"
                                    name="kirim_pesan"
                                    value="1"
                                    class="btn btn-send">
                                    Kirim Pesan
                                </button>
                            </div>

                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</section>
