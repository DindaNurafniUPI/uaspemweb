<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if the contact id exists, for example update.php?id=1 will get the contact with the id of 1
if (isset($_GET['id'])) {
    if (!empty($_POST)) {
        // This part is similar to the create.php, but instead we update a record and not insert
        $id = isset($_POST['id']) ? $_POST['id'] : NULL;
        $Pengirim = isset($_POST['Pengirim']) ? $_POST['Pengirim'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $isi = isset($_POST['isi']) ? $_POST['isi'] : '';
        $tanggal = isset($_POST['tanggal']) ? $_POST['tanggal'] : '';
        $pengedit = isset($_POST['pengedit']) ? $_POST['pengedit'] : '';

        // Update the record
        $stmt = $pdo->prepare('UPDATE prof SET id = ?, Pengirim = ?, email = ?, isi = ?, tanggal = ?, pengedit = ? WHERE id = ?' );
        $stmt->execute([$id, $Pengirim, $email, $isi, $tanggal, $pengedit, $_GET['id']]);
        $msg = 'Updated Successfully!';
    }
    // Get the contact from the contacts table
    $stmt = $pdo->prepare('SELECT * FROM prof WHERE id = ?');
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
	<h2>Update Contact #<?=$contact['id']?></h2>
    <form action="up.php?id=<?=$contact['id']?>" method="post">
        <label for="id">ID</label>
        <label for="Pengirim">Nama</label>
        <input type="text" name="id" value="<?=$contact['id']?>" id="id">
        <input type="text" name="Pengirim" value="<?=$contact['Pengirim']?>" id="Pengirim">
        <label for="email">Email</label>
        <label for="isi">Komentar</label>
        <input type="text" name="email" value="<?=$contact['email']?>" id="email">
        <input type="text" name="isi" value="<?=$contact['isi']?>" id="isi">
        <label for="tanggal">Tanggal post</label>
        <label for="pengedit">pengedit</label>
        <input type="date" name="tanggal" value="<?=$contact['tanggal']?>" id="tanggal">
        <input type="text" name="pengedit" value="<?=$contact['pengedit']?>" id="pengedit">
        <input type="submit" value="Update">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>
<center>
  <a href="profil.php"> Kembali </a></center>
<?=template_footer()?>