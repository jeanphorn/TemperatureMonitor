//the main concert function.
var w=window.innerWidth,
    h=window.innerHeight-64,
    z = d3.scale.category20b(),
    i = 0,
    j=1,
    reh1=0.3;
    reh2= 0.64;
    refreshInterval=[];
	

var svg = d3.select("body").append("svg:svg")
    .attr("width",w)
    .attr("height",h)
    .style("pointer-events", "all")
    //.on("mousemove", twins)
    .on("mousedown",implosion);

function setClickImplosion()
{
  svg.on("mousedown",implosion);
}

function setClickChaos()
{
  svg.on("mousedown",chaos);
}

function setTwinsMove()
{
  //svg.on("mousemove",twins);
}

function chaos() {
  var swag=[0,0,0,0,0,0,0,0,0,0];
  for (k=0; k < swag.length; k++){
  svg.append("svg:circle")
    .attr("cx",Math.floor(Math.random()*w))
    .attr("cy",Math.floor(Math.random()*h))
    .attr("r",20)
    .style("stroke",z(++i))
    .style("stroke-opacity",1e-6)
    .style("fill",z(i))
    .style("fill-opacity",1e-6)
    .transition()
    .ease(Math.sqrt)
    .duration(250)
    .style("stroke-opacity",1)
    .style("fill-opacity",1)
    .transition()
    .duration(500)
    .ease(Math.sqrt)
    .attr("transform","translate(0,-100)")
    .style("stroke-opacity",1e-6)
    .style("fill-opacity",1e-6)
    .remove();
  svg.append("svg:circle")
    .attr("cx",Math.floor(Math.random()*w))
    .attr("cy",Math.floor(Math.random()*h))
    .attr("r",20)
    .style("stroke",z(++i))
    .style("stroke-opacity",1e-6)
    .style("fill",z(i))
    .style("fill-opacity",1e-6)
    .transition()
    .ease(Math.sqrt)
    .duration(250)
    .style("stroke-opacity",1)
    .style("fill-opacity",1)
    .transition()
    .duration(500)
    .ease(Math.sqrt)
    .attr("transform","translate(100,0)")
    .style("stroke-opacity",1e-6)
    .style("fill-opacity",1e-6)
    .remove();
  svg.append("svg:circle")
    .attr("cx",Math.floor(Math.random()*w))
    .attr("cy",Math.floor(Math.random()*h))
    .attr("r",20)
    .style("stroke",z(++i))
    .style("stroke-opacity",1e-6)
    .style("fill",z(i))
    .style("fill-opacity",1e-6)
    .transition()
    .ease(Math.sqrt)
    .duration(250)
    .style("stroke-opacity",1)
    .style("fill-opacity",1)
    .transition()
    .duration(500)
    .ease(Math.sqrt)
    .attr("transform","translate(0,100)")
    .style("stroke-opacity",1e-6)
    .style("fill-opacity",1e-6)
    .remove();
  svg.append("svg:circle")
    .attr("cx",Math.floor(Math.random()*w))
    .attr("cy",Math.floor(Math.random()*h))
    .attr("r",20)
    .style("stroke",z(++i))
    .style("stroke-opacity",1e-6)
    .style("fill",z(i))
    .style("fill-opacity",1e-6)
    .transition()
    .ease(Math.sqrt)
    .duration(250)
    .style("stroke-opacity",1)
    .style("fill-opacity",1)
    .transition()
    .duration(500)
    .ease(Math.sqrt)
    .attr("transform","translate(-100,0)")
    .style("stroke-opacity",1e-6)
    .style("fill-opacity",1e-6)
    .remove();
  }
}

function implosion() {

  


  }


