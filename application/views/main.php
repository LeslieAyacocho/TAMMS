<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script>
google.charts.load('current', {packages: ['corechart', 'bar', 'line']});
google.charts.setOnLoadCallback(drawDonutChart);
google.charts.setOnLoadCallback(drawLineChart1);
google.charts.setOnLoadCallback(drawBarChart1);
google.charts.setOnLoadCallback(drawBarChart2);
google.charts.setOnLoadCallback(drawLineChart2);

function drawDonutChart() 
{
    var data = google.visualization.arrayToDataTable([
        ['Visitor', 'Total in percentage'],
        ['Local', <?php echo $localPercent; ?>],
        ['Foreign', <?php echo $foreignPercent; ?>],
    ]);

    var drawOptions = {
        title: 'COMPARISON OF LOCAL AND FOREIGN VISITORS IN ' + <?php echo $prevYear1; ?>,
        titleTextStyle: {
        //color: <string here>,
        //fontName: <string here>,
        // fontSize: <integer here>,
        //bold: <boolean here>,
    },
        pieHole: 0.2,
        // backgroundColor: <hex value here as string>,
        chartArea: {
            width: '40%', //change this value to widen graph
        },
        height: 300, //change this value to lengthen graph vertically
    };

    var chart = new google.visualization.PieChart(document.getElementById('donut-chart'));
    chart.draw(data, drawOptions);
}

function drawLineChart1()
{
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Month');
    data.addColumn('number', 'Average');

    data.addRows([
    <?php
        foreach ($monthlyAverage as $data)
        {
            echo "['".$data['month']."', ".$data['total_average']."],";
        }
    ?>
    ]);

    var drawOptions = {
        title: 'AGGREGATED AVERAGE OF MONTHLY LANDMARK VISITORS',
        titleTextStyle: {
                //color: <string here>,
                //fontName: <string here>,
                //fontSize: <integer here>,
                //bold: <boolean here>,
            },
        hAxis: {
            title: 'Month',
            titleTextStyle: {
                //color: <string here>,
                //fontName: <string here>,
                //fontSize: <integer here>,
                //bold: <boolean here>,
            },
            textStyle: {
                fontSize: 12,
            },
        },
        vAxis: {
            title: 'Count',
            titleTextStyle: {
                //color: <string here>,
                //fontName: <string here>,
                //fontSize: <integer here>,
                //bold: <boolean here>,
            },
        },
        // backgroundColor: <hex value here as string>,
        chartArea: {
            width: '80%', //change this value to widen graph
        },
        height: 400, //change this value to lengthen graph vertically
        legend:
        {
            position: 'bottom',
            textStyle: {
                //color: <string here>,
                //fontName: <string here>,
                //fontSize: <integer here>,
                //bold: <boolean here>,
            },
        },
        animation: {
            duration: 800,
            easing: 'out',
            startup: 'true'
        },
    };

    var chart = new google.visualization.LineChart(document.getElementById('line-chart'));
    chart.draw(data, drawOptions);
}

function drawBarChart1() 
{
    var data = google.visualization.arrayToDataTable([
        ['Country', 'Total Visitors', {role: 'annotation'}],
        <?php
            foreach ($previousYearData as $data)
            {
                echo "['".$data['country_name']."', ".$data['total_visitors'].", '".$data['country_code']."'],\n\t\t";
            }
        ?>
    ]);

    var drawOptions = {
        title: 'TOP 10 LANDMARK FOREIGN VISITORS IN ' + <?php echo $prevYear1; ?>,
        titleTextStyle: {
            //color: <string here>,
            //fontName: <string here>,
            //fontSize: <integer here>,
            //bold: <boolean here>,
        },
        hAxis: {
            title: 'Count',
            titleTextStyle: {
                //color: <string here>,
                //fontName: <string here>,
                //fontSize: <integer here>,
                //bold: <boolean here>,
            },
        },
        vAxis: {
            title: 'Country',
            titleTextStyle: {
                //color: <string here>,
                //fontName: <string here>,
                //fontSize: <integer here>,
                //bold: <boolean here>,
            },
        },
        // backgroundColor: <hex value here as string>,
        chartArea: {
            width: '80%', //change this value to widen graph
        },
        height: 600, //change this value to lengthen graph vertically
        legend:
        {
            position: 'bottom',
            textStyle: {
                //color: <string here>,
                //fontName: <string here>,
                //fontSize: <integer here>,
                //bold: <boolean here>,
            },
        },
        animation: {
            duration: 800,
            easing: 'out',
            startup: 'true'
        },
    };

    var chart = new google.visualization.BarChart(document.getElementById('bar-chart-1'));
    chart.draw(data, drawOptions);
}

