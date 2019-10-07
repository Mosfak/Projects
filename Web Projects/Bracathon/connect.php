
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <title>My Chart.js Chart</title>
</head>
<body>
<?php

	$user='root';
	$pass='';
	$db='test';
	
	$db= new mysqli('localhost', $user, $pass, $db) or die('database not connected');
	 
	
//Step2
$query = "SELECT * FROM data";
mysqli_query($db, $query) or die('Error querying database.');

$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($result);


$ag=0;
 $scst=0;
 $dev=0;
$net=0;
$i=0;
while ($row = mysqli_fetch_array($result)) {
 $ag+=$row['age'] ; 
$scst=$scst+$row['social status'] ;
 $dev=$dev+$row['development'] ;
 $net=$net+$row['monthly income'] ;
$i+=1;
}

	
	
?>

  <div class="container">
    <canvas id="myChart"></canvas>
  </div>

  <script>
    let myChart = document.getElementById('myChart').getContext('2d');

    // Global Options
    Chart.defaults.global.defaultFontFamily = 'Lato';
    Chart.defaults.global.defaultFontSize = 18;
    Chart.defaults.global.defaultFontColor = '#777';
	var age=  <?php echo $ag/$i ?>;
	var scst=  <?php echo 333.33*$scst/$i ?>;
	var dev=  <?php echo 333.33*$dev/$i ?>;
	var net=  <?php echo $net/$i ?>;
	
console.log(age);
    let massPopChart = new Chart(myChart, {
      type:'bar', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
      data:{
        labels:['age', 'Social Status', 'Development', 'monthly income' ],
        datasets:[{
          label:'Population',
          data:[
			age,
            scst,
            dev,
            net
          ],
          //backgroundColor:'green',
          backgroundColor:[
            'rgba(255, 99, 132, 0.6)',
            'rgba(54, 162, 235, 0.6)',
            'rgba(255, 206, 86, 0.6)',
            'rgba(75, 192, 192, 0.6)'
            //'rgba(153, 102, 255, 0.6)',
            //'rgba(255, 159, 64, 0.6)',
            //'rgba(255, 99, 132, 0.6)'
          ],
          borderWidth:1,
          borderColor:'#777',
          hoverBorderWidth:3,
          hoverBorderColor:'#000'
        }]
      },
      options:{
        title:{
          display:true,
          text:'Report',
          fontSize:25
        },
        legend:{
          display:true,
          position:'right',
          labels:{
            fontColor:'#000'
          }
        },
        layout:{
          padding:{
            left:50,
            right:0,
            bottom:0,
            top:0
          }
        },
        tooltips:{
          enabled:true
        }
      }
    });
  </script>
</body>
</html>
