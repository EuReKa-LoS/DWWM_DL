<?php
//Ici je réceptionne le chiffre envoyé en get par mon JS
$region=$_GET["nom"];
$pdo = new PDO('mysql:host=localhost;dbname=doucefrance', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Retour d'erreur PDO (si erreur synthaxe et compagnie par ex)
$pdo->exec('SET NAMES "UTF8"'); // Spécification UTF-8
//Bien sur j'apelle les DATAs que j'ai besoin via L'ID
$query=$pdo->query('SELECT * FROM regions WHERE id ='.$region);
while($row = $query->fetch())
{
echo "<table border='1'>
  <tr>
    <th>Drapeau :</th>    <td><img src='img/{$row['slug']}.gif'</img></td>
</tr>
<tr>
    <th>Nom :</th>        <td>" . $row['nom'] . "</td>
</tr>
<tr>
    <th>Population :</th> <td>" . $row['population'] . "</td>
 </tr>
 <tr>
    <th>Superficie m² :</th> <td>" . $row['superficie'] . "</td>
  </tr>
  <tr>
    <th>Densité hab/m² :</th>    <td>" . number_format($row['population']/$row['superficie'], 2) . "</td>
 </tr>
  </tr>";

}
?>