document.addEventListener('DOMContentLoaded', () => {

  function dragstartHandler(ev) {
    const card = ev.target.closest('.card');
    ev.dataTransfer.setData("text/plain", card.id);
  }

  function dragoverHandler(ev) {
    ev.preventDefault();
    ev.currentTarget.classList.add('drag-over');
  }

  function dropHandler(ev) {
    ev.preventDefault();
    ev.currentTarget.classList.remove('drag-over');

    const id = ev.dataTransfer.getData("text/plain");
    const task = document.getElementById(id);

    if (task) {
      ev.currentTarget.appendChild(task);
    }
  }

  function dragleaveHandler(ev) {
    ev.currentTarget.classList.remove('drag-over');
  }

  document.querySelectorAll('.tasks-container').forEach(el => {
    el.addEventListener('dragover', dragoverHandler);
    el.addEventListener('drop', dropHandler);
    el.addEventListener('dragleave', dragleaveHandler);
  });

  document.querySelectorAll('.card').forEach(card => {
    card.addEventListener('dragstart', dragstartHandler);
  });

});