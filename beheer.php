<?php

include_once "database/connect.php";
include_once "header.php";


$sql = $db->prepare("SELECT * FROM movie");
$sql->execute();
$data = $sql->fetchAll();


?>

<!-- <div class='flexcont_beheer'>
    <div></div><div></div>
    <div><h3>Films toevoegen</h3><br/><br/><a class="bn3638 bn39" href="beheer_get.php?add">Klik hier</a></div>
    <div><h3>Films verwijderen</h3><br/><br/><a class="bn3638 bn39" href="beheer_get.php?del">Klik hier</a></div>
    <div><h3>Films bewerken</h3><br/><br/><a class="bn3638 bn39" href="beheer_get.php?adj">Klik hier</a></div> -->



    <div class="content read">
	<h2>Beheer pagina</h2>
	<a href="beheer_get.php?action=add" class="create-contact">Film/Serie toevoegen</a>
	<table>
        <thead>
            <tr>
                <td>ID</td>
                <td>Titel</td>
                <td>|</td>
                <td>Categorie</td>
                <td>|</td>
                <td>Publicatie jaar</td>
                <td>|</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $data): ?>
            <tr>
                <td><?=$data['id']?></td>
                <td><?=$data['title']?></td>
                <td>|</td>
                <td><?=$data['category']?></td>
                <td>|</td>
                <td><?=$data['year']?></td>
                <td>|</td>
                <td class="actions">
                    <a href="beheer_get?action=edit&id=<?=$data['id']?>" class="edit"><i class="fas fa-pen fa-xs"></i></a>
                    <a href="beheer_get?action=delete&id=<?=$data['id']?>" class="trash"><i class="fas fa-trash fa-xs"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>