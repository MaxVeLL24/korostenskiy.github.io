<?php
?>
<div class="balance-menu">
    <ul>
        <span>Оберіть баланс потірбної категорії:</span>
        <br>
        <br>
        <li><a class="Detailstart">Деталі</a></li>
        <li><a class="ppmstart">ПММ</a></li>
        <li><a class="railway_start">Вагони</a></li>
        <li><a class="local_trade_start">Місцеві продажі</a></li>
    </ul>
</div>
<div class='modal fade' id='detailACC' role='dialog'>
    <div class='modal-dialog'>
        <div class='modal-content'>
            <div class='modal-header'>
                <button type='button' class='close' data-dismiss='modal'>&times;</button>
                <h4 class='modal-title'>Проведені операції:</h4>
            </div>
            <div class='modal-body'>
                <ul class="check">
                    <li class="month-check"><a class="time" data-time="month">За місяць</a></li>
                    <li class="week-check"><a class="time" data-time="week">За тиждень</a></li>
                    <li class="day-check"><a class="time" data-time="day">За день</a></li>
                </ul>
                <table class='modal-table' id="ajax-input">
                </table>
            </div>
        </div>
    </div>
</div>

<?php
date_default_timezone_set('Europe/Kiev');
$db = new DB();
$detailsBalance = $db->find("SELECT * FROM `DetailsBalance` ORDER BY `LastUpdateTime` DESC")->fetch_all();
if (!empty($detailsBalance)) {
    echo '<div class="DetailBalance">';
    echo '<form method="post" action="">';
    echo '<table>';
    echo '<tr>
    <th>Назва деталі</th>
    <th>Залишок</th>
    <th>Остання дата зміни</th>
  </tr>';
    foreach ($detailsBalance as $detBalcnce) {
        echo "<tr>
    <td><a name='ajax-details' type='button' data-toggle='modal' data-id='" . $detBalcnce[0] . "' data-target='#detailACC'>" . $detBalcnce[1] . "</a></td>
    <td>" . $detBalcnce[2] . "</td>
    <td>" . $detBalcnce[3] . "</td>
  </tr>";

    }
    echo '</table>';
    echo '</form>';

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
        echo " <tr>
    <td><a name='ajax-pmm' type = 'button' data-toggle = 'modal' data-id='" . $pmmBal[0] . "' data-target = '#detailACC'> " . $pmmBal[1] . "</a></td>
    <td> " . $pmmBal[2] . "</td>
    <td> " . $pmmBal[3] . "</td>
  </tr> ";
    }
    echo '</table>';
    echo '</div>';

}

$railwaybalance = $db->find("SELECT * FROM `railways_balance` ORDER BY `LastUpdateTime` DESC")->fetch_all();

if (!empty($railwaybalance)) {
    echo '<div class="railwayAccounting">';
    echo '<table>';
    echo '<tr>
    <th>Прізвище</th>
    <th>За місяць</th>
    <th>Дата останньої зміни</th>
  </tr>';
    foreach ($railwaybalance as $reilACC) {
        echo " <tr>
    <td><a name='ajax-railways' type = 'button' data-toggle = 'modal' data-id='" . $reilACC[0] . "' data-target = '#detailACC'> " . $reilACC[1] . "</a></td>
    <td> " . $reilACC[2] . "</td>
    <td> " . $reilACC[3] . "</td>
  </tr> ";
    }
    echo '</table>';
    echo '</div>';

}

$local_trade = $db->find("SELECT * FROM `local_trading_accounting`ORDER BY `last_updatetime` DESC")->fetch_all();

if (!empty($local_trade)) {
    echo '<div class="local_trade">';
    echo '<table>';
    echo '<tr>
    <th>Прізвище</th>
    <th>Номер накладної</th>
    <th>Номер машини</th>
    <th>Назва компанії</th>
    <th>Вид продукції</th>
    <th>Виписано</th>
    <th>Взято</th>
    <th>Залишок</th>
    <th>Дата</th>
  </tr>';
    foreach ($local_trade as $ltrdAcc) {
        echo " <tr>
    <td><a name='ajax-localtrd' type = 'button' data-toggle = 'modal' data-id='" . $ltrdAcc[0] . "' data-target = '#detailACC'> " . $ltrdAcc[1] . "</a></td>
    <td> " . $ltrdAcc[2] . "</td>
    <td> " . $ltrdAcc[3] . "</td>
    <td> " . $ltrdAcc[4] . "</td>
    <td> " . $ltrdAcc[5] . "</td>
    <td> " . $ltrdAcc[6] . "</td>
    <td> " . $ltrdAcc[7] . "</td>
    <td> " . $ltrdAcc[8] . "</td>
    <td> " . $ltrdAcc[9] . "</td>
  </tr> ";
    }
    echo '</table>';
    echo '</div>';

}
