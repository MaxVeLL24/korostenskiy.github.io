<div class="operation">
    <h3 style="font-family: 'Jura', sans-serif">Виконати операцію:</h3>
    <form action="../main.php" method="post"
          style="color: black;font-family: 'Jura', sans-serif;width: 75%;margin: 0 auto">
        <select class="form-control" name="pmmId" required>
            <option value="0" disabled="disabled">Вибирайте з списку:</option>
            <?php
            $db = new DB();
            $pmmBalance = $db->find("SELECT * FROM `pmmBalance` ORDER BY `pmm_id`")->fetch_all();
            foreach ($pmmBalance as $pmmBalal) {
                echo '<option value="' . $pmmBalal[0] . '" name="' . $pmmBalal[1] . '">' . $pmmBalal[1] . '</option>';
            }
            ?>
        </select><br>
        <input class="form-control oper" type="number" name="pmmCount" placeholder="Кількість" required>
        <input class="form-control oper" type="text" name="taker" placeholder="Хто бере" required>
        <input class="form-control oper" type="text" name="giver" placeholder="Хто видає" required
               value="<?= $_POST['pmmLogin'] ?>">
        <br>
        <input name="Give" type="submit" value="Видача">
        <input name="Take" type="submit" value="Отримання">
    </form>
</div>