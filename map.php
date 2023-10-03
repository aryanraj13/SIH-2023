<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dropout Rates per State</title>
</head>
<script type='text/javascript' src='https://www.google.com/jsapi'></script>
<script>
    google.load('visualization', '1', {'packages': ['geochart']});
    google.setOnLoadCallback(FetchdrawDropoutMap);
    function FetchdrawDropoutMap() {
        console.log("Hello");
        var js;
        var xml = new XMLHttpRequest();
        xml.open("GET", "fetchRate.php", true);
        xml.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var js= JSON.parse(this.responseText);
                console.log(js);
                console.log(typeof(Number(js[0].Rate)));
                drawDropoutMap(js);
            }
        }
        xml.send();
    }
    function drawDropoutMap(js) {
        console.log("Draw function");
        var dropoutData = google.visualization.arrayToDataTable([
            ['State Code', 'State', 'Dropout Rates per state'],
            ['IN-UP','Uttar Pradesh', Number(js[34].Rate)],
            ['IN-MH','Maharashtra', Number(js[21].Rate)],
            ['IN-BR','Bihar', Number(js[4].Rate)],
            ['IN-WB','West Bengal', Number(js[36].Rate)],
            ['IN-MP','Madhya Pradesh', Number(js[20].Rate)],
            ['IN-TN','Tamil Nadu', Number(js[31].Rate)],
            ['IN-RJ','Rajasthan', Number(js[29].Rate)],
            ['IN-KA','Karnataka', Number(js[16].Rate)],
            ['IN-GJ','Gujarat', Number(js[11].Rate)],
            ['IN-AP','Andhra Pradesh', Number(js[1].Rate)],
            ['IN-OR','Orissa', Number(js[26].Rate)],
            ['IN-TG','Telangana', Number(js[32].Rate)],
            ['IN-KL','Kerala', Number(js[17].Rate)],
            ['IN-JH','Jharkhand', Number(js[15].Rate)],
            ['IN-AS','Assam', Number(js[3].Rate)],
            ['IN-PB','Punjab', Number(js[28].Rate)],
            ['IN-CT','Chhattisgarh', Number(js[6].Rate)],
            ['IN-HR','Haryana', Number(js[12].Rate)],
            ['IN-JK','Jammu and Kashmir', Number(js[14].Rate)],
            ['IN-UT','Uttarakhand', Number(js[35].Rate)],
            ['IN-HP','Himachal Pradesh', Number(js[13].Rate)],
            ['IN-TR','Tripura', Number(js[33].Rate)],
            ['IN-ML','Meghalaya', Number(js[23].Rate)],
            ['IN-MN','Manipur', Number(js[22].Rate)],
            ['IN-NL','Nagaland', Number(js[25].Rate)],
            ['IN-GA','Goa', Number(js[10].Rate)],
            ['IN-AR','Arunachal Pradesh', Number(js[2].Rate)],
            ['IN-MZ','Mizoram', Number(js[24].Rate)],
            ['IN-SK','Sikkim', Number(js[30].Rate)],
            ['IN-DL','Delhi', Number(js[9].Rate)],
            ['IN-PY','Puducherry', Number(js[27].Rate)],
            ['IN-CH','Chandigarh', Number(js[5].Rate)],
            ['IN-AN','Andaman and Nicobar Islands', Number(js[0].Rate)],
            ['IN-DN','Dadra and Nagar Haveli', Number(js[7].Rate)],
            ['IN-DD','Daman and Diu', Number(js[8].Rate)],
            ['IN-LD','Lakshadweep', Number(js[19].Rate)]

        ]);

        var chartOptions = {
            region: 'IN',
            domain: 'IN',
            displayMode: 'regions',
            colorAxis: {colors: ['#8bc34a', '#ffff00', '#ff5722']},
            resolution: 'provinces',
            defaultColor: '#f5f5f5',
            width: 640,
            height: 480
        };

        var dropoutChart = new google.visualization.GeoChart(
            document.getElementById('dropout-map'));
        dropoutChart.draw(dropoutData, chartOptions);
    };
</script>
<body>

<div align="center">
    <h1>Student Dropout Rates per State</h1>
    <div id="dropout-map"></div>
</div>
</body>
</html>