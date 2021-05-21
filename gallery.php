<?php
ini_set('display_error', 1);

function reader($directory, array $excludeFiles = ['.', '..']) :array|NULL
{
    $images = [];
    if (!is_dir($directory)) {
        return NULL;
    }
    if (!$fileList = opendir($directory)) {
        return NULL;
    }

    while (($fileNames = readdir($fileList)) == true)
    {
        if (in_array($fileNames, $excludeFiles))
        {
            continue;
        }
        $images[] = $directory . '/' . $fileNames;
    }

    closedir($fileList);

    return $images;
}

$images = reader('img');


if (!$images)
{
    die("Images couldn't found");
}

?>

<!DOCTYPE html>
<html dir="ltr" lang="en">
    <head>
        <meta charset="UTF-8" />
        <title>Image Gallery</title>
    </head>
    <body>
    <?php
        foreach ($images as $image)
        {
            echo '<img src="' . $image . '" alt="" width="200px" height="200px"/>';
        }
    ?>
    </body>
</html>
