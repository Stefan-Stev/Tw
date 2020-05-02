<html>

<head>
    <title>Database</title>
    <link rel="stylesheet" type="text/css" href="mystyle.css">
</head>

<body>
    <div id="background">
        <h1 align="center"> Statistici</h1>
        <form action="index.php" method="GET">
            <div align="middle">
                <button class="button" name="sticla" value="sticla"><span> Sticla</span></button>
                <button class="button" name="hartie" value="hartie"> <span> Hartie</span> </button>
                <button class="button" name="gunoi" value="gunoimenajer"><span> Menajer</span></button>
                <div class="dropdown">
                    <div class="dropbtn"> Cartiere
                        <div class="dropdown-content">
                            <button class="dropbtn" name="cartier" value="Dacia"> Dacia </button>
                            <button class="dropbtn" name="cartier" value="Pacurari"> Pacurari </button>
                            <button class="dropbtn" name="cartier" value="Copou"> Copou </button>
                            <button class="dropbtn" name="cartier" value="Gara"> Gara </button>
                            <button class="dropbtn" name="cartier" value="Tatarasi"> Tatarasi </button>
                            <button class="dropbtn" name="cartier" value="Baza3"> Tudor </button>
                            <button class="dropbtn" name="cartier" value="Centru"> Centru </button>
                            <button class="dropbtn" name="cartier" value="Tg Cucu"> Tg Cucu </button>
                            <button class="dropbtn" name="cartier" value="Cug"> Cug </button>
                            <button class="dropbtn" name="cartier" value="Nicolina"> Nicolina </button>
                        </div>
                    </div>
                </div>
                <div class="dropdown">
                    <div class="dropbtn">Luna
                        <div class="dropdown-content">
                            <button class="dropbtn" name="luna" value="Aprilie"> Aprilie </button>
                            <button class="dropbtn" name="luna" value="Martie">Martie </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <canvas id="myChart" height="120"></canvas>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

        <?php

        require_once '../classes/userview.class.php';
        require_once '../classes/usercontr.class.php';
        // json[] este pentru informatia in cifre iar json2 este pentru labeluri;
        if (isset($_GET['sticla'])) {
            $name = $_GET['sticla'];
            $cartierObj = new UserView();
            $json = $cartierObj->showSticla();

            $json2 = $cartierObj->showCartiere();
        }
        if (isset($_GET['hartie'])) {
            $name = $_GET['hartie'];
            $cartierObj = new UserView();
            $json = $cartierObj->showHartie();
            $json2 = $cartierObj->showCartiere();
        }
        if (isset($_GET['gunoi'])) {
            $name = $_GET['gunoi'];

            $cartierObj = new UserView();
            $json = $cartierObj->showMenajer();
            $json2 = $cartierObj->showCartiere();
        }
        if (isset($_GET['cartier'])) {
            $name = $_GET['cartier'];
            $cartierObj = new UserView();
            $json2 = []; // pt labeluri ca sticla ,menajer si hartie
            $json2[] = "Sticla";
            $json2[] = "Hartie";
            $json2[] = "Menajer";

            $json = [];
            $json = $cartierObj->showGunoaie($name); //pt cifrele din baza de date

        }
        if(isset($_GET['luna']))
        {
            $name=$_GET['luna'];
            $cartierObj=new UserView();
            $json=[];
            $json=$cartierObj->takeAllforMonth($name);

            $json2=[];
            $json2[]="Arpilie";//am trei bare, de aceea trebuie sa punem de 3 ori luna
            $json2[]="Aprilie";
            $json2[]="Aprilie";

        
        }


        ?>
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
                options: {
                    responsiveAnimationDuration:5,
                }

            });
        </script>
        <h2> Clasamentul cartierelor dupa curatenie(ordine descrescatoare):</h2>
       <ol>
           <?php 
                $obiect=new UserView();
                $cartiere=json_decode($obiect->cartiereOrdine());
                
           foreach($cartiere as $cartier):?>
           
              <li><?php  echo $cartier; ?></li>
           <?php endforeach;
           ?>
       </ol> 
    </div>
</body>

</html>