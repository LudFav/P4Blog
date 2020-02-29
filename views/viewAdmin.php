<div class="container-fluid" style="padding-top:20px;">
<div class="row"> 
        <ul class="nav nav-tabs nav-fill" role="tablist">
          <li class="nav-item" id="billetLink" data-toggle="tab"  role="tab" aria-controls="billet" >
            <a class="nav-link" href="#billetTab">
            Billet 
            </a>
          </li>
          <li class="nav-item" id="signalComLink" data-toggle="tab"  role="tab" aria-controls="commentairesSignalés" >
            <a class="nav-link" href="#commentSignTab">
             Commentaires Signalés
            </a>
          </li>
          <li class="nav-item" id="modComLink" data-toggle="tab"  role="tab" aria-controls="commentairesModérés" >
            <a class="nav-link" href="#commentModTab">
              Commentaires Modérés
            </a>
          </li>  
        </ul>
<div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="billetTab" role="tabpanel" aria-labelledby="billet-tab">
                <div class="billetAdmin col-md-9 ml-sm-auto col-lg-10 px-4">

<!--BILLETS-->
        <div class="table-wrapper" id="billet-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6" id="billetTableTitre">
						          <h2>Billets</h2>
                    </div>
					          <div class="col-sm-6">
						          <a href="addbillet" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i><span><strong>Nouveau Billet</strong></span></a>
					          </div>
                </div>
            </div>
            <table class="table table-striped table-hover" id='tableBillet'>
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Auteur</th>
						<th>Titre</th>
                        <th>Date</th>
                        <th style="text-align:center;">Actions</th>
                    </tr>
                </thead>
                <tbody id="tbodyBillet">
                </tbody>    
            </table>
            <div id='paginationAdminBillet'></div>  
        </div>    
             
<!--COMMENTAIRE SIGNALÉ-->
<div class="tab-pane fade show active" id="commentSignTab" role="tabpanel" aria-labelledby="commentairesSignalés-tab">
    <div class="table-wrapper" id="signalCom-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-6" id="commentTableTitre">
					<h2>Commentaires Signalés</h2>
                </div>
            </div>
        </div>
        <table class="table table-striped table-hover" id='tableComments'>
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Auteur</th>
					<th>Titre</th>
                    <th>Date</th>
                    <th style="text-align:center;">Actions</th>
                </tr>
            </thead>
            <tbody id='tbodyComment'>        
            </tbody>   
        </table>
        <div id='paginationComSign'></div>   
</div>
<!--COMMENTAIRE MODERÉ-->
<div class="tab-pane fade show active" id="commentModTab" role="tabpanel" aria-labelledby="commentairesModérés-tab">
    <div class="table-wrapper" id="modCom-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-6" id="moderedCommentTableTitre">
					<h2>Commentaires Modérés</h2>
                </div>
            </div>
        </div>
        <table class="table table-striped table-hover" id='moderedCommentsTable'>
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Auteur</th>
					<th>Titre</th>
                    <th>Date</th>
                    <th style="text-align:center;">Actions</th>
                </tr>
            </thead>
            <tbody id='tbodyCommentModere'>        
            </tbody>   
        </table> 
        <div id='paginationComMod'></div> 
</div>  


        </div> 
      </div>  
      </div>
      </div>  
</body>
</html>
