<?php

use Guzzle\Service\Client;

class MozSearch
{
    public $appSearchUrl = 'https://marketplace.firefox.com/api/v1/apps/search/';
    public $appInfoUrl = 'https://marketplace.firefox.com/api/v1/apps/app/';
    public $apiUrl = 'https://marketplace.firefox.com';
    public $client;
    protected $errorMsg;
    public $results;
    public $meta;
    public $appInfo;
    public $privacy;

    public function __construct()
    {

    }

    public function getPrivacy($appurl)
    {

        $this->client = new Client($this->apiUrl);
        $request = $this->client->get($appurl);
        try {
            $response = $request->send();
            $answer = json_decode($response->getBody(), true);
            $this->privacy = $answer['privacy_policy'];
            return true;
        } catch (Exeception $e) {
            $this->errorMsg = $e->getMessage();
            return false;
        }
    }

    public function searchApp($term)
    {
        $this->client = new Client($this->appSearchUrl);
        $term = str_replace(' ', '-', $term);
        $request = $this->client->get('?q=' . $term . '&format=JSON');
        // Send the request and get the response
        try {
            $response = $request->send();
            $answer = json_decode($response->getBody(), true);
            foreach ($answer['objects'] as $searchresult) {
                $this->results[] = $searchresult;
            }
            $this->meta = $answer['meta'];
            return true;
        } catch (Exception $e) {
            $this->errorMsg = $e->getMessage();
            return false;
        }
    }

    public function getAppInfo($appname)
    {
        $this->client = new Client($this->appInfoUrl);
        $appname = str_replace(' ', '-', $appname);
        $request = $this->client->get($appname . '/?format=JSON');
        // Send the request and get the response
        try {
            $response = $request->send();
            $this->appInfo = json_decode($response->getBody(), true);
            return true;
        } catch (Exception $e) {
            $this->errorMsg = $e->getMessage();
            return false;
        }
    }
}
 