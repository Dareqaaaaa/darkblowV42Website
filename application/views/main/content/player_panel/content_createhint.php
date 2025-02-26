<div class="nk-main">
	<div class="container">
		<div class="nk-gap-2"></div>
		<h3 class="nk-decorated-h-2"><span class="text-main-1">
				<?= $this->lang->line('STR_DARKBLOW_183') ?> <span class="text-white">
					<?= $this->lang->line('STR_DARKBLOW_184') ?>
				</span>
			</span></h3>
		<div class="nk-gap-2"></div>
		<div class="nk-gap-2"></div>
		<div class="row vertical-gap justify-content-center">
			<div class="col-lg-6">
				<?= form_open('', 'id="createhint_form" autocomplete="off"') ?>
				<div class="form-group">
					<label>
						<?= $this->lang->line('STR_DARKBLOW_21') ?>
					</label>
					<select class="form-control" id="hint_question" required>
						<option value="" disabled selected>
							Select Your Hint Question
						</option>
						<option value="What was your childhood nickname?">
							What was your childhood nickname?
						</option>
						<option value="What is the name of your favorite childhood friend?">
							What is the name of your favorite childhood friend?
						</option>
						<option value="In what city or town did your mother and father meet?">
							In what city or town did your mother and father meet?
						</option>
						<option value="What is your favorite team?">
							What is your favorite team?
						</option>
						<option value="What is your favorite movie?">
							What is your favorite movie?
						</option>
						<option value="What was your favorite sport in high school?">
							What was your favorite sport in high school?
						</option>
						<option value="What was your favorite food as a child?">
							What was your favorite food as a child?
						</option>
						<option value="What is the first name of the boy or girl that you first kissed?">
							What is the first name of the boy or girl that you first kissed?
						</option>
						<option value="What was the make and model of your first car?">
							What was the make and model of your first car?
						</option>
						<option value="What was the name of the hospital where you were born?">
							What was the name of the hospital where you were born?
						</option>
						<option value="Who is your childhood sports hero?">
							Who is your childhood sports hero?
						</option>
						<option value="What school did you attend for sixth grade?">
							What school did you attend for sixth grade?
						</option>
						<option value="What was the last name of your third grade teacher?">
							What was the last name of your third grade teacher?
						</option>
						<option value="In what town was your first job?">
							In what town was your first job?
						</option>
						<option value="What was the name of the company where you had your first job?">
							What was the name of the company where you had your first job?
						</option>
					</select>
				</div>
				<div class="form-group">
					<label>Hint Answer</label>
					<input type="text" id="hint_answer" class="form-control" placeholder="<?= $this->lang->line('STR_DARKBLOW_24') ?>">
				</div>
				<div class="form-group">
					<label>Password</label>
					<div class="row">
						<div class="col-9">
							<input type="password" id="password" class="form-control" placeholder="<?= $this->lang->line('STR_DARKBLOW_43') ?>" minlength="4" maxlength="16">
						</div>
						<div class="col-3">
							<input type="button" id="show_password" class="nk-btn nk-btn-rounded nk-btn-outline nk-btn-color-main-5" value="Show" onclick="ShowPassword()">
						</div>
					</div>
				</div>
				<div class="nk-gap-1"></div>
				<div class="form-group text-center">
					<input id="submit" type="submit" class="nk-btn nk-btn-rounded nk-btn-outline nk-btn-color-main-5" value="<?= $this->lang->line('STR_DARKBLOW_185') ?>">
				</div>
				<?= form_close() ?>
				<script>
					var CSRF_TOKEN = '<?= $this->security->get_csrf_hash() ?>';
					var RETRY = 0;
					$(document).ready(function() {
						$('#createhint_form').on('submit', function(e) {
							e.preventDefault();

							return Do_CreateNewHint();
						});
					});

					function Do_CreateNewHint() {
						if ($('#hint_question').val() == "") {
							ShowToast(2000, 'warning', '<?= $this->lang->line('STR_WARNING_10') ?>');
							return;
						} else if ($('#hint_answer').val() == "") {
							ShowToast(2000, 'warning', '<?= $this->lang->line('STR_WARNING_3') ?>');
							return;
						} else if ($('#password').val() == "") {
							ShowToast(2000, 'warning', '<?= $this->lang->line('STR_WARNING_4') ?>');
							return;
						} else {
							SetAttribute('submit', 'button', '<?= $this->lang->line('STR_INFO_8') ?>');
							$.ajax({
								url: '<?= base_url('player_panel/create_hint/do_create') ?>',
								type: 'POST',
								dataType: 'JSON',
								data: {
									'<?= $this->security->get_csrf_token_name() ?>': CSRF_TOKEN,
									'hint_question': $('#hint_question').val(),
									'hint_answer': $('#hint_answer').val(),
									'password': $('#password').val()
								},
								success: function(data) {
									var decodeString = JSON.stringify(data);
									var decodeParse = JSON.parse(decodeString);

									if (decodeParse.response == 'true') {
										SetAttribute('submit', 'submit', '<?= $this->lang->line('STR_DARKBLOW_185') ?>');
										CSRF_TOKEN = decodeParse.token;
										ShowToast(2000, 'success', decodeParse.message);
										setTimeout(() => {
											window.location = '<?= base_url('player_panel/home') ?>';
										}, 2000);
									} else {
										SetAttribute('submit', 'submit', '<?= $this->lang->line('STR_DARKBLOW_185') ?>');
										CSRF_TOKEN = decodeParse.token;
										ShowToast(2000, 'error', decodeParse.message);
										return;
									}
								},
								error: function() {
									if (RETRY >= 3) {
										SetAttribute('submit', 'submit', '<?= $this->lang->line('STR_DARKBLOW_185') ?>');
										ShowToast(2000, 'error', '<?= $this->lang->line('STR_ERROR_21') ?>');
										setTimeout(() => {
											window.location.reload();
										}, 2000);
									} else {
										RETRY += 1;

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

												return Do_CreateNewHint();
											},
											error: function() {
												ShowToast(2000, 'error', '<?= $this->lang->line('STR_ERROR_21') ?>');
												setTimeout(() => {
													window.location.reload();
												}, 2000);
											}
										});
									}
								}
							});
						}
					}

					function ShowPassword() {
						var Button_01 = document.getElementById('password');
						var Button_02 = document.getElementById('show_password');

						if (Button_01.type == 'text') {
							Button_01.setAttribute('type', 'password');
							Button_02.setAttribute('value', 'Show');
						} else if (Button_01.type == 'password') {
							Button_01.setAttribute('type', 'text');
							Button_02.setAttribute('value', 'Hide');
						}
					}
				</script>
			</div>
		</div>
		<div class="nk-gap-2"></div>
	</div>
</div>