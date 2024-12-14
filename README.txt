///////////////////ADMIN Login  efa ao anaty bd///////////////////////////

URL: http://localhost/library_management/admin
Username: admin@library.com
Password: Admin@123#$


/////////////////////////////////////////////////////////////////

# Gestion de Bibliothèque

Ce projet de gestion de bibliothèque permet de gérer les livres, les catégories de livres et les utilisateurs de manière simple et efficace. Il est conçu pour faciliter l'ajout, la modification, la suppression et la consultation des livres ainsi que des catégories associées, tout en permettant une gestion des utilisateurs.

## Fonctionnalités

Le système de gestion de bibliothèque offre plusieurs fonctionnalités :

### 1. **Gestion des Catégories**
   - **Ajouter une catégorie** : Vous pouvez ajouter de nouvelles catégories de livres.
   - **Modifier une catégorie** : Vous pouvez mettre à jour le nom et le statut des catégories existantes.
   - **Supprimer une catégorie** : Vous pouvez supprimer des catégories si elles ne sont plus nécessaires.
   - **Voir la liste des catégories** : Une vue permettant de voir toutes les catégories existantes avec leurs statuts (Actif ou Inactif).

### 2. **Gestion des Livres**
   - **Ajouter un livre** : Permet d'ajouter un nouveau livre avec son titre, son auteur, sa catégorie, etc.
   - **Modifier un livre** : Modifier les détails d'un livre existant.
   - **Supprimer un livre** : Supprimer un livre de la base de données.
   - **Voir la liste des livres** : Visualiser tous les livres enregistrés dans la bibliothèque avec leurs informations pertinentes.

### 3. **Gestion des Utilisateurs**
   - **Authentification des utilisateurs** : Les utilisateurs doivent se connecter avant d'accéder aux fonctionnalités du système.
   - **Tableau de bord utilisateur** : Un tableau de bord personnel qui permet à l'utilisateur de gérer ses informations et d'interagir avec les livres et les catégories.

## Technologies utilisées

- **PHP** pour la logique côté serveur
- **MySQL** pour la gestion de la base de données
- **HTML/CSS** pour le design de l'interface utilisateur
- **JavaScript** pour les interactions côté client (notamment pour les confirmations de suppression)

## Prérequis

Avant de lancer ce projet, assurez-vous d'avoir installé les éléments suivants :

1. **Serveur Web** : Apache ou tout autre serveur qui prend en charge PHP.
2. **PHP** : Version 7.0 ou supérieure.
3. **MySQL** : Pour la gestion de la base de données.
4. **Navigateur Web** : Un navigateur moderne pour tester l'application.

## Installation

1. Clonez le projet sur votre machine locale :
   ```bash
   git clone https://github.com/votre-utilisateur/gestion-bibliotheque.git

    Configurez votre base de données MySQL :
        Créez une nouvelle base de données (par exemple gestion_bibliotheque).
        Importez le fichier database.sql (si disponible) pour créer les tables nécessaires dans votre base de données.

    Configurez les paramètres de connexion dans le fichier connection.php :
        Modifiez les informations de connexion à la base de données (hôte, utilisateur, mot de passe, etc.).

    Lancer le projet dans votre serveur local et accédez à l'application via l'URL configurée (par exemple http://localhost/gestion-bibliotheque).
