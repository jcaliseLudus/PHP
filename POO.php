<?php

class client {


	//ATTRIBUTS

		private $_idClient;
		private $_nom;
		private $_prenom;
		private $_adresse;
		private $_collectionFact=array();

	//CONSTRUCTEUR -- DESTRUCTEUR

		public function __construct(){

			// $this->_idClient = 'default';
			// $this->_nom = 'default';
			// $this->_prenom = 'default';
			// $this->_adresse = 'default';


		}

		public function __destruct(){

			echo 'Destroying : '.$this->_idClient.'</br>';
			echo 'Destroying : '.$this->_nom.'</br>';
			echo 'Destroying : '.$this->_prenom.'</br>';
			echo 'Destroying : '.$this->_adresse.'</br>';
		}

	//MUTATEURS

		//GET

			public function getIdClient(){

				return $this->_idClient;
			}

			public function getName(){

				return $this->_nom;
			}

			public function getPrenom(){

				return $this->_prenom;
			}

			public function getAdresse(){

				return $this->_adresse;
			}


		//SET

			public function setIdClient($IdClient){

				$this->_idClient = $IdClient;

			}

			public function setNom($Nom){

				$this->_nom = $Nom;

			}

			public function setPrenom($Prenom){

				$this->_prenom= $Prenom;

			}

			public function setAdresse($Adresse){

				$this->_adresse = $Adresse;

			}

	//METHODE

		public function addFactCollection(facture $fact){

			if(!in_array($fact, $this->_collectionFact)){

				$fact->setClient($this);
				$this->_collectionFact[]=$fact;

			}

		}

		public function getCollectionFact(){

			return $this->_collectionFact;

		}

		public function afficheCli(){

			echo $this->_idClient.'<br/>';
			echo $this->_nom.'<br/>';
			echo $this->_prenom.'<br/>';
			echo $this->_adresse.'<br/>';

			foreach(self::getCollectionFact() AS $valeur){

				echo $valeur->afficheFact();
			}
		}

		public function hydrateCli(array $donnees){

			foreach($donnees as $key => $value)
			{

				$method = 'set'.ucfirst($key);
				if(method_exists($this, $method))
				{
					$this->$method($value);
				}
			}	
		}
}

class facture {

	//ATTRIBUT

		private $_idFact;
		private $_modePaiement;
		private $_dateFact;
		private $_collectionProd=array();



	//CONSTRUCTEUR -- DESTRUCTEUR

		public function __construct(){

			// $this->_idFact = $mIdFact;
			// $this->_modePaiement = $mModePaiment;
			// $this->_dateFact = $mDateFact;
		}

		// public function __destruct(){

		// 	echo 'destruction de : '.$this->_idFact.'<br/>';
		// 	echo 'destruction de : '.$this->_modePaiement.'<br/>';
		// 	echo 'destruction de : '.$this->_dateFact.'<br/>';
		// }dd

	//MUTATEURS

		//GET

			public function getIdFacture(){
				return $this->_idFact;
			}

			public function getModePaiement(){
				return $this->_modePaiement;
			}

			public function getDateFact(){
				return $this->_dateFact;
			}

		//SET

			public function setIdFacture($mIdFact){
				$this->_idFact = $mIdFact;
			}

			public function setModePaiment($mModePaiment){
				$this->_modePaiement = $mModePaiment;
			}

			public function setDateFact($mDateFact){
				$this->_dateFact = $mDateFact;
			}




	//METHODE

		public function setClient(client $client)
		{
			$this->_client = $client;
		}

		public function getCollectionProd(){

			return $this->_collectionProd;

		}

		public function afficheFact(){

			echo $this->_idFact.'<br/>';
			echo $this->_modePaiement.'<br/>';
			echo $this->_dateFact.'<br/>';
			//print_r(self::getCollectionProd());
			foreach(self::getCollectionProd() AS $value){
				echo $value->afficheProd().'</br>';
			}
		}

		public function addProdCollection(produit $prod){

			if(!in_array($prod, $this->_collectionProd)){

				$this->_collectionProd[]=$prod;
			}
		}

		public function hydrateFact(array $donnees){


			foreach($donnees as $key => $value){

				$method = 'set'.ucfirst($key);
				if(method_exists($this, $method)){

					$this->$method($value);
				}
			}
		}
}

class produit{

	//ATTRIBUT

	private $_designation;
	private $_description;
	private $_prix;

	//CONSTRUCTEUR -- DESTRUCTEUR

	public function __construct(){

		// $this->_designation = $mDesignation;
		// $this->_description = $mDescription;
		// $this->_prix = $mPrix;
	}

	public function __destruct(){

		echo 'destruction de : '.$this->_designation.'<br/>';
		echo 'destruction de : '.$this->_description.'<br/>';
		echo 'destruction de : '.$this->_prix.'<br/>';

	}

	//MUTATEUR

		//GET

			public function getDesignation(){

				return $this->_designation;
			}

			public function getDescription(){

				return $this->_description;
			}

			public function getPrix(){

				return $this->_prix;
			}

		//SET

			public function setDesignation($mDesignation){

				$this->_designation = $mDesignation;
			}

			public function setDescription($mDescription){

				$this->_description = $mDescription;
			}

			public function setPrix($mPrix){

				$this->_prix = $mPrix;
			}

	//METHODE

	public function afficheProd(){

		echo $this->_designation.'</br>';
		echo $this->_description.'</br>';
		echo $this->_prix.'</br>';
	}

	public function hydrateProd(array $donnees){


		foreach($donnees as $key => $value){

			$method = 'set'.ucfirst($key);
			if(method_exists($this, $method)){

				$this->$method($value);
			}
		}
	}
}

class dFact{

	//ATRIBUT
		private $_quantite;
		private $_id;

	//CONSTRUCTEUR -- DESTRUCTEUR

		public function __construct($mID, $mQuantite){

			$this->_id = $mID;
			$this->_quantite = $mQuantite;
		}

		public function __destruct(){

			echo 'destruction de : '.$this->_id.'<br/>';
			echo 'detruction de : '.$this->_quantite.'<br/>';
		}

	//MUTATEURS

		//GET

			public function getID(){

				return $this->_id;
			}

			public function getPrix(){

				return $this->_quantite;
			}

		//SET

			public function setID($mID){

				$this->_id = $mID;
			}

			public function setQuantite($mQuantite){

				$this->_quantite = $mQuantite;
			}
}

//MAIN

	$donneesCli = [
		
		'idClient' => 2,
		'nom' => 'Jean',
		'prenom' => 'Marc',
		'adresse' => '15 rue de la gare'
	];

	$donneesFact = [

		'idFacture' => 2,
		'modePaiment' => 'CB',
		'dateFact' => '2017-02-15'
	];

	$donneesProd = [

		'prix' => 1.50,
		'designation' => 'CA01',
		'description' => 'Clou'
	];


	$c1 = new client();
	$f1 = new facture();
	$p1 = new produit();


	$c1->hydrateCli($donneesCli);
	$p1->hydrateProd($donneesProd);
	$f1->hydrateFact($donneesFact);
	$f1->addProdCollection($p1);
	$c1->addFactCollection($f1);
	echo '</br></br></br></br>';
	$c1->afficheCli();
	echo '</br></br></br></br>';
	?>