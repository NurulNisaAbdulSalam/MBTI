<?php
require 'koneksi.php';

$sql = mysqli_query($koneksi, "SELECT * FROM ulasan ORDER BY id DESC");
while ($row = mysqli_fetch_assoc($sql)) {
    echo '<div class="container">';
    echo '<h4>' . htmlspecialchars($row['username']) . '</h4>';
    echo '<div class="pesan">';
    echo '<img src="' . htmlspecialchars($row['profile']) . '" alt="">';
    echo '<h5>' . htmlspecialchars($row['komentar']) . '<br><br>';
    echo '<a href=""><i class="fa-brands fa-twitter"></i></a>';
    echo '<a href=""><i class="fa-brands fa-instagram"></i></a>';
    echo '<a href=""><i class="fa-brands fa-tiktok"></i></a>';
    echo '<a href=""><i class="fa-brands fa-youtube"></i></a>';
    echo '</h5>';
    echo '</div>';
    echo '</div>';
}

mysqli_close($koneksi);
?>