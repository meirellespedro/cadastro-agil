document.getElementById("loginForm").addEventListener("submit", function(event) {
    event.preventDefault();

    const email = document.getElementById("email").value;
    const senha = document.getElementById("senha").value;

    console.log("Email enviado:", email);
    console.log("Senha enviada:", senha);

    fetch("login.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body: `email=${encodeURIComponent(email)}&senha=${encodeURIComponent(senha)}`
    })
    .then(response => response.text())
    .then(data => {
        console.log("Resposta do servidor:", data);
        alert(data);
    })
    .catch(error => {
        console.error("Erro:", error);
    });
});

function toggleSenha() {
    const input = document.getElementById("senha");
    const icon = document.getElementById("toggleEye");

    if (input.type === "password") {
        input.type = "text";
        icon.textContent = "👁️";
    } else {
        input.type = "password";
        icon.textContent = "👁️‍🗨️";
    }
}
