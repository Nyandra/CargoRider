<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Stimmung</title>
		<!-- lokalisieren... -->
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<style type="text/css">
		${demo.css}
		</style>
		
		<?php
			
			//noch auslagern in ein config-file
			
			$username = "flock-0844"; 
			$password = "7ZDyBALM";   
			$host = "mysql5";
			$database="db_flock-0844_1";
   
			$server = mysql_connect($host, $username, $password);
			$connection = mysql_select_db($database, $server);

			$myquery = "SELECT * FROM stimmung_dummy"; 
			
			$query = mysql_query($myquery);
			
				if (!$query) {
					echo mysql_error();
					die;
				}	
			$data = array();
			for ($x = 0; $x < mysql_num_rows($query); $x++) {
				$data[] = mysql_fetch_assoc($query);
			}
			//echo json_encode($data);     
			mysql_close($server);
		?>

		
		<script type="text/javascript">
$(function () {
		
    $('#container').highcharts({
        title: {
            text: 'Stimmungsparameter',
            x: -20 //center
        },
        subtitle: {
            text: '',
            x: -20
        },
        xAxis: {
            categories: ['1','2','3','4','5','6','7']
        },
        yAxis: {
            title: {
                text: 'Fröhlichkeit'  
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: ''
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },

			
        series: [{
            name: '',
            data: [10, 3, 3, 4, 9, 10, 1]
        }]
    });
});

		</script>
	</head>
	<body>
<script src="highcharts.js"></script>
<script src="exporting.js"></script>

<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

	</body>
</html>
