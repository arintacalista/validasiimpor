<?php
	$con = mysqli_connect("localhost","root","","validasiimpor");
	// Check connection
	if (mysqli_connect_errno())
	  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  }
	set_time_limit(0);
	$column = ['B0115', 'N0115', 'B0215', 'N0215', 'B0315', 'N0315', 'B0415', 'N0415', 'B0515', 'N0515', 'B0615', 'N0615', 'B0715', 'N0715', 'B0815', 'N0815', 'B0915',
				'N0915', 'B1015', 'N1015', 'B1115', 'N1115', 'B1215', 'N1215', 'B0116', 'N0116', 'B0216', 'N0216', 'B0316SC', 'N0316SC'];
	$sqli = "INSERT INTO datanew (data, bulan) VALUES";
	foreach ($column as $key => $value) {
		$sql = 'SELECT '.$value.' FROM i56_tipe_0316sc;';
		$data = mysqli_query($con, $sql);
		$keyd = 0;
		while ($row = mysqli_fetch_array($data, MYSQLI_ASSOC)) {
			var_dump($row);
			echo "insertion please wait . . .<br/>";
			if ($key != 0 || $keyd !=0) $sqli .= " ,";
			$sqli .= '('.$row[$value].', "'.$value.'")';
			echo "insertion success!<br/>";
			$keyd++;
		}
	}
	mysqli_query($con, $sqli);
?>