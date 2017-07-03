<div class="balance-menu">
    <ul>
        <span>Оберіть баланс потірбної категорії:</span>
        <br>
        <br>
        <li><a class="Detailstart">Деталі</a></li>
        <li><a class="ppmstart">ПММ</a></li>
        <li><a class="fuelstart">Паливо</a></li>
    </ul>
</div>

<?php
$db = new DB();
$detailsBalance = $db->find("SELECT * FROM `DetailsBalance` ORDER BY `LastUpdateTime` DESC")->fetch_all();
if (!empty($detailsBalance)) {
    echo '<div class="DetailBalance">';
    echo '<table>';
    echo '<tr>
    <th>Назва деталі</th>
    <th>Залишок</th>
    <th>Остання дата зміни</th>
  </tr>';
    foreach ($detailsBalance as $detBalcnce) {
        echo "<tr>
    <td>" . $detBalcnce[1] . "</td>
    <td>" . $detBalcnce[2] . "</td>
    <td>" . $detBalcnce[3] . "</td>
  </tr>";

    }
    echo '</table>';
    echo '</div>';
}
$pmmBalance = $db->find("SELECT * FROM `pmmBalance` ORDER BY `LastUpdateTime` DESC")->fetch_all();
if (!empty($pmmBalance)) {
    echo '<div class="pmmBalance">';
    echo '<table>';
    echo '<tr>
    <th>Вид ПММ</th>
    <th>Залишок</th>
    <th>Остання дата зміни</th>
  </tr>';
    foreach ($pmmBalance as $pmmBal) {
        echo "<tr>
    <td>" . $pmmBal[1] . "</td>
    <td>" . $pmmBal[2] . "</td>
    <td>" . $pmmBal[3] . "</td>
  </tr>";

    }
    echo '</table>';
    echo '</div>';
}
$fuelBalance = $db->find("SELECT * FROM `fuelBalance` ORDER BY `LastUpdateTime` DESC")->fetch_all();
if (!empty($fuelBalance)) {
    echo '<div class="fuelBalance">';
    echo '<table>';
    echo '<tr>
    <th>-</th>
    <th>Залишок</th>
    <th>Остання дата зміни</th>
  </tr>';
    foreach ($fuelBalance as $fuelBal) {
        echo "<tr>
    <td>" . $fuelBal[1] . "</td>
    <td>" . $fuelBal[2] . "</td>
    <td>" . $fuelBal[3] . "</td>
  </tr>";

    }
    echo '</table>';
    echo '</div>';
}
