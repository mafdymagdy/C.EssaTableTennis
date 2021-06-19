<tfoot>
	<tr>
		<td align="right">
			<?php
				if(!ISSET($_POST['sum'])){
			?>
				<form method="POST" action="">
				</form>
			<?php
				}
				
				else
				{
					$query = mysqli_query($conn, "SELECT * FROM `questions` where Student_id=$idd") or die(mysqli_error());
					$fetch = mysqli_fetch_array($query);
				?>
				<?php
				}
			?>
		</td>
	</tr>
</tfoot>