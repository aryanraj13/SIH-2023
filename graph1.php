<!DOCTYPE html>
<html>
<head>
<style>
.button-35 {
    align-items: center;
    background-color: #fff;
    border-radius: 12px;
    box-shadow: transparent 0 0 0 3px, rgba(18, 18, 18, .1) 0 6px 20px;
    box-sizing: border-box;
    color: #121212;
    cursor: pointer;
    display: inline-flex;
    flex: 1 1 auto;
    font-family: Inter, sans-serif;
    font-size: 1rem;
    font-weight: 700;
    justify-content: center;
    line-height: 1;
    margin: 0;
    outline: none;
    padding: 0.8rem 1rem;
    text-align: center;
    text-decoration: none;
    transition: box-shadow .2s, -webkit-box-shadow .2s;
    white-space: nowrap;
    border: 0;
    user-select: none;
    -webkit-user-select: none;
    touch-action: manipulation;
    margin-bottom: 10px;
}

.button-35:hover {
    box-shadow: #121212 0 0 0 3px, transparent 0 0 0 0;
}

.container {
    display: flex;
    flex-direction: row;
    justify-content: flex-start;
    align-items: flex-start;
}

.graph-container {
    width: 52%;
    display: inline-block;
}

.button-container {
    width: 25%;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    margin-top: 20px;
}

</style>
</head>
<body>

<div class="container">
    <div class="graph-container">
        <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
    </div>
    <div class="button-container">
        <button class="button-35" id="ageChartButton">Age Group</button>
        <button class="button-35" id="divisionChartButton">Division Chart</button>
        <button class="button-35" id="genderChartButton">Gender Chart</button>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<script>
    var barColors = [
        "#b91d47",
        "#00aba9",
        "#2b5797",
        "#e8c3b9",
        "#1e7145"
    ];

    var ageLabels = ["5-8", "8-11", "11-14", "14-18"];
    var ageData = [30, 45, 20, 5];
    var ageTitle = "Age Group Distribution (Bar Chart)";

    var divisionLabels = ["SC", "ST", "General", "OBC"];
    var divisionData = [15, 10, 50, 25];
    var divisionTitle = "Division Distribution (Pie Chart)";

    var genderLabels = ["Male", "Female", "Others"];
    var genderData = [59, 39, 2];
    var genderTitle = "Gender Distribution (Pie Chart)";

    function createBarChart(labels, data, title) {
        var ctx = document.getElementById("myChart").getContext("2d");
        return new Chart(ctx, {
            type: "bar",
            data: {
                labels: labels,
                datasets: [{
                    backgroundColor: barColors,
                    data: data
                }]
            },
            options: {
                title: {
                    display: true,
                    text: title
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    }

    function createPieChart(labels, data, title) {
        var ctx = document.getElementById("myChart").getContext("2d");
        return new Chart(ctx, {
            type: "pie",
            data: {
                labels: labels,
                datasets: [{
                    backgroundColor: barColors,
                    data: data
                }]
            },
            options: {
                title: {
                    display: true,
                    text: title
                }
            }
        });
    }

    function fetchGenderChart() {
        console.log("Function 1");
        var xml = new XMLHttpRequest();
        xml.open("GET", "graphData1.php", true);
        xml.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var js = JSON.parse(this.responseText);
                console.log(js);
                var a = Number(js[0].rate);
                var b = Number(js[1].rate);
                var c = Number(js[2].rate);
                console.log(c);
                genderData[0] = 100*b/(a + b + c);
                genderData[1] = 100*a/(a + b + c);
                genderData[2] = 100*c/(a + b + c);
                showGenderChart();
            }
        }
        xml.send();
    }

    var currentChart = createBarChart(ageLabels, ageData, ageTitle);

    function showAgeChart() {
        currentChart.destroy();
        currentChart = createBarChart(ageLabels, ageData, ageTitle);
    }

    function showDivisionChart() {
        currentChart.destroy();
        currentChart = createPieChart(divisionLabels, divisionData, divisionTitle);
    }

    function showGenderChart() {
        currentChart.destroy();
        currentChart = createPieChart(genderLabels, genderData, genderTitle);
    }

    document.getElementById("ageChartButton").onclick = showAgeChart;
    document.getElementById("divisionChartButton").onclick = showDivisionChart;
    document.getElementById("genderChartButton").onclick = fetchGenderChart;
</script>
</body>
</html>
