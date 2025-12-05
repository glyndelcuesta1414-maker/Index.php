<?php
// 👉 PHP FUNCTION for calculation
function solveExpression($expression) {
    // Split number1 operator number2
    if (preg_match('/^(-?\d+\.?\d*)\s*([\+\-\*\/])\s*(-?\d+\.?\d*)$/', $expression, $match)) {
        $num1 = $match[1];
        $op   = $match[2];
        $num2 = $match[3];

        switch ($op) {
            case "+": return $num1 + $num2;
            case "-": return $num1 - $num2;
            case "*": return $num1 * $num2;
            case "/": return ($num2 == 0) ? "Error" : $num1 / $num2;
        }
    }
    return "Invalid";
}

$result = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $expression = $_POST["expression"];
    $result = solveExpression($expression);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>PHP Calculator</title>
    <style>
        body {
            font-family: Poppins, sans-serif;
            background: #181818;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .calculator {
            width: 330px;
            background: #111;
            padding: 25px;
            border-radius: 20px;
            box-shadow: 0px 0px 20px rgba(0,0,0,0.6);
        }

        .screen {
            width: 100%;
            height: 60px;
            background: black;
            color: #00ff6a;
            font-size: 30px;
            text-align: right;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 15px;
            border: 2px solid #333;
            overflow-x: auto;
        }

        .buttons {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
        }

        button {
            padding: 20px;
            background: #222;
            border: none;
            border-radius: 12px;
            font-size: 20px;
            color: white;
            cursor: pointer;
            transition: 0.2s;
        }

        button:hover { background: #444; }

        .op { background: #ff9500; }
        .op:hover { background: #e08900; }

        .equal {
            background: #00c853;
            grid-column: span 2;
        }

        .clear {
            background: #d50000;
        }
    </style>

    <script>
        function press(val) {
            document.getElementById("expression").value += val;
        }

        function clearScreen() {
            document.getElementById("expression").value = "";
        }
    </script>
</head>
<body>

<div class="calculator">

    <div class="screen">
        <?= $result === "" ? "0" : $result ?>
    </div>

    <form method="POST">
        <input type="hidden" id="expression" name="expression">

        <div class="buttons">

            <button type="button" class="clear" onclick="clearScreen()">C</button>
            <button type="button" onclick="press('(')">(</button>
            <button type="button" onclick="press(')')">)</button>
            <button type="button" class="op" onclick="press('/')">÷</button>

            <button type="button" onclick="press('7')">7</button>
            <button type="button" onclick="press('8')">8</button>
            <button type="button" onclick="press('9')">9</button>
            <button type="button" class="op" onclick="press('*')">×</button>

            <button type="button" onclick="press('4')">4</button>
            <button type="button" onclick="press('5')">5</button>
            <button type="button" onclick="press('6')">6</button>
            <button type="button" class="op" onclick="press('-')">−</button>

            <button type="button" onclick="press('1')">1</button>
            <button type="button" onclick="press('2')">2</button>
            <button type="button" onclick="press('3')">3</button>
            <button type="button" class="op" onclick="press('+')">+</button>

            <button type="button" onclick="press('0')">0</button>
            <button type="button" onclick="press('.')">.</button>

            <button type="submit" class="equal">=</button>

        </div>
    </form>
</div>

</body>
</html>
