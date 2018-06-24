<?php

require __DIR__ . '/QuickDB.class.php';
class BaseObj {

	public function __construct() {
	}
	public function load($id) {
                $pdo = QuickDB::getInstance();			
		$rows = $pdo->query(sprintf("SELECT * FROM %s 
                       WHERE %s = %s;", $this->tbl, $this->pk, intval($id) 
	       		)
       		);
		while ($row = $rows->fetch(PDO::FETCH_ASSOC)) {	
				foreach($row as $k=>$v){													                                $this->$k = $v;
		        	}	
			}       
	}
}

class AcmePerson extends BaseObj {

	public function __construct($id) {
		      $this->tbl = 'acme_person';
		                      $this->pk = 'person_id';
        parent::__construct();
        $path = __DIR__ . '/config/schema.json';
        $json = trim(file_get_contents($path));
        $arr = json_decode($json, TRUE);
        foreach($arr['acme_person'] as $prop) {
                $this->$prop = NULL;
        }
        $this->load($id);
        }
}

class AcmeLanguage extends BaseObj {

        public function __construct($id) {
		      $this->tbl = 'acme_language';
		                      $this->pk = 'cl_id';
		parent::__construct();


	$path = __DIR__ . '/config/schema.json';
        $json = trim(file_get_contents($path));
        $arr = json_decode($json, TRUE);
        foreach($arr['acme_language'] as $prop) {
                $this->$prop = NULL;
        }
        $this->load($id);
        }
}


class AcmeCountry extends BaseObj {

	public function __construct($id) {
		$this->tbl = 'acme_country';
		$this->pk = 'country_id';
        parent::__construct();
        $path = __DIR__ . '/config/schema.json';
        $json = trim(file_get_contents($path));
        $arr = json_decode($json, TRUE);
        foreach($arr['acme_country'] as $prop) {
                $this->$prop = NULL;
        }
        $this->load($id);
        }
}

class AcmeAddress extends BaseObj {

	public function __construct($id) {
		      $this->tbl = 'acme_address';
		                      $this->pk = 'address_id';
        parent::__construct();
        $path = __DIR__ . '/config/schema.json';
        $json = trim(file_get_contents($path));
        $arr = json_decode($json, TRUE);
        foreach($arr['acme_address'] as $prop) {
                $this->$prop = NULL;
        }
        $this->load($id);
        }
}

class AcmeOrder extends BaseObj {

	public function __construct($id) {
		      $this->tbl = 'acme_order';
		                      $this->pk = 'order_id';
        parent::__construct();
        $path = __DIR__ . '/config/schema.json';
        $json = trim(file_get_contents($path));
        $arr = json_decode($json, TRUE);
        foreach($arr['acme_order'] as $prop) {
                $this->$prop = NULL;
        }
        $this->load($id);
        }
}

class AcmeOrderDiscount extends BaseObj {

	public function __construct($id) {
		      $this->tbl = 'acme_order_discount';
		                      $this->pk = 'od_id';
        parent::__construct();
        $path = __DIR__ . '/config/schema.json';
        $json = trim(file_get_contents($path));
        $arr = json_decode($json, TRUE);
        foreach($arr['acme_order_discount'] as $prop) {
                $this->$prop = NULL;
        }
        $this->load($id);
        }
}

class AcmeCityGeoCoord extends BaseObj {

	public function __construct($id) {
		      $this->tbl = 'acme_city_geo_coord';
		                      $this->pk = 'gc_id';
        parent::__construct();
        $path = __DIR__ . '/config/schema.json';
        $json = trim(file_get_contents($path));
        $arr = json_decode($json, TRUE);
        foreach($arr['acme_city_geo_coord'] as $prop) {
                $this->$prop = NULL;
        }
        $this->load($id);
        }
}

class AcmeLineItem extends BaseObj {

	public function __construct($id) {
		      $this->tbl = 'acme_line_item';
		                      $this->pk = 'line_item_id';
        parent::__construct();
        $path = __DIR__ . '/config/schema.json';
        $json = trim(file_get_contents($path));
        $arr = json_decode($json, TRUE);
        foreach($arr['acme_line_item'] as $prop) {
                $this->$prop = NULL;
        }
        $this->load($id);
        }
}

class AcmeCity extends BaseObj {

	public function __construct($id) {
		      $this->tbl = 'acme_city';
		                      $this->pk = 'city_id';
        parent::__construct();
        $path = __DIR__ . '/config/schema.json';
        $json = trim(file_get_contents($path));
        $arr = json_decode($json, TRUE);
        foreach($arr['acme_city'] as $prop) {
                $this->$prop = NULL;
        }
        $this->load($id);
        }
}

class AcmeProduct extends BaseObj {

	public function __construct($id) {
		      $this->tbl = 'acme_product';
		                      $this->pk = 'product_id';
        parent::__construct();
        $path = __DIR__ . '/config/schema.json';
        $json = trim(file_get_contents($path));
        $arr = json_decode($json, TRUE);
        foreach($arr['acme_product'] as $prop) {
                $this->$prop = NULL;
        }
        $this->load($id);
	}
	/**
	 * @return string
	 */
	public function getProductPrice() {
	return money_format('$%i', $this->product_price);
	}
}

class AcmeCustomer extends BaseObj {

	public function __construct($id) {
		      $this->tbl = 'acme_customer';
		                      $this->pk = 'customer_id';
        parent::__construct();
        $path = __DIR__ . '/config/schema.json';
        $json = trim(file_get_contents($path));
        $arr = json_decode($json, TRUE);
        foreach($arr['acme_customer'] as $prop) {
                $this->$prop = NULL;
        }
        $this->load((int) $id);
	}

	/**
	 * @return string
	 */
	public function getFullName() {
          return sprintf('%s %s', ucfirst($this->customer_first_name), ucfirst($this->customer_last_name));	
	}

	public static function getAll() {
		$pdo = QuickDB::getInstance();
		$objs = array();
		$rows = $pdo->query("SELECT * 
			FROM acme_customer 
			ORDER BY customer_id DESC LIMIT 15");
		while($row =$rows->fetch(PDO::FETCH_OBJ)) {
			$objs[$row->customer_id] = new self($row->customer_id);
		}
		return $objs;
	}

}
