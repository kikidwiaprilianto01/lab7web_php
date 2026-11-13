<?php
$data = null;
$error = [];
if ($_SERVER["REQUEST_METHOD"] === "POST") {
$nama = trim($_POST["nama"] ?? "");
$nim = trim($_POST["nim"] ?? "");
$prodi = trim($_POST["prodi"] ?? "");
$semesterInput = $_POST["semester"] ?? "";
$email = trim($_POST["email"] ?? "");
if ($nama === "") $error[] = "Nama wajib diisi.";
if ($nim === "") $error[] = "NIM wajib diisi.";
if ($prodi === "") $error[] = "Program studi wajib diisi.";
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
$error[] = "Format email tidak valid.";
}
if (!ctype_digit((string)$semesterInput) ||
(int)$semesterInput < 1 || (int)$semesterInput > 14) {
$error[] = "Semester harus berupa angka 1–14.";
}
if (!$error) {
$data = compact("nama", "nim", "prodi", "email");
$data["semester"] = (int)$semesterInput;
}
}
?>