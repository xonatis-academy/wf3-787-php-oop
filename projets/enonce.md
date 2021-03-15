# Gestion d'une boutique en ligne

Dans ce projet, il vous est demandé d'implémenter l'espace administration d'un site e-commerce.

## Création de la base de données

Créez une base de données selon les indications suivantes :

```
DATABASE : wf3_php_projet
```

```
TABLE : products (id, title, price, description, category_id)
TABLE : categories (id, name)
TABLE : orders (id, address, status)
TABLE : orders_products (id, order_id, product_id)
```

## Ajouter des données

En respectant une architecture MVC tout au long de l’examen, créez les formulaires suivants :
- Ajouter un produit
- Ajouter une categorie
- Ajouter une commande

Vous réaliserez des contrôles de saisie sur chaque champ. Les champs seront typés, validés en HTML et en PHP.

## Afficher des données

Sur une page d’accueil, vous afficherez les données suivantes :
- Liste des produits
- Liste des categories
- Liste des commandes (les commandes non traitées doivent apparaître en rouge)

## Gestion de la boutique

Ajouter un bouton pour changer l'état d'une commande (pour la passer de "non-traitée" à "traitée")