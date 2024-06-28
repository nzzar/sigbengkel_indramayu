document.addEventListener('DOMContentLoaded', function () {
    const wrapper = document.querySelector('.wrapper');
    const loginLink = document.querySelector('.login-link');
    const registerLink = document.querySelector('.register-link');

    registerLink.addEventListener('click', function (event) {
        event.preventDefault();
        wrapper.classList.add('active');
    });

    loginLink.addEventListener('click', function (event) {
        event.preventDefault();
        wrapper.classList.remove('active');
    });
});

function togglePhoneInput() {
    const roleSelect = document.getElementById('role');
    const phoneInput = document.getElementById('phoneInput');

    if (roleSelect.value === 'workshop') {
        phoneInput.style.display = 'block';
    } else {
        phoneInput.style.display = 'none';
    }
}


async function getNearbyBengkels() {
    const latitude = "-6.200000";
    const longitude = "106.816666";
    const url = `http://your-laravel-app/api/bengkels/nearby?latitude=${latitude}&longitude=${longitude}`;

    try {
        const response = await fetch(url);
        const data = await response.json();
        console.log('Response Code:', response.status);
        console.log(JSON.stringify(data, null, 2));  // Print the JSON response
    } catch (error) {
        console.error('Error:', error);
    }
}

getNearbyBengkels();
