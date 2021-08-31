
<?php
session_start();
$nav = 'contact';

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link href="css/formulaire.css" rel="stylesheet">

</head>



<body>


<div class="description_contact">
				<h2 style="margin-top:120px; font-family:Novecentowide-Light;" id="entete">VOUS SOUHAITEZ ME CONTACTER ? <br/><br/>
			
			
				<h6>Pour pouvoir mieux vous répondre merci de bien vouloir répondre aux questions suivantes.<br>
					Cela ne vous prendra que quelques secondes.
				</h6>
                <section class="formulaire_contact">

<!-- multistep form -->
<form id="msform" method="POST" action="validation_formulaire.php">
<?php if(array_key_exists('errors', $_SESSION)):?>
    <div class="alert alert-danger errors_form">
    <img src="img/errors.png" alt="errors" class="errors_image"><?= implode('<br>', $_SESSION['errors']);?>
    </div>  
<?php unset($_SESSION['errors']); endif;?>

<?php if(array_key_exists('succes', $_SESSION)):?>
    <div class="alert alert-success success_form">
         <img src="img/good.png" alt="felicitation" class="felicitation_image"><?=  $_SESSION['succes'] ;?>
    </div>  
<?php unset($_SESSION['succes']); endif;?>
  <!-- progressbar -->
  <ul id="progressbar">
    <li class="active">Votre Activité</li>
    <li>Objet de la demande</li>
    <li>Coordonnées</li>
  </ul>
  <!-- fieldsets -->
  <fieldset>
    <h2 class="fs-title">Qui êtes-vous ? </h2>
    <h3 class="fs-subtitle">Votre activité</h3>

    <select name="activity" id="pet-select" class="form form-control">
        <option value="Association" >Une Association</option>
        <option value="Entreprise" >Une Entreprise</option>
        <option value="Indepant" >Un Indépendant</option>
    </select>

    <input type="button" name="next" class="next action-button" value="Suivant" />

  </fieldset>

  <fieldset>
    <h2 class="fs-title">Votre Projet</h2>
    <h3 class="fs-subtitle">Selectionner vos Attentes</h3>

    <div class="multiselect" name="projets">

        <div class="selectBox" onclick="showCheckboxes()">

                <select class="form form-control">
                    <option>Objet de votre demande</option>
                </select>
            <div class="overSelect"></div>
        </div>
        

        <div id="checkboxes">
        <label for="one">
            <input type="checkbox" name="project_web" id="web" value="site_vitrine"/>Un site Vitrine</label>
        <label for="two">
            <input type="checkbox" name="project_print" id="print" value="e_commerce" />Un site e-commerce</label>
        <label for="three">
            <input type="checkbox" name="project_digital" id="digital" value="Logo"/>Un Logo</label>
        <label for="one">
            <input type="checkbox" name="project_video" id="packaking" value="formation_wordpress" />Un formation : Wordpress</label>
        <label for="one">
            <input type="checkbox" name="project_stand" id="stand" value="photographie"/>De la photograpghie</label>
        <label for="one">
            <input type="checkbox" name="divers" id="packaking" value="Autre_demande" checked/>Autre demande</label>
        </div>
    </div>

    <input type="button" name="previous" class="previous action-button" value="Précédent" />
    <input type="button" name="next" class="next action-button" value="Suivant" />
  </fieldset>

  <fieldset>



    <h2 class="fs-title">Vos Coordonées</h2>
    <h3 class="fs-subtitle">Dans l'objectif de vous recontacter</h3>
    <input type="text" name="full_name" placeholder="Votre nom Complet" class="coordonnée" required="required"/>
    <input type="email" name="email" placeholder="Votre adresse Mail" class="coordonnée" required="required" />
    <input type="text" name="phone" placeholder="Téléphone" class="coordonnée" required="required" />

    <textarea name="message"  value="message" placeholder="Votre message" class="coordonnée" required="required"></textarea>
    <input type="button" name="previous" class="previous action-button" value="Précédent" />
    <button type="submit" name="submit" class="submit action-button">ENVOYER</button>
  </fieldset>

</form>

</section>
</div>

</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="js/animation_formulaire.js"></script>

</html>


