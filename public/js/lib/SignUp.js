class SignUp extends Popup {
	constructor(){
		super("/signup", ()=>{this.submit()})
	}
	submit(){
		this.parse(
			"/users/register", 
			Form.collect("#signup-form"), 
			".popup-response",
			(json, tag)=>{this.success(json, tag)}
		)
	}
	success(json, tag){
		super.success(json, tag);
		window.setTimeout(()=>{Popup.close()}, 3000);
	}
}
