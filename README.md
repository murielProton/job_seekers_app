Introduction :
Au début de juillet 2020, je voulais créer un logiciel qui permette à des chercheur d'emplois tels que moi, d'organiser leurs candidatures. Une application leur permettrai d'avoir une vision claire des relances à faire, d'enregistrer leurs candidatures, de noter les contacts associés à cette dernière, de travailler son réseau, et bien d'autres choses encore.

Choix du Framework :
J'ai choisie Symfony, car c'est un framework fiable, avec une forte communauté et un documentation fournie. J'avais besoin de renouer avec Symfony, car je ne l'avais plus pratiqué depuis un mois déjà. Cet outils permet, entre autre, en une seule ligne de commande de créer l'intégralité d'un CRUD. J'ai donc un résultat en MVC fiable, et rapide. L'important reste l'utilisateur. Je devais pouvoir présenter rapidement un travail fonctionnel, pour les recruteurs. Mais surtout je voulais rencontrer d'autres personnes en recherche d'emplois et leur poser des question quant à l'experience utilisateur de ce logiciel. Ce projet devait rapidement servir de suport à ces questions.

Administration d'un questionnaire à des demandeurs d'emploi :
La conclusion rapide de ma confrontation avec trois utilisateurs potentiels est : qu'il faut un site internet et non un logiciel. De ce fait ma vision minimaliste avec aucune création de compte utilisateur doit être revue.

Difficultés rencontrées :
Je rencontre des difficultés également sur l'articulation des différents objets entre eux. C'est le désavantage à travailler seule, et d'être peu expérimentée.Je n'ai pas la possibilité de confronter mes idées à un autre développeur. Cela me bloque dans l'application de certaines solutions.
Egalement, la plus part de mon temps doit être consacré à la recherche d'un emploi, ce qui m'a laissé peut de temps pour ce projet depuis mie Août 2020, comme en témoigne mes commits.

Comment le faire foctionner sur votre machine :
1. copier le dossier dans votre workspace
2. dans votre navigateur WEB tapez l'adresse suivante : http://localhost/job_seekers_app/
Vous tomberez alors sur l'index du projet. Dirigez vous dans cet index grâce aux flèches de votre moteur de recherche WEB

Index du projet :
- Parent Directory
- .env -> Fichier contenant les valeurs par défauts des variables d'environnement dont l'application à besoin
- .env.test -> Fichier qui défini les varibles d'environnement
- .git/ -> Dossier regrouppant tous les fichiers deffinissant les push, les pull de commits GIT 
- .gitignore -> Fichier faisant la liste de tous les documents à ignorer lors des push et des pull
- .project -> Fichier décrivant le projet
- LICENSE -> Fichier décrivant les droits d'utilisation du projet
- README.md -> Fichier relatant l'histoire du projet
- bin/ -> Dossier contenant les dossiers console et phpunit
- composer.json -> Fichier déffinissant Json
- composer.lock -> Fichier qui relate les dépendances de ce projet et indque qu'il a besoin de composer pour fonctionner.
- config/ -> Dossier contenant les dossiers Parent Directory, bundles.php, packages/, routes/ et services.yaml
- documents/ -> Dossier contenant des informations à destination des développeurs
- migrations/ -> Dossier contenant les migrations
- phpunit.xml.dist
- public/ -> Dossier contenant la CSS pour la mise en page
- src/ -> Dossier contenant les dossier symfony tel que dans le projet côté éditeur de code ( développeur )
- symfoy.lock -> Fichier deffinissant composer, doctrine, ...
- templates/ -> Dossier contenant les liens tels que conçuts pour l'utilisateur
- tests/ -> Dossier contenant bootstrap.php dépendance pour la mise en page CSS
- translations/ -> mène au .gitignore


Idée de développement pour revoir le projet :
Je pense repenser le projet avec une architecture de micro-services.
1. Connection Déconnection création de compte avec plusieurs rôles possibles ( développeur, administrateur, utilisateur = demandeurs d'emploi, ...)
2. Système de documentation pour les développeur en lien avec la base de donnée développeur
3. Formulaire questionnaire d'amélioration du site à destination des utilisateurs  en lien avec la base de donnée utilistateur
4. Entité : annonces
5. Entité : CV
6. Entité : Lettre||mail de motivation
7. Entité : personne connues
8. Entité : entreprise
9. Entité : quandidature
10. Entité : entretien
11. Entité : réseau ou répertoire
12. Entité : calendrier
