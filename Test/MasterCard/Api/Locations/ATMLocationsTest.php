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



class ATMLocationsTest extends \PHPUnit_Framework_TestCase {

    protected function setUp() {
        ApiConfig::setDebug(true);
        ApiConfig::setSandbox(true);
        $privateKey = file_get_contents(getcwd()."/mcapi_sandbox_key.p12");
        ApiConfig::setAuthentication(new OAuthAuthentication("L5BsiPgaF-O3qA36znUATgQXwJB6MRoMSdhjd7wt50c97279!50596e52466e3966546d434b7354584c4975693238513d3d", $privateKey, "alias", "password"));
    }

    
    
    
    
    
    
    
                

        public function test_atm_locations()
        {

            $map = new RequestMap();
            
            $map->set("PageOffset", "0");
            $map->set("PageLength", "5");
            $map->set("PostalCode", "11101");
            
            

            $response = ATMLocations::query($map);

            $this->customAssertValue("0", $response->get("Atms.PageOffset"));
            $this->customAssertValue("26", $response->get("Atms.TotalCount"));
            $this->customAssertValue("Sandbox ATM Location 1", $response->get("Atms.Atm[0].Location.Name"));
            $this->customAssertValue("0.9320591049747101", $response->get("Atms.Atm[0].Location.Distance"));
            $this->customAssertValue("MILE", $response->get("Atms.Atm[0].Location.DistanceUnit"));
            $this->customAssertValue("4201 Leverton Cove Road", $response->get("Atms.Atm[0].Location.Address.Line1"));
            $this->customAssertValue("SPRINGFIELD", $response->get("Atms.Atm[0].Location.Address.City"));
            $this->customAssertValue("11101", $response->get("Atms.Atm[0].Location.Address.PostalCode"));
            $this->customAssertValue("UYQQQQ", $response->get("Atms.Atm[0].Location.Address.CountrySubdivision.Name"));
            $this->customAssertValue("QQ", $response->get("Atms.Atm[0].Location.Address.CountrySubdivision.Code"));
            $this->customAssertValue("UYQQQRR", $response->get("Atms.Atm[0].Location.Address.Country.Name"));
            $this->customAssertValue("UYQ", $response->get("Atms.Atm[0].Location.Address.Country.Code"));
            $this->customAssertValue("38.76006576913497", $response->get("Atms.Atm[0].Location.Point.Latitude"));
            $this->customAssertValue("-90.74615107952418", $response->get("Atms.Atm[0].Location.Point.Longitude"));
            $this->customAssertValue("OTHER", $response->get("Atms.Atm[0].Location.LocationType.Type"));
            $this->customAssertValue("NO", $response->get("Atms.Atm[0].HandicapAccessible"));
            $this->customAssertValue("NO", $response->get("Atms.Atm[0].Camera"));
            $this->customAssertValue("UNKNOWN", $response->get("Atms.Atm[0].Availability"));
            $this->customAssertValue("UNKNOWN", $response->get("Atms.Atm[0].AccessFees"));
            $this->customAssertValue("Sandbox ATM 1", $response->get("Atms.Atm[0].Owner"));
            $this->customAssertValue("NO", $response->get("Atms.Atm[0].SharedDeposit"));
            $this->customAssertValue("NO", $response->get("Atms.Atm[0].SurchargeFreeAlliance"));
            $this->customAssertValue("DOES_NOT_PARTICIPATE_IN_SFA", $response->get("Atms.Atm[0].SurchargeFreeAllianceNetwork"));
            $this->customAssertValue("Sandbox", $response->get("Atms.Atm[0].Sponsor"));
            $this->customAssertValue("1", $response->get("Atms.Atm[0].SupportEMV"));
            $this->customAssertValue("1", $response->get("Atms.Atm[0].InternationalMaestroAccepted"));
            

        }
        
    
    

    protected function customAssertValue($expected, $actual) {
        if (is_bool($actual)) {
            $this->assertEquals(boolval($expected), $actual);
        } else if (is_float($actual)) {
            $this->assertEquals(floatval($expected), $actual);
        } else {
            $this->assertEquals(strtolower($expected), strtolower($actual));
        }
    }
}



