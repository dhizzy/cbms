//ajax function calls


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

function getPublishers(){
	alert("H");
	$.ajax({
		method: "GET",
		url: './publishers/getPublishers',
		data: {
			
		},
		datatype: 'JSON',
		success: function(resp){
			$("#publisherContainer").html(resp);
		},
		error: function(resp){
			console.log("ERROR:", resp);
		}
	});
}