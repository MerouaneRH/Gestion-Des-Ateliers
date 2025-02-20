
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