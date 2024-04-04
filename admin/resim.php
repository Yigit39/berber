<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dosya Listesi</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding-top: 50px;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .form-container {
            width: 50%;
            margin-bottom: 30px;
        }
    </style>
</head>

<body>
    <div class="container form-container">
        <h1 class="text-center">Dosya Yükleme Formu</h1>
        <form action="dosya_yukle2.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="dosyalar">Dosyaları Seçin:</label>
                <input type="file" class="form-control-file" name="dosyalar[]" multiple />
            </div>
            <div class="form-group text-center">
                <input type="submit" class="btn btn-primary" value="Dosyaları Yükle" />
            </div>
            <div class="text-center">
                <a href="index.php" class="btn btn-secondary mt-3">Admin Panele Dön</a>
            </div>
        </form>
    </div>
    <div class="container">
        <h1 class="text-center">Dosya Listesi</h1>
        <div class="table-responsive">
            <?php

            session_start();
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
                header("Location: admin_login.php");
                exit;
            }
            $klasor_yolu = '../images/galeri/'; // Klasör yolunu burada belirtin
            $dosyalar = array_diff(scandir($klasor_yolu), array('..', '.'));

            if (count($dosyalar) > 0) {
                echo '<table class="table table-bordered table-striped table-hover text-center">';
                echo '<thead class="thead-dark"><th>Ön İzleme</th><th>Dosya Adı</th><th>İşlemler</th></tr></thead>';
                echo '<tbody>';

                foreach ($dosyalar as $dosya) {
                    $dosya_yolu = $klasor_yolu . $dosya;

                    echo '<tr>';
                    echo '<td><img src="../images/galeri/' . htmlspecialchars($dosya) . '" alt="' . htmlspecialchars($dosya) . '" style="max-width: 100px; max-height: 100px;"></td>';
                    echo '<td>' . htmlspecialchars($dosya) . '</td>';
                    echo '<td><a href="dosya_sil2.php?dosya=' . urlencode($dosya) . '" class="btn btn-danger btn-sm">Sil</a></td>';
                    echo '</tr>';
                }

                echo '</tbody></table>';
            } else {
                echo '<p class="text-center">Klasörde dosya bulunamadı.</p>';
            }
            ?>
        </div>
    </div>
</body>

</html>