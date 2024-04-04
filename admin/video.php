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

        .container {
            max-width: 1600px;
            /* Max genişlik sınırını kaldırır */
        }

        .loading-spinner {
            display: none;
            border: 4px solid rgba(0, 0, 0, 0.1);
            border-top: 4px solid #3498db;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            animation: spin 1s linear infinite;
            margin: 20px auto;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>

<body>
    <div class="container form-container">
        <h1 class="text-center">Dosya Yükleme Formu</h1>
        <form action="dosya_yukle.php" method="post" enctype="multipart/form-data" onsubmit="showSpinner()">
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
            <div class="loading-spinner"></div>
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
            $klasor_yolu = '../images/videolar/'; // Klasör yolunu burada belirtin
            $dosyalar = array_diff(scandir($klasor_yolu), array('..', '.'));

            if (count($dosyalar) > 0) {
                echo '<table class="table table-bordered table-striped table-hover text-center">';
                echo '<thead class="thead-dark"><tr><th>Ön İzleme</th><th>Dosya Adı</th><th>İşlemler</th><th>İşlemler</th></tr></thead>';
                echo '<tbody>';

                foreach ($dosyalar as $dosya) {
                    $dosya_yolu = $klasor_yolu . $dosya;


                    echo '<tr>';
                    echo '<td><video width="320" height="240" controls>';
                    echo '<source src="../images/videolar/' . htmlspecialchars($dosya) . '" type="video/mp4">';
                    echo 'Tarayıcınız video etiketini desteklemiyor.';
                    echo '</video></td>';
                    echo '<td>' . htmlspecialchars($dosya) . '</td>';
                    echo '<td><a href="../images/videolar/' . htmlspecialchars($dosya) . '" class="btn btn-primary btn-sm" download>İndir</a></td>';
                    echo '<td><a href="dosya_sil.php?dosya=' . urlencode($dosya) . '" class="btn btn-danger btn-sm">Sil</a></td>';
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

<script>
        function showSpinner() {
            document.getElementById('spinner').style.display = 'block';
        }
    </script>

</html>