<?php

    include_once "header.php";

?>

    <main>
      <section id="section">
          <form id="formulaire" action="../php/register.php" method="POST">
              <div class="input-formulaire">
                  <label>Email</label>
                  <input class="input" type="email" id="input-inscription-email" name="email" required />
                  <span id="span-inscription-email" style="display: none"></span>
              </div>
              <div class="input-formulaire">
                  <label>Mot de passe</label>
                  <input class="input" type="password" id="input-inscription-mdp" name="password" required />
                  <span id="span-inscription-mdp" style="display: none"></span>
              </div>
              <div class="input-formulaire">
                  <label>Nom</label>
                  <input class="input" type="text" id="input-inscription-nom" name="nom" required />
                  <span id="span-inscription-nom" style="display: none"></span>
              </div>
              <div class="input-formulaire">
                  <label>Prénom</label>
                  <input class="input" type="text" id="input-inscription-prenom" name="prenom" required />
                  <span id="span-inscription-prenom" style="display: none"></span>
              </div>
              <div id="parent-bouton">
                  <button type="submit" class="bouton">S'inscrire</button>
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