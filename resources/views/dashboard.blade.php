<?php

use Illuminate\Support\Facades\URL;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>

<body>
    Dashboard - {{ now() }}
    <a href="{{ URL::signedRoute('test.id.comment', [1, 2]); }}">Test</a>
</body>

</html>