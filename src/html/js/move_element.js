document.addEventListener('DOMContentLoaded', () => {

  function dragstartHandler(ev) {
    const card = ev.target.closest('.card');
    ev.dataTransfer.setData("text/plain", card.id);
    ev.dataTransfer.setData("old_state", card.parentElement.parentElement.getAttribute("data-status"));
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

    const old_state = ev.dataTransfer.getData("old_state");

    const new_state = ev.currentTarget.parentElement.getAttribute("data-status");

    if (old_state != new_state) {
      let params = new URLSearchParams(document.location.search);
      changeCardState(params.get("id"), id, new_state);
    }


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

function changeCardState(board_id, card_id, state) {
  $.ajax({
    type: "POST",
    url: 'set_state.php',
    dataType: 'json',
    data: { functionname: 'changeCardState', arguments: [board_id, card_id.split("-")[1], state] },

    success: function (obj, textstatus) {
      console.log(textstatus);
      console.log(obj);
    },
    error: function (status, error) {
      console.log(status);
      console.log(error);
    }
  });
}