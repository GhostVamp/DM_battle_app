<html>
  <head>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  </head>
  <body>
    <div id="main-div">
      <table>
        <tr><td>Number of Players</td><td>Number of Enemies</td></tr>
        <tr><td><input type="number" id="num_players" min="1" max="6" value="1"></td><td><input type="number" id="num_enemies" min="1" max="6" value="1"></td></tr>
        <tr><td colspan="2"><button onclick="getInfo()">Start!</button></td></tr>
      </table>
    </div>
  </body>
  <script>
    function text(){
      var pcount = $('input[id*=player-name-]').length;
      var ecount = $('input[id*=enemy-name-]').length;
      var players = [];
      var enemies = [];
      var damage;
      var log = '';
      for(i = 1; i <= pcount; i++){
        // Players Turn
        players[i] = { cHP : document.getElementById('player-hp-'+i).innerHTML, Name : document.getElementById('player-name-'+i).value, Status : 'Alive'};
        if(players[i]["Name"] != ''){
          if(players[i]["cHP"] > 0){
            damage = Math.floor((Math.random() * 20) + 1);
            players[i]["cHP"] = players[i]["cHP"] - damage;
            document.getElementById('player-hp-'+i).innerHTML = players[i]["cHP"];
            if(players[i]["cHP"] < 1){
              log = log + '** ' + players[i]["Name"] + ' ' + damage + ' Dead. ';
            } else {
              log = log + '** ' + players[i]["Name"] + ' ' + damage + ' ';
            }
          }
        }
      }
      for(i = 1; i <= ecount; i++){
        // Enemies Turn
        enemies[i] = { cHP : document.getElementById('enemy-hp-'+i).innerHTML, Name : document.getElementById('enemy-name-'+i).value, Status : 'Alive'};
        if(enemies[i]["Name"] != ''){
          if(enemies[i]["cHP"] > 0){
            damage = Math.floor((Math.random() * 20) + 1);
            enemies[i]["cHP"] = enemies[i]["cHP"] - edamage;
            document.getElementById('enemy-hp-'+i).innerHTML = enemies[i]["cHP"];
            if(enemies[i]["cHP"] < 1){
              log = log + '** ' + enemies[i]["Name"] + ' ' + damage + ' Dead. ';
            } else {
              log = log + '** ' + enemies[i]["Name"] + ' ' + damage + ' ';
            }
          }
        }
      }
      document.getElementById('final_input').innerHTML = document.getElementById('final_input').innerHTML + log + '<br>';
    };
  </script>
  <script>
    function getInfo() {
      var num_players = document.getElementById('num_players').value;
      var num_enemies = document.getElementById('num_enemies').value;
      if(num_players < 1 || num_players > 6){
        alert("Please insert a number between 1 and 6, thanks.");
        return;
      }
      if(num_enemies <1 || num_players > 6){
        alert("Please insert a number between 1 and 6, thanks.");
        return;
      }
      if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
      } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
      xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
          document.getElementById("main-div").innerHTML = xmlhttp.responseText;
        }
      };
      xmlhttp.open("GET","information.php?q=new&e="+num_enemies+"&p="+num_players, false);
      xmlhttp.send();
    }
  </script>
</html>
<?php

?>
