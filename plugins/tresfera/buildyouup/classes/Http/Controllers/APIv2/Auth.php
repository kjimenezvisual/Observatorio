<?php

namespace Tresfera\Buildyouup\Classes\Http\Controllers\API;

use Tresfera\Taketsystem\Classes\Http\Controllers\API;
use Tresfera\Taketsystem\Models\Device;
use Tresfera\Taketsystem\Models\Client;
use Tresfera\Taketsystem\Models\Shop;
use App;
use Request;

class Auth extends API
{
    /**
     * Instantiate a new API instance.
     */
    public function __construct()
    {
        // Auth
        $this->middleware('Tresfera\Buildyouup\Classes\Http\Middleware\API\Auth', ['except' => ['auth']]);
    }

    /**
     * Auth device.
     *
     * @return Response
     */
    public function auth()
    {
        // Parameters
        // Mac
        if (!$mac = Request::get('mac')) {
            App::abort(403, 'MAC is not present.');
        }

        // Secret
        if (!$secret = Request::get('secret')) {
   	        // Register shop
	        if (!$shop = Shop::with('client')->secret($secret)->first()) {
		        if($deviceTmp = Device::with('shop')->mac($mac)->first()) {
			        $shop = $deviceTmp->shop;
		        } else {
			        App::abort(403, 'Incorrect secret');
		        }
	        }
        } else {
	        if (!$shop = Shop::with('client')->secret($secret)->first()) {
		        App::abort(403, 'Incorrect secret');
		    }
        }

        //  Push Token
        if (!$pushToken = Request::get('push_token')) {
            App::abort(403, 'Push Token is not present.');
        }
		
		
        // Find a device with that mac
        if (!$device = Device::with('shop', 'client')->mac($mac)->first()) {
            // Create a new device
            $device = new Device();
            $device->mac = $mac;
            
            if(!$device->shop) {
	            
	            $device->client()->associate($shop->client);			
		        $device->shop()->associate($shop);
            }
            	
            	
            $device->push_token = $pushToken;
            $device->save();
        // Existing device
        } else {
            // Update shop / client if needed
            if (!$device->shop || !$device->client || $device->shop->id != $shop->id || $device->client->id != $shop->client->id) {
                $device->client()->associate($shop->client);
                $device->shop()->associate($shop);
                $device->push_token = $pushToken;
                $device->save();
            }
        }

        // Set session token
        $device->generateToken();

        $this->device = $device;

        // Response
        return $this->response(['token' => $device->token, 'devel' => $device->devel]);
    }

    /**
     * UnAuth device.
     *
     * @return Response
     */
    public function unauth()
    {
        // Auth
        $this->tokenAuth();

        // Unauthorize
        $this->device->unauth();

        // Response
        return $this->response();
    }
}
