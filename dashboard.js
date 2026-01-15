function load(file){
 fetch("../backend/"+file)
 .then(r=>r.json())
 .then(d=>{
  output.innerHTML="";
  d.forEach(x=>{
   output.innerHTML += `<tr><td>${Object.values(x)[0]}</td><td>${Object.values(x)[1]}</td></tr>`;
  });
 });
}
