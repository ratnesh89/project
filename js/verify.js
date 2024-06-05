document.getElementById("sendCode").addEventListener("click", function() {
    // Simulate sending the code and showing the verification input
    document.getElementById("verificationcode").style.display = "block";
    document.querySelector("input[name='password']").style.display = "block";
    document.getElementById("signupButton").disabled = false;
});
