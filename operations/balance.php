<div class="balance-menu">
    <ul>
        <span>Оберіть баланс потірбної категорії:</span>
        <br>
        <br>
        <li><a class="Detailstart">Деталі</a></li>
        <li><a class="ppmstart">ПММ</a></li>
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
                    <li class="month-check"><a>За місяць</a></li>
                    <li class="week-check"><a>За тиждень</a></li>
                    <li class="day-check"><a>За день</a></li>
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
