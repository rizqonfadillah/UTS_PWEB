<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if POST data is not empty
if (!empty($_POST)) {
    // Post data not empty insert a new record
    // Set-up the variables that are going to be inserted, we must check if the POST variables exist if not we can default them to blank
    $id = isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] != 'auto' ? $_POST['id'] : NULL;
    // Check if POST variable "name" exists, if not default the value to blank, basically the same for all variables
    $merk = isset($_POST['merk']) ? $_POST['merk'] : '';
    $nomor_seri = isset($_POST['nomor_seri']) ? $_POST['nomor_seri'] : '';
    $tahun_produksi = isset($_POST['tahun_produksi']) ? $_POST['tahun_produksi'] : '';

    // Insert new record into the contacts table
    $stmt = $pdo->prepare('INSERT INTO toko_laptop VALUES (?, ?, ?, ?)');
    $stmt->execute([$id, $merk, $nomor_seri, $tahun_produksi]);
    // Output message
    $msg = 'Created Successfully!';
}
?>


<?=template_header('Create')?>

<div class="content update">
	<h2>Tambah Data</h2>
    <form action="create.php" method="post">
        <label for="id">ID</label>
        <label for="nama">Merk</label>
        <input type="text" name="id" value="auto" id="id">
        <input type="text" name="merk" id="merk">
        <label for="nomor_seri">Nomor Seri</label>
        <label for="tahun_produksi">Tahun Produksi</label>
        <input type="text" name="nomor_seri" id="nomor_seri">
        <input type="text" name="tahun_produksi" id="tahun_produksi">
        <input type="submit" value="Create">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>