function add(){
 fetch("../backend/admin_add_vaccine.php",{
  method:"POST",
  headers:{'Content-Type':'application/json'},
  body:JSON.stringify({
    disease:disease.value,
    name:name.value,
    doses:doses.value,
    age:age.value
  })
 }).then(r=>r.json()).then(d=>alert(d.status));
}
