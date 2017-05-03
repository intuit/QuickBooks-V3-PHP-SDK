<?php
namespace dk\nordsign\application\services;

use dk\nordsign\schema\ContactCompany as CC;

use dk\nordsign\schema\ContactPerson as CP;

class NavService
{
    
    /**
     * Test method
     *
     * @param dk\nordsign\schema\ContactPerson\ContactPerson $contactPerson Contact person model
     * @param string $test Test argument
     *
     *
     * @return string
     */
    public function updateContactPerson(CP\ContactPerson $contactPerson, $test)
    {
        return $contactPerson->Name;
    }
    
    /**
     *
     * @param dk\nordsign\schema\ContactCompany\ContactCompany $contactCompany
     *
     * @return float
     * @todo check array value in SOAP
     */
    public function updateContactCompany(CC\ContactCompany $contactCompany)
    {
        return 24.22;
    }
}
