<?php
include 'config.php';

function getCVData()
{
  global $conn;
  $query = "SELECT * FROM cv_data WHERE id = 1";
  $result = mysqli_query($conn, $query);
  return mysqli_fetch_array($result);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nama = htmlspecialchars($_POST['nama']);
  $alamat = htmlspecialchars($_POST['alamat']);
  $telepon = htmlspecialchars($_POST['telepon']);
  $email = htmlspecialchars($_POST['email']);
  $web = htmlspecialchars($_POST['web']);
  $linkedin = htmlspecialchars($_POST['linkedin']);
  $pendidikan_sd = htmlspecialchars($_POST['pendidikan_sd']);
  $pendidikan_smp = htmlspecialchars($_POST['pendidikan_smp']);
  $pendidikan_sma = htmlspecialchars($_POST['pendidikan_sma']);
  $pendidikan_kuliah = htmlspecialchars($_POST['pendidikan_kuliah']);
  $prestasi_satu = htmlspecialchars($_POST['prestasi_satu']);
  $prestasi_dua = htmlspecialchars($_POST['prestasi_dua']);
  $prestasi_tiga = htmlspecialchars($_POST['prestasi_tiga']);
  $pengalaman_kerja_satu = htmlspecialchars($_POST['pengalaman_kerja_satu']);
  $pengalaman_kerja_dua = htmlspecialchars($_POST['pengalaman_kerja_dua']);
  $pengalaman_kerja_tiga = htmlspecialchars($_POST['pengalaman_kerja_tiga']);
  $pengalaman_kerja_empat = htmlspecialchars($_POST['pengalaman_kerja_empat']);
  $hard_skills = htmlspecialchars($_POST['hard_skills']);
  $soft_skills = htmlspecialchars($_POST['soft_skills']);
  $kemampuan_bahasa = htmlspecialchars($_POST['kemampuan_bahasa']);
  $hobby = htmlspecialchars($_POST['hobby']);
  $foto_path = htmlspecialchars($_POST['foto_path']);

  $query = "UPDATE cv_data SET 
        nama = ?, 
        alamat = ?, 
        telepon = ?, 
        email = ?, 
        web = ?, 
        linkedin = ?,
        pendidikan_sd = ?,
        pendidikan_smp = ?,
        pendidikan_sma = ?,
        pendidikan_kuliah = ?,
        prestasi_satu = ?,
        prestasi_dua = ?,
        prestasi_tiga = ?,
        pengalaman_kerja_satu = ?,
        pengalaman_kerja_dua = ?,
        pengalaman_kerja_tiga = ?,
        pengalaman_kerja_empat = ?,
        hard_skills = ?,
        soft_skills = ?, 
        kemampuan_bahasa = ?,
        hobby = ?,
        foto_path = ? 
        WHERE id = 1";

  $stmt = mysqli_prepare($conn, $query);
  mysqli_stmt_bind_param($stmt, 'ssssssssssssssssssssss',$nama, $alamat, $telepon, $email, $web, $linkedin, $pendidikan_sd, 
  $pendidikan_smp, $pendidikan_sma, $pendidikan_kuliah, $prestasi_satu, $prestasi_dua, $prestasi_tiga,
  $pengalaman_kerja_satu,$pengalaman_kerja_dua, $pengalaman_kerja_tiga, $pengalaman_kerja_empat, 
  $hard_skills, $soft_skills, $kemampuan_bahasa, $hobby, $foto_path);

  if (mysqli_stmt_execute($stmt)) {
    echo 'Data berhasil diperbarui';
    print 'Data berhasil diperbarui';
  } else {
    echo 'Terjadi kesalahan saat memperbarui data';
    print'Data gagal diperbarui';
  }

  mysqli_stmt_close($stmt);
  mysqli_close($conn);

  header('Location: update.php');
  exit();
}

$data = getCVData();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  <title>Update CV</title>
</head>

