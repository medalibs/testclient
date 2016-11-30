<!doctype html>
<html lang="fr">
<head>
  <?php include("headerView.php"); ?>
  <title>Formulaire d'inscription</title>
</head>
<body>
  <h1>Formulaire d'inscription</h1>

  <form action="index.php?controller=User&action=add" method="post">
    Login : <input type="text" name="login">
    <br />
    Mot de passe : <input type="password" name="pwd"><br />
    <input type="submit" value="Valider">
  </form>
</body>
</html>
