CREATE DATABASE cv;
USE cv;
CREATE TABLE cv_data (
	id INT PRIMARY KEY AUTO_INCREMENT,
	nama VARCHAR(100) NOT NULL,
	alamat TEXT NOT NULL,
	telepon VARCHAR(20) NOT NULL,
	email VARCHAR(255) NOT NULL,
	web VARCHAR(255) NOT NULL,
	linkedin VARCHAR(255) NOT NULL,
	pendidikan_sd TEXT NOT NULL,
	pendidikan_smp TEXT NOT NULL,
	pendidikan_sma TEXT NOT NULL,
	pendidikan_kuliah TEXT NOT NULL,
	prestasi_satu TEXT NOT NULL,
	prestasi_dua TEXT NOT NULL,
	prestasi_tiga TEXT NOT NULL,
	pengalaman_kerja_satu TEXT NOT NULL,
	pengalaman_kerja_dua TEXT NOT NULL,
	pengalaman_kerja_tiga TEXT NOT NULL,
	pengalaman_kerja_empat TEXT NOT NULL,
	hard_skills TEXT NOT NULL,
	soft_skills TEXT NOT NULL,
	kemampuan_bahasa TEXT NOT NULL,
	hobby TEXT NOT NULL,
	foto_path VARCHAR(255) NOT NULL

);

SELECT*FROM cv_data;