function fireworks() {

  var randx1=Math.floor(Math.random()*w)
  var randy1=Math.floor(Math.random()*h)


  svg.append("svg:circle")
    .attr("cx",randx1)
    .attr("cy",randy1)
    .attr("r",10)
    .style("stroke",z(++i))
    .style("fill",z(i))
    .style("stroke-opacity",0.5)
    .transition()
      .attr("transform","translate(0,-100)")
      .duration(1000)
      .ease(Math.sqrt)
      .attr("r",25)
      .style("stroke-opacity",1e-6)
      .style("fill-opacity",1e-6)
      .remove();

  svg.append("svg:circle")
    .attr("cx",randx1)
    .attr("cy",randy1)
    .attr("r",10)
    .style("stroke",z(++i))
    .style("fill",z(i))
    .style("stroke-opacity",0.5)
    .transition()
      .attr("transform","translate(0,100)")
      .duration(1000)
      .ease(Math.sqrt)
      .attr("r",25)
      .style("stroke-opacity",1e-6)
      .style("fill-opacity",1e-6)
      .remove();

  svg.append("svg:circle")
    .attr("cx",randx1)
    .attr("cy",randy1)
    .attr("r",10)
    .style("stroke",z(++i))
    .style("fill",z(i))
    .style("stroke-opacity",0.5)
    .transition()
      .attr("transform","translate(100,0)")
      .duration(1000)
      .ease(Math.sqrt)
      .attr("r",25)
      .style("stroke-opacity",1e-6)
      .style("fill-opacity",1e-6)
      .remove();

  svg.append("svg:circle")
    .attr("cx",randx1)
    .attr("cy",randy1)
    .attr("r",10)
    .style("stroke",z(++i))
    .style("fill",z(i))
    .style("stroke-opacity",0.5)
    .transition()
      .attr("transform","translate(-100,0)")
      .duration(1000)
      .ease(Math.sqrt)
      .attr("r",25)
      .style("stroke-opacity",1e-6)
      .style("fill-opacity",1e-6)
      .remove();

  svg.append("svg:circle")
    .attr("cx",randx1)
    .attr("cy",randy1)
    .attr("r",10)
    .style("stroke",z(++i))
    .style("fill",z(i))
    .style("stroke-opacity",0.5)
    .transition()
      .attr("transform","translate(75,75)")
      .duration(1000)
      .ease(Math.sqrt)
      .attr("r",25)
      .style("stroke-opacity",1e-6)
      .style("fill-opacity",1e-6)
      .remove();

  svg.append("svg:circle")
    .attr("cx",randx1)
    .attr("cy",randy1)
    .attr("r",10)
    .style("stroke",z(++i))
    .style("fill",z(i))
    .style("stroke-opacity",0.5)
    .transition()
      .attr("transform","translate(-75,75)")
      .duration(1000)
      .ease(Math.sqrt)
      .attr("r",25)
      .style("stroke-opacity",1e-6)
      .style("fill-opacity",1e-6)
      .remove();

  svg.append("svg:circle")
    .attr("cx",randx1)
    .attr("cy",randy1)
    .attr("r",10)
    .style("stroke",z(++i))
    .style("fill",z(i))
    .style("stroke-opacity",0.5)
    .transition()
      .attr("transform","translate(75,-75)")
      .duration(1000)
      .ease(Math.sqrt)
      .attr("r",25)
      .style("stroke-opacity",1e-6)
      .style("fill-opacity",1e-6)
      .remove();

  svg.append("svg:circle")
    .attr("cx",randx1)
    .attr("cy",randy1)
    .attr("r",10)
    .style("stroke",z(++i))
    .style("fill",z(i))
    .style("stroke-opacity",0.5)
    .transition()
      .attr("transform","translate(-75,-75)")
      .duration(1000)
      .ease(Math.sqrt)
      .attr("r",25)
      .style("stroke-opacity",1e-6)
      .style("fill-opacity",1e-6)
      .remove();
}

function initialize() {
  svg.append("svg:circle").attr("cx",Math.floor(0.25*(w))).attr("cy",Math.floor(reh1*(h))).style("stroke", "green").style("stroke-opacity",0.8).transition().duration(1000)
	.ease(Math.sqrt).attr("r", 50).style("stroke-opacity", 1e-6).remove();
  svg.append("svg:circle").attr("cx",Math.floor(0.93*(w))).attr("cy",Math.floor(reh2*(h))).style("stroke", "green").style("stroke-opacity",0.8).transition().duration(1000)
      .ease(Math.sqrt).attr("r", 50).style("stroke-opacity", 1e-6).style("fill-opacity",1e-6).remove();
  svg.append("svg:circle").attr("cx",Math.floor(0.93*(w))).attr("cy",Math.floor(reh1*(h))).style("stroke", "green").style("stroke-opacity",0.8).transition().duration(1000)
	.ease(Math.sqrt).attr("r", 50).style("stroke-opacity", 1e-6).remove();
  svg.append("svg:circle").attr("cx",Math.floor(0.25*(w))).attr("cy",Math.floor(reh2*(h))).style("stroke", "green").style("stroke-opacity",0.8).transition().duration(1000)
      .ease(Math.sqrt).attr("r", 50).style("stroke-opacity", 1e-6).style("fill-opacity",1e-6).remove();

    }
