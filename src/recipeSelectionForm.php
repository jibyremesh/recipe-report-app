<?php
    session_start();
    include_once 'database.php';
    $stmt = $pdo->prepare('SELECT * FROM recipes ORDER BY title ASC');
    $stmt->execute();
    if (isset($_POST['submit'])) {
        $_SESSION["ids"] = $_POST['recipes'];
       header('Location: recipeReport.php');
    }
    if (isset($_POST['delete'])) {
        $ids = implode(',',$_POST['recipes']);
        $stmt = $pdo->prepare('delete from recipes where id IN('.$ids.')');
        $stmt->execute();
        header("Location: ".$_SERVER['PHP_SELF']);
    }
?>  
<!DOCTYPE html>
<html>
    <head>
        <title>GoodFood</title>
        <script src='recipe-form.js'></script>
        <link rel="stylesheet" href="style/layout.css">
        <link rel="stylesheet" href="style/recipe.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
    <body>
        <header>
            <div class="flex-center header">
            <h3>CSYM019 - BBC GOOD FOOD RECIPES</h3>
            <span><span class="username">
            <?echo $_SESSION["username"]?></span>
            <a class="fa fa-sign-out" href='./index.php' aria-hidden="true"></a></span>
</div>
        </header>
        <nav>
            <ul>
                <li><a href='./recipeSelectionForm.php' class='selected'>Recipe Report</a></li>
                <li><a href="./newRecipe.php">New Recipe</a></li>
            </ul>
        </nav>
        <main>
            <h3>Recipe Collections</h3>
            <div class="recipes">
            <form action="" method="POST" >
            <table>
            <thead>
            <tr> 
          <td width='5%'>
          <input type="checkbox" name="recipe_all"  onClick="toggle(this)" value="0"/> </td> 
          <td width='15%'>Title </td> 
          <td width='15%'>Author </td>
          <td width='7.5%'>Prep.</td> 
          <td width='7.5%'>Cook</td> 
          <td width='50%'>Notes</td>
      </tr>
</thead>
<tbody>
    <?php
      if ($stmt->rowCount() > 0) {
        foreach($stmt as $row){
            echo '<tr> 
            <td><input type="checkbox" name="recipes[]" value="'.$row["id"].'"/></td> 
            <td>'.$row["title"].'</td> 
            <td>'.$row["author"].'</td> 
            <td>'.$row["prep_time"].'</td> 
            <td>'.$row["cook_time"].'</td>
            <td>'.$row["descriptions"].'</td> 
        </tr>';
        }
    }
        else{
            echo "No Recipes Found";
        }
    ?>
      <tbody>
</table>
            <input type="submit" class='btn' name="submit" value="Create Recipe Report" />
            <input type="submit" class='btn' name="delete" value="Delete Recipes" />                
            </form>
        </main>
        <footer>&copy; CSYM019 2024</footer>
    </body>
</html>