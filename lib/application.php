<?php

class Application
{

  static function getApi()
  {
    return new oDeskAPI(OD_SECRET, OD_API_KEY);
  }

  static function doConnect()
  {
    mysql_connect(DB_HOST, DB_USER, DB_PASS);
    @mysql_select_db(DB_CATALOG) or die("Unable to select database");
    $query = "SET NAMES 'utf8'";
    mysql_query($query);
  }

  static function doClose()
  {
    mysql_close();
  }

  static function getOffers($last = 0, $job = null)
  {
    $response = self::getApi()->get_request('https://www.odesk.com/api/hr/v2/companies.json');
    $data = json_decode($response);
    $company = $data->companies[0];
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

  static function getJobs($last = 0, $status = 'all')
  {
    $response = self::getApi()->get_request('https://www.odesk.com/api/hr/v2/companies.json');
    $data = json_decode($response);
    $company = $data->companies[0];
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
//    var_dump($data);
//    die();
    return $data->job;
  }

  static function postJob($params = array())
  {
    if (empty($params)) {
      return false;
    }
    $response = self::getApi()->get_request('https://www.odesk.com/api/hr/v2/companies.json');
    $data = json_decode($response);
    $company = $data->companies[0];
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
    
//    var_dump($job_params);
//    die();

    $jresponse = self::getApi()->post_request('https://www.odesk.com/api/hr/v2/jobs.json', $job_params);

    return json_decode($jresponse);
  }
  
  static function getProvider($id)
  {
    $response = self::getApi()->get_request('http://www.odesk.com/api/profiles/v1/providers/'.$id.'/brief.json');
    $data = json_decode($response);

    return $data;
  }
  static function getProviders($ids)
  {
    $response = self::getApi()->get_request('http://www.odesk.com/api/profiles/v1/providers/'.$ids.'/brief.json');
    $data = json_decode($response);

    return $data;
  }
  static function checkUser()
  {
    $response = self::getApi()->get_request('https://www.odesk.com/api/auth/v1/info.json');
    $user = json_decode($response);
    
    $a_users = explode(';;', OD_USERS);
//    var_dump($user);
//    die($user->auth_user->uid);
    if(!in_array($user->auth_user->uid, $a_users)){
      return fasle;
    }
    
    if($user->info->capacity->buyer != 'yes'){
      return fasle;
    }
    return true;
  }

}