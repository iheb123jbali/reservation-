
# DEPLOIEMENT LOCAL #

1ère étape : Créer un dossier "hypnos" dans htdocs de votre serveur, ex : (C:/xampp/htdocs/hypnos)
2ème étape : Collez tout le code dans le dossier "hypnos" (C:/xampp/htdocs/hypnos)
3ème étape : Créer une nouvelle base de données avec ce nom "hotel_reservation" dans PHPMYADMIN en utilisant un serveur mySQL (XAMPP, MAMP, WAMP,  etc...) et cliquez sur Créer.
4ème étape : Importer la base de données (fichier hotel_reservation.sql). 

CONNEXION À LA BASE DE DONNÉES
$con = mysqli_connect('localhost','root','votremotdepasse',''hotel_reservation'); 

