<?php
$daftarNama = ["Alya", "Bima", "Citra", "Doni", "Rendi Ichtiar Prasetyo", "Siti", "Intan"];
$kata = trim((string)($_GET['kata'] ?? ''));
$hasil = [];
if (isset($_GET['kata']) && $kata !== '') {
    foreach ($daftarNama as $nama) {
        if (stripos($nama, $kata) !== false) $hasil[] = $nama;
    }
}
?>
<!DOCTYPE html><html lang="id"><head><meta charset="UTF-8"><title>Latihan 5 - GET</title><link rel="stylesheet" href="assets/style.css"></head><body><main><div class="card"><h1>Latihan 5 - Pencarian dengan GET</h1><p class="sub">Kata kunci dikirim lewat parameter URL dan dicari dalam array nama.</p><form method="GET" action=""><label for="kata">Kata kunci</label><input id="kata" name="kata" type="text" value="<?= htmlspecialchars($kata, ENT_QUOTES, 'UTF-8') ?>" placeholder="Contoh: Rendi"><button type="submit">Cari</button><button type="reset" class="secondary">Reset input</button></form>
<?php if (isset($_GET['kata'])): ?><div class="result"><strong>Kata kunci:</strong> <?= htmlspecialchars($kata, ENT_QUOTES, 'UTF-8') ?><?php if ($kata === ''): ?><p>Masukkan kata kunci pencarian.</p><?php elseif (!$hasil): ?><p>Nama tidak ditemukan.</p><?php else: ?><p>Ditemukan <?= count($hasil) ?> nama:</p><ul><?php foreach ($hasil as $nama): ?><li><?= htmlspecialchars($nama, ENT_QUOTES, 'UTF-8') ?></li><?php endforeach; ?></ul><?php endif; ?></div><?php endif; ?></div></main></body></html>