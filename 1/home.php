<?php
$startDate = '';
$endDate = '';
$daysDifference = null;
$minutesDifference = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $startDate = $_POST['start_date'];
    $endDate = $_POST['end_date'];
    
    $start = new DateTime($startDate);
    $end = new DateTime($endDate);

    $interval = $start->diff($end);
    $daysDifference = $interval->days;
    $minutesDifference = $daysDifference * 24 * 60; 
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Разница между датами</title>
</head>
<body>
    <h1>Выберите две даты</h1>
    <form method="post" action="">
        <label for="start_date">Дата начала:</label>
        <input type="date" id="start_date" name="start_date" required value="<?php echo htmlspecialchars($startDate);?>">
        <br><br>
        <label for="end_date">Дата окончания:</label>
        <input type="date" id="end_date" name="end_date" required value="<?php echo htmlspecialchars($endDate);?>">
        <br><br>
        <button type="submit">Вычислить разницу</button>
    </form>

    <?php if ($daysDifference !== null): ?>
        <h2>Результаты:</h2>
        <p>Количество дней между выбранными датами: <strong><?php echo $daysDifference; ?></strong></p>
        <p>Количество минут между выбранными датами: <strong><?php echo $minutesDifference; ?></strong></p>
    <?php endif; ?>
</body>
</html>