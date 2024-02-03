<div class="p-3 d-flex">
    
        <h1><?php echo $message ?></h1>
        <canvas id="chartCanvas" width="200" height="200"></canvas>
    </div>
<script>
	var canvas = document.getElementById("chartCanvas");
var ctx = canvas.getContext("2d");

var percentageFilled = <?php echo $result; ?>;
var currentAngle = 0;
var startAngle = -Math.PI / 2;
var angleIncrement = 0.05; // Adjust the value to increase/decrease animation speed

function drawChart() {
  // Clear the canvas
  ctx.clearRect(0, 0, canvas.width, canvas.height);

  // Draw the background circle
  ctx.beginPath();
  ctx.arc(canvas.width / 2, canvas.height / 2, canvas.width / 2 - 10, 0, 2 * Math.PI);
  ctx.lineWidth = 10;
  ctx.strokeStyle = "#f2f2f2";
  ctx.stroke();

  // Draw the filled arc
  ctx.beginPath();
  ctx.arc(canvas.width / 2, canvas.height / 2, canvas.width / 2 - 10, startAngle, currentAngle);
  ctx.lineWidth = 10;
  ctx.strokeStyle = "#007bff";
  ctx.stroke();

  // Draw the text
  ctx.fillStyle = "#333";
  ctx.font = "bold 24px Arial";
  ctx.textAlign = "center";
  ctx.textBaseline = "middle";
  ctx.fillText(percentageFilled.toFixed(2) + "%", canvas.width / 2, canvas.height / 2);

  // Animate the chart
  if (currentAngle < (2 * Math.PI * percentageFilled) / 100 + startAngle) {
    currentAngle += angleIncrement;
    requestAnimationFrame(drawChart);
  }
}

// Start the animation
drawChart();


</script>