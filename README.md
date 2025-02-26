# Gestion Des Ateliers

Ce projet est une application web développée avec **Symfony** pour la gestion des ateliers et des utilisateurs (instructeurs et apprentis). Il permet de consulter, ajouter, modifier et supprimer des ateliers, avec des fonctionnalités d'authentification, de gestion des rôles et des inscriptions.

---

## Fonctionnalités 🚀

- **Gestion des Ateliers** : Ajout, modification, suppression et consultation des ateliers.
- **Gestion des Utilisateurs** : Authentification, inscription, et gestion des rôles (instructeur, apprenti, administrateur).
- **Inscriptions aux Ateliers** : Les apprentis peuvent s'inscrire et se désinscrire des ateliers.
- **Gestion des Rôles** :
  - Les instructeurs peuvent créer des ateliers et voir la liste des apprentis inscrits.
  - Les administrateurs peuvent gérer les instructeurs et octroyer des rôles.
- **Interface Utilisateur** : Améliorée avec **Bootstrap** pour une meilleure expérience utilisateur.
- **Système de Notation** : Les apprentis peuvent noter les ateliers auxquels ils participent, avec visualisation des notes via **Chart.js**.

---

## Installation 🛠️

### Prérequis

- **Docker** (pour le conteneur)
- **Symfony CLI**
- **Composer**
- **Node.js** et **npm** (pour les assets)

### Étapes d'installation

1. **Cloner le dépôt** :
   ```bash
   git clone https://github.com/MerouaneRH/Gestion-Des-Ateliers.git
   ```

2. **Accéder au répertoire du projet** :
   ```bash
   cd Gestion-Des-Ateliers
   ```

3. **Installer les dépendances PHP avec Composer** :
   ```bash
   symfony composer install
   ```

4. **Créer et configurer la base de données** :
   ```bash
   symfony console doctrine:database:create
   symfony console make:migration
   symfony console doctrine:migrations:migrate
   ```

5. **Charger les données de test (fixtures)** :
   ```bash
   symfony console doctrine:fixtures:load
   ```

6. **Installer les dépendances JavaScript avec npm** :
   ```bash
   npm install
   npm run dev
   ```

7. **Démarrer le serveur Symfony** :
   ```bash
   symfony server:start --no-tls --listen-ip=0.0.0.0
   ```

---

## Comptes de Test 🔑

Pour faciliter vos tests, voici les comptes disponibles selon leur rôle :

| Rôle         | Email                  | Mot de passe  |
|--------------|------------------------|---------------|
| **Admin**    | admin@example.com      | admin123      |
| **Apprenti** | apprenti@example.com   | apprenti123   |
| **Instructeur** | toto.titi@gmail.com   | tototiti      |

⚠ **Attention** :  
- Seul l'instructeur propriétaire d'un atelier peut le modifier.  
- Si vous testez avec un compte instructeur sans atelier associé, vous ne verrez pas le bouton "Modifier" à côté des ateliers.

📌 **Comment tester la modification d'un atelier ?**
1. Créez un nouvel atelier avec le compte instructeur actuel.
2. Récupérez un autre compte instructeur généré par Faker en exécutant la commande suivante :
   ```bash
   php bin/console doctrine:query:sql "SELECT * FROM user;"
   ```
🔑 **Les comptes générés par Faker ont comme mot de passe par défaut : `password`.**

---

## Structure du Projet 🗂️

- **src/** : Contient les entités, contrôleurs, et services Symfony.
- **templates/** : Contient les vues Twig pour l'interface utilisateur.
- **migrations/** : Contient les fichiers de migration pour la base de données.
- **fixtures/** : Contient les données de test générées avec **Faker**.
- **public/**, **config/**, **bin/**, **var/** : Structure de base du projet Symfony.

---

## Équipe 👥

- **TOUBAL Rabah**
- **RAHMOUN Merouane**
- **HAMZE Muhamad**
- **GUILLARD Joan**

---

Ce projet a été réalisé dans le cadre du cours **Framework Web 2** à l'**Université d'Orléans**.
