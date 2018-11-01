export default {
  init() {
    console.log("heJ");
    let buttons = document.querySelectorAll('.expand-button');
    buttons.forEach(button => {
      button.addEventListener('click', () => {
        let parent = button.parentNode.parentNode.parentNode;
        let id = parent.id;
        let readMoreContainer = document.querySelector(`.${id}`);
        if(button.innerHTML == 'Læs mere'){
          button.innerHTML = 'Læs mindre';
          parent.scrollIntoView({
            behavior: 'smooth',
            block: 'start',
          })
        }else{
          button.innerHTML = 'Læs mere';
        }
        readMoreContainer.classList.toggle('open');
      }) 
    });
    let links = document.querySelectorAll('.sub-menu-item');
    links.forEach(link => {
      link.addEventListener('click', (e) => {
        e.preventDefault();
        let location = document.querySelector(link.getAttribute("href"));
        location.scrollIntoView({
          behavior: 'smooth',
          block: 'start',
        })
      })
    })
  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
  },
};
