<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Psikologi Test MBTI</title>

    <link rel="stylesheet" href="css/styledasboard.css">
    <link rel="stylesheet" href="css/cobaa.css">
    <link rel="stylesheet" href="css/stylekonsul.css">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="css/stylepengguna.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <?php
    require 'koneksi.php';
    ?>
<header>
        <nav class="navbar">
            <img src="css/img/WHITE ITH.png" class="logo">
            <ul class="navbar-list">
                <li><a href="#uji" class="active">Uji Psikologi Test MBTI</a></li>
                <li><a href="#ulasan">Ulasan</a></li>
                <li><a href="#konsultasi">Konsultasi</a></li>
            </ul>
            <div class="profile">
                <div class="profile-text">
                <span class="username"><?php echo $_SESSION['username']; ?></span>
                </div>
                <div class="profile-img">
                    <img src="css/img/blank-profile-picture-973460_960_720.webp" alt="">
                </div>
                <i class="fa-solid fa-circle"></i>
                <div class="profile-dropdown">
                    <div class="profile-dropdown-btn" onclick="toggle()">
                        <i class="fa-solid fa-bars"></i>
                    </div>
                    <ul class="profile-dropdown-list" style="background-color: aliceblue!important;">
                        <li class="profile-dropdown-list-item"><a href="update_profile.php"><i class="fa-regular fa-user"></i>   Edit Profile</a></li>
                        <li class="profile-dropdown-list-item"><a href="logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i>   Log Out</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    
<div class="scorll"> 
    <section id="uji">
        <img src="css/img/BK header.jpg" style="width: 100%;" >
        <div class="wrapper">
        <h4>SELAMAT DATANG</h4>
        <h5>Uji Psikologi Test MBTI<br/>Untuk Siapapun</h5>
        <p>Ketahui Karakter diri anda melalui Uji Psikologi Test MBTI ini</p>
        <a href="tes.html" class="button button-xl">Mulai Test Sekarang</a>
    </div>
     
            </div>
            <div class="batas">
                <div>
                    <p><i class="fa-solid fa-gear"></i>15+</p>
                    <small>Years Experiences</small>
                </div>
                <div>
                    <p><i class="fa-solid fa-graduation-cap"></i>1000+</p>
                    <small>Students</small>
                </div>
                <div>
                    <p><i class="fa-brands fa-youtube"></i>800k+</p>
                    <small>Happy Suscribers</small>
                </div>
            </div>
            <div class="premium-course">
                <div class="wrapper-1">
                <h4>Premium <span>tes</span></h4>
                <p>Cari tau type kepribadian MBTI kamu</p>

                <div class="grid">
                    <?php
                    $sql = mysqli_query($koneksi, "SELECT * FROM premium ORDER BY id DESC");
                    while ($row = mysqli_fetch_assoc($sql)) {
                        echo '<div class="item">';
                        echo '<img src="'.$row['foto'].'" />';
                        echo '<div class="item-detail">';
                        echo '<p>Tipe
                                MBTI ISTJ 
                                Introversion, Sensing, Thinking, Judging
                            </p>';
                        echo '<div>';
                        echo '<small><i class="fa-regular fa-face-smile"></i>  Type kamu?</small>';
                        echo '<a href="tes.html" class="button" style="text-decoration: none;"><i class="fa-solid fa-magnifying-glass"></i> Telusuri</a>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                    ?>
                </div>
            </div>
        </section>
    </div>
    <section id="ulasan">
    <p>Ulasan <span>tes</span></p>
    <div class="container-scroll">
        <?php
        $sql1 = mysqli_query($koneksi, "SELECT * FROM ulasan ORDER BY id DESC");
        while ($row = mysqli_fetch_assoc($sql1)) {
            echo '<div class="container">';
            echo '<h4>' . $row['username'] . '</h4>';
            echo '<div class="pesan">';
            echo '<img src="' . $row['profile'] . '" alt="">';
            echo '<h5>' . $row['komentar'] . '<br><br>';
            echo '<a href=""><i class="fa-brands fa-twitter"></i></a>';
            echo '<a href=""><i class="fa-brands fa-instagram"></i></a>';
            echo '<a href=""><i class="fa-brands fa-tiktok"></i></a>';
            echo '<a href=""><i class="fa-brands fa-youtube"></i></a>';
            echo '</h5>';
            echo '</div>';
            echo '</div>';
        }
        ?>
    </div>
    <div class="komen">
        <h3>Tambahkan <span>Ulasan</span></h3>
        <form id="komen" action="prosesulasan.php" method="post">
            <div class="container-komen">
                <div class="nama">
                    <label for="fname">Firstname</label>
                    <input type="text" id="fname" name="firstname" placeholder="Depan..">
                    
                    <br><label for="lname">Lastname</label>
                    <input type="text" id="lname" name="lastname" placeholder="Belakang..">
                </div>
                <div class="subjek">
                    <label for="subject">Subject</label>
                    <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>
                </div>
            </div>
            <input type="submit" value="Submit">
        </form>
    </div>             
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    loadUlasan(); // Muat ulasan saat halaman dimuat

    $('#komen').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'prosesulasan.php',
            data: $(this).serialize(),
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    alert(response.message);
                    $('#komen')[0].reset();
                    loadUlasan(); // Muat ulang ulasan setelah berhasil menambahkan
                } else {
                    alert('Error: ' + response.message);
                }
            },
            error: function() {
                alert('Terjadi kesalahan. Silakan coba lagi.');
            }
        });
    });
});

