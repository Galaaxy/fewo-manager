<?php
/**
 * Created by PhpStorm.
 * User: Freddy
 * Date: 07.08.2017
 * Time: 17:40
 */

class wohnung {

	private $id;
	private $name;
	private $groesse;
	private $zimmer;
	private $schlafzimmer;
	private $badezimmer;
	private $wohnzimmer;
	private $kuechen;
	private $preis;
	private $preisExtraPP;
	private $preisExtraAb;
	private $maxP;
	private $reinigung;
	private $hunde;
	private $hundeExtra;
	private $hundeReinigung;
	private $text;
	private $wifi;
	private $aufenthalt;
	private $page;



	/**
	 * ======================
	 * Costum Functions
	 * ======================
	 */

	/**
	 * @param array $data
	 */
	public function saveWohnung(array $data){

		global $wpdb;

			$this->id               = $data["ewId"];
			$this->name             = "'".$data["ewName"]."'";
            $this->page             = "'".$data["ewPage"]."'";
			$this->groesse          = "'".$data["ewGroesse"]."'";
			$this->zimmer           = "'".$data["ewZimmer"]."'";
			$this->schlafzimmer     = "'".$data["ewSchlafzimmer"]."'";
			$this->badezimmer       = "'".$data["ewBadezimmer"]."'";
			$this->wohnzimmer       = "'".$data["ewWohnzimmer"]."'";
			$this->kuechen          = "'".$data["ewKuechen"]."'";
			$this->preis            = "'".$data["ewPreis"]."'";
			$this->preisExtraPP     = "'".$data["ewExtraPP"]."'";
			$this->preisExtraAb     = "'".$data["ewExtraAb"]."'";
			$this->maxP             = "'".$data["ewMaxP"]."'";
			$this->reinigung        = "'".$data["ewReinigung"]."'";
			$this->hunde            = "'".$data["ewHunde"]."'";
			$this->hundeExtra       = "'".$data["ewHundeExtra"]."'";
			$this->hundeReinigung   = "'".$data["ewHundeExtraReinigung"]."'";
			$this->wifi             = "'".$data["ewWifi"]."'";
			$this->text             = "'".$data["text"]."'";
			$this->aufenthalt       = "'".$data["ewAufenthalt"]."'";


			$queryString =
				"UPDATE ".$wpdb->base_prefix."fewo_wohnungen SET

				name 			= $this->name,
				page		    = $this->page,
				groesse 		= $this->groesse,
				zimmer 			= $this->zimmer,
				schlafzimmer 	= $this->schlafzimmer,
				badezimmer 		= $this->badezimmer,
				wohnzimmer 		= $this->wohnzimmer,
				kuechen 		= $this->kuechen,
				preis 			= $this->preis,
				preisExtraPP 	= $this->preisExtraPP,
				preisExtraAb 	= $this->preisExtraAb,
				maxP 			= $this->maxP,
				reinigung 		= $this->reinigung,
				hunde 			= $this->hunde,
				hundeExtra 		= $this->hundeExtra,
				hundeReinigung 	= $this->hundeReinigung,
				wifi			= $this->wifi,
				text			= $this->text,
				aufenthalt		= $this->aufenthalt

				WHERE id = $this->id;"
			;


		$wpdb->query($queryString);
	}

	public function createWohnung(){

		global $wpdb;
		$queryString = "INSERT INTO ".$wpdb->base_prefix."fewo_wohnungen (`name`) VALUES ('Ferienwohnung Neu');";

		$wpdb->query($queryString);
	}

	public function deleteWohnung($id){

		global $wpdb;

		$wpdb->delete($wpdb->base_prefix."fewo_wohnungen",["id" => $id]);
	}

	public function getAllIds(){
		global $wpdb;

		return $wpdb->get_results("SELECT id, name from ".$wpdb->base_prefix."fewo_wohnungen");
	}
}
