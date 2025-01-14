<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-borderless table-responsive-lg table-responsive-md table-responsive-sm text-center">
                        <thead class="bg-primary">
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th width="15%">Menu</th>
                        </thead>
                        <tbody>
                            <?php foreach ($events as $row) : ?>
                                <tr>
                                    <td>
                                        <?= $this->lib->ConvertDate($row['start_date'])[2] . // Days
                                            '-' . $this->lib->ConvertDate($row['start_date'])[1] . // Month
                                            '-' . '20' . $this->lib->ConvertDate($row['start_date'])[0] . // Years
                                            ' ' . $this->lib->ConvertDate($row['start_date'])[3] . // Hours
                                            ':' . $this->lib->ConvertDate($row['start_date'])[4] // Minutes
                                        ?>
                                    </td>
                                    <td>
                                        <?= $this->lib->ConvertDate($row['end_date'])[2] . // Days
                                            '-' . $this->lib->ConvertDate($row['end_date'])[1] . // Month
                                            '-' . '20' . $this->lib->ConvertDate($row['end_date'])[0] . // Years
                                            ' ' . $this->lib->ConvertDate($row['end_date'])[3] . // Hours
                                            ':' . $this->lib->ConvertDate($row['end_date'])[4] // Minutes
                                        ?>
                                    </td>
                                    <td><input type="button" id="delete" class="btn btn-outline-danger text-white" value="Delete" onclick="Do_Delete('delete', '<?= $this->lib->ConvertDate($row['start_date'])[0] . $this->lib->ConvertDate($row['start_date'])[1] . $this->lib->ConvertDate($row['start_date'])[2] . $this->lib->ConvertDate($row['start_date'])[3] . $this->lib->ConvertDate($row['start_date'])[4] ?>')"></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <?= form_open('', 'id="update_form" autocomplete="off"') ?>
                    <div class="form-group row">
                        <label class="col-form-label">Start Date</label>
                        <input type="datetime-local" id="start_date" class="form-control">
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label">End Date</label>
                        <input type="datetime-local" id="end_date" class="form-control">
                    </div>
                    <div class="form-group text-center">
                        <input type="submit" id="submit" class="btn btn-outline-primary text-white" value="Submit">
                    </div>
                    <?= form_close() ?>
                    <script>
                        var CSRF_TOKEN = '<?= $this->security->get_csrf_hash() ?>';
                        var RETRY = 0;

                        function Do_Delete(button_id, start_date) {
                            SetAttribute(button_id, 'button', 'Processing...');
                            $.ajax({
                                url: '<?= base_url('adm/eventsmanagement/quest/do_delete') ?>',
                                type: 'POST',
                                dataType: 'JSON',
                                data: {
                                    '<?= $this->security->get_csrf_token_name() ?>': CSRF_TOKEN,
                                    'start_date': start_date
                                },
                                success: function(data) {
                                    var GetString = JSON.stringify(data);
                                    var Result = JSON.parse(GetString);

                                    SetAttribute(button_id, 'button', 'Delete');
                                    ShowToast(2000, 'success', Result.message);
                                    CSRF_TOKEN = Result.token;
                                    setTimeout(() => {
                                        window.location.reload();
                                    }, 2000);
                                },
                                error: function() {
                                    SetAttribute(button_id, 'button', 'Delete');
                                    ShowToast(2000, 'error', 'Failed To Delete This Events.');
                                    setTimeout(() => {
                                        window.location.reload();
                                    }, 2000);
                                }
                            });
                        }
                        $(document).ready(function(e) {
                            $('#update_form').on('submit', function(e) {
                                e.preventDefault();

                                if ($('#start_date').val() == '' || $('#start_date').val() == null) {
                                    ShowToast(2000, 'warning', 'Start Date Cannot Be Empty.');
                                    return;
                                } else if ($('#end_date').val() == '' || $('#end_date').val() == null) {
                                    ShowToast(2000, 'warning', 'End Date Cannot Be Empty.');
                                    return;
                                } else {
                                    SetAttribute('submit', 'button', 'Processing...');

                                    $.ajax({
                                        url: '<?= base_url('adm/eventsmanagement/quest/do_update') ?>',
                                        type: 'POST',
                                        dataType: 'JSON',
                                        data: {
                                            '<?= $this->security->get_csrf_token_name() ?>': CSRF_TOKEN,
                                            'start_date': $('#start_date').val(),
                                            'end_date': $('#end_date').val()
                                        },
                                        success: function(data) {
                                            var GetString = JSON.stringify(data);
                                            var Result = JSON.parse(GetString);

                                            if (Result.response == 'true') {
                                                SetAttribute('submit', 'submit', 'Submit');
                                                ShowToast(2000, 'success', Result.message);
                                                CSRF_TOKEN = Result.token;
                                                setTimeout(() => {
                                                    window.location.reload();
                                                }, 2000);
                                            } else if (Result.response == 'false') {
                                                SetAttribute('submit', 'submit', 'Submit');
                                                ShowToast(2000, 'error', Result.message);
                                                CSRF_TOKEN = Result.token;
                                                return;
                                            } else {
                                                SetAttribute('submit', 'submit', 'Submit');
                                                ShowToast(2000, 'error', Result.message);
                                                CSRF_TOKEN = Result.token;
                                                return;
                                            }
                                        },
                                        error: function() {
                                            ShowToast(1000, 'info', 'Generate Request Token...');

                                            $.ajax({
                                                url: '<?= base_url('api/security/csrf') ?>',
                                                type: 'GET',
                                                dataType: 'JSON',
                                                data: {
                                                    '<?= $this->lib->GetTokenName() ?>': '<?= $this->lib->GetTokenKey() ?>'
                                                },
                                                success: function(data) {
                                                    var GetString = JSON.stringify(data);
                                                    var Result = JSON.parse(GetString);

                                                    if (Result.response == 'true') {
                                                        CSRF_TOKEN = Result.token;
                                                    }

                                                    return Do_Update();

                                                },
                                                error: function() {
                                                    SetAttribute('submit', 'submit', 'Submit');
                                                    ShowToast(2000, 'error', 'Failed To Update Events.');
                                                    setTimeout(() => {
                                                        window.location.reload();
                                                    }, 2000);
                                                }
                                            });
                                        }
                                    });
                                }
                            });
                        })

                        function Do_Update() {
                            if ($('#start_date').val() == '' || $('#start_date').val() == null) {
                                ShowToast(2000, 'warning', 'Start Date Cannot Be Empty.');
                                return;
                            } else if ($('#end_date').val() == '' || $('#end_date').val() == null) {
                                ShowToast(2000, 'warning', 'End Date Cannot Be Empty.');
                                return;
                            } else {
                                SetAttribute('submit', 'button', 'Processing...');

                                $.ajax({
                                    url: '<?= base_url('adm/eventsmanagement/quest/do_update') ?>',
                                    type: 'POST',
                                    dataType: 'JSON',
                                    data: {
                                        '<?= $this->security->get_csrf_token_name() ?>': CSRF_TOKEN,
                                        'start_date': $('#start_date').val(),
                                        'end_date': $('#end_date').val()
                                    },
                                    success: function(data) {
                                        var GetString = JSON.stringify(data);
                                        var Result = JSON.parse(GetString);

                                        if (Result.response == 'true') {
                                            SetAttribute('submit', 'submit', 'Submit');
                                            ShowToast(2000, 'success', Result.message);
                                            CSRF_TOKEN = Result.token;
                                            setTimeout(() => {
                                                window.location.reload();
                                            }, 2000);
                                        } else if (Result.response == 'false') {
                                            SetAttribute('submit', 'submit', 'Submit');
                                            ShowToast(2000, 'error', Result.message);
                                            CSRF_TOKEN = Result.token;
                                            return;
                                        } else {
                                            SetAttribute('submit', 'submit', 'Submit');
                                            ShowToast(2000, 'error', Result.message);
                                            CSRF_TOKEN = Result.token;
                                            return;
                                        }
                                    },
                                    error: function() {
                                        SetAttribute('submit', 'submit', 'Submit');
                                        ShowToast(2000, 'error', 'Failed To Update Events.');
                                        setTimeout(() => {
                                            window.location.reload();
                                        }, 2000);
                                    }
                                });
                            }
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>