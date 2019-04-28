<?php

if (isset($_POST['='])) {
    if (empty($_POST['operand1']) || empty($_POST['operand2'])) {
        $message = "Введите два числа";
    } else {
        $operand1 = (int)$_POST['operand1'];
        $operand2 = (int)$_POST['operand2'];
        $operation = $_POST['operation'];

        switch ($operation) {
            case '+': 
                $result = $operand1 + $operand2;
                break;
            case '-': 
                $result = $operand1 - $operand2; 
                break;
            case '*': 
                $result = $operand1 * $operand2; 
                break;
            case '/': 
                if ($operand2 == 0)
                    $message = "Деление на ноль!";
                else
                    $result = $operand1 / $operand2;
                break;
        }
    }
}

?>

<form action="" method="POST">
    <div>
        <span style="color: red;"><?= $message; ?></span>
    </div>
	<input type="number" name="operand1" value="<?= htmlspecialchars($_POST['operand1']); ?>">
    <select name="operation">
        <option value="+" <?= (isset($_POST['operation']) && $_POST['operation'] == "+") ? 'selected="selected"' : ''; ?>>+</option>
        <option value="-" <?= (isset($_POST['operation']) && $_POST['operation'] == "-") ? 'selected="selected"' : ''; ?>>-</option>
        <option value="*" <?= (isset($_POST['operation']) && $_POST['operation'] == "*") ? 'selected="selected"' : ''; ?>>*</option>
        <option value="/" <?= (isset($_POST['operation']) && $_POST['operation'] == "/") ? 'selected="selected"' : ''; ?>>/</option>
    </select>
	<input type="number" name="operand2" value="<?= htmlspecialchars($_POST['operand2']); ?>">
	<input type="submit" name="=" value="=">
    <?= htmlspecialchars($result); ?>
</form>