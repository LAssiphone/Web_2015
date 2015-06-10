function changeHeadLineColor()
{
	var headLink = document.getElementById('helloHead');
	headLink.style.color = 'blue';
	console.log ('Boom');
}

function onWindowLoaded()
{
	var link = document.getElementById('colorLink');
	link.onclick = changeHeadLineColor;
	console.log ('Hellow');
}

window.onload = onWindowLoaded; 