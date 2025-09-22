# Système de Témoignages Dynamiques avec Approbation

## Fonctionnalités

Le système de témoignages dynamiques permet d'afficher les avis clients directement depuis la base de données avec les fonctionnalités suivantes :

### Champs disponibles
- **name** : Nom du client
- **email** : Email du soumissionnaire (non public, optionnel)
- **message** : Contenu du témoignage
- **rating** : Note de 1 à 5 étoiles
- **photo** : Photo du client (optionnelle)
- **is_active** : Statut actif/inactif
- **status** : Statut d'approbation (pending, approved, rejected)
- **created_at** : Date de création

### Statuts d'approbation
- **pending** : En attente d'approbation (nouvelles soumissions)
- **approved** : Approuvé et visible sur le site public
- **rejected** : Rejeté et non visible sur le site public

### Affichage automatique
- **Photo** : Si une photo est disponible, elle s'affiche; sinon l'initiale du nom est utilisée
- **Rating** : Affichage des étoiles (★★★★★ ou ★★★★☆)
- **Date** : 
  - **Frontend** : Format français (ex: "12 sept. 2024")
  - **Admin** : Format relatif (ex: "il y a 2 jours")
- **Filtrage** : Seuls les témoignages approuvés et actifs sont affichés publiquement
- **Fallback** : Si aucun témoignage en base, affichage des témoignages statiques

## Formulaire de Soumission Public

### Accès
- **URL** : Page d'accueil (section après les témoignages)
- **Champs** : Nom, Note, Message, Email (optionnel)
- **Protection** : Calcul mathématique anti-spam + Honeypot

### Système Anti-Spam
- **Calcul mathématique** : Opération avec nombres de 1 à 5 (addition ou soustraction)
- **Validation stricte** : Réponse exacte obligatoire pour soumettre
- **Génération aléatoire** : Nouveau calcul à chaque chargement/soumission
- **Bouton actualiser** : Permet de générer un nouveau calcul
- **Protection honeypot** : Champ caché supplémentaire

### Fonctionnalités
- **Validation** : Temps réel côté client et serveur
- **Anti-spam** : Double protection (calcul + honeypot)
- **Feedback** : Messages de succès/erreur
- **Statut** : Témoignages soumis en "pending" par défaut
- **Sécurité** : Impossible de soumettre sans résoudre le calcul

## Interface d'Administration

### Gestion des Témoignages
- **URL** : `/admin/testimonials`
- **Fonctionnalités** : CRUD complet (existant)

### Approbations
- **URL** : `/admin/testimonial-approvals`
- **Route** : `admin.testimonial-approvals`
- **Navigation** : Sidebar admin → "Approbations"

### Fonctionnalités d'Approbation
- ✅ **Filtrage** par statut (pending, approved, rejected)
- ✅ **Recherche** par nom, message ou email
- ✅ **Compteurs** en temps réel pour chaque statut
- ✅ **Actions rapides** : Approuver, Rejeter, Restaurer
- ✅ **Vue détaillée** : Modal avec toutes les informations
- ✅ **Suppression** définitive
- ✅ **Pagination** : 10 témoignages par page

### Interface
- **Responsive** : Desktop et mobile
- **Filtres** : Boutons de filtre par statut avec compteurs
- **Actions** : Boutons contextuels selon le statut
- **Modal** : Vue détaillée avec toutes les informations
- **Validation** : Confirmation avant suppression définitive

## Utilisation

### Via l'Interface Admin
1. Connectez-vous à l'admin
2. Accédez à "Témoignages" dans la sidebar
3. Utilisez les boutons pour créer, modifier, activer/désactiver ou supprimer

### Ajouter un témoignage via Tinker
```php
php artisan tinker

App\Models\Testimonial::create([
    'name' => 'Jean Dupont',
    'message' => 'Excellent service, je recommande !',
    'rating' => 5,
    'is_active' => true
]);
```

### Créer des témoignages avec la Factory
```php
// Créer 10 témoignages aléatoires
App\Models\Testimonial::factory(10)->create();

// Créer un témoignage 5 étoiles avec photo
App\Models\Testimonial::factory()->fiveStars()->withPhoto()->create();
```

