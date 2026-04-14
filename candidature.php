<?php 
$prenom    = '';
$nom       = '';
$email     = '';
$age       = '';
$filiere   = '';
$motivation = '';
$erreurs   = [];
$reglement = '';
//$confemail='';

if ($_SERVER["REQUEST_METHOD"]==="POST"):
    $prenom    = $_POST["prenom"]??"";
    $nom       = $_POST["nom"]??"";
    $email     = $_POST["email"]??"";
    $age       = $_POST["age"]??"";
    $filiere   = $_POST["filiere"]??"";
    $motivation = $_POST["motivation"]??"";
    $reglement = isset($_POST['reglement']);

    if (empty($prenom)){
        $erreurs[]="Le prenom est obligatoire.";
    }
    if (empty($nom)){
        $erreurs[]="Le nom est obligatoire.";
    }
    if (empty($email)|| !filter_var($email,FILTER_VALIDATE_EMAIL)){
        $erreurs[]="L'adresse email est invalide.";
    }
    if (empty($age)||!is_numeric($age)||$age<16 ||$age>30){
        //même si je pense qu'on pourrait nous passer de empty($age): !is_numeric faisant le travail
        $erreurs[]="L'âge est invalide.";
    }
    if (empty($filiere)){
        $erreurs[]="Veuillez choisir une filière. ";
    }
    if (strlen($motivation) < 30 ) {
    $erreurs[] = "La motivation doit contenir au moins 30 caractères.";

    }
    if (!$reglement){
        $erreurs[]="Vous devez accepter le règlement";
    }

endif;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    
      <?php if(empty($erreurs) && $_SERVER['REQUEST_METHOD']==='POST'):?>
          <h1>Candidature reçue!</h1>
          <br>
          <ul>
            <li>Prénom: <?php echo $prenom;?></li>

            <li>Nom: <?php echo $nom;?></li>

            <li>Email: <?php echo $email;?></li>

            <li>Age: <?php echo $age;?></li>   

            <li>Filière: <?php echo $filiere;?></li>

            <li>Lettre de motivation: <?php echo $motivation;?></li>

          </ul>
          <br>
          <p>Votre candidature a bien été enregistrée.Nous vous contacterons à l'adresse indiquée.</p>



    <?php else:?>

        <?php if (!empty($erreurs)&& $_SERVER['REQUEST_METHOD']==="POST"):
         ?>

          <ul class="erreurs">
            <?php foreach($erreurs as $e):?>
                <li><?php echo $e;?></li>
            <?php endforeach;?>
        </ul>

        <?php endif; ?>
        <div class="container">
            <form action="candidature.php" method="POST">

                <label for="prenom">Prénom:</label>
                <input type="text" id="prenom" name="prenom" value="<?php echo $prenom; ?>" placeholder="Saisissez votre prénom">

                <label for="nom">Nom:</label>
                <input type="text" name="nom" id="nom"  value="<?php echo $nom; ?>" placeholder="Saisissez votre nom">

                <label for="age">Age:</label>
                <input type="number" name="age" id="age" value="<?php echo $age; ?>" placeholder="Saisissez votre âge">

                <label for="filiere">Filière:</label>

                <select name="filiere" id="filiere">

                    <option value="">--Choisir--</option>

                    <option value='Informatique'
                        <?php echo ($filiere === 'Informatique') ? 'selected' : ''; ?>>
                        Informatique
                    </option>

                    <option value="Electronique"
                        <?php echo ($filiere === 'Electronique') ? 'selected' : ''; ?>>
                        Electronique
                    </option>

                    <option value="Mecanique"
                        <?php echo ($filiere === 'Mecanique') ? 'selected' : ''; ?>>
                        Mecanique
                    </option>

                    <option value="Mathématiques"
                        <?php echo ($filiere === 'Mathématiques') ? 'selected' : ''; ?>>
                        Mathématiques
                    </option>

                    <option value="Physique/Chimie"
                        <?php echo ($filiere === 'Physique/Chimie') ? 'selected' : ''; ?>>
                        Physique/Chimie
                    </option>

                </select>

                <label for="email">Email:</label>
                <input type="text" name="email" id="email" value="<?php echo $email; ?>" placeholder="ex:email@gmail.com">

                <label for="mtv">Motivation:</label>
                <textarea name="motivation" id="mtv" rows="6"  ><?php echo $motivation;?></textarea>

                <label for="reglement">J'ai lu et j'accepte le règlement du club</label>
                <input type="checkbox" name="reglement" id="reglement" value="1" <?php echo $reglement?"checked":'';?>>

                <button type="submit"> Envoyer ma candidature</button>



            </form>
        </div>
        
    <?php endif; ?>
   

    <footer>
        <?php if(empty($erreurs) && $_SERVER['REQUEST_METHOD']==='POST'):?>
            <nav>
                <a href="candidature.php">Cliquez sur ce lien pour recharger la page et soumettre une nouvelle candidature.</a>
            </nav>
        <?php endif;?>
    </footer> 


</body>
</html>