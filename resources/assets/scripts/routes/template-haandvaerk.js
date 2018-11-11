export default {
  init() {
    console.log("heJ");
    let buttons = document.querySelectorAll('.expand-button');
    let closeButtons = document.querySelectorAll('.close-button');
    buttons.forEach(button => {
      button.addEventListener('click', () => {
        let parent = button.parentNode.parentNode.parentNode;
        let id = parent.id;
        let readMoreContainer = document.querySelector(`.${id}`);
        parent.scrollIntoView({
          behavior: 'smooth',
          block: 'start',
        })
        readMoreContainer.classList.toggle('open');
      }) 
    });
    closeButtons.forEach(button => {
      button.addEventListener('click', () => {
        let parent = button.closest('.open');
        parent.classList.remove('open');
        parent.scrollIntoView({
          behavior: 'smooth',
          block: 'start',
        })
      })
    })
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
