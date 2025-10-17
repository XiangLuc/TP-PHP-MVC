<!DOCTYPE HTML>
<HTML lang="fr">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <title>MVC 3</title>
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
  </head>

  <body class="d-flex flex-column min-vh-100">
    
    <script src="js/bootstrap.bundle.min.js"></script>

    <header class="mb-5">

    <?php $compMenu->affichage(); ?>
        
    </header>

    <main>
      <?php echo $contenu; ?>
    </main>

    <footer class="bg-dark py-5 mt-auto">
      <div class="container text-light text-center">
        <p class="display-5 mb-3"> MVC 3 </p>
        <small class="text-white-50"> &copy; BUT INFO 2023-2024 </small>
      </div>
    </footer>
    
  </body>
</HTML>