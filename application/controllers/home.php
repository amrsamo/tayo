<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public $isLoggedIn = false;
	public $data = array();

	public $countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");

	public function __construct()
	{
	    parent::__construct();

	    if(isset($this->session->userdata['user']->id))
		{
			$this->isLoggedIn = true;
			$this->data['isLoggedIn'] = true;
			$this->data['loggedInFollower'] = $this->session->userdata['follower'];
		}
		else
		{
			$this->isLoggedIn = false;
			$this->data['isLoggedIn'] = false;
		}

		
	}
	public function index()
	{

		$this->data['hashtags'] = $this->Insta_User->getHashtags();
		// $this->data['locations'] = $this->Insta_User->getLocation();
		$this->data['users'] = $this->Insta_User->getUsers();


		$max_user = count($this->data['users']) -1;
		$max_user_id = $this->data['users'][$max_user]->id;
		$this->data['max_user_id'] = $max_user_id;
		$this->data['q'] = 'none';

		// $this->data['users'] = $this->fixUsers($this->data['users']);
		// printme($this->data);
		// exit();
		$this->load->view('home',$this->data);
	}


	public function getmore_home()
	{
		$conditions = array();
		// $conditions['hashtag'] = $_POST['q'];		
		$conditions['id < '] = $_POST['max_user_id'];

		$this->data['users'] = $this->Insta_User->getUsers($conditions);

		$max_user = count($this->data['users']) -1;
		$max_user_id = $this->data['users'][$max_user]->id;
		$this->data['max_user_id'] = $max_user_id;
		$this->data['q'] = $_POST['q'];

		$output  = $this->load->view('userlist',$this->data, TRUE);

		echo $output;
		// printme($_POST);
		// exit();
	}


	public function search()
	{
		$data = array();
		$search = $_GET['q'];
		// $coordiniates = $this->getCoordinates($search);
		$this->data['users'] = $this->Insta_User->getUserByLocationName($search);
		$max_user = count($this->data['users']) -1;
		$max_user_id = $this->data['users'][$max_user]->id;

		$this->data['max_user_id'] = $max_user_id;
		$this->data['hashtags'] = $this->Insta_User->getHashtags();
		$this->data['q'] = $search;
		$this->load->view('search',$this->data);
		
	}

	public function getmore_search()
	{
		$search = $_POST['q'];
		$max_user_id = $_POST['max_user_id'];

		$this->data['users'] = $this->Insta_User->getUserByLocationName($search , $max_user_id);

		$max_user = count($this->data['users']) -1;
		$max_user_id = $this->data['users'][$max_user]->id;
		$this->data['max_user_id'] = $max_user_id;
		$this->data['q'] = $search;
		$output  = $this->load->view('userlist',$this->data, TRUE);
		// printme($output);exit();
		// echo json_encode(array($output,$max_user_id));
		echo $output;
	}
	public function setmappos()
	{
		// $search = $_POST['q'];
		// echo 'here';exit();
		// $coordiniates = $this->getCoordinates($search);
		// printme($coordiniates);
		// exit();
	}

	public function getUsersByLocation()
	{	
		$data = array();
		$search = $_POST['q'];
		// $coordiniates = $this->getCoordinates($search);
		$data['users'] = $this->Insta_User->getUserByLocationName($search);
		$output  = $this->load->view('userlist',$data, TRUE);
		echo $output;

	}

	public function getUsersByLocationCoords()
	{
		$lat = $_POST['lat'];
		$lng = $_POST['lng'];

		$name = $this->getLocationName($lat,$lng);
		$data['users'] = $this->Insta_User->getUserByLocationName($name['city'].' '.$name['country']);
		$output  = $this->load->view('userlist',$data, TRUE);
		echo $output;
	}

	public function category()
	{
		$category = $this->uri->segment(2);

		$conditions = array();
		$conditions['hashtag'] = $category;

		$this->data['hashtags'] = $this->Insta_User->getHashtags();
		$this->data['users'] = $this->Insta_User->getUsers($conditions,"",10);
		$this->data['users'] = $this->fixUsers($this->data['users']);

		$max_user = count($this->data['users']) -1;
		$max_user_id = $this->data['users'][$max_user]->id;
		$this->data['max_user_id'] = $max_user_id;
		$this->data['q'] = $category;

		$this->data['active'] = $category;

		// printme($this->data);exit();


		$this->load->view('category',$this->data);
		
	}

	public function getmore_category()
	{
		$conditions = array();
		$conditions['hashtag'] = $_POST['q'];		
		$conditions['id < '] = $_POST['max_user_id'];

		$this->data['users'] = $this->Insta_User->getUsers($conditions);

		$max_user = count($this->data['users']) -1;
		$max_user_id = $this->data['users'][$max_user]->id;
		$this->data['max_user_id'] = $max_user_id;
		$this->data['q'] = $_POST['q'];

		$output  = $this->load->view('userlist',$this->data, TRUE);

		echo $output;
		// printme($_POST);
		// exit();
	}


	public function fixUsers($users)
	{
		$return = array();
		foreach ($users as $user) {
			if($user->profilePicUrl == "")
			{	


				$username = $user->username;
				$result = $this->scrape_insta($username);
				
				
				if($result != null)
				{
					
					$user_scrape = $result['entry_data']['ProfilePage'][0]['user'];
					
					

					$input = array();


					$input['fullName'] = htmlspecialchars(utf8_decode($user_scrape['full_name']));
					$input['instagram_unique_id'] = $user_scrape['id'];
					$input['profilePicUrl'] = $user_scrape['profile_pic_url'];
					$input['biography'] = htmlspecialchars(utf8_decode($user_scrape['biography']));
					$input['mediaCount'] = $user_scrape['media']['count'];
					$input['followsCount'] = $user_scrape['follows']['count'];
					$input['externalUrl'] = htmlspecialchars(utf8_decode($user_scrape['external_url']));
					$input['isPrivate'] = ( $user_scrape['is_private']? 1 : 0 );
					$input['isVerified'] = ( $user_scrape['is_verified']? 1 : 0 );
					$input['location'] = htmlspecialchars(utf8_decode($this->getUserLocation($username)));
					$input['lat'] = '0';
					$input['lng'] = '0';

					if($input['location'] != "")
					{
						$coordiniates = $this->getCoordinates($input['location']);
						if($coordiniates[0] != null)
						{
							$input['lat'] = $coordiniates[0];
							$input['lng'] = $coordiniates[1];
						}
					}
					

					$conditions = array();
					$conditions['username'] = trim($username);
					$this->Insta_User->update($input,$conditions);

					$updated_user = $this->Insta_User->get(array('username'=>$username))[0];
					$return[] = $updated_user;
				}
				
				
			}
			else
			{
				$return[] = $user;
			}

				
		}

		return $return;
	}

	public function getUsers()
	{
		$lat = $_POST['lat'];
		$lng = $_POST['lng'];

		$locationName = $this->getLocationName($lat,$lng);


		printme($locationName);
		exit();
	}


	public function fix()
	{	

		ini_set('memory_limit', '2560M');
		$conditions = array();
		$users = $this->Insta_User->get(array('profilePicUrl' => ''),"",10000);
		


		foreach ($users as $user) {

			
			// printme($user);

			$username = $user->username;

			

			$result = $this->scrape_insta($username);
			// printme($result);
			// exit();
			if($result != null)
			{
				
				$user_scrape = $result['entry_data']['ProfilePage'][0]['user'];
				
				

				$input = array();

				// $input['email'] = $user->email;
				// $input['username'] = $user->username;
				// $input['url'] = $user->url;
				// $input['followers'] = $user->followers;
				// $input['hashtag'] = $user->hashtag;
				// $input['datetime'] = $user->datetime;

				$input['fullName'] = htmlspecialchars(utf8_decode($user_scrape['full_name']));
				$input['instagram_unique_id'] = $user_scrape['id'];
				$input['profilePicUrl'] = $user_scrape['profile_pic_url'];
				$input['biography'] = htmlspecialchars(utf8_decode($user_scrape['biography']));
				$input['mediaCount'] = $user_scrape['media']['count'];
				$input['followsCount'] = $user_scrape['follows']['count'];
				$input['externalUrl'] = htmlspecialchars(utf8_decode($user_scrape['external_url']));
				$input['isPrivate'] = ( $user_scrape['is_private']? 1 : 0 );
				$input['isVerified'] = ( $user_scrape['is_verified']? 1 : 0 );
				$input['location'] = htmlspecialchars(utf8_decode($this->getUserLocation($username)));
				$input['lat'] = '0';
				$input['lng'] = '0';

				
				if($input['location'] != "")
				{
					$coordiniates = $this->getCoordinates($input['location']);

					if($coordiniates[0] != null)
					{
						$input['lat'] = $coordiniates[0];
						$input['lng'] = $coordiniates[1];
					}
				}
				
				
				
				$conditions = array();
				$conditions['username'] = trim($username);
				$this->Insta_User->update($input,$conditions);

				
			}
			else
			{
				$this->Insta_User->delete(array('username'=>$username));
			}
			
			

		}
		
	}



	 public function getLocationName($lat,$long)
    {

        $url = "http://maps.googleapis.com/maps/api/geocode/json?latlng=$lat,$long&sensor=false";

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_ENCODING, "");
        $curlData = curl_exec($curl);
        curl_close($curl);

        $address = json_decode($curlData);
        $address = $address->results[0]->address_components;
        foreach ($address as $x) {
        	
        	if($x->types[0] == 'administrative_area_level_1')
        		$city = $x->long_name;
        	if($x->types[0] == 'country')
        		$country = $x->long_name;
        	
        }

        $output = array();
        $output['city'] = $city;
        $output['country'] = $country;
        
        return $output;
    }

	public function getCoordinates($address){
	    $address = urlencode($address);
	    $url = "http://maps.google.com/maps/api/geocode/json?sensor=false&address=" . $address;
	    $response = file_get_contents($url);
	    $json = json_decode($response,true);
	 
	    $lat = $json['results'][0]['geometry']['location']['lat'];
	    $lng = $json['results'][0]['geometry']['location']['lng'];
	 
	    return array($lat, $lng);
	}
	 
	public function scrape_insta($username) {
		
		$insta_source = file_get_contents('http://instagram.com/'.$username);
		$shards = explode('window._sharedData = ', $insta_source);
		$insta_json = explode(';</script>', $shards[1]); 
		$insta_array = json_decode($insta_json[0], TRUE);
		return $insta_array;
	}


	public function getUserLocation($username)
	{
	    $instaResult= file_get_contents('https://www.instagram.com/'.$username.'/media/');
	    $insta = json_decode($instaResult);
	   	
	    foreach ($insta->items as $item) {

	        if(!isset($item->location->name))
	            continue;

	        $location = $item->location->name;
	        if($location != "")
	        {
	           return $location;
	        }

	        
	        
	    }

	    foreach ($insta->items as $item) {

	       $caption = $item->caption->text;
	       $caption_tags = explode('#', $caption);
	       foreach ($caption_tags as $tag) {
	       	$tag = ucfirst($tag);

	       	 if(in_array($tag, $this->countries)){
	       	 	
	       	 	return $tag;
	       	 }
	       }
	        
	    }

	    return '';
	}
}








