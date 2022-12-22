<?php
date_default_timezone_set('Europe/Istanbul'); 
$dbname = "odev" ;
$user = "root" ;
$password = "" ; 

try {
	$db= new PDO("mysql:host=localhost;dbname=$dbname;charset=utf8", $user,$password);
	//echo "İşlem başarılı";
} catch (PDOException $e) {
	echo $e->getMessage();
}


class Action
{

	private $db;
	private $dsn;
	private $user;
	private $password;

	function __construct($dbname , $user, $password) {
		$this->db = $dbname;  
		$this->user = $user; 
		$this->password = $password;     
		$this->dsn = "mysql:host=localhost;dbname=".$this->db.";charset=utf8" ;
		$this->user = $user;
		$this->password = $password;
	}
	private function baglantiAc() {
		try { $this->db = new PDO($this->dsn, $this->user, $this->password);
			//echo "İşlem başarılı";
		}
		catch (PDOException $e) { echo 'Veritabanı bağlantısı başarısız oldu: ' . $e->getMessage(); }
	}

	private function baglantiKapat() {
		$this->db = null;
	}

	public function girisKontrol(){
	$this->baglantiAc();
	}


	function ekle($tablo, $veriler) {
		$sonuc = 0;
		$alan1 = "";
		$alan2 = "";
		foreach ($veriler as $anahtar => $deger) {
			$alan1 .= $anahtar . ",";
			$alan2 .= ":".$anahtar.",";
		}
		$alan1 = substr($alan1,0,strlen($alan1)-1);
		$alan2 = substr($alan2,0,strlen($alan2)-1);
		$this->baglantiAc();
		$query = $this->db->prepare("INSERT IGNORE INTO ".$tablo." (".$alan1.") VALUES (".$alan2.")");
		$query->execute($veriler);
		if ( $query ) $sonuc = $this->db->lastInsertId(); else $sonuc = 0;
		$this->baglantiKapat();
		return $sonuc;
	}
	function kontrol($tablo,$diger="") {
		$sonuc = null;
		$this->baglantiAc();
		$query = $this->db->query("SELECT * FROM ".$tablo." ".$diger, PDO::FETCH_ASSOC);
		$sonuc=$query->rowCount();
  	  //echo $sonuc;
		$this->baglantiKapat();
		return $sonuc;
	}
	function select($tablo,$diger="") {
		$sonuc = null;
		$this->baglantiAc();
		$query = $this->db->query("SELECT * FROM ".$tablo." ".$diger, PDO::FETCH_ASSOC);
		$sonuc=$query->fetchAll();
		$this->baglantiKapat();
		return $sonuc;
	}

	function idGuncelle($tablo, $veriler, $id) {
		$sonuc = 0;
		$alan = "";
		foreach ($veriler as $anahtar => $deger) $alan .= $anahtar . "= :".$anahtar.",";
		$alan = substr($alan,0,strlen($alan)-1);
		$veriler['id'] = (int)$id;
		$this->baglantiAc();
		$query = $this->db->prepare("UPDATE ".$tablo." SET ".$alan." WHERE id=:id");
		$update = $query->execute($veriler);
		if ( $update ) $sonuc = 1; else $sonuc = 0;
		$this->baglantiKapat();
		return $sonuc;
	}

	function guncelle($tablo, $veriler, $where="") {
		$sonuc = "";
		$alan = "";
		foreach ($veriler as $anahtar => $deger) $alan .= $anahtar . "= :".$anahtar.",";
		$alan = substr($alan,0,strlen($alan)-1);
		if($where!="") $where = " WHERE ".$where;
		$this->baglantiAc();
		$query = $this->db->prepare("UPDATE  ".$tablo." SET ".$alan.$where);
		$update = $query->execute($veriler);
		if ( $update ) $sonuc = $query->rowCount(); else $sonuc = 0;
		$this->baglantiKapat();
		return $sonuc;
	}

	
	function idSil($tablo,$id) {
		$sonuc = 0;
		$this->baglantiAc();
		$query = $this->db->prepare("DELETE FROM ".$tablo." WHERE id = :id");
		$delete = $query->execute(array('id' => (int)$id));
		if ( $delete ) $sonuc = 1; else $sonuc = 0;
		$this->baglantiKapat();
		return $sonuc;
	}

