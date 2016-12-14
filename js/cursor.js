$(document).ready(function() {
	$("#box2").click(function(){
		$("a-cursor").attr("color","red");
		//console.log("test hover");
	});
	$("#box1").mouseup(function(){
		$("#modal").css("width","200px");
	});
	$("#box1").mousedown(function(){
		$("#modal").css("width","500px");
	});
});