function initialize1() {
  svg.append("svg:circle").attr("cx",Math.floor(0.87*(w))).attr("cy",Math.floor(reh1*(h))).style("stroke", "green").style("stroke-opacity",0.8).transition().duration(1000)
	.ease(Math.sqrt).attr("r", 50).style("stroke-opacity", 1e-6).remove();
  svg.append("svg:circle").attr("cx",Math.floor(0.33*(w))).attr("cy",Math.floor(reh1*(h))).style("stroke", "green").style("stroke-opacity",0.8).transition().duration(1000)
      .ease(Math.sqrt).attr("r", 50).style("stroke-opacity", 1e-6).style("fill-opacity",1e-6).remove();
  svg.append("svg:circle").attr("cx",Math.floor(0.33*(w))).attr("cy",Math.floor(reh2*(h))).style("stroke", "green").style("stroke-opacity",0.8).transition().duration(1000)
	.ease(Math.sqrt).attr("r", 50).style("stroke-opacity", 1e-6).remove();
  svg.append("svg:circle").attr("cx",Math.floor(0.87*(w))).attr("cy",Math.floor(reh2*(h))).style("stroke", "green").style("stroke-opacity",0.8).transition().duration(1000)
      .ease(Math.sqrt).attr("r", 50).style("stroke-opacity", 1e-6).style("fill-opacity",1e-6).remove();
}
function initialize2() {
  svg.append("svg:circle").attr("cx",Math.floor(0.42*(w))).attr("cy",Math.floor(reh1*(h))).style("stroke", "green").style("stroke-opacity",0.8).transition().duration(1000)
	.ease(Math.sqrt).attr("r", 50).style("stroke-opacity", 1e-6).remove();
  svg.append("svg:circle").attr("cx",Math.floor(0.57*(w))).attr("cy",Math.floor(reh1*(h))).style("stroke", "green").style("stroke-opacity",0.8).transition().duration(1000)
      .ease(Math.sqrt).attr("r", 50).style("stroke-opacity", 1e-6).style("fill-opacity",1e-6).remove();
  svg.append("svg:circle").attr("cx",Math.floor(0.42*(w))).attr("cy",Math.floor(reh2*(h))).style("stroke", "green").style("stroke-opacity",0.8).transition().duration(1000)
	.ease(Math.sqrt).attr("r", 50).style("stroke-opacity", 1e-6).remove();
  svg.append("svg:circle").attr("cx",Math.floor(0.57*(w))).attr("cy",Math.floor(reh2*(h))).style("stroke", "green").style("stroke-opacity",0.8).transition().duration(1000)
      .ease(Math.sqrt).attr("r", 50).style("stroke-opacity", 1e-6).style("fill-opacity",1e-6).remove();
}
function initialize3() {
  svg.append("svg:circle").attr("cx",Math.floor(0.5*(w))).attr("cy",Math.floor(reh1*(h))).style("stroke", "green").style("stroke-opacity",0.8).transition().duration(1000)
	.ease(Math.sqrt).attr("r", 50).style("stroke-opacity", 1e-6).remove();
  svg.append("svg:circle").attr("cx",Math.floor(0.75*(w))).attr("cy",Math.floor(reh1*(h))).style("stroke", "green").style("stroke-opacity",0.8).transition().duration(1000)
      .ease(Math.sqrt).attr("r", 50).style("stroke-opacity", 1e-6).style("fill-opacity",1e-6).remove();
  svg.append("svg:circle").attr("cx",Math.floor(0.5*(w))).attr("cy",Math.floor(reh2*(h))).style("stroke", "green").style("stroke-opacity",0.8).transition().duration(1000)
	.ease(Math.sqrt).attr("r", 50).style("stroke-opacity", 1e-6).remove();
  svg.append("svg:circle").attr("cx",Math.floor(0.75*(w))).attr("cy",Math.floor(reh2*(h))).style("stroke", "green").style("stroke-opacity",0.8).transition().duration(1000)
      .ease(Math.sqrt).attr("r", 50).style("stroke-opacity", 1e-6).style("fill-opacity",1e-6).remove();
}
function initialize4() {
  svg.append("svg:circle").attr("cx",Math.floor(0.64*(w))).attr("cy",Math.floor(reh1*(h))).style("stroke", "green").style("stroke-opacity",0.8).transition().duration(1000)
	.ease(Math.sqrt).attr("r", 50).style("stroke-opacity", 1e-6).remove();
  svg.append("svg:circle").attr("cx",Math.floor(0.7*(w))).attr("cy",Math.floor(reh1*(h))).style("stroke", "green").style("stroke-opacity",0.8).transition().duration(1000)
      .ease(Math.sqrt).attr("r", 50).style("stroke-opacity", 1e-6).style("fill-opacity",1e-6).remove();
  svg.append("svg:circle").attr("cx",Math.floor(0.64*(w))).attr("cy",Math.floor(reh2*(h))).style("stroke", "green").style("stroke-opacity",0.8).transition().duration(1000)
	.ease(Math.sqrt).attr("r", 50).style("stroke-opacity", 1e-6).remove();
  svg.append("svg:circle").attr("cx",Math.floor(0.7*(w))).attr("cy",Math.floor(reh2*(h))).style("stroke", "green").style("stroke-opacity",0.8).transition().duration(1000)
      .ease(Math.sqrt).attr("r", 50).style("stroke-opacity", 1e-6).style("fill-opacity",1e-6).remove();
}

