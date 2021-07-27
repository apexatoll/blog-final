class Response {
	static success(message, tag){
		message = Response.bold("Success: ") + message
		Response.show(message, tag, "success")
	}
	static error(message, tag){
		message = Response.bold("Error: ") + message
		Response.show(message, tag, "error")
	}
	static bold(message){
		return "<b>"+message+"</b>";
	}
	static show(message, tag, cls){
		$(tag).empty()
			.addClass(cls)
			.show()
			.html(message);
		Response.clear(tag, cls);
	}
	static clear(tag, cls){
		window.setTimeout(()=>{
			$(tag).fadeOut(()=>{ $(tag).empty().removeClass(cls) })
		}, 2000);
	}
}
