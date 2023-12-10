<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h3><?php echo $bejegyzes['cim'] ?? '';?></h3>
        <p><?php echo $bejegyzes['tartalom'] ?? '';?></p>
        <hr>
        <?php 
            foreach ($comments as $comment):
        ?>
        <h5><?php echo $comment['email']; ?></h5>
        <h6><?php  echo $comment['datum']; ?></h6>
        <p><?php echo $comment['szoveg'] ; ?></p>
        <?php
            endforeach;
        ?>
        <hr>
        <?php
            $this->load->view('comment');
        ?>
    </body>
</html>
