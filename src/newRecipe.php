<?php
    session_start();
    include_once 'database.php';
    if (isset($_POST['submit'])) {
        /*************Insert the data into mysql db**************/
        $stmt = $pdo->prepare('INSERT INTO recipes(title, author,rating,prep_time,cook_time,
        effort_level,serving_size,descriptions,ingredients,directions) VALUES (:title, :author,:rating,:prep_time,:cook_time,
        :effort_level,:serving_size,:descriptions,:ingredients,:directions)');

        $values = [
            'title' => $_POST['title'],
            'author' => $_POST['author'],
            'rating' => $_POST['rating'],
            'prep_time' => $_POST['prep-time'],
            'cook_time' => $_POST['cook-time'],
            'effort_level' => $_POST['option-effort'],
            'serving_size' => $_POST['servings'],
            'descriptions' => $_POST['note'],
            'ingredients' => $_POST['ingredients'],
            'directions' => $_POST['directions']
        ]; 

        $stmt->execute($values);
        /***************************/
    }
  
?>
<!DOCTYPE html>
<html>

<head>
    <title>GoodFood</title>
    <link rel="stylesheet" href="style/layout.css">
    <link rel="stylesheet" href="style/new-recipe.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
            <li><a href='./recipeSelectionForm.php'>Recipe Report</a></li>
            <li><a href="./newRecipe.php" class="selected">New Recipe</a></li>
        </ul>
    </nav>
    <main>
        <h3>Add New Recipe</h3>
        <form action="" method="POST">
            <table>
                <tbody>
                    <tr>
                        <td> Title </td>
                        <td> <input class="form-input" type="text" placeholder="Enter your recipe name" name="title">
                        </td>
                    </tr>
                    <tr>
                        <td>Author </td>
                        <td> <input id='author' placeholder="Enter your name" class="form-input" type="text"
                                name="author"></td>

                    </tr>
                    <tr>
                        <td>Rating</td>
                        <td> <input id='rating' class="form-input" type="text" placeholder="Out of 5" name="rating">
                        </td>
                    </tr>
                    <tr>
                        <td>Short Note</td>
                        <td> <input class="form-input" type="text" placeholder="Short note about your recipe"
                                name="note"></td>
                    </tr>
                    <tr>
                        <td>Prep. Time</span>
                        </td>
                        <td>
                            <input id='prepTime' class="form-input" type="text" placeholder="in mins" name="prep-time">


                        </td>
                        <td>Cook Time</span>
                        </td>
                        <td>
                            <input id='cookTime' class="form-input" type="text" placeholder="in mins" name="cook-time">


                        </td>
                    </tr>
                    <tr>
                        <td>Servings</td>
                        <td> <input id='servings' class="form-input" type="text" placeholder="Serves " name="servings">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            Cook Level
                            <label class="radio-inline">
                                <input type="radio" name="option-effort" checked>Easy
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="option-effort">Difficult
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="option-effort">A challenge
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td>Ingredients</td>
                        <td> <textarea placeholder="1 onion - finely chopped" name="ingredients" rows="4"
                                cols="50"></textarea></td>
                    </tr>
                    <tr>
                        <td>Directions</td>
                        <td> <textarea placeholder="Heat 2 tbsp of the oil" name="directions" rows="4"
                                cols="50"></textarea></td>
                    </tr>
                </tbody>
            </table>
            <input type="submit" class='btn' name="submit" value="Add Recipe" />
        </form>
    </main>
    <footer>&copy; CSYM019 2024</footer>
</body>

</html>