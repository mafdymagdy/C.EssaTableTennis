<?php
$connect = mysqli_connect("localhost", "root", "", "work3");
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($connect, $_POST["query"]);
	$query = "
	SELECT * FROM cartdetails 
	WHERE user_name LIKE '%".$search."%'
    or course_name LIKE '%".$search."%'
    or course_pricee LIKE '%".$search."%'
	";
}
else
{
	$query = " SELECT * FROM cartdetails ORDER BY id";
}

$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
	$output .= '<div class="table-responsive">
					<table class="table table bordered">
						<tr>
							<th>Student Name </th>
							<th>Course Name </th>
							<th>Course Price</th>
						</tr>';
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
			<tr>
				<td>'.$row["user_name"].'</td>
				<td>'.$row["course_name"].'</td>
				<td>'.$row["course_pricee"].'</td>
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