<div class="container signup-body">
	<h2 class="log-h2">Sign Up</h2>
    <p style="color:red;text-align:center;"><?php echo $error ?> </p>      
	<div class="container form-container">
		<form action='/signup' method='POST'>
			<input type='hidden' name='_method' value='post' />
			<?php
				require PARTIALS."/form.name.php";
				require PARTIALS."/form.email.php";
				require PARTIALS."/form.password.php";
				require PARTIALS."/form.password-confirm.php";
			?>
			<input type='submit' value='Sign up' />
		</form>
	</div>
</div>


