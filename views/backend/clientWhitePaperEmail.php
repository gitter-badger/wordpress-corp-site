<?php ob_start(); ?>
<?php $paperName = !empty($fields['title']) ? '<strong style="font-weight:bold;">"' . $fields['title'] .'"</strong>': ''; ?>
<p>Hi <?php echo $fields['name']; ?></p>
<p>Thank you for your request.</p>
<p>The white paper you have requested (<?php echo $paperName ?>) is ready to download.</p>
Click <a href="<?php echo $fields['attachment']; ?>">here </a> to download the file.
<?php return ob_get_clean(); ?>