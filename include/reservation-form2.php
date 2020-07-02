
          
                    <h5 class="modal-title" id="exampleModalLabel">Modifier le rendez-vous</h5>
                    <form class="form-group formRes" method="post">
                    <h3 for="exampleFormControlInput1">Modifier le rendez-vous</h3>
                    <h1 id="titreh1"></h1></br>
                    <input id="titre3" class="form-control form-control-lg" type="hidden" name="titre3" required value="" > </br>
                    <label for="exampleFormControlInput1"><b>Entrez le nom<b></label></br>
                    <input id="titre2" class="form-control form-control-lg" type="text" name="titre2" required value="" > </br>
                    <label for="exampleFormControlInput1"><b>Prestation<b></label></br>
                    <input id="description" class="form-control form-control-lg" type="text" placeholder="Modifiez la prestation" name="description" required value=""></br>
                    <label for="exampleFormControlInput1"><b>Date debut<b></label><br>
                    <input id="datedebut" class="form-control form-control-lg" type="datetime-local" name="datedebut"  value="" ></br>
                    <label for="exampleFormControlInput1"><b>Date fin<b></label></br>
                    <input id="datefin" class="form-control form-control-lg" type="datetime-local" name="datefin" value="" ></br> 
                    <input id="modif" class="btn btn-secondary" type="button" value="Modifiez" name="modifier" />
                    </form>

                    <h5 class="modal-title" id="exampleModalLabel">Effacer le rendez-vous</h5>
                    <form class="form-group " method="post">
                    <label for="exampleFormControlInput1">Rechercher le titre du rendez-vous</label></br>
                    <input id="titre4" class="form-control form-control-lg" type="text" name="titre4" required value=""></br>
                    <input id="effacer" class="btn btn-secondary" type="button" value="effacer" name="effacer"></br>
                    </form>