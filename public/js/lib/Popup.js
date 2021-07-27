class Popup extends Ajax {
	constructor(path, submit, cancel=()=>{Popup.close()}){
		super();
		this.path = path
		this.bind_buttons(submit, cancel);
	}
	show(){
		this.post(this.path, null, (php)=>{ 
			$("#window").append(php) 
		});
	}
	bind_buttons(submit, cancel){
		[submit, cancel].map((callback, i)=>{
			$(document).on("click", Popup.button_tags()[i], ()=>{
				callback();
			})
		})
	}
	static unbind_buttons(){
		Popup.button_tags().map((tag)=>{
			$(document).off("click", tag);
		})
	}
	static button_tags(){
		return [".popup-submit", ".popup-cancel"];
	}
	static close(){
		$(".fullscreen").remove();
		Popup.unbind_buttons();
	}
}
