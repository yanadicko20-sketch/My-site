<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Contact | Royal Beauté 👑</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
  <style>
    :root {
      --royal-gold: #c5a059;
      --royal-dark: #121212;
    }
    body { font-family: 'Poppins', sans-serif; background-color: #fcfaf7; }
    h2, h3 { font-family: 'Playfair Display', serif; color: var(--royal-dark); }

    /* Navbar Custom */
    .navbar { background: white !important; box-shadow: 0 2px 10px rgba(0,0,0,0.05); }
    .navbar-brand { color: var(--royal-gold) !important; font-weight: 700; }

    /* Contact Card Style */
    .contact-container {
      background: white;
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 15px 35px rgba(0,0,0,0.1);
      margin-top: -50px;
    }
    .info-side {
      background: var(--royal-dark);
      color: white;
      padding: 40px;
    }
    .form-side { padding: 40px; }

    .btn-royal {
      background: var(--royal-gold);
      color: white;
      border: none;
      padding: 12px;
      border-radius: 8px;
      font-weight: 600;
      transition: 0.3s;
    }
    .btn-royal:hover { background: #b08d4a; transform: translateY(-2px); }

    .form-control {
      border: 1px solid #eee;
      padding: 12px;
      border-radius: 8px;
      margin-bottom: 5px;
    }
    .form-control:focus {
      border-color: var(--royal-gold);
      box-shadow: 0 0 0 0.25rem rgba(197, 160, 89, 0.25);
    }

    .hero-mini {
      background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('image/tato.jpg');
      background-size: cover;
      background-position: center;
      height: 250px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg sticky-top">
  <div class="container">
    <a class="navbar-brand" href="#">ROYAL BEAUTÉ 👑</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="menu">
      <ul class="navbar-nav ms-auto text-uppercase small fw-bold">
        <li class="nav-item"><a class="nav-link" href="Accueil.html">Accueil</a></li>
        <li class="nav-item"><a class="nav-link" href="A propos.html">À propos</a></li>
        <li class="nav-item"><a class="nav-link" href="service.html">Services</a></li>
        <li class="nav-item ms-lg-3"><a class="btn btn-dark btn-sm rounded-pill px-4 text-white" href="Formulaire.php">RDV</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="hero-mini">
  <h2 class="display-4 text-white">Contactez-nous</h2>
</div>

<div class="container mb-5">
  <div class="row justify-content-center">
    <div class="col-lg-10 contact-container">
      <div class="row">
        <div class="col-md-5 info-side d-flex flex-column justify-content-between">
          <div>
            <h3 class="text-white mb-4">Nos Coordonnées</h3>
            <p class="mb-4 opacity-75">Nous sommes à votre écoute pour toute question ou prise de rendez-vous spécifique.</p>
            
            <div class="mb-3 d-flex align-items-start">
              <span class="me-3">📍</span>
              <p>Rue des Jardins, Bamako, Mali</p>
            </div>
            <div class="mb-3 d-flex align-items-start">
              <span class="me-3">📞</span>
              <p>+223 73 37 71 43</p>
            </div>
            <div class="mb-3 d-flex align-items-start">
              <span class="me-3">✉️</span>
              <p>contact@royalbeaute.ml</p>
            </div>
          </div>
          
          <div class="pt-4 border-top border-secondary">
            <h5 class="text-warning">Horaires d'ouverture</h5>
            <p class="small mb-1">Lun - Sam : 09h00 - 20h00</p>
            <p class="small">Dimanche : Sur rendez-vous</p>
          </div>
        </div>

        <div class="col-md-7 form-side">
          <h3 class="mb-4">Envoyez un message</h3>
          
          <?php
            require 'db.php';
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
               $nom = htmlspecialchars($_POST['nom']);
               $prenom = htmlspecialchars($_POST['prenom']);
               $email = htmlspecialchars($_POST['email']);
               $objet = htmlspecialchars($_POST['objet']);
               $messageTexte = htmlspecialchars($_POST['message']);
            
               if (!empty($nom) && !empty($prenom) && !empty($email) && !empty($objet) && !empty($messageTexte)) {
                  $sql = "INSERT INTO Client (nom, prenom, email, objet, messageTexte) VALUES (?, ?, ?, ?, ?)";
                  $stmt = $pdo->prepare($sql);
            
                  if ($stmt->execute([$nom, $prenom, $email, $objet, $messageTexte])) {
                      echo '<div class="alert alert-success">Merci '.$prenom.', votre message a été transmis à nos équipes !</div>';
                  } else {
                      echo '<div class="alert alert-danger">Erreur technique lors de l\'envoi.</div>';
                  }
               }
            }
          ?>

          <form method="POST" action="">
            <div class="row">
              <div class="col-md-6 mb-3">
                <label class="small fw-bold mb-1">Nom</label>
                <input type="text" class="form-control" name="nom" placeholder="Votre nom" required>
              </div>
              <div class="col-md-6 mb-3">
                <label class="small fw-bold mb-1">Prénom</label>
                <input type="text" class="form-control" name="prenom" placeholder="Votre prénom" required>
              </div>
            </div>
            <div class="mb-3">
              <label class="small fw-bold mb-1">Email</label>
              <input type="email" class="form-control" name="email" placeholder="exemple@mail.com" required>
            </div>
            <div class="mb-3">
              <label class="small fw-bold mb-1">Objet</label>
              <input type="text" class="form-control" name="objet" placeholder="Sujet de votre message" required>
            </div>
            <div class="mb-4">
              <label class="small fw-bold mb-1">Message</label>
              <textarea class="form-control" name="message" rows="4" placeholder="Comment pouvons-nous vous aider ?" required></textarea>
            </div>
            <button type="submit" class="btn btn-royal w-100">Envoyer le message</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<footer class="bg-dark text-white text-center py-4 mt-5">
  <p class="mb-0 small opacity-50">© 2026 Royal Beauté 👑 - Tous droits réservés.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>