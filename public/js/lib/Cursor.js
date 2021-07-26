class Cursor {
	constructor(){
		this.target = $("header h1 a") 
		this.text   = $(this.target).html();
	}
	cursor(){
		return "<span class='white'>\u2588</span>"
	}
	tick(time=1000){
		window.setTimeout(()=>{
			this.set_text(this.text+this.cursor());
			window.setTimeout(()=>{
				this.set_text(this.text);
				window.setTimeout(this.tick(), time);
			}, time);
		}, time);
	}
	set_text(text){
		$(this.target).html(text)
	}
}
