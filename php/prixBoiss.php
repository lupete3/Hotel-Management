
 <?php 
    require_once ('security_cpt.php'); 
    require_once('bd_cnx.php');

?>
<!DOCTYPE html>
<html>
<head>
    <title>Bahari Beach Hôtel</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=devidev-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="pages/bootstrap/font-awesome-4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="pages/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="pages/bootstrap/DataTables/media/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="pages/bootstrap/css/style.css">
    <link rel="stylesheet" type="text/css" href="pages/bootstrap/css/print.css" media="print">
</head>
<style type="text/css">
    .spacer{
        margin-top:30px;
    }
    .bad{
        font-size:1.5em;
    }
    img:hover{
        cursor:pointer;
    }
    .modal-body img{
        height:400px;
    }
    .mCard{
        width: 170px;
        height: 170px;
    }
    .pagin{
        float:center;
    }
    .ceni{
        color:silver;
    }
    .bbh{
        width:100%;
        height:100%;
    }
    #h1_bbh_title{
        font-family: Buxton Sketch;
        font-size:4em; 
        font-weight: bold; margin-top: 2px; 
        margin-left: 10px; color: white; 
        padding-top: 3px;
    }
</style>
<body>
    <!--================================MODAL DE CONNEXION ========================================== -->
    <div class="modal fade" id="editBtn" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            
        </div>          
    </div>
    

    <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
        <a class="navbar-brand" href="#"><img src="pages/fichiers/photos/bbh_logos.png" class="bbh">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <marquee behavior="alternate" >
                        <h1 id="h1_bbh_title" style="font-size: 60px; font-family: century gothic; font-weight: bold; margin-top: 2px; margin-left: 10px; color: #b90112; padding-top: 3px;text-shadow: 8px 8px 2px white; text-shadow: 0 0 10px white, 0 0 10px white,0 0 10px white;">Bahari Beach Hotel</h1></marquee> 
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="ac_sess/ac_cpt.php"><button type="button" class="btn btn-outline-light connexion"><h3>Retour</h3></button><span class="sr-only">(current)</span></a>
                </li>
            </ul>
            
        </div>
    </nav>

        <!--================================CONTENU ========================================== -->

    <div class="container-fluid spacer">
        <div class="row">
          <div class="col-md-12">
            <div class="row">
                <div class="col-md-9">
                    <h3 class="text-center">LISTE DES PRIX DE BOISSONS
                      <?php 
                            $count = $bd->query('SELECT  COUNT(*) AS nbre  FROM approvboiss as A INNER JOIN prodboiss as B oN B.idBoiss=A.idBoiss');
                            $nbre=$count->fetch(PDO::FETCH_ASSOC);
                                   ?>
                            <span class="badge badge-secondary badge-pill">
                            <?php echo $nbre['nbre']; ?>
                            </span> 
                      </h3>
                </div>
                <div class="col-md-3">
                    <button type="button" class="btn btn-primary print pull-right"><span class="fa fa-print"></span> Imprimer</button>
                    
                </div>
            </div>
              
              <div class="row spacer">
                 <div class="col-12">
                    <table id="tab" class="display table table-bordered table-striped table">
                    <thead>
                        <tr style="font-weight:bold" class="btn-danger">
                            <th>N°</th>
                                <th>Produit</th>  
                                <th>DATE</th>
                                <th>PU($)</th>  
                                <th>OBSERVATION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                                $req = $bd->query("SELECT designBoiss,puApprov, date_format(A.dateApprov,'%d-%m-%Y') as dateApprov FROM approvboiss as A INNER JOIN prodboiss as B oN B.idBoiss=A.idBoiss"); 
                                
                                    $num=1;
                                    
                                    while($don=$req->fetch()):
                                        ?>
                                <tr>
                                        <td><?php echo $num; ?></td>
                                        <td><?php echo $don['designBoiss'] ?></td>
                                        <td><?php echo $don['dateApprov'] ?></td>
                                        <td><?php echo $don['puApprov'] ?></td>
                                        <td></td>
                                        
                                </tr>
                                <?php
                                $num++;
                                 endwhile;
                                ?>
                    </tbody>
                  </table>
                 </div>
              </div>
              
        </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7 offset-1">
                
            </div>
        </div>
    </div>
    

    <script src="pages/bootstrap/js/popper.min.js"></script>
    <script src="pages/bootstrap/js/jquery-3.4.1.min.js"></script>
    <script src="pages/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="pages/bootstrap/DataTables/media/js/jquery.js"></script>
    <script type="text/javascript" src="pages/bootstrap/DataTables/media/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.editBtn').on('click', function(){
                $('#editBtn').modal('show');

                $tr =$(this).closest('tr');
                var data = $tr.children('td').map(function(){
                    return $(this).text();
                }).get();
                console.log(data);

                $('#id').val(data[0]);
                $('#lib').val(data[1]);
                $('#pu').val(data[2]);
                $('#pu1').val(data[5]);
                $('#pu2').val(data[3]);
            });
            $('#tab').DataTable({
                pagingTpe:'full_numbers',
                lengthMenu:[5,10,20,50,100,200,500],
                pageLength:[10],
                language:{
                    url:"pages/bootstrap/DataTables/media/French.json"
                }
            });
            $('.print').on('click',function(){
               $('.cacher').hide();
               if(!window.print()){  
                 $('.cacher').show();

               }
            });
        });
    </script>
</body>
</html>