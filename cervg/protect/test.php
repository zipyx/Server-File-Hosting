<form method="POST" action="up_calculus2.php" enctype="multipart/form-data">
    <input type="file" name="file">
    <input type="submit" style="height: 120px; width: 160px" value="Upload">
    <input type="button" style="height: 120px; width: 160px" value="Main Site" onclick="location='http://fam.cervg.com'" />
    <input type="button" style="height: 120px; width: 160px" value="Back" onClick="location='math.php'" />
</form>

<?php

$files = scandir("test/web_php/Calculus2");
for ($a = 2; $a < count($files); $a++)
{
    ?>
    <p>
        <?php echo $files[$a]; ?>

        <a href="test/web_php/Calculus2/<?php echo $files[$a]; ?>" download="<?php echo $files[$a]; ?>">
            Download
        </a>
    </p>
    <?php
}
