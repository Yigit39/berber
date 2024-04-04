<!DOCTYPE html>
<html>
<head>
    <title>Reklam Yükleme Sonucu</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Reklam Yükleme Sonucu
                    </div>
                    <div class="card-body">
                        <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $hedefKlasor = '../images/home/';
                            $izinVerilenTurler = array('jpg', 'jpeg', 'png', 'gif');

                            if (isset($_FILES["resimDosyasi"]) && $_FILES["resimDosyasi"]["error"] == 0) {
                                $resimAdi = $_FILES["resimDosyasi"]["name"];
                                $resimBoyutu = $_FILES["resimDosyasi"]["size"];
                                $geciciKonum = $_FILES["resimDosyasi"]["tmp_name"];

                                $dosyaUzantisi = strtolower(pathinfo($resimAdi, PATHINFO_EXTENSION));

                                if (!in_array($dosyaUzantisi, $izinVerilenTurler)) {
                                    echo '<p class="text-danger">Sadece JPG, JPEG, PNG veya GIF dosyaları yüklenebilir.</p>';
                                } else {
                                    $maxDosyaBoyutu = 20 * 1024 * 1024; // 5MB
                                    if ($resimBoyutu > $maxDosyaBoyutu) {
                                        echo '<p class="text-danger">Dosya boyutu çok büyük. En fazla 5MB boyutunda dosya yüklenebilir.</p>';
                                    } else {
                                        $hedefDosya = $hedefKlasor . "pop-up.jpg";
                                        if (move_uploaded_file($geciciKonum, $hedefDosya)) {
                                            echo '<p class="text-success">Dosya başarıyla yüklendi: <strong>' . $hedefDosya . '</strong></p>';
                                        } else {
                                            echo '<p class="text-danger">Dosya yüklenirken bir hata oluştu.</p>';
                                        }
                                    }
                                }
                            } else {
                                echo '<p class="text-danger">Dosya yüklenemedi.</p>';
                            }
                        }
                        ?>
                        <a href="pop-up.php" class="btn btn-primary">Geri Dön</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>