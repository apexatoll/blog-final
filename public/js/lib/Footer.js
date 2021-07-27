class Footer extends Ajax{
	static load_screen(screen){
		new Ajax().post( "/footer/"+screen, null, 
			(php)=>{$("footer").html(php)})
	}
	static login(){
		new Ajax().post("/users/login", Form.collect("#footer-login"), (php)=>{console.log(php)})
	}
}
