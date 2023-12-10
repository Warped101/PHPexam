<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            //print($valtozo);
            //print('<br>');
            foreach ($bejegyzesek as $bejegyzes):
        ?>
        <a href="<?php echo base_url('index.php/home/item/'.$bejegyzes['id']); ?>"><?php  print($bejegyzes['cim']); ?></a><br>
        <?php
            endforeach;
        ?>
    </body>
</html>
