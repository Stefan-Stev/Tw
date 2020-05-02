<!DOCTYPE html>
<html>
    <head>
        <title>Javascript: get selected li from ul</title>
        <meta charset="windows-1252">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        
        <input type="text" id="txt">
        
        <ul id="list">
            <li>JS</li>
            <li>PHP</li>
            <li>Java</li>
            <li>C#</li>
            <li>HTML</li>
            <li>CSS</li>
        </ul>
        
        <script>
            
            var items = document.querySelectorAll("#list li");
            
            for(var i = 0; i < items.length; i++)
            {
                items[i].onclick = function(){
                    
                   // document.getElementById("txt").value = this.innerHTML;
                   var xmlhttp = new XMLHttpRequest();
                   var url="tophp.php?q=" + this.innerHTML;
                   xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
               document.write(this.response);
            }
        };
                   xmlhttp.open("GET", url, true);
        xmlhttp.send();
                };
            }
            
        </script>
        
    </body>
</html>
