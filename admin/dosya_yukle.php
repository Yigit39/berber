<?php
$klasor_yolu = '../images/videolar/'; // Video dosyalarının yükleneceği klasör yolu
$thumbnail_klasor_yolu = '../images/thumbnails/'; // Thumbnail'ların kaydedileceği klasör yolu
$max_dosya_boyutu = 41943040;

if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: admin_login.php");
    exit;
}

if (isset($_FILES['dosyalar'])) {
    $dosya_sayisi = count($_FILES['dosyalar']['name']);

    for ($i = 0; $i < $dosya_sayisi; $i++) {
        $hedef_dosya = $klasor_yolu . basename($_FILES['dosyalar']['name'][$i]);
        $videoAdi = $_FILES['dosyalar']['name'][$i];
        $thumbnail_dosya = $thumbnail_klasor_yolu . pathinfo($videoAdi, PATHINFO_FILENAME) . '.jpg'; // Video adından uzantıyı kaldırarak thumbnail adını oluştur

        // Dosyayı taşıma
        if (move_uploaded_file($_FILES['dosyalar']['tmp_name'][$i], $hedef_dosya)) {
            generateThumbnailFromVideo($hedef_dosya, $thumbnail_dosya, $i); // İndeks bilgisini fonksiyona ilet

            echo "<script>";
            echo "alert('Dosya başarıyla yüklendi!');"; // JavaScript alert bildirimi
            echo "</script>";
        } else {
            echo "<script>";
            echo "alert('Dosya yüklenirken hata oluştu!');";
            echo "</script>";
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && empty($_POST) && empty($_FILES) && $_SERVER['CONTENT_LENGTH'] > $max_dosya_boyutu) {
    http_response_code(400);
    echo "Warning: POST Content-Length of {$_SERVER['CONTENT_LENGTH']} bytes exceeds the limit of $max_dosya_boyutu bytes";
    exit;
}

function generateThumbnailFromVideo($videoPath, $thumbnailPath, $index)
{
    $videoId = 'video_' . $index;
    $canvasId = 'canvas_' . $index;

    echo "<video id='$videoId' width='640' height='360' controls style='display: none;'><source src='$videoPath' type='video/mp4'></video>";
    echo "<canvas id='$canvasId' style='display: none;'></canvas>";

    echo "<script>
        var video$index = document.getElementById('$videoId');
        var canvas$index = document.getElementById('$canvasId');
        var context$index = canvas$index.getContext('2d');

        video$index.addEventListener('loadeddata', function() {
            var thumbnailTime = 3; // 3. saniyede thumbnail oluştur
            video$index.currentTime = thumbnailTime;
            video$index.addEventListener('seeked', function() {
                canvas$index.width = video$index.videoWidth;
                canvas$index.height = video$index.videoHeight;
                context$index.drawImage(video$index, 0, 0, canvas$index.width, canvas$index.height);
                var thumbnail = canvas$index.toDataURL('image/jpeg');

                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                    if (this.readyState === 4 && this.status === 200) {
                        console.log('Thumbnail sunucuya kaydedildi.');
                    }
                };
                xhr.open('POST', 'saveThumbnail.php'); // Bu dosyanın adını güncellemeniz gerekebilir
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.send('thumbnail=' + encodeURIComponent(thumbnail) + '&videoName=' + encodeURIComponent('$videoPath'));
            });
        });
        video$index.src = '$videoPath';
    </script>";
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Video Yükle</title>
    <style>
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
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
</head>

<body>
    <form method="post" action="" enctype="multipart/form-data" onsubmit="showSpinner()">
        <input type="file" name="dosyalar[]" multiple>
        <input type="submit" value="Yükle" name="submit">
        <div class="loading-spinner"></div>
    </form>


    <form action="video.php" method="get">
        <button type="submit" class="btn btn-primary">Geri Dön</button>
    </form>
    <div class="text-center">
        <a href="index.php" class="btn btn-secondary mt-3">Admin Panele Dön</a>
    </div>
</body>

</html>