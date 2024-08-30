document.addEventListener('DOMContentLoaded', (event) => {
    const button1 = document.getElementById('dropdownButton1');
    const menu1 = document.getElementById('dropdownMenu1');

    const button2 = document.getElementById('dropdownButton2');
    const menu2 = document.getElementById('dropdownMenu2');

    const button3 = document.getElementById('dropdownButton3');
    const menu3 = document.getElementById('dropdownMenu3');

    

    button1.addEventListener('click', () => {
        // Toggle the visibility of the dropdown menu
        menu1.style.display = menu1.style.display === 'block' ? 'none' : 'block';
    });

    // Close the dropdown menu if the user clicks outside of it
    window.addEventListener('click', (event) => {
        if (!event.target.matches('#dropdownButton1')) {
            if (menu1.style.display === 'block') {
                menu1.style.display = 'none';
            }
        }
    });

    button2.addEventListener('click', () => {
        // Toggle the visibility of the dropdown menu
        menu2.style.display = menu2.style.display === 'block' ? 'none' : 'block';
    });

    // Close the dropdown menu if the user clicks outside of it
    window.addEventListener('click', (event) => {
        if (!event.target.matches('#dropdownButton2')) {
            if (menu2.style.display === 'block') {
                menu2.style.display = 'none';
            }
        }
    });

    button3.addEventListener('click', () => {
        // Toggle the visibility of the dropdown menu
        menu3.style.display = menu3.style.display === 'block' ? 'none' : 'block';
    });

    // Close the dropdown menu if the user clicks outside of it
    window.addEventListener('click', (event) => {
        if (!event.target.matches('#dropdownButton3')) {
            if (menu3.style.display === 'block') {
                menu3.style.display = 'none';
            }
        }
    });
});