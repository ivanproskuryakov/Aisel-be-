<?php

namespace Aisel\HistoryBundle\Features\Context\Admin;

use Aisel\ResourceBundle\Features\Context\SonataAdminContext;

/**
 * Behat CRUD for history entities
 */
class FeatureContext extends SonataAdminContext
{

    /**
     * @When /^I'm logged in as backend user$/
     */
    public function IamBackendUser()
    {
        $this->doBackendLogin();
    }

    /**
     * @When /^I visit history list route admin_aisel_history_event_list$/
     */
    public function browseToHistoryListRoute()
    {
        $this->getSession()->visit($this->generateUrl('admin_aisel_history_event_list', array('_locale' => 'en')));
        $this->assertSession()->statusCodeEquals(200);
    }

    /**
     * @Given /^I should see list of rows$/
     */
    public function iSeeListOfRows()
    {
        $element = $this->findByCSS('.sonata-ba-list-field-integer');
        assertNotEmpty($element->getText());
    }

}
