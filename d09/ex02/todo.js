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
	var ft_list = document.getElementById("ft_list");
	var new_div = document.createElement('div');

	new_div.setAttribute('onclick', 'del_todo(this);')
	new_div.setAttribute('name', 'todo' + nb_cookies)
	new_div.setAttribute('class', 'todo')
	new_todo = document.createTextNode(input);
	new_div.appendChild(new_todo);
    ft_list.insertBefore(new_div, ft_list.firstChild);
    createCookie('todo' + nb_cookies, input, 7);
    nb_cookies++;
}

function ft_prompt()
{
	var input = prompt("Add new todo");

	if (input != null && input != '')
		add_todo(input);
}

function del_todo(div)
{
	if (confirm('Are you sure ?')) {
		var cookie = div.getAttribute('name');
		div.parentNode.removeChild(div);
		eraseCookie(cookie);
    	nb_cookies--;
	}
}

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
