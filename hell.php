<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .result {
            border: solid 1px black;
            width: 100vw;
            height: 100vh;
        }
        table {
            border: solid 2px black;
            text-align: center;
            width : 50px;
            height: 50px;
        }
        th, td {
            border: 2px solid black;
            border-radius: 5px;
            color: black;
        }
    </style>
    <title>Document</title>
</head>
<body>
    <button type="button" value="button">Query</button>
    <div class="result" id="result">
    </div>
    <script>
        var rc = document.getElementById("result");
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "abcd.php", true);
        xmlhttp.send();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var js = JSON.parse(this.responseText);
                console.log(js);
                var s = "<table><tr><th> ID </th><th> Password </th><th> Dropout Rate </th></tr>";
                for (var a = 0; a < js.length; a++) {
                    var id = js[a].school_ID;
                    var pw = js[a].pw;
                    var doRate = 100*(js[a].DS/js[a].TS);
                    s += "<tr><td> " + id + " </td><td> " + pw + " </td><td> " + doRate + " </td></tr>";
                }
                s += "</table>";
                rc.innerHTML = s;
            }
        };
    </script>
</body>
</html>