var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

const primaryColor = '#4834d4'
const warningColor = '#f0932b'
const successColor = '#6ab04c'
const dangerColor = '#eb4d4b'

var tbody = document.getElementById('chart-facilitate1')
console.log(tbody);
var z = tbody.getElementsByTagName("tr")

var price = []
var dates = []

for (index = 0; index < z.length; index++) { 
    price.push(parseFloat(z[index].children[2].innerText.substring(2)))
    var x = parseInt(z[index].children[3].innerText.substring(3,5))
    dates.push(months[x-1]) 
} 

var ctx = document.getElementById('myChart1')
ctx.height = 500
ctx.width = 500
var data = {
	labels: dates,
	datasets: [{
		fill: false,
		label: 'Expenses',
		borderColor: successColor,
		data: price,
		borderWidth: 3,
		lineTension: 0.4,
	}]
}

var lineChart = new Chart(ctx, {
	type: 'line',
	data: data,
	options: {
		maintainAspectRatio: false,
		bezierCurve: false,
	}
})