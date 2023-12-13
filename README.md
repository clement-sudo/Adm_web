# Adm_web
Micro-project for polytech
# Projet de Recensement des Habitants - Saint Denis en Val

Ce projet est une application web développée avec le framework Symfony. Elle est conçue pour aider à recenser les habitants de Saint Denis en Val, en fournissant une interface utilisateur simple pour ajouter, modifier, supprimer et lister les habitants.

Elle sert d'exemple pour 2 tp dans le cadre de ma formation d'ingénieur

## Fonctionnalités

- **Ajouter un Habitant** : Permet d'enregistrer un nouvel habitant avec des détails tels que le nom, le prénom, la date de naissance et le genre.
- **Modifier un Habitant** : Permet de mettre à jour les informations d'un habitant existant.
- **Supprimer un Habitant** : Permet de retirer un habitant de la liste.
- **Lister les Habitants** : Affiche tous les habitants enregistrés par ordre alphabétique.

## Technologies Utilisées

- Symfony
- PHP
- Twig
- Doctrine
- CSS

## Installation

Pour installer et exécuter ce projet, suivez ces étapes :

1. Clonez le dépôt : git clone 
2. Installez les dépendances : composer install
3. Configurez votre fichier `.env` pour la base de données.
4. Créez la base de données : php bin/console doctrine:database:create
5. Effectuez les migrations : php bin/console doctrine:migrations:migrate
6. Lancez le serveur de développement : symfony server:start

## Contribution

Les contributions à ce projet sont les bienvenues. Veuillez suivre les étapes suivantes pour contribuer :

1. Forkez le projet.
2. Créez une nouvelle branche (`git checkout -b feature/nouvelle-fonctionnalité`).
3. Committez vos changements (`git commit -am 'Ajout de quelque chose'`).
4. Poussez la branche (`git push origin feature/nouvelle-fonctionnalité`).
5. Ouvrez une Pull Request.



## Contact

Pour toute question ou suggestion, n'hésitez pas à me contacter à brotclement@gmail.com

