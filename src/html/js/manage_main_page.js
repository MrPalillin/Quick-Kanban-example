function createBoard(event) {
    event.preventDefault();
    const board_name = document.getElementById("board_name").value;
    $.ajax({
        type: "POST",
        url: 'create_board.php',
        dataType: 'json',
        data: { functionname: 'createBoard', arguments: board_name },
        success: function (response) {
            console.log(response);
            location.reload();
        },
        error: function (xhr, status, error) {
            console.log(xhr.responseText);
        }
    });

}

function openModal() {
    fetch('create_board_modal.php')
        .then(response => response.text())
        .then(html => {
            document.getElementById('modal-container').innerHTML = html;

            // Now show it (depends on your modal system)
            document.getElementById('myModal').style.display = 'block';
        })
        .catch(err => console.error(err));
}

document.addEventListener('click', function (e) {
    if (e.target.classList.contains('btn-close') || e.target.id == "btn-close") {
        document.getElementById('myModal').style.display = 'none';
    }
});