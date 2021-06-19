<?php
$connect = mysqli_connect("localhost", "root", "", "work3");
$output = '';

if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($connect, $_POST["query"]);
	$query = "
	SELECT * FROM courses 
	WHERE course_name LIKE '%".$search."%' 
	";
}

else
{
	$query = " SELECT * FROM courses ORDER BY id";
}

$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
	$output .= '<div class="table-responsive">
					<table class="table table bordered">
						<tr>
							<th>Course Name </th>
							<th>Course Price</th>
						</tr>';
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
			<tr>
				<td>'.$row["course_name"].'</td>
				<td>'.$row["course_price"].'</td>
			</tr>
		';
	}
	echo $output;
}

else
{
	echo 'Data Not Found';
}
?>