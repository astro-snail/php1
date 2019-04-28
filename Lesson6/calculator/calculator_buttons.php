<?php

$operation = '?';
    
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
            default:
                $message = "Выберите операцию";
        }
    }
} else {
    if (isset($_POST['+']))
        $operation = $_POST['+'];

    if (isset($_POST['-']))
        $operation = $_POST['-'];

    if (isset($_POST['*']))
        $operation = $_POST['*'];

    if (isset($_POST['/']))
        $operation = $_POST['/'];
}

?>

<form action="" method="POST">
    <div>
        <span style="color: red;"><?= $message; ?></span>
    </div>
	<input type="number" name="operand1" value="<?= htmlspecialchars($_POST['operand1']); ?>">
    <?= $operation; ?> 
    <input type="number" name="operand2" value="<?= htmlspecialchars($_POST['operand2']); ?>">
	<input type="submit" name="=" value="=">
    <?= $result; ?>
    <br>
    <button name="+" value="+">+</button>
    <button name="-" value="-">-</button>
    <button name="*" value="*">*</button>
    <button name="/" value="/">/</button>
    <input type="hidden" name="operation" value="<?= htmlspecialchars($operation); ?>">
</form>