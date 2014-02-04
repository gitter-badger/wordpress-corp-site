<?php ob_start(); ?>
<h2>Demo Request » New lead notification</h2>
<h3><?php echo $fields['context']; ?> Request <?php echo !empty($fields['title']) ? 'for <span style=" color: #EE576B;">"' . $fields['title'] .'"</span>': ''; ?></h3>
<table style="width: 90%;">
	<tr><th style="text-align:left; color: #000; font-weight: normal; padding-right: 10px; border-bottom: 1px solid #ccc; padding-bottom: 10px;">From</th>
		<td style="border-bottom: 1px solid #ccc; padding-bottom: 10px;" ><?php echo $fields['name']; ?></td></tr>
	<tr><th style="text-align:left; color: #000; font-weight: normal; padding-right: 10px; border-bottom: 1px solid #ccc; padding-bottom: 10px;">Email</th>
		<td style="border-bottom: 1px solid #ccc; padding-bottom: 10px;" ><?php echo $fields['email']; ?></td></tr>
	<tr><th style="text-align:left; color: #000; font-weight: normal; padding-right: 10px; border-bottom: 1px solid #ccc; padding-bottom: 10px;">Company</th>
		<td style="border-bottom: 1px solid #ccc; padding-bottom: 10px;" ><?php echo $fields['company']; ?></td></tr>
	<tr><th style="text-align:left; color: #000; font-weight: normal; padding-right: 10px; border-bottom: 1px solid #ccc; padding-bottom: 10px;">Position</th>
		<td style="border-bottom: 1px solid #ccc; padding-bottom: 10px;" ><?php echo $fields['position']; ?></td></tr>
	<tr><th style="text-align:left; color: #000; font-weight: normal; padding-right: 10px; border-bottom: 1px solid #ccc; padding-bottom: 10px;">Phone Number</th>
		<td style="border-bottom: 1px solid #ccc; padding-bottom: 10px;" ><?php echo $fields['phone']; ?></td></tr>
	<tr><th style="text-align:left; color: #000; font-weight: normal; padding-right: 10px; border-bottom: 1px solid #ccc; padding-bottom: 10px;">Industry</th>
		<td style="border-bottom: 1px solid #ccc; padding-bottom: 10px;" ><?php echo $fields['industry']; ?></td></tr>
</table>
<?php return ob_get_clean(); ?>