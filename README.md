
# Noms des membres du groupe

- TOUBAL Rabah
- RAHMOUN Merouane
- HAMZE Muhamad
- GUILLARD Joan

### Installation

Dans votre conteneur docker` et dans le répertoire du projet, faire

• symfony composer install
• symfony console make:migration
• symfony console doctrine:migrations:migrate
• symfony console doctrine:fixture:load
• npm install
• npm run dev

# Question 1 :

- symfony composer require symfony/webpack-encore-bundle
- npm install
- npm install bootstrap
- npm install bootstrap-icons
- npm run dev

# Question 2 :

- symfony console doctrine:database:create
- symfony console make:entity Atelier
- symfony console make:migration
- symfony console doctrine:migrations:migrate

# Question 3 :

- symfony composer require orm-fixtures --dev
- symfony composer require fakerphp/faker
- symfony console make:fixture
- symfony console doctrine:fixtures:load

# Question 4 :

- symfony console make:crud Atelier
- symfony server:start --no-tls --listen-ip=0.0.0.0 --d

# Question 5 :

- symfony server:start --no-tls --listen-ip=0.0.0.0 --d

# Question 6 :

- symfony composer require cebe/markdown "~1.2.0"

# Question 7 :

Un utilisateur avec les coordonnes suivantes a ete cree:
-Nom:Toto, Prenom:Titi, Email:toto.titi@gmail.com,password:tototiti

- symfony console make:entity User
- symfony console make:migration
- symfony console doctrine:migrations:migrate
- symfony console doctrine:fixtures:load

# Question 8 :

- symfony console make:migration
- symfony console doctrine:migrations:migrate
- symfony console doctrine:fixtures:load

# Question 9 :

- symfony server:start --no-tls --listen-ip=0.0.0.0 --d

# Question 9 :

Seul l'auteur d'atelier peut maintenant modifier et suprimer son atelier

- symfony server:start --no-tls --listen-ip=0.0.0.0 --d

# Question 11 :

- symfony server:start --no-tls --listen-ip=0.0.0.0 --d

# Question 12 :

- symfony console make:crud Atelier
- symfony console make:migration
- symfony console doctrine:migrations:migrate

# Question 13 :

Tout utilisateur connecté peut voir les ateliers auxquels il est inscrit, ainsi que la liste des utilisateurs inscrits à chaque atelier

- symfony server:start --no-tls --listen-ip=0.0.0.0

# Question 14 :

- symfony console doctrine:fixture:load
- symfony server:start --no-tls --listen-ip=0.0.0.0

# Question 15 :
- symfony console make:migration
- symfony console doctrine:migrations:migrate
- symfony console doctrine:fixtures:load
- symfony server:start --no-tls --listen-ip=0.0.0.0

# Question 16 :
- symfony console make:migration
- symfony console doctrine:migrations:migrate
- symfony console doctrine:fixtures:load
- symfony server:start --no-tls --listen-ip=0.0.0.0

# Question 17 :
- php bin/console make:entity Note
- php bin/console make:form NoteType
- php bin/console make:fixture NoteFixtures
- symfony console make:migration
- symfony console doctrine:migrations:migrate
- symfony console doctrine:fixtures:load
- symfony server:start --no-tls --listen-ip=0.0.0.0

# Question 18 :
- symfony console make:migration
- symfony console doctrine:migrations:migrate
- symfony console doctrine:fixtures:load
- symfony server:start --no-tls --listen-ip=0.0.0.0 --d



# 🛠️ Comptes de test pour l'application

Pour faciliter vos tests, voici les comptes disponibles selon leur rôle :

| Rôle          | Email                  | Mot de passe   |
|--------------|------------------------|---------------|
| **Admin**    | `admin@example.com`    | `admin123`    |
| **Apprenti** | `apprenti@example.com` | `apprenti123` |
| **Instructeur** | `toto.titi@gmail.com` | `tototiti` |

---

> ⚠ **Attention : Note importante sur la modification des ateliers !**

Dans notre projet, **seul l'instructeur propriétaire d'un atelier peut le modifier**.  
Si vous testez avec un compte instructeur sans atelier associé, vous ne verrez **pas** le bouton "Modifier" à côté des ateliers.

### 📌 Comment tester la modification d'un atelier ?
1. **Créer un nouvel atelier avec le compte instructeur actuel**
2. **Récupérer un autre compte instructeur généré par Faker** en exécutant la commande suivante :
   ```bash
   php bin/console doctrine:query:sql "SELECT * FROM user;"
🔑 Les comptes générés par Faker ont comme mot de passe par défaut : password
