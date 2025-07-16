<?php
    session_start();
    if(isset($_SESSION["ids"])){
        include_once 'database.php';
        $value = implode(',',$_SESSION["ids"]);
        $stmt = $pdo->prepare('SELECT r.*,  
        group_concat(value) as nut_values, 
            ri.unit AS unit,
        group_concat(distinct nut_item) as nut_items
    FROM recipes r 
    JOIN nutritionRecipe ri on r.id = ri.recipe_id 
    JOIN nutritions i on i.id = ri.nutrition_id where r.id IN('.$value.') group by r.id');
    $stmt->execute();
    }

    function generateRatingElement($rating) {
      $rateElem = '';
      $index;
      for ($index = 0; $index < 5; $index++) {
          if($index < $rating)
           $rateElem = $rateElem.'<span class="fa fa-star"></span>' ;
           else
           $rateElem = $rateElem.' <span class="fa fa-star  not-rated"></span>';

      }
      return $rateElem;
  }
?>

<!DOCTYPE html>
<html>

<head>
    <title>GoodFood</title>
    <link rel="stylesheet" href="style/layout.css">
    <link rel="stylesheet" href="style/recipe.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
</head>

<body>
    <header>
        <div class="flex-center header">
            <h3>CSYM019 - BBC GOOD FOOD RECIPES</h3>
            <span><span class="username">
                    <?echo $_SESSION["username"]?>
                </span>
                <a class="fa fa-sign-out" href='./login.php' aria-hidden="true"></a></span>
        </div>
    </header>
    <nav>
        <ul>
            <li><a href='./recipeSelectionForm.php' class="selected">Recipe Report</a></li>
            <li><a href="./newRecipe.php">New Recipe</a></li>
        </ul>
    </nav>
    <main>
        <?php
      if ($stmt->rowCount() > 0) {
        $sn=1;
        $barChartData=array();
        foreach($stmt as $row){
          $str = $row['nut_values'];
          $nutItemsWithUnits = '['. substr($str, strpos($str,",")+1) .']';
           $barChartData[$row["title"]] =$nutItemsWithUnits;

            echo ' <div>
        <h2>'. $sn.'. '.$row["title"].'</h2>

        <table id="recipe-report-tb">
            <tr>
            <td>Author</td>  <td>'.$row["author"].'</td> 
            </tr>
            <tr> <td>Prep. Time</td>  <td>'.$row["prep_time"].'</td> 
          </tr>
          <tr><td>Cook Time</td>  <td>'.$row["cook_time"].'</td> 
            </tr>
            <tr><td>Notes</td>  <td>'.$row["descriptions"].'</td> 
            </tr>
            <tr><td>Ratings</td>  <td>'.generateRatingElement($row["rating"]).'</td> 
            </tr>
            <tr><td>Cook Level</td>  <td>'.$row["effort_level"].'</td> 
            </tr>
            <tr><td>Servings</td>  <td>'.$row["serving_size"].'</td> 
            </tr>
            
            <tr><td>Ingredients</td>  <td>'.$row["ingredients"].'</td> 
            </tr>
            <tr><td>Cooking Method</td>  <td>'.$row["directions"].'</td> 
            </tr>
            <tr><td>Nutritions(kcal only)</td>  <td>'.substr($str, 0,strpos($str,",")) .' kcal</td> 
            </tr>
            </table>
        </div> 
        <canvas id="pie-chart'.$sn.'" style="width:100%;max-width:300px"></canvas>
            <script>
                new Chart("pie-chart'.$sn.'", {
                    type: "pie",
                    data: {
                        labels: ["fat", "saturates", "carbs", "sugars", "fibre", "protein", "salt"],
                        datasets: [{
                            label: "Nutritions (excluding kcal)",
                            backgroundColor: ["#39ac35", "#009335", "#009959", "#79bf66", "#236829","#bede92", "#6b9527","#59b530"],
                            data: '.$nutItemsWithUnits.',
                        }]
                    },
                    options: {
                        title: {
                            display: true,
                            text: "Nutritions Chart(excluding kcal)",
                            backgroundColor: "yellow"
                        }
                    }
                });
            </script>
        ';
        $sn++;
            } 
        }
        if ($stmt->rowCount() > 1) {
          
            foreach ($barChartData as $key => $value) {
              $color = sprintf("#%06x",rand(0,16777215));
                $res = $res.' {label: "'.$key.'",
                  backgroundColor: "'.$color.'",
                  data: '.$value.'},';
            }
        echo '<canvas id="bar-chart-grouped" width="800" height="450"></canvas>
        <script>
            new Chart(document.getElementById("bar-chart-grouped"), {
                type: "bar",
                data: {
                    labels: ["kcal", "fat", "saturates", "carbs", "sugars", "fibre", "protein", "salt"],
                    datasets: ['.$res.']
                },
                options: {
                    title: {
                        display: true,
                        text: "Nutrient comparison chart"
                    }
                }
            });
        </script>';
}
?>

    </main>
    <footer>&copy; CSYM019 2024</footer>
</body>

</html>