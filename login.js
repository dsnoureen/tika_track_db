function login(){
 fetch("../backend/login.php",{
  method:"POST",
  headers:{'Content-Type':'application/json'},
  body:JSON.stringify({
    phone:phone.value,
    password:password.value
  })
 }).then(r=>r.json()).then(d=>{
   if(d.status==="success") location.href="dashboard.html";
   else alert("Invalid login");
 });
}
