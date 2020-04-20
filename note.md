# Note pour la première application 

<u>Initiation du projet 1:</u>

```
composer create-project symfony/website-skeleton projet1Perso
```

<u>création première page</u>

->créer un controller:

```
bin/console make:controller
```

créer deux fichiers prérempli. Un dans un controller et un dans template.

<

```php
?php



namespace App\Controller;



use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\Routing\Annotation\Route;



class PersonnageController extends AbstractController

{

  /**

   \* @Route("/personnage", name="personnage")

   */

  public function index()

  {

​    return $this->render('personnage/index.html.twig', [

​      'controller_name' => 'PersonnageController',

​    ]);

  }

}
```

la route /personnage:

quand l'utilisateur va sur cette route alors la fonction en dessous est lancée.



16 twig

fichier base.html.twig

installation du starter bootstrap et javascript

```
<!DOCTYPE html>

<html>

  <head>

        <meta charset="UTF-8">

​    <title>{% block title %}Welcome!{% endblock %}</title>

​    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

​    {% block stylesheets %}{% endblock %}

  </head>

  <body>

​    {% block body %}{% endblock %}

​    {% block javascripts %}{% endblock %}

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  </body>

</html>
```

