

<?php 


if(isset( $_POST["majStock"])){

    if($_POST["majStock"])=="false"){
 echo "<div class='message OK ' style='right: -300px;'>Le stock a bien été mis à jour</div>";
    }
    else{
        echo  "<div class='message' style='right: -300px;'>stocks de salade insuffisants</div>";
    }


   
   
}

if( isset( $_POST["burgerId"]) || isset( $_POST["action"]) ){


    echo "<h1>burger numro "+$_POST["burgerId"]+"</h1>
    <h3>"+$_POST["action"]+"  </h3>  ";

}

?>
<!DOCTYPE html>
<html lang="fr" dir="ltr" class="">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>Bracket Burgers</title>
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
      <section id="sec-burgers" class="burgers">
        <h1>Burgers</h1>
        <div class="burgers-list">
                    
            <article class="burger">
              <!-- Le nom du burger -->
              <h1>Le <span>Turing</span></h1>
              <!-- L'image du burger -->
              <img  src="img/turing.png" 
                    alt="Logo d'illustration utilisant la photo de Turing"
              >
              <!-- La description du burger -->
              <p class="description">
                Sa recette exacte est une énigme mais son goût savoureux n'est un secret pour personne !              </p>
              
              
    <div class="recipe" style="display:none;">
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

              <!-- Les boutons d'action -->
              <div class="actions" style="display:none;">
                  <!-- Modification de la recette 
                  Lien qui permet de se rendre sur la page recipes.php en indiquant la variable GET 'burgerId' et en la renseignant avec l'id du burger -->
                  <a class="button makeIt" href="recipes.php?burgerId=1">Modifier la recette</a>
                  <!-- Fabrication du burger
                  Formulaire qui permet d'envoyer les variables POST 'burgerId' avec la valeur de l'id du burger et la variable POST 'action' avec la valeur 'make' -->
                  <form id="form-1" action="./" method="POST">
                    <input  type="hidden" name="burgerId" value="1">
                    <input  type="hidden" name="action" value="make">
                    <!-- Le lien ci-dessous permet de valider le formulaire comme le ferait un bouton "submit"-->
                    <a class="button makeIt"  onclick="document.getElementById('form-1').submit();">FABRIQUER</a>
                  </form>
              </div> <!-- Fermeture de la div des boutons d'action -->
            </article> <!-- Fermeture de la balise article -->
                    
            <article class="burger">
              <!-- Le nom du burger -->
              <h1>Le <span>Marie Curie</span></h1>
              <!-- L'image du burger -->
              <img  src="img/curie.png" 
                    alt="Logo d'illustration utilisant la photo de Marie Curie"
              >
              <!-- La description du burger -->
              <p class="description">
                Un burger au goût atomique avec ses saveurs franco-polonaises !              </p>
              
              
    <div class="recipe" style="display:none;">
    <ul class="recipe">

                
            <li class="ingredient">pain                <span class='quantity'>(x1)</span>
            </li>
            
                
            <li class="ingredient">salade                <span class='quantity'>(x2)</span>
            </li>
            
                
            <li class="ingredient">tomate                <span class='quantity'>(x2)</span>
            </li>
            
                
            <li class="ingredient">cornichons                <span class='quantity'>(x1)</span>
            </li>
            
                
            <li class="ingredient">sauce uranium                <span class='quantity'>(x2)</span>
            </li>
            
                
            <li class="ingredient">steak végé                <span class='quantity'>(x1)</span>
            </li>
            
            
    </ul>
    </div>

              <!-- Les boutons d'action -->
              <div class="actions" style="display:none;">
                  <!-- Modification de la recette 
                  Lien qui permet de se rendre sur la page recipes.php en indiquant la variable GET 'burgerId' et en la renseignant avec l'id du burger -->
                  <a class="button makeIt" href="recipes.php?burgerId=2">Modifier la recette</a>
                  <!-- Fabrication du burger
                  Formulaire qui permet d'envoyer les variables POST 'burgerId' avec la valeur de l'id du burger et la variable POST 'action' avec la valeur 'make' -->
                  <form id="form-2" action="./" method="POST">
                    <input  type="hidden" name="burgerId" value="2">
                    <input  type="hidden" name="action" value="make">
                    <!-- Le lien ci-dessous permet de valider le formulaire comme le ferait un bouton "submit"-->
                    <a class="button makeIt"  onclick="document.getElementById('form-2').submit();">FABRIQUER</a>
                  </form>
              </div> <!-- Fermeture de la div des boutons d'action -->
            </article> <!-- Fermeture de la balise article -->
                    
            <article class="burger">
              <!-- Le nom du burger -->
              <h1>Le <span>Al-Khwârizmî</span></h1>
              <!-- L'image du burger -->
              <img  src="img/al-khwarizmi.png" 
                    alt="Logo d'illustration utilisant la photo de Al-Khwârizmî"
              >
              <!-- La description du burger -->
              <p class="description">
                Délicieux burger aux saveur de l'Orient ! 
