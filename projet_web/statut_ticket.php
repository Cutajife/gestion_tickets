<!doctype html>
<html lang="en">

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bs431/css/bootstrap.min.css">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <title>Statut</title>
  </head>

  <body>

    <!-- include navigation bar -->

    <?php 
      include('connexion_bdd.php');
      include('ajouter_statut.html');
      $id = $_GET['row_id'];
    ?>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
    <div class="row">
      <div class="col">
        <a href="gestion_ticket_dev.php" class="previous">&laquo; Previous</a>
      </div>
        Statut ticket
    </div>
  </nav>

  <br>
    <!-- Body content -->
    <div class="container-fluid">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <div class="container-fluid">
            <div class="row">
              <div class="col text-left">
                <h6 class="m-0 font-weight-bold text-primary">Statut <?php echo $id; ?></h6>
              </div>
              <div class="col text-right">    
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAjouterStatut">
                  Ajouter
                </button>
              </div>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Date</th>
                  <th>Statut</th>
                  <th>Commentaire</th>
                  <th>Modifier</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>

                
                <?php
                  // On récupère tout le contenu de la table
                $reponse = $bdd->query("SELECT * FROM statut WHERE ticket_id = '$id'");
                while ($donnees = $reponse->fetch()){
                ?>

                <tr>
                  <th scope="row"><?php echo $donnees['date_heure']; ?></th>
                  <td><?php echo $donnees['statut']; ?></td>
                  <td><?php echo $donnees['commentaire']; ?></td>
                  <td>
                  <form action ="#" method="get">
                      <input type="hidden" name="row_id" value="<?php echo $donnees['ticket_id']; ?>">
                      <button type="submit" class="btn btn-success">Modifier</button>
                    </form>
                  </td>
                  <td>
                    <form action ="#" method="get">
                      <input type="hidden" name="row_id" value="<?php echo $donnees['ticket_id']; ?>">
                      <button type="submit" class="btn btn-danger" onclick="return confirm('Voulez-vous vraiment suprimer ce client ?');">Delete</button>
                    </form>
                  </td>
                </tr>

                <?php
                }     
                $reponse->closeCursor(); // Termine le traitement de la requête
                ?>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>  
    <?php include('footer.php'); ?>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
  
  </body>
</html>