### Requêtes utiles
```php
// Récupérer tous les témoignages actifs
$testimonials = App\Models\Testimonial::active()->get();

// Récupérer les témoignages 5 étoiles
$fiveStars = App\Models\Testimonial::byRating(5)->get();

// Récupérer les témoignages récents
$recent = App\Models\Testimonial::active()
    ->orderBy('created_at', 'desc')
    ->take(8)
    ->get();
```

## Gestion des Dates

### Création
- **Date automatique** : Si aucune date n'est spécifiée, utilise la date actuelle
- **Date personnalisée** : Permet de spécifier une date et heure précises
- **Boutons prédéfinis** : Accès rapide aux dates courantes
  - Maintenant
  - Hier
  - Il y a 1 semaine
  - Il y a 1 mois
  - Effacer (utiliser date actuelle)

### Affichage
- **Format Frontend** : Date française (ex: "12 sept. 2024")
- **Format Admin** : Date relative (ex: "il y a 2 jours", "il y a 1 mois")
- **Date exacte** : Visible au survol dans l'admin (tooltip)
- **Format français** : dd/mm/yyyy à hh:mm (admin tooltip)

### Modification
- Possibilité de modifier la date d'un témoignage existant
- Conservation de la date originale si pas de modification
- Validation automatique du format de date

## Gestion des Photos

### Upload
- **Format** : JPG, PNG, GIF
- **Taille max** : 2MB
- **Stockage** : `storage/app/public/testimonials/`
- **URL publique** : `storage/testimonials/filename.jpg`

### Suppression automatique
- Les anciennes photos sont supprimées lors de la modification
- Les photos sont supprimées lors de la suppression du témoignage

## Permissions

### Accès requis
- **Authentification** : Utilisateur connecté
- **Autorisation** : Middleware 'admin'
- **Route protégée** : `auth` + `admin`

## Structure des fichiers

### Backend
- **Modèle** : `app/Models/Testimonial.php`
- **Migration** : `database/migrations/2025_09_20_050402_create_testimonials_table.php`
- **Seeder** : `database/seeders/TestimonialSeeder.php`
- **Factory** : `database/factories/TestimonialFactory.php`
- **Composant Admin** : `app/Livewire/Admin/Pages/Testimonials.php`

### Frontend
- **Vue Admin** : `resources/views/livewire/admin/pages/testimonials.blade.php`
- **Vue Public** : `resources/views/livewire/pages/home.blade.php`
- **Composant Public** : `app/Livewire/Pages/Home.php`

### Routes
- **Admin** : `GET /admin/testimonials` → `admin.testimonials`
- **Public** : Affichage intégré dans la page d'accueil

## Validation

### Règles
- **name** : Obligatoire, texte, max 255 caractères
- **message** : Obligatoire, texte, max 1000 caractères
- **rating** : Obligatoire, entier entre 1 et 5
- **photo** : Optionnelle, image, max 2MB
- **is_active** : Booléen
- **math_user_answer** : Obligatoire, entier, doit correspondre au calcul

### Messages personnalisés
Tous les messages d'erreur sont en français et adaptés au contexte.

## Protection Anti-Spam Mathématique

### Stratégie Anti-Bot
- **Champ libre** : Accepte toutes les entrées côté frontend (texte, nombres, symboles)
- **Validation stricte** : Seuls les nombres corrects passent côté serveur
- **Piège pour bots** : Les robots tentent souvent des caractères non numériques
- **Simplicité utilisateur** : Les humains entrent naturellement le bon nombre

### Fonctionnement
- **Calcul aléatoire** : Génération automatique avec nombres 1-5
- **Opérations** : Addition (+) et soustraction (-)
- **Validation côté serveur** : `is_numeric()` puis comparaison exacte
- **Sécurité** : Empêche efficacement les soumissions automatisées

### Exemples de validation
**✅ Entrées acceptées :**
- `5` (réponse correcte)
- ` 5 ` (avec espaces)
- `05` (zéro devant)

**❌ Entrées rejetées :**
- `abc` (texte)
- `5.0` (décimal)
- `5a` (nombre + texte)
- `5+0` (expression)
- `*5` (caractères spéciaux)

### Interface
- **Champ texte libre** : `type="text"` sans restrictions
- **Autocomplete off** : Évite la complétion automatique
- **Validation temps réel** : Feedback immédiat côté serveur
- **Messages clairs** : Erreurs explicites pour guider l'utilisateur