function squares() {

  svg.append("svg:rect")
    .attr("x",Math.floor(Math.random()*w))
    .attr("y",Math.floor(Math.random()*h))
    .attr("width",50)
    .attr("height",50)
    .style("stroke",z(++i))
    .style("stroke-opacity",1e-6)
    .transition()
    .duration(500)
    .ease(Math.sqrt)
    .style("stroke-opacity",1)
    .transition()
    .duration(500)
    .ease(Math.sqrt)
    .style("stroke-opacity",1e-6)
    .remove();

}

function twins() {
  var m = d3.mouse(this);

  svg.append("svg:rect")
      .attr("transform","rotate(30," + m[0] + "," + m[1] +")")
      .attr("x", m[0])
      .attr("y", m[1])
      .attr("width", 1)
      .attr("height", 1)
      .style("stroke-width",5)
      .style("stroke", z(++i))
      .style("stroke-opacity", 1)
    .transition()
      .duration(500)
      .ease(Math.sqrt)
      .attr("transform","translate(75,0)")
      .attr("width", 75)
      .attr("height",75)
      .style("stroke-width",5)
      .style("stroke-opacity", 1e-6)
      .remove();

  svg.append("svg:rect")
      .attr("transform","rotate(30," + m[0] + "," + m[1] +")")
      .attr("x", m[0])
      .attr("y", m[1])
      .attr("width", 1)
      .attr("height", 1)
      .style("stroke-width",5)
      .style("stroke", z(++i))
      .style("stroke-opacity", 1)
    .transition()
      .duration(500)
      .ease(Math.sqrt)
      .attr("transform","translate(-75,0)")
      .attr("width", 75)
      .attr("height",75)
      .style("stroke-width",5)
      .style("stroke-opacity", 1e-6)
      .remove();
}


function setIntervals() {

    refreshInterval=[setInterval(initialize,4000), 
    setInterval(initialize2,4000),
    setInterval(initialize3,4000),
    setInterval(initialize4,4000),
    //setInterval(initialize,1032),
    setInterval(initialize1,4000),]

}

function drawcirles(left,top,tem,bound) {
	var l=0.01,t=0.01;
	l = l*left*w; t = t*top*h;
	if(tem > bound) var color = "red"; 
	else var color = "green";
	svg.append("svg:circle").attr("cx",Math.floor(l)).attr("cy",Math.floor(t)).style("stroke", color).style("stroke-opacity",0.8).transition().duration(1000)
	.ease(Math.sqrt).attr("r", 50).style("stroke-opacity", 1e-6).remove();
}
function setIntervalSquare() {
  refreshInterval=[setInterval(squares,516),
  setInterval(squares,516),setInterval(squares,516),
  setInterval(squares,516),setInterval(squares,516),
  setInterval(squares,1032),setInterval(squares,1032),
  setInterval(squares,1032),setInterval(squares,1032),setInterval(squares,1032),setInterval(squares,1032),setInterval(squares,1032),setInterval(squares,1032),setInterval(squares,1032),setInterval(squares,1032),setInterval(squares,1032),setInterval(squares,1032),setInterval(squares,1032),setInterval(squares,1032),setInterval(squares,1032),setInterval(squares,1032),setInterval(squares,1032),setInterval(squares,1032),setInterval(squares,1032),setInterval(squares,1032)]
}

function setIntervalFirework() {
  refreshInterval = [setInterval(fireworks,512),setInterval(fireworks,512),
  setInterval(fireworks,512),setInterval(fireworks,512)];
}
function clearAll(arr) {
  for (i = 0; i <= arr.length; i++) {
    clearInterval(arr[i]);
  }
}
