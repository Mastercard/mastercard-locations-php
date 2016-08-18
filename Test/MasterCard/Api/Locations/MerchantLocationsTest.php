<?php
/*
 * Copyright 2016 MasterCard International.
 *
 * Redistribution and use in source and binary forms, with or without modification, are 
 * permitted provided that the following conditions are met:
 *
 * Redistributions of source code must retain the above copyright notice, this list of 
 * conditions and the following disclaimer.
 * Redistributions in binary form must reproduce the above copyright notice, this list of 
 * conditions and the following disclaimer in the documentation and/or other materials 
 * provided with the distribution.
 * Neither the name of the MasterCard International Incorporated nor the names of its 
 * contributors may be used to endorse or promote products derived from this software 
 * without specific prior written permission.
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY 
 * EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES 
 * OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT 
 * SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, 
 * INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED
 * TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; 
 * OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER 
 * IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING 
 * IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF 
 * SUCH DAMAGE.
 *
 */

namespace MasterCard\Api\Locations;

use MasterCard\Core\Model\RequestMap;
use MasterCard\Core\ApiConfig;
use MasterCard\Core\Security\OAuth\OAuthAuthentication;
use Test\BaseTest;



class MerchantLocationsTest extends BaseTest {

    public static $responses = array();

    protected function setUp() {
        parent::setUp();
        ApiConfig::setDebug(true);
        ApiConfig::setSandbox(true);
        $privateKey = file_get_contents(getcwd()."/mcapi_sandbox_key.p12");
        ApiConfig::setAuthentication(new OAuthAuthentication("L5BsiPgaF-O3qA36znUATgQXwJB6MRoMSdhjd7wt50c97279!50596e52466e3966546d434b7354584c4975693238513d3d", $privateKey, "alias", "password"));
    }

    
    
    
    
    
    
    
                

        public function test_example_merchants()
        {

            $map = new RequestMap();
            $map->set("Details", "acceptance.paypass");
            $map->set("PageOffset", "0");
            $map->set("PageLength", "5");
            $map->set("Latitude", "38.53463");
            $map->set("Longitude", "-90.286781");
            

            

            $response = MerchantLocations::query($map);

            $this->customAssertValue("0", $response->get("Merchants.PageOffset"));
            $this->customAssertValue("3", $response->get("Merchants.TotalCount"));
            $this->customAssertValue("36564", $response->get("Merchants.Merchant[0].Id"));
            $this->customAssertValue("Merchant 36564", $response->get("Merchants.Merchant[0].Name"));
            $this->customAssertValue("7 - Dry Cleaners And Laundry Services", $response->get("Merchants.Merchant[0].Category"));
            $this->customAssertValue("Merchant 36564", $response->get("Merchants.Merchant[0].Location.Name"));
            $this->customAssertValue("0.9320591049747101", $response->get("Merchants.Merchant[0].Location.Distance"));
            $this->customAssertValue("MILE", $response->get("Merchants.Merchant[0].Location.DistanceUnit"));
            $this->customAssertValue("3822 West Fork Street", $response->get("Merchants.Merchant[0].Location.Address.Line1"));
            $this->customAssertValue("Great Falls", $response->get("Merchants.Merchant[0].Location.Address.City"));
            $this->customAssertValue("51765", $response->get("Merchants.Merchant[0].Location.Address.PostalCode"));
            $this->customAssertValue("Country Subdivision 517521", $response->get("Merchants.Merchant[0].Location.Address.CountrySubdivision.Name"));
            $this->customAssertValue("Country Subdivision Code 517521", $response->get("Merchants.Merchant[0].Location.Address.CountrySubdivision.Code"));
            $this->customAssertValue("Country 5175215", $response->get("Merchants.Merchant[0].Location.Address.Country.Name"));
            $this->customAssertValue("Country Code 5175215", $response->get("Merchants.Merchant[0].Location.Address.Country.Code"));
            $this->customAssertValue("38.52114017591121", $response->get("Merchants.Merchant[0].Location.Point.Latitude"));
            $this->customAssertValue("-90.28678100000002", $response->get("Merchants.Merchant[0].Location.Point.Longitude"));
            $this->customAssertValue("true", $response->get("Merchants.Merchant[0].Acceptance.PayPass.Register"));
            

            self::putResponse("example_merchants", $response);

        }
        
    
    
}



