<?php
$errors = [];
$hasil = null;
$nama = trim((string)($_POST['nama'] ?? ''));
$prodi = trim((string)($_POST['prodi'] ?? ''));
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($nama === '') $errors[] = 'Nama wajib diisi.';
    if ($prodi === '') $errors[] = 'Program studi wajib diisi.';
    if (!$errors) $hasil = ['nama' => $nama, 'prodi' => $prodi];
}
?>
<!DOCTYPE html><html lang="id"><head><meta charset="UTF-8"><title>Latihan 6 - POST</title><link rel="stylesheet" href="assets/style.css"></head><body><main><div class="card"><h1>Latihan 6 - Form POST</h1><p class="sub">Form penerimaan data pengguna dengan validasi di server.</p><form method="POST" action=""><label for="nama">Nama</label><input id="nama" name="nama" required value="<?= htmlspecialchars($nama, ENT_QUOTES, 'UTF-8') ?>"><label for="prodi">Program studi</label><input id="prodi" name="prodi" required value="<?= htmlspecialchars($prodi, ENT_QUOTES, 'UTF-8') ?>"><button type="submit" name="kirim">Kirim Data</button><button type="reset" class="secondary">Reset input</button></form>
<?php if ($errors): ?><div class="error"><strong>Validasi gagal</strong><ul><?php foreach ($errors as $error): ?><li><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></li><?php endforeach; ?></ul></div><?php elseif ($hasil): ?><div class="result"><strong>Data diterima</strong><p>Nama: <?= htmlspecialchars($hasil['nama'], ENT_QUOTES, 'UTF-8') ?><br>Program studi: <?= htmlspecialchars($hasil['prodi'], ENT_QUOTES, 'UTF-8') ?></p></div><?php endif; ?></div></main></body></html>