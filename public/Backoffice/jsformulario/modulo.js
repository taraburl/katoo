 

var page = 1;
var current_page = 1;
var total_page = 0;
var is_ajax_fire = 0;

manageData();

 $(document).ready(function(){
//$('.modal-trigger').leanModal();
  });
function manageData() {
    $.ajax({
        dataType: 'json',
        url: url,
        data: {page:page}
    }).done(function(data){

    	total_page = data.last_page;
    	current_page = data.current_page;

    	$('#pagination').twbsPagination({
	        totalPages: total_page,
	        visiblePages: current_page,
	        onPageClick: function (event, pageL) {
	        	page = pageL;
                if(is_ajax_fire != 0){
	        	  getPageData();
                }
	        }
	    });

    	manageRow(data.data);
        is_ajax_fire = 1;
    });
}
/* Generar token*/
$.ajaxSetup({
    headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
});


/* Obtener pagina data*/
function getPageData() {
    debugger;
	$.ajax({
    	dataType: 'json',
    	url: url,
    	data: {page:page}
	}).done(function(data){

		manageRow(data.data);
	});
}
/*Agregar item nuevo a la tabla */
function manageRow(data) {
           
	var	rows = '';
    var tabladatos = $('#datos');
    $('#datos').empty();
	$.each( data, function( key, value ) {
   tabladatos.append("<tr>" +
                    "<td>" + value.id + "</td>" +
                    "<td>" + value.nombre + "</td>" +
                    "<td data-id="+value.id+"><button data-toggle='modal' data-target='#edit-item' class='btn btn-primary edit-item'>Edit</button>" +
                    " <button class='btn btn-danger remove-item'>Delete</button>" +
                    "</td>" +
                    "</tr>");


	});

      //   $('.modal-trigger').leanModal(); 
	//$("tbody").html(rows);
}
/* Crear nuevo */
$(".crud-submit").click(function(e){
    e.preventDefault();
    var form_action = $("#create-item").find("form").attr("action");
    debugger;
    var nombre = $("#create-item").find("input[name='nombre']").val();
    

    $.ajax({
        dataType: 'json',
        type:'POST',
        url: form_action,
        data:{nombre:nombre}
    }).done(function(data){
        getPageData();
        $(".modal").modal('hide');
        //toastr.success('Item Created Successfully.', 'Success Alert', {timeOut: 5000});
         $("#create-item").find("input[name='nombre']").val('');
 
         swal('Guardado Correctamente!',':)','success');
         $("#create-item").closeModal();
    });

});


