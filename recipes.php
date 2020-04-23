
<!DOCTYPE html>
<html lang="fr" dir="ltr" class=" maj-recipe-page">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>Modification de la recette</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/jquery.mobile-1.4.5.min.js"></script>

    <script src="js/scienceburgers.js"></script>
  </head>


    <body>
      <header>
        <div class="logo"><a href="./"></a></div>
              <a id="reset" href="reset.php" title="Rétablit les recettes et valeurs de stock par défaut.">RESET</a> 
      </header>

  <main>
    <section class="sec-recipes">
      <h1>Modification de la recette</h1>
      <h2>Le Turing</h2>
      
    <div class="recipe" style="">
    <ul class="recipe">

                
            <li class="ingredient">pain                <span class='quantity'>(x1)</span>
            </li>
            
                
            <li class="ingredient">salade                <span class='quantity'>(x1)</span>
            </li>
            
                
            <li class="ingredient">tomate                <span class='quantity'>(x1)</span>
            </li>
            
                
            <li class="ingredient">steack haché                <span class='quantity'>(x1)</span>
            </li>
            
                
            <li class="ingredient">oignons                <span class='quantity'>(x1)</span>
            </li>
            
                
            <li class="ingredient">mayo                <span class='quantity'>(x1)</span>
            </li>
            
                
            <li class="ingredient">ketchup                <span class='quantity'>(x1)</span>
            </li>
            
                
            <li class="ingredient">mimolette                <span class='quantity'>(x1)</span>
            </li>
            
            
    </ul>
    </div>


      <form id="form-recipe" action="recipes.php" method="POST">
      <input type="hidden" name="maj" value=True>
      <input type="hidden" name="burgerId" value="1">
      
      <label for="ing-select">Ingrédient</label>
      <select id="ing-select" class="ingredients" name="ingId">
                    <option value="1">Pain</option>
                    <option value="2">Salade</option>
                    <option value="3">Tomate</option>
                    <option value="4">Cheddar</option>
                    <option value="5">Steack Haché</option>
                    <option value="6">Cornichons</option>
                    <option value="7">émincé De Poulet</option>
                    <option value="8">Oignons</option>
                    <option value="9">Sauce Uranium</option>
                    <option value="10">Mayo</option>
                    <option value="11">Ketchup</option>
                    <option value="12">Mimolette</option>
                    <option value="13">Steak Végé</option>
                    <option value="14">Fêta</option>
                    <option value="15">Sauce Blanche</option>
                    <option value="16">Bacon</option>
              </select>
      <label for="quantity">Quantité</label>
      <select class="quantity" name="quantity">
        <option value=0> 0 (Supprimer l'ingrédient)</option><option value=1 selected >1</option><option value=2  >2</option><option value=3  >3</option><option value=4  >4</option><option value=5  >5</option>      </select>
      <a class="button submit"  onclick="document.getElementById('form-recipe').submit();">VALIDER</a>
      <a class="button back" href="./" title="">Retour à la page d'accueil</a>
    </section>
</main>
  </body>
</html>
