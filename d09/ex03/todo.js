var next_id = 0;

function write_csv(todo) {
	var str = next_id + ';' + todo;
	$.get('insert.php?str=' + str, function(data, status){
		if (status == 'success')
			add_todom(next_id, todo);
		else
			alert('Error during data save : ' + data + '\nStatus : ' + status + ' was returned');
	});
}

function erase_csv(div) {
	var old_id = div.prop('id');
	$.get('delete.php?id=' + old_id, function(data, status){
		if (status == 'success')
			del_todom(old_id);
		else
			alert('Error during data save : ' + data + '\nStatus : ' + status + ' was returned');
	});
}

function add_todom(id, todo)
{
	var ft_list = $("#ft_list");
	var new_div = $("<div></div>").text(todo);
	new_div.addClass('todo');
	new_div.prop('id', id);
	ft_list.prepend(new_div);
    next_id++;
}

function del_todom(old_id)
{
	$('#' + old_id).remove();
}

$('button').click(function() {
	var todo = prompt("Add new todo");

	if (todo != null && todo != '') {
		write_csv(todo);
	}
});

$('#ft_list').on('click', '.todo', function() {
	if (confirm('Are you sure ?'))
		erase_csv($(this));
});

function init()
{
	$.get('select.php', function(data, status){
		if (status == 'success') {
			var lines = data.split('\n');
			for (i in lines) {
				if (lines[i] != '') {
					var todo = lines[i].split(';')[1];
					var id = lines[i].split(';')[0];
					add_todom(id, todo);
					next_id = parseInt(id) + 1;
				}
			}
		}
		else
			alert('Error during data save : ' + data + '\nStatus : ' + status + ' was returned');
	});
}
