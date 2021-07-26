$(document).ready(()=>{
	new Cursor().tick();
	$(document).on("click", "#signup", (e)=>{
		e.preventDefault();
		new Popup("/signup", ()=>{console.log("hello")}).show();
		//new Ajax("/signup").get((php)=>{console.log(php)});
	})
});
