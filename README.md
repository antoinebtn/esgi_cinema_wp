# Cinema Schedule
## Description

Cinema Schedule est un plugin WordPress permettant de gérer la liste des films à l'affiche et les horaires de diffusion de chaque film. Les administrateurs du site peuvent facilement ajouter, modifier et supprimer les films ainsi que leurs horaires de diffusion.

## Installation
1. Téléchargez le dossier complet du plugin cinema-schedule.
2. Décompressez le dossier téléchargé.
3. Téléversez le dossier cinema-schedule dans le répertoire wp-content/plugins/ de votre installation WordPress.
4. Activez le plugin via le menu "Extensions" dans l'administration WordPress.

## Utilisation
### Création de films
1. Allez dans le menu "Films" dans l'administration WordPress.
2. Cliquez sur "Ajouter un film".
3. Saisissez le titre du film et ajoutez une description si nécessaire.
4. Ajoutez les horaires de diffusion en utilisant le champ "Horaires de Diffusion".
5. Cliquez sur "Publier" pour enregistrer le film.

### Modification de films
1. Allez dans le menu "Films" dans l'administration WordPress.
2. Cliquez sur le film que vous souhaitez modifier.
3. Modifiez les informations du film et les horaires de diffusion si nécessaire.
4. Cliquez sur "Mettre à jour" pour enregistrer les modifications.

### Gestion des horaires via la page d'administration
1. Allez dans le menu "Cinema Schedule" dans l'administration WordPress.
2. Vous verrez la liste des films avec leurs horaires de diffusion.
3. Vous pouvez ajouter, modifier ou supprimer les horaires directement depuis cette page.
4. Cliquez sur "Enregistrer les modifications" pour sauvegarder vos changements.

## Structure du Plugin
```
cinema-schedule/
├── includes/
│   ├── cinema-schedule-cpt.php
│   ├── cinema-schedule-meta-boxes.php
│   ├── cinema-schedule-admin-page.php
│   └── cinema-schedule-shortcode.php
├── css/
│   └── cinema-schedule.css
├── js/
│   └── cinema-schedule-admin.js
└── cinema-schedule.php
```

Description des fichiers
- cinema-schedule.php : Fichier principal du plugin qui initialise les composants nécessaires et enregistre les scripts et styles.
- includes/cinema-schedule-cpt.php : Définit le Custom Post Type pour les films.
- includes/cinema-schedule-meta-boxes.php : Ajoute des Meta Boxes pour les horaires de diffusion des films.
- includes/cinema-schedule-admin-page.php : Crée une page d'administration personnalisée pour gérer les films et leurs horaires.
- includes/cinema-schedule-shortcode.php : Définit un shortcode pour afficher les horaires de diffusion des films.
- css/cinema-schedule.css : Fichier CSS pour styliser les éléments du plugin.
- js/cinema-schedule-admin.js : Fichier JavaScript pour gérer les actions des boutons "Ajouter Horaire" et "Supprimer".
