<?php
include("header.php");
//$tmp="21.63";
?> 

 <script src="js/jquery.js"></script>
 <script src="js/bootstrap.js"></script>
 <script src="js/modern-business.js"></script>
 <script src="js/highcharts.js"></script>
<script src="js/exporting.js"></script>

<script>
$(function () {
    
        var colors = Highcharts.getOptions().colors,
            categories = ['Sub-Earth', 'Celestial', 'Earth'],
            name = 'Cosmic Dragon Forms',
            data = [{
			
			<?php
$tblname='sub_earth';
//$formname='subearth';
include("perfquery.php");
?>
			
                    y: <?php echo $tmp ;?>,
                    color: colors[0],
                    drilldown: {
                        name: 'Sub-Earth Forms',
                        categories: ['Panther', 'Python'],
                        data: [0, 0],
                        color: colors[0]
                    }
                }, {
				
<?php
$tblname='celestial';
//$formname='celestial';
//$child1='cobra';
//$child2='leopard';
include("perfquery.php");
?>			
			
                    y: <?php echo $tmp/400 ; ?>,
                    color: colors[1],
                    drilldown: {
                        name: 'Celestial Forms',
                        categories: ['Cobra', 'Leopard'],
                        data: [0, 0],
                        color: colors[1]
                    }
                }, {
				
<?php
$tblname='earthdragon';
//$formname='earthdragon';
$child1='boa';
$child2='tiger';
$grdchild='tgkick';
//$grdchild2='tgwrist';
include("perfquery.php");
?>		
		
                    y: <?php echo $tmp/400; ?>,
                    color: colors[2],
                    drilldown: {
                        name: 'Earth Forms',
                        categories: ['Boa', 'Tiger'],
                        data: [<?php echo $firstchild/200; ?>, {
				
	
		
                    y: <?php echo $secondchild/200 ; ?>,
                    color: colors[2],
                    drilldown: {
                        name: 'Tiger Kick Forms',
                        categories: ['Tgkick', 'Tgwrist'],
                        data: [<?php echo $grandchild/100 ; ?>, 0],
                        color: colors[2]
                    }
                }],
                        color: colors[2]
                    }
                }
                    ];
    
        function setChart(name, categories, data, color) {
			chart.xAxis[0].setCategories(categories, false);
			chart.series[0].remove(false);
			chart.addSeries({
				name: name,
				data: data,
				color: color || 'white'
			}, false);
			chart.redraw();
        }
    
        var chart = $('#container').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Cosmic Dragon Form'
            },
            subtitle: {
                text: 'Click the columns to view sub forms. Click again to view parent forms.'
            },
            xAxis: {
                categories: categories
            },
            yAxis: {
                title: {
                    text: 'Total percent form completed'
                }
            },
            plotOptions: {
                column: {
                    cursor: 'pointer',
                    point: {
                        events: {
                            click: function() {
                                var drilldown = this.drilldown;
                                if (drilldown) { // drill down
                                    setChart(drilldown.name, drilldown.categories, drilldown.data, drilldown.color);
                                } else { // restore
                                    setChart(name, categories, data);
                                }
                            }
                        }
                    },
                    dataLabels: {
                        enabled: true,
                        color: colors[0],
                        style: {
                            fontWeight: 'bold'
                        },
                        formatter: function() {
                            return this.y +'%';
                        }
                    }
                }
            },
            tooltip: {
                formatter: function() {
                    var point = this.point,
                        s = this.x +':<b>'+ this.y +'% progress</b><br/>';
                    if (point.drilldown) {
                        s += 'Click to view '+ point.category +' forms';
                    } else {
                        s += 'Click to return to previous forms';
                    }
                    return s;
                }
            },
            series: [{
                name: name,
                data: data,
                color: 'white'
            }],
            exporting: {
                enabled: false
            }
        })
        .highcharts(); // return chart
    });
    </script>
	
<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

<?php
     echo $user->username.' has earned following badges </br>';
     include("display_badge.php");
	// print_r($badges);
	 foreach ($badges as $v) {
	?> 
	<img src="<?php echo $v ?>" width="140" height="100" alt="40x40" class="img-rounded">

 <?php   
}
 ?>

</body>
</html>
