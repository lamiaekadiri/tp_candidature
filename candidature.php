<?php 
$prenom    = '';
$nom       = '';
$email     = '';
$age       = '';
$filiere   = '';
$motivation = '';
$erreurs   = [];
$reglement = '';
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
       <div class="container">
            <form action="candidature.php" method="POST">

                <label for="prenom">Prénom:</label>
                <input type="text" id="prenom" name="prenom"  placeholder="Saisissez votre prénom">
                
                <label for="nom">Nom:</label>
                <input type="text" name="nom" id="nom"  placeholder="Saisissez votre nom">

                <label for="age">Age:</label>
                <input type="number" name="age" id="age" placeholder="Saisissez votre âge">

                <label for="filiere">Filière:</label>

                <select name="filiere" id="filiere">

                    <option value="">--Choisir--</option>

                    <option value='Informatique'
                    >
                        Informatique
                        
                    </option>

                    <option value="Electronique"
                    >
                        Electronique

                    </option>

                    <option value="Mecanique"
                    >
                        Mecanique

                    </option>

                    <option value="Mathématiques"
                    >
                        Mathématiques

                    </option>

                    <option value="Physique/Chimie"
                    >
                        Physique/Chimie

                    </option>

                </select>

                <label for="email">Email:</label>
                <input type="text" name="email" id="email"  placeholder="ex:email@gmail.com">


                <label for="mtv">Motivation:</label>
            
                <textarea name="motivation" id="mtv" rows="6"  ></textarea>

                <label for="reglement">J'ai lu et j'accepte le règlement du club</label>
                <input type="checkbox" name="reglement" id="reglement" value="1">

                <button type="submit"> Envoyer ma candidature</button>


        
            </form>
        </div>
    
</body>
</html>