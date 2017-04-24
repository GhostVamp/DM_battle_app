<?php
  if($_GET['q'] === 'reset'){
    echo '<table>
      <tr><td>Number of Players</td><td>Number of Enemies</td></tr>
      <tr><td><input type="number" id="num_players" min="1" max="6" value="1"></td><td><input type="number" id="num_players" min="1" max="6" value="1"></td></tr>
      <tr><td colspan="2"><button onclick="getInfo()">Start!</button></td></tr>
    </table>';
  } else {
    $players = $_GET['p'];
    $enemies = $_GET['e'];
    echo '<table>
      <tr>';
      for($i = 1; $i <= $players; $i++){
        echo '<td colspan="2">Player '.$i.'</td>';
      }
      echo '</tr><tr>';
      for($i = 1; $i <= $players; $i++){
        echo '<td colspan="2"><input type="text" id="player-name-'.$i.'" value="Player '.$i.'"></td>';
      }
      echo '</tr><tr>';
      for($i = 1; $i <= $players; $i++){
        echo '<td id="player-hp-'.$i.'">75</td><td id="player-maxhp-'.$i.'">75</td>';
      }
      echo '</tr><tr>';
      for($i = 1; $i <= $enemies; $i++){
        echo '<td colspan="2">Enemy '.$i.'</td>';
      }
      echo '</tr><tr>';
      for($i = 1; $i <= $enemies; $i++){
        echo '<td colspan="2"><input type="text" id="enemy-name-'.$i.'" value="Enemy '.$i.'"></td>';
      }
      echo '</tr><tr>';
      for($i = 1; $i <= $enemies; $i++){
        echo '<td id="enemy-hp-'.$i.'">75</td><td id="enemy-maxhp-'.$i.'">75</td>';
      }
      echo '</tr>
    </table>
    <div id="final_input">
    </div>
    <button onclick=text()>Click me!</button>
    <button onclick=reset()>Click here to restart.</button>';
  }
?>
