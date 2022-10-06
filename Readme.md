GESTION DE PRODUIT ET CATEGORIES
- Prérequis : PHP 8.1, mariadb ou mysql,
1) Installation
    
    - Faire un clone du projet
    - un coup de cd vers le repertoire du projet
    - Lancer : $php bin/console doctrine:migrations:migrate
    - Si symfony cli installé , lancer : $symfony serve, naviguer sur localhost:8000
    - si serveur web comme apache, nginx , etc : $HOST/public/, ex : localhost/gestion_article/public/index.php