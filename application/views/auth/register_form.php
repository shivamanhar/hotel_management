<?php
$email = array(
	'name'	=> 'email',
	'id'	=> 'email',
	'value'	=> set_value('email'),
	'maxlength'	=> 80,
	'class'	=> 'form-control',
);
$firstname = array(
	'name'	=> 'firstname',
	'id'	=> 'firstname',
	'value'	=> set_value('firstname'),
	'maxlength'	=> 20,
	'class'	=> 'form-control',
);
$lastname = array(
	'name'	=> 'lastname',
	'id'	=> 'lastname',
	'value'	=> set_value('lastname'),
	'maxlength'	=> 20,
	'class'	=> 'form-control',
);
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'value' => set_value('password'),
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'class'	=> 'form-control',
);
$confirm_password = array(
	'name'	=> 'confirm_password',
	'id'	=> 'confirm_password',
	'value' => set_value('confirm_password'),
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'class'	=> 'form-control',
);
$captcha = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'maxlength'	=> 8,
);


$error_message = '';
if( form_error($email['name']) !=''){
$error_message = "<small class=\"error\">".str_replace("Login field", "Email field", form_error($email['name']) )."</small>";
}

if(isset($errors[$email['name']])){
$error_message .= "<small class=\"error\">".str_replace("Login", "Email", $errors[$email['name']] )."</small>";
}

if( form_error($firstname['name']) !='' ){
$error_message .= "<small class=\"error\">".form_error($firstname['name'])."</small>";
}

if(isset($errors[$firstname['name']])){
$error_message .= "<small class=\"error\">".$errors[$firstname['name']]."</small>";
}

if( form_error($lastname['name']) !='' ){
$error_message .= "<small class=\"error\">".form_error($lastname['name'])."</small>";
}

if(isset($errors[$lastname['name']])){
$error_message .= "<small class=\"error\">".$errors[$lastname['name']]."</small>";
}

if( form_error($password['name']) !='' ){
$error_message .= "<small class=\"error\">".form_error($password['name'])."</small>";
}

if( form_error($confirm_password['name']) !='' ){
$error_message .= "<small class=\"error\">".form_error($confirm_password['name'])."</small>";
}

$captcha_content = '';
if ($captcha_registration) {
	if ($use_recaptcha) {
		$captcha_content = '
		<div id="account-signup-divider" class="shared-divider">
			<div class="shared-divider-label">
				<span>Confirmation Code</span>
			</div>
		</div>

		<div id="recaptcha_image"></div>
		<a href="javascript:Recaptcha.reload()">Get another CAPTCHA</a>
		<div class="recaptcha_only_if_image"><a href="javascript:Recaptcha.switch_type(\'audio\')">Get an audio CAPTCHA</a></div>
		<div class="recaptcha_only_if_audio"><a href="javascript:Recaptcha.switch_type(\'image\')">Get an image CAPTCHA</a></div>

		<div class="recaptcha_only_if_image">Enter the words above</div>
		<div class="recaptcha_only_if_audio">Enter the numbers you hear</div>
		<input type="text" id="recaptcha_response_field" name="recaptcha_response_field" />

		<div id="account-signup-divider" class="shared-divider"></div>
		';

		$captcha_content .= $recaptcha_html;
	} else {
		$captcha_content = '
		<div id="account-signup-divider" class="shared-divider">
			<div class="shared-divider-label">
				<span>Confirmation Code</span>
			</div>
		</div>

		<p>Enter the code exactly as it appears:</p>
		'.$captcha_html.'
		<p>'.form_label('Confirmation Code', $captcha['id']).'</p>
		<p>'.form_input($captcha).'</p>

		<div id="account-signup-divider" class="shared-divider"></div>
		';
	}
}

if( form_error('recaptcha_response_field') !=''){
$error_message = "<small class=\"error\">".form_error('recaptcha_response_field')."</small>";
}

if( form_error($captcha['name']) !=''){
$error_message = "<small class=\"error\">".form_error($captcha['name'])."</small>";
}
?>


				<div class="login-window">
					<div id="header">
						<h1>Register</h1>
					</div>
					
					<?php echo $error_message; ?>

					<div class="row left10">

						<?php echo form_open($this->uri->uri_string(), array('class'=>'nicely')); ?>
						<table>
							<tr><td style="text-align:left"> <?php echo form_label('Email', $email['id']); ?> </td><td style="text-align:left"><?php echo form_input($email); ?></td></tr>
							<tr><td style="text-align:left"> <?php echo form_label('First Name', $firstname['id']); ?> </td><td style="text-align:left"><?php echo form_input($firstname); ?></td></tr>
							<tr><td style="text-align:left"> <?php echo form_label('Last Name', $lastname['id']); ?> </td><td style="text-align:left"><?php echo form_input($lastname); ?></td></tr>
							
							<tr><td style="text-align:left"> <?php echo form_label('Password', $password['id']); ?> </td><td style="text-align:left"><?php echo form_password($password); ?></td></tr>
							<tr><td style="text-align:left"> <?php echo form_label('Confirm Password', $confirm_password['id']); ?></td><td style="text-align:left"> <?php echo form_password($confirm_password); ?></td></tr>
							<tr><td style="text-align:left"></td><td><?php echo $captcha_content; ?></td></tr>
							<tr><td colspan="2"><button type="submit" id="loginBtn"  class="btn btn-primary btn-xl page-scroll">Register</button></td></tr>
						</table>
						
						</form>
					</div>

					<!-- <div id="account-signup-divider" class="shared-divider">
						<div class="shared-divider-label">
							<span>or Register with</span>
						</div>
					</div>
					<div id="connect-with-buttons">
						<a href="<?php// echo base_url();?>auth_oa2/session/facebook" class="connect-with-button account-sprites account-sprites-facebook" title="Facebook Connect"></a>
						<a href="<?php //echo base_url();?>auth_oa2/session/google" class="connect-with-button marginleft13 account-sprites account-sprites-google" title="Google"></a>
					</div> -->
				</div>
