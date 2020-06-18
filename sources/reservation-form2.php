
                    <h5 class="modal-title" id="exampleModalLabel">Modifier le rendez-vous</h5>
                    <form class="form-group" method="post">
                    <label for="exampleFormControlInput1"><b>Recherche le nom du rendez-vous<b></label>
                    <input id="titre3" class="form-control form-control-lg" type="text" name="titre3" required value= <?php echo $test[0][1] ?> ></br>
                    <label for="exampleFormControlInput1"><b>Entrez le nom<b></label></br>
                    <input id="titre2" class="form-control form-control-lg" type="text" name="titre2" required value= <?php echo $test[0][1] ?> > </br>
                    <label for="exampleFormControlInput1"><b>Prestation<b></label></br>
                    <input id="description" class="form-control form-control-lg" type="text" placeholder="Modifiez la prestation" name="description" required value= <?php echo $test[0][2] ?> ></br>
                    <label for="exampleFormControlInput1"><b>Date debut<b></label><br>
                    <input id="datedebut" class="form-control form-control-lg" type="datetime-local" name="datedebut"  value=<?php echo $test[0][3] ?> ></br>
                    <label for="exampleFormControlInput1"><b>Date fin<b></label></br>
                    <input id="datefin" class="form-control form-control-lg" type="datetime-local" name="datefin" value=<?php echo $test[0][4] ?> ></br> 
                    <input id="modif" class="btn btn-secondary" type="button" value="Modifiez" name="modifier" />
                    </form>

                    <h5 class="modal-title" id="exampleModalLabel">Effacer le rendez-vous</h5>
                    <form class="form-group " method="post">
                    <label for="exampleFormControlInput1">Rechercher le titre du rendez-vous</label></br>
                    <input id="titre4" class="form-control form-control-lg" type="text" name="titre4" required value=<?php echo $test[0][1] ?>></br>
                    <input id="effacer" class="btn btn-secondary" type="button" value="effacer" name="effacer"></br>
                    </form>