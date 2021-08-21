data = [
    {
        name: "E",
        value: 0.12702
    },
    {
        name: "A",
        value: 0.08167
    },
    {
        name: "O",
        value: 0.07507
    },
    {
        name: "I",
        value: 0.06966
    },
    {
        name: "F",
        value: 0.06327
    },
    {
        name: "E",
        value: 0.06094
    },
    {
        name: "E",
        value: 0.05987
    },
    {
        name: "E",
        value: 0.04253
    },
    {
        name: "E",
        value: 0.12702
    },
    {
        name: "E",
        value: 0.12702
    }
];

color = "steelblue";
height = 500;
margin = ({top: 30, right: 0, bottom: 30, left: 40});
width = 1152;

x = d3.scaleBand()
    .domain(d3.range(data.length))
    .range([margin.left, width - margin.right])
    .padding(0.1);

    y = d3.scaleLinear()
    .domain([0, d3.max(data, d => d.value)]).nice()
    .range([height - margin.bottom, margin.top])
    
    xAxis = g => g
    .attr("transform", `translate(0,${height - margin.bottom})`)
    .call(d3.axisBottom(x).tickFormat(i => data[i].name).tickSizeOuter(0))

    yAxis = g => g
    .attr("transform", `translate(${margin.left},0)`)
    .call(d3.axisLeft(y).ticks(null, data.format))
    .call(g => g.select(".domain").remove())
    .call(g => g.append("text")
        .attr("x", -margin.left)
        .attr("y", 10)
        .attr("fill", "currentColor")
        .attr("text-anchor", "start")
        .text(data.y))







$(function(){
  graph();
})

function graph()
{
const svg = d3.selectAll("#test-root").append('svg')
    .attr("viewBox", [0, 0, width, height]);

svg.append("g")
    .attr("fill", color)
  .selectAll("rect")
  .data(data)
  .join("rect")
    .attr("x", (d, i) => x(i))
    .attr("y", d => y(d.value))
    .attr("height", d => y(0) - y(d.value))
    .attr("width", x.bandwidth());

svg.append("g")
    .call(xAxis);

svg.append("g")
    .call(yAxis);

return svg.node();
}