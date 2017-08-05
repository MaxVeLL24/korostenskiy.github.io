<div class="operation">
    <h3 style="font-family: 'Jura', sans-serif">Виконати операцію:</h3>
    <form action="../_smain.php" method="post"
          style="color: black;font-family: 'Jura', sans-serif;width: 75%;margin: 0 auto">
        <select class="form-control" name="railways_operator_id" required>
            <option value="0" disabled="disabled">Вибирайте з списку:</option>
            <?php
            $db = new DB();
            $rlwBalance = $db->find("SELECT `operator_id`,`operator_surname` FROM `railways_balance`")->fetch_all();
            foreach ($rlwBalance as $rlwBalal) {
                echo '<option value="' . $rlwBalal[0] . '" name="' . $rlwBalal[1] . '">' . $rlwBalal[1] . '</option>';
            }
            ?>
        </select><br>
        <input class="form-control oper" type="number" name="rlwCount" placeholder="Кількість" required>
        <br>
        <ul>
            <li><a type="button" data-toggle="modal" data-target="#done">Виконати</a></li>
        </ul>

        <div class="modal fade" id="done" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Підтвердіть операцію</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрити</button>
                        <button type="submit" class="btn btn-primary" value="Так">Так</button>
                    </div>
                </div>
            </div>
        </div>

    </form>
</div>