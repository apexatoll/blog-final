class SignUp extends Popup {
	constructor(){
		super("/signup", ()=>{this.submit()})
	}
	submit(){
		new Ajax("/users/register", Form.collect("#signup-form")).post((php)=>{console.log(php)});
			//.debug();
		//console.log(Form.collect("#signup-form"))
	}
}
