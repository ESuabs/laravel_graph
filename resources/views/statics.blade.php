@include('sidebar')
<section class="content" style="margin-left:20px;margin-right:20px;margin-top:50px;">

	<label for="cars">Select Chart Style</label>
	<select name="chart" onchange="myFunction()" class="form-control" id="chart" style="width:120px;">
		<option value="pie">Pie</option>
		<option value="column">Column</option>
		<option value="pyramid">Pyramid</option>
		<option value="bar">Bar</option>
	</select>

    {{--  Chart Out Put is printinh here  --}}
	
	<div class="product-index" align="right" style="margin-top:40px;">
		<div id="chartContainer" style="height: 370px; width: 100%;"></div>
	</div>


</section>

<script>

function myFunction() 
{
  var chartType = document.getElementById("chart").value;

  var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title: {
		text: "Student Merit Marks"
	},
	subtitles: [{
		text: "November 2021"
	}],
	data: [{
	    type:chartType, //"column",  type: "pie",
		yValueFormatString: "#,##0.\"\"",
		indexLabel: "{label} ({y})",
		dataPoints: <?php echo json_encode($data, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
}

// window.onload = function() {

 
// }
</script>
<body>

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>