function drawBarChart2()
{
    var data = google.visualization.arrayToDataTable([
        ['Country', 'Total Visitors', {role: 'annotation'}],
        <?php
            foreach ($leastVisitorsData as $data)
            {
                echo "['".$data['country_name']."', ".$data['total_visitors'].", '".$data['country_code']."'],\n\t\t";
            }
        ?>
    ]);

    var drawOptions = {
        title: 'TOP LEAST LANDMARK VISITORS (LESS THAN 5000 VISITORS) IN ' + <?php echo $prevYear1; ?>,
        titleTextStyle: {
            //color: <string here>,
            //fontName: <string here>,
            //fontSize: <integer here>,
            //bold: <boolean here>,
        },
        hAxis: {
            title: 'Count',
            titleTextStyle: {
                //color: <string here>,
                //fontName: <string here>,
                //fontSize: <integer here>,
                //bold: <boolean here>,
            },
        },
        vAxis: {
            title: 'Country',
            titleTextStyle: {
                //color: <string here>,
                //fontName: <string here>,
                //fontSize: <integer here>,
                //bold: <boolean here>,
            },
        },
        // backgroundColor: <hex value here as string>,
        chartArea: {
            width: '80%', //change this value to widen graph
        },
        height: 300, //change this value to lengthen graph vertically
        legend:
        {
            position: 'bottom',
            textStyle: {
                //color: <string here>,
                //fontName: <string here>,
                //fontSize: <integer here>,
                //bold: <boolean here>,
            },
        },
        animation: {
            duration: 800,
            easing: 'out',
            startup: 'true'
        },
    };

    var chart = new google.visualization.BarChart(document.getElementById('bar-chart-2'));
    chart.draw(data, drawOptions);
}

function drawLineChart2()
{
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Year');
    data.addColumn('number', 'Total Visitors');

    data.addRows([
    <?php
        echo "['".$prevYear2."', ".$prevYear2Total."],\n\t\t";
        echo "['".$prevYear1."', ".$prevYear1Total."],\n\t\t";
        echo "['".$curYear."', ".$forecast1."],\n\t\t";
        echo "['".$nextYear1."', ".$forecast2."],\n\t\t";
        echo "['".$nextYear2."', ".$forecast3."],\n\t\t";
    ?>
    ]);

    var drawOptions = {
        title: 'FORECASTED TOTAL VISITORS STARTING ' + <?php echo $curYear; ?>,
        titleTextStyle: {
                //color: <string here>,
                //fontName: <string here>,
                //fontSize: <integer here>,
                //bold: <boolean here>,
            },
        hAxis: {
            title: 'Year',
            titleTextStyle: {
                //color: <string here>,
                //fontName: <string here>,
                //fontSize: <integer here>,
                //bold: <boolean here>,
            },
            textStyle: {
                fontSize: 12,
            },
        },
        vAxis: {
            title: 'Count',
            titleTextStyle: {
                //color: <string here>,
                //fontName: <string here>,
                //fontSize: <integer here>,
                //bold: <boolean here>,
            },
        },
        // backgroundColor: <hex value here as string>,
        chartArea: {
            width: '80%', //change this value to widen graph
        },
        height: 400, //change this value to lengthen graph vertically
        legend:
        {
            position: 'bottom',
            textStyle: {
                //color: <string here>,
                //fontName: <string here>,
                //fontSize: <integer here>,
                //bold: <boolean here>,
            },
        },
        animation: {
            duration: 800,
            easing: 'out',
            startup: 'true'
        },
    };

    var chart = new google.visualization.LineChart(document.getElementById('line-chart-2'));
    chart.draw(data, drawOptions);
}

</script>

<div class="content">
    <div class="content-wrap">
    <h1> WELCOME TO YOUR DASHBOARD! </h1>
    <p> Check and analyze your data analytics on this page. </p>
    
    <div id='donut-chart'></div>
    <div id='line-chart'></div>
    <div id='bar-chart-1'></div>
    <div id='bar-chart-2'></div>
    <div id='line-chart-2'></div>
    
    </div>
</div>