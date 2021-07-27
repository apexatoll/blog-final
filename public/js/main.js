$(document).ready(()=>{
	new Cursor().tick();
	$(document).on("click", "#signup", (e)=>{
		e.preventDefault();
		new SignUp().show();
		//new Popup("/signup", ()=>{console.log("hello")}).show();
		//new Ajax("/signup").get((php)=>{console.log(php)});
	})
});
