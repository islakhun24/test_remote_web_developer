
<html>
<head>
    <title>Test 1</title>
    
 <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    
</head>
<body>
 <div class="container box">
  <p id="judul"></p>
  <div id="content" class="row">
	  
  </div>
  
  <nav align="right" aria-label="Page navigation">
	<nav  aria-label="Page navigation example">
		<ul class="pagination">
		</ul>
		</nav>
	</nav>

	<div class="modal fade" id="detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Detail User</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
			
			<div class="form-group">
				<img class="mr-3" src="" id="img-es">
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">Email</label>
				<input type="text" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" readonly>
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">Last Name</label>
				<input type="text" class="form-control" id="last_name" aria-describedby="emailHelp" placeholder="Enter email" readonly>
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">First Name</label>
				<input type="text" class="form-control" id="first_name" aria-describedby="emailHelp" placeholder="Enter email" readonly>
			</div>
		</div>
	</div>
</body>
<script src="assets/js/jquery.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="assets/js/bootstrap.min.js"></script>
</html>
<script>
$(document).ready(function(){

	
	
 function load_country_data(page)
 {
  $.ajax({
   url:"https://reqres.in/api/users?page="+page,
   method:"GET",
   dataType:"json",
   success:function(data)
   {
	// $('#country_table').html(data.country_table);
	var content = '';


	(data.data).map(val=>{
		$('.judul').html('<h3 href="'+data.support.url+'">'+data.support.text+'</h3>');
		// console.log(val)
		content += '<div  class="col-xl-12"><div class="media"><img class="mr-3" src="'+val.avatar+'" alt="Generic placeholder image"><div class="media-body"><a data-toggle="modal" id="op-det" data-id="'+val.id+'" href="#detail" ><h5 class="mt-0">'+val.email+'</h5></a><p class="">'+val.first_name+'</p><p class="">'+val.last_name+'</p></div></div></div>';
	})
	$('#content').html(content);
	var htmls = '';
	for(var i = 1; i<=data.total_pages; i++){
		if(i==1){
			htmls+= '<li class="page-item disabled"><a class="page-link">Previous</a></li>';
		}
		if(i==data.page){
			htmls += '<li class="page-item active"><a class="page-link" >'+i+'</a></li>';;
			
		}
		if( i !=data.page){
			htmls+= '<li class="page-item "><a class="page-link" >'+i+'</a></li>';
		}
		if(data.total_pages ===i){
			htmls+= '<li class="page-item disabled"><a class="page-link" >Next</a></li>';
		}
		
	}
	$('.pagination').html(htmls);
	// $('.pagination').html('<li class="page-item"><a class="page-link" href="#">Next</a></li>');

	

	$("#op-det").click(function () {
		var id = $(this).data('id')
        $.ajax({
			url:"https://reqres.in/api/users/"+id,
			method:"GET",
			dataType:"json",
			success:function(data){
				$('#email').val(data.data.email)
				$('#first_name').val(data.data.first_name)
				$('#last_name').val(data.data.last_name)
				console.log(data.data.avatar)
				$('#img-es').attr("src", data.data.avatar);
			}

		})
	});



   }
  });
 }
 
 load_country_data(1);

 $(document).on("click", ".page-item a", function(event){
  event.preventDefault();
  console.log(page);
  var page = $(this).text();
  load_country_data(page);
 });


 
});
</script>
