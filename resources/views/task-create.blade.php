<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="/task/5" method="POST">
        <input type="hidden" name="_method" value="PATCH">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <!-- или: -->
        <!-- @method('DELETE') -->
        <!-- @csrf -->
        <button type="submit">Send</button>
    </form>
</body>

</html>