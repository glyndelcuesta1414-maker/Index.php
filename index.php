<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Calculator</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="calc-container">
    <h2>PHP Calculator</h2>

    <form action="calculate.php" method="POST">

        <input type="text" name="expression" class="display" placeholder="0" readonly>

        <div class="buttons">
            <button type="button" onclick="addValue('7')">7</button>
            <button type="button" onclick="addValue('8')">8</button>
            <button type="button" onclick="addValue('9')">9</button>
            <button type="button" class="op" onclick="addValue('/')">÷</button>

            <button type="button" onclick="addValue('4')">4</button>
            <button type="button" onclick="addValue('5')">5</button>
            <button type="button" onclick="addValue('6')">6</button>
            <button type="button" class="op" onclick="addValue('*')">×</button>

            <button type="button" onclick="addValue('1')">1</button>
            <button type="button" onclick="addValue('2')">2</button>
            <button type="button" onclick="addValue('3')">3</button>
            <button type="button" class="op" onclick="addValue('-')">−</button>

            <button type="button" onclick="addValue('0')">0</button>
            <button type="button" onclick="addValue('.')">.</button>
            <button type="button" onclick="clearDisplay()">C</button>
            <button type="button" class="op" onclick="addValue('+')">+</button>
        </div>

        <button type="submit" class="equal-btn">=</button>
    </form>
</div>

<script>
    function addValue(value) {
        document.querySelector('.display').value += value;
    }

    function clearDisplay() {
        document.querySelector('.display').value = '';
    }
</script>

</body>
</html>
