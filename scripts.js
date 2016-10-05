$(document).ready(function() {
 
    $('#test').click(function(event) {
 
        alert( "Thanks for visiting!" );
 
    });	 

 	// handler for Add button
	$('#Add').click(function(e) {
		e.preventDefault();
		//get current task text
		var encoded_task_text =  htmlEncode($('#task-name').val());
		//task_text = htmlencode(task_text);
		//Checking for empty task
		if(encoded_task_text == ""){
			alert("Please enter some text");
			$('#task-name').attr('placeholder','Please enter some text');
		} else {
		Add_new_task(encoded_task_text);
		}
    });

	$("tbody").on("click", "button.btn.btn-danger:contains('Delete')", function(e) {
		var id = $(this).parent('td').parent('tr').attr("id");
		$(this).parent('td').parent('tr').remove();
		//convert id html-element to id DB-element
		var id_task = parseInt(id.replace(/task_/g, ''));
		Delete_task_from_db(id_task);
    });


	$("tbody").on("click", "button.btn.btn-danger:contains('Edit')", function(e) {
		var id = $(this).parent('td').parent('tr').attr("id");
		var task_text = $(this).parent('td').prev('td').prev('td').children('div').text();
		//$(this).parent('td').prev('td').prev('td').children('div').remove();
		$("#" + id +' td:first').children('div').remove();
		$("#" + id +' td:first').append('<input type="text" id="In_edit_task" class="form-control" value="'+ task_text + '">');
		$("#" + id +' td:first').children('input').focus();
		$(this).text('');
		$(this).append('<i class="fa fa-btn fa-save"></i>Save');
    });



    $("tbody").on("click", "button.btn.btn-danger:contains('Save')", function(e) {
		var full_id = $(this).parent('td').parent('tr').attr("id");
		//convert id html-element to id DB-element
		var DB_id = parseInt(full_id.replace(/task_/g, ''));
		var encoded_task_text = htmlEncode($(this).parent('td').prev('td').prev('td').children('input').val());
		$(this).parent('td').prev('td').prev('td').children('input').remove();
		$(this).parent('td').prev('td').prev('td').append('<div>' + encoded_task_text + '</div>');
		$(this).text('');
		$(this).append('<i class="fa fa-btn fa-pencil"></i>Edit');
		//task_text = htmlEncode(task_text);
		Update_task_text(encoded_task_text, DB_id);
    });




	$("tbody").on("click", "td.table-text", function(e) {
		var full_id = $(this).parent().attr("id");
		var id = parseInt(full_id.replace(/task_/g, ''));
		if($(this).parent().css("background-color") == "rgb(204, 238, 204)"){
			var collor = "rgb(256, 256, 256)";
			var task_status = 0;
		}
		else{
			var collor = "rgb(204, 238, 204)";
			var task_status = 1;
		}
		Change_task_status(task_status, id, full_id,collor);

    });

	function Update_task_text(task_text, id){
            $.ajax({
                type: "POST",
                url: "/update_task.php",
                data: {
                    id_task: id,
                    task_text: task_text
                }
            });
        }


	function Change_task_status(task_status, id, full_id, collor){
        var is_done = task_status;
            $.ajax({
                type: "POST",
                url: "/change_status_task.php",
                data: {
                    id_task: id,
                    status: is_done
                },
                success: function(data){
                    $("#" + full_id).css("background-color", collor);
                }
            });
        }

    function Add_new_task(task_text){
    	$.ajax({
		    type: "POST",
		    url: "/newtask.php",
		    data: {
		    	task: task_text
		 	},
		    dataType: "json",
		    success: function(data){
			  	//Add new task-block on the page
		      	$('#current').append('<tr id="task_' + data.id + '"><td class="table-text"><div>' + task_text + '</div></td><td><button class="btn btn-danger"><i class="fa fa-btn fa-trash"></i>Delete</button></td><td><button class="btn btn-danger"><i class="fa fa-btn fa-pencil"></i>Edit</button></td></tr>');
				//Clean input form
				$('#task-name').val("");
			}
		});
    }   


	//delete task from db throw id
    function Delete_task_from_db(id){
    	$.post(
		  "/delete_task.php",
		  {
		    id_task: id
		  }
		);
    }

    function htmlEncode(value){
	  //create a in-memory div, set it's inner text(which jQuery automatically encodes)
	  //then grab the encoded contents back out.  The div never exists on the page.
	  return $('<div/>').text(value).html();
	}
});
