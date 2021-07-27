class Form {
	static collect(tag){
		let data = {};
		$(tag).children("input")
			.serializeArray()
			.map((item)=>{
				data[item.name] = item.value
			})
		return data;
	}
}
