<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    Test <a href="<?php echo url('/'); ?>">Main</a><br />
    <?php print_r($items); ?>
    <a href="<?php echo route('test.id', ['id' => 3]); ?>">Link</a>
    <?php __('navigation.back'); ?>
    @lang('navigation.forward')
    @lang('navigation.goto', ['section' => 'test'])

    //multiple
    if ($numTasksDeleted > 0)
        {{ trans_choice('messages.task-deletion', $numTasksDeleted) }}
    @endif
</body>

</html>
