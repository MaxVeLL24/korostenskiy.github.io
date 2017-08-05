<div class="operation">
    <h3 style="font-family: 'Jura', sans-serif">Виконати операцію:</h3>
    <form action="../_smain.php" method="post"
          style="color: black;font-family: 'Jura', sans-serif;width: 75%;margin: 0 auto">
        <input class="form-control local_trade" type="text" name="sername" placeholder="Прізвище" required>
        <input class="form-control local_trade" type="number" name="nakladna" placeholder="Номер накладної" required>
        <input class="form-control local_trade" type="number" name="car_number" placeholder="Номер машини" required>
        <input class="form-control local_trade" type="text" name="company_name" placeholder="Назва компанії" required>
        <input class="form-control local_trade" type="text" name="production_type" placeholder="Тип продукції" required>
        <input class="form-control local_trade" type="number" name="given_count" placeholder="Виписано" required>
        <input class="form-control local_trade" type="number" name="taken_count" placeholder="Взято" required>
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