<?php

class Application
{

  static $api = null;
  static $company = null;
  static $user = null;

  public function __construct()
  {
    $this->setApi();
  }

  static function doConnect()
  {
    mysql_connect(DB_HOST, DB_USER, DB_PASS);
    @mysql_select_db(DB_CATALOG) or die("Unable to select database");
    $query = "SET NAMES 'utf8'";
    mysql_query($query);
  }

  static function doExConnect()
  {
    mysql_connect(EX_DB_HOST, EX_DB_USER, EX_DB_PASS);
    @mysql_select_db(EX_DB_CATALOG) or die("Unable to select database");
    $query = "SET NAMES 'utf8'";
    mysql_query($query);
  }

  static function doClose()
  {
    mysql_close();
  }

  static function getApi()
  {
    if (!self::$api) {
      self::setApi();
    }

    return self::$api;
  }

  static function setApi()
  {
    self::$api = new oDeskAPI(OD_SECRET, OD_API_KEY);
  }

  static function getCompany()
  {
    if (!self::$company) {
      self::setCompany();
    }
    return self::$company;
  }

  static public function setCompany()
  {
    $response = self::getApi()->get_request('https://www.odesk.com/api/hr/v2/companies.json');
    $data = json_decode($response);
    $company = $data->companies[0];

    self::$company = $company;
  }

  static function sendMessage($recipients, $subject, $body)
  {
    $username = self::getUser()->auth_user->uid;

    $message_data = self::getApi()->post_request('https://www.odesk.com/api/mc/v1/threads/' . $username . '.json', array(
      'recipients' => $recipients,
      'subject' => $subject,
      'body' => str_replace('\n', '\r\n', $body),
      )
    );
    $message_data = json_decode($message_data);
    $message_data->original = $body;

    return $message_data;
  }

  static function getOffers($last = 0, $job = null)
  {
    $company = self::getCompany();
    if ($job) {
      $offers_data = self::getApi()->get_request('https://www.odesk.com/api/hr/v2/offers.json', array(
        'buyer_team__reference' => $company->reference,
        'page' => $last,
        'job__reference' => $job,
        'order_by' => 'created_time;DESC',
        )
      );
    } else {
      $offers_data = self::getApi()->get_request('https://www.odesk.com/api/hr/v2/offers.json', array(
        'buyer_team__reference' => $company->reference,
        'page' => $last,
        'order_by' => 'created_time;DESC',
        )
      );
    }

    $offers = json_decode($offers_data);

    return $offers;
  }

  static function syncContract($engagement, $contractor)
  {
    $obj = self::getEngagement($engagement);

    if (!$obj) {
      return false;
    }
    $salt = md5($engagement . 'mYs@lT4Cont' . $contractor);

    try {
      self::doConnect();
      $query = sprintf("INSERT INTO od_contracts (engagement_id, contractor_id, is_payed, salt, engagement) VALUES ('%s', '%s', '%s', '%s', '%s')", mysql_real_escape_string($engagement), mysql_real_escape_string($contractor), 'n', mysql_real_escape_string($salt), mysql_real_escape_string(serialize($obj))
      );
      $result = mysql_query($query);
      self::doClose();
    } catch (Exception $exc) {
      throw new Exception($exc->getMessage());
    }

    return $salt;
  }

  static function getEngagementsLocalStatus($engagements)
  {
    $data = array();
    try {
      self::doConnect();
      $query = "SELECT engagement_id, salt FROM od_contracts";
      $result = mysql_query($query);
      while ($row = mysql_fetch_array($result)) {
        $data[$row['engagement_id']] = $row['salt'];
      }
      self::doClose();
    } catch (Exception $exc) {
      throw new Exception($exc->getMessage());
    }
    
    foreach ($engagements as $engagement) {
      if (array_key_exists($engagement->reference, $data)) {
        $engagement->synced = $data[$engagement->reference];
      } else {
        $engagement->synced = false;
      }
    }
    
    return $engagements;
  }

  static function getEngagement($engagement)
  {

    $data = self::getApi()->get_request('https://www.odesk.com/api/hr/v2/engagements/' . $engagement . '.json');
    return json_decode($data);
  }

  static function getEngagements($last = 0, $status = 'all', $job = null, $provider = null)
  {
    $company = self::getCompany();

    $params = array();
    $params['buyer_team__reference'] = $company->reference;
    if ($job) {
      $params['job__reference'] = $job;
    }
    if ($provider) {
      $params['provider__reference'] = $provider;
    }
    $params['page'] = $last;
    $params['order_by'] = 'created_time;DESC';
    $params['status'] = $status != all ? $status : '';

    $eng_data = self::getApi()->get_request('https://www.odesk.com/api/hr/v2/engagements.json', $params);

    return json_decode($eng_data);
  }

  static function getJobs($last = 0, $status = 'all')
  {
    $company = self::getCompany();
    $jobs_data = self::getApi()->get_request('https://www.odesk.com/api/hr/v2/jobs.json', array(
      'buyer_team__reference' => $company->reference,
      'page' => $last,
      'order_by' => 'created_time;DESC',
      'status' => $status != all ? $status : ''
      )
    );

    return json_decode($jobs_data);
  }

  static function getJob($job)
  {
    $response = self::getApi()->get_request('https://www.odesk.com/api/hr/v2/jobs/' . $job . '.json');
    $data = json_decode($response);
    return $data->job;
  }

  static function postJob($params = array())
  {
    if (empty($params)) {
      return false;
    }
    $company = self::getCompany();
    $params['buyer_team__reference'] = $company->reference;


    $job_params = array(
      'job_data' => array(
        'buyer_team__reference' => $company->reference,
        'title' => $params['title'],
        'job_type' => $params['job_type'],
        'description' => $params['description'],
        'budget' => $params['budget'],
        'end_date' => $params['end_date'],
        'visibility' => $params['visibility'],
        'category' => $params['category'],
        'subcategory' => $params['subcategory']
      )
    );
    if ($params['start_date']) {
      $job_params['job_data']['start_date'] = $params['start_date'];
    }

    $jresponse = self::getApi()->post_request('https://www.odesk.com/api/hr/v2/jobs.json', $job_params);

    return json_decode($jresponse);
  }

  static function getProvider($id)
  {
    $response = self::getApi()->get_request('http://www.odesk.com/api/profiles/v1/providers/' . $id . '/brief.json');
    $data = json_decode($response);

    return $data;
  }

  static function getProviders($ids)
  {
    $response = self::getApi()->get_request('http://www.odesk.com/api/profiles/v1/providers/' . $ids . '/brief.json');
    $data = json_decode($response);

    return $data;
  }

  static function getUser()
  {
    if (!self::$user) {
      self::setUser();
    }
    return self::$user;
  }

  static function setUser()
  {
    $response = self::getApi()->get_request('https://www.odesk.com/api/auth/v1/info.json');
    $user = json_decode($response);

    self::$user = $user;
  }

  static function checkUser()
  {
    $user = self::getUser();
    $a_users = explode(';;', OD_USERS);
    if (!in_array($user->auth_user->uid, $a_users)) {
      return false;
    }

    if ($user->info->capacity->buyer != 'yes') {
      return false;
    }
    return true;
  }

}