function loadUlasan() {
    $.ajax({
        url: 'get_ulasan.php',
        type: 'GET',
        success: function(data) {
            $('.container-scroll').html(data);
        },
        error: function() {
            console.log('Gagal memuat ulasan');
        }
    });
}
</script>

<section id="konsultasi"> 
    <div class="input">
        <h2>Konsultasi</h2>
        <div class="kata">
            <div class="cta-form">
                <h2>KONSULTASI!</h2> 
                <p>Masukkan pertanyaan apa saja yang ingin Anda ajukan mengenai Tipe Kepribadian MBTI Anda?</p>
            </div> 
            <form action="" class="form">
                <input type="text" placeholder="Name" class="form__input" id="name" />
                <label for="name" class="form__label">Name</label>
        
                <input type="email" placeholder="Email" class="form__input" id="email" />
                <label for="email" class="form__label">Email</label>
        
                <input type="text" placeholder="Subject" class="form__input" id="isi" />
                <label for="subject" class="form__label">Subject</label>
                
                <input type="submit" value="Submit" class="form__submit" />
            </form>
        </div>
    </div>
</section>

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js"></script>
<script type="text/javascript">
(function() {
    emailjs.init('GwOWRpJveYnRQBGPr');
})();

window.onload = function() {
    document.querySelector('.form').addEventListener('submit', function(event) {
        event.preventDefault();
        
        const name = document.getElementById('name').value;
        const email = document.getElementById('email').value;
        const isi = document.getElementById('isi').value;
        
        emailjs.send("service_g1okh2h", "template_ph8qji6", {
            to_name: 'Admin',
            to_email: 'nurulnisaabdulsalam164@gmail.com',
            from_name: name,
            from_email: email,
            isi: isi
        }).then(
            function(response) {
                console.log("SUCCESS", response);
                alert('Pesan berhasil dikirim!');
            },
            function(error) {
                console.log("FAILED", error);
                alert('Gagal mengirim pesan: ' + JSON.stringify(error));
            }
        );
        
        this.reset();
    });
}
</script>
<footer>
    <div class="footer">&copy; 2024 Uji Tes Psikologi MBTI></div>
</footer>

      <script src="scriptnavbar.js"></script>
    </body>
    </html>
