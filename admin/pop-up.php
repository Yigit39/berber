<!DOCTYPE html>
<html>
<head>
    <title>Reklam Yükleme Formu</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Reklam Yükleme Formu
                    </div>
                    <div class="card-body">
                        <?php
                        $hedefKlasor = '../images/home/';
                        $hedefDosya = $hedefKlasor . "pop-up.jpg";

                        // Mevcut dosyayı kontrol et ve silme butonunu ekle
                        if (file_exists($hedefDosya)) {
                            echo '<p class="text-success">Mevcut Reklam:</p>';
                            echo '<img src="' . $hedefDosya . '" class="img-fluid mb-3" alt="Mevcut Reklam">';
                            echo '<a href="' . $hedefDosya . '" class="btn btn-primary mr-2" download>Reklamı İndir</a>';
                            echo '<form action="pop-up-sil.php" method="post" style="display:inline;">';
                            echo '<input type="hidden" name="dosya" value="' . $hedefDosya . '">';
                            echo '<button type="submit" class="btn btn-danger">Reklamı Sil</button>';
                            echo '</form>';
                        } else {
                            echo '<p class="text-info">Henüz bir reklam yüklenmedi.</p>';
                        }
                        ?>
                        <form action="pop-up-yukle.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="dosya">Yeni Reklam Yükle</label>
                                <input type="file" class="form-control-file" name="resimDosyasi" id="dosya" accept="image/*">
                            </div>
                            <button type="submit" class="btn btn-primary">Reklam Yükle</button>
                        </form>
                        <a href="index.php" class="btn btn-secondary mt-3">Admin Panele Dön</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>