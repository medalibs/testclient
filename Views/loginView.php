<!doctype html>
<html lang="fr">
<head>
  <?php include("headerView.php"); ?>
  <title>Formulaire login</title>
</head>
<body>
  <h1>Formulaire login</h1>
  <p>veuillez entrer votre login et mot de passe</p>
  <form action="index.php?controller=User&action=connect" method="post">
    Login : <input type="text" name="login">
    <br />
    Mot de passe : <input type="password" name="pwd"><br />
    <input type="submit" value="Connexion">
  </form>
</body>
</html>
