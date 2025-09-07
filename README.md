# Fonctionnalités du projet

1️⃣ **Mise en place du projet et génération initiale**

- Installer Laravel, Livewire, Alpine.js et Jetstream.  
- Générer les modèles initiaux : Produit, Variante, Panier, Image.  
- Créer les migrations, factories et seeders pour remplir la base de données avec des données de test.  

2️⃣ **Vitrine et affichage des produits**

- Concevoir une page vitrine avec la liste des produits.  
- Gérer correctement le formatage de l’argent/de la devise à l’aide des objets Money.  
- Concevoir des pages produits détaillées.  
- Sélecteur dynamique d’images produits (cliquer pour agrandir les images avec Alpine.js).  

3️⃣ **Fonctionnalités du panier**

- Ajouter au panier avec validation.  
- Sauvegarder le panier et ses articles dans la base de données.  
- Afficher une notification de succès lorsqu’un article est ajouté.  
- Afficher le panier dans la navigation avec le compteur d’articles.  
- Page panier pour consulter le contenu.  
- Supprimer des articles du panier et fusionner les quantités des variantes.  
- Augmenter/diminuer les quantités des articles.  
- Afficher les prix et le total du panier.  
- Migration du panier de session vers le panier utilisateur après connexion.  

4️⃣ **Intégration des paiements (Stripe)**

- Configurer un compte Stripe et installer Laravel Cashier.  
- Écouter les webhooks Stripe en local avec Stripe CLI.  
- Activer la collecte automatique des taxes avec Stripe.  
- Créer une session de paiement avec Stripe Checkout.  
- Collecter l’adresse de livraison lors du paiement si nécessaire.  
- Gérer l’objet de succès de paiement et traiter le webhook.  

**Problèmes existants**

- Vider le panier après un paiement réussi.  
- Préparer une page de confirmation de commande après paiement.  
- Envoyer un email de confirmation de commande au client.  
- Afficher les tableaux en Markdown dans les emails.  
- Ajouter un bouton dans l’email pour consulter les détails de la commande.  
- Créer une page de détails de commande par utilisateur.  
- Envoyer un email de rappel pour panier abandonné aux utilisateurs inactifs.  
