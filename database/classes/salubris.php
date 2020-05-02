<!DOCTYPE html>
<html lang="en">

<head>
    <title>Salubris</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="salubrisstyle.css">
</head>

<body>
    <h2 style="text-align:center"> Salubris Account</h2>
    <div class="box1">
        <h3> Introduceti datele:</h3><br>
        <select form="form1" name="Cartier" required>
            <option value="" selected disabled hidden>Alege cartierul</option>
            <?php
            require './salubrisGet.php';
            foreach ($cartiere as $cartier) : ?>
                <option value="<?= $cartier['cartiere']; ?>"><?= $cartier['cartiere']; ?></option>
            <?php endforeach; ?>
        </select>
        <form id="form1">
            <input type="number" name="cantitateSticla" placeholder="Cantitate Sticla" required><br>
            <input type="number" name="cantitateHartie" placeholder="Cantitate Hartie" required><br>
            <input type="number" name="cantitateMenajer" placeholder="Cantitate Gunoi Menajer" required><br>

        </form>
        <button type="submit" class="btn" form="form1" value="Submit">Trimite</button>

    </div>


    <h2>

        Rapoartele cetatenilor
    </h2>
    <h3> A se apasa pe una din casetele urmatoare pentru a evidentia congestionarea gunoiului menaer din cartierul respectiv:</h3>
    <ul id="closable">
        <?php
        foreach (json_decode($obiect->redareProbleme(), true) as $problema) : ?>
            <li> <?php echo $problema['cartiere'] . ' ' . $problema['longitudine'] . ' ' .  $problema['latitudine'] ?></li>
        <?php endforeach; ?>
    </ul>


    <script>
        var items = document.querySelectorAll("#closable li");
        for (var i = 0; i < items.length; i++) {
            items[i].onclick = function() {

                // document.getElementById("txt").value = this.innerHTML;
                var xmlhttp = new XMLHttpRequest();
                var url = "tophp.php?q=" + this.innerHTML;
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        alert("Datele au fost sterse. Tocmai ai curatat gunoiul menajer din cartier!")
                    }
                };
                xmlhttp.open("GET", url, true);
                xmlhttp.send();
            };
        }
    </script>

</body>

</html>