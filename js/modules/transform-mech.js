const initTransformMech = () => {
  const transformElems = document.querySelectorAll('.materials-item__transform');

  transformElems.forEach(block => {
    block.addEventListener('click', () => {
      block.querySelectorAll('img').forEach(image => {
        if (getComputedStyle(image).display === 'none') {
          block.classList.add('is-played');
          image.style.display = 'block';
        } else {
          block.classList.remove('is-played');
          image.style.display = 'none';
        }
      });
    });
  });
};

initTransformMech();
