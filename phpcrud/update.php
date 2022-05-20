<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if the contact id exists, for example update.php?id=1 will get the contact with the id of 1
if (isset($_GET['id'])) {
    if (!empty($_POST)) {
        // This part is similar to the create.php, but instead we update a record and not insert
        $id = isset($_POST['id']) ? $_POST['id'] : NULL;
        $merk = isset($_POST['merk']) ? $_POST['merk'] : '';
        $nomor_seri = isset($_POST['nomor_seri']) ? $_POST['nomor_seri'] : '';
        $tahun_produksi = isset($_POST['tahun_produksi']) ? $_POST['tahun_produksi'] : '';
        
        // Update the record
        $stmt = $pdo->prepare('UPDATE toko_laptop SET id = ?, merk = ?, nomor_seri = ?, tahun_produksi = ? WHERE id = ?');
        $stmt->execute([$id, $merk, $nomor_seri, $tahun_produksi, $_GET['id']]);
        $msg = 'Updated Successfully!';
    }
    // Get the contact from the contacts table
    $stmt = $pdo->prepare('SELECT * FROM toko_laptop WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$contact) {
        exit('Contact doesn\'t exist with that ID!');
    }
} else {
    exit('No ID specified!');
}
?>



<?=template_header('Read')?>

<div class="content update">
	<h2>Update Data #<?=$contact['id']?></h2>
    <form action="update.php?id=<?=$contact['id']?>" method="post">
        <label for="id">ID</label>
        <label for="merk">Merk</label>
        <input type="text" name="id" value="<?=$contact['id']?>" id="id">
        <input type="text" name="merk" value="<?=$contact['merk']?>" id="merk">
        <label for="nomor_seri">Nomor Seri</label>
        <label for="tahun_produksi">Tahun Produksi</label>
        <input type="text" name="nomor_seri" value="<?=$contact['nomor_seri']?>" id="nomor_seri">
        <input type="text" name="tahun_produksi" value="<?=$contact['tahun_produksi']?>" id="tahun_produksi">
        <input type="submit" value="Update">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>