if (you['love_burgers']) then manger() else sortir()              </p>
              
              
    <div class="recipe" style="display:none;">
    <ul class="recipe">

                
            <li class="ingredient">pain                <span class='quantity'>(x1)</span>
            </li>
            
                
            <li class="ingredient">salade                <span class='quantity'>(x1)</span>
            </li>
            
                
            <li class="ingredient">tomate                <span class='quantity'>(x1)</span>
            </li>
            
                
            <li class="ingredient">cheddar                <span class='quantity'>(x1)</span>
            </li>
            
                
            <li class="ingredient">émincé de poulet                <span class='quantity'>(x2)</span>
            </li>
            
                
            <li class="ingredient">oignons                <span class='quantity'>(x1)</span>
            </li>
            
                
            <li class="ingredient">sauce blanche                <span class='quantity'>(x1)</span>
            </li>
            
            
    </ul>
    </div>

              <!-- Les boutons d'action -->
              <div class="actions" style="display:none;">
                  <!-- Modification de la recette 
                  Lien qui permet de se rendre sur la page recipes.php en indiquant la variable GET 'burgerId' et en la renseignant avec l'id du burger -->
                  <a class="button makeIt" href="recipes.php?burgerId=3">Modifier la recette</a>
                  <!-- Fabrication du burger
                  Formulaire qui permet d'envoyer les variables POST 'burgerId' avec la valeur de l'id du burger et la variable POST 'action' avec la valeur 'make' -->
                  <form id="form-3" action="./" method="POST">
                    <input  type="hidden" name="burgerId" value="3">
                    <input  type="hidden" name="action" value="make">
                    <!-- Le lien ci-dessous permet de valider le formulaire comme le ferait un bouton "submit"-->
                    <a class="button makeIt"  onclick="document.getElementById('form-3').submit();">FABRIQUER</a>
                  </form>
              </div> <!-- Fermeture de la div des boutons d'action -->
            </article> <!-- Fermeture de la balise article -->
                </div> <!-- Fermeture de la div burgers-list -->
      </section> <!-- fermeture de la section burgers -->
  
      <!-- Section présentant les stocks d'ingrédients --> 
      <section id="sec-stock" class="stock">
        
  <main>
    <section id="sec-stock">
      <h1>Stock d'ingrédients</h1>
      
            <!-- Le formulaire de mise à jour du stock -->
      <form id="stock-form" action="index.php" method="POST" >
        <input type="hidden" name="majStock" value=True>
        <div class="tables">
                    <!-- Création d'un tableau d'ingrédients --> 
            <table class="">
            <!-- Les colonnes du tableau -->
            <thead><tr><th>Ingrédient</th><th class="stock">Stock</th><th colspan="2">Modifier</th></tr></thead>
              
                          <!-- Les lignes du tableau sont remplies à l'aide des informations contenues dans la variable $ing (pour chaque résultat de la requête) -->
              <tr>
                
                <!-- Le nom de l'ingrédient -->
                <td class="ing">pain</td>
                
                <!-- La quantité en stock -->
                <!-- Ici on utilise plusieurs champs, dont deux cachés 'hidden' pour permettre la mise à jour du stock -->
                <td class="stock">
                  <input type="text" name="stock-1" value="7"/>
                  <input type="hidden" name="old-1" value="7"/>
                  <input type="hidden" name="name-1" value="pain"/>
                </td>
                <!-- Les boutons qui permettent de modifier le stock d'un ingredient  -->
                <td class="button plus">+</td>
                <!-- <td class="button minus">-</td> -->
            </tr>
        
                        <!-- Les lignes du tableau sont remplies à l'aide des informations contenues dans la variable $ing (pour chaque résultat de la requête) -->
              <tr>
                
                <!-- Le nom de l'ingrédient -->
                <td class="ing">salade</td>
                
                <!-- La quantité en stock -->
                <!-- Ici on utilise plusieurs champs, dont deux cachés 'hidden' pour permettre la mise à jour du stock -->
                <td class="stock">
                  <input type="text" name="stock-2" value="1"/>
                  <input type="hidden" name="old-2" value="1"/>
                  <input type="hidden" name="name-2" value="salade"/>
                </td>
                <!-- Les boutons qui permettent de modifier le stock d'un ingredient  -->
                <td class="button plus">+</td>
                <!-- <td class="button minus">-</td> -->
            </tr>
        
                        <!-- Les lignes du tableau sont remplies à l'aide des informations contenues dans la variable $ing (pour chaque résultat de la requête) -->
              <tr>
                
                <!-- Le nom de l'ingrédient -->
                <td class="ing">tomate</td>
                
                <!-- La quantité en stock -->
                <!-- Ici on utilise plusieurs champs, dont deux cachés 'hidden' pour permettre la mise à jour du stock -->
                <td class="stock">
                  <input type="text" name="stock-3" value="10"/>
                  <input type="hidden" name="old-3" value="10"/>
                  <input type="hidden" name="name-3" value="tomate"/>
                </td>
                <!-- Les boutons qui permettent de modifier le stock d'un ingredient  -->
                <td class="button plus">+</td>
                <!-- <td class="button minus">-</td> -->
            </tr>
        
                        <!-- Les lignes du tableau sont remplies à l'aide des informations contenues dans la variable $ing (pour chaque résultat de la requête) -->
              <tr>
                
                <!-- Le nom de l'ingrédient -->
                <td class="ing">cheddar</td>
                
                <!-- La quantité en stock -->
                <!-- Ici on utilise plusieurs champs, dont deux cachés 'hidden' pour permettre la mise à jour du stock -->
                <td class="stock">
                  <input type="text" name="stock-4" value="10"/>
                  <input type="hidden" name="old-4" value="10"/>
                  <input type="hidden" name="name-4" value="cheddar"/>
                </td>
                <!-- Les boutons qui permettent de modifier le stock d'un ingredient  -->
                <td class="button plus">+</td>
                <!-- <td class="button minus">-</td> -->
            </tr>
        
                        <!-- Les lignes du tableau sont remplies à l'aide des informations contenues dans la variable $ing (pour chaque résultat de la requête) -->
              <tr>
                
                <!-- Le nom de l'ingrédient -->
                <td class="ing">steack haché</td>
                
                <!-- La quantité en stock -->
                <!-- Ici on utilise plusieurs champs, dont deux cachés 'hidden' pour permettre la mise à jour du stock -->
                <td class="stock">
                  <input type="text" name="stock-5" value="10"/>
                  <input type="hidden" name="old-5" value="10"/>
                  <input type="hidden" name="name-5" value="steack haché"/>
                </td>
                <!-- Les boutons qui permettent de modifier le stock d'un ingredient  -->
                <td class="button plus">+</td>
                <!-- <td class="button minus">-</td> -->
            </tr>
        
                        <!-- Les lignes du tableau sont remplies à l'aide des informations contenues dans la variable $ing (pour chaque résultat de la requête) -->
              <tr>
                
                <!-- Le nom de l'ingrédient -->
                <td class="ing">cornichons</td>
                
                <!-- La quantité en stock -->
                <!-- Ici on utilise plusieurs champs, dont deux cachés 'hidden' pour permettre la mise à jour du stock -->
                <td class="stock">
                  <input type="text" name="stock-6" value="10"/>
                  <input type="hidden" name="old-6" value="10"/>
                  <input type="hidden" name="name-6" value="cornichons"/>
                </td>
                <!-- Les boutons qui permettent de modifier le stock d'un ingredient  -->
                <td class="button plus">+</td>
                <!-- <td class="button minus">-</td> -->
            </tr>
        
                        <!-- Les lignes du tableau sont remplies à l'aide des informations contenues dans la variable $ing (pour chaque résultat de la requête) -->
              <tr>
                
                <!-- Le nom de l'ingrédient -->
                <td class="ing">émincé de poulet</td>
                
                <!-- La quantité en stock -->
                <!-- Ici on utilise plusieurs champs, dont deux cachés 'hidden' pour permettre la mise à jour du stock -->
                <td class="stock">
                  <input type="text" name="stock-7" value="10"/>
                  <input type="hidden" name="old-7" value="10"/>
                  <input type="hidden" name="name-7" value="émincé de poulet"/>
                </td>
                <!-- Les boutons qui permettent de modifier le stock d'un ingredient  -->
                <td class="button plus">+</td>
                <!-- <td class="button minus">-</td> -->
            </tr>
        
                        <!-- Les lignes du tableau sont remplies à l'aide des informations contenues dans la variable $ing (pour chaque résultat de la requête) -->
              <tr>
                
                <!-- Le nom de l'ingrédient -->
                <td class="ing">oignons</td>
                
                <!-- La quantité en stock -->
                <!-- Ici on utilise plusieurs champs, dont deux cachés 'hidden' pour permettre la mise à jour du stock -->
                <td class="stock">
                  <input type="text" name="stock-8" value="10"/>
                  <input type="hidden" name="old-8" value="10"/>
                  <input type="hidden" name="name-8" value="oignons"/>
                </td>
                <!-- Les boutons qui permettent de modifier le stock d'un ingredient  -->
                <td class="button plus">+</td>
                <!-- <td class="button minus">-</td> -->
            </tr>
        
                      </table>
              
                          <!-- Création d'un tableau d'ingrédients --> 
            <table class="">
            <!-- Les colonnes du tableau -->
            <thead><tr><th>Ingrédient</th><th class="stock">Stock</th><th colspan="2">Modifier</th></tr></thead>
              
                          <!-- Les lignes du tableau sont remplies à l'aide des informations contenues dans la variable $ing (pour chaque résultat de la requête) -->
              <tr>
                
                <!-- Le nom de l'ingrédient -->
                <td class="ing">sauce uranium</td>
                
                <!-- La quantité en stock -->
                <!-- Ici on utilise plusieurs champs, dont deux cachés 'hidden' pour permettre la mise à jour du stock -->
                <td class="stock">
                  <input type="text" name="stock-9" value="10"/>
                  <input type="hidden" name="old-9" value="10"/>
                  <input type="hidden" name="name-9" value="sauce uranium"/>
                </td>
                <!-- Les boutons qui permettent de modifier le stock d'un ingredient  -->
                <td class="button plus">+</td>
                <!-- <td class="button minus">-</td> -->
            </tr>
        
                        <!-- Les lignes du tableau sont remplies à l'aide des informations contenues dans la variable $ing (pour chaque résultat de la requête) -->
              <tr>
                
                <!-- Le nom de l'ingrédient -->
                <td class="ing">mayo</td>
                
                <!-- La quantité en stock -->
                <!-- Ici on utilise plusieurs champs, dont deux cachés 'hidden' pour permettre la mise à jour du stock -->
                <td class="stock">
                  <input type="text" name="stock-10" value="10"/>
                  <input type="hidden" name="old-10" value="10"/>
                  <input type="hidden" name="name-10" value="mayo"/>
                </td>
                <!-- Les boutons qui permettent de modifier le stock d'un ingredient  -->
                <td class="button plus">+</td>
                <!-- <td class="button minus">-</td> -->
            </tr>
        
                        <!-- Les lignes du tableau sont remplies à l'aide des informations contenues dans la variable $ing (pour chaque résultat de la requête) -->
              <tr>
                
                <!-- Le nom de l'ingrédient -->
                <td class="ing">ketchup</td>
                
                <!-- La quantité en stock -->
                <!-- Ici on utilise plusieurs champs, dont deux cachés 'hidden' pour permettre la mise à jour du stock -->
                <td class="stock">
                  <input type="text" name="stock-11" value="10"/>
                  <input type="hidden" name="old-11" value="10"/>
                  <input type="hidden" name="name-11" value="ketchup"/>
                </td>
                <!-- Les boutons qui permettent de modifier le stock d'un ingredient  -->
                <td class="button plus">+</td>
                <!-- <td class="button minus">-</td> -->
            </tr>
        
                        <!-- Les lignes du tableau sont remplies à l'aide des informations contenues dans la variable $ing (pour chaque résultat de la requête) -->
              <tr>
                
                <!-- Le nom de l'ingrédient -->
                <td class="ing">mimolette</td>
                
                <!-- La quantité en stock -->
                <!-- Ici on utilise plusieurs champs, dont deux cachés 'hidden' pour permettre la mise à jour du stock -->
                <td class="stock">
                  <input type="text" name="stock-12" value="10"/>
                  <input type="hidden" name="old-12" value="10"/>
                  <input type="hidden" name="name-12" value="mimolette"/>
                </td>
                <!-- Les boutons qui permettent de modifier le stock d'un ingredient  -->
                <td class="button plus">+</td>
                <!-- <td class="button minus">-</td> -->
            </tr>
        
                        <!-- Les lignes du tableau sont remplies à l'aide des informations contenues dans la variable $ing (pour chaque résultat de la requête) -->
              <tr>
                
                <!-- Le nom de l'ingrédient -->
                <td class="ing">Steak végé</td>
                
                <!-- La quantité en stock -->
                <!-- Ici on utilise plusieurs champs, dont deux cachés 'hidden' pour permettre la mise à jour du stock -->
                <td class="stock">
                  <input type="text" name="stock-13" value="10"/>
                  <input type="hidden" name="old-13" value="10"/>
                  <input type="hidden" name="name-13" value="Steak végé"/>
                </td>
                <!-- Les boutons qui permettent de modifier le stock d'un ingredient  -->
                <td class="button plus">+</td>
                <!-- <td class="button minus">-</td> -->
            </tr>
        
                        <!-- Les lignes du tableau sont remplies à l'aide des informations contenues dans la variable $ing (pour chaque résultat de la requête) -->
              <tr>
                
                <!-- Le nom de l'ingrédient -->
                <td class="ing">Fêta</td>
                
                <!-- La quantité en stock -->
                <!-- Ici on utilise plusieurs champs, dont deux cachés 'hidden' pour permettre la mise à jour du stock -->
                <td class="stock">
                  <input type="text" name="stock-14" value="10"/>
                  <input type="hidden" name="old-14" value="10"/>
                  <input type="hidden" name="name-14" value="Fêta"/>
                </td>
                <!-- Les boutons qui permettent de modifier le stock d'un ingredient  -->
                <td class="button plus">+</td>
                <!-- <td class="button minus">-</td> -->
            </tr>
        
                        <!-- Les lignes du tableau sont remplies à l'aide des informations contenues dans la variable $ing (pour chaque résultat de la requête) -->
              <tr>
                
                <!-- Le nom de l'ingrédient -->
                <td class="ing">Sauce blanche</td>
                
                <!-- La quantité en stock -->
                <!-- Ici on utilise plusieurs champs, dont deux cachés 'hidden' pour permettre la mise à jour du stock -->
                <td class="stock">
                  <input type="text" name="stock-15" value="10"/>
                  <input type="hidden" name="old-15" value="10"/>
                  <input type="hidden" name="name-15" value="Sauce blanche"/>
                </td>
                <!-- Les boutons qui permettent de modifier le stock d'un ingredient  -->
                <td class="button plus">+</td>
                <!-- <td class="button minus">-</td> -->
            </tr>
        
                        <!-- Les lignes du tableau sont remplies à l'aide des informations contenues dans la variable $ing (pour chaque résultat de la requête) -->
              <tr>
                
                <!-- Le nom de l'ingrédient -->
                <td class="ing">Bacon</td>
                
                <!-- La quantité en stock -->
                <!-- Ici on utilise plusieurs champs, dont deux cachés 'hidden' pour permettre la mise à jour du stock -->
                <td class="stock">
                  <input type="text" name="stock-16" value="11"/>
                  <input type="hidden" name="old-16" value="11"/>
                  <input type="hidden" name="name-16" value="Bacon"/>
                </td>
                <!-- Les boutons qui permettent de modifier le stock d'un ingredient  -->
                <td class="button plus">+</td>
                <!-- <td class="button minus">-</td> -->
            </tr>
        
          
          </table> <!-- Referme le dernier tableau -->
          
        </div> <!-- fin de la div contenant les tableaux -->
      
        <!-- Le lien ci-dessous permet de valider le formulaire comme le ferait un bouton "submit"-->
        <a class="button stockIt"  onclick="document.getElementById('stock-form').submit();" style="display:none;">Valider la commande d'ingrédients</a>
    
      </form>


  </section>
</main>
      </section> <!-- Fermeture de la section présentant les stocks d'ingrédients -->
    </main>

  </body>
</html>