	function belliidSil($tablo,$id,$sname) {
		$sonuc = 0;
		$this->baglantiAc();
		$query = $this->db->prepare("DELETE FROM ".$tablo." WHERE $sname = :$sname");
		$delete = $query->execute(array(
			$sname => (int)$id
		));
		if ( $delete ) $sonuc = 1; else $sonuc = 0;
		$this->baglantiKapat();
		return $sonuc;
	}

	

	function selectoption($tablo,$diger="") {
		$sonuc = null;
		$this->baglantiAc();
		$query = $this->db->query("SELECT * FROM ".$tablo." ".$diger, PDO::FETCH_ASSOC);
		$no=0;
		while ($sonuc=$query->fetch(PDO::FETCH_ASSOC)) {
			$no++;
			echo '
			<option value="'.$sonuc['id'].'">'.$sonuc['name'].'</option>

			';
		}

		$this->baglantiKapat();
		return $sonuc;
	}

	function selectVeli($tablo,$diger="") {
		$sonuc = null;
		$this->baglantiAc();
		$query = $this->db->query("SELECT * FROM ".$tablo." ".$diger, PDO::FETCH_ASSOC);
		$no=0;
		while ($sonuc=$query->fetch(PDO::FETCH_ASSOC)) {
			$no++;
			echo '
			<option value="'.$sonuc['id'].'">'.$sonuc['name'].'</option>

			';
		}

		$this->baglantiKapat();
		return $sonuc;
	}
}




