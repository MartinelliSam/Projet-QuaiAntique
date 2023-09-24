function show(id) {
    document.getElementById(id).classList.remove('hidden')
    document.getElementById(id).classList.add('show');
}

document.getElementById('hour').addEventListener('change', () => {
    show('number');
});

document.getElementById('number').addEventListener('click', () => {
    show('contact');
});


// const form = document.getElementById('reservation_form');
// const form_select_date = document.getElementById('reservation_date');
// const form_select_hours = document.getElementById('reservation_time_hour');
//
// const updateForm = async (data, url, method) => {
//     const req = await fetch(url, {
//         method: method,
//         body: data,
//         headers: {
//             'Content-Type': 'application/x-www-form-urlencoded',
//             'charset': 'utf-8'
//         }
//     });
//
//     return await req.text();
// };
//
// const parseTextToHtml = (text) => {
//     const parser = new DOMParser();
//     return parser.parseFromString(text, 'text/html');
// };
//
// const changeOptions = async (e) => {
//     const requestBody = e.target.getAttribute('name') + '=' + e.target.value;
//     const updateFormResponse = await updateForm(requestBody, form.getAttribute('action'), form.getAttribute('method'));
//     const html = parseTextToHtml(updateFormResponse);
//
//     const new_form_select_hours = html.getElementById('reservation_time_hour');
//     form_select_hours.innerHTML = new_form_select_hours.innerHTML;
// };
//
// form_select_date.addEventListener('change', (e) => changeOptions(e));








