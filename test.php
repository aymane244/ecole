<form action="" method="POST">
                    <div class="text-center py-3">
                        <input type="hidden" value="<?php echo $for_id?>" name="absence_formation">
                    </div>
                    <div class="d-flex justify-content-around mt-3">
                        <h2><?php echo $matiere_nom?></h2>
                        <input type="hidden" value="<?php echo $matiere_id?>" name="absence_matiere">
                        <div class="d-flex">
                            <i class="fas fa-calendar position-awesome"></i>
                            <input id="absence_date" type="date" class="form-control pl-5" name="absence_date">
                        </div>
                    </div>
                    <table class="table table-bordered mt-5 bg-white">
                        <thead class="text-center">
                            <tr>
                                <th scope="col" colspan="5">ARTL Nord</th>
                            </tr>
                            <tr>
                                <th scope="col">Etudiants</th>
                                <th scope="col">Actions</th>
                            </tr>
                            <tr>
                                <?php
                                    //if(isset($_POST['promotion_submit'])){
                                    //    if($_POST['promotion'] == ''){
                                ?>
                                <!--<th scope="col" colspan="5">
                                    Total etudiants: 0
                                    <input type="hidden" value="<?php //echo $total?>" name="number_etudiant">
                                </th>-->
                                <?php
                                        foreach($total_etudiants as $total_etudiant){
                                            if($total_etudiant['mat_id'] == $id){
                                                //if($total_etudiant['etud_promos'] != $_POST['promotion']){
                                ?>
                                <!--<th scope="col" colspan="5">
                                    Total etudiants: 0
                                    <input type="hidden" value="<?php //echo $total?>" name="number_etudiant">-->
                                </th>
                                <?php
                                                    //}else{
                                ?>
                                <th scope="col" colspan="5">
                                    Total etudiants: <?php echo $total_etudiant['total_etudiant']?>
                                    <input type="hidden" value="<?php echo $total_etudiant['total_etudiant']?>" name="number_etudiant">
                                </th>
                                <?php
                                                    //}
                                                //}
                                            }
                                        }
                                    //}else{
                                ?>
                                <!--<th scope="col" colspan="5">
                                    Total etudiants: 0
                                    <input type="hidden" value="<?php //echo $total?>" name="number_etudiant">
                                </th>-->
                                <?php
                                    //}
                                ?>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php
                                //if(isset($_POST['promotion_submit'])){
                                    if(is_array($etudiants) || is_object($etudiants)){
                                        foreach($etudiants as $etudiant){
                                            if($etudiant['mat_id'] == $id){
                            ?>
                            <tr>      
                                <td>
                                    <?php echo $etudiant['etud_nom']." ".$etudiant['etud_prenom'] ?> 
                                    <input type="hidden" value="<?php echo $etudiant['etud_id']?>" name="absence_etudiant[]">
                                </td>
                                <td>
                                    <div class="row justify-content-center">
                                        <div class="col-md-8">
                                            <div class="d-flex">
                                                <i class="fas fa-user-check position-awesome"></i>
                                                <select class="custom-select pl-5" name="absence[]" id="absence">
                                                    <option selected value="Présent">Présent</option>
                                                    <option value="Absent">Absent</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </td>

                            </tr>
                            <?php
                                            }
                                        }
                                    }
                            ?>
                            <tr>
                                <td colspan="5">
                                    <div class="text-center py-3">
                                        <button class="btn btn-primary" type="submit" name="absence_submit">Valider</button>
                                    </div>
                                </td>
                            </tr>
                            <?php
                                //}else{
                            ?>
                            <!--<tr>
                                <th scope="col" colspan="5"><h1> Veuillez choisir une promotion</h1></th>
                            </tr>-->
                            <?php
                                //}
                            ?>
                        </tbody>    
                    </table>
                </form>