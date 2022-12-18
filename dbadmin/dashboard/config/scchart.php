<?php
    $sql_pie = "SELECT product_name, count(product_id) FROM order_details,products,orders WHERE order_details.order_id=orders.id and order_details.id and products.id=order_details.product_id group by product_id";
    $res_c = $conn->query($sql_pie);

    $sql_bar = "SELECT product_name, count(product_id) FROM order_details,products,orders WHERE order_details.order_id=orders.id and order_details.id and products.id=order_details.product_id group by product_id";
    $res_bar = $conn->query($sql_bar);

    $sql = "SELECT sum(order_detail_price) as total FROM order_details,orders WHERE order_details.order_id=orders.id  ";
    $result = $conn->query($sql);
    $row = $result ->fetch_assoc();
        
    if (!$res_bar) {
        die('<p><strong style="color:#FF0000">!! Invalid query:</strong> ' . $mysqli->error.'</p>');
    }
?>

<script type="text/javascript">
    
 $(function () {
    $('#piechwart').highcharts({
        chart: {
            height: 250,
            backgroundColor: 'transparent',
            type: 'pie'
        },
        title: {
            
            text: ' <span class="label2"></span>' //ใส่ชื่อกราฟ
            
        },
        colors: [ '#FF6CEF', '#FAF657','#22F2D5','#2292D5','#28F565'],
        tooltip: {
            pointFormat: '{series.name}: <b>{point.y:,.0f}  ({point.percentage:.1f}%)</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.y:,.0f} (<strong>{point.percentage:.1f} %</strong>)',
                }
            }
        },
  credits: {
   enabled: false
  },
        series: [{
            name: "",
            colorByPoint: true,
            data: [
   <?php
   $c_field = $res_c->field_count-1;
    $c_pie=0; while($row_pie = $res_c->fetch_array(MYSQLI_NUM)){ $c_pie++; ?>
   <?php if($c_pie>1){ ?>,<?php } ?>
    {
     name: "<?php echo htmlspecialchars(addslashes(str_replace("\t","",str_replace("\n","",str_replace("\r","",$row_pie[0]))))); ?>",
     y: <?php echo $row_pie[$c_field]; ?>
    }
   <?php } ?>
   ]
        }]
   });
});
</script>
        
<script type="text/javascript">
$(function () {
    $('#barchart').highcharts({
        chart: {
            height: 250,
            backgroundColor: 'transparent',
            type: 'column'
        },
        title: {
            text: '<span class="label2"></span>' //ใส่ชื่อกราฟ
        },
/*        subtitle: {
            text: ''
        },*/
        xAxis: {
            
            categories: [
            <?php
                $c_field_bar = $res_bar->field_count-1;
                $c_bar=0; while($row_bar = $res_bar->fetch_array(MYSQLI_NUM)){ $c_bar++; ?>
            <?php if($c_bar>1){ ?>,<?php } 
                $data_bar[] = $row_bar[$c_field_bar]; 
            ?>
              '<?php echo htmlspecialchars(addslashes(str_replace("\t","",str_replace("\n","",str_replace("\r","",$row_bar[0]))))); ?>'
              <?php } ?>
            ],
            labels: {
            style: {
                color: 'black'
            }
        },
            crosshair: true
            
        },
        yAxis: {
            labels: {
        style: {
            color: 'black'
               }
            },
            min: 0,
            title: {
                text: 'จำนวน',
                style: {
            color: 'black'
               }
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat:  '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                          '<td style="padding:0"><b>{point.y:,.0f} </b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0,
    dataLabels: {
     enabled: true,
     color: 'orange'
    }
   }
        },
  credits: {
   enabled: false
  },
        series: [{
            name: '',
            data: [<?php echo join(',',$data_bar); ?>]
 
        }]
    });
});
</script>