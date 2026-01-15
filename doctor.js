function add(){
 fetch("../backend/doctor_add_vaccine.php",{
  method:"POST",
  headers:{'Content-Type':'application/json'},
  body:JSON.stringify({
    health_id:hid.value,
    vaccine_id:vid.value,
    dose:dose.value
  })
 }).then(r=>r.json()).then(d=>alert(d.status));
}
