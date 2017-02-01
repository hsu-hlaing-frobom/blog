<html>
	<head><title>Staffs</title></head>
	<body>
		<table>
		<tr><th>Name</th>
		<th>Email</th>
		</tr>
		<?php foreach ($staffs as $s): ?>
		<tr>
			<td><?php echo $s['Staff']['name'] ?></td>
			<td><?php echo $s['Staff']['email'] ?></td>
		</tr>
	<?php endforeach; ?>
	</table>
	</body>
</html>