<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script>
google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawBarChart);

function drawBarChart()
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
        title: 'TOP 10 VISITORS IN ' + <?php echo $year; ?>,
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

    var chart = new google.visualization.BarChart(document.getElementById('bar-chart'));
    chart.draw(data, drawOptions);
}

</script>

<div class="content">

<?php
echo"<div class=\"text-center\">";
    echo "<img style=\"width: 200px;\" src=\"".base_url().$landmark['landmark_image']."\" alt=\"".$landmark['landmark_name']."\">";
    echo"</div>";

echo"<div class=\"row\">";
echo"<div class=\"col-8 text-center\">";
    echo "<h3>".$landmark['landmark_name']."</h3>";

    echo "<label> <strong> ADDRESS: </strong> </label> ".$landmark['address'];
    echo "<br>\n";

    echo "<label> <strong> MANAGING OFFICE: </strong> </label> ".$landmark['managing_office'];
    echo "<br>\n";

    echo "<label> <strong> CITY LOCATION: </strong> </label> ".$landmark['city_name'];
echo "<br>\n";
echo"</div>";
echo"<div class=\"col-4\">";
    $addVisitorAttrib = array(
        'id'=>'',
        'class'=>'',
    );
    echo form_fieldset("ADD VISITORS", $addVisitorAttrib);

    echo form_open(base_url().'landmarksc/addvisitor');
    
    echo form_label("CONTINENT", 'continent')."\n";
 

    $continentsAttrib = array(
        'name'=>'continent',
        'class'=>'',
    );
    
    echo"<div class=\"forms \">\n"; 
    echo form_radio($continentsAttrib, 'Africa', TRUE, $additional=array('id'=>'africa', 'onclick'=>'showCountries(\'Africa\')'));
    echo form_label("Africa", 'africa');

    echo form_radio($continentsAttrib, 'Antartica', FALSE, $additional=array('id'=>'africa', 'onclick'=>'showCountries(\'Antartica\')'));
    echo form_label("Antartica", 'antartica')."\n";
    echo "<br>\n";
    echo form_radio($continentsAttrib, 'Asia', FALSE, $additional=array('id'=>'africa', 'onclick'=>'showCountries(\'Asia\')'));
    echo form_label("Asia", 'asia')."\n";

    echo form_radio($continentsAttrib, 'Europe', FALSE, $additional=array('id'=>'africa', 'onclick'=>'showCountries(\'Europe\')'));
    echo form_label("Europe", 'europe')."\n";


    echo form_radio($continentsAttrib, 'North America', FALSE, $additional=array('id'=>'africa', 'onclick'=>'showCountries(\'North America\')'));
    echo form_label("North America", 'north-america')."\n";
    echo "<br>\n";
    echo form_radio($continentsAttrib, 'oceania', FALSE, $additional=array('id'=>'africa', 'onclick'=>'showCountries(\'Oceania\')'));
    echo form_label("Oceania", 'ocenia')."\n";

    echo form_radio($continentsAttrib, 'South America', FALSE, $additional=array('id'=>'africa', 'onclick'=>'showCountries(\'south America\')'));
    echo form_label("South America", 'south-america');
echo"</div>";
echo "<br>\n";
echo"<div class=\"forms \">\n"; 
    echo form_label("COUNTRY", 'country')."\n";

    $countryOptions = array();
    $countryOptions['default'] = "--SELECT COUNTRY--";

    foreach ($countries as $country)
    {
        $countryOptions[$country['country_id']] = $country['country_name'];
    }

    $countryAttrib = array(
        'id'=>'country',
        'class'=>'form-control'
    );
    echo form_dropdown('countries', $countryOptions, 'default', $countryAttrib);
echo"</div>";
echo "<br>\n";
echo"<div class=\"forms \">\n"; 
    echo form_label("NUMBER OF VISITORS", 'totalVisitors')."\n";
    $totalVisitorsAttrib = array(
        'id'=>'totalVisitors',
        'name'=>'totalVisitors',
        'class'=>'form-control',
        'placeholder'=>'Enter number of visitors'
    );
    echo form_input($totalVisitorsAttrib);
echo"</div>";
echo "<br>\n";
    $addVisitorsAttrib = array(
        'class'=>'btn button',
        'onclick'=>''
    );
    echo form_submit('addVisitors', "ADD VISITORS", $addVisitorsAttrib);

    echo form_close();
    echo form_fieldset_close();
    echo"</div>";
echo"</div>";

echo "<div id='bar-chart'></div>";
?>


</div>
