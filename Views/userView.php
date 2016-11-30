<!doctype html>
<html lang="fr">
<head>

</head>
<body>

    <div id="content">
      <?php foreach ($users as $user): ?>
        <div>
          <?php print_r($user); ?>
        </div>
        <hr />
      <?php endforeach; ?>
    </div> <!-- #content -->

</body>
</html>
