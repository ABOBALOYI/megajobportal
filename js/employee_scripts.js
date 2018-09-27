'use strict';
var NumberOfItems = $('#jobs .job-list').length;
var LimitPerPage = 5;
$("#jobs .job-list:gt(" +  (LimitPerPage - 1)  + ")").hide();
var TotalPages = Math.round(NumberOfItems / LimitPerPage);
$(".pagination").append("<li class='page-item active'><a class='page-link' href='javascript:void(0);'>" +  1  + "</a></li>");

for(var i= 2; i<= TotalPages; i++){
	$(".pagination").append("<li class='page-item'><a class='page-link' href='javascript:void(0);'>" +  i  + "</a></li>");
}


$(".pagination").append("<li class='' id='next-page'><a class='page-link' href='javascript:void(0);'>Next</a></li>");
$(".pagination li.page-item").on("click", function(){
	if($(this).hasClass("active")){
		return false;
	}else{
		//alert("User Active On Page");
		var CurrentPage = $(this).index();
		$(".pagination li").removeClass("active");
		$(this).addClass("active");
		$('#jobs .job-list').hide();

		var GrandTotal = LimitPerPage * CurrentPage;
		for(var i = GrandTotal - LimitPerPage; i< GrandTotal; i++){
			$("#jobs .job-list:eq(" +  i  + ")").show();
		}
	}
	
});

$("#next-page").on("click", function(){
	var CurrentPage = $(".pagination li.active").index();
	if(CurrentPage === TotalPages){
		return false;
	}else{
		CurrentPage++;
		$(".pagination li").removeClass("active");
		$('#jobs .job-list').hide();
		var GrandTotal = LimitPerPage * CurrentPage;
		for(var i = GrandTotal - LimitPerPage; i< GrandTotal; i++){
			$("#jobs .job-list:eq(" +  i  + ")").show();
		}
		$(".pagination li.page-item:eq(" + (CurrentPage-1) + ")").addClass("active");
	}
});

$("#previous-page").on("click", function(){
	var currentPage = $(".pagination li.active").index();
	if(currentPage === 1){
		return false;
	}else{
		currentPage--;
		$(".pagination li").removeClass("active");
		$('#jobs .job-list').hide();
		var GrandTotal = LimitPerPage * currentPage;
		for(var i = GrandTotal - LimitPerPage; i< GrandTotal; i++){
			$("#jobs .job-list:eq(" +  i  + ")").show();
		}
		$(".pagination li.page-item:eq(" + (currentPage - 1) + ")").addClass("active");
	}
});
//alert(TotalPages);

 