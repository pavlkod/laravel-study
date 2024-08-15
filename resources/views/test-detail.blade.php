<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    Test { id }
    <a href="<?= route('test.id.comment', [1, 2, 'z' => 3]) ?>">comment</a>
</body>

</html>