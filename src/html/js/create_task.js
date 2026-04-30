function openNewTaskModal(){
    
    fetch('create_task_modal.php')
        .then(response => response.text())
        .then(html => {
            document.getElementById('modal-container').innerHTML = html;

            // Now show it (depends on your modal system)
            document.getElementById('myModal').style.display = 'block';
        })
        .catch(err => console.error(err));
    
}

function createTask(){
    let params = new URLSearchParams(document.location.search);
    const board_id = params.get("id");
}