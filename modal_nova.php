<div class="modal" tabindex="-1" id="nova">
    <div class="modal-dialog">
        <div class="modal-content text-center">
            <div class="modal-header">
                <h5 class="modal-title">Životinja</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post">
                    <div class="form-group">
                        <label class="text-dark">Ime</label>
                        <input type="text" class="form-control text-center" name="ime">
                    </div>
                    <div class="form-group">
                        <label class="text-dark">Tip </label>
                        <input type="text" class="form-control text-center" name="tip">
                    </div>
                    <div class="form-group">
                        <label class="text-dark">Godine </label>
                        <input type="number" class="form-control text-center" name="godine">
                    </div>
                    <div class="form-group">
                        <label class="text-dark">ZOO </label>
                        <select name="zoo" class="form-select text-center">
                            <?php
                            $query_zoo = "select * from zoo";
                            $rezultat_zoo = $connection->query($query_zoo);

                            while ($zoo = mysqli_fetch_assoc($rezultat_zoo)) {
                            ?>
                                <option value="<?php echo $zoo['id']; ?>"><?php echo $zoo['naziv']; ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" name="save-button">Dodaj životinju</button>
                </form>
            </div>
        </div>
    </div>
</div>