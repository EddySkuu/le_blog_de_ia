BDD Le blog de l'IA 

dbname : blog_ia

Les tables :

- users utilisateurs
    - id
    - first_name
    - last_name
    - nickname
    - password
    - email

- posts articles
    - id
    - title
    - content
    - author
    - creation_date

- commentaries commentaire
    - id
    - author
    - content
    - creation_date

- categories categories
    - id
    - categorie


Application créer sous projet Symfony

Installation de faker PHP pour créer des fausses infos et fixtures bundle

- Mise en place d'un User avec make:user et donc modification du security.yaml en déclarant un provider qui permet de récupérer un user dans la BDD en fonction d'une propriété -> ici l'email qui sera l'identifiant

- Mise en place d'un User dans les fixtures, on lui set un plainPassword que l'on encode dans un EntityListener

- mise en place de slug dans Post.php (https://developer.mozilla.org/fr/docs/Glossary/Slug) et repository du cocur slugify : https://github.com/cocur/slugify
    Un Slug est la partie d'identification unique d'une adresse Web, généralement à la fin de l'URL. Dans le contexte de MDN, c'est la partie de l'URL qui suit "<locale>/docs/".

- Configuration de VichUploader pour les fichiers à télécharger