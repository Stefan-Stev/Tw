
    <script src="index.php"></script>
    <script type="text/javascript">
            var ctx = document.getElementById('myChart').getContext('2d');
        //ctx.canvas.width =5;
          //  ctx.canvas.height = 6;
            var chart = new Chart(ctx, {
                // The type of chart we want to create
                type: 'bar',
               
                // The data for our dataset
                
                data: {
                    labels: <?php echo json_encode($json2); ?>,
                    datasets: [{

                        label: " ",
                        backgroundColor: 'rgba(0,0,255)',
                        borderColor: 'rgb(255,0,0)',
                        data: <?php echo json_encode($json); ?>,
                      
                    }]
                },
                // Configuration options go here
                options: { }

            });
        </script>
      
