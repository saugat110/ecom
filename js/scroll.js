document.addEventListener('DOMContentLoaded', function() {

    const storedScrollPosition = localStorage.getItem('scrollPosition');

    if (storedScrollPosition !== null) {
        window.scrollTo(0, parseInt(storedScrollPosition, 10));

    }
    localStorage.setItem('scrollPosition', 0);
});

function func1(){
    console.log('hi');
    localStorage.setItem('scrollPosition', window.scrollY);
}

// console.log('hi');
