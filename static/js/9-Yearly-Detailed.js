const primaryColor = "#4834d4";
const warningColor = "#f0932b";
const successColor = "#6ab04c";
const dangerColor = "#eb4d4b";

var tbody = document.getElementById("chart-facilitate");
var rows = tbody.getElementsByTagName("tr");

var price = [];
var dates = [];

for (var index = 0; index < rows.length; index++) {
  price.push(parseFloat(rows[index].children[2].innerText.substring(2)));
  dates.push(rows[index].children[3].innerText.slice(-4));
}

var ctx = document.getElementById("myChart3");
ctx.height = 500;
ctx.width = 500;
var data = {
  labels: dates,
  datasets: [
    {
      fill: false,
      label: "Expenses",
      borderColor: successColor,
      data: price,
      borderWidth: 3,
      lineTension: 0.4,
    },
  ],
};

var lineChart = new Chart(ctx, {
  type: "line",
  data: data,
  options: {
    maintainAspectRatio: false,
    bezierCurve: false,
  },
});
