<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Maestro</title>
        <?php foreach ($css_files as $file): ?>
            <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
        <?php endforeach; ?>
        <?php foreach ($js_files as $file): ?>
            <script src="<?php echo $file; ?>"></script>
        <?php endforeach; ?>
        <style type='text/css'>
            body {
                font-family: Arial;
                font-size: 14px;
            }
            a {
                color: blue;
                text-decoration: none;
                font-size: 14px;
            }
            a:hover {
                text-decoration: underline;
            }
        </style>
    </head>
    <body>
        <div class="panel panel-default">
            <div class="panel-heading"><h1>Maestro</h1></div>
            <div class="panel-body">
                <?php echo $output; ?>
            </div>
            <div class="panel-footer"></div>
        </div>
    </body>
</html>