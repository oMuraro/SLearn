document.addEventListener('DOMContentLoaded', (event) => {
    const button1 = document.getElementById('dropdownButton1');
    const menu1 = document.getElementById('dropdownMenu1');
    const arrow1 = document.getElementById('arrow1');

    const button2 = document.getElementById('dropdownButton2');
    const menu2 = document.getElementById('dropdownMenu2');
    const arrow2 = document.getElementById('arrow2');


    button1.addEventListener('click', (event) => {
        event.stopPropagation();
        dropdown();
    });

    arrow1.addEventListener('click', (event) => {
        event.stopPropagation();
        dropdown();
    });

    function dropdown() {
        // event.stopPropagation();
        menu1.style.display = menu1.style.display === 'block' ? 'none' : 'block';
        arrow1.className = arrow1.className === 'arrow1Down' ? 'arrow1Up' : 'arrow1Down';
    };

    window.addEventListener('click', (event) => {
        if (!event.target.matches('#dropdownButton1') && !event.target.matches('#arrow1')) {
            if (menu1.style.display === 'block') {
                menu1.style.display = 'none';
                arrow1.className = 'arrow1Down';
            }
        }
    });

    button2.addEventListener('click', (event) => {
        event.stopPropagation();
        dropdown2();
    });

    arrow2.addEventListener('click', (event) => {
        event.stopPropagation();
        dropdown2();
    });

    function dropdown2(){
            menu2.style.display = menu2.style.display === 'block' ? 'none' : 'block';
            arrow2.className = arrow2.className === 'arrow2Down' ? 'arrow2Up' : 'arrow2Down';
    };

    window.addEventListener('click', (event) => {
        if (!event.target.matches('#dropdownButton2') && !event.target.matches('#arrow2')) {
            if (menu2.style.display === 'block') {
                menu2.style.display = 'none';
                arrow2.className = 'arrow2Down';
            }
        }
    });
});