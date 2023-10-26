function show(id) {
    document.getElementById(id).classList.remove('hidden')
}

document.getElementById('reservation_date').addEventListener('change', () => {
    show('hour');
});

document.getElementById('hour').addEventListener('change', () => {
    show('number');
    show('contact');
});












