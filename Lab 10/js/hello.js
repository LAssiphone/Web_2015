//Вывод

alert ('Hello!');

//Вычисление

var sum = 0;
for (var i = 0; i < 10; ++i)
{
	sum += i;
}
alert ('Sum !10= ' + sum);

//Функция

function fact(n)
{
	if (n==0 || n==1)
	{
		return 1;
	}
	else
	{
		return n * fact(n - 1);
	}
}
alert ('Fact 10 = ' + fact(10));

//Объект

var info = 
{
	name: "Sarah",
	surname: "Rever",
	age: 32
};
alert (info.name);
info.age = 33;

//массивы

var animals = [ 'cat', 'dog', 'duck'];
alert (animals[0]);