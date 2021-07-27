class Ajax {
	constructor(path, data=null){
		this.path = path;
		this.data = data;
	}
	post(success=(json)=>{this.success(json)}, error=(json)=>{this.error(json)}){
		this.send_request("POST", (php)=>{this.parse_response(php, success, error)});
	}
	get(callback){
		this.send_request("GET", callback);
	}
	debug(){
		this.send_request("POST", (php)=>{console.log(php)})
	}
	parse_response(php, success, error){
		let json = JSON.parse(php)
		json.success ? success(json) : error(json);
	}
	success(json){
		console.log(json.success);
		console.log(json.message)
	}
	error(json){
		Exception.show(".popup-response", json.message);
	}
	send_request(method, callback){
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
