<?php
require('view_begin.php');
?>

<img style=" width:500px; "src="Content/img/linus.jpg">

<h1>Connexion</h1>


<form action = "?controller=home&action=login" method="post">
    <p> <label> Identifiant: <input type="text" name="login"/> </label> </p>
    <p> <label> Mot de passe: <input type="password" name="mdp"/> </label></p>
    <input type="submit" value="Se connecter"/>
    <input type="reset" value="Reset"> 
</form>
<br>
<button onclick="location.href='?controller=set&action=form_add'" type="button">Page création d'un nouveau compte</button>

<?php
require('view_end.php');
?>
