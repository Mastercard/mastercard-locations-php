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
        //ApiConfig::setDebug(true);
        ApiConfig::setSandbox(true);
        BaseTest::resetAuthentication();
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

            $ignoreAssert = array();
            
            $this->customAssertEqual($ignoreAssert, $response, "Merchants.PageOffset", "0");
            $this->customAssertEqual($ignoreAssert, $response, "Merchants.TotalCount", "3");
            $this->customAssertEqual($ignoreAssert, $response, "Merchants.Merchant[0].Id", "36564");
            $this->customAssertEqual($ignoreAssert, $response, "Merchants.Merchant[0].Name", "Merchant 36564");
            $this->customAssertEqual($ignoreAssert, $response, "Merchants.Merchant[0].Category", "7 - Dry Cleaners And Laundry Services");
            $this->customAssertEqual($ignoreAssert, $response, "Merchants.Merchant[0].Location.Name", "Merchant 36564");
            $this->customAssertEqual($ignoreAssert, $response, "Merchants.Merchant[0].Location.Distance", "0.9320591049747101");
            $this->customAssertEqual($ignoreAssert, $response, "Merchants.Merchant[0].Location.DistanceUnit", "MILE");
            $this->customAssertEqual($ignoreAssert, $response, "Merchants.Merchant[0].Location.Address.Line1", "3822 West Fork Street");
            $this->customAssertEqual($ignoreAssert, $response, "Merchants.Merchant[0].Location.Address.City", "Great Falls");
            $this->customAssertEqual($ignoreAssert, $response, "Merchants.Merchant[0].Location.Address.PostalCode", "51765");
            $this->customAssertEqual($ignoreAssert, $response, "Merchants.Merchant[0].Location.Address.CountrySubdivision.Name", "Country Subdivision 517521");
            $this->customAssertEqual($ignoreAssert, $response, "Merchants.Merchant[0].Location.Address.CountrySubdivision.Code", "Country Subdivision Code 517521");
            $this->customAssertEqual($ignoreAssert, $response, "Merchants.Merchant[0].Location.Address.Country.Name", "Country 5175215");
            $this->customAssertEqual($ignoreAssert, $response, "Merchants.Merchant[0].Location.Address.Country.Code", "Country Code 5175215");
            $this->customAssertEqual($ignoreAssert, $response, "Merchants.Merchant[0].Location.Point.Latitude", "38.52114017591121");
            $this->customAssertEqual($ignoreAssert, $response, "Merchants.Merchant[0].Location.Point.Longitude", "-90.28678100000002");
            $this->customAssertEqual($ignoreAssert, $response, "Merchants.Merchant[0].Acceptance.PayPass.Register", "true");
            

            self::putResponse("example_merchants", $response);
            
        }
        
    
    
}



