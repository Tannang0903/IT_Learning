<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php
            echo $title;
        ?>
    </title>
    <?php
        require_once 'app/configs/static_files.php';
        if (isset($config['static_files']['base']['font'])) {
            foreach ($config['static_files']['base']['font'] as $font) {
                echo "<link rel=\"stylesheet\" href=\"".ROOT."/public/fonts/$font\">";
            }
        }
        if (isset($config['static_files']['base']['css'])) {
            foreach ($config['static_files']['base']['css'] as $css) {
                echo "<link rel=\"stylesheet\" href=\"".ROOT."/public/css/$css.css\">";
            }
        }
        if (isset($config['static_files'][$view]['css'])) {
            foreach ($config['static_files'][$view]['css'] as $css) {
                if (strstr($css, 'http') != false) {
                    echo "<link rel=\"stylesheet\" href=\"$css\">";
                }else{
                    echo "<link rel=\"stylesheet\" href=\"".ROOT."/public/css/$css.css\">";
                }
            }
        }
    ?>
</head>
<body>
    <?php
        require_once "app/views/Shared/Header.php";
        require_once "app/views/$view.php";
    ?>

    <?php
        if (isset($config['static_files'][$view]['js'])) {
            foreach ($config['static_files'][$view]['js'] as $js) {
                echo "<script src=\"".ROOT."/public/js/$js.js\"></script>";
            }
        }
    ?>
    <script src=""></script>
</body>
</html>