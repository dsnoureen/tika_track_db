function save(){
 fetch("../backend/add_medical.php",{
  method:"POST",
  headers:{'Content-Type':'application/json'},
  body:JSON.stringify({
    health_id:hid.value,
    type:type.value,
    description:desc.value
  })
 }).then(r=>r.json()).then(d=>{
  alert(d.status);
 });
}
