<!doctype html>
<html lang="fr">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Salons de beauté</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
   </head>
   <body>
      <nav class="navbar navbar-expand-lg bg-body-tertiary">
         <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse bg-primary rounded" id="menu">
              
               <img src="image/tato.jpg" height="50" alt="Logo">
               <div class="mx-auto text-dark fw-bold ">Royal Beauté 👑</div>
               

               <ul class="navbar-nav ms-auto">
                  <li class="nav-item"><a class="nav-link text-white" href="Accueil.html">Accueil</a></li>
                  <li class="nav-item"><a class="nav-link text-white" href="A propos.html">A propos</a></li>
                  <li class="nav-item"><a class="nav-link text-white" href="contact.html">Contact</a></li>
                  <li class="nav-item"><a class="nav-link text-white" href="service.html">Service</a></li>
                  <li class="nav-item"><a class="nav-link text-white" href="Formulaire.php">Formulaire</a></li>
               </ul>
            </div>
         </div>
      </nav>
      <div class="container my-5">
         <h3 class="text-center mb-4 border-bottom border-danger pb-2">Envoyez-nous un message</h3>
         <div class="row justify-content-center">
            <div class="col-md-6">
               <?php
                  require 'db.php';
                  $message = "";
                  
                  if ($_SERVER['REQUEST_METHOD'] == "POST") {
                  
                    $nom = htmlspecialchars($_POST['nom']);
                    $prenom = htmlspecialchars($_POST['prenom']);
                    $email = htmlspecialchars($_POST['email']);
                    $objet = htmlspecialchars($_POST['objet']);
                    $messageTexte = htmlspecialchars($_POST['message']);
                  
                    if (!empty($nom) && !empty($prenom) && !empty($email) && !empty($objet) && !empty($messageTexte)) {
                  
                        $sql = "INSERT INTO Client (nom, prenom, email, objet, messageTexte)
                                VALUES (?, ?, ?, ?, ?)";
                  
                        $stmt = $pdo->prepare($sql);
                  
                        if ($stmt->execute([$nom, $prenom, $email, $objet, $messageTexte])) {
                  
                            $message = '<div class="alert alert-success text-center">
                            Merci '.$prenom.' '.$nom.', votre message a été envoyé !
                            </div>';
                  
                        } else {
                            $message = '<div class="alert alert-danger text-center">
                            Erreur lors de l\'envoi !
                            </div>';
                        }
                  
                    } else {
                        $message = '<div class="alert alert-warning text-center">
                        Veuillez remplir tous les champs.
                        </div>';
                    }
                  }
                  ?>
               <form method="POST" action="">
                  <div class="mb-3">
                     <label class="form-label">Nom</label>
                     <input type="text" class="form-control" name="nom" required>
                  </div>
                  <div class="mb-3">
                     <label class="form-label">Prénom</label>
                     <input type="text" class="form-control" name="prenom" required>
                  </div>
                  <div class="mb-3">
                     <label class="form-label">Email</label>
                     <input type="email" class="form-control" name="email" required>
                  </div>
                  <div class="mb-3">
                     <label class="form-label">Objet</label>
                     <input type="text" class="form-control" name="objet" required>
                  </div>
                  <div class="mb-3">
                     <label class="form-label">Message</label>
                     <textarea class="form-control" name="message" rows="5" required></textarea>
                  </div>
                  <button type="submit" class="btn btn-danger w-100">Envoyer</button>
               </form>
            </div>
         </div>
      </div>
         


      <footer class="bg-dark text-white text-center py-3">
         ©  2026  Notre  Salon à droits en vos réservés
      </footer>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
   </body>
</html>