<body>
  <div class="container mt-5">
    <nav class="navbar">
      <div class="container-fluid">
        <h1>Update CV</h1>
        <a class="navbar-brand" href="/cv">View</a>
      </div>
    </nav>

    <div class="card">
      <div class="p-3">
        <div class="card-body">
          <form method="post">
            <div class="mb-3">
              <label for="nama" class="form-label">Nama</label>
              <input class="form-control" id="nama" type="text" name="nama" value="<?php echo $data['nama']; ?>" placeholder="Nama" required>
              <label for="alamat" class="form-label">Alamat</label>
              <input class="form-control" id="alamat" type="text" name="alamat" value="<?php echo $data['alamat']; ?>" placeholder="Alamat" required>
              <label for="telepon" class="form-label">Telepon</label>
              <input class="form-control" id="telepon" type="text" name="telepon" value="<?php echo $data['telepon']; ?>" placeholder="Telepon" required>
              <label for="email" class="form-label">Email</label>
              <input class="form-control" id="email" type="email" name="email" value="<?php echo $data['email']; ?>" placeholder="Email" required>
              <label for="web" class="form-label">Web</label>
              <input class="form-control" id="web" type="text" name="web" value="<?php echo $data['web']; ?>" placeholder="Web" required>
              <label for="linkedin" class="form-label">LinkedIn</label>
              <input class="form-control" id="linkedin" type="text" name="linkedin" value="<?php echo $data['linkedin']; ?>" placeholder="LinkedIn" required>
              <!-- Pendidikan -->
              <label for="pendidikansd" class="form-label">Sekolah Dasar (SD)</label>
              <input class="form-control" id="pendidikansd" type="text" name="pendidikan_sd" value="<?php echo $data['pendidikan_sd']?>" placeholder="Pendidikan SD" required>
              <label for="pendidikansmp" class="form-label">Sekolah Menengah Pertama (SMP)</label>
              <input class="form-control" id="pendidikansmp" type="text" name="pendidikan_smp" value="<?php echo $data['pendidikan_smp']; ?>" placeholder="Pendidikan SMP" required>
              <label for="pendidikansma" class="form-label">Sekolah Menengah Atas (SMA)</label>
              <input class="form-control" id="pendidikansma" type="text"name="pendidikan_sma" value="<?php echo $data['pendidikan_sma']; ?>" placeholder="Pendidikan SMA" required>
              <label for="pendidikankuliah" class="form-label">Universitas</label>
              <input class="form-control" id="pendidikankuliah" type="text" name="pendidikan_kuliah" value="<?php echo $data['pendidikan_kuliah']; ?>" placeholder="Universitas" required>
              <!-- Prestasi -->
              <label for="prestasisatu" class="form-label">Prestasi 1</label>
              <input class="form-control" id="prestasisatu" type="text" name="prestasi_satu" value="<?php echo $data['prestasi_satu']; ?>" placeholder="Prestasi satu" required>
              <label for="prestasidua" class="form-label">Prestasi 2</label>
              <input class="form-control" id="prestasidua" type="text" name="prestasi_dua" value="<?php echo $data['prestasi_dua']; ?>" placeholder="Prestasi dua" required>
              <label for="prestasitiga" class="form-label">Prestasi 3</label>
              <input class="form-control" id="prestasitiga" type="text" name="prestasi_tiga" value="<?php echo $data['prestasi_tiga']; ?>" placeholder="Prestasi tiga" required>
              <!-- Pengalaman Kerja -->
              <label for="pengalamankerjasatu" class="form-label">Pengalaman Kerja Satu</label>
              <input class="form-control" id="pengalamankerjasatu" type="text" name="pengalaman_kerja_satu" value="<?php echo $data['pengalaman_kerja_satu']; ?>"placeholder="Pengalaman Kerja Satu" required>
              <label for="pengalamankerjadua" class="form-label">Pengalaman Kerja Dua</label>
              <input class="form-control" id="pengalamankerjadua" type="text" name="pengalaman_kerja_dua" value="<?php echo $data['pengalaman_kerja_dua']; ?>" placeholder="Pengalaman Kerja Dua" required>
              <label for="pengalamankerjatiga" class="form-label">Pengalaman Kerja Tiga</label>
              <input class="form-control" id="pengalamankerjatiga" type="text" name="pengalaman_kerja_tiga" value="<?php echo $data['pengalaman_kerja_tiga']; ?>"placeholder="Pengalaman Kerja Tiga" required>
              <label for="pengalamankerjaempat" class="form-label">Pengalaman Kerja Empat</label>
              <input class="form-control" id="pengalamankerjaempat" type="text" name="pengalaman_kerja_empat" value="<?php echo $data['pengalaman_kerja_empat']; ?>"placeholder="Pengalaman Kerja Empat" required>
              <!-- Keterampilan -->
              <label for="hardskills" class="form-label">Hard Skills</label>
              <textarea class="form-control" id="hardskills" name="hard_skills" rows="3" placeholder="Hard Skills" required><?php echo $data['hard_skills']; ?></textarea>
              <label for="softskills" class="form-label">Soft Skills</label>
              <textarea class="form-control" id="softskills" name="soft_skills" rows="3" placeholder="Soft Skills" required><?php echo $data['soft_skills']; ?></textarea>
              <!-- Kemampuan Bahasa -->
              <label for="kemampuanbahasa" class="form-label">Kemampuan Bahasa</label>
              <textarea class="form-control" id="kemampuanbahasa" name="kemampuan_bahasa" rows="3" placeholder="Kemampuan Bahasa" required><?php echo $data['kemampuan_bahasa']; ?></textarea>
              <!-- Hobby -->
              <label for="hobby" class="form-label">Minat dan Bakat</label>
              <textarea class="form-control" id="hobby" name="hobby" rows="3" placeholder="Minat dan Bakat" required><?php echo $data['hobby']; ?></textarea>
              <!-- Path Foto -->
              <label for="formFile" class="form-label">Foto Path</label>
              <input class="form-control" type="text" id="formFile" name="foto_path" value="<?php echo $data['foto_path']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>