<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Countries;
use GuzzleHttp\Client;
use Validator;
use Str;
use Auth;

class ScrapController extends Controller {

    public function index(Request $request) {

        $data = [
            'title' => 'Scraping',
            'countries'=>Countries::all(),
            'categories'=> Category::orderBy('name', 'asc')->get()
        ];

        $url = 'https://proxy-us.steganos.com/browse.php?u=https://www.bitrefill.com/api/search?c=food&country=GB&limit=10';
        $client = new Client();
        
        try {
            // Send a GET request and capture the response
            $response = $client->get($url);

            // Get the response body as a string
            $body = $response->getBody()->getContents();

            // You can now work with the response data (e.g., display it, parse JSON, etc.)
            print_r($body);die();
        } catch (\GuzzleHttp\Exception\GuzzleException $e) {
            // Handle any exceptions or errors that occur during the request
            return 'Error: ' . $e->getMessage();
        }

        
        die();
        if ($request->isMethod('post')) {
            $country = $request->input('country') ? $request->input('country') : '';
            $category = $request->input('category') ? Str::slug($request->input('category')) : '';
            if($country && $category) {
                $products = $this->get_categories_curl($country, $category);
                echo '<pre>';
                print_r($products);
                die();
            }
            
        }

        return view('admin.scrap', $data);
    }

    protected function get_categories_curl($country, $category) {
//        $curl = curl_init();
        $url = 'https://www.bitrefill.com/api/search?c='.$category.'&country='.$country.'&limit=10';
        #
//        curl_setopt($curl, CURLOPT_URL, $url); // Replace with the URL you want to request
//        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//
//        $response = curl_exec($curl);
//
//        if (curl_errno($curl)) {
//            echo 'cURL error: ' . curl_error($curl);
//        }
//
//        curl_close($curl);

        return file_get_contents($url);
    }

}
