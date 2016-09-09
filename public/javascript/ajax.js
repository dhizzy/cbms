//ajax function calls

function getVolume() {
	var xhttp = new XMLHttpRequest();
	var e = document.getElementById("issueSelectbox");
	var issueid = e.options[e.selectedIndex].value;

	$.ajax({
		type: "GET",
		url: "/volume/" + issueid,
		success: function(data){
			console.log(data);
		},
		error: function(data){
			console.log("ERROR:", data);
		}
	});


}


function getVolume(){
	var myVal = $("#titleSelectbox").val();

	$.ajax({
		method: "GET",
	    url: './addissue/getvolume',
	    data: {
	        issueid: myVal
	    },
	    datatype: 'JSON',
	    success: function (resp) {
	        $("#volumeContainer").html(resp);
	    },
	    error: function(resp){
	    	console.log("ERROR:", resp);
	    }
	});
}

function getIssues(){
	var volumeid = $("#volumeSelectbox").val();

	$.ajax({
		method: "GET",
		url: './addissue/getissues',
		data: {
			volumeid: volumeid
		},
		datatype: 'JSON',
		success: function(resp){
			$("#issuesContainer").html(resp);
		},
		error: function(resp){
			console.log("ERROR:", resp);
		}
	});
}