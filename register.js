function registerUser() {

  const name = document.getElementById("name").value.trim();
  const nid = document.getElementById("nid").value.trim();
  const phone = document.getElementById("phone").value.trim();
  const password = document.getElementById("password").value.trim();
  const role = document.getElementById("role").value;

  if (!name || !nid || !phone || !password || !role) {
    alert("Please fill all fields");
    return;
  }

  fetch("../backend/register.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json"
    },
    body: JSON.stringify({
      name: name,
      nid: nid,
      phone: phone,
      password: password,
      role: role
    })
  })
  .then(res => res.json())
  .then(data => {
    console.log(data); 

    if (data.status === "success") {
      alert("Registration successful");
      window.location.href = "login.php";
    } else {
      alert("Registration failed");
    }
  })
  .catch(err => {
    console.error(err);
    alert("Server error");
  });
}
