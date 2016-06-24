var nb_cookies = 0;

function createCookie(name,value,days) {
	var date = new Date();
	date.setTime(date.getTime()+(days*24*60*60*1000));
	var expires = "; expires="+date.toGMTString();
	document.cookie = name+"="+value+expires+"; path=/";
}

function eraseCookie(name) {
	createCookie(name,"",-1);
}

function add_todo(input)
{
	var ft_list = $("#ft_list");
	var new_div = $("<div></div>").text(input);
	new_div.addClass('todo');
	new_div.prop('name', 'todo' + nb_cookies);
	ft_list.prepend(new_div);
    createCookie('todo' + nb_cookies, input, 7);
    nb_cookies++;
}

function del_todo(div)
{
	if (confirm('Are you sure ?')) {
		var cookie = div.prop('name');
		div.remove();
		eraseCookie(cookie);
    	nb_cookies--;
	}
}

$('button').click(function() {
	var input = prompt("Add new todo");

	if (input != null && input != '')
		add_todo(input);
});

$('#ft_list').on('click', '.todo', function() {
	del_todo($(this));
});

function init()
{
	var cookies = document.cookie.split('; ');

	if (cookies != '') {
		for (i in cookies) {
			var cookie = cookies[i].split('=');
			eraseCookie(cookie[0]);
			add_todo(cookie[1]);
		}
	}
}
