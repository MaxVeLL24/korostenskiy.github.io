<?php
require_once 'autoloader.php';

if (!empty($_POST['login']) and !empty($_POST['password'])) {
    $logres = verification::VER($_POST['login'], md5($_POST['password']));
    if (!empty($logres['access'])) {
        if ($logres['access'] == 'all') {
            $response[] = 'dhub.php';
            $response[] = '/';
            $response[] = 'dpbvm';
            echo $response[0];
            echo $response[1];
            echo $response[2];
        }
        if ($logres['access'] == 'details') {
            $response[] = 'shub.php';
            $response[] = '/';
            $response[] = 'opdet';
            echo $response[0];
            echo $response[1];
            echo $response[2];
        }
        if ($logres['access'] == 'pmm') {
            $response[] = 'shub.php';
            $response[] = '/';
            $response[] = 'pmm';
            echo $response[0];
            echo $response[1];
            echo $response[2];
        }
        if ($logres['access'] == 'railway ') {
            $response[] = 'shub.php';
            $response[] = '/';
            $response[] = 'rlwy';
            echo $response[0];
            echo $response[1];
            echo $response[2];
        }
        if ($logres['access'] == 'local_trade') {
            $response[] = 'shub.php';
            $response[] = '/';
            $response[] = 'trdner';
            echo $response[0];
            echo $response[1];
            echo $response[2];
        } else {
            return false;
        }
    }
    return false;
}
if (!empty($_POST['detID'])) {
    $detailInit = verification::DETPROD($_POST['detID']);
    if (!empty($detailInit)) {
        $kreditDetails = 0;
        $debitDetails = 0;
        echo "<tr>
                        <th>Операція</th>
                        <th>Кількість</th>
                        <th>Отримувач</th>
                        <th>Видав</th>
                        <th>Дата</th>
                    </tr>";
        foreach ($detailInit as $value) {
            if ($value[2] == 'Отримання') {
                $debitDetails += $value[3];
            } elseif ($value[2] == 'Видача') {
                $kreditDetails += $value[3];
            }
            echo "
                    <tr>
                        <td> " . $value[2] . "</td>
                        <td> " . $value[3] . "</td>
                        <td> " . $value[4] . "</td>
                        <td> " . $value[5] . "</td>
                        <td> " . $value[6] . "</td>
                    </tr>";
        }
        $resultD = 0;
        $resultD = $debitDetails - $kreditDetails;
        echo "<tr>
                        <td>Сума</td>
                        <td>" . $resultD . "</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>";
    }
}
if (!empty($_POST['localtrd'])) {
    $localtrdInit = verification::DETPROD($_POST['localtrd']);
    if (!empty($localtrdInit)) {
        $kreditDetails = 0;
        $debitDetails = 0;
        echo "<tr>
                        <th>Операція</th>
                        <th>Кількість</th>
                        <th>Отримувач</th>
                        <th>Видав</th>
                        <th>Дата</th>
                    </tr>";
        foreach ($localtrdInit as $value) {
            if ($value[2] == 'Отримання') {
                $debitDetails += $value[3];
            } elseif ($value[2] == 'Видача') {
                $kreditDetails += $value[3];
            }
            echo "
                    <tr>
                        <td> " . $value[2] . "</td>
                        <td> " . $value[3] . "</td>
                        <td> " . $value[4] . "</td>
                        <td> " . $value[5] . "</td>
                        <td> " . $value[6] . "</td>
                    </tr>";
        }
        $resultD = 0;
        $resultD = $debitDetails - $kreditDetails;
        echo "<tr>
                        <td>Сума</td>
                        <td>" . $resultD . "</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>";
    }
}
if (!empty($_POST['railwayID'])) {
    $railInit = verification::RAILWAYPROD($_POST['railwayID']);
    if (!empty($railInit)) {
        $kreditDetails = 0;
        $debitDetails = 0;
        echo "<tr>
                        <th>Кількість</th>
                        <th>Час</th>
                    </tr>";
        foreach ($railInit as $value) {
            echo "
                    <tr>
                        <td> " . $value[2] . "</td>
                        <td> " . $value[3] . "</td>
                    </tr>";
        }
    }
}
if (!empty($_POST['pmmID'])) {
    $detailInit = verification::PMMPROD($_POST['pmmID']);
    if (!empty($detailInit)) {
        $kreditDetails = 0;
        $debitDetails = 0;
        echo "<tr>
                        <th>Операція</th>
                        <th>Кількість</th>
                        <th>Отримувач</th>
                        <th>Видав</th>
                        <th>Дата</th>
                    </tr>";
        foreach ($detailInit as $value) {
            if ($value[2] == 'Отримання') {
                $debitDetails += $value[3];
            } elseif ($value[2] == 'Видача') {
                $kreditDetails += $value[3];
            }
            echo "
                    <tr>
                        <td> " . $value[2] . "</td>
                        <td> " . $value[3] . "</td>
                        <td> " . $value[4] . "</td>
                        <td> " . $value[5] . "</td>
                        <td> " . $value[6] . "</td>
                    </tr>";
        }
        $resultD = 0;
        $resultD = $debitDetails - $kreditDetails;
        echo "<tr>
                        <td>Сума</td>
                        <td>" . $resultD . "</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>";
    }
}
if (!empty($_POST['pmm']) && !empty($_POST['time'])) {
    if ($_POST['time'] == 'month') {
        $time = strtotime("-1 month");
    } else if ($_POST['time'] == 'week') {
        $time = strtotime("-1 week");
    } else if ($_POST['time'] == 'day') {
        $time = strtotime("-1 day");
    }
    $TimeCorrection = date('Y-m-d G:i:s', $time);
    $pmmInit = verification::pmmWITHtime($_POST['pmm'], $TimeCorrection);
    if (!empty($pmmInit)) {
        $kreditDetails = 0;
        $debitDetails = 0;
        echo "<tr>
                        <th>Операція</th>
                        <th>Кількість</th>
                        <th>Отримувач</th>
                        <th>Видав</th>
                        <th>Дата</th>
                    </tr>";
        foreach ($pmmInit as $value) {
            if ($value[2] == 'Отримання') {
                $debitDetails += $value[3];
            } elseif ($value[2] == 'Видача') {
                $kreditDetails += $value[3];
            }
            echo "
                    <tr>
                        <td> " . $value[2] . "</td>
                        <td> " . $value[3] . "</td>
                        <td> " . $value[4] . "</td>
                        <td> " . $value[5] . "</td>
                        <td> " . $value[6] . "</td>
                    </tr>";
        }
        $resultD = 0;
        $resultD = $debitDetails - $kreditDetails;
        echo "<tr>
                        <td>Сума</td>
                        <td>" . $resultD . "</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>";
    }
}
if (!empty($_POST['detail']) && !empty($_POST['time'])) {
    if ($_POST['time'] == 'month') {
        $time = strtotime("-1 month");
    } else if ($_POST['time'] == 'week') {
        $time = strtotime("-1 week");
    } else if ($_POST['time'] == 'day') {
        $time = strtotime("-1 day");
    }
    $TimeCorrection = date('Y-m-d G:i:s', $time);
    $detailInit = verification::detailsWITHtime($_POST['detail'], $TimeCorrection);
    if (!empty($detailInit)) {
        $kreditDetails = 0;
        $debitDetails = 0;
        echo "<tr>
                        <th>Операція</th>
                        <th>Кількість</th>
                        <th>Отримувач</th>
                        <th>Видав</th>
                        <th>Дата</th>
                    </tr>";
        foreach ($detailInit as $value) {
            if ($value[2] == 'Отримання') {
                $debitDetails += $value[3];
            } elseif ($value[2] == 'Видача') {
                $kreditDetails += $value[3];
            }
            echo "
                    <tr>
                        <td> " . $value[2] . "</td>
                        <td> " . $value[3] . "</td>
                        <td> " . $value[4] . "</td>
                        <td> " . $value[5] . "</td>
                        <td> " . $value[6] . "</td>
                    </tr>";
        }
        $resultD = 0;
        $resultD = $debitDetails - $kreditDetails;
        echo "<tr>
                        <td>Сума</td>
                        <td>" . $resultD . "</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>";
    }
}
if (!empty($_POST['railway']) && !empty($_POST['time'])) {
    if ($_POST['time'] == 'month') {
        $time = strtotime("-1 month");
    } else if ($_POST['time'] == 'week') {
        $time = strtotime("-1 week");
    } else if ($_POST['time'] == 'day') {
        $time = strtotime("-1 day");
    }
    $TimeCorrection = date('Y-m-d G:i:s', $time);
    $railInit = verification::railwaysWITHtime($_POST['railway'], $TimeCorrection);
    if (!empty($railInit)) {
        $kreditDetails = 0;
        $debitDetails = 0;
        echo "<tr>
                        <th>Кількість</th>
                        <th>Час</th>
                    </tr>";
        foreach ($railInit as $value) {
            echo "
                    <tr>
                        <td> " . $value[2] . "</td>
                        <td> " . $value[3] . "</td>
                    </tr>";
        }
    }
}