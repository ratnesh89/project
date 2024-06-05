document.getElementById('course').addEventListener('change', function() {
    const selectedCourse = this.value;
    fetch(`php/get_course_price.php?course=${selectedCourse}`)
        .then(response => response.json())
        .then(data => {
            document.getElementById('price').textContent = `₹${data.price}`;
            document.getElementById('hiddenPrice').value = data.price;
        });
});
