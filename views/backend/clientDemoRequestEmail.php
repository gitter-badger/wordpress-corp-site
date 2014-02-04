<?php ob_start(); ?>
<p>Hi <?php echo $fields['name']; ?></p>
<p>Thank you for your request.</p>
<p>Our team will contact you shortly.</p><br>
<p>Veronica Picciafuoco</p>
<?php return ob_get_clean(); ?>