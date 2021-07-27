class Exception {
	static show(tag, message){
		$(tag).empty().addClass("error").show()
			.html("<b>Error:</b> "+message);
		window.setTimeout(()=>{
			$(tag).fadeOut(()=>{
				$(tag).empty();
			});
		}, 2000);
	}
}
