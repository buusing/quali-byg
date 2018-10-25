import axios from 'axios';
export default {
  init() {
    let projects = document.querySelectorAll('.portfolie-wrapper');
    projects.forEach(project => {
      let id = project.dataset.id;
      project.addEventListener('click', () => {
        // eslint-disable-next-line no-undef
        axios.get(ajax_object.ajax_url, {
          params: {
            action: 'get_gallery',
            id,
          },
        }).then(response => {
          const galleryContainer = document.querySelector('.gallery-container');
          galleryContainer.innerHTML = response.data;
          galleryContainer.scrollIntoView({
            behavior: 'smooth',
            block: 'start',
          });
        }).catch(err => {
          console.log(err);
        });
      })
    })
  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
  },
};
