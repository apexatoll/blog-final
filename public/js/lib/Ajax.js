class Ajax {
	parse(url, data=null, tag,
		success = (php, tag)=>{this.success(php, tag)}, 
		error   = (php, tag)=>{this.error(php, tag)}){
		this.post(url, data, (php)=>{
			this.parse_response(php, tag, success, error);
		})
		//this.send_request("POST", url, data, (php)=>{
			//this.parse_response(php, tag, success, error);
		//})
	}
	post(url, data=null, callback){
		this.send_request("POST", url, data, (php)=>{
			callback(php);
		})
	}
	get(url, data=null, callback){
		this.send_request("GET", url, data, (php)=>{
			callback(php)
		})
	}
	debug(url, data=null, type="POST"){
		this.send_request(type, url, data, (php)=>{
			console.log(php)
		})
	}
	parse_response(php, tag, success, error){
		let json = JSON.parse(php);
		json.success ? success(json, tag) : error(json, tag);
	}
	send_request(type, url, data, callback){
		$.ajax({
			type:type,
			url:url, 
			data:data,
			success:(php)=>{ callback(php) }
		});
	}
	success(json, tag){
		Response.success(json.message, tag);
	}
	error(json, tag){
		Response.error(json.message, tag);
	}
}