function seo($str, $options = array())
{
	$str = mb_convert_encoding((string)$str, 'UTF-8', mb_list_encodings());
	$defaults = array(
		'delimiter' => '-',
		'limit' => null,
		'lowercase' => true,
		'replacements' => array(),
		'transliterate' => true
	);
	$options = array_merge($defaults, $options);
	$char_map = array(
        // Latin
		'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A', 'Æ' => 'AE', 'Ç' => 'C',
		'È' => 'E', 'É' => 'E', 'Ê' => 'E', 'Ë' => 'E', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I',
		'Ð' => 'D', 'Ñ' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O', 'Ő' => 'O',
		'Ø' => 'O', 'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U', 'Ű' => 'U', 'Ý' => 'Y', 'Þ' => 'TH',
		'ß' => 'ss',
		'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a', 'å' => 'a', 'æ' => 'ae', 'ç' => 'c',
		'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i',
		'ð' => 'd', 'ñ' => 'n', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o', 'ö' => 'o', 'ő' => 'o',
		'ø' => 'o', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ü' => 'u', 'ű' => 'u', 'ý' => 'y', 'þ' => 'th',
		'ÿ' => 'y',
        // Latin symbols
		'©' => '(c)',
        // Greek
		'Α' => 'A', 'Β' => 'B', 'Γ' => 'G', 'Δ' => 'D', 'Ε' => 'E', 'Ζ' => 'Z', 'Η' => 'H', 'Θ' => '8',
		'Ι' => 'I', 'Κ' => 'K', 'Λ' => 'L', 'Μ' => 'M', 'Ν' => 'N', 'Ξ' => '3', 'Ο' => 'O', 'Π' => 'P',
		'Ρ' => 'R', 'Σ' => 'S', 'Τ' => 'T', 'Υ' => 'Y', 'Φ' => 'F', 'Χ' => 'X', 'Ψ' => 'PS', 'Ω' => 'W',
		'Ά' => 'A', 'Έ' => 'E', 'Ί' => 'I', 'Ό' => 'O', 'Ύ' => 'Y', 'Ή' => 'H', 'Ώ' => 'W', 'Ϊ' => 'I',
		'Ϋ' => 'Y',
		'α' => 'a', 'β' => 'b', 'γ' => 'g', 'δ' => 'd', 'ε' => 'e', 'ζ' => 'z', 'η' => 'h', 'θ' => '8',
		'ι' => 'i', 'κ' => 'k', 'λ' => 'l', 'μ' => 'm', 'ν' => 'n', 'ξ' => '3', 'ο' => 'o', 'π' => 'p',
		'ρ' => 'r', 'σ' => 's', 'τ' => 't', 'υ' => 'y', 'φ' => 'f', 'χ' => 'x', 'ψ' => 'ps', 'ω' => 'w',
		'ά' => 'a', 'έ' => 'e', 'ί' => 'i', 'ό' => 'o', 'ύ' => 'y', 'ή' => 'h', 'ώ' => 'w', 'ς' => 's',
		'ϊ' => 'i', 'ΰ' => 'y', 'ϋ' => 'y', 'ΐ' => 'i',
        // Turkish
		'Ş' => 'S', 'İ' => 'I', 'Ç' => 'C', 'Ü' => 'U', 'Ö' => 'O', 'Ğ' => 'G',
		'ş' => 's', 'ı' => 'i', 'ç' => 'c', 'ü' => 'u', 'ö' => 'o', 'ğ' => 'g',
        // Russian
		'А' => 'A', 'Б' => 'B', 'В' => 'V', 'Г' => 'G', 'Д' => 'D', 'Е' => 'E', 'Ё' => 'Yo', 'Ж' => 'Zh',
		'З' => 'Z', 'И' => 'I', 'Й' => 'J', 'К' => 'K', 'Л' => 'L', 'М' => 'M', 'Н' => 'N', 'О' => 'O',
		'П' => 'P', 'Р' => 'R', 'С' => 'S', 'Т' => 'T', 'У' => 'U', 'Ф' => 'F', 'Х' => 'H', 'Ц' => 'C',
		'Ч' => 'Ch', 'Ш' => 'Sh', 'Щ' => 'Sh', 'Ъ' => '', 'Ы' => 'Y', 'Ь' => '', 'Э' => 'E', 'Ю' => 'Yu',
		'Я' => 'Ya',
		'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo', 'ж' => 'zh',
		'з' => 'z', 'и' => 'i', 'й' => 'j', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o',
		'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c',
		'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sh', 'ъ' => '', 'ы' => 'y', 'ь' => '', 'э' => 'e', 'ю' => 'yu',
		'я' => 'ya',
        // Ukrainian
		'Є' => 'Ye', 'І' => 'I', 'Ї' => 'Yi', 'Ґ' => 'G',
		'є' => 'ye', 'і' => 'i', 'ї' => 'yi', 'ґ' => 'g',
        // Czech
		'Č' => 'C', 'Ď' => 'D', 'Ě' => 'E', 'Ň' => 'N', 'Ř' => 'R', 'Š' => 'S', 'Ť' => 'T', 'Ů' => 'U',
		'Ž' => 'Z',
		'č' => 'c', 'ď' => 'd', 'ě' => 'e', 'ň' => 'n', 'ř' => 'r', 'š' => 's', 'ť' => 't', 'ů' => 'u',
		'ž' => 'z',
        // Polish
		'Ą' => 'A', 'Ć' => 'C', 'Ę' => 'e', 'Ł' => 'L', 'Ń' => 'N', 'Ó' => 'o', 'Ś' => 'S', 'Ź' => 'Z',
		'Ż' => 'Z',
		'ą' => 'a', 'ć' => 'c', 'ę' => 'e', 'ł' => 'l', 'ń' => 'n', 'ó' => 'o', 'ś' => 's', 'ź' => 'z',
		'ż' => 'z',
        // Latvian
		'Ā' => 'A', 'Č' => 'C', 'Ē' => 'E', 'Ģ' => 'G', 'Ī' => 'i', 'Ķ' => 'k', 'Ļ' => 'L', 'Ņ' => 'N',
		'Š' => 'S', 'Ū' => 'u', 'Ž' => 'Z',
		'ā' => 'a', 'č' => 'c', 'ē' => 'e', 'ģ' => 'g', 'ī' => 'i', 'ķ' => 'k', 'ļ' => 'l', 'ņ' => 'n',
		'š' => 's', 'ū' => 'u', 'ž' => 'z'
	);
	$str = preg_replace(array_keys($options['replacements']), $options['replacements'], $str);
	if ($options['transliterate']) {
		$str = str_replace(array_keys($char_map), $char_map, $str);
	}
	$str = preg_replace('/[^\p{L}\p{Nd}]+/u', $options['delimiter'], $str);
	$str = preg_replace('/(' . preg_quote($options['delimiter'], '/') . '){2,}/', '$1', $str);
	$str = mb_substr($str, 0, ($options['limit'] ? $options['limit'] : mb_strlen($str, 'UTF-8')), 'UTF-8');
	$str = trim($str, $options['delimiter']);
	return $options['lowercase'] ? mb_strtolower($str, 'UTF-8') : $str;
}
function tarihduzenle($source){
	$source = substr($source, 0,11);
	$date = new DateTime($source);
	echo $date->format('d.m.Y');
}



?>
