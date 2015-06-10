alert ('Hello again!');

// Изменение по Tag

var headLines = document.getElementsByTagName('h1');
var helloHead = headLines[0];
helloHead.innerText = "JavaScript is greeting you!";
alert (helloHead);

// Изменение по ID
var helloHead = document.getElementById('helloHead');
helloHead.innerText = "JavaScript is greeting you, step 2!";
helloHead.style.color = 'red';
helloHead.style.fontSize = '20px';
helloHead.className = "greetingHeadLine";
alert (helloHead);

for (var prop in helloHead)
{
	console.log (prop);
}

console.dir (helloHead);

//События
//Загрузка страницы

window.onload = function()
{
	alert("Window loaded");
}

window.onload = onWindowLoadet; //Не вызов функции, функция = объект. 
function onWindowLoadet()
{
	alert("Window loaded 2");
}

console.dir (onWindowLoadet);

