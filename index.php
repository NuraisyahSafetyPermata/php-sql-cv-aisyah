

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Curriculum Vitae</title>
    <!-- Link CSS Bootstrap yang di-host -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
  </head>

  <body>
  <!-- Navbar -->
  <div class="navigasi">
    <div class="logo">
      <h4>CurriculumVitae</h4>
    </div>
    
    <div class="menu">
      <ul>
        <li><a href="#hai">Homepage</a></li>
        <li><a href="#cv">CV</a></li>
        <li><a href="#update">Update</a></li>
        <li><a href="#comment">Comment</a></li>
      </ul>
    </div>
  </div>
  
  <!-- Logout -->
  
  <!-- Banner-Hai -->
    <div class="banner" id="hai">
      <img src="3dpict.jpg" alt="profile">
      <h1>Hai .... <span></span></h1>
      <p>Salam Hangat dari Saya, Semoga Anda Sehat Selalu</p>
      <a href="#cv"><button>Selengkapnya</button></a>
    </div>

  <!-- CV -->
  <br id="cv"><br><br><br>
  <div class="cv-page">
    <h1>Curriculum Vitae</h1>
  </div>

  <!-- Menampilkan Data dari SQLyog -->
  <?php
    include 'config.php';
    $result = mysqli_query($conn, "SELECT * FROM cv_data WHERE id=1"); // Sesuaikan dengan id CV
    $row = mysqli_fetch_array($result);
  ?>

<!-- Data-data yang dipanggil-->
  <div class="foto">
    <img src = "<?php echo $row['foto_path'];?>" alt="Foto diri"> 
  </div>
  <div class="data">
    <h4 class="card-title"><?php echo $row['nama'];?></h4>
    <p class="card-text"><?php echo $row['alamat'];?></p>
    <p class="card-text"><?php echo $row['telepon'];?></p>
    <p class="card-text"><?php echo $row['email'];?></p>
    <p class="card-text"><?php echo $row['web'];?></p>
    <p class="card-text"><?php echo $row['linkedin'];?></p>
    <!-- Riwayat Pendidikan -->
    <h4 class="card-title">Riwayat Pendidikan</h4>
    <p class="card-text"><?php echo $row['pendidikan_sd'];?></p>
    <p class="card-text"><?php echo $row['pendidikan_smp'];?></p>
    <p class="card-text"><?php echo $row['pendidikan_sma'];?></p>
    <p class="card-text"><?php echo $row['pendidikan_kuliah'];?></p>
    <!-- Prestasi -->
    <h4 class="card-title">Prestasi</h4>
    <p class="card-text"><?php echo $row['prestasi_satu'];?></p>
    <p class="card-text"><?php echo $row['prestasi_dua'];?></p>
    <p class="card-text"><?php echo $row['prestasi_tiga'];?></p>
    <!-- Pengalaman Kerja -->
    <h4 class="card-title">Pengalaman Kerja</h4>
    <p class="pengalaman"><?php echo $row['pengalaman_kerja_satu'];?></p>
    <p class="deskripsi">Bertanggung jawab atas pemeliharaan dan pengoptimalan infrastruktur jaringan perusahaan.</p>
    <p class="pengalaman"><?php echo $row['pengalaman_kerja_dua'];?></p>
    <p class="deskripsi">Mengelola siklus hidup pengembangan perangkat lunak dari perencanaan hingga implementasi serta berkolaborasi dengan tim lintas fungsi untuk memastikan kepatuhan dengan persyaratan proyek dan tenggat waktu.</p>
    <p class="pengalaman"><?php echo $row['pengalaman_kerja_tiga'];?></p>
    <p class="deskripsi">Mengelola dan memelihara server fisik dan virtual serta lingkungan perangkat keras dan perangkat lunak serta bertanggung jawab atas pemulihan bencana dan perencanaan keamanan sistem.</p>
    <p class="pengalaman"><?php echo $row['pengalaman_kerja_empat'];?></p>
    <p class="deskripsi">Menyediakan dukungan teknis tingkat satu kepada pengguna internal, memecahkan masalah perangkat keras dan perangkat lunak serta membuat dan memelihara dokumentasi dukungan teknis dan prosedur operasional standar.</p>
    <!-- Hard Skills -->
    <h4 class="card-title">Keterampilan - Hard Skills</h4>
    <p class="card-text"><?php echo $row['hard_skills'];?></p>
    <!-- Soft Skills -->
    <h4 class="card-title">Keterampilan - Soft Skills</h4>
    <p class="card-text"><?php echo $row['soft_skills'];?></p>
    <!-- Kemampuan Bahasa -->
    <h4 class="card-title">Kemampuan Bahasa</h4>
    <p class="card-text"><?php echo $row['kemampuan_bahasa'];?></p>
    <!-- Hobby -->
    <h4 class="card-title">Minat dan Bakat</h4>
    <p class="card-text"><?php echo $row['hobby'];?></p>
  </div>

  <!-- Update -->
  <div class="update" id="update">
    <p>Klik tombol "Update" untuk mengubah data pada CV</p>
    <a href="update.php">
      <button class="btn btn-primary">Update</button>
    </a>
  </div>
  
  <!-- Comment -->
  <br id="comment"><br><br><br>
  <div class="comment-page">
    <h1>Comment</h1>
  </div>
  <div>
    <div class="p-3">
      <div id="comments">
        <?php
        include 'config.php';

        $cvId = 1; 
        $query = "SELECT * FROM comments WHERE cv_id = $cvId";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
          while ($comment = mysqli_fetch_assoc($result)) {
            echo '<div class="comment">' . $comment['comment_text'] . '</div>';
          }
        } else {
          echo 'Belum ada komentar.';
        }

        mysqli_close($conn);
        ?>
      </div>
      <label for="commentInput" class="form-label">Berikan Komentar</label>
      <textarea class="form-control" id="commentInput" name="comment" rows="3" placeholder="Berikan komentar..."></textarea>
      <button class="btn btn-primary" onclick="addComment()">Kirim</button>
    </div>
  </div>

  <!-- Footer -->
  <div class="footer">
    <p>Copyright : Nuraisyah Safety Permata | NIM 3337220068</p>
  </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>