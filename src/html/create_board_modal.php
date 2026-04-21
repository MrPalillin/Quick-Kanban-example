<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
    crossorigin="anonymous"></script>

<div id="myModal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create new board</h5>
                <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="modal"></button>
            </div>
            <form action="createBoard()"></form>
            <div class="modal-body">
                <label for="board_name">Board name</label>
                <input type="text" class="form-control" id="board_name" placeholder="Insert name here" required>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save changes</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btn-close">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script>
    function createBoard() {
        const board_name = document.getElementById("board_name");
        $.ajax({
            type: "POST",
            url: 'create_board.php',
            dataType: 'json',
            data: { functionname: 'createBoard', arguments: [board_name] },

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
</script>