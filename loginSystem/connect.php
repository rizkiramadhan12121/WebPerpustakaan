<?php
$host = "127.0.0.1";
$username = "root";
$password = "";
$database = "perpustakaann";
$connect = mysqli_connect($host, $username, $password, $database);


function signUp($data) {
  global $connect;
  
  $nisn = htmlspecialchars($data["nisn"]);
  $kodeMember = htmlspecialchars($data["kode_member"]);
  $nama = htmlspecialchars(strtolower($data["nama"]));
  $password = mysqli_real_escape_string($connect, $data["password"]);
  $confirmPw = mysqli_real_escape_string($connect, $data["confirmPw"]);
  $jk = htmlspecialchars($data["jenis_kelamin"]);
  $kelas = htmlspecialchars($data["kelas"]);
  $jurusan = htmlspecialchars($data["jurusan"]);
  $noTlp = htmlspecialchars($data["no_tlp"]);
  $tglDaftar = $data["tgl_pendaftaran"];
  
  $nisnResult = mysqli_query($connect, "SELECT nisn FROM member WHERE nisn = $nisn");
  if(mysqli_fetch_assoc($nisnResult)) {
    echo "<script>
    alert('Nisn sudah terdaftar, silahkan gunakan nisn lain!');
    </script>";
    return 0;
  }

  $kodeMemberResult = mysqli_query($connect, "SELECT  kode_member FROM member WHERE kode_member = '$kodeMember'");
  if(mysqli_fetch_assoc($kodeMemberResult)){
    echo "<script>
    alert('Kode member telah terdaftar, silahkan gunakan kode member lain!');
    </script>";
    return 0;
  }

  if($password !== $confirmPw) {
    echo "<script>
    alert('password / confirm password tidak sesuai');
    </script>";
    return 0;
  }

  $password = password_hash($password, PASSWORD_DEFAULT);
  
  
  $querySignUp = "INSERT INTO member VALUES($nisn, '$kodeMember', '$nama', '$password', '$jk', '$kelas', '$jurusan', '$noTlp', '$tglDaftar')";
  mysqli_query($connect, $querySignUp);
  return mysqli_affected_rows($connect);
  
}

?>

<!-- -- Muhamad Rizki Ramadhan ////// sql dummy data perpustakaan ////// dicoding backend developer -->
<!-- ikyyrrmdhn Dicoding Backend Por2001 Int /////// Myadmin SQL PhpDeveloper -->

<!-- Backkenddd Muhamad Rizki Ramadhan Dicodinggg Backend Por2001 Int  Myadmin SQL PhpDeveloper -->
