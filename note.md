

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

17 twig tableau asso

->controller:



```php
  public function persos()

  {

​    return $this->render('personnage/persos.html.twig',[

​      "pseudo" => "toto",

​      "age" => 25,

​      "carac" => [

​        "force" => 3,

​        "agi" => 2,

​        "intel" => 3

​      ]

​    ]);

  }
```

vue:

```twig
{% block body %}

    <div>Pseudo: {{ pseudo }}</div>

    <div>Age: {{ age }}</div>

    <div>Force: {{ carac.force }}</div>

    <div>Agilité: {{ carac.agi }}</div>

    <div>Intelligence: {{ carac.intel }}</div>

{% endblock %}
```

18. Twig et routes.

    dans le fichier menu.html.twig. On utilise le name de la route créer dans le controller. Cela de pouvoir changer le chemin sans tout modifier. 

Pour les liens utiliser cette méthode pour le href

```
  <a class="navbar-brand" href="{{ path("accueil") }}">Le site</a>
```

19.fichier "client": image et css

fivhier persos.html.twig:

<div><img src="{{ asset("images/personnages/Milo.png")}}"></div>

<div><img src="/images/personnages/Marc.png"> </div>



symfony sait que quand un fichier client doit être envoyé il doit aller le trouver dans "public"

dossier public/css:

main.css

```css
body{

  background: red;

}
```

le relier à base.html.twig:

<link rel="stylesheet" href="{{ asset("css/main.css")}}">



20 Lister les persos sous forme d'un tableau

persos.html.twig

```twig


{% block body %}

<table class="table">

  <tr class="thread-dark">

​    <th>Image</th>

​    <th>Nom</th>

​    <th>Age</th>

​    <th>Sexe</th>

​    <th>Force</th>

​    <th>Agilité</th>

​    <th>Intelligence</th>

  </tr>

  {% for player in players %}

​    <tr>

​      <td><img src="{{asset('images/personnages/' ~ player.pseudo ~ '.png')}}"</td>

​      <td>{{ player.pseudo }}</td>

​      <td>{{ player.age }}</td>

​      <td>

​        {% if player.sexe %}

​          Homme

​        {% else %}

​          Femme

​        {% endif %}

​      </td>

​      <td>{{ player.carac.force }}</td>

​      <td>{{ player.carac.agi }}</td>

​      <td>{{ player.carac.intel }}</td>

​      





​    </tr>

  {% endfor %}

</table>



{% endblock %}
```

PersoController:

pub

```php
lic function persos()

  {

​    $perso1 = [

​      "pseudo" => "Marc",

​      "age" => 52,

​      "sexe" => true,

​      "carac" => [

​        "force" => 3,

​        "agi" => 2,

​        "intel" => 3

​        ]

​      ];

​    

​      $perso2 = [

​        "pseudo" => "Milo",

​        "age" => 12,

​        "sexe" => true,

​        "carac" => [

​          "force" => 6,

​          "agi" => 7,

​          "intel" => 1

​          ]

​        ];



​      $perso3 = [

​        "pseudo" => "Tya",

​        "age" => 25,

​        "sexe" => false,

​        "carac" => [

​          "force" => 3,

​          "agi" => 9,

​          "intel" => 10

​          ]

​        ];

​      

​      $players = [

​        "j1" => $perso1,

​        "j2" => $perso2,

​        "j3" => $perso3

​      ];

​    return $this->render('personnage/persos.html.twig',[

​      "players" => $players

​    ]);

  }

}
```

21. **<u>Passage en POO:</u>**

Personnage.php dans entity:



```php
<?php



namespace App\Entity;





class Personnage{



  public $pseudo;

  public $age;

  public $sexe;

  public $carac = [];



  public static $personnages=[];



  public function __construct($pseudo, $age, $sexe, $carac){

​    $this->pseudo = $pseudo;

​    $this->age = $age;

​    $this->sexe = $sexe;

​    $this->carac = $carac;

​    self::$personnages[] = $this;

  }



  public static function creerPersonnages(){

​    $p1 = new Personnage("Marc", 52, true, [

​        "force" => 3,

​        "agi" => 2,

​        "intel" => 3

​      ]);



​    $p2 = new Personnage("Milo", 63, true, [

​          "force" => 8,

​          "agi" => 1,

​          "intel" => 6

​        ]);

​    $p3 = new Personnage("Tya", 32, false, [

​          "force" => 8,

​          "agi" => 3,

​          "intel" => 1

​        ]);  

  }

}
```

controller:

```
  public function persos()

  {

​    Personnage::creerPersonnages();

​    

​    return $this->render('personnage/persos.html.twig',[

​      "players" => Personnage::$personnages

​    ]);

  }

}
```

22. GET:

    perso.html.twig:

    permet de rendre le lien cliquable avec la route créée dans le routeur.

    ```
    <td><a href="{{ path('afficher_personnage', {'pseudo' : player.pseudo}) }}">{{ player.pseudo }}</td>
    ```

    pseudo lié par {pseudo} dans le controller et {'pseudo' : player.pseudo}

    controller:

    ```
        /**
    
       \* @Route("/persos/{pseudo}", name="afficher_personnage")
    
       */
    
      public function afficherPerso($pseudo)
    
      {
    
    ​    Personnage::creerPersonnages();
    
    ​    
    
    ​    return $this->render('personnage/perso.html.twig',[
    
    ​      "pseudo" => $pseudo
    
    ​    ]);
    
      }
    
    
    
    }
    ```

    