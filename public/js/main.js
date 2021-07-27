$(document).ready(()=>{
	new Cursor().tick();
	$(document).on("click", "#signup", (e)=>{
		e.preventDefault();
		new SignUp().show();
	})
	$(document).on("click", "#login", (e)=>{
		e.preventDefault();
		Footer.load_screen("login")
	})
	$(document).on("click", ".footer-cancel", (e)=>{
		e.preventDefault();
		Footer.load_screen("default");
	})
	$(document).on("click", "#footer-login-submit", (e)=>{
		e.preventDefault();
		Footer.login();
	})
});
