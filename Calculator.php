<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER ["PHP_SELF"]) ;?>" method="post">
    <input type="number" name="num1"
    placeholder="num1"
    >
    <select name="operator" id="">
        <option value="add">+</option>
        <option value="substract">-</option>
        <option value="multiply">*</option>
        <option value="divide">/</option>
    </select>

    <input type="number" name="num2"
    placeholder="num2">
    <button type="submit">Calculate</button>
    </form>

    <?php
    //Get data from inputs
    if ($_SERVER['REQUEST_METHOD']=="POST")
    {  $num1 = filter_input(INPUT_POST, "num1", FILTER_SANITIZE_NUMBER_FLOAT);
        $num2 = filter_input(INPUT_POST, "num2", FILTER_SANITIZE_NUMBER_FLOAT);
        $operator = htmlspecialchars($_POST ["operator"]);
    }
    //gg
    // error handlers
    $error = false;
    
    if (empty($num1) || empty($num2) || empty($operator)){
        echo "fill in all fields";
        $error = true;
    }
    if (!is_numeric($num1) || !is_numeric($num2))
    {
        echo "Incorrect input, use numbers!";
        $error=true; 
    }
    //calculation part
        
    if (!$error)//bading
    {
        $result = 0;
        switch ($operator){
            
            case "add":
                $result = $num1 + $num2;
                break;
            case "subtract":
                $result = $num1 - $num2;
                break;
            case "multiply":
                $result = $num1 * $num2;
                break;
            case "divide":
                $result = $num1 / $num2;
                break;
        default: echo "Something Went Wrong";
        
        }
        echo  "result = $result";
    }
    ?>
</body>
</html>