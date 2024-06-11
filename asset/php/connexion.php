<?php

    include_once "header.php";

?>

    <main>
      <section id="section">
          <form id="formulaire" action="../php/login.php" method="POST">
              <div class="input-formulaire">
                  <label>Email</label>
                  <input class="input" type="email" id="input-connexion-email" name="email" required />
              </div>
              <div class="input-formulaire">
                  <label>Mot de passe</label>
                  <input class="input" type="password" id="input-connexion-mdp" name="password" required />
              </div>
              <div id="parent-bouton">
                  <button type="submit" class="bouton">Se connecter</button>
                  <span id="span-connexion"></span>
              </div>
          </form>
      </section>
    </main>

<?php



?>

    <script src="../js/script.js"></script>
    <script src="https://kit.fontawesome.com/fd76b53e14.js" crossorigin="anonymous"></script>
</body>
</html>