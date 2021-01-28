<?php include'header.php';?>
	<link rel="stylesheet" href="pages_css/trouverProf.css" />
	<div class = "general" >
	<div>

		<h1>Trouver un professeur </h1>

		
	</div>
	<div class="container">
	<form action="trouverProfCont.php" method="post"> 
		<div id="first">

			<div>
        		<label for="nom">Nom </label>
        		<input type="text" id="nom" name="nom">
    		</div>
   		 	<div>
        		<label for="prenom">Prenom</label>
        		<input type="text" id="prenom" name="prenom">
   			 </div>
   			 <div>
        		<label for="mail">E-mail</label>
        		<input type="email" id="mail" name="mail">
    		</div>
    		<div>
        		<label for="adresse">Adresse</label>
        		<input type="text" id="adresse" name="adresse">
    		</div>
    		<div>
        		<label for="num">Téléphone</label>
        		<input type="num" id="num" name="num">
    		</div>
    		
		</div>
    	<div id="second">
    		<div>
        		<label for="matiere">Matière</label>
        		<input list="browsers" name="matiere" id="matiere">
				<datalist id="browsers">
					<option disabled selected hidden value="" >Choisir une matière</option>
					<?php
						require 'Model.php';
						$mod= Model::getModel();
						$res=$mod->retournerMatieresDisponibles();
						foreach ($res as $key => $v) {
                        // code...
                        echo ("<option value=".$v[0].">");
                    }
                    ?>
				</datalist>
    		</div>
    		<div>
    			<label for="niveau">Niveau</label>
    			<input list="niveaux" name="niveau" id="niveau">
				<datalist id="niveaux">
    				<option disabled selected hidden value="" >Choisir un niveau</option>
  					<option value="Maternelle">
  					<option hidden value="cp" >
  					<option value="ce1">
  					<option value="ce2">
  					<option value="cm1" >
  					<option value="cm2">
  					<option value="6">
  					<option value="5" >
  					<option value="4">
  					<option value="3">
  					<option value="2" >
  					<option value="1">
  					<option value="term">
  					<option value="sup" >
  					
				</datalist>
    		</div>
    		<div>
        		<label for="com">Commentaire</label>
        		<input type="textarea " id="com" name="com">
    		</div>
   			
    	</div>

   
</div>

<div id="cours">
	<h4>Type de cours </h4>
	
	<a href="#"><div class="col1">
    <h2>Soutiens scolaire</h2>
	</div>
	<a href="#"><div class="col2">
    <h2>Cours en ligne</h2>
	</div>

	<a href="#"><div class="col3">
    <h2>Cours particuliers</h2>
	</div>
    
	<a href="#"><div class="col4">
    <h2>Stage intensif</h2>
	</div>

  	
</div>
  		<input id="envoyer" type="submit" value="Envoyer " >
 </form>
</div>
<?php include'footer.php';?>