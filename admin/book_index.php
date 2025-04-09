<?php

include_once "./partials/top.php";

?>
<div class="title-space-between">
    <h4>Liste des livres</h4>
    <a href="book_new_form.php" title="Ajouter un nouveau livre" role="button"><i class="light-icon-circle-plus"></i>Nouveau livre</a>
</div>
<table class="striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Titre</th>
            <th>Résumé</th>
            <th>Année de publication</th>
            <th>Couverture</th>
            <th>Emprunté le</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>JavaScript - The Definitive Guide (7th ed.)</td>
            <td>Ce livre est une ressource essentielle pour tout développeur JavaScript, qu'il soit débutant ou expérimenté. Il couvre en profondeur le langage JavaScript, son exécution dans les navigateurs et les environnements serveur. Cette édition met à jour les nouvelles fonctionnalités d'ES6+, la programmation asynchrone, et les API modernes. C'est un guide complet pour comprendre JavaScript de manière détaillée et avancée.</td>
            <td>2020</td>
            <td>NULL</td>
            <td>Disponible</td>
            <td><a href="book_show.php?id=1" title="Voir le détail de ce livre"><i role="button" class="light-icon-float-left"></i></a><a href="book_edit_form.php?id=1" title="Modifier ce livre" class="btn btn-secondary btn-sm me-1"><i role="button" class="light-icon-pencil"></i></a><a href="book_delete_form.php?id=1" title="Supprimer ce livre" class="btn btn-danger btn-sm"><i role="button" class="light-icon-trash"></i></a></td>
        </tr>
        <tr>
            <td>2</td>
            <td>Python in a Nutshell (3rd ed.)</td>
            <td>Ce guide de référence offre une couverture détaillée de Python, allant des bases du langage aux concepts avancés. Il explore les bibliothèques standard, les meilleures pratiques de développement et les applications courantes en science des données, en automatisation et en développement web. Indispensable pour les développeurs cherchant une ressource concise et complète sur Python.</td>
            <td>2017</td>
            <td>NULL</td>
            <td>Disponible</td>
            <td><a href="book_show.php?id=2" title="Voir le détail de ce livre"><i role="button" class="light-icon-float-left"></i></a><a href="book_edit_form.php?id=2" title="Modifier ce livre" class="btn btn-secondary btn-sm me-1"><i role="button" class="light-icon-pencil"></i></a><a href="book_delete_form.php?id=2" title="Supprimer ce livre" class="btn btn-danger btn-sm"><i role="button" class="light-icon-trash"></i></a></td>
        </tr>
        <tr>
            <td>3</td>
            <td>Learning React (2nd ed.)</td>
            <td>Un guide pratique pour comprendre React et son écosystème. Il explique les concepts fondamentaux tels que les composants, les hooks, le state management et le Virtual DOM. Cette édition inclut les nouvelles fonctionnalités de React, notamment les hooks et le suspense. Idéal pour les développeurs souhaitant maîtriser la création d'interfaces dynamiques et réactives.</td>
            <td>2020</td>
            <td>NULL</td>
            <td>Disponible</td>
            <td><a href="book_show.php?id=3" title="Voir le détail de ce livre"><i role="button" class="light-icon-float-left"></i></a><a href="book_edit_form.php?id=3" title="Modifier ce livre" class="btn btn-secondary btn-sm me-1"><i role="button" class="light-icon-pencil"></i></a><a href="book_delete_form.php?id=3" title="Supprimer ce livre" class="btn btn-danger btn-sm"><i role="button" class="light-icon-trash"></i></a></td>
        </tr>
        <tr>
            <td>4</td>
            <td>Fluent Python (2nd ed.)</td>
            <td>Un ouvrage avancé qui enseigne aux développeurs comment écrire un code Python efficace et idiomatique. Il couvre les structures de données, les classes, la programmation fonctionnelle et asynchrone. Cette seconde édition intègre les dernières évolutions du langage et propose des conseils pratiques pour améliorer la performance et la lisibilité du code.</td>
            <td>2022</td>
            <td>NULL</td>
            <td>Disponible</td>
            <td><a href="book_show.php?id=4" title="Voir le détail de ce livre"><i role="button" class="light-icon-float-left"></i></a><a href="book_edit_form.php?id=4" title="Modifier ce livre" class="btn btn-secondary btn-sm me-1"><i role="button" class="light-icon-pencil"></i></a><a href="book_delete_form.php?id=4" title="Supprimer ce livre" class="btn btn-danger btn-sm"><i role="button" class="light-icon-trash"></i></a></td>
        </tr>
        <tr>
            <td>5</td>
            <td>Java: A Beginner's Guide (9th ed.)</td>
            <td>Ce livre est une introduction complète au langage Java, abordant les bases de la syntaxe, les structures de contrôle, la POO et les nouvelles fonctionnalités de Java 17. Chaque chapitre comprend des exercices pratiques pour renforcer l'apprentissage. Une ressource précieuse pour les débutants souhaitant apprendre Java de manière progressive et efficace.</td>
            <td>2022</td>
            <td>NULL</td>
            <td>Disponible</td>
            <td><a href="book_show.php?id=5" title="Voir le détail de ce livre"><i role="button" class="light-icon-float-left"></i></a><a href="book_edit_form.php?id=5" title="Modifier ce livre" class="btn btn-secondary btn-sm me-1"><i role="button" class="light-icon-pencil"></i></a><a href="book_delete_form.php?id=5" title="Supprimer ce livre" class="btn btn-danger btn-sm"><i role="button" class="light-icon-trash"></i></a></td>
        </tr>
        <tr>
            <td>6</td>
            <td>Introduction to Theoretical Computer Science (1st ed.)</td>
            <td>Une exploration approfondie des fondements de l'informatique théorique, couvrant les automates, la complexité algorithmique, la logique computationnelle et la cryptographie. Ce livre fournit une base solide pour comprendre les principes fondamentaux des systèmes informatiques et des algorithmes.</td>
            <td>2022</td>
            <td>NULL</td>
            <td>Disponible</td>
            <td><a href="book_show.php?id=6" title="Voir le détail de ce livre"><i role="button" class="light-icon-float-left"></i></a><a href="book_edit_form.php?id=6" title="Modifier ce livre" class="btn btn-secondary btn-sm me-1"><i role="button" class="light-icon-pencil"></i></a><a href="book_delete_form.php?id=6" title="Supprimer ce livre" class="btn btn-danger btn-sm"><i role="button" class="light-icon-trash"></i></a></td>
        </tr>
        <tr>
            <td>7</td>
            <td>Head First Design Patterns (2nd ed.)</td>
            <td>Cet ouvrage rend les design patterns accessibles grâce à une approche pédagogique et interactive. Il explique comment appliquer les patterns de conception pour rendre le code plus flexible, réutilisable et maintenable. Une ressource essentielle pour les développeurs souhaitant améliorer leurs compétences en conception logicielle.</td>
            <td>2020</td>
            <td>NULL</td>
            <td>Disponible</td>
            <td><a href="book_show.php?id=7" title="Voir le détail de ce livre"><i role="button" class="light-icon-float-left"></i></a><a href="book_edit_form.php?id=7" title="Modifier ce livre" class="btn btn-secondary btn-sm me-1"><i role="button" class="light-icon-pencil"></i></a><a href="book_delete_form.php?id=7" title="Supprimer ce livre" class="btn btn-danger btn-sm"><i role="button" class="light-icon-trash"></i></a></td>
        </tr>
        <tr>
            <td>8</td>
            <td>Grokking Algorithms</td>
            <td>Un livre illustré et interactif qui explique les concepts clés des algorithmes de manière intuitive. Il aborde des notions comme le tri, la recherche, la récursivité et les graphes, en les rendant accessibles aux débutants. Idéal pour ceux qui veulent apprendre les algorithmes sans trop de formalismes mathématiques.</td>
            <td>2016</td>
            <td>NULL</td>
            <td>Disponible</td>
            <td><a href="book_show.php?id=8" title="Voir le détail de ce livre"><i role="button" class="light-icon-float-left"></i></a><a href="book_edit_form.php?id=8" title="Modifier ce livre" class="btn btn-secondary btn-sm me-1"><i role="button" class="light-icon-pencil"></i></a><a href="book_delete_form.php?id=8" title="Supprimer ce livre" class="btn btn-danger btn-sm"><i role="button" class="light-icon-trash"></i></a></td>
        </tr>
        <tr>
            <td>9</td>
            <td>Large Scale Apps with Svelte and TypeScript</td>
            <td>Un guide détaillé sur le développement d'applications évolutives avec Svelte et TypeScript. Il couvre la structuration du code, la gestion des états et les meilleures pratiques pour construire des applications performantes et maintenables.</td>
            <td>2023</td>
            <td>NULL</td>
            <td>Disponible</td>
            <td><a href="book_show.php?id=9" title="Voir le détail de ce livre"><i role="button" class="light-icon-float-left"></i></a><a href="book_edit_form.php?id=9" title="Modifier ce livre" class="btn btn-secondary btn-sm me-1"><i role="button" class="light-icon-pencil"></i></a><a href="book_delete_form.php?id=9" title="Supprimer ce livre" class="btn btn-danger btn-sm"><i role="button" class="light-icon-trash"></i></a></td>
        </tr>
        <tr>
            <td>10</td>
            <td>Svelte Succinctly</td>
            <td>Un livre concis qui introduit Svelte, un framework JavaScript innovant. Il couvre les concepts fondamentaux comme les composants, la réactivité et la gestion des événements, permettant aux développeurs d'exploiter pleinement Svelte pour créer des applications web modernes.</td>
            <td>2023</td>
            <td>NULL</td>
            <td>Disponible</td>
            <td><a href="book_show.php?id=10" title="Voir le détail de ce livre"><i role="button" class="light-icon-float-left"></i></a><a href="book_edit_form.php?id=10" title="Modifier ce livre" class="btn btn-secondary btn-sm me-1"><i role="button" class="light-icon-pencil"></i></a><a href="book_delete_form.php?id=10" title="Supprimer ce livre" class="btn btn-danger btn-sm"><i role="button" class="light-icon-trash"></i></a></td>
        </tr>
        <tr>
            <td>11</td>
            <td>Python in a Nutshell (4th ed.)</td>
            <td>Une mise à jour du guide de référence sur Python, intégrant les dernières évolutions du langage et des bibliothèques. Ce livre est conçu pour être une ressource incontournable pour les développeurs souhaitant une maîtrise approfondie de Python.</td>
            <td>2023</td>
            <td>NULL</td>
            <td>Disponible</td>
            <td><a href="book_show.php?id=11" title="Voir le détail de ce livre"><i role="button" class="light-icon-float-left"></i></a><a href="book_edit_form.php?id=11" title="Modifier ce livre" class="btn btn-secondary btn-sm me-1"><i role="button" class="light-icon-pencil"></i></a><a href="book_delete_form.php?id=11" title="Supprimer ce livre" class="btn btn-danger btn-sm"><i role="button" class="light-icon-trash"></i></a></td>
        </tr>
        <tr>
            <td>12</td>
            <td>Learning DevOps (2nd ed.)</td>
            <td>Une introduction aux concepts fondamentaux du DevOps, incluant l'intégration et le déploiement continu, l'automatisation des infrastructures et les conteneurs. Ce livre propose des études de cas et des exemples pratiques pour faciliter l'apprentissage.</td>
            <td>2022</td>
            <td>NULL</td>
            <td>Disponible</td>
            <td><a href="book_show.php?id=12" title="Voir le détail de ce livre"><i role="button" class="light-icon-float-left"></i></a><a href="book_edit_form.php?id=12" title="Modifier ce livre" class="btn btn-secondary btn-sm me-1"><i role="button" class="light-icon-pencil"></i></a><a href="book_delete_form.php?id=12" title="Supprimer ce livre" class="btn btn-danger btn-sm"><i role="button" class="light-icon-trash"></i></a></td>
        </tr>
        <tr>
            <td>13</td>
            <td>Cybersecurity for Dummies (2nd ed.)</td>
            <td>Un guide simple et accessible pour comprendre les principes de la cybersécurité, les menaces courantes et les meilleures pratiques de protection. Il couvre également les concepts de cryptographie, de gestion des identités et de prévention des attaques.</td>
            <td>2022</td>
            <td>NULL</td>
            <td>Disponible</td>
            <td><a href="book_show.php?id=13" title="Voir le détail de ce livre"><i role="button" class="light-icon-float-left"></i></a><a href="book_edit_form.php?id=13" title="Modifier ce livre" class="btn btn-secondary btn-sm me-1"><i role="button" class="light-icon-pencil"></i></a><a href="book_delete_form.php?id=13" title="Supprimer ce livre" class="btn btn-danger btn-sm"><i role="button" class="light-icon-trash"></i></a></td>
        </tr>
        <tr>
            <td>14</td>
            <td>Unlock PHP 8: From Basic to Advanced</td>
            <td>Un livre qui couvre PHP 8 en profondeur, expliquant ses nouvelles fonctionnalités, ses performances améliorées et ses meilleures pratiques pour le développement web. Il offre un apprentissage progressif allant des bases aux concepts avancés.</td>
            <td>2024</td>
            <td>NULL</td>
            <td>Disponible</td>
            <td><a href="book_show.php?id=14" title="Voir le détail de ce livre"><i role="button" class="light-icon-float-left"></i></a><a href="book_edit_form.php?id=14" title="Modifier ce livre" class="btn btn-secondary btn-sm me-1"><i role="button" class="light-icon-pencil"></i></a><a href="book_delete_form.php?id=14" title="Supprimer ce livre" class="btn btn-danger btn-sm"><i role="button" class="light-icon-trash"></i></a></td>
        </tr>
        <tr>
            <td>15</td>
            <td>Web Development with Node and Express (2nd ed.)</td>
            <td>Un guide pratique pour apprendre à construire des applications web performantes avec Node.js et Express. Il couvre l'authentification, les bases de données, la gestion des sessions et les API REST.</td>
            <td>2019</td>
            <td>NULL</td>
            <td>Disponible</td>
            <td><a href="book_show.php?id=15" title="Voir le détail de ce livre"><i role="button" class="light-icon-float-left"></i></a><a href="book_edit_form.php?id=15" title="Modifier ce livre" class="btn btn-secondary btn-sm me-1"><i role="button" class="light-icon-pencil"></i></a><a href="book_delete_form.php?id=15" title="Supprimer ce livre" class="btn btn-danger btn-sm"><i role="button" class="light-icon-trash"></i></a></td>
        </tr>
    </tbody>
</table>
<?php

include_once "./partials/bottom.php";

?>
