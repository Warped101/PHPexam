<?php //echo validation_errors(); ?>
<form method="POST" action="<?php echo base_url('index.php/Home/comment'); ?>">
    <input type="hidden" name="entry_id" value="<?php echo $bejegyzes['id'] ?? -1 ;?>" >
    <label >Email cím: </label>
    <input type="email" name="email"  value="<?php echo set_value('email'); ?>">
    <div style="color:red;"><?php echo form_error('email'); ?></div>
    <label>Megjegyzés</label>
    <textarea name="comment" rows="10" cols="15"><?php echo set_value('comment'); ?></textarea>
    <div style="color:red;"><?php echo form_error('comment'); ?></div>
    <button type="submit" >Ment</button>
</form>
