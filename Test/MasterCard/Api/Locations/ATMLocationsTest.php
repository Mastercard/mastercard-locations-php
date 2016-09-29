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



class ATMLocationsTest extends BaseTest {

    public static $responses = array();

    protected function setUp() {
        parent::setUp();
        //ApiConfig::setDebug(true);
        ApiConfig::setSandbox(true);
        BaseTest::resetAuthentication();
    }

    
    
    
    
    
    
    
                

        public function test_atm_locations()
        {
            

            

            $map = new RequestMap();
            $map->set("PageOffset", "0");
            $map->set("PageLength", "5");
            $map->set("PostalCode", "11101");
            
            
            $response = ATMLocations::query($map);

            $ignoreAssert = array();
            
            $this->customAssertEqual($ignoreAssert, $response, "Atms.PageOffset", "0");
            $this->customAssertEqual($ignoreAssert, $response, "Atms.TotalCount", "26");
            $this->customAssertEqual($ignoreAssert, $response, "Atms.Atm[0].Location.Name", "Sandbox ATM Location 1");
            $this->customAssertEqual($ignoreAssert, $response, "Atms.Atm[0].Location.Distance", "0.9320591049747101");
            $this->customAssertEqual($ignoreAssert, $response, "Atms.Atm[0].Location.DistanceUnit", "MILE");
            $this->customAssertEqual($ignoreAssert, $response, "Atms.Atm[0].Location.Address.Line1", "4201 Leverton Cove Road");
            $this->customAssertEqual($ignoreAssert, $response, "Atms.Atm[0].Location.Address.City", "SPRINGFIELD");
            $this->customAssertEqual($ignoreAssert, $response, "Atms.Atm[0].Location.Address.PostalCode", "11101");
            $this->customAssertEqual($ignoreAssert, $response, "Atms.Atm[0].Location.Address.CountrySubdivision.Name", "UYQQQQ");
            $this->customAssertEqual($ignoreAssert, $response, "Atms.Atm[0].Location.Address.CountrySubdivision.Code", "QQ");
            $this->customAssertEqual($ignoreAssert, $response, "Atms.Atm[0].Location.Address.Country.Name", "UYQQQRR");
            $this->customAssertEqual($ignoreAssert, $response, "Atms.Atm[0].Location.Address.Country.Code", "UYQ");
            $this->customAssertEqual($ignoreAssert, $response, "Atms.Atm[0].Location.Point.Latitude", "38.76006576913497");
            $this->customAssertEqual($ignoreAssert, $response, "Atms.Atm[0].Location.Point.Longitude", "-90.74615107952418");
            $this->customAssertEqual($ignoreAssert, $response, "Atms.Atm[0].Location.LocationType.Type", "OTHER");
            $this->customAssertEqual($ignoreAssert, $response, "Atms.Atm[0].HandicapAccessible", "NO");
            $this->customAssertEqual($ignoreAssert, $response, "Atms.Atm[0].Camera", "NO");
            $this->customAssertEqual($ignoreAssert, $response, "Atms.Atm[0].Availability", "UNKNOWN");
            $this->customAssertEqual($ignoreAssert, $response, "Atms.Atm[0].AccessFees", "UNKNOWN");
            $this->customAssertEqual($ignoreAssert, $response, "Atms.Atm[0].Owner", "Sandbox ATM 1");
            $this->customAssertEqual($ignoreAssert, $response, "Atms.Atm[0].SharedDeposit", "NO");
            $this->customAssertEqual($ignoreAssert, $response, "Atms.Atm[0].SurchargeFreeAlliance", "NO");
            $this->customAssertEqual($ignoreAssert, $response, "Atms.Atm[0].SurchargeFreeAllianceNetwork", "DOES_NOT_PARTICIPATE_IN_SFA");
            $this->customAssertEqual($ignoreAssert, $response, "Atms.Atm[0].Sponsor", "Sandbox");
            $this->customAssertEqual($ignoreAssert, $response, "Atms.Atm[0].SupportEMV", "1");
            $this->customAssertEqual($ignoreAssert, $response, "Atms.Atm[0].InternationalMaestroAccepted", "1");
            

            self::putResponse("atm_locations", $response);
            
        }
        
    
    
}



