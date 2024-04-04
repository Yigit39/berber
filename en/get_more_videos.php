<?php
$folder = 'images/videolar'; // Videoların bulunduğu klasör
$videos = array();

$files = scandir($folder);
foreach ($files as $file) {
  if ($file !== '.' && $file !== '..') {
    $file_path = $folder . '/' . $file;
    $file_extension = pathinfo($file_path, PATHINFO_EXTENSION);

    if (in_array($file_extension, ['mp4', 'avi', 'mov'])) {
      $videos[] = array('path' => $file_path);
    }
  }
}

echo json_encode($videos);
?>