class Ajax {
	constructor(path, data=null){
		this.path = path;
		this.data = data;
	}
	post(callback){
		this.send("POST", callback);
	}
	get(callback){
		this.send("GET", callback);
	}
	send(method, callback){
		$.ajax({
			type:method,
			url:this.path,
			data:this.data,
			success:(php)=>{
				callback(php);
			}
		});